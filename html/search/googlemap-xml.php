<?php
require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect ('mysql504.heteml.jp', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM items WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML($row['title']) . '" ';
  echo 'address="&lt;a href=&quot;http://liveself.me/falca/items/detail/' . parseToXML($row['id']) . '&quot;&gt;&lt;img src=&quot;http://liveself.me/falca/app/webroot/files/item/photo/' . parseToXML($row['photo_dir']) . '/' . parseToXML($row['photo']) . '&quot; alt=&quot;&quot; width=&quot;350px&quot; height=&quot;150px&quot; &gt;&lt;/a&gt;" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['purpose'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>