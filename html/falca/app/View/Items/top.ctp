<?php

$user = AuthComponent::user('which');
$facebook_id = AuthComponent::user('facebook_id');


if($user == 'trainer'){

echo $this->Html->link('ダッシュボード', array('controller'=>'items', 'action'=>'index'));

}elseif($user == 'enduser'){

echo $this->Html->link('ダッシュボード', array('controller'=>'purchases', 'action'=>'index'));
}
?>

<?php
echo $this->Html->link('メッセージ', array('controller'=>'mails', 'action'=>'index'));
?>

<form method="post" action="http://liveself.me/search/geo-done.php">
レッスンの開催住所を入力してください。<br />
<input type="text" name="name" style="width:200px"><br />
<br />

<input type="submit" value="ＯＫ">
</form>
