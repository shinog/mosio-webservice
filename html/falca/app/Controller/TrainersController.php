<?php
App::uses('AppController', 'Controller');

class TrainersController extends AppController {
	public $name = 'Trainers';
	public $uses = array('Trainers');
	public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email', 
						'password' => 'password', 
					), 
				)
			), 
			'loginAction' => '/trainers/login', 
			'loginRedirect' => '/trainers/index', 
			'logoutRedirect' => '/trainers/login'
		)
	);
	public $layout = 'default2';
	
	public function index(){
	}
	
	public function login(){
		$this->log(array('first_name' => 'Tomoki', 'family_name' => 'HASEGAWA'));
		$errors = array();
		if ($this->request->data){
			if ($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$errors[] = 'メールアドレスかパスワードが違います。';
			}
		}
		$this->set('errors', $errors);
	}
	
	public function logout(){
		$logout_url = $this->Auth->logout();
		$this->redirect($logout_url);
	}
}
