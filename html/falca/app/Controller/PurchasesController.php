<?php

class PurchasesController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public function index() {

     $this->layout = 'lessons-list';

     $user = AuthComponent::user('id');
     $this->set('afters', $this->Purchase->find('all', array(
         'conditions' => array(
        'Purchase.user_id' => $user,
        'Date.date >=' => date('Y-m-d'),
),
'order' => 'Date.date',
)
));

     $this->set('befores', $this->Purchase->find('all', array(
         'conditions' => array(
        'Purchase.user_id' => $user,
        'Date.date <' => date('Y-m-d'),
),
'order' => 'Date.date',
)
));
     }

	 
	 public function review($id = null) {

     $this->layout = 'purch-review';

    $this->set('purchase', $this->Purchase->find('first', array(
         'conditions' => array('Purchase.id' => $id)
)));

     $this->Purchase->id = $id;
     if ($this->request->is('get')) {
         $this->request->data = $this->Purchase->read();
     } else { 
         if ($this->Purchase->save($this->request->data)) {
            $this->Session->setFlash('Success!');
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('Failed!');
        }
        }
        } 

}