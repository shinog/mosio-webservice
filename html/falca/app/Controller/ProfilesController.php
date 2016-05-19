<?php

class ProfilesController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public $uses = array('Profile', 'User');


   public function index() {

     $this->layout = 'profile-pre';

     $user = AuthComponent::user('id');
    $this->User->id = $user;
    $this->set('user', $this->User->read());

     }


   public function edit() {

     $user = AuthComponent::user('id');
     $this->User->id = $user;

     if ($this->request->is('get')) {
         $this->request->data = $this->Profile->read();
     } else { 
         if ($this->Profile->save($this->request->data)) {
            $this->Session->setFlash('Success!');
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('Failed!');
        }
        }
        }

}