<h2>レッスン一覧</h2>

<ul>
<?php foreach ($items as $item): ?>
<li>
<?php 
//echo h($item['Item']['title']);
echo $this->Html->link($item['Item']['title'], '/items/detail/'.$item['Item']['id']);
?>

</li>
<?php endforeach; ?>
</ul>