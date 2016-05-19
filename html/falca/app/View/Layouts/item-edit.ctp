<?php echo $this->element('header'); ?>

<?php
$user = AuthComponent::user('id');
?>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">レッスンを編集する</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<?php

    if($user == $item['Item']['whom']){

    echo $this->Form->create('Item', array(
                                           'action'=>'edit',
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
	
	
									   
										   
    ?>
	
           <div>
           
              <div class="input-group input-group-lg"><span class="input-group-addon">タイトル *</span>
			    <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>               
              </div>
			  
               <div class="input-group input-group-lg"><span class="input-group-addon">内容 *</span>
			    <?php echo $this->Form->textarea('content', array('class' => 'form-control', 'style' => 'height:150px')); ?>               
              </div>
			  
              <div class="input-group input-group-lg"><span class="input-group-addon">画像</span>
<?php
echo $this->Form->input('photo', array('type' => 'file'));
echo $this->Form->input('photo_dir', array('type' => 'hidden'));
?>
              </div>
              
           </div>	
 
<br />

※画像を複数追加できる機能を現在開発中です。
<p>
<?php 
$options = array(
    'label' => '編集',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);

}
?>
</p>	

<?php
if(empty($purchase['Purchase']['id'])){
?>

<hr>
<h3 class="text-center">
<?php echo $this->Form->postLink('削除する', array('action'=>'delete', $item['Item']['id']), array('confirm'=>'本当によろしいですか?')); ?>
</h3>

<?php
}
?>
            </div>
            
            
            </div>
           <hr>

<?php echo $this->element('footer'); ?>
