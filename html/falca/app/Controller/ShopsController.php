<?php
 
App::uses('AppController', 'Controller');
 
class ShopsController extends AppController {

   public $components = array('Auth', 'Session');
 
    public function beforeFilter() {
        $this->Auth->allow('index');
    }

    public function index() {
        if ($this->Auth->loggedIn()) {
            $this->Session->setFlash(__('ログインしています。'));
        } else {
            $this->Session->setFlash(__('ログインしていません。'));
        }
    }
 
}