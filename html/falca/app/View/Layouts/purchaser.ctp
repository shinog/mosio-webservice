<?php echo $this->element('header'); ?>

<table class="sample2">
<thead>
<tr>
<th></th><th>氏名</th><th>プロフィール</th>
</tr>
</thead>

<?php
    
    foreach ($purchases as $purchase) {
       
        
?>

<tbody>
<tr>
<td><img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($purchase['User']['photo_dir']); ?>/<?php echo h($purchase['User']['photo']); ?>" alt="サンプル" class="img-icon"></td>
<td><?php echo h($purchase['User']['name']); ?></td>
<td><?php echo h($purchase['User']['intro']); ?></td>
</tr>
</tbody>

<?php
    
    }
    
    ?>

</table>

				<?php
				if(empty($purchase['User']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				購入された方はまだいません。
				</div>
				
				<?php
				}
				?>		

<hr>



<?php echo $this->element('footer'); ?>
