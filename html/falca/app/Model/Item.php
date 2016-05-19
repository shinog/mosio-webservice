<?php

class Item extends AppModel {
    public $name = 'Item';
    public $hasMany = array(
        'Purchase' => array(
            'className'     => 'Purchase',
            'foreignKey'    => 'item_id',
        ),
		'Favorite' => array(
            'className'     => 'Favorite',
            'foreignKey'    => 'item_id',
        ),
		'Date' => array(
            'className'     => 'Date',
            'foreignKey'    => 'item_id',
        ),
    );
	
	public $belongsTo = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'whom'
        )
    );

public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailSizes' => array(
                    'thumb150' => '150x150',
                    'normal' => '600x300',
                    'big' => '1400x600'
                ),
                'thumbnailMethod' => 'php',
            )
        )
    );
	
    

}
