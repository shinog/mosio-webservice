<?php echo $this->element('header'); ?>

<div class="container-fluid dash">
  <div class="row dash-contents">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center dash-comment">今日もしっかり楽しみましょう。</h2>
    </div> 
  </div>
  <img src="http://liveself.me/design/common/img/balloon.svg" class="balloon hidden-xs">
  <img src="http://liveself.me/design/common/img/house.svg" class="house hidden-xs">
  <img src="http://liveself.me/design/common/img/people.svg" class="person hidden-xs">
    
</div>
<div class="container-fluid dash2">
  <div class="row dash-contents">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center dash-comment">※新しい機能を実装中です。</h3>
	  
	  

<?php
    
	$total = 0;
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

$total += $profit;

    }
    
    ?>
	
	<h3 class="text-center dash-comment">報酬の合計</h3>
	<h2 class="text-center dash-comment">￥<?php echo $total; ?></h2>
	<div class="row text-center"><a href="http://www.mosio.me/falca/items/sale">明細はこちら</a></div>
	  
    </div> 
  </div>   
</div>
<div class="container-fluid dash3">
  <div class="row dash-contents">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center dash-comment">レッスンの日程</h3>
    </div> 
  </div>

	    <div class="row">
        <h2 class="text-center dash-comment">今日</h2>
		
        <?php foreach ($dates as $date): ?>   

<?php
$today = date("Y-m-d");
$time = $this->Time->format($date['Date']['date'], '%Y-%m-%d');
$dif = (strtotime($time)-strtotime($today))/(3600*24);

if($dif == '0'){
?>
	 
        <div class="col-sm-4 text-center">
		
		
            <a href="http://www.mosio.me/falca/items/view/<?php echo h($date['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($date['Item']['photo_dir']); ?>/normal_<?php echo h($date['Item']['photo']); ?>" alt="サンプル" class="img-item">
           <p class="img_desc opa"><?php echo $this->Time->format($date['Date']['date'], '%H:%M'); ?></p>
            <?php echo $this->Html->link($date['Item']['title'], '/items/view/'.$date['Item']['id']); ?>    
			
            </div>
			
			<?php
			}
			?>
			
			<?php endforeach; ?>		
			
			
 </div>
 
 	    <div class="row">
        <h2 class="text-center dash-comment">明日</h2>
		
        <?php foreach ($dates as $date): ?>   

<?php
$today = date("Y-m-d");
$time = $this->Time->format($date['Date']['date'], '%Y-%m-%d');
$dif = (strtotime($time)-strtotime($today))/(3600*24);

if($dif == '1'){
?>
	 
        <div class="col-sm-4 text-center">
		
		
            <a href="http://www.mosio.me/falca/items/view/<?php echo h($date['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($date['Item']['photo_dir']); ?>/normal_<?php echo h($date['Item']['photo']); ?>" alt="サンプル" class="img-item">
           <p class="img_desc opa"><?php echo $this->Time->format($date['Date']['date'], '%H:%M'); ?></p>
            <?php echo $this->Html->link($date['Item']['title'], '/items/view/'.$date['Item']['id']); ?>    
			
            </div>
			
			<?php
			}
			?>
			
			<?php endforeach; ?>

		
 </div>
 
 <div class="row">
        <h2 class="text-center dash-comment">今週</h2>
		
        <?php foreach ($dates as $date): ?>   

<?php
$today = date("Y-m-d");
$time = $this->Time->format($date['Date']['date'], '%Y-%m-%d');
$dif = (strtotime($time)-strtotime($today))/(3600*24);

if((2 < $dif) && ($dif <= 7)){
?>
	 
        <div class="col-sm-4 text-center">
		
		
            <a href="http://www.mosio.me/falca/items/view/<?php echo h($date['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($date['Item']['photo_dir']); ?>/normal_<?php echo h($date['Item']['photo']); ?>" alt="サンプル" class="img-item">
           <p class="img_desc opa"><?php echo $this->Time->format($date['Date']['date'], '%d日 %H:%M'); ?></p>
            <?php echo $this->Html->link($date['Item']['title'], '/items/view/'.$date['Item']['id']); ?>    
			
            </div>
			
			<?php
			}
			?>
			
			<?php endforeach; ?>

		
 </div>
 
 <div class="row">
        <h2 class="text-center dash-comment">来週</h2>
		
        <?php foreach ($dates as $date): ?>   

<?php
$today = date("Y-m-d");
$time = $this->Time->format($date['Date']['date'], '%Y-%m-%d');
$dif = (strtotime($time)-strtotime($today))/(3600*24);

if((7 < $dif) && ($dif <= 14)){
?>
	 
        <div class="col-sm-4 text-center">
		
		
            <a href="http://www.mosio.me/falca/items/view/<?php echo h($date['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($date['Item']['photo_dir']); ?>/normal_<?php echo h($date['Item']['photo']); ?>" alt="サンプル" class="img-item">
           <p class="img_desc opa"><?php echo $this->Time->format($date['Date']['date'], '%d日 %H:%M'); ?></p>
            <?php echo $this->Html->link($date['Item']['title'], '/items/view/'.$date['Item']['id']); ?>    
			
            </div>
			
			<?php
			}
			?>
			
			<?php endforeach; ?>

		
 </div>
   
</div>

 <?php echo $this->element('footer'); ?>