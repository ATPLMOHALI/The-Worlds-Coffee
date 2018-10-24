<?php include('header.php')?>


<div class="top-page-headings">
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
        <li><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Coffee</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters">Roasters</a></li>
        </ul>
        
        <div class="checkbox-sec-div">
        <div class="checkbox-sec">
          <h4>Location <a href="" class="reset float-right">RESET <img src="<?php echo base_url();?>assets/images/reset-icon.png" alt="reset"/></a></h4>
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
       </div>
  		</div>
      <div class="col-sm-9 padd0 dtablecell width75">
        <div class="catalog-inner-div">
        <ul class="portfolio roaster-sec">
          <?php
          foreach ($all_roasters as $row) 
          {
           ?>
           <li class="text-center">
        <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters_view?id=<?php echo $row['roaster_id']; ?>"><img src="<?php echo base_url().$row['roaster_image'];?>" alt="<?php echo $row['roaster_name'];?>" class="img-fluid"/></a>
        <h1><?php echo $row['roaster_name'];?></h1>
        <h4><?php echo $row['roaster_location'];?></h4>
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
        <li><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/catalog">Coffee</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters">Roasters</a></li>
        </ul>
    </div>
    <div class="col-sm-12">
      <div class="responsive-filter">
      <a href="javascript:void(0)" data-toggle="collapse" data-target="#filters-collapse">Filters : roast/dark, location <span class="float-right"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
       <div id="filters-collapse" class="collapse">
    <div class="col-sm-12">
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
  </div>
    </div>
  </div>
  </div>

    <div class="col-sm-12 padd0">
    <div class="catalog-inner-div">
        <ul class="portfolio latest products roaster-sec">
            <?php
          foreach ($all_roasters as $row) 
          {
           ?>
           <li class="text-center">
        <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/roasters_view?id=<?php echo $row['roaster_id']; ?>"><img src="<?php echo base_url().$row['roaster_image'];?>" alt="<?php echo $row['roaster_name'];?>" class="img-fluid"/></a>
        <h1><?php echo $row['roaster_name'];?></h1>
        <h4><?php echo $row['roaster_location'];?></h4>
        </li>
           <?php
          }
           ?>
      </ul>
      </div>  
    </div>
</div>
</div>

<!-------mobile catalog close----->  
  	</div>
  </div>
</section>

<?php include('footer.php');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
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
    var data = { 'location' : []};
    $(".location").click(function(){
        
          if($(this).is(":checked")) 
          {  
            data['location'].push($(this).val());
          }
          else
          {
                var name = $(this).val();//data['roast_type'][i]; /*$('#name').val();*/
                if (jQuery.inArray(name, data['location'])!='-1') 
                {
                    data['location'].remove(name); 
                } 
          }
          
          $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/filter_roaster_location",
                data: {'location':data['location']},
                success: function(res) {
                    console.log(data['location']);

                    $('.roaster-sec').html(res);
                    
                }
});
    
        
    });
</script>