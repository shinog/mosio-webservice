<?php

$staff_title=$_POST['title'];
$staff_content=$_POST['content'];
$staff_price=$_POST['price'];
$staff_date=$_POST['spend'];

$staff_adress=$_POST['adress'];
$staff_whom=$_POST['whom'];
$staff_purpose=$_POST['purpose'];
$staff_category=$_POST['category'];


$staff_title=htmlspecialchars($staff_title);
$staff_content=htmlspecialchars($staff_content);
$staff_price=htmlspecialchars($staff_price);
$staff_date=htmlspecialchars($staff_date);

$staff_adress=htmlspecialchars($staff_adress);
$staff_whom=htmlspecialchars($staff_whom);
$staff_purpose=htmlspecialchars($staff_purpose);
$staff_category=htmlspecialchars($staff_category);

if($staff_title=='' || $staff_content=='' || $staff_price=='' || $staff_date=='' || $staff_adress=='')
{

  header("Location: http://www.mosio.me/falca/items/add");
  exit();
}
else
{

try
{

$req = 'http://maps.google.com/maps/api/geocode/xml';
$req .= '?address='.urlencode($staff_adress);
$req .= '&sensor=false';

$xml = simplexml_load_file($req) or die('XML parsing error');
if ($xml->status == 'OK') {
  $location = $xml->result->geometry->location;
  $lat = $location->lat;
  $lng = $location->lng;
  }
  
  $staff_lat=htmlspecialchars($lat);
  $staff_lng=htmlspecialchars($lng);

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO items (title,content,price,adress,whom,lat,lng,purpose,category,spend) VALUES (?,?,?,?,?,?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$staff_title;
$data[]=$staff_content;
$data[]=$staff_price;
$data[]=$staff_adress;
$data[]=$staff_whom;
$data[]=$staff_lat;
$data[]=$staff_lng;
$data[]=$staff_purpose;
$data[]=$staff_category;
$data[]=$staff_date;


$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	
}

 header("Location: http://www.mosio.me/falca/items");
        exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>masio</title>
</head>
<body>

</body>
</html>
