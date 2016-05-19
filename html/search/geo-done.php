<?php

$staff_name=$_POST['name'];
$staff_purpose=$_POST['purpose'];

$address=htmlspecialchars($staff_name);
$purp=htmlspecialchars($staff_purpose);


if($address=='')
{

  header("Location: http://liveself.me/falca/");
  exit();
}
else
{


$zoom = 16;

$req = 'http://maps.google.com/maps/api/geocode/xml';
$req .= '?address='.urlencode($address);
$req .= '&sensor=false';

$xml = simplexml_load_file($req) or die('XML parsing error');
if ($xml->status == 'OK') {
  $location = $xml->result->geometry->location;
  $lat = $location->lat;
  $lng = $location->lng;

  header("Location: http://liveself.me/falca/items/maps?lat=$lat&lng=$lng&purp=$purp");
  exit();
}

}
?>

<html>
<head>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=\
false"></script>
 <script type="text/javascript">
  function init() {
    var mapdiv = document.getElementById('map_canvas');
    var lat_input = document.getElementById('lat_input');
    var lng_input = document.getElementById('lng_input');
    var lat = <?php echo $lat;?>;
    var lng = <?php echo $lng;?>;
    var zoom = <?php echo $zoom;?>;
    var latlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
      zoom: zoom,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(mapdiv, myOptions);
    var center = new google.maps.Marker({
      position: latlng,
      map: map,
      title: "ここ"
      });
    google.maps.event.addListener(map, 'click', function(event) {
      var location = event.latLng;
      var lat = location.lat();
      var lng = location.lng();
      lat_input.value = lat;
      lng_input.value = lng;
    });
  }
 </script>
</head>
<body onload="init()">

<?php
  header("Location: http://liveself.me/search/googlemap-list.php?lat=$lat&lng=$lng");
  exit();
?>

<form method="post" action="googlemap-list.php">
<input type="hidden" name="lat" value="<?php echo $lat ?>"><br />
<input type="hidden" name="lng" value="<?php echo $lng ?>"><br />
<br />

<input type="submit" value="ＯＫ">
</form>

</body>
</html>