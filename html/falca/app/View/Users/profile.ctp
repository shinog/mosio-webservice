<p><?php echo h($user['User']['name']); ?></p>
<p><?php echo h($user['User']['merit']); ?></p>
<p><?php echo h($user['User']['career']); ?></p>
<p><?php echo h($user['User']['photo']); ?></p>


<?php
echo $this->Html->link('プロフィールの編集', array('controller'=>'users', 'action'=>'edit'));
?>
