<?php

App::uses('AppModel', 'Model');

class Favorite extends AppModel {
    public $name = 'Favorite';
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