<?php

class DatesController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session');

   public $uses = array('Date', 'Item','Purchase');
   
   
   public function add($id = null) {
	
	$this->layout = 'date-add';
	
	$this->set('item', $this->Item->find('first', array(
         'conditions' => array('Item.id' => $id)
)));

$check = $this->Item->find('first', array(
        'conditions' => array('Item.id' => $id)
    ));
	

	
	$this->set('itemid', $id);
	
	$this->Date->validate = array(
        'date' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢日時｣は必ず記入して下さい。',
        ),
		'limitt' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢参加上限数｣は必ず記入して下さい。',
        )
    );

		if ($this->request->is('post')) {
			$this->Date->create();
			if ($this->Date->save($this->request->data)) {
				$this->Session->setFlash('新しい日時を追加しました。', 'default', array('class' => 'setflash'));
				$this->redirect(array('controller' => 'items', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Failed!');
			}
			
		}

	}
   
   
   
}