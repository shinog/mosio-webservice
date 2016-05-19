<?php echo $this->element('header'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">購入したレッスン一覧</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
		
            
                
                <?php
                    
                    $user = AuthComponent::user('which');
                    
                    if($user == 'enduser'){
                        
                        
                ?>
				
		    <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">今後開催されるレッスン</h3>
                </div>
            </div>
			
			
			    <div class="row">
        
        <?php foreach ($afters as $after): ?>        
        <div class="col-sm-5 text-center">
            <a href="http://www.mosio.me/falca/items/detail/<?php echo h($after['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($after['Item']['photo_dir']); ?>/normal_<?php echo h($after['Item']['photo']); ?>" alt="サンプル" class="img-item">
           <p class="img_desc opa"><?php echo $this->Time->format($after['Date']['date'], '%m月%d日 %H:%M'); ?></p>
           </a>
            <?php echo $this->Html->link($after['Item']['title'], '/items/detail/'.$after['Item']['id']); ?>
            
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
				?>		


            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-center">終了したレッスン</h3>
                </div>
            </div>
			
			 <div class="row">
 　　　　　　　　　<ul style="list-style:none;">
                <?php foreach ($befores as $before): ?>
                <li>
                <div class="text-center col-md-12">
                    <div class="well">
                        
                        <?php
                            //echo h($item['Item']['title']);
                            echo $this->Html->link($before['Item']['title'], '/items/detail/'.$before['Item']['id']);
							echo '('.$this->Time->format($before['Date']['date'], '%m月%d日 %H:%M').')';
							echo '&nbsp;';
							echo '&nbsp;';
							echo $this->Html->link('レビュー', array('action'=>'review', $before['Purchase']['id']));


						?>
                        
                        
                    </div>
                    </div>
                </li>
                <?php endforeach; ?>
				</ul>
                
                <?php
                    
                    
                    }elseif($user == 'trainer'){
                        
                        
                ?>

                            echo '';                
          
                <?php
                    
                    
                    }else{}
                        
                        
                ?>
				
				</div>
				
				<?php
				if(empty($before['Item']['id'])){
				?>
				
				<div class="text-center">
				ありません。
				</div>
				
				<?php
				}
				?>
				
                </div> 
                <hr>


<?php echo $this->element('footer'); ?>