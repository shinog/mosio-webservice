<?php echo $this->element('header'); ?>

<table class="sample2">
<thead>
<tr>
<th>レッスン名</th><th>価格</th><th>数量</th><th>売上</th><th>報酬</th><th>開催日時</th><th>振込状況</th>
</tr>
</thead>

<?php
    
    foreach ($dates as $date) {
        $sum = 0;
        foreach ($date['Purchase'] as $p) {
            $sum += $p['quantity'];
        }
        
?>

<?php

$sale = $date['Item']['price'] * $sum;

if($sale <= 12000){
$profit = $sale * 0.8;

}elseif((12000 < $sale) && ($sale <= 30000)){
$profit = $sale * 0.85;

}elseif((30000 < $sale) && ($sale <= 50000)){
$profit = $sale * 0.9;

}elseif(50000 < $sale){
$profit = $sale * 0.92;
}

?>

<tbody>
<tr>
<td><?php echo h($date['Item']['title']); ?></td>
<td><?php echo h($date['Item']['price']); ?>円</td>
<td><?php echo $sum; ?>枚</td>
<td><?php echo $sale; ?>円</td>
<td><?php echo $profit; ?>円</td>
<td><?php echo h($date['Date']['date']); ?></td>
<td>
<?php
if($date['Date']['paid'] == 1){
echo '振込完了';
}else{
echo '未振込';
}
?>
</td>
</tr>
</tbody>

<?php
    
    }
    
    ?>

</table>

				<?php
				if(empty($date['Date']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				ありません。
				</div>
				
				<?php
				}
				?>		

<hr>



<?php echo $this->element('footer'); ?>
