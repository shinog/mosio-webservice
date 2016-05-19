<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>masio</title>
</head>
<body>


<?php

$staff_title=$_POST['title'];
$staff_content=$_POST['content'];
$staff_price=$_POST['price'];
$staff_adress=$_POST['adress'];
$staff_whom=$_POST['whom'];


$staff_title=htmlspecialchars($staff_title);
$staff_content=htmlspecialchars($staff_content);
$staff_price=htmlspecialchars($staff_price);
$staff_adress=htmlspecialchars($staff_adress);
$staff_whom=htmlspecialchars($staff_whom);

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

print $staff_title;
print $staff_content;
print $staff_price;
print $staff_adress;
print $staff_whom;
print $staff_lat;
print $staff_lng;

?>

</body>
</html>