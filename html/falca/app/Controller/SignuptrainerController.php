<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class SignuptrainerController extends AppController {
	public $name = 'Signuptrainer';
	public $uses = array('Trainer');
	public $components = array('Auth');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function index(){
		if (! $this->request->data){
			$this->render();
			return;
		}
		
		$this->Trainer->validate = array(
			'email' => array(
				array(
					'rule' => 'notEmpty', 
					'message' => 'メールアドレスを入力してください'
				), 
				array(
					'rule' => array('custom', '/^.+@.+$/'), 
					'message' => 'メールアドレスの形式が正しくありません。', 
				), 
				array(
					'rule' => 'confirm', 
					'message' => 'メールアドレスが一致していません。', 
				), 
				array(
					'rule' => 'isUniqueAndActive', 
					'message' => 'このメールアドレスは使用されています。', 
				)
			)
		);
		$this->Trainer->set($this->request->data);
		if (! $this->Trainer->invalidFields()){
			$email = $this->request->data['Trainer']['email'];
			$activation_code = md5($email.time());
			
			$trainer = $this->Trainer->find('first', array('conditions' => array('email' => $email, 'is_active' => false)));
			if (! $trainer){
				$this->Trainer->create();
				$trainer = array('Trainer' => $this->request->data['Trainer']);
			}
			$trainer['Trainer']['is_active'] = false;
			$trainer['Trainer']['activation_code'] = $activation_code;
			$this->Trainer->save($trainer);
			
			$cakeemail = new CakeEmail('gmail');
			$cakeemail->from('info@mosio.me');
			$cakeemail->to($email);
			$cakeemail->subject('仮登録のお知らせ');
			$cakeemail->send(sprintf('http://liveself.me/falca/signuptrainer/activate/%s', $activation_code));
			
			$this->render('email_sent');
		}
	}
	
	public function activate($activation_code){
		$user = $this->Trainer->find('first', array('conditions' => array('activation_code' => $activation_code, 'is_active' => false)));
		if (! $trainer){ $this->redirect('signuptrainer/index'); }
		
		if (! $this->request->data){
			$this->render();
			return;
		}
		$this->Trainer->validate = array(
			'password' => array(
				array(
					'rule' => 'notEmpty', 
					'message' => 'パスワードを入力してください。'
				), 
				array(
					'rule' => array('custom', '/^[a-zA-Z0-9]+$/'), 
					'message' => '半角英数字で入力してください。', 
				), 
				array(
					'rule' => 'confirm', 
					'message' => 'パスワードが一致していません。', 
				), 
			), 
		);
		$this->Trainer->set($this->request->data);
		if (! $this->Trainer->invalidFields()){
			$trainer['Trainer']['password'] = $this->Auth->password($this->request->data['Trainer']['password']);
			unset($trainer['Trainer']['password_confirm']);
			$trainer['Trainer']['is_active'] = true;
			
			$this->Trainer->validate = array();
			$this->Trainer->save($user);
			
			$this->Auth->login($user);
			$this->redirect($this->Auth->redirectUrl());
		}
	}
	
}