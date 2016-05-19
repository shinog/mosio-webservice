<?php echo($this->Form->create()); ?>
<div class='password'>

<?php
echo($this->Form->label('Trainer.password', 'パスワード：'));
echo($this->Form->text('Trainer.password'));
echo($this->Form->error('Trainer.password'));
?>
</div>

<div class='password-confirm'>
<?php
echo($this->Form->label('Trainer.password_confirm', '確認：'));
echo($this->Form->text('Trainer.password_confirm'));
?>
</div>

<?php echo($this->Form->end('送信')); ?>