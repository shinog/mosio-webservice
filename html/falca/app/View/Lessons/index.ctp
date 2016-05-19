<h2>レッスン一覧</h2>

<ul>
<?php foreach ($items as $item): ?>
<li>
<?php 
//echo h($item['Lesson']['title']);
echo $this->Html->link($item['Lesson']['title'], '/lessons/view/'.$item['Lesson']['id']);
?>
</li>
<?php endforeach; ?>
</ul>