<?php
    
    App::uses('AppController', 'Controller');
    App::import('vendor', 'facebook/src/Facebook');
    
    class FacebooksController extends AppController {
        
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
                                                   'loginAction' => array('controller' => 'facebooks', 'action' => 'index'),
                                                   // ??????????????
                                                   'loginRedirect' => array('controller' => 'facebooks', 'action' => 'my'),
                                                   // ?????????????
                                                   'logoutRedirect' => array('controller' => 'facebooks', 'action' => 'index'),
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
            $login_url = $this->facebook->getLoginUrl(array('redirect_uri' => FULL_BASE_URL . Router::url(array('controller'=>'facebooks', 'action'=>'login')), 'scope'=> 'user_friends'));
            return $this->redirect($login_url);
        }
        
        public function login(){
            $this->autoRender = false;
            $fb_id = $this->facebook->getUser();
            $login_info = ClassRegistry::init('User')->find('first', array('conditions' => array('User.facebook_id' => $fb_id)));
            
            if(empty($login_info)){
                
                $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));
				$friends = $this->facebook->api('/me/friends','GET',array('locale'=>'ja_JP'));
				
                
                //登録する値
				$data = array('User' => array('facebook_id' => $me['id'], 'created' => date('Y-m-d'), 'modified' => date('Y-m-d'), 'name' => $me['name'], 'friends' => $friends['summary']['total_count'] ));
                // 登録するフィールド
                $fields = array('facebook_id', 'created', 'modified', 'name', 'friends');
                // 新規登録
                $this->User->save($data, false, $fields);
				
				
                
                
            }
            $login_again_info = ClassRegistry::init('User')->find('first', array('conditions' => array('User.facebook_id' => $fb_id)));
            if(isset($login_again_info)){
			
$me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));
$friends = $this->facebook->api('/me/friends','GET',array('locale'=>'ja_JP'));
			
try {

    $dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
    $userr='mosio_user';
    $password='mosiopasswd';
	
$dbh1=new PDO($dsn,$userr,$password);
$dbh1->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql1="DELETE FROM friends WHERE who =".$me['id'];
$stmt1=$dbh1->prepare($sql1);

$stmt1->execute();
$dbh1=null;

    $dbh = new PDO($dsn, $userr, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO friends (who,facebook_id) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);

    foreach ($friends['data'] as $friend) {
	
$dbh0=new PDO($dsn,$userr,$password);
$dbh0->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql0="SELECT id FROM users WHERE facebook_id =".$friend['id'];
        $stmt0=$dbh->prepare($sql0);
        $stmt0->execute();
		$rec=$stmt0->fetch(PDO::FETCH_ASSOC);
	
        $data1 = array();
		$data1[] = $me['id'];
        $data1[] = $rec['id'];
        $stmt->execute($data1);
		
$dbh0=null;		
    }
} catch (Exception $e) {
    var_dump($e);
}
			
			
			
			
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