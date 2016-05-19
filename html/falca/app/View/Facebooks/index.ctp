<?php echo $this->Form->create('User', ['method' => 'post']);?>
			<?php echo $this->Form->button('Facebookで新規登録', array(
    'label' => array(
        'class' => false // labelタグに付与するclass
    ),
    'div' => array(
        'class' => false    // divタグに付与するclass
    ),
    'class' => 'facebook'      // inputタグに付与するclass
            ));?>