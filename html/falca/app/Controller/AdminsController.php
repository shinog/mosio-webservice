<?php

class AdminsController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');
  
   public $paginate = array(
                    'limit' => 3,                        
                    'order' => array('id' => 'asc'),
					'paramType' => 'querystring',
                
            );

   public function beforeFilter(){//login?????
             $this->Auth->allow();//??????????????????????????
			 $this->Auth->deny('index');
        }

   public $uses = array('Item', 'Purchase', 'Profile', 'Favorite', 'Point', 'User', 'Date');
   
   
   public function index() {

     $this->layout = 'admin';
	 

     $this->set('dates', 
$this->Date->find('all', array(
    'conditions' => array(
		 'Date.date <' => date('Y-m'),
		 'Date.paid' => 0,
)
))
);     

$this->set('items', 
$this->Date->find('all', array(
    'conditions' => array(
)
))
);     

     }
	 
	 
	public function number() {
	
	$this->layout = 'admin-number';
	 
     $this->set('users', 
$this->User->find('all', array(
    'conditions' => array(
)
))
);     


    $this->set('counttrainer', 
$this->User->find('first', array(
    'conditions' => array('User.which' => 'trainer'), 
    'fields' => array(
       'count(User.id) as countTrainer'
    ),
))
);

    $this->set('countenduser', 
$this->User->find('first', array(
    'conditions' => array('User.which' => 'enduser'), 
    'fields' => array(
       'count(User.id) as countEnduser'
    ),
))
);

	
	}
	
	


}	 
   