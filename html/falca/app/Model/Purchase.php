<?php

App::uses('AppModel', 'Model');

class Purchase extends AppModel {
    public $name = 'Purchase';
	
	
	
    public $belongsTo = array(
	    'Date' => array(
            'className'    => 'Date',
            'foreignKey'   => 'date_id'
        ),
        'Item' => array(
            'className'    => 'Item',
            'foreignKey'   => 'item_id'
        ),
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    );

}