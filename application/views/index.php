<?php include('header.php')?>
<?php
//first news
$news_news_id1=$latest_news[0]['news_id'];
$news_description1=$latest_news[0]['news_description'];
$news_image1=$latest_news[0]['news_image'];
$news_hash_tags1=$latest_news[0]['hash_tags'];
$news_likes1=$latest_news[0]['likes'];



//second news
$news_news_id2=$latest_news[1]['news_id'];
$news_description2=$latest_news[1]['news_description'];
$news_image2=$latest_news[1]['news_image'];
$news_hash_tags2=$latest_news[1]['hash_tags'];
$news_likes2=$latest_news[1]['likes'];

//last news

$news_news_id3=$latest_news[2]['news_id'];
$news_description3=$latest_news[2]['news_description'];
$news_image3=$latest_news[2]['news_image'];
$news_hash_tags3=$latest_news[2]['hash_tags'];
$news_likes3=$latest_news[2]['likes'];

?>

<div class="home-banner">
<div class="container">
    <div class="col-sm-6 text-center header-banner-content">
        <img src="<?php echo base_url();?>assets/images/logo-white.png" alt="logo"/>
        <h1>Welcome to <br>the worlds coffee</h1><br>
        <p>Life is more enjoyable, more fulfilling, when you try new things. </p>
        <div class="d-none d-sm-block">
        <a href="https://www.facebook.com/The-Worlds-Coffee-1849603458603768/" target="_blank"><i class="fab fa-facebook-f "></i></a>
        <a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/theworldscoffee/" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
    </div>
</div>
</div>  

