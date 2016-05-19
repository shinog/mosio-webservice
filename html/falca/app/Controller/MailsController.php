<?php

class MailsController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public $uses = array('Mail', 'Item','Purchase');

    public function index() {

     $this->layout = 'mail-lay';

     $user = AuthComponent::user('id');
     $this->set('items', $this->Item->find('all', array(
         'conditions' => array('whom' => $user),
		 'order' => array('Item.id' => 'desc')
)));



     $this->set('purchases', $this->Purchase->find('all', array(
         'conditions' => array('Purchase.user_id' => $user),
		 'order' => array('Purchase.id' => 'desc')
))
);


     }

   public function view($id = null) {

     $this->layout = 'mail-detail-lay';
	 
	 $user = AuthComponent::user('id');
	 $this->set('purchase', $this->Purchase->find('first', array(
		 'conditions' => array('Purchase.item_id' => $id, 'Purchase.user_id' => $user)
)));

      $this->set('item', $this->Item->find('first', array(
         'conditions' => array('Item.id' => $id)
)));

$check = $this->Item->find('first', array(
        'conditions' => array('Item.id' => $id)
    ));
	
if(empty($check)) {
        throw new NotFoundException();
    } 

      $this->set('mails', $this->Mail->find('all', array(
         'conditions' => array('Mail.item_id' => $id),
		 'order' => array('Mail.id' => 'desc')
)));

      $this->set('itemid', $id);
     }

	public function add($itemid = null) {

                $user = AuthComponent::user('id');

		if ($this->request->is('post')) {
			$this->Mail->create();
			if ($this->Mail->save($this->request->data)) {
				$this->Session->setFlash('success!', 'flash_success');
				$this->redirect(array('action' => 'view/'.$itemid));
			} else {
				$errors = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Post->validationErrors));
			}

                $this->set('items', $this->Item->find('all', array(
                        'conditions' => array('whom' => $user)
                         )));

		}

		$this->set('errors', (isset($errors)) ? $errors : null);
	}


}