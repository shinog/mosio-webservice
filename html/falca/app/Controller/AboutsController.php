<?php

class AboutsController extends AppController {

       public function beforeFilter(){//login?????
             $this->Auth->allow();//??????????????????????????
        }

   public function index() {

     $this->layout = 'about';
}

   public function userguide() {

     $this->layout = 'userguide';
}

   public function trainguide() {

     $this->layout = 'trainguide';
}

   public function qa() {

     $this->layout = 'qa';
}

}