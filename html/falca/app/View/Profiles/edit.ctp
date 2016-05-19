<h2>プロフィールの編集</h2>

<?php
echo $this->Form->create('Profile', array('action'=>'edit'));
echo $this->Form->input('name');
echo $this->Form->input('merit');
echo $this->Form->input('career');
echo $this->Form->end('保存');
?>