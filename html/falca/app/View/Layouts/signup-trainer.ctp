<?php echo $this->element('header'); ?>
          
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center"><?php echo $this->Session->flash(); ?> </h3>
                </div>
            </div>
            <hr>
        </div>
			
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center">新規登録(トレーナー向け)</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">
			
			<form action="/falca/trainer_facebooks" method="post" id="UserIndexForm" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>			
			<button label="" div="" class="facebook" type="submit">Facebookで新規登録</button></form> 
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
			  
			<div class="input-group input-group-sm"><span class="input-group-addon">メールアドレス(確認)</span>
			    <?php echo $this->Form->input('email_confirm', array('class' => 'form-control')); ?>               
              </div>  
			  送信ボタンを押された方は、こちらの<a href="http://www.mosio.me/falca/signup/agreement">利用規約</a>に同意したものとみなします。
              
           </div>	
 
<br />

<p>
<?php 
$options = array(
    'label' => '送信',
    'class' => 'btn btn-lg btn-default',
);
echo $this->Form->end($options);
?>
</p>

			  
			  
			  
            </div>
         </div>
           <hr>
            
<?php echo $this->element('footer'); ?>
