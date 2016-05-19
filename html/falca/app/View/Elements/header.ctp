<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>
<meta name="description" content="「mosio」は、全国で1回のレッスンから始められるフィットネスクラブです。厳選されたインストラクター・トレーナー・セラピストのヨガ、ピラティス、各種トレーニングのレッスン・サービスを、年会費無料であなたのお住まい近くで、気軽に楽しく始めることができます。" />
<meta property="og:title" content="mosio" />
<meta property="og:description" content="「mosio」は、全国で1回のレッスンから始められるフィットネスクラブです。厳選されたインストラクター・トレーナー・セラピストのヨガ、ピラティス、各種トレーニングのレッスン・サービスを、年会費無料であなたのお住まい近くで、気軽に楽しく始めることができます。" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.mosio.me/" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:image" content="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/index-new/mv_01.jpg" />

<link rel="shortcut icon" type="image/png" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/favicon.png">
<link rel="apple-touch-icon" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/bookmark-icon.png">

<!-- Bootstrap -->
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/bootstrap.css" rel="stylesheet">
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/contents.css" rel="stylesheet">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/mail-detail/js/jquery-1.11.2.min.js"></script>
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
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="http://www.mosio.me/"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
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
                                 
                                     echo $this->Html->link('ペアリング', array('controller'=>'items', 'action'=>'friend'));
                                 
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
                                 
                                     echo $this->Html->link('ペアリング', array('controller'=>'items', 'action'=>'friend'));
                                 
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
                                <li><a href="http://www.mosio.me/falca/abouts/">mosioとは</a></li>
                                <li><a href="http://www.mosio.me/falca/abouts/userguide">ご利用の流れ(ユーザーガイド)</a></li>
                                <li><a href="http://www.mosio.me/falca/abouts/trainguide">ご利用の流れ(トレーナーガイド)</a></li>
                           
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