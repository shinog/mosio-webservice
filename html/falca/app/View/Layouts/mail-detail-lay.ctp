<?php echo $this->element('header'); ?>
                
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center"><?php echo h($item['Item']['title']); ?></h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">
              
              
              <?php
                  $user = AuthComponent::user('id');
                  
				  if(isset($purchase['Purchase']['id']) || $item['Item']['whom'] == $user){
                  
                  echo $this->Form->create('Mail', array(
                                                         'action' => 'add/'.$itemid,
                                                         'id' => 'form',
                                                         ));
                                                         echo $this->Form->input('content', array('class' => 'form-control', 'style' => 'height:150px', 'label' => false));
                                                         echo $this->Form->hidden('who', array('value' => $user));
                                                         echo $this->Form->hidden('item_id', array('value' => $itemid));
                                                         
                  ?>
              <div>
                  <?php
                      echo $this->Form->submit('メッセージを送信', array(
                                                                 'div' => false,
																 'class' => 'btn btn-lg btn-default',
                                                                 ));
                      ?>
              </div>
            </div>
            <?php echo $this->Form->end(); ?>
            
            
            </div>
            
            <hr>
			 <div class="container">
            <div class="row">
                
                <?php foreach ($mails as $mail): ?>
                
                <div class="text-center col-md-12">
				
				<?php
					if($user == $mail['User']['photo_dir']){
					?>
					
					<div class="text-right">
					<?php echo $this->Time->format($mail['Mail']['created'], '%m月%d日 %H:%M'); ?>
					</div>
					
					<?php
					}else{
					?>
					
					<div class="text-left"><?php echo $this->Time->format($mail['Mail']['created'], '%m月%d日 %H:%M'); ?></div>
					
					<?php
					}
                    ?>
				
				
				    
                    <div class="comment">
                        
                    <?php echo nl2br($mail['Mail']['content']); ?>
                        
                        
                    </div>
					
					<?php
					if($user == $mail['User']['photo_dir']){
					?>
					
					<div class="sankaku-right"></div>
                    <div class="message-detail">
                    <img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($mail['User']['photo_dir']); ?>/thumb150_<?php echo h($mail['User']['photo']); ?>" alt="サンプル" class="profile-right">                         
                    <div class="text-right name-right">
					
					
					<?php
					if($mail['User']['which'] == 'trainer'){
					?>
					トレーナー<br/>
					<?php
					}
					?>
					
					
					<?php echo h($mail['User']['name']); ?>
					</div>
                    </div>
					
					
					<?php
					}else{
					?>
					
					<div class="sankaku-left"></div>
                    <div class="message-detail">
                    <img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($mail['User']['photo_dir']); ?>/thumb150_<?php echo h($mail['User']['photo']); ?>" alt="サンプル" class="profile-left">                         
                    <div class="text-left name-left">
					
					<?php
					if($mail['User']['which'] == 'trainer'){
					?>
					トレーナー<br/>
					<?php
					}
					?>
					
					<?php echo h($mail['User']['name']); ?>
					</div>
                    </div>
					
					<?php
					}
                    ?>
                    
                     </div>
                    
                    <?php endforeach; ?>
					
					<?php
					}
                    ?>
                
                
				
				
			<div class="text-center col-md-12">
                    <div class="comment">
                        
                    このグループメッセージを通して、<br/>
					参加者同士の交流やレッスンへの質問等が出来ます。					   
                        
                    </div>
                </div>	
				
				
            </div>
			</div>
			<hr>
            
<?php echo $this->element('footer'); ?>