<section>
  <div class="middle bg-black">
    <div class="home-product-show-sec">
    <div class="col-sm-6 text-center home-product-inner">
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                foreach ($browse_coffee as $row) 
                {
                    if($browse_coffee[0]['coffee_id']==$row['coffee_id'])
                    {
                        $active="active";
                    }
                    ?>
                        <div class="carousel-item <?php echo $active;?>">
                 <h4><?php echo $row['coffee_name'];?></h4>
                 <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>">
     <img src="<?php echo base_url().$row['coffee_image'];?>" alt="coffee" class="home-product-inner-img"/>
   </a>
     <p>Colonbian. <?php echo $row['elevation'];?>.<br><?php echo $row['coffee_type'];?></p>
     <span class="rate">$<?php echo number_format($row['coffee_price']*5,2);?><small class="clr-gray">/5lbs</small></span><br><br>
     <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>" class="btn btn-success">Browse Coffee</a> 
                </div>
                    <?php
                    $active=" ";
                }
                ?>
                
                <!-- <div class="carousel-item">
                  <h4>Cocaine 4<br>Coffee Microlot</h4>
     <img src="<?php //echo base_url();?>assets/images/coffee.png" alt="coffee" class="home-product-inner-img"/>
     <p>Colonbian. 1500m-2100m above se level.<br>Crisp lemons and lime</p>
     <span class="rate">$55<small class="clr-gray">/5lbs</small></span><br><br>
     <a href="#" class="btn btn-success">Browse Coffee</a> 
                </div>
                <div class="carousel-item">
                <h4>Cocaine 4<br>Coffee Microlot</h4>
     <img src="<?php //echo base_url();?>assets/images/coffee.png" alt="coffee" class="home-product-inner-img"/>
     <p>Colonbian. 1500m-2100m above se level.<br>Crisp lemons and lime</p>
     <span class="rate">$55<small class="clr-gray">/5lbs</small></span><br><br>
     <a href="#" class="btn btn-success">Browse Coffee</a> 
                </div> -->
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center home-product-inner2" style="background:url('<?php echo base_url();?>assets/images/roasters.jpg') center center;background-size:cover;">
    	<a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters" class="btn btn-success home-product-inner2-btn">Browse Roasters</a> 
    </div>
  </div>

 <div class="our-products">
 	<div class="container">
 		<div class="row">
 			<div class="col-sm-12 text-center">
 				<h2>OUR PRODUCTS <img src="<?php echo base_url();?>assets/images/heading-leaves.png" alt=""/></h2>
 			</div>
 			<div class="col-sm-12 text-center our-products-li">
 				<ul id="filters" class="">
          <li><span class="filter" data-filter=".latest">Latest</span></li>
          <li><span class="filter" data-filter=".bestseller">Bestseller</span></li>
          <li><span class="filter" data-filter=".special">Special</span></li>
        </ul>
 			</div>
 			<div id="portfoliolist">
 			<ul class="portfolio latest" data-cat="latest">
                <?php
                foreach ($latest_products as $row) 
                {
                ?>
                <li class="text-center">
                    <div class="img-relative-div">
                      <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>">
                    <img src="<?php echo base_url().$row['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $row['roast_type'];?></span>
                    <?php
                   $split=explode('-', $row['date']);
                   $month=$split[1];
                   
                   $current_month=date('m');
                   //echo $month."==".$current_month;
                   if($month==$current_month)
                   {
                     echo "<span class='tagline-new'>New</span>";
                   }
                   ?>
                    </div>
                    <!-- <img src="<?php echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                     <div class="rating">
                    <?php
                    $rating=$row['coffee_rating'];

                    $rating1=floor($rating);
                    $decimalstart=$rating-$rating1;
                    $pointrating=$decimalstart*10;
                    $rating2=ceil($rating);
                    $unfieldstar=5-$rating2;
                      for($i=0;$i<$rating1;$i++)
                      {
                      ?>  
                      <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16" alt="rating">       
                      <?php
                      } 
                      if (strpos($decimalstart,'.') !== false) {
                        ?>
                      <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16" alt="rating">
                      <?php 
                    }
                    for($j=0;$j<$unfieldstar;$j++)
                    {
                      ?>
                    <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16" alt="rating"> 
                  <?php 
                    }
                  ?>    
                </div>
                
                    <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>"><?php echo $row['coffee_name'];?></a></h3>
                    <span class="rate">$<?php echo $row['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                    <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $row['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
                </li>
                <?php   
                }
                ?>
 			</ul>

 			<ul class="portfolio bestseller ul-width-1140" data-cat="bestseller">
                <?php
                    foreach ($best_sellers as $row) 
                    {
                    ?>
                <li class="text-center">
                    <div class="img-relative-div">
                      <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>">
                    <img src="<?php echo base_url().$row['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $row['roast_type'];?></span>
                    <?php
                   $split=explode('-', $row['date']);
                   $month=$split[1];
                   
                   $current_month=date('m');
                   //echo $month."==".$current_month;
                   if($month==$current_month)
                   {
                     echo "<span class='tagline-new'>New</span>";
                   }
                   ?>
                    </div>
                    <!-- <img src="<?php echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                     <div class="rating">
                    <?php
                    $rating=$row['coffee_rating'];

                    $rating1=floor($rating);
                    $decimalstart=$rating-$rating1;
                    $pointrating=$decimalstart*10;
                    $rating2=ceil($rating);
                    $unfieldstar=5-$rating2;
                      for($i=0;$i<$rating1;$i++)
                      {
                      ?>  
                      <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16" alt="rating">       
                      <?php
                      } 
                      if (strpos($decimalstart,'.') !== false) {
                        ?>
                      <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16" alt="rating">
                      <?php 
                    }
                    for($j=0;$j<$unfieldstar;$j++)
                    {
                      ?>
                    <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16" alt="rating"> 
                  <?php 
                    }
                  ?>    
                </div>
                    <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>"><?php echo $row['coffee_name'];?></a></h3>
                    <span class="rate">$<?php echo $row['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                    <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $row['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
                </li>
                    <?php
                    }
                ?>
 			</ul>

 			<ul class="portfolio special ul-width-1140" data-cat="special">
                <?php
                foreach ($special_coffee as $row) 
                {
                ?>
                <li class="text-center">
                    <div class="img-relative-div">
                      <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>">
                    <img src="<?php echo base_url().$row['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $row['roast_type'];?></span>
                    <?php
                   $split=explode('-', $row['date']);
                   $month=$split[1];
                   
                   $current_month=date('m');
                   //echo $month."==".$current_month;
                   if($month==$current_month)
                   {
                     echo "<span class='tagline-new'>New</span>";
                   }
                   ?>
                    </div>
                    <!-- <img src="<?php echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                     <div class="rating">
                    <?php
                    $rating=$row['coffee_rating'];

                    $rating1=floor($rating);
                    $decimalstart=$rating-$rating1;
                    $pointrating=$decimalstart*10;
                    $rating2=ceil($rating);
                    $unfieldstar=5-$rating2;
                      for($i=0;$i<$rating1;$i++)
                      {
                      ?>  
                      <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16" alt="rating">       
                      <?php
                      } 
                      if (strpos($decimalstart,'.') !== false) {
                        ?>
                      <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16" alt="rating">
                      <?php 
                    }
                    for($j=0;$j<$unfieldstar;$j++)
                    {
                      ?>
                    <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16" alt="rating"> 
                  <?php 
                    }
                  ?>    
                </div>
                    <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $row['coffee_id']; ?>"><?php echo $row['coffee_name'];?></a></h3>
                    <span class="rate">$<?php echo $row['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                    <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $row['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
                </li>
                <?php
                }
                ?>
 			</ul>
 			</div>
 		</div>
 	</div>
 </div>

 <div class="latest-new">
 	<div class="corner-image"><img src="<?php echo base_url();?>assets/images/leaves4.png" alt="leaves"/></div>
 	<div class="container">
 		<div class="col-sm-12 text-center">
 			<h2 class="clr-white">LATEST NEWS <img src="<?php echo base_url();?>assets/images/heading-leaves.png" alt=""/></h2><br>
 		</div>
   <!--  $news_news_id2
$news_description2
$news_image2
$news_hash_tags2
$news_likes2 -->
 	<div class="news-sec">
 		<div class="col-sm-8 display-table-cell width-col-sm-8">
 		<div class="row bg-white">
 		<div class="col-sm-4 height250" style="background-image:url('<?php echo base_url().$news_image1;?>');background-size:cover;background-repeat:no-repeat;background-position:left center;"></div>
 		<div class="col-sm-8">
 		<div class="news-inner-content-div"><span class="tags"><?php echo $news_hash_tags1;?></span><br><br>
 		<p class="ht-120"><?php echo substr($news_description1,0,230)."...";?></p>
 		<div class="btn-sec-div"><span class="like"><i class="fas fa-heart"></i> <?php echo $news_likes1;?> Likes</span>
 		<span class="float-right"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/latest_news_preview?id=<?php echo $news_news_id1;?>">Go to Post <img src="<?php echo base_url();?>assets/images/arrow-icon.png" alt="arrow icon" style="width:18px;"/></a></span></div>
 		</div>
 		</div>	
 		</div><br>
 		<div class="row bg-white">
 		<div class="col-sm-4 height250" style="background-image:url('<?php echo base_url().$news_image2;?>');background-size:cover;background-repeat:no-repeat;background-position:left center;"></div>
 		<div class="col-sm-8">
 		<div class="news-inner-content-div"><span class="tags"><?php echo $news_hash_tags2;?></span><br><br>
 		<p class="ht-120"><?php echo substr($news_description2,0,230)."...";?></p>
 		<div class="btn-sec-div"><span class="like"><i class="fas fa-heart"></i> <?php echo $news_likes2;?> Likes</span>
 		<span class="float-right"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/latest_news_preview?id=<?php echo $news_news_id2;?>">Go to Post <img src="<?php echo base_url();?>assets/images/arrow-icon.png" alt="arrow icon" style="width:10px;"/></a></span></div>
 		</div>
 		</div>	
 		</div>	
 		</div>
 		<div class="col-sm-4 display-table-cell width-col-sm-4">
 		<div class="bg-white">
      <div class="lst-news-img-sec">
 			<img src="<?php echo base_url().$news_image3;?>" alt="coffee news" class="img-fluid" style="width: 100%;" />
    </div>
 		<div class="news-inner-content-div2"><span class="tags"><?php echo $news_hash_tags3;?></span><br><br>
 		<p class="ht-120"><?php echo substr($news_description3,0,100)."...";?></p>
 		<div class="btn-sec-div"><span class="like"><i class="fas fa-heart"></i> <?php echo $news_likes3;?> Likes</span>
 		<span class="float-right"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/latest_news_preview?id=<?php echo $news_news_id3;?>">Go to Post <img src="<?php echo base_url();?>assets/images/arrow-icon.png" alt="arrow icon" style="width:18px;"/></a></span></div>
 		</div>
 		</div>
 	</div>
 	</div>
 	</div>
 </div>

 <div class="subscribe">
 	<div class="container">
 		<div class="row justify-content-center">
 		<div class="col-md-6 col-sm-8">
 		<form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee/subscribe" class="form-inline">	
 		<input type="email" name="email" required placeholder="Type email address to receive our news" class="form-control col-sm-9">
 		<button type="submit" class="btn col-sm-3 bg-transparent">Subscribe</button>
 			</form>
 		</div>
 	</div>
 </div>
 </div>
 </div>
</section>

<?php include('footer.php');?>