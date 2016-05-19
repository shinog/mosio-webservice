<?php 
$from_id = $_POST["input1"];
$to_id = $_POST["input2"];
$follow_id = $_POST["input3"];

  try
    {

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';


$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="UPDATE follows SET permit = 1 WHERE id =".$follow_id;
$stmt=$dbh->prepare($sql);
$stmt->execute();
$dbh=null;

$dbh2=new PDO($dsn,$user,$password);
$dbh2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql2='INSERT INTO follows (from_id,to_id,permit) VALUES (?,?,?)';
$stmt2=$dbh2->prepare($sql2);
$data[]=$from_id;
$data[]=$to_id;
$data[]=1;
$stmt2->execute($data);
$dbh2=null;


    }catch(PDOException $e)
    {
echo mysql_errno($dbh).": ".mysql_error($dbh)."<br>\n";
    }

?>