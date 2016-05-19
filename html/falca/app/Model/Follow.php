<?php

App::uses('AppModel', 'Model');

class Follow extends AppModel {
    public $name = 'Follow';
    public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'from_id'
        )
    );

}