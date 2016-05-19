<?php

class LessonsController extends AppController {
   public $helpers = array('Html', 'Form');

   public function index() {
     $this->set('items', $this->Lesson->find('all'));
     }

   public function view($id = null) {
     $this->Lesson->id = $id;
     $this->set('item', $this->Lesson->read());
     }
}