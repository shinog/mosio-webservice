<?php

$staff_name=$_POST['name'];
$staff_purpose=$_POST['purpose'];

$address=htmlspecialchars($staff_name);
$purp=htmlspecialchars($staff_purpose);

echo $purp;

?>