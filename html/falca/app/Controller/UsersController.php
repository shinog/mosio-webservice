<?php
    App::uses('AppController', 'Controller');
    
    class UsersController extends AppController {

        public $helpers = array('Facebook.Facebook');
        
        public $name = 'Users';
        public $uses = array('User', 'Item', 'Purchase', 'Follow');

        public $components = array('Session');
		
		public $paginate = array(
                
                    'limit' => 3,                        
                    'order' => array('id' => 'asc'),
					'paramType' => 'querystring',
                
            );
		
        public function index(){
        }
        
        public function login(){

     $this->layout = 'login-lay';

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

   public function profile() {

     $this->layout = 'profile-pre';
 
     $user = AuthComponent::user('id');
    $this->User->id = $user;
    $this->set('user', $this->User->read());
     }

   public function view($id = null) {

     $this->layout = 'profile';

    $this->User->id = $id;
    $this->set('user', $this->User->find('first'));
	
	$check = $this->User->find('first', array(
        'conditions' => array('User.id' => $id)
    ));
	
if(empty($check)) {
        throw new NotFoundException();
    } 

     $this->set('items', $this->Item->find('all', array(
         'conditions' => array('whom' => $id, 'Item.date >=' => date('Y-m-d'))
)));

    $this->set('itemid', $id);
	
	
	
$conditions = array(
        'Item.whom' => $id, 
        'Purchase.check' => 1
    );
        
$this->set('purchases', $this->paginate('Purchase', $conditions));


     $this->set('avg', 
$this->Purchase->find('first', array(
    'conditions' => array('Item.whom' => $id, 'Purchase.check' => 1), 
    'fields' => array(
       'avg(Purchase.fun) as avgFun'
    ),
))
);

$user = AuthComponent::user('id');

$this->set('follow', $this->Follow->find('first', array(
         'conditions' => array(
		'Follow.from_id' => $user, 
        'Follow.to_id' => $id,
)
)
));

	
     }

  public function edit() {

    $this->layout = 'profile-edit';
	
		 $this->User->validate = array(
        'name' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢氏名｣は必ず記入して下さい。',
        ),
		'namae' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢カタカナ｣は必ず記入して下さい。',
        ),
		'zyusyo' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢住所｣は必ず記入して下さい。',
        ),
		'tell' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢電話番号｣は必ず記入して下さい。',
        ),
    );


    $user = AuthComponent::user('id');
     $this->User->id = $user;

     if ($this->request->is('get')) {
         $this->request->data = $this->User->read();

     } else { 
         if ($this->User->save($this->request->data)) {
		    $this->Session->setFlash('プロフィールを編集しました。', 'default', array('class' => 'setflash'));
			$this->redirect(array('action'=>'view/'.$user));
        } else {
           
        }
        }
        
		}
		
	
	public function admin_edit($id = null) {

    $this->layout = 'admin-profile-edit';
	
		 $this->User->validate = array(
        'name' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢氏名｣は必ず記入して下さい。',
        ),
		'namae' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢カタカナ｣は必ず記入して下さい。',
        ),
		'zyusyo' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢住所｣は必ず記入して下さい。',
        ),
		'tell' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢電話番号｣は必ず記入して下さい。',
        ),
    );

     $this->User->id = $id;

     if ($this->request->is('get')) {
         $this->request->data = $this->User->read();

     } else { 
         if ($this->User->save($this->request->data)) {
		    $this->Session->setFlash('プロフィールを編集しました。', 'default', array('class' => 'setflash'));
			$this->redirect(array('action'=>'view/'.$id));
        } else {
           
        }
        }
        
		}
		
		
	 public function transfer_edit() {

    $this->layout = 'transfer-edit';
	
		 $this->User->validate = array(
        'ginko' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢銀行名｣は必ず記入して下さい。',
        ),
'shiten' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢支店名｣は必ず記入して下さい。',
        ),
'syurui' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢口座種類｣は必ず記入して下さい。',
        ),
'koza' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢口座番号｣は必ず記入して下さい。',
        )
    );


    $user = AuthComponent::user('id');
     $this->User->id = $user;

     if ($this->request->is('get')) {
         $this->request->data = $this->User->read();

     } else { 
         if ($this->User->save($this->request->data)) {
		 
            $this->Session->setFlash('振込先を編集しました。', 'default', array('class' => 'setflash'));
            $this->redirect(array('action'=>'view/'.$user));
			
        } else {
           
        }
        }
        
		}
		
        
 }
    
    
