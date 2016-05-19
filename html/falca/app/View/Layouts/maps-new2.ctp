<?php
    
    $lat=$_GET['lat'];
    $lng=$_GET['lng'];
    
    $lat=htmlspecialchars($lat);
    $lng=htmlspecialchars($lng);
    
    ?>



<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>mosio</title>
					
					<link rel="shortcut icon" type="image/png" href="http://liveself.me/design/top/favicon.png">
                    
                    <!-- Bootstrap -->
                    <link href="http://liveself.me/design/map-new/css/bootstrap.css" rel="stylesheet">
                        
                        
                        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                         <![endif]-->
                        
                        
                        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
                        <script type="text/javascript">
                            //<![CDATA[
                            
                            var customIcons = {
                                weight: {
                                    icon: 'http://liveself.me/search/mosio_map.png'
                                },
                                train: {
                                    icon: 'http://liveself.me/search/mosio_map002.png'
                                },
								stress: {
                                    icon: 'http://liveself.me/search/mosio_map.png'
                                },
                                exercise: {
                                    icon: 'http://liveself.me/search/mosio_map002.png'
                                }
                            };
                        
                        var lat = <?php echo $lat; ?>;
                        var lng = <?php echo $lng; ?>;
                        
                        
                        
                        
                        function load() {
                            var map = new google.maps.Map(document.getElementById("map"), {
                                                          center: new google.maps.LatLng(lat, lng),
                                                          zoom: 13,
                                                          mapTypeId: 'roadmap'
                                                          });
                                                          var infoWindow = new google.maps.InfoWindow;
                                                          
                                                          // Change this depending on the name of your PHP file
                                                          downloadUrl("http://liveself.me/search/googlemap-xml.php", function(data) {
                                                                      var xml = data.responseXML;
                                                                      var markers = xml.documentElement.getElementsByTagName("marker");
                                                                      for (var i = 0; i < markers.length; i++) {
                                                                      var name = markers[i].getAttribute("name");
                                                                      var address = markers[i].getAttribute("address");
                                                                      var type = markers[i].getAttribute("type");
                                                                      var point = new google.maps.LatLng(
                                                                                                         parseFloat(markers[i].getAttribute("lat")),
                                                                                                         parseFloat(markers[i].getAttribute("lng")));
                                                                      var html = "<b>" + name + "</b> <br/>" + address;
                                                                      var icon = customIcons[type] || {};
                                                                      var marker = new google.maps.Marker({
                                                                                                          map: map,
                                                                                                          position: point,
                                                                                                          icon: icon.icon
                                                                                                          });
                                                                      bindInfoWindow(marker, map, infoWindow, html);
                                                                      }
                                                                      });
                        }
                        
                        function bindInfoWindow(marker, map, infoWindow, html) {
                            google.maps.event.addListener(marker, 'click', function() {
                                                          infoWindow.setContent(html);
                                                          infoWindow.open(map, marker);
                                                          });
                        }
                        
                        function downloadUrl(url, callback) {
                            var request = window.ActiveXObject ?
                            new ActiveXObject('Microsoft.XMLHTTP') :
                            new XMLHttpRequest;
                            
                            request.onreadystatechange = function() {
                                if (request.readyState == 4) {
                                    request.onreadystatechange = doNothing;
                                    callback(request, request.status);
                                }
                            };
                            
                            request.open('GET', url, true);
                            request.send(null);
                        }
                        
                        function doNothing() {}
                        
                        //]]>
                        
                            </script>
                        
                        
                        </head>
<body onload="load()">

<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="http://liveself.me/falca/"><img src="http://liveself.me/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
    
                <?php
                    
                    $user = AuthComponent::user('which');
					
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
						<img src="http://liveself.me/falca/app/webroot/files/user/photo/<?php echo $photo_dir; ?>/<?php echo $photo; ?>" alt="サンプル" class="img-icon">
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
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					 <img src="http://liveself.me/falca/app/webroot/files/user/photo/<?php echo $photo_dir; ?>/<?php echo $photo; ?>" alt="サンプル" class="img-icon">
					 <span class="caret"></span></a>
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
            <a href="http://liveself.me/falca/items/detail/<?php echo h($item['Item']['id']); ?>">
            <img src="http://liveself.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/<?php echo h($item['Item']['photo']); ?>" alt="サンプル" class="img-item">
			<p class="img_desc opa">￥<?php echo h($item['Item']['price']); ?></p>
            </a>
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
            Copyright &copy; 2015 FALCA, Inc. All Rights Reserved
        </div>
    </div>
    <hr>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://shinog.heteml.jp/liveself.me/design/map-new/js/jquery-1.11.2.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://shinog.heteml.jp/liveself.me/design/map-new/js/bootstrap.js"></script>

</body>  
</html>
