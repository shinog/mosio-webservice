<?php echo $this->element('header'); ?>

<?php
$user = AuthComponent::user('which');

?>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">プロフィールを編集する</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<?php
    echo $this->Form->create('User', array(
                                           'action'=>'edit',
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
    ?>
	

           <div>
              <div class="input-group input-group-lg"><span class="input-group-addon">氏名 *</span>
			    <?php echo $this->Form->input('name', array('class' => 'form-control')); ?> 
              </div>
			  
			<div class="input-group input-group-lg"><span class="input-group-addon">カタカナ *</span>
			    <?php echo $this->Form->input('namae', array('class' => 'form-control')); ?>               
              </div>  
			  
			<div class="input-group input-group-lg"><span class="input-group-addon">住所 *</span>
			    <?php echo $this->Form->input('zyusyo', array('class' => 'form-control')); ?>               
              </div>
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">電話番号 *</span>
			    <?php echo $this->Form->input('tell', array('class' => 'form-control')); ?>               
              </div>
  


<?php
if($user == 'enduser'){
?>

			  <div class="input-group input-group-lg"><span class="input-group-addon">自己紹介</span>
			    <?php echo $this->Form->textarea('intro', array('class' => 'form-control', 'style' => 'height:150px')); ?>               
              </div>
			  
<?php
}elseif($user == 'trainer'){
?>
			  
               <div class="input-group input-group-lg"><span class="input-group-addon">得意分野</span>
			    <?php echo $this->Form->textarea('merit', array('class' => 'form-control', 'style' => 'height:150px')); ?>               
              </div>
			  
              <div class="input-group input-group-lg"><span class="input-group-addon">経歴</span>
			    <?php echo $this->Form->textarea('career', array('class' => 'form-control', 'style' => 'height:150px')); ?>
			  </div>
			  
			 
<?php
}
?>			  
			  
				
              <div class="input-group input-group-lg"><span class="input-group-addon">写真</span>
<?php
echo $this->Form->input('photo', array('type' => 'file'));
echo $this->Form->input('photo_dir', array('type' => 'hidden'));
?>
              </div>
              
           </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => '編集',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);
?>
</p>
</form>

            </div>
            
            
            </div>
           <hr>

<?php echo $this->element('footer'); ?>
