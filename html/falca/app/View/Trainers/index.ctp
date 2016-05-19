<?php echo($this->Form->create()); ?>

<div class='email'>
<?php
echo($this->Form->label('Trainer.email', 'メールアドレス'));
echo($this->Form->text('Trainer.email'));
echo($this->Form->error('Trainer.email'));
?>
</div>

<div class='email-confirm'>
<?php
echo($this->Form->label('Trainer.email_confirm', '確認：'));
echo($this->Form->text('Trainer.email_confirm'));
?>
</div>

<?php echo($this->Form->end('送信')); ?>
