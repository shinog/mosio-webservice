<?php echo $this->element('header'); ?>

        <div class="container">
            <div class="row text-center">

<?php
    echo $this->Form->create('User', array(
                                           
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
    ?>
	

           <div>
              <div class="input-group input-group-lg"><span class="input-group-addon">パスワード</span>
			    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?> 
              </div>
			  
			<div class="input-group input-group-lg"><span class="input-group-addon">パスワード(確認)</span>
			    <?php echo $this->Form->input('password_confirm', array('class' => 'form-control')); ?>               
              </div>

		 </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => '登録',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);
?>
</p>                 


            </div>           
            </div>
           <hr>

<?php echo $this->element('footer'); ?>