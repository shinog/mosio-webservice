<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FALCA</title>

<!-- Bootstrap -->
<link href="http://liveself.me/design/item-detail/css/bootstrap.css" rel="stylesheet">

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
                restaurant: {
                    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
                },
                bar: {
                    icon: 'http://liveself.me/design/item-detail/mosio_map.png'
                }
            };
    
        
        
        function load() {
            var map = new google.maps.Map(document.getElementById("map"), {
                                          center: new google.maps.LatLng(34.9854580, 135.7577550),
                                          zoom: 13,
                                          mapTypeId: 'roadmap'
                                          });
                                          var infoWindow = new google.maps.InfoWindow;
                                          
                                          // Change this depending on the name of your PHP file
                                          downloadUrl("http://liveself.me/geocoding/googlemap-xml.php", function(data) {
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


<?php
$user = AuthComponent::user('id');

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mysql504.heteml.jp;charset=utf8';
$user='_shinog_zvdlkjmc';
$password='*****';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       $sql="SELECT SUM(quantity) FROM purchases WHERE item_id = ".$itemid;
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
		
		$option = $item['Item']['limit'] - $rec['SUM(quantity)']
?>


<div class="container-fluid">
<img src="http://liveself.me/design/item-detail/mv_03.jpg" alt="サンプル">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center"><?php echo h($item['Item']['title']); ?></h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row text-center">
<?php echo h($item['Item']['content']); ?>
  </div>
  <hr>
 <div class="row">
    <div class="col-sm-4 text-center">
      <h4>日時</h4>
      <h3><?php echo h($item['Item']['date']); ?></h3>
      <p></p>
    </div>
    <div class="text-center col-sm-4">
      <h4>価格</h4>
      <h2>￥<?php echo h($item['Item']['price']); ?></h2>
      <p></p>
      </div>
    <div class="text-center col-sm-4">
      <h4>目的</h4>
      <p><?php echo h($item['Item']['purpose']); ?></p>
    </div>
  </div>
  <hr>
  
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center">Miyuki</h2>
    </div>
  </div>
  
    <div class="row text-center">
 香川県在住。<br>
ヨガと音の世界に魅了され、香川、京都、大阪、名古屋、バリ＋αなど、訪れる土地土地でその輪を広げる活動を行っている。<br>
キールタンを通じて、参加者の心身を解放することを大切に、ワークショップやリトリートを各地で積極的に開催。<br>
<br>
「風吹く場所が大好きな風人間です。<br>
日々の暮らしを丁寧に。<br>
自然の奏でる音とヨガに寄り添いながら過ごしています。」
  </div>
  
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center">
	  
<?php
if($item['Item']['limit'] > $rec['SUM(quantity)']){
?>

<form method="post" action="http://liveself.me/PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/payments/CreatePaymentUsingPayPal.php">
<input type="hidden" name="itemname" value="<?php echo h($item['Item']['title']); ?>" />
<input type="hidden" name="itemdesc" value="<?php echo $user; ?>" />
<input type="hidden" name="itemnumber" value="<?php echo $itemid; ?>" />
<input type="hidden" name="itemprice" value="<?php echo h($item['Item']['price']); ?>" />
数量 :
<select name="itemQty">

<?php
for($num=1;$num<=$option;$num++){
echo'<option value="'.$num.'">'.$num.'</option> ';
}
?>

</select>
<br><input class="button" type="submit" name="submit" value="参加する" />
</form>

<?php
}else{

echo "売り切れ";

}
?>
	  
      </h2>
    </div>
  </div>
  </div>

<div class="container-fluid">
  <div class="row">
   
     <div id="map" style="width: 100%; height: 400px"></div>
    
  </div>
</div>

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
