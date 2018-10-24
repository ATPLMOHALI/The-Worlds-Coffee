<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Display a map</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <!--   <script src='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' /> -->
<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        .map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<div id='map-leaflet' class="map"></div>
<script>
L.mapbox.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
var mapLeaflet = L.mapbox.map('map-leaflet', 'mapbox.light')
  .setView([37.8, -96], 4);

L.marker([38.913184, -77.031952]).addTo(mapLeaflet);
L.marker([37.775408, -122.413682]).addTo(mapLeaflet);

mapLeaflet.scrollWheelZoom.disable();



// mapboxgl.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
// var map = new mapboxgl.Map({
// container: 'map',
// style: 'mapbox://styles/mapbox/streets-v10'
// });
</script>

</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8 />
  <title></title>
  <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
  <style>
    body {
      margin: 0;
      padding :0;
    }
    .map {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
<div id='map-leaflet' class='map'> </div>
<script>
L.mapbox.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
var mapLeaflet = L.mapbox.map('map-leaflet', 'mapbox.light')
  .setView([37.8, -96], 4);

L.marker([38.913184, -77.031952]).addTo(mapLeaflet);
L.marker([37.775408, -122.413682]).addTo(mapLeaflet);

mapLeaflet.scrollWheelZoom.disable();
</script>
</body>
</html> -->