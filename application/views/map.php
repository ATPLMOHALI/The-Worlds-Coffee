<?php include('header.php')?>
<?php
// echo "Url: ".$map_url;
if($map_url)
{
    $map_url=$map_url;
}
else
{
    $latitude='38.801021793115694';
    $longitude='-77.50863651317664';
    $map_url="https://maps.google.com/maps?q=".$latitude.",".$longitude."&hl=es;z=14&amp;output=embed";
}

?>
<style>
        
        .mapshow { top:0; bottom:0; width:100%; }
    </style>
    <script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/index.php/Worlds_coffee/map">Map</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="map">
      <div class="container-fluid padd0">
      <div class="row mar0">
  		<div class="col-sm-4 padd0">
  			<div id="accordion">
          <?php
          foreach ($all_roasters as $row) 
          {

            ?>
            <div class="card">
              <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $row['roaster_id'];?>" onclick="showmap(<?php echo $row['roaster_id'];?>)">
                  <!-- <a href="<?php //echo base_url();?>index.php/Worlds_coffee/map?lat=<?php //echo $row['latitude'];?>&lang=<?php //echo $row['longitude'];?>"> -->
                  <div class="media">
                   <!--  <input type="text" name="collapse id" value="collapse<?php //echo $row['roaster_id'];?>"> -->
                    <img src="<?php echo base_url().$row['roaster_image'];?>" alt="<?php echo $row['roaster_name'];?>" class="align-self-center mr-3"/>
                    <div class="media-body">
                      <h1><?php echo $row['roaster_name'];?></h1>
                      <h4><?php echo $row['roaster_location'];?></h4>
                    </div>
                  </div>
                <!-- </a> -->
              </a>
            </div>
              <div id="collapse<?php echo $row['roaster_id'];?>" class="collapse" data-parent="#accordion">
                <div class="card-body"><?php echo substr($row['description'],0,230)."...";?>
                </div>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters_view?id=<?php echo $row['roaster_id']; ?>">
                <div class="float-right" style="padding-right: 20px;">
                  <b>SEE MORE</b>
                </div></a>
              </div>
            </div>

            <?php
          }
          ?>
          
  </div>
  		</div>
      <div class="map_show"></div>
      <div id='map-leaflet' class="col-sm-8 padd0 mapshow">
        <!-- <div class="embed-responsive embed-responsive-4by3">
        <iframe width="300" height="170" src="<?php //echo $map_url;?>">
        </iframe>
      </div> -->
    </div>
    
  </div>
  </div>
    </div>
  	</div>
</section>

<?php include('footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script>
  function showmap(roaster_id)
  {
    // map.remove();
    mapLeaflet.remove();

    $('#map-leaflet').empty();
    // $('.leaflet-map-pane').remove();
    // $('.leaflet-control-container').remove();
    // $('#map-leaflet').empty("leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom");
    console.log(roaster_id);
    $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/roaster_map",
                data: {'roaster_id':roaster_id},
                success: function(res) {

                  console.log(roaster_id);
                  //$('#map-leaflet').add();
                  //$('.map_show').html(res);
                  
                  var res_array = res.split(',');
                  console.log(res_array);
                  var lat=res_array[0];
                  var long=res_array[1];
                  console.log(lat);
                  console.log(long);

              L.mapbox.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
              
              mapLeaflet = L.mapbox.map('map-leaflet', 'mapbox.light')
                                .setView([37.8, -96], 4);

              L.marker([lat, long]).addTo(mapLeaflet);
              //L.marker([37.775408, -122.413682]).addTo(mapLeaflet);

              mapLeaflet.scrollWheelZoom.disable();
                    
                  
                    
                }
              });
  }
</script>
<?php
$latitude=38.913184;
$longitude=-77.031952;
?>
<script>
  var lat=<?php echo $latitude; ?>;
  var long=<?php echo $longitude; ?>;
  L.mapbox.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
  //mapLeaflet.remove();
  var mapLeaflet = L.mapbox.map('map-leaflet', 'mapbox.light')
                    .setView([37.8, -96], 4);

  L.marker([lat, long]).addTo(mapLeaflet);
  //L.marker([37.775408, -122.413682]).addTo(mapLeaflet);

  mapLeaflet.scrollWheelZoom.disable();




// mapboxgl.accessToken = 'pk.eyJ1Ijoia2FtdSIsImEiOiJjam0zZ2R2ZzEyejNsM3FxdnFzdXNrbnhwIn0.g_57GM54BcXUMO9aBzjOeg';
// var map = new mapboxgl.Map({
// container: 'map',
// style: 'mapbox://styles/mapbox/streets-v10'
// });
</script>
<!-- <script>
  $(".panel-heading").hover(
 function() {
    $('.panel-collapse').collapse('show');
  }, function() {
    $('.panel-collapse').collapse('hide');
  }
);
</script> -->