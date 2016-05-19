<?php
echo($this->Form->create());
echo($this->Form->label('User.email'));
echo($this->Form->text('User.email'));
echo($this->Form->label('User.password'));
echo($this->Form->password('User.password'));
echo($this->Form->end('ログイン'));
?>

<?php echo $this->Facebook->login(array('perms' => 'email,publish_stream')); ?>
</br>
<?php echo $this->Facebook->comments(); ?>

</body>
</html>

<?php if (count($errors)){ ?>
<ul>
	<?php foreach ($errors as $error){ ?>
	<li><?php echo $error ?></li>
	<?php } ?>
</ul>
<?php }
?>