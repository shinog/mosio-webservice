<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>

<link rel="shortcut icon" type="image/png" href="http://liveself.me/design/top/favicon.png">

<!-- Bootstrap -->
<link href="http://shinog.heteml.jp/liveself.me/design/profile/bootstrap.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="http://liveself.me/raty-2.7.0/demo/stylesheets/labs.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://liveself.me/raty-2.7.0/lib/jquery.raty.css">
<script src="http://liveself.me/raty-2.7.0/vendor/jquery.js"></script><script src="http://liveself.me/raty-2.7.0/lib/jquery.raty.js"></script>
<script src="http://liveself.me/raty-2.7.0/demo/javascripts/labs.js" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="http://www.mosio.me/falca/"><img src="http://liveself.me/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="defaultNavbar1">

<?php
    
    $user = AuthComponent::user('which');

    $name = AuthComponent::user('name');
    $merit = AuthComponent::user('merit');
    $career = AuthComponent::user('career');


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

<?php
    
    echo $this->Html->link('アカウント', array('controller'=>'users', 'action'=>'profile'));
    
    ?>


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
                                 
                                     echo $this->Html->link('お気に入り', array('controller'=>'favorites', 'action'=>'index'));
                                 
                             ?>


                             </li>
<li>

<?php
    
    echo $this->Html->link('購入履歴', array('controller'=>'purchases', 'action'=>'index'));
    
    ?>


</li>
<li>

<?php
    
    echo $this->Html->link('アカウント', array('controller'=>'users', 'action'=>'profile'));
    
    ?>



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


<div class="container-fluid">
<img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo $photo_dir; ?>/big_<?php echo $photo; ?>" alt="サンプル" class="profile">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1 class="text-center"><?php echo $name; ?></h1>
</div>
</div>
<hr>
</div>

<div class="container">
<div class="row text-center">
<?php echo $merit; ?>
</div>
</div>

<div class="container">
<div class="row text-center">
<?php echo $career; ?>
</div>
</div>

<hr>

<div class="row">
<div class="col-md-6 col-md-offset-3">
<h2 class="text-center">
<a href="/falca/users/edit"><p class="button-fav">編集</p></a>
</h2>
</div>
</div>
</div>

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
             <script src="http://liveself.me/design/profile/jquery-1.11.2.min.js"></script>
             
             <!-- Include all compiled plugins (below), or include individual files as needed -->
             <script src="http://liveself.me/design/profile/bootstrap.js"></script>
             </body>
             </html>
