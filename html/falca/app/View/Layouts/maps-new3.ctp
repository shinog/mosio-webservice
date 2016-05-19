<?php
    
    $lat=$_GET['lat'];
    $lng=$_GET['lng'];
    $purp=$_GET['purp'];
    
    $lat=htmlspecialchars($lat);
    $lng=htmlspecialchars($lng);
    $purp=htmlspecialchars($purp);
    
    ?>



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
                    <link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/map-new/css/bootstrap.css" rel="stylesheet">
                        
                        
                        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                         <![endif]-->
						 
                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/map-new/js/jquery-1.11.2.min.js"></script>
                        
						
                        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
						
						<?php
						if($purp == 'all'){
						?>
						
						<script type="text/javascript">
                            //<![CDATA[
                            
                            var customIcons = {
                                weight: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map.png'
                                },
                                train: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map002.png'
                                },
								stress: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map.png'
                                },
                                exercise: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map002.png'
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
                                                          downloadUrl("http://www.mosio.me/else/googlemap-xml.php", function(data) {
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
						
						<?php
						}else{
						?>
						
                        <script type="text/javascript">
                            //<![CDATA[
                            
                            var customIcons = {
                                weight: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map.png'
                                },
                                train: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map002.png'
                                },
								stress: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map.png'
                                },
                                exercise: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/search/mosio_map002.png'
                                }
                            };
                        
                        var lat = <?php echo $lat; ?>;
                        var lng = <?php echo $lng; ?>;                      
                        var markerType = '<?php echo $purp; ?>';

       function load() {
                            var map = new google.maps.Map(document.getElementById("map"), {
                                                          center: new google.maps.LatLng(lat, lng),
                                                          zoom: 13,
                                                          mapTypeId: 'roadmap'
                                                          });
                                                          var infoWindow = new google.maps.InfoWindow;
                                                          
                                                          // Change this depending on the name of your PHP file
                                                          downloadUrl("http://www.mosio.me/else/googlemap-xml.php", function(data) {
                                                                      var xml = data.responseXML;
                                                                      var markers = xml.documentElement.getElementsByTagName("marker");													  
                                                                      for (var i = 0; i < markers.length; i++) {	
																      if (markerType == markers[i].getAttribute("type")) {
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
							
						<?php
						}	
						?>
							

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68093094-1', 'auto');
  ga('send', 'pageview');

</script>
							
                        
                        
                        </head>
<body onload="load()">

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
					$user_id = AuthComponent::user('id');
					
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

<a href="http://www.mosio.me/users/view/<?php echo $user_id; ?>">アカウント</a>


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

<a href="http://www.mosio.me/users/view/<?php echo $user_id; ?>">アカウント</a>


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
            <a href="http://www.mosio.me/falca/items/detail/<?php echo h($item['Item']['id']); ?>">
            <img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/normal_<?php echo h($item['Item']['photo']); ?>" alt="サンプル" class="img-item">
			<p class="img_desc opa">￥<?php echo h($item['Item']['price']); ?></p>
			
			<?php
			$res = searchItem($user_id, $item);
			?>
			
			<?php
			if(isset($user_id)){
			if(isset($res)){
			?>
			<p class="fav-ex2"><a onClick="ajaxPostFunc('<?php echo $user_id; ?>', '<?php echo h($item['Item']['id']); ?>');"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/heart-after.png"></a></p>
			<?php
			}else{
			?>
			<p class="img-fav"><a onClick="ajaxPostFunc('<?php echo $user_id; ?>', '<?php echo h($item['Item']['id']); ?>');"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/heart-before.png"></a></p>
			<?php
			}
			}else{
			?>
			<p class="img-fav"><a href="http://www.mosio.me/falca/signup"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/heart-before.png"></a></p>
			<?php
			}
			?>
            
            </a>
            <?php
                //echo h($item['Item']['title']);
                echo $this->Html->link($item['Item']['title'], '/items/detail/'.$item['Item']['id']);
                ?>
				
        </div>
        
        <?php endforeach; ?>
		
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
 if(empty($item['Item']['id'])){
 ?>
 <div class="container">
  <div class="row text-center">
　その検索条件ではまだレッスンがありません。
  </div>
</div>
<?php
}
?>   
    
    
    <hr>
	
	<div class="row">
	
    </div>
	
	<div class="row text-center">
	<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
    </ul>   
    </div>
    <hr>
    </div>
	
	
    <div class="row">
	
        <div class="text-center col-md-6 col-md-offset-3">
            Copyright &copy; 2015 FALCA, Inc. All Rights Reserved
        </div>
    </div>
    <hr>
    </div>
	
	
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/map-new/js/bootstrap.js"></script>

</body>  
</html>
