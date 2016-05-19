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
<meta property="og:image" content="" />

     <link rel="shortcut icon" type="image/png" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/favicon.png">
	 <link rel="apple-touch-icon" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/bookmark-icon.png">
                    
                    <!-- Bootstrap -->
                    <link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/profile/bootstrap.css" rel="stylesheet">
                        
                        
                        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                         <![endif]-->
						 
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/demo/stylesheets/labs.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/jquery.raty.css">
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/vendor/jquery.js"></script><script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/jquery.raty.js"></script>
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/demo/javascripts/labs.js" type="text/javascript"></script>


<script>
$(function(){
   $('.setflash').fadeOut('slow');
   });
</script>


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
                    <a class="navbar-brand" href="http://www.mosio.me/falca/"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
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
                            <li><a href="http://www.mosio.me/falca/users/logout">ログアウト</a></li>
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
                            <li><a href="http://www.mosio.me/falca/users/logout">ログアウト</a></li>
                        </ul>
                        </li>
                    </ul>
                    
                    
                    <?php
                        
                        
                        }else{
                            
                            
                        ?>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://www.mosio.me/falca/users/login">ログイン</a></li>
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
		
<?php 
$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$userr='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$userr,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       $sql="SELECT which, name, intro, merit, career, photo, photo_dir FROM users WHERE id = ".$itemid;

        $stmt=$dbh->prepare($sql);

        $stmt->execute();

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

?>	


<div class="container-fluid">
            <div class="row">
                
                    <h3 class="text-center"><?php echo $this->Session->flash(); ?> </h3>
                
            </div>
            <hr>
        </div>
        

<div class="container-fluid">
<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo $rec['photo_dir']; ?>/big_<?php echo $rec['photo']; ?>" alt="サンプル" class="profile">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><?php echo $rec['name']; ?></h1>
    </div>
  </div>
  
  
<?php  
if($id == $itemid){
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h3 class="text-center">
    <a href="/falca/users/edit"><p class="button-fav">編集</p></a>
    </h3>
  </div>
</div>

<?php  
if($user == 'trainer'){
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h3 class="text-center">
    <a href="/falca/users/transfer_edit"><p class="button-fav">振込先の追加</p></a>
    </h3>
  </div>
</div>

<?php 
}
?>  

<?php 
}else{
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h3 class="text-center">

<?php
			
			if(isset($follow['Follow']['id'])){
			?>
			<p class="fav-ex2"><a onClick="ajaxPostFunc('<?php echo $id; ?>', '<?php echo $itemid; ?>');"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/heart-after.png"></a></p>
			<?php
			}else{
			?>
			<p class="img-fav"><a onClick="ajaxPostFunc('<?php echo $id; ?>', '<?php echo $itemid; ?>');"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/heart-before.png"></a></p>
			<?php
			}
			?>

</h3>
  </div>
</div>			 

<?php
}
?>  
  
  <hr>  
</div>

<script type="text/javascript">

$(function() {
$(".fav-ex2").click(function () {
$(this).toggleClass("img-fav2");
});
});
</script>

<script type="text/javascript">

$(function() {
$(".img-fav").click(function () {
$(this).toggleClass("fav-ex");
});
});
</script>

<script type="text/javascript">
function ajaxPostFunc($param1, $param2){
	$.post("http://www.mosio.me/else/favorite-map.php", {input1:$param1, input2:$param2});
}
</script>

<?php
if($rec['which'] == 'enduser'){
?>

<div class="container">
  <div class="row text-center">
<?php echo nl2br($rec['intro']); ?>
  </div>
</div>
<hr>

<?php
}else{
?>

<div class="container">
  <div class="row text-center">
<?php echo nl2br($rec['merit']); ?>
  </div>
</div>

<div class="container">
  <div class="row text-center">
<?php echo nl2br($rec['career']); ?>
  </div>
</div>

<div class="row">
<div class="col-md-6 col-md-offset-3">
<h2 class="text-center">レビュー</h2>
</div>
<div class="col-md-6 col-md-offset-3">
<h4 class="text-center">総合評価: 

<div id="star"></div>

<script type="text/javascript">

  $.fn.raty.defaults.path = 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/images';

    $('#star').raty({ readOnly: true, score: <?php echo h($avg['0']['avgFun']); ?> });
</script>
</div>
</div>

<?php
 if(empty($avg['0']['avgFun'])){
 ?>
 <div class="container">
  <div class="row text-center">
ありません。
  </div>
</div>
<?php
}
?>
  



<?php foreach ($purchases as $purchase): ?>


<div class="row">
<div class="text-center col-sm-5">
<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($purchase['User']['photo_dir']); ?>/thumb150_<?php echo h($purchase['User']['photo']); ?>" alt="サンプル" class="img-profile">
<?php echo h($purchase['User']['name']); ?>
</div>
<div class="text-center col-sm-5">
レッスン名:<br/> 
<?php echo h($purchase['Item']['title']); ?><br/>
<br/>
評価: 

<div id="<?php echo h($purchase['Purchase']['id']); ?>"></div>

<script type="text/javascript">

  $.fn.raty.defaults.path = 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/images';

    $('#<?php echo h($purchase['Purchase']['id']); ?>').raty({ readOnly: true, score: <?php echo h($purchase['Purchase']['fun']); ?> });
</script>

<?php echo h($purchase['Purchase']['comment']); ?>
</div>
</div>
<hr>

<?php endforeach; ?>

<div class="row text-center">
	<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
    </ul>   
</div>	

<div class="container">
   <div class="row text-center">
  </div>
  <hr>
 <div class="row">
 <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center">近日開催されるレッスン</h2>
    </div>
 
 <?php foreach ($items as $item): ?>
 
 <div class="col-sm-4 text-center">
     <a href="http://www.mosio.me/falca/items/detail/<?php echo h($item['Item']['id']); ?>">
     <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/normal_<?php echo h($item['Item']['photo']); ?>" alt="サンプル" class="img-item">
     </a>
         <?php
             //echo h($item['Item']['title']);
             echo $this->Html->link($item['Item']['title'], '/items/detail/'.$item['Item']['id']);
             ?>
    </div>
 
 <?php endforeach; ?>
 
 
  </div>
  
<?php
 if(empty($item['Item']['id'])){
 ?>
 <div class="container">
  <div class="row text-center">
ありません。
  </div>
</div>
<?php
}
?>
  
 
  </div>
  <hr>
  
  </div>
  
<?php
}
?>

<div class="container-fluid">
  <div class="row">
    
  </div>
</div>

  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <p>Copyright &copy; 2015 FALCA, Inc. All Rights Reserved</p>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/profile/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/profile/bootstrap.js"></script>
</body>
</html>
