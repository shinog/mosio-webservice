<?php
include_once 'view_counter.class.php';
$counter = new ViewCounter();
 
// ページ固有のID
$id = 1234;
$count = $counter->log( $id );
 
echo $count;

?>