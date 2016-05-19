<h2>購入レッスン一覧</h2>

<ul>
<?php foreach ($purchases as $purchase): ?>
<li>
<?php 
//echo h($purchase['Purchase']['item_id']);
echo $this->Html->link($purchase['Item']['title'], '/purchases/review/'.$purchase['Purchase']['id']);
?>

</li>
<?php endforeach; ?>
</ul>

<?php
echo($this->Html->link('[ログアウト]', '/users/logout'));