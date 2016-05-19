<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>

<link rel="shortcut icon" type="image/png" href="http://liveself.me/design/top/favicon.png">
<link rel="apple-touch-icon" href="http://liveself.me/design/top/bookmark-icon.png">

<!-- Bootstrap -->
<link href="http://shinog.heteml.jp/liveself.me/design/common/bootstrap.css" rel="stylesheet">
<link href="http://liveself.me/design/common/contents.css" rel="stylesheet">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="http://shinog.heteml.jp/liveself.me/design/mail-detail/js/jquery-1.11.2.min.js"></script>
		
		<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAUiSm4yE-UDgb8kviBG-3fxTET7FL1OGiEo0132Tsz7xytqsKmxTD2VNE7QBz0JNWWmZzj89DQ44VNA&sensor=false"
            type="text/javascript" charset="utf-8"></script>
    <script src="http://liveself.me/design/common/geocode.js" type="text/javascript"></script>
	
<script>
$(function(){
   $('.setflash').fadeOut('slow');
   });
</script>

<script>
$(function () {
    setTimeout('rect()'); //アニメーションを実行
});

function rect() {
    $('.balloon').animate({
        marginTop: '-=20px'
    }, 800).animate({
        marginTop: '+=20px'
    }, 800);
    setTimeout('rect()', 1600); //アニメーションを繰り返す間隔
}
</script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68093094-1', 'auto');
  ga('send', 'pageview');

</script>
	
	
</head>
<body onload="initialize()" onunload="GUnload()">
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="http://www.mosio.me/"><img src="http://liveself.me/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
    
                <?php
                    
                    $user = AuthComponent::user('which');
					$id = AuthComponent::user('id');
					$photo = AuthComponent::user('photo');
					$photo_dir = AuthComponent::user('photo_dir');
                    
                    if($user == 'trainer'){
                    
                    
                ?>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        
                        
                        <?php
                            echo $this->Html->link('メッセージ', array('controller'=>'mails', 'action'=>'index'));
                            ?>


                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo $photo_dir; ?>/thumb150_<?php echo $photo; ?>" alt="サンプル" class="img-icon">
						<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
							 <li>
                             
                             <?php
                                 
                                     echo $this->Html->link('ダッシュボード', array('controller'=>'items', 'action'=>'trainer_dashboard'));
                                 
                             ?>


                             </li>
							    
							
                                <li>
								
								 <?php
                                    
                                        echo $this->Html->link('レッスンの追加', array('controller'=>'items', 'action'=>'add'));
                                        
                                ?>

								
								</li>
                                <li>
                                
                                <?php
                                    
                                        echo $this->Html->link('My レッスン', array('controller'=>'items', 'action'=>'index'));
                                        
                                ?>

                                
                                </li>
								<li>
                                
                                <?php
                                    
                                        echo $this->Html->link('売上', array('controller'=>'items', 'action'=>'sale'));
                                        
                                ?>

                                
                                </li>
                                <li>

<a href="http://www.mosio.me/users/view/<?php echo $id; ?>">アカウント</a>

                                </li>
                                <li class="divider"></li>
                                <li><a href="http://www.mosio.me/users/logout">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    
                 <?php
                     
                     
                     }elseif($user == 'enduser'){
                         
                         
                ?>
                 
                 <ul class="nav navbar-nav navbar-right">
                     <li>
                     
                     
                     <?php
                         echo $this->Html->link('メッセージ', array('controller'=>'mails', 'action'=>'index'));
                         ?>
                     
                     
                     </li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					 <img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo $photo_dir; ?>/thumb150_<?php echo $photo; ?>" alt="サンプル" class="img-icon">
					 <span class="caret"></span></a>
                         <ul class="dropdown-menu" role="menu">
						     <li>
                             
                             <?php
                                 
                                     echo $this->Html->link('ダッシュボード', array('controller'=>'items', 'action'=>'dashboard'));
                                 
                             ?>


                             </li>
							 <li>
                             
                             <?php
                                 
                                     echo $this->Html->link('お気に入り', array('controller'=>'favorites', 'action'=>'index'));
                                 
                             ?>


                             </li>
                             <li>
                             
                             <?php
                                 
                                     echo $this->Html->link('購入履歴', array('controller'=>'purchases', 'action'=>'index'));
                                 
                             ?>


                             </li>
                             <li>


<a href="http://www.mosio.me/users/view/<?php echo $id; ?>">アカウント</a>





</li>

                             <li class="divider"></li>
                             <li><a href="http://www.mosio.me/users/logout">ログアウト</a></li>
                         </ul>
                     </li>
                 </ul>
                 
                 
                 <?php
                     
                     
                     }else{
                         
                         
                ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://www.mosio.me/users/login">ログイン</a></li>
                        <li><a href="http://www.mosio.me/falca/signup">新規登録</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ヘルプ<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    
                    <?php
                        
                        }
                            
                     ?>



    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<?php
$user = AuthComponent::user('id');

                    $name = AuthComponent::user('name');
					
					$photo = AuthComponent::user('photo');
?>					

<?php					
if($photo == '' || $name == ''){
?>
       <div class="container-fluid">
            <div class="row">
                
                    <h3 class="text-center"><a href="/falca/users/edit"><div id="flashMessage" class="urge">プロフィールを完成してください。</div></a></h3>
               
            </div>
        </div>
<?php
}
?>

       <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center">レッスンを登録する</h2>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">

<form method="post" action="http://www.mosio.me/else/item-make.php">            
 
           <div>
           
              <div class="input-group input-group-lg"><span class="input-group-addon">タイトル *</span>
                <input type="text" name="title" class="form-control" placeholder="例) ">
              </div>
               <div class="input-group input-group-lg"><span class="input-group-addon">内容 *</span>
                <textarea name="content" style="height:100px;" class="form-control" placeholder="例) "></textarea>
              </div>
              <div class="input-group input-group-lg"><span class="input-group-addon">価格 *</span>
                <input type="text" name="price" class="form-control" placeholder="例) ">
                <span class="input-group-addon">円</span></div>
              <div class="input-group input-group-lg"><span class="input-group-addon">所要時間 *</span>
                <input type="time" name="spend" class="form-control">
              </div>
             <div class="input-group input-group-lg"><span class="input-group-addon">目的 *</span>
                <select name="purpose" class="form-control">
<option value="weight">痩せたい</option> <option value="train">鍛えたい</option> <option value="stress">ストレス発散したい</option> <option value="exercise">健康を維持したい</option><br />
</select>
              </div>
			  <div class="input-group input-group-lg"><span class="input-group-addon">ジャンル *</span>
                <select name="category" class="form-control">
<option value="bodymake">ボディメイク</option> <option value="diet">ダイエット</option> <option value="fasting">ファスティング</option> <option value="recovery">カラダ回復</option> <option value="yoga">ヨガ</option> <option value="pilates">ピラティス</option> <option value="activity">アクティビティ</option> <option value="food">フード</option><br />
</select>
              </div>
              
              <div class="input-group input-group-lg"><span class="input-group-addon">開催場所 *</span>
                <input type="text" name="adress" id="address" class="form-control" placeholder="例) ">
              </div>
			  <input type="button" id="addressbtn" value="住所を確認する" class="btn btn-lg btn-default" onclick="moveAddress()" />
              <div id="map_canvas" style="width: 100%; height: 150px"></div>
              
     </div>
     
     <input type="hidden" name="whom" value="<?php echo $user ?>">

<br/>


<?php					
if($photo != '' && $name != ''){
?>
※価格と開催時間は変更出来ません。<br/>
また画像の追加は登録後、編集画面にて行えます。
<p><input type="submit" value="登録" class="btn btn-lg btn-default"></p>
<?php
}else{
?>
※プロフィールを完成させると、登録ボタンが表示されます。
<?php
}
?>

</form>

            </div>
            
            </div>
           <hr>

<?php echo $this->element('footer'); ?>
