<?php

class FavoritesController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public function index() {

     $this->layout = 'favorites-list';

     $user = AuthComponent::user('id');
     $this->set('afters', $this->Favorite->find('all', array(
         'conditions' => array(
        'user_id' => $user,
        
),
'order' => 'Item.date',
)
));

     $this->set('befores', $this->Favorite->find('all', array(
         'conditions' => array(
        'user_id' => $user,
        'Item.date <' => date('Y-m-d'),
),
'order' => 'Item.date',
)
));
     }
	 
	 }