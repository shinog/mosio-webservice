<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>masio</title>
</head>
<body>

<?php

try
{

$staff_title=$_POST['title'];
$staff_content=$_POST['content'];
$staff_price=$_POST['price'];
$staff_limit=$_POST['limit'];
$staff_adress=$_POST['adress'];
$staff_whom=$_POST['whom'];
$staff_purpose=$_POST['purpose'];



$staff_title=htmlspecialchars($staff_title);
$staff_content=htmlspecialchars($staff_content);
$staff_price=htmlspecialchars($staff_price);
$staff_limit=htmlspecialchars($staff_limit);
$staff_adress=htmlspecialchars($staff_adress);
$staff_whom=htmlspecialchars($staff_whom);
$staff_purpose=htmlspecialchars($staff_purpose);


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

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mysql504.heteml.jp;charset=utf8';
$user='_shinog_zvdlkjmc';
$password='*****';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO items (title,content,price,adress,whom,lat,lng,limitt,purpose) VALUES (?,?,?,?,?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$staff_title;
$data[]=$staff_content;
$data[]=$staff_price;
$data[]=$staff_adress;
$data[]=$staff_whom;
$data[]=$staff_lat;
$data[]=$staff_lng;
$data[]=$staff_limit;
$data[]=$staff_purpose;


$stmt->execute($data);

$dbh=null;


print '追加しました。<br />';
echo $staff_limit;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
echo $staff_limit;
echo '</br>';
echo $staff_lat;
echo '</br>';
echo $staff_whom;

	exit();
}

?>

</body>
</html>
