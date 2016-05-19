<?php
    
    App::uses('AppController', 'Controller');
    App::import('vendor', 'facebook/src/Facebook');
    
    class TrainerFacebooksController extends AppController {
        
        public $facebook;
        
        public $helper = array('Form', 'Html', 'Session');
        
        public $uses = array('User');
        
        public $components = array(
                                   'Auth' => array(
                                                   'authenticate' => array(
                                                                           'Form' => array(
                                                                                           'userModel' => 'User'
                                                                                           )
                                                                           ),
                                                   // ???????
                                                   'loginAction' => array('controller' => 'trainer_facebooks', 'action' => 'index'),
                                                   // ??????????????
                                                   'loginRedirect' => array('controller' => 'trainer_facebooks', 'action' => 'my'),
                                                   // ?????????????
                                                   'logoutRedirect' => array('controller' => 'trainer_facebooks', 'action' => 'index'),
                                                   // ????????
                                                   'authError' => 'User Only'
                                                   )
                                   );
        
        public function beforeFilter(){
            $this->facebook = new Facebook(array(
                                                 'appId' => '1475195786113898',
                                                 'secret' => '7ffa3ee177440297d69d9bad351b49bb',
                                                 'cookie' => true
                                                 ));
            $this->Auth->allow('index', 'login');
        }
        
        protected function _authFacebook(){
            $login_url = $this->facebook->getLoginUrl(array('redirect_uri' => FULL_BASE_URL . Router::url(array('controller'=>'trainer_facebooks', 'action'=>'login'))));
            return $this->redirect($login_url);
        }
        
        public function login(){
            $this->autoRender = false;
            $fb_id = $this->facebook->getUser();
            $login_info = ClassRegistry::init('User')->find('first', array('conditions' => array('User.facebook_id' => $fb_id)));
            
            if(empty($login_info)){
                
                $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));
                
                //登録する値
				$data = array('User' => array('facebook_id' => $fb_id, 'created' => date('Y-m-d'), 'modified' => date('Y-m-d'), 'name' => $me['name'], 'which' => 'trainer'));
                // 登録するフィールド
                $fields = array('facebook_id', 'created', 'modified', 'name', 'which');
                // 新規登録
                $this->User->save($data, false, $fields);
                
                
            }
            $login_again_info = ClassRegistry::init('User')->find('first', array('conditions' => array('User.facebook_id' => $fb_id)));
            if(isset($login_again_info)){
                if($this->Auth->login($login_again_info['User'])){
                    return $this->redirect(
                                           array('controller' => 'items', 'action' => 'top')
                                           );
                } else {
                    return $this->redirect(
                                           array('controller' => 'items', 'action' => 'top')
                                           );
                }
            } else {
                return $this->redirect(
                                       array('controller' => 'items', 'action' => 'top')
                                       );
            }
        }
        
        public function logout(){
            $this->Auth->logout();
            return $this->redirect(array('action' => 'index'));
        }
        
        public function index(){
            
            if($this->Auth->loggedIn()){
                return $this->redirect(
                                       array('controller' => 'items', 'action' => 'top')
                                       );
            }
            if($this->request->is('post')){
                $this->_authFacebook();
            }
        }
        
        public function my(){
            
        }
        
    }