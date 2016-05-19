<?php

$lat=$_GET['lat'];
$lng=$_GET['lng'];

$lat=htmlspecialchars($lat);
$lng=htmlspecialchars($lng);

?>

<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'FALCA');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
//<![CDATA[

var customIcons = {
restaurant: {
icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
},
bar: {
icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
}
};

var lat = <?php echo $lat; ?>;
var lng = <?php echo $lng; ?>;


function load() {
var map = new google.maps.Map(document.getElementById("map"), {
center: new google.maps.LatLng(lat, lng),
zoom: 13,
mapTypeId: 'roadmap'
});
var infoWindow = new google.maps.InfoWindow;

// Change this depending on the name of your PHP file
downloadUrl("http://liveself.me/geocoding/googlemap-xml.php", function(data) {
var xml = data.responseXML;
var markers = xml.documentElement.getElementsByTagName("marker");
for (var i = 0; i < markers.length; i++) {
var name = markers[i].getAttribute("name");
var address = markers[i].getAttribute("address");
var type = markers[i].getAttribute("type");
var point = new google.maps.LatLng(
parseFloat(markers[i].getAttribute("lat")),
parseFloat(markers[i].getAttribute("lng")));
var html = "<b>" + name + "</b> <br/>" + address;
var icon = customIcons[type] || {};
var marker = new google.maps.Marker({
map: map,
position: point,
icon: icon.icon
});
bindInfoWindow(marker, map, infoWindow, html);
}
});
}

function bindInfoWindow(marker, map, infoWindow, html) {
google.maps.event.addListener(marker, 'click', function() {
infoWindow.setContent(html);
infoWindow.open(map, marker);
});
}

function downloadUrl(url, callback) {
var request = window.ActiveXObject ?
new ActiveXObject('Microsoft.XMLHTTP') :
new XMLHttpRequest;

request.onreadystatechange = function() {
if (request.readyState == 4) {
request.onreadystatechange = doNothing;
callback(request, request.status);
}
};

request.open('GET', url, true);
request.send(null);
}

function doNothing() {}

//]]>

</script>


</head>

<body onload="load()">

<div id="container">
<div id="header">
<h1><?php echo $this->Html->link($cakeDescription, 'http://liveself.me/falca/items'); ?></h1>
</div>
<div id="content">

<?php echo $this->Session->flash(); ?>

<?php echo $this->fetch('content'); ?>
</div>
<div id="footer">
<?php echo $this->Html->link(
$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
'http://www.cakephp.org/',
array('target' => '_blank', 'escape' => false)
);
?>
</div>
</div>
<?php echo $this->element('sql_dump'); ?>

</body>


</html>
