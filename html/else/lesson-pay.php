<?php 
$date_id = $_POST["input1"];
$none_id = $_POST["input2"];

  try
    {

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql="UPDATE dates SET paid = 1 WHERE id =".$date_id;
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

    }catch(PDOException $e)
    {
		echo mysql_errno($dbh).": ".mysql_error($dbh)."<br>\n";
    }

?>