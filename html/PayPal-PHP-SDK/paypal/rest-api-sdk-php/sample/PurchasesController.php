<?php

class PurchasesController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public function index() {
     $user = AuthComponent::user('id');
     $this->set('purchases', $this->Purchase->find('all', array(
         'conditions' => array('user_id' => $user)
)));
     }

   public function view($id = null) {
    $this->Purchases->item_id = $id;
    $this->set('purchase', $this->Purchase->read());
     }

}