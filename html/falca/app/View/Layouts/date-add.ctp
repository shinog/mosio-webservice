<?php echo $this->element('header'); ?>

<?php
$user = AuthComponent::user('id');
?>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">日程を追加する</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<?php

    if($user == $item['Item']['whom']){

    echo $this->Form->create('Date', array(
                                           'action'=>'add',
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
	
	
									   
										   
    ?>
	
           <div>
		   
		   <?php echo $this->Form->hidden('item_id', array('value' => $itemid)); ?>           
           
              <div class="input-group input-group-lg"><span class="input-group-addon">日程 *</span>
			    <?php echo $this->Form->input('date', array('type' => 'datetime', 'dateFormat' => 'YMD', 'monthNames' => false, 'timeFormat' => '24', 'separator' => array('年', '月', '日'))); ?>
              </div>
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">参加上限数 *</span>
			    <?php echo $this->Form->input('limitt', array('class' => 'form-control')); ?>               
              </div> 
			    
              
              
           </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => '追加',
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
