<?php echo $this->element('header'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">メッセージ一覧</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            
            <div class="row">
                
                <?php
                    
                    $user = AuthComponent::user('which');
                    
                    if($user == 'trainer'){
                        
                        
                ?>


                <?php foreach ($items as $item): ?>
                
				<a href="http://www.mosio.me/falca/mails/view/<?php echo h($item['Item']['id']); ?>">
                <div class="text-center col-md-12">
				
                    <div class="well">
                        
                        
                        <?php echo h($item['Item']['title']); ?>
                        
                    </div>
					
                    </div>
					</a>
                
                <?php endforeach; ?>
                
                <?php
                    
                    
                    }elseif($user == 'enduser'){
                        
                        
                ?>
                
				<?php $hoge = array(); ?>
                
                <?php foreach ($purchases as $purchase): ?>
				
				<?php 
				
				$key = array_search($purchase['Item']['id'], $hoge);
				
				if($key === false) {
                ?>
				
				<a href="http://www.mosio.me/falca/mails/view/<?php echo h($purchase['Item']['id']); ?>">                
                <div class="text-center col-md-12">				
                    <div class="well">
                        
                        <?php
                            echo h($purchase['Item']['title']);
                            ?>
                        
                        
                    </div>
					
                </div>
				</a>
           
				
				<?php
				$hoge[] = $purchase['Item']['id'];
				
				}
				
								
				?>
				
                  <?php endforeach; ?>
                
                
                
                <?php
                
				
                    
                    }else{}
                        
                        
                ?>
				
				<?php
				if(empty($item['Item']['id']) && empty($purchase['Item']['id'])){
				?>
				
				<div class="text-center">
				ありません。
				</div>
				
				<?php
				}
				?>

				
				</div>
                </div>
                <hr>

<?php echo $this->element('footer'); ?>