<?php
$user = AuthComponent::user('which');

if($user == 'trainer'){

echo '<h2>レッスン一覧</h2>

<ul>';
foreach ($items as $item):
echo '<li>';

//echo h($item['Item']['title']);
echo $this->Html->link($item['Item']['title'], '/items/view/'.$item['Item']['id']);


echo $this->Html->link('編集', array('action'=>'edit', $item['Item']['id']));


    echo $this->Form->postlink('削除', array('action'=>'delete', $item['Item']['id']),
	array('comfirm'=>'sure?'));

echo '</li>';
endforeach;
echo '</ul>

<h4>レッスンの追加</h4>';
echo $this->Html->link('レッスンの追加', array('controller'=>'items', 'action'=>'add'));

echo($this->Html->link('[ログアウト]', '/users/logout'));

}

?>