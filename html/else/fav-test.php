<?php 
$user_id = 36;
$item_id = 12;


$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 $sql0="SELECT id FROM favorites WHERE user_id = {$user_id} AND item_id = {$item_id}";
        $stmt0=$dbh->prepare($sql0);
        $stmt0->execute();
		$rec=$stmt0->fetch(PDO::FETCH_ASSOC);
		
if(isset($rec['id'])){

$sql2="DELETE FROM favorites WHERE id =".$rec['id'];
$stmt2=$dbh->prepare($sql2);

$stmt2->execute();

}else{

$sql='INSERT INTO favorites (user_id,item_id) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$user_id;
$data[]=$item_id;

$stmt->execute($data);

}

$dbh=null;

?>