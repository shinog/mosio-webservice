<?php

App::uses('AppModel', 'Model');

class Mail extends AppModel {
    public $name = 'Mail';
    public $belongsTo = array(
        'Item' => array(
            'className'    => 'Item',
            'foreignKey'   => 'item_id'
        ),
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'who'
        )
    );

}