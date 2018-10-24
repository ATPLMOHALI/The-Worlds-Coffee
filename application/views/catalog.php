<?php include('header.php')?>
<div class="top-page-headings resmp60">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Catalog</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  <div class="catalog">
    <div class="d-none d-sm-block">
      <div class="container-fluid padd0">
      <div class="row mar0 dtable">
  		<div class="col-sm-3 filters-sec dtablecell width25">
  			<h3 class="text-center">Filters</h3>
        <ul class="filter-sec-li">
        <li class="active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Coffee</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters">Roasters</a></li>
        </ul>
        <div class="checkbox-sec-div">
        <div class="checkbox-sec">
          <h4>Roast Type <a href="" class="reset float-right">RESET <img src="<?php echo base_url();?>assets/images/reset-icon.png" alt="reset"/></a></h4>
        <label class="sec-part">Light
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Light">
        <span class="checkmark"></span>
        </label>
        <label class="sec-part">Medium
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Medium"> <span class="checkmark"></span>
        </label>
        <label class="sec-part">Dark
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Dark"> <span class="checkmark"></span>
        </label>
        <label class="sec-part">Other
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Other"> <span class="checkmark"></span>
        </label>
        </div>
        <div class="checkbox-sec">
          <h4>Location</h4>
        <label class="sec-part">Manassas, Virginia
        <input type="checkbox" name="location[]" id="location" class="location" value="Manassas, Virginia">
        <span class="checkmark"></span>
        </label>
        <label class="sec-part">New York, USA
        <input type="checkbox"  name="location[]" id="location" class="location" value="New York, USA"> <span class="checkmark"></span>
        </label>
        <label class="sec-part">Chicago, Illinois
        <input type="checkbox" name="location[]" id="location" class="location" value="Chicago, Illinois"> <span class="checkmark"></span>
        </label>
        </div>
        <div class="checkbox-sec">
          <h4>Price</h4>
          <div class="range-slider-div">
          <div id="slider-range" class="range_slider-ui price-filter-range" name="rangeInput"></div>
          <div class="price-devide text-left">$
          <input type="text" oninput="validity.valid||(value='0');" id="min_price" class="min_price price-range-field text-left"/>
        </div>
        <div class="price-devide text-right">$
          <input type="text" oninput="validity.valid||(value='200');" id="max_price" class="max_price price-range-field text-left"/> 
        </div>
        <!-- $1<input type="range" class="custom-range"  min="2" max="1000" value="1000" id="customRange" name="points1"><span id="range_output">$1000</span> -->
        </div>
      </div>
      </div>
  		</div>
      <div class="col-sm-9 padd0 dtablecell width75">
        <div class="catalog-inner-div">
        <ul class="portfolio latest products">
            <?php
            if($all_products)
            {


            foreach ($all_products as $product) 
            {
                ?>
                
            <li class="text-center">
                <div class="img-relative-div">
                  <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $product['roast_type'];?></span>
                    <?php
                    $split=explode('-', $product['date']);
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
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> --> 
                <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>">
                <?php echo $product['coffee_name'];?>
                </a></h3>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
            if($val==NULL)
            {
              ?>
              <li>
                <div class="img-relative-div">
                <a href="<?php echo base_url();?>index.php/Worlds_coffee/catalog?val=4" class="more_products text-center text-uppercase">
              <span class="more_products">
              <img class="more_img" src="<?php echo base_url();?>assets/images/cat-more.png" alt="more" style="height: 23px;width: 26px;"/> <b>More</b></span></a>
              <br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
              </li>
              <?php
            }
            $val=NULL;
            ?>
            <div class="col-sm-12 text-center cat-pagination">
        <?php if (isset($links)) { ?>
                <?php echo $links; ?>
            <?php }
             ?>
        </div>
             
      </ul>
      <?php
      }
          else
          {
            ?>
              <div class="text-center no_data justify-content-center">
                <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
              </div>            
            <?php
          }

      ?>


        </div>
        

        
        <div class="catalog-inner-div">
          <h3 class="text-uppercase" style="font-weight:600;">Best Sellers</h3>
        <ul class="portfolio latest">
            <?php
            foreach ($best_sellers as $best) 
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
  	</div>
  </div>

<!-----mobile catalog----->

<div class="d-block d-sm-none">
<div class="container">
  <div class="row">
    <div class="col-sm-12 padd0">
      <ul class="responsive-filter-sec-li">
        <li class="active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Coffee</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters">Roasters</a></li>
        </ul>
    </div>
    <div class="col-sm-12">
      <div class="responsive-filter">
      <a href="javascript:void(0)" data-toggle="collapse" data-target="#filters-collapse">Filters : roast/dark, location <span class="float-right"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
       <div id="filters-collapse" class="collapse">
    <div class="col-sm-12">
      <div class="checkbox-sec">
          
          <h4>Roast Type <a href="" class="reset float-right">RESET <img src="<?php echo base_url();?>assets/images/reset-icon-white.png" alt="reset"/></a></h4>
        <label class="sec-part">
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Light">
        <span class="checkmark">Light</span>
        </label>
        <label class="sec-part">
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Medium"> <span class="checkmark">Medium</span>
        </label>
        <label class="sec-part">
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Dark"> <span class="checkmark">Dark</span>
        </label>
        <label class="sec-part">
        <input type="checkbox" name="roast_type[]" id="roast_type" class="roast_type" value="Other"> <span class="checkmark">Other</span>
        </label>
        </div>
        <div class="checkbox-sec">
          <h4>Location</h4>
        <label class="sec-part">
        <input type="checkbox" name="location[]" id="location" class="location" value="Manassas, Virginia">
        <span class="checkmark">Manassas, Virginia</span>
        </label>
        <label class="sec-part">
        <input type="checkbox"  name="location[]" id="location" class="location" value="New York, USA"> <span class="checkmark">New York, USA</span>
        </label>
        <label class="sec-part">
        <input type="checkbox" name="location[]" id="location" class="location" value="Chicago, Illinois"> <span class="checkmark">Chicago, Illinois</span>
        </label>
        </div>
        <div class="checkbox-sec">
          <h4>Price</h4>
         <div class="range-slider-div">
          <div id="slider-range1" class="range_slider-ui1 price-filter-range" name="rangeInput"></div>
          <div class="price-devide text-left">$
          <input type="text" oninput="validity.valid||(value='0');" id="min_price1" class="min_price1 price-range-field text-left"/>
        </div>
        <div class="price-devide text-right">$
          <input type="text" oninput="validity.valid||(value='200');" id="max_price1" class="max_price1 price-range-field text-left"/> 
        </div>
        <!-- $1<input type="range" class="custom-range"  min="2" max="1000" value="1000" id="customRange" name="points1"><span id="range_output">$1000</span> -->
        </div>
        </div>
    </div>
  </div>
  </div>
  </div>
  </div>

    <div class="col-sm-12 padd0">
    <div class="catalog-inner-div">
         <ul class="portfolio latest products">
            <?php
            if($all_products)
            {


            foreach ($all_products as $product) 
            {
                ?>
                
            <li class="text-center">
                <div class="img-relative-div">
                  <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/></a>
                    <span class="tagline"><?php echo $product['roast_type'];?></span>
                    <?php
                    $split=explode('-', $product['date']);
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
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> --> 
                <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>">
                <?php echo $product['coffee_name'];?>
                </a></h3>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
            if($val==NULL)
            {
              ?>
              <li>
                <div class="img-relative-div">
                <a href="<?php echo base_url();?>index.php/Worlds_coffee/catalog?val=4" class="more_products text-center text-uppercase">
              <span class="more_products">
              <img class="more_img" src="<?php echo base_url();?>assets/images/cat-more.png" alt="more" style="height: 23px;width: 26px;"/> <b>More</b></span></a>
              <br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
              </li>
              <?php
            }
            $val=NULL;
            ?>
            <div class="col-sm-12 text-center cat-pagination">
        <?php if (isset($links)) { ?>
                <?php echo $links; ?>
            <?php }
             ?>
        </div>
             
      </ul>
      <?php
      }
          else
          {
            ?>
              <div class="text-center no_data justify-content-center">
                <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
              </div>            
            <?php
          }

      ?>
        </div>

        
        <div class="catalog-inner-div">
          <h3 class="text-uppercase" style="font-weight:600;">Best Sellers</h3>
        <ul class="portfolio latest">
            <?php
            foreach ($best_sellers as $best) 
            {
                ?>
                
            <li class="text-center">
                <div class="img-relative-div">
                    <img src="<?php echo base_url().$best['coffee_image'];?>" alt="dark art"/>
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
                <h3><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>">
                <?php echo $best['coffee_name'];?>
                </a></h3>
                <p><?php echo $best['company_name'];?></p>
                <span class="rate">$<?php echo $best['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $best['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
            ?>
      </ul>
        </div> 
    </div>
</div>
</div>

<!-----mobile catalog close----->


    </div>
  </div>
</section>



<?php include('footer.php');?>

<script>
  $(".more_products").click(function(){
    var val=10;
     $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>index.php/Worlds_coffee/catalog",
          data: {'val':val},
          success: function(res) {
              console.log(val);

             
                    
          }
});
  });
</script>

<script>
    Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
    var data = { 'roast_type' : []};
    $(".roast_type").click(function(){
        
          if($(this).is(":checked")) 
          {  
            data['roast_type'].push($(this).val());
          }
          else
          {
                var name = $(this).val();//data['roast_type'][i]; /*$('#name').val();*/
                if (jQuery.inArray(name, data['roast_type'])!='-1') 
                {
                    data['roast_type'].remove(name); 
                } 
          }
          
          $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_roast_type",
                data: {'roast_type':data['roast_type']},
                success: function(res) {
                    console.log(data['roast_type']);

                    $('.products').html(res);
                    
                }
});
    
        
    });
