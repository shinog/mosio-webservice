<?php

App::uses('AppModel', 'Model');

class Date extends AppModel {
    public $name = 'Date';
	
	public $hasMany = array(
        'Purchase' => array(
            'className'     => 'Purchase',
            'foreignKey'    => 'date_id',
        ),
    );
	
	
	
    public $belongsTo = array(
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