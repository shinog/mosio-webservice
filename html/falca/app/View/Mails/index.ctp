<h2>メッセージ</h2>

<ul>
<?php foreach ($items as $item): ?>
<li>

<?php 
//echo h($item['Item']['title']);
echo $this->Html->link($item['Item']['title'], '/mails/view/'.$item['Item']['id']);
?>

</li>
<?php endforeach; ?>
</ul>

<ul>
<?php foreach ($purchases as $purchase): ?>
<li>

<?php
//echo h($purchase['Purchase']['item_id']);
echo $this->Html->link($purchase['Purchase']['item_id'], '/mails/view/'.$purchase['Purchase']['item_id']);
?>

</li>
<?php endforeach; ?>
</ul>