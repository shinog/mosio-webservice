<?php echo $this->element('header'); ?>

<?php
$user = AuthComponent::user('id');
?>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">レビューを載せる</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<?php

if($user == $purchase['Purchase']['user_id']){

    echo $this->Form->create('Purchase', array(
                                           'action'=>'review',
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
    ?>
	
<div>

<?php
$option = array(  
  array('name' => '5', 'value' => '5'),  
  array('name' => '4', 'value' => '4'),
  array('name' => '3', 'value' => '3'),
  array('name' => '2', 'value' => '2'),
  array('name' => '1', 'value' => '1')
);  
?>
           
              <div class="input-group input-group-lg"><span class="input-group-addon">評価 *</span>
			    <?php echo $this->Form->input('fun', array('options' => $option, 'class' => 'form-control')); ?>     		  
              </div>
			  
               <div class="input-group input-group-lg"><span class="input-group-addon">コメント</span>
			    <?php echo $this->Form->textarea('comment', array('class' => 'form-control', 'style' => 'height:150px')); ?>               
              </div>

<?php
echo $this->Form->hidden('check', array('value' => 1));
?>			 
              
           </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => '投稿',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);

}

?>
</p>		



            </div>
            
            
            </div>
           <hr>

<?php echo $this->element('footer'); ?>