</script>

<script>
     Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
    var dataloc = { 'location' : []};
    $(".location").click(function(){
        
          if($(this).is(":checked")) 
          {  
            dataloc['location'].push($(this).val());
          }
          else
          {
                var name = $(this).val();//data['roast_type'][i]; /*$('#name').val();*/
                if (jQuery.inArray(name, dataloc['location'])!='-1') 
                {
                    dataloc['location'].remove(name); 
                } 
          }
          
          $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_location",
                data: {'location':dataloc['location']},
                success: function(res) {
                    console.log(dataloc['location']);

                    $('.products').html(res);
                    
                }
});
    
        
    });   
</script>
<script>
  $("#customRange").click(function(){
    var val=$(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_price",
            data: {'price':val},
            success: function(res) {
                console.log(val);

                $('.products').html(res);
                    
            }
      });
  });
</script>
<script>
  $( document ).ready(function() {
     $(".input").toggleClass("active").focus;
        $(this).toggleClass("animate");
        $(".input").val("");
        
});
 
</script>

<div class="modal hide fade" id="modal_test">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css" type="text/css" media="all" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/js/price_range_script.js"></script>


<script>
  $('.range_slider-ui').click(function(){
    var min_price=$('.min_price').val();
    var max_price=$('.max_price').val();
    console.log(min_price,max_price);

    $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_price",
            data: {'min_price':min_price,'max_price':max_price},
            success: function(res) {
                console.log(min_price,max_price);

                $('.products').html(res);
                    
            }
      });

  });


    $('.range_slider-ui1').click(function(){
    var min_price=$('.min_price1').val();
    var max_price=$('.max_price1').val();
    console.log(min_price,max_price);

    $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_price",
            data: {'min_price':min_price,'max_price':max_price},
            success: function(res) {
                console.log(min_price,max_price);

                $('.products').html(res);
                    
            }
      });

  });
</script>


