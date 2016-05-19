<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>

<link rel="shortcut icon" type="image/png" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/favicon.png">

<!-- Bootstrap -->
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/css/bootstrap.css" rel="stylesheet">
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/contents.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/jquery.bxslider/jquery.bxslider.min.js"></script>
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />

<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/else/Chart.js-master/Chart.js"></script>

<?php
$today = date("m月d日");
$yesterday = date("m月d日", strtotime('-1 day'));
$three = date("m月d日", strtotime('-2 day'));
$four = date("m月d日", strtotime('-3 day'));
$five = date("m月d日", strtotime('-4 day'));
$six = date("m月d日", strtotime('-5 day'));
$seven = date("m月d日", strtotime('-6 day'));

$today1 = date("Y-m-d");
$yesterday1 = date("Y-m-d", strtotime('-1 day'));
$three1 = date("Y-m-d", strtotime('-2 day'));
$four1 = date("Y-m-d", strtotime('-3 day'));
$five1 = date("Y-m-d", strtotime('-4 day'));
$six1 = date("Y-m-d", strtotime('-5 day'));
$seven1 = date("Y-m-d", strtotime('-6 day'));

$today2 = 0;
$yesterday2 = 0;
$three2 = 0;
$four2 = 0;
$five2 = 0;
$six2 = 0;
$seven2 = 0;
?>

<?php foreach ($logs as $log): ?>

<?php

if($log['Log']['date'] == $today1){
$today2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $yesterday1){
$yesterday2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $three1){
$three2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $four1){
$four2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $five1){
$five2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $six1){
$six2 = $log['Log']['count'];
}elseif($log['Log']['date'] == $seven1){
$seven2 = $log['Log']['count'];
}

?>

<?php endforeach; ?>


	<script>
	var today = "<?php echo $today; ?>";
	var yesterday = "<?php echo $yesterday; ?>";
	var three = "<?php echo $three; ?>";
	var four = "<?php echo $four; ?>";
	var five = "<?php echo $five; ?>";
	var six = "<?php echo $six; ?>";
	var seven = "<?php echo $seven; ?>";
	
	var today2 = "<?php echo $today2; ?>";
	var yesterday2 = "<?php echo $yesterday2; ?>";
	var three2 = "<?php echo $three2; ?>";
	var four2 = "<?php echo $four2; ?>";
	var five2 = "<?php echo $five2; ?>";
	var six2 = "<?php echo $six2; ?>";
	var seven2 = "<?php echo $seven2; ?>";
	
	var avgtoday = "<?php echo $avgtoday['0']['sumAvg']; ?>";
	var avgyesterday = "<?php echo $avgyesterday['0']['sumAvg']; ?>";
	var avgthree = "<?php echo $avgthree['0']['sumAvg']; ?>";
	var avgfour = "<?php echo $avgfour['0']['sumAvg']; ?>";
	var avgfive = "<?php echo $avgfive['0']['sumAvg']; ?>";
	var avgsix = "<?php echo $avgsix['0']['sumAvg']; ?>";
	var avgseven = "<?php echo $avgseven['0']['sumAvg']; ?>";
	
	
	
	
	
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : [seven,six,five,four,three,yesterday,today],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [avgseven,avgsix,avgfive,avgfour,avgthree,avgyesterday,avgtoday]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [seven2,six2,five2,four2,three2,yesterday2,today2]
				}
				
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>

<script type="text/javascript">
var $slide= jQuery.noConflict(true);
$slide(document).ready(function(){
$slide('.bxslider').bxSlider();
});
</script>


<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/demo/stylesheets/labs.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/jquery.raty.css">
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/vendor/jquery.js"></script><script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/lib/jquery.raty.js"></script>
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/raty-2.7.0/demo/javascripts/labs.js" type="text/javascript"></script>


        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript">
            //<![CDATA[
            
                            var customIcons = {
                                weight: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/mosio_map.png'
                                },
                                train: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/mosio_map.png'
                                },
								stress: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/mosio_map.png'
                                },
                                exercise: {
                                    icon: 'http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/mosio_map.png'
                                }
                            };


var lat = <?php echo h($item['Item']['lat']); ?>;
var lng = <?php echo h($item['Item']['lng']); ?>;


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
													  if (lat == markers[i].getAttribute("lat") && lng == markers[i].getAttribute("lng")) {
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
      <a class="navbar-brand" href="http://www.mosio.me/falca"><img src="http://liveself.me/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
    
                <?php
                    
					$user_id = AuthComponent::user('id');
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
    
    
    $dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
    $userr='mosio_user';
    $password='mosiopasswd';
    $dbh=new PDO($dsn,$userr,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql="SELECT SUM(quantity) FROM purchases WHERE item_id = ".$itemid;
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    
    $option = $item['Item']['limitt'] - $rec['SUM(quantity)'];
	
    if($user_id == $item['Item']['whom']){
    
    ?>


<div class="container-fluid">

<ul class="bxslider">
<li><img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/big_<?php echo h($item['Item']['photo']); ?>" alt="サンプル"></li>
<li><img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/big_<?php echo h($item['Item']['photo']); ?>" alt="サンプル"></li>
<li><img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/big_<?php echo h($item['Item']['photo']); ?>" alt="サンプル"></li>
<li><img src="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/big_<?php echo h($item['Item']['photo']); ?>" alt="サンプル"></li>
</ul>


<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1 class="text-center"><?php echo h($item['Item']['title']); ?></h1>
</div>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h3 class="text-center">
	<a href="/falca/items/detail/<?php echo h($item['Item']['id']); ?>"><p class="button-fav">プレビュー</p></a>
    <a href="/falca/items/edit/<?php echo h($item['Item']['id']); ?>"><p class="button-fav">編集</p></a>
    </h3>
  </div>
</div>

<hr>
</div>
<div class="container">
<div class="row text-center">
<?php echo nl2br($item['Item']['content']); ?>
</div>
<hr>
<div class="row">
<div class="col-sm-3 text-center">
<h4>所要時間</h4>
<h2><?php echo $this->Time->format($item['Item']['spend'], '%H時間%M分'); ?></h2>
<p></p>
</div>
<div class="text-center col-sm-3">
<h4>価格</h4>
<h2>￥<?php echo h($item['Item']['price']); ?></h2>
<p></p>
</div>
<div class="text-center col-sm-3">
<h4>目的</h4>
<h2>
<?php
	  switch($item['Item']['purpose']){
         case 'weight':
		   print '痩せたい';
		   break;
         case 'train':
		   print '鍛えたい';
		   break;		   
         case 'stress':
		   print 'ストレス発散したい';
		   break;		 
         case 'exercise':
		   print '健康を保ちたい';
		   break;	  
	  }
	  ?>	  
</h2>
</div>
<div class="text-center col-sm-3">
<h4>ジャンル</h4>
<h2>
<?php
	  switch($item['Item']['category']){
         case 'bodymake':
		   print 'ボディメイク';
		   break;
         case 'diet':
		   print 'ダイエット';
		   break;		   
         case 'fasting':
		   print 'ファスティング';
		   break;		 
         case 'recovery':
		   print 'カラダ回復';
		   break;	  
		 case 'yoga':
		   print 'ヨガ';
		   break;	  
         case 'pilates':
		   print 'ピラティス';
		   break;	  
         case 'activity':
		   print 'アクティビティ';
		   break;	 
         case 'food':
		   print 'フード';
		   break;	 
        
	  }
	  ?>	  
</h2>
</div>
</div>
<hr>


<div class="row">
<div class="col-md-6 col-md-offset-3">
<h3 class="text-center">
<a href="/falca/dates/add/<?php echo h($item['Item']['id']); ?>"><p class="button-fav">日程の追加</p></a>
</h3>
<h2 class="text-center">

</h2>
</div>
</div>
</div>
<hr>

<div class="row">
<div class="col-md-6 col-md-offset-3">
<h2 class="text-center">
購入状況
</h2>
</div>
</div>

<table class="sample2">
<thead>
<tr>
<th>日程</th><th>購入者数</th>
</tr>
</thead>

<?php foreach ($dates as $date): ?>

<tbody>
<tr>  
<td><?php echo $this->Time->format($date['Date']['date'], '%Y年%m月%d日 %H:%M'); ?></td>
<td>
<a href="http://www.mosio.me/falca/items/purchaser/<?php echo h($date['Date']['id']); ?>">
<?php
$datesum = sumItem($date);
echo $datesum;
?>
/
<?php echo h($date['Date']['limitt']); ?>人
</a>
</td>
</tr>
</tbody>

<?php endforeach; ?>

</table>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h3 class="text-center">
    <a href="/falca/mails/view/<?php echo h($item['Item']['id']); ?>"><p class="button-fav">メッセージ</p></a>
    </h3>
  </div>
</div>

<div class="container-fluid">
<div class="row">
<h2 class="text-center">
アクセス数
</h2>
<div class="text-center">
<p style="text-decoration:underline; color:rgba(151,187,205,1);">PV数</p>
<p style="text-decoration:underline; color:rgba(220,220,220,1);">他レッスンの平均ビュー数</p>
</div>
<canvas id="canvas" height="10px" width="80%"></canvas>
<div id="map" style="width: 100%; height: 400px"></div>

</div>
</div>

<?php
}
?>

<div class="row">
<div class="text-center col-md-6 col-md-offset-3">
<p>Copyright &copy; 2015 FALCA, Inc. All Rights Reserved</p>
</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
             <script src="http://liveself.me/design/item-detail/js/jquery-1.11.2.min.js"></script>
             
             <!-- Include all compiled plugins (below), or include individual files as needed -->
             <script src="http://liveself.me/design/item-detail/js/bootstrap.js"></script>
             </body>
             </html>
