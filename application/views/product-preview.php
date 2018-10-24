<?php include('header.php')?>

<?php
// $computerId = $_SERVER['HTTP_USER_AGENT']."</br>".$_SERVER['LOCAL_ADDR']."</br>".$_SERVER['LOCAL_PORT']."</br>".$_SERVER['REMOTE_ADDR']."</br>".$_SERVER['HTTP_X_FORWARDED_FOR'];
// echo $computerId;
// $session_id=$_COOKIE[ 'session_id' ];
// echo $session_id;
// INSERT INTO `coffee_detail` (`coffee_id`, `company_name`, `coffee_name`, `coffee_image`, `roast_type`, `coffee_type`, `coffee_tasting`, `region`, `elevation`, `producer`, `roaster`, `location`, `coffee_price`, `coffee_rating`)
foreach ($coffee_detail as $product) 
{
  $coffee_id=$product['coffee_id'];
  $company_name=$product['company_name'];
  $coffee_name=$product['coffee_name'];
  $roast_type=$product['roast_type'];
  $coffee_price=$product['coffee_price'];
  $coffee_rating=$product['coffee_rating'];
  $coffee_image= $product['coffee_image'];
  $coffee_type= $product['coffee_type'];
  $coffee_tasting= $product['coffee_tasting'];
  $region= $product['region'];
  $elevation= $product['elevation'];
  $producer= $product['producer'];
  $roaster= $product['roaster'];
}

?>

<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Catalog</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Preview</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="about prt-pre-page-back-div">
  	<div class="container">
      <div class="row">
  		<div class="col-sm-6">
  			<img src="<?php echo base_url().$coffee_image;?>" alt="product preview" class="img-fluid">
  		</div>
      <div class="col-sm-5 preview">
        <h3><?php echo $coffee_name;?>
        <div class="rating">
                <?php
                $rating=$product['coffee_rating'];

                $rating1=floor($rating);
                $decimalstart=$rating-$rating1;
                $pointrating=$decimalstart*10;
                $rating2=ceil($rating);
                $unfieldstar=5-$rating2;
                  for($i=0;$i<$rating1;$i++)
                  {
                  ?>  
                  <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16" alt="">       
                  <?php
                  } 
                  if (strpos($decimalstart,'.') !== false) {
                    ?>
                  <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16" alt="">
                  <?php 
                }
                for($j=0;$j<$unfieldstar;$j++)
                {
                  ?>
                <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16" alt=""> 
              <?php 
                }
              ?>  
              <?php
                   $split=explode('-', $product['date']);
                   $month=$split[1];
                   
                   $current_month=date('m');
                   //echo $month."==".$current_month;
                   if($month==$current_month)
                   {
                     echo "<span class='new'>New</span>";
                   }
                   ?>
                
            </div>
        </h3>
        <h4><small><?php echo $coffee_type;?></small></h4>
        <!-- <img src="<?php echo base_url();?>assets/images/ratings.png" alt="rating"/> -->
        <div class="preview-rate">
        <a id="dec" href="javascript:void(0)"><img src="<?php echo base_url();?>assets/images/count-minius.png" alt="decrease"/></a>
        <b id="output">1</b>
        <a id="inc" href="javascript:void(0)"><img src="<?php echo base_url();?>assets/images/count.png" alt="increase"/></a>
        <span class="rate">
        <?php echo $coffee_price;?><small class="clr-gray">/1lbs</small></span><br>
        </div>
        <!-- <?php //echo base_url(); ?>index.php/Worlds_coffee/cart?id=<?php //echo $coffee_id; ?> -->
        <a href="#" class="btn btn-success proceed_cart col-sm-12">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a><br><br>
        <div class="table-responsive">
        <table class="table">
        <tbody>
        <tr>
          <td><b>Roast</b></td>
          <td class="clr-grey"><?php echo $roast_type;?></td>
        </tr>
        <tr>
          <td><b>Tasting</b></td>
          <td class="clr-grey"><?php echo $coffee_tasting;?></td>
        </tr>
        <tr>
          <td><b>Region</b></td>
          <td class="clr-grey"><?php echo $region;?></td>
        </tr>
        <tr>
          <td><b>Elevation</b></td>
          <td class="clr-grey"><?php echo $elevation;?></td>
        </tr>
        <tr>
          <td><b>Roaster</b></td>
          <td class="clr-grey"><u><?php echo $roaster;?></u></td>
        </tr>
        <tr>
          <td><b>Producer</b></td>
          <td class="text-uppercase clr-grey"><?php echo $producer;?></td>
        </tr>
      </tbody>
        </table>
      </div>
      </div>
    </div>
    <br><hr><br>
    <div class="row">
      <div class="col-sm-12">
        <div id="disqus_thread"></div>
      </div>
    </div>
  		</div>
  	</div>
  </div>
</section>



<?php include('footer.php');?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>
  $(".proceed_cart").click(function(){
    var count_val=$("#output").text();
    var product_id=<?php echo $_GET['id']?>;
    var win_loc="<?php echo base_url();?>index.php/Worlds_coffee/cart";
              $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/add_to_cart",
                data: {'count_val':count_val,'product_id':product_id},
                success: function(res) {
                  window.location.replace(win_loc);
                    console.log(count_val);
          console.log(product_id);

                    //window.location(coffee_url);
                    // $('.products').html(res);
                    
                }
});
    
  });
</script>