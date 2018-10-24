<?php include('header.php')?>

<?php
//INSERT INTO `roaster_detail` (`roaster_id`, `roaster_name`, `roaster_image`, `roaster_location`)
foreach ($roaster_detail as $roaster) 
{
  $roaster_id=$roaster['roaster_id'];
  $roaster_name=$roaster['roaster_name'];
  $roaster_image=$roaster['roaster_image'];
  $roaster_location=$roaster['roaster_location'];
  $description=$roaster['description'];
  $story=$roaster['story'];
  /*$coffee_image= $roaster['coffee_image'];
  $coffee_type= $roaster['coffee_type'];
  $coffee_tasting= $roaster['coffee_tasting'];
  $region= $roaster['region'];
  $elevation= $roaster['elevation'];
  $producer= $roaster['producer'];
  $roaster= $roaster['roaster'];*/
}

?>

<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Catalog</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters">Roaster</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="container">
      <div class="row">
        <div class="col-sm-12 terms-condition roaster-view"><br>
          <div class="text-center">
          <img src="<?php echo base_url().$roaster_image;?>" alt="logo" class="img-fluid"/>
           <hr><br>
           <h1 class="text-uppercase mt-3"><?php echo $roaster_name;?></h1>
           <h4><?php echo $roaster_location;?></h4><br>
        </div>
  
 <h5 class="text-uppercase">Description</h5> 
<p><?php echo $description;?></p><br><br>

<h5 class="text-uppercase">Story</h5>
<p><?php echo $story;?></p><br><br>
     </div>
  	</div>

    <div class="catalog-inner-div">
          <h3 class="text-uppercase" style="font-weight:600;">Coffee</h3>
        <ul class="portfolio latest">
            <?php
            foreach ($roaster_coffee as $best) 
            {
                ?>
                
            <li class="text-center">
                <div class="img-relative-div">
                  <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $best['coffee_id']; ?>">
                    <img src="<?php echo base_url().$best['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $best['roast_type'];?></span>
                    <?php
                    $split=explode('-', $best['date']);
                    $month=$split[1];
                    
                    $current_month=date('m');
                    //echo $month."==".$current_month;
                    if($month==$current_month)
                    {
                      echo "<span class='tagline-new'>New</span>";
                    }
                    ?>
                    
                </div>
                
            <div class="rating">
                <?php
                $rating=$best['coffee_rating'];

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
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> --> 
                <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $best['coffee_id']; ?>">
                <?php echo $best['coffee_name'];?>
                </a></h3>
                <p><?php echo $best['company_name'];?></p>
                <span class="rate">$<?php echo $best['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $best['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
            ?>

      </ul>
        </div>










  </div>
</div>
</section>

<?php include('footer.php');?>