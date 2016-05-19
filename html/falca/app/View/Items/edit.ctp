<h2>レッスンの編集</h2>

<?php
echo $this->Form->create('Item', array(
'action'=>'edit',
'type' => 'file'
));
echo $this->Form->input('title');
echo $this->Form->input('content');
echo $this->Form->input('photo', array('type' => 'file')); 
echo $this->Form->input('photo_dir', array('type' => 'hidden')); 
echo $this->Form->end('Save Item');
?>