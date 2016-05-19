<?php echo $this->element('header'); ?>

<div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">振込画面</h2>
                </div>
            </div>
            <hr>
        </div>
		
<?php
    //$datesが売上・利益を把握するためのものではないことに注意
	$uriage = 0;
	$genka = 0;
    foreach ($items as $item) {
        $sum1 = 0;
        foreach ($item['Purchase'] as $p1) {
            $sum1 += $p1['quantity'];
        }
        

$sale1 = $item['Item']['price'] * $sum1;
$uriage += $sale1;

if($sale1 <= 12000){
$profit1 = $sale1 * 0.8;

}elseif((12000 < $sale1) && ($sale1 <= 30000)){
$profit1 = $sale1 * 0.85;

}elseif((30000 < $sale1) && ($sale1 <= 50000)){
$profit1 = $sale1 * 0.9;

}elseif(50000 < $sale1){
$profit1 = $sale1 * 0.92;
}

$genka += $profit1;
    
    }
	
	$rieki = $uriage - $genka;
    
    ?>

<h3 class="text-center">総売上 <?php echo $uriage; ?>円</h3>
<h3 class="text-center">利益 <?php echo $rieki; ?>円</h3>
	<hr>		
	
<table class="sample2">
<thead>
<tr>
<th>レッスン名</th><th>氏名</th><th>銀行名</th><th>支店名</th><th>口座種類</th><th>口座番号</th><th>支払い金額</th><th>レッスン日時</th><th></th>
</tr>
</thead>

<?php
    //$datesが売上・利益を把握するためのものではないことに注意
	
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
<td><?php echo h($date['User']['name']); ?></td>
<td><?php echo h($date['User']['ginko']); ?></td>
<td><?php echo h($date['User']['shiten']); ?></td>
<td><?php echo h($date['User']['syurui']); ?></td>
<td><?php echo h($date['User']['koza']); ?></td>
<td><?php echo $profit; ?>円</td>
<td><?php echo $this->Time->format($date['Date']['date'], '%Y年%m月%d日 %H:%M'); ?></td>
<td><span><a onClick="ajaxPostFunc('<?php echo h($date['Date']['id']); ?>', '0');"><p class="button-pay">完了</p></a></span></td>
</tr>
</tbody>

<?php
    
    }
	
	$rieki = $uriage - $genka;
    
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

<script type="text/javascript">

$('table td span').click(function(){
    //クリックで親要素ごと削除する
    $(this).parent().parent().remove();
});

</script>

<script type="text/javascript">
function ajaxPostFunc($param1, $param2){
	$.post("http://www.mosio.me/else/lesson-pay.php", {input1:$param1, input2:$param2});
}
</script>

<?php echo $this->element('footer'); ?>
