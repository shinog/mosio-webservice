var map;
var geocoder;

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map_canvas"));
    map.setCenter(new GLatLng(36.004673,137.351074), 5);

    geocoder = new GClientGeocoder();
  }
}

function moveAddress() {
  var address = document.getElementById("address").value;
  geocoder.getLatLng(address, moveTo);
}

function moveTo(latlng) {
  if (latlng){
    map.setCenter(latlng, 15);

    map.clearOverlays();
    var marker = new GMarker(latlng);
    map.addOverlay(marker);

  }else{
    alert("住所を入力して下さい。");
  }
}