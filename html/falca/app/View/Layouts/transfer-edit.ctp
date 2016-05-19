<?php echo $this->element('header'); ?>

<?php
$user = AuthComponent::user('which');

?>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">振込先を追加・編集する</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<?php
    echo $this->Form->create('User', array(
                                           'action'=>'transfer_edit',
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
    ?>
	

           <div>
             
  


<?php
if($user == 'enduser'){
?>
			  
<?php
}elseif($user == 'trainer'){
?>
			  
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">銀行名 *</span>
			    <?php echo $this->Form->input('ginko', array('class' => 'form-control')); ?>               
              </div>
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">支店名 *</span>
			    <?php echo $this->Form->input('shiten', array('class' => 'form-control')); ?>               
              </div>
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">口座種類 *</span>
			    <?php echo $this->Form->input('syurui', array('class' => 'form-control')); ?>               
              </div>
			  
			  <div class="input-group input-group-lg"><span class="input-group-addon">口座番号 *</span>
			    <?php echo $this->Form->input('koza', array('class' => 'form-control')); ?>               
              </div>

<?php
}
?>			  
           
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