<header>

<?php if (isset($errors)) {
echo '<section class="message pink"><p>Error.</p><ul>';
foreach ($errors as $error) {
echo '<li>'.$error.'</li>';
}
echo '</ul></section>';
} ?>


<?php
$user = AuthComponent::user('id');


echo $this->Form->create('Mail', array(
'action' => 'add',
'id' => 'form',
'inputDefaults' => array(
'label' => array('class' => 'label bold'),
'div' => array('class' => 'field'),
),
));
echo $this->Form->input('content', array('class' => 'textarea', 'rows' => '20', 'label' => false));
echo $this->Form->hidden('who', array('value' => $user));

?>
<div>
<div class="field-submit clearfix">
<?php
echo $this->Form->submit('投稿する', array(
'div' => false,
'class' => 'button middle blue',
'style' => 'float:right;'
));
?>
</div>
</div>
<?php echo $this->Form->end(); ?>
</header>



<ul>
<?php foreach ($mails as $mail): ?>
<li>


<?php echo h($mail['Mail']['content']); ?>
<?php echo h($mail['Mail']['who']); ?>
<?php echo h($mail['Mail']['created']); ?>



</li>
<?php endforeach; ?>
</ul>
