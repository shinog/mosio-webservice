<table>
     
    <tr>
        <th>id</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>目的</th>
    </tr>
     
    <?php foreach ($datas as $record): ?>
    <tr>
        <td><?php echo $record['Item']['id']; ?></td>
        <td><?php echo $record['Item']['title']; ?></td>
        <td><?php echo $record['Item']['content']; ?></td>
        <td><?php echo $record['Item']['purpose']; ?></td>
    </tr>
    <?php endforeach; ?>
     
</table>

<?php
echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => '')); 
echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
?>

