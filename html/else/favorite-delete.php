<?php 
$lesson = $_GET['lesson'];
$favorite = $_GET['favorite'];

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql="DELETE FROM favorites WHERE id =".$favorite;
$stmt=$dbh->prepare($sql);

$stmt->execute();

$dbh=null;

$url = "http://www.mosio.me/falca/items/detail/".$lesson;
header("Location: ".$url);
exit();

?>