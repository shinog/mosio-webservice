<body onload="load()">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#">FALCA</a></div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="defaultNavbar1">
                
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">ログイン</a></li>
                    <li><a href="#">新規登録</a></li>
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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="map" style="width: 100%; height: 400px"></div>
            </div>
        </div>
        <hr>
    </div>
    
    
    <div class="row">
        
        <?php foreach ($items as $item): ?>
        
        <div class="col-sm-4 text-center">
            
            <?php
                //echo h($item['Item']['title']);
                echo $this->Html->link($item['Item']['title'], '/items/detail/'.$item['Item']['id']);
                ?>
        </div>
        
        <?php endforeach; ?>
        
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
    <script src="http://shinog.heteml.jp/liveself.me/design/map/js/jquery-1.11.2.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://shinog.heteml.jp/liveself.me/design/map/js/bootstrap.js"></script>
    
</body>
