<?php echo $this->element('header'); ?>

<div class="container-fluid">
            <div class="row">
                
                    <h3 class="text-center"><?php echo $this->Session->flash(); ?> </h3>
                
            </div>
        </div>
		

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">ペアリング</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
		
	  <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">ペアリング成立</h3>
                </div>
            </div>
			
			
			    <div class="row">
        
        <?php foreach ($pairs as $pair): ?>        
        <div class="col-sm-3 text-center">
		<?php $id = AuthComponent::user('id'); ?>
		<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($pair['User']['photo_dir']); ?>/thumb150_<?php echo h($pair['User']['photo']); ?>" alt="サンプル" class="img-profile">
		<h3 class="text-center"><a href="http://www.mosio.me/falca/users/view/<?php echo h($pair['User']['id']); ?>"><?php echo h($pair['User']['name']); ?></a></h3>
		
		  
            
            </div>
			<?php endforeach; ?>
			
			    <?php
				if(empty($pair['User']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				いません。
				</div>
				
				<?php
				}
				?>
			
 </div>     
	  
		
       <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">ペアリング申請</h3>
                </div>
            </div>
			
			
			    <div class="row">
        
        <?php foreach ($follows as $follow): ?>        
        <div class="col-sm-3 text-center">
		<?php $id = AuthComponent::user('id'); ?>
		<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($follow['User']['photo_dir']); ?>/thumb150_<?php echo h($follow['User']['photo']); ?>" alt="サンプル" class="img-profile">
		<h3 class="text-center"><a href="http://www.mosio.me/falca/users/view/<?php echo h($follow['User']['id']); ?>"><?php echo h($follow['User']['name']); ?></a></h3>
		<span><a onClick="ajaxPostFunc('<?php echo $id; ?>', '<?php echo h($follow['User']['id']); ?>', '<?php echo h($follow['Follow']['id']); ?>');"><p class="button-pay">許可</p></a></span>
		  
            
            </div>
			<?php endforeach; ?>
			
			    <?php
				if(empty($follow['User']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				いません。
				</div>
				
				<?php
				}
				?>
			
 </div>     
                
               
				
		    <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">Facebookの友達</h3>
                </div>
            </div>
			
			
			    <div class="row">
        
        <?php foreach ($friends as $friend): ?>        
        <div class="col-sm-3 text-center">
		
		<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($friend['User']['photo_dir']); ?>/thumb150_<?php echo h($friend['User']['photo']); ?>" alt="サンプル" class="img-profile">
		<h3 class="text-center"><a href="http://www.mosio.me/falca/users/view/<?php echo h($friend['User']['id']); ?>"><?php echo h($friend['User']['name']); ?></a></h3>
		  
            
            </div>
			<?php endforeach; ?>
			
			    <?php
				if(empty($friend['User']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				いません。
				</div>
				
				<?php
				}
				?>
			
 </div>
			
				
				</div>
				<hr>
				
<script type="text/javascript">

$('.row .col-sm-3 span').click(function(){
    //クリックで親要素ごと削除する
    $(this).parent().remove();
});

</script>

<script type="text/javascript">
function ajaxPostFunc($param1, $param2, $param3){
	$.post("http://www.mosio.me/else/pairing.php", {input1:$param1, input2:$param2, input3:$param3});
}
</script>
				

<?php echo $this->element('footer'); ?>