<?php 
$from_id = $_POST["input1"];
$to_id = $_POST["input2"];

  try
    {

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 $sql0="SELECT id FROM follows WHERE from_id = {$from_id} AND to_id = {$to_id}";
        $stmt0=$dbh->prepare($sql0);
        $stmt0->execute();
		$rec=$stmt0->fetch(PDO::FETCH_ASSOC);
		

if(isset($rec['id'])){

$sql2="DELETE FROM follows WHERE id =".$rec['id'];
$stmt2=$dbh->prepare($sql2);

$stmt2->execute();


}else{

$sql='INSERT INTO follows (from_id,to_id) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$from_id;
$data[]=$to_id;

$stmt->execute($data);

}

    $dbh=null;
    }catch(PDOException $e)
    {
		echo mysql_errno($dbh).": ".mysql_error($dbh)."<br>\n";
    }

?>