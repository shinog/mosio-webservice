<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>
<meta name="description" content="「mosio」は、全国で1回のレッスンから始められるフィットネスクラブです。厳選されたインストラクター・トレーナー・セラピストのヨガ、ピラティス、各種トレーニングのレッスン・サービスを、年会費無料であなたのお住まい近くで、気軽に楽しく始めることができます。" />
<meta property="og:title" content="<?php echo h($item['Item']['title']); ?> | mosio" />
<meta property="og:description" content="<?php echo h($item['Item']['content']); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.mosio.me/" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:image" content="http://www.mosio.me/falca/app/webroot/files/item/photo/<?php echo h($item['Item']['photo_dir']); ?>/big_<?php echo h($item['Item']['photo']); ?>" alt="サンプル">

<link rel="shortcut icon" type="image/png" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/favicon.png">
<link rel="apple-touch-icon" href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/top/bookmark-icon.png">

<!-- Bootstrap -->
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
.check{background:#fff;color:#000000;coursor:pointer;}
.choiceday{background:#F9C;color:#fff;}
.selecttime{background:#fff;color:#000000;coursor:pointer;}
.gray{background:#808080;color:#fff;}
.choicetime{background:#F9C;color:#fff;}

table{border-spacing:1px;font-size:12px;font-family:Verdana, Geneva, sans-serif;}
th,td{margin:0;padding:5px;text-align:center;}

#calendar{padding:20px 20px 10px;}
</style>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/jquery.bxslider/jquery.bxslider.min.js"></script>
<link href="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />

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
			
			
			
<script type="text/javascript">


//　取得したい年月設定
var y,m;
var p = location.search;
if(p.split("year=").length>1 && p.split("&month=").length>1){
	y = eval(p.split("year=")[1].split("&")[0]);
	m = eval(p.split("&month=")[1].split("&")[0]);
}else{
	y = new Date().getFullYear();
	m = new Date().getMonth()+1;
}


function calendar(y,m){

var itemphp = <?php echo h($item['Item']['id']); ?>;
	
	// 初期設定	
	var feb_date = (y%4 == 0 && y%100 != 0)?29:28;
	if(y%400 == 0){feb_date = 29};
	var month_count = {1:31,2:feb_date,3:31,4:30,5:31,6:30,7:31,8:31,9:30,10:31,11:30,12:31}
	var day_en = {d0:"sun",d1:"mon",d2:"the",d3:"wed",d4:"thu",d5:"fri",d6:"sat"};
	var m_display = (m<10)?"0"+String(m):m;	
	var last_day = new Date(y,m-1,month_count[m]).getDay();
	var first_day = new Date(y,m-1,1).getDay();
	var w = 1;
	var d = first_day;
	
	// マークアップ生成
	var txt = "";
	txt += '<h3>' + y + '年' + m + '月</h3>\n';
	txt += '<table summary="' + y + '年' + m_display + '月" class="calendar month' + m + '">\n';
	txt += '<tr>\n';
	txt += '<th>SUN</th>\n';
	txt += '<th>MON</th>\n';
	txt += '<th>TUE</th>\n';
	txt += '<th>WED</th>\n';
	txt += '<th>THU</th>\n';
	txt += '<th>FRI</th>\n';
	txt += '<th>SAT</th>\n';
	txt += '</tr>\n';
	txt += '<tr class="week1">\n';
	for(var j=0;j<first_day;j++){
		txt += '<td>&nbsp;</td>\n';
	}
	for(var i=1;i<=month_count[m];i++){
		if(d != 0 && (first_day + i)%7 == 1){
			w++;
			d = 0;
			txt += '</tr>\n';	
			txt += '<tr class="week' + w + '">\n';
		}
		var i_display = (i<10)?"0"+String(i):i;
		
		day_count = (i%7 == 0)? Math.floor(i/7) : Math.floor(i/7) + 1 ;
		
		var cleared = false;
		var double = false;
		
		$.ajaxSetup({ async: false});
		$.getJSON('http://www.mosio.me/items/json/'+itemphp, function(data){
		$(data).each(function(){
			var date = this.Date.date;
			var limit = this.Date.limitt;
			
		var ydate = date.slice(0, 4);
        var mdate = date.slice(5, 7);
        var ddate = date.slice(8, 10);
		
		
		if(y == ydate && m == mdate && i_display == ddate && !double){
		txt += '<td id="d' + y + m_display + i_display + '" class="'  + 'check' +  '" onclick="">' + i + '</td>\n';
		cleared = true;
		double = true;
		}
			
		})
	})
		
		
		
		if (!cleared) {
        txt += '<td id="d' + y + m_display + i_display + '" class="'  + 'gray' +  '">' + i + '</td>\n';
        }
		
		d++;
	}
	for(var j=0;j<(6-last_day);j++){
		txt += '<td>&nbsp;</td>\n';
	}
	txt += '</tr>\n';
	txt += '</table>\n';
	
	// 書き出し
	document.getElementById("calendar").innerHTML = txt;
}

window.addEventListener( "load", function(){
	calendar(y,m);
	
	
	document.getElementById("month_prev_ajax").onclick = function(){
		m--;
		if(m==0){y--;m=12;}
		calendar(y,m);
		var txt2 = "";
        var txt3 = "";
		document.getElementById("dateselect").innerHTML = txt2;
        document.getElementById("quanselect").innerHTML = txt3;
		return false;
	}
	
	document.getElementById("month_next_ajax").onclick = function(){
		m++;
		if(m==13){y++;m=1;}
		calendar(y,m);
		var txt2 = "";
        var txt3 = "";
		document.getElementById("dateselect").innerHTML = txt2;
        document.getElementById("quanselect").innerHTML = txt3;
		return false;
	}
	
	
}, false );

$(document).on('click', '.check', function(){
  $(document).find('.choiceday').removeClass('choiceday');
  $(this).addClass('choiceday');

var itemphp = <?php echo h($item['Item']['id']); ?>;  
var txt2 = "";
var txt3 = "";
document.getElementById("quanselect").innerHTML = txt3;

var id = $(this).attr('id');
var ydat = id.slice(1, 5);
var mdat = id.slice(5, 7);
var ddat = id.slice(7, 9);

txt2 += '<h3>時間を選択する</h3>';


$.ajaxSetup({ async: false });
$.ajaxSetup({
  cache: false
});
		$.getJSON('http://www.mosio.me/items/json/'+itemphp, function(data){
		$(data).each(function(){
			var date = this.Date.date;
			var limit = this.Date.limitt;
			var itemid = this.Date.id;
			
		var ydate = date.slice(0, 4);
        var mdate = date.slice(5, 7);
        var ddate = date.slice(8, 10);
		
		var purch = 0;
		
		if(ydat == ydate && mdat == mdate && ddat == ddate){
		
		for(var k in this.Purchase){ 
        purch += Number(this.Purchase[k]['quantity']); 
        } 
		var nokori =0;
        nokori = Number(limit) - Number(purch);
		var limit_display = (nokori<10)?"0"+String(nokori):nokori;	
		
		var time = date.slice(11, 16);
		txt2 += '<h4 id="d' + limit_display + '-' + itemid + '" class="selecttime"  onclick="">' + time + '</h4>';
		
		}
			
		})
	})

document.getElementById("dateselect").innerHTML = txt2;
});



$(document).on('click', '.selecttime', function(){
  $(document).find('.choicetime').removeClass('choicetime');
  $(this).addClass('choicetime');

var txt3 = "";

var id2 = $(this).attr('id');
var itemid2 = id2.slice(4);
var limit2 = id2.slice(1, 3);

txt3 += '<h3>枚数を選択する</h3>';

if(Number(limit2) == 0) {
txt3 += '<h4>売り切れ</h4>';
}else{
txt3 += '<select name = "itemQty">';

for(var x = 1; x <= limit2; x++) {
txt3 += '<option value = "' + x + '">' + x + '</option>';
}
		
txt3 += '</select>';
txt3 += '<input type="hidden" name="datenumber" value="' + itemid2 + '" /><br/>';
txt3 += '<input class="btn btn-lg btn-default" type="submit" name="submit" value="参加する" />';
txt3 += '</form>';
}

document.getElementById("quanselect").innerHTML = txt3;
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
<body onload="load()">
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="http://www.mosio.me/falca"><img src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/common/img/header.png" alt="mosio" class="header-logo"></a></div>
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


<?php
$user = AuthComponent::user('id');

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';

$userr='mosio_user';

$password='mosiopasswd';

$dbh=new PDO($dsn,$userr,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$today = date("Y-m-d");

$sql="SELECT id FROM logs WHERE item_id = ? AND date = ?";

$stmt=$dbh->prepare($sql);
$data[]=$itemid;
$data[]=$today;

$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);

if(empty($rec['id'])){


$dbh0=new PDO($dsn,$userr,$password);
$dbh0->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql0='INSERT INTO logs (item_id,count,date) VALUES (?,?,now() + INTERVAL 9 HOUR)';
$stmt0=$dbh0->prepare($sql0);
$data0[]=$itemid;
$data0[]=1;

$stmt0->execute($data0);

$dbh0=null;

}else{


$dbh2=new PDO($dsn,$userr,$password);
$dbh2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql2="UPDATE logs SET count = count+1 WHERE id =".$rec['id'];
$stmt2=$dbh2->prepare($sql2);
$stmt2->execute();

$dbh2=null;

}

$dbh=null;
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
  <hr>
</div>
<div class="container">
  <div class="row text-center">
<?php echo nl2br($item['Item']['content']); ?>
  </div>
</div>  
  
  <div class="container">
  <div class="row text-center">
<?php
if(isset($favorite['Favorite']['id'])){
?>

<a class="button-fav" href="http://www.mosio.me/else/favorite-delete.php?lesson=<?php echo $itemid; ?>&favorite=<?php echo h($favorite['Favorite']['id']); ?>">お気に入り済み</a>
 
<?php 
}else{ 
?>

 <a class="button-fav" href="http://www.mosio.me/else/favorite-add.php?user=<?php echo $user_id; ?>&lesson=<?php echo $itemid; ?>">お気に入り</a>

<?php 
} 
?>
 </div>
</div>   
  
  <hr>
 <div class="row">
    <div class="col-sm-3 text-center">
      <h4>所要時間</h4>
      <h3>
	  <?php echo $this->Time->format($item['Item']['spend'], '%H時間%M分'); ?>
	  </h3>
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
    <hr>

    <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <img src="http://www.mosio.me/falca/app/webroot/files/user/photo/<?php echo h($item['User']['photo_dir']); ?>/thumb150_<?php echo h($item['User']['photo']); ?>" alt="サンプル" class="img-profile">
      <h2 class="text-center"><?php echo $this->Html->link($item['User']['name'], '/users/view/'.$item['User']['id']); ?></h2>
    </div>
  </div>
  
    <div class="row text-center">
<?php echo nl2br($item['User']['career']); ?>	
  </div>
 
    <hr>
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">
	  
受ける日を選択する<br/>  
<p><a href="#" id="month_prev_ajax">前月へ</a> / <a href="#" id="month_next_ajax">次月へ</a></p>
<div id="calendar"></div>
<div id="dateselect"></div>
<form name="purchase" method="post" action="http://www.mosio.me/falca/items/confirm">
<input type="hidden" name="itemname" value="<?php echo h($item['Item']['title']); ?>" />
<input type="hidden" name="itemdesc" value="<?php echo $user; ?>" />
<input type="hidden" name="itemprice" value="<?php echo h($item['Item']['price']); ?>" />
<input type="hidden" name="itemnumber" value="<?php echo h($item['Item']['id']); ?>" />
<div id="quanselect"></div>	  
	  
      </h3>
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
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="http://data.mosio.me.s3-website-ap-northeast-1.amazonaws.com/design/item-detail/js/bootstrap.js"></script>
</body>
</html>
