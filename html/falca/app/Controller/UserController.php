<?php

App::uses('AppController', 'Controller');

class UserController extends AppController {
  
  public $name ='User';
  
  public $components = array('Auth' => array(
      'authenticate' => array(
	  'Facebook' => array(
        'fbAppId' => '692433330886055',
        'fbAppSecret'     => 'dc244d82852b72eafb59ac9c140708d3',
		'fbScope' => 'publish_stream',
		'fbRedirect' => 'http://liveself.me/falca/user/callback/facebook',
		'userModel' => 'FbUser',
                 'fields' => array(
                     'fbUserId' => 'fb_user_id',
                     'fbToken'     => 'fb_token',
        ),
     )
  ),
  'loginAction' => '/user/login',
  'loginRedirect' => '/user/index',
  'logoutRedirect' => '/',
   
  ));
  
  function beforeFilter(){
  
    parent::beforeFilter();
    $this->Auth->allow('callback');
  }
  
  
  public function index() {
	 $this->set('user', $this->Auth->user());
  }
  
  public function login($provider) {
	$user = $this->Auth->user();
    if ($user) {
	  $this->redirect($this->Auth->loginRedirect);
    } else {
	  $this->Auth->login();
    }
  }
  
  public function callback($provider){
    if($this->Auth->login()){
	$this->redirect($this->Auth->redirectUrl());
  } 
}

  public function logout(){
	 $this->Auth->logout();
	 $this->redirect($this->Auth->logoutRdirect);
	 }
}
	 