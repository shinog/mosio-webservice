<h2>プロフィールの編集</h2>

<?php
echo $this->Form->create('User', array(
'action'=>'edit',
'type' => 'file'
));
echo $this->Form->input('name');
echo $this->Form->input('merit');
echo $this->Form->input('career');
echo $this->Form->input('photo', array('type' => 'file')); 
echo $this->Form->input('photo_dir', array('type' => 'hidden')); 
echo $this->Form->end('保存');
?>