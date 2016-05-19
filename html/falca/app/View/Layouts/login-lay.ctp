<?php echo $this->element('header'); ?>
        
               
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center">ログイン</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">
			
			<form action="/falca/facebooks" method="post" id="UserIndexForm" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>			
			<button label="" div="" class="facebook" type="submit">Facebookでログイン</button></form> 
			<hr>

    <?php
    echo $this->Form->create('User', array(
                                           
                                           'type' => 'file',
										   'inputDefaults'=>array('label' => false, 'div' => false),
                                           ));
    ?>
	

           <div>
              <div class="input-group input-group-sm"><span class="input-group-addon">メールアドレス</span>
			    <?php echo $this->Form->input('email', array('class' => 'form-control')); ?> 
              </div>
			  
			<div class="input-group input-group-sm"><span class="input-group-addon">パスワード</span>
			    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>               
              </div>  
              
           </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => 'ログイン',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);
?>
</p>                 
              
			  
			  
            </div>
        </div>
           <hr>
            
<?php echo $this->element('footer'); ?>
