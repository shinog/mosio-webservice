<?php
 
App::uses('AppController', 'Controller');
App::import('vendor', 'facebook/src/Facebook');
 
class PagesController extends AppController {
 
 public $facebook;
 
 public $helper = ['Form', 'Html', 'Session'];
 
 public $components = [
        'Auth' => [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Admin'
                ]
            ],
            // ログインページ
            'loginAction' => ['controller' => 'pages', 'action' => 'index'],
            // ログイン後リダイレクトページ
            'loginRedirect' => ['controller' => 'pages', 'action' => 'my'],
            // ログアウト後リダイレクト先
            'logoutRedirect' => ['controller' => 'pages', 'action' => 'index'],
            // エラーメッセージ
            'authError' => 'Admin Only'
        ]
    ];
 
    public function beforeFilter(){
        $this->facebook = new Facebook([
            'appId' => '692433330886055',
            'secret' => 'dc244d82852b72eafb59ac9c140708d3',
            'cookie' => true
        ]);
        $this->Auth->allow('index', 'login');
    }
 
    protected function _authFacebook(){
        $login_url = $this->facebook->getLoginUrl(['redirect_uri' => Router::fullBaseUrl() . Router::url(['controller'=>'pages', 'action'=>'login'])]);
        return $this->redirect($login_url);
    }
 
    public function login(){
        $this->autoRender = false;
        $fb_id = $this->facebook->getUser();
        $login_info = ClassRegistry::init('Admin')->find('first', ['conditions' => ['Admin.facebook_id' => $fb_id]]);
        if(isset($login_info)){
            if($this->Auth->login($login_info['Admin'])){
                return $this->redirect(['action' => 'my']);
            } else {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            return $this->redirect(['action' => 'index']);
        }
    }
 
    public function logout(){
        $this->Auth->logout();
        return $this->redirect(['action' => 'index']);
    }
 
    public function index(){
        if($this->Auth->loggedIn()){
            return $this->redirect(['action' => 'my']);
        }
        if($this->request->is('post')){
            $this->_authFacebook();
        }
    }
 
    public function my(){
 
    }
 
}