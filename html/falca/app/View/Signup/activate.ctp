<?php echo $this->element('header'); ?>

        <div class="container">
            <div class="row text-center">

<?php echo($this->Form->create()); ?>
<div class='password'>
<?php
echo($this->Form->label('User.password', 'パスワード: '));
echo($this->Form->text('User.password'));
echo($this->Form->error('User.password'));
?>
</div>

<div class='password-confirm'>
<?php
echo($this->Form->label('User.password_confirm', '確認: '));
echo($this->Form->text('User.password_confirm'));
?>
</div>

<?php

$option = array(  
  array('name' => 'ユーザー', 'value' => 'enduser', 'style' => 'color: #0000ff;'),  
  array('name' => 'トレーナー', 'value' => 'trainer', 'style' => 'color: #0000ff;'),  
 
);  

echo($this->Form->label('User.which', 'タイプ: '));
echo($this->Form->input( 'User.which', array( 'type' => 'select', 'options' => $option, 'style' => 'color: #ff0000' ) ));
?>

<?php echo($this->Form->end('送信')); ?>

            </div>           
            </div>
           <hr>

<?php echo $this->element('footer'); ?>