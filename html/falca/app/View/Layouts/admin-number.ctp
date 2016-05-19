<?php echo $this->element('header'); ?>


<div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">利用者の確認</h2>
                </div>
            </div>
            <hr>
        </div>

<h3 class="text-center">エンドユーザー <?php echo h($countenduser['0']['countEnduser']); ?>人</h3>
<h3 class="text-center">トレーナー <?php echo h($counttrainer['0']['countTrainer']); ?>人</h3>
	<hr>				
	
<table class="sample2">
<thead>
<tr>
<th></th><th>氏名</th><th>ユーザー状態</th><th></th>
</tr>
</thead>

<?php
    
	
    foreach ($users as $user) {
      
        
?>


<tbody>
<tr>
<td><img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($user['User']['photo_dir']); ?>/thumb150_<?php echo h($user['User']['photo']); ?>" alt="サンプル" class="img-icon"></td>
<td><a href="http://www.mosio.me/users/view/<?php echo h($user['User']['id']); ?>"><?php echo h($user['User']['name']); ?></a></td>
<td>
<?php 
if($user['User']['which'] == 'trainer') {
echo "トレーナー";
}elseif($user['User']['which'] == 'enduser') {
echo "エンドユーザー";
}
?>
</td>
<td><a href="http://www.mosio.me/falca/users/admin_edit/<?php echo h($user['User']['id']); ?>"><p class="button-pay">編集</p></a></td>
</tr>
</tbody>

<?php
    
    }
	
    
    ?>

</table>


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