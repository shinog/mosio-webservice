<?php

App::uses('AppModel', 'Model');

class Friend extends AppModel {
    public $name = 'Friend';
    public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'facebook_id'
        )
    );

}