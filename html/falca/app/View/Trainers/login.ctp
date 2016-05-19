<?php 
echo($this->Form->create()); 
echo($this->Form->label('Trainer.email'));
echo($this->Form->text('Trainer.email'));
echo($this->Form->label('Trainer.password'));
echo($this->Form->password('Trainer.password'));
echo($this->Form->end('ログイン'));
?>

<?php if (count($errors)){ ?>
<ul>
   <?php foreach ($errors as $error){ ?>
   <li><?php echo($error); ?>
   <?php } ?>
</ul>
<?php }
