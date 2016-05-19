<?php echo $this->element('header'); ?>

<div class="container-fluid">
            <div class="row">
                
                    <h3 class="text-center"><?php echo $this->Session->flash(); ?> </h3>
                
            </div>
        </div>
		

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">登録したレッスン一覧</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
		
            
                
                <?php
                    
                    $user = AuthComponent::user('which');
                    
                    if($user == 'trainer'){
                        
                        
                ?>
				
		    <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center"></h3>
                </div>
            </div>
			
			
			    <div class="row">
        
        <?php foreach ($afters as $after): ?>        
        <div class="col-sm-8 text-center">
            <a href="http://www.mosio.me/falca/items/view/<?php echo h($after['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($after['Item']['photo_dir']); ?>/normal_<?php echo h($after['Item']['photo']); ?>" alt="サンプル" class="img-item">
           
            <?php echo $this->Html->link($after['Item']['title'], '/items/view/'.$after['Item']['id']); ?>    
            
            </div>
			<?php endforeach; ?>
 </div>
			

                <?php
				if(empty($after['Item']['id'])){
				?>
				
				<br/>
				<div class="text-center">
				ありません。
				</div>
				
				<?php
				}
				}
				?>		
				
				</div>
				<hr>

<?php echo $this->element('footer'); ?>