<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>FALCA</title>
                    
                    <!-- Bootstrap -->
                    <link href="http://liveself.me/design/index/bootstrap.css" rel="stylesheet">
                        
                        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                         <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#">FALCA</a></div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="defaultNavbar1">
                    
                <?php
                    
                    $user = AuthComponent::user('which');
                    
                    if($user == 'trainer'){
                    
                    
                ?>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        
                        
                        <?php
                            echo $this->Html->link('メッセージ', array('controller'=>'mails', 'action'=>'index'));
                            ?>


                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">アイコン<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">レッスンの追加</a></li>
                                <li>
                                
                                <?php
                                    
                                        echo $this->Html->link('My レッスン', array('controller'=>'items', 'action'=>'index'));
                                        
                                ?>

                                
                                </li>
                                <li>

<?php

echo $this->Html->link('アカウント', array('controller'=>'users', 'action'=>'profile'));

?>


                                </li>
                                <li class="divider"></li>
                                <li><a href="http://liveself.me/falca/users/logout">ログアウト</a></li>
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
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">アイコン<span class="caret"></span></a>
                         <ul class="dropdown-menu" role="menu">
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
                             <li><a href="http://liveself.me/falca/users/logout">ログアウト</a></li>
                         </ul>
                     </li>
                 </ul>
                 
                 
                 <?php
                     
                     
                     }else{
                         
                         
                ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://liveself.me/falca/users/login">ログイン</a></li>
                        <li><a href="http://liveself.me/falca/signup">新規登録</a></li>
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

                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center">さあ、からだを動かそう</h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">
                <form class="navbar-form navbar-left" role="search" method="post" action="http://liveself.me/search/geo-done.php">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="どちらにお住まいですか?">
                            </div>
                    <button type="submit" class="btn btn-default">検索</button>
                </form>
            </div>
            <hr>
            <div class="row">
                <div class="text-justify col-sm-4"> Click here to select this<strong> column.</strong> Always place your content within a column. Columns are indicated by a dashed blue line. </div>
                <div class="col-sm-4 text-justify"> You can <strong>resize a column</strong> using the handle on the right. Drag it to increase or reduce the number of columns.</div>
                <div class="col-sm-4 text-justify"> You can <strong>offset a column</strong> using the handle on the left. Drag it to increase or reduce the offset. </div>
            </div>
            <hr>
            <div class="row">
                <div class="text-center col-md-12">
                    <div class="well">
                        <form>
                            <input type="text" placeholder="どちらにお住まいですか?">
                                <button type="submit">検索</button>
                                </form></div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <h4>FALCAについて</h4>
                <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
            </div>
            <div class="text-center col-sm-4">
                <h4>レッスンを購入する</h4>
                <p>Using the insert panel, add labels to your page by using the label component.</p>
            </div>
            <div class="text-center col-sm-4">
                <h4>レッスンを登録する</h4>
                <p>You can also add glyphicons to your page from within the insert panel.</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="text-center col-md-6 col-md-offset-3">
                <p>Copyright &copy; 2015 FALCA, Inc. All Rights Reserved</p>
            </div>
        </div>
        <hr>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="http://liveself.me/design/index/jquery-1.11.2.min.js"></script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="http://liveself.me/design/index/bootstrap.js"></script>
    </body>
</html>