<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class SignupController extends AppController {
	public $name = 'Signup';
	public $uses = array('User');
	public $components = array('Auth', 'Session');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function index(){

         $this->layout = 'signup';

		if (! $this->request->data){
			$this->render();
			return;
		}
		
		$this->User->validate = array(
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
		$this->User->set($this->request->data);
		if (! $this->User->invalidFields()){
			$email = $this->request->data['User']['email'];
			$activation_code = md5($email.time());
			
			$user = $this->User->find('first', array('conditions' => array('email' => $email, 'is_active' => false)));
			if (! $user){
				$this->User->create();
				$user = array('User' => $this->request->data['User']);
			}
			$user['User']['is_active'] = false;
			$user['User']['activation_code'] = $activation_code;
			$this->User->save($user);
			
			$cakeemail = new CakeEmail('heteml');
			$cakeemail->from('mosio@falca.co');
			$cakeemail->to($email);
			$cakeemail->subject('【mosio】仮登録のお知らせ');
			$cakeemail->send(
sprintf('mosio運営事務局です。
mosioにご登録いただきありがとうございます。
下記URLをクリックするまでは会員登録が完了しません。
メールアドレスの認証を行って、会員登録の手続きに進んで下さい。

http://www.mosio.me/falca/signup/activate/%s


ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
・問題が発生した場合は下記メールアドレス宛にご連絡ください。
mosio@falca.co

・本メールに覚えのない方は
どなたかがmosioに登録する際に誤ってあなたのメールアドレスを入力した可能性があります。
その旨を上記のアドレスにメールを送ってください。
登録情報を削除致します。

本メールはmosioの会員様宛に配信しています。
ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

© 2015  FALCA Inc. All rights reserved.', $activation_code)
);
               $this->Session->setFlash('メールを送信しました。', 'default', array('class' => 'setflash'));
          
			
		}
	}
	
	public function activate($activation_code){

    $this->layout = 'activate';

		$user = $this->User->find('first', array('conditions' => array('activation_code' => $activation_code, 'is_active' => false)));
		if (! $user){ $this->redirect('/signup/index'); }
		
		if (! $this->request->data){
			$this->render();
			return;
		}
		$this->User->validate = array(
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
		$this->User->set($this->request->data);

		if (! $this->User->invalidFields()){
			$user['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			unset($user['User']['password_confirm']);
			$user['User']['is_active'] = true;
			$user['User']['which'] = 'enduser';

			
			$this->User->validate = array();
			$this->User->save($user);
			
			$this->Auth->login($user);
			$this->redirect($this->Auth->redirectUrl());
		}
	}

   public function agreement() {

     $this->layout = 'kiyaku';

     }
	
	
		public function trainer(){

         $this->layout = 'signup-trainer';

		if (! $this->request->data){
			$this->render();
			return;
		}
		
		$this->User->validate = array(
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
		$this->User->set($this->request->data);
		if (! $this->User->invalidFields()){
			$email = $this->request->data['User']['email'];
			$activation_code = md5($email.time());
			
			$user = $this->User->find('first', array('conditions' => array('email' => $email, 'is_active' => false)));
			if (! $user){
				$this->User->create();
				$user = array('User' => $this->request->data['User']);
			}
			$user['User']['is_active'] = false;
			$user['User']['activation_code'] = $activation_code;
			$this->User->save($user);
			
			$cakeemail = new CakeEmail('heteml');
			$cakeemail->from('mosio@falca.co');
			$cakeemail->to($email);
			$cakeemail->subject('【mosio】仮登録のお知らせ');
			$cakeemail->send(
sprintf('mosio運営事務局です。
mosioにご登録いただきありがとうございます。
下記URLをクリックするまでは会員登録が完了しません。
メールアドレスの認証を行って、会員登録の手続きに進んで下さい。

http://www.mosio.me/falca/signup/trainer_activate/%s


ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
・問題が発生した場合は下記メールアドレス宛にご連絡ください。
mosio@falca.co

・本メールに覚えのない方は
どなたかがmosioに登録する際に誤ってあなたのメールアドレスを入力した可能性があります。
その旨を上記のアドレスにメールを送ってください。
登録情報を削除致します。

本メールはmosioの会員様宛に配信しています。
ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

© 2015  FALCA Inc. All rights reserved.', $activation_code)
);
               $this->Session->setFlash('メールを送信しました。', 'default', array('class' => 'setflash'));
          
			
		}
	}
	
	
	public function trainer_activate($activation_code){

    $this->layout = 'activate';

		$user = $this->User->find('first', array('conditions' => array('activation_code' => $activation_code, 'is_active' => false)));
		if (! $user){ $this->redirect('/signup/trainer'); }
		
		if (! $this->request->data){
			$this->render();
			return;
		}
		$this->User->validate = array(
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
		$this->User->set($this->request->data);

		if (! $this->User->invalidFields()){
			$user['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			unset($user['User']['password_confirm']);
			$user['User']['is_active'] = true;
			$user['User']['which'] = 'trainer';

			
			$this->User->validate = array();
			$this->User->save($user);
			
			$this->Auth->login($user);
			$this->redirect($this->Auth->redirectUrl());
		}
	}

}
