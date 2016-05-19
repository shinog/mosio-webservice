<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
	public $name = 'User';
        public $hasMany = array(
        'Purchase' => array(
            'className'     => 'Purchase',
            'foreignKey'    => 'user_id',
        ),
		'Favorite' => array(
            'className'     => 'Favorite',
            'foreignKey'    => 'user_id',
        ),
		'Date' => array(
            'className'     => 'Date',
            'foreignKey'    => 'user_id',
        ),
    );
	
	
    
	public function isUniqueAndActive($check){
		foreach ($check as $key => $value){
			$count = $this->find('count', array(
				'conditions' => array(
					$key => $value, 
					'is_active' => true, 
				), 
				'recursive' => -1
			));
			if ($count != 0){ return false; }
		}
		return true;
	}
	
	public function confirm($check){
		foreach ($check as $key => $value){
			if (! isset($this->data[$this->name][$key.'_confirm'])){
				return false;
			}
			if ($value !== $this->data[$this->name][$key.'_confirm']){
				return false;
			}
		}
		return true;
	}

public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailSizes' => array(
                    'thumb150' => '150x150',
                    'normal' => '200x200',
                    'big' => '500x500'
                ),
                'thumbnailMethod' => 'php',
            )
        )
    );

}


