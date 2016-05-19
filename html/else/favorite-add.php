<?php 
$user_id = $_GET['user'];
$lesson = $_GET['lesson'];

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO favorites (user_id,item_id) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$user_id;
$data[]=$lesson;

$stmt->execute($data);

$dbh=null;

$url = "http://www.mosio.me/falca/items/detail/".$lesson;
header("Location: ".$url);
exit();

?>