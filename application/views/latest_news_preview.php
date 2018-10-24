<?php include('header.php')?>

<?php
//INSERT INTO `roaster_detail` (`roaster_id`, `roaster_name`, `roaster_image`, `roaster_location`)
foreach ($news_detail as $news) 
{
  $news_id=$news['news_id'];
  $news_description=$news['news_description'];
  $news_image=$news['news_image'];
  $hash_tags=$news['hash_tags'];
  $likes=$news['likes'];
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
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/latest_news_preview">News</a></li>
    
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
          <div class="row">
            <div class="col-sm-6">
              <img src="<?php echo base_url().$news_image;?>" alt="logo" class="img-fluid"/> 
            </div>
          <div class="col-sm-6">
           <p class="text-uppercase mt-3"><?php echo $hash_tags;?><!-- <img src="images/heading-leaves.png" alt="" width="30px;"/> --></p>
           <!-- <h4><?php //echo $roaster_location;?></h4><br> -->
        
  
 <h5 class="text-uppercase">News Description</h5> 
<p><?php echo $news_description;?></p><br><br>
</div>

     </div><br><br>
  	</div>
  </div>
</div>
</div>

</section>

<?php include('footer.php');?>