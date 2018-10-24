<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add New Roaster</title>

<?php include('header.php');?>
<div class="wrapper">
    
<?php include('sidebar.php');?>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/add_new_coffee">Add New Roaster</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
        <div id="add_coffee" class="card mb-3">
            <div class="card-header" style="font-size: 23px;">
              <i class="fa fa-wpforms"></i> 
               Add Roaster
          </div>
          <div class="all_coffee text-right" style="margin-top: -13px;"><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details" class="btn-success btn_add">All Roaster's</a></div>
          <br>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/save_new_roaster" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <input type="text" id="roaster_name" class="form-control" placeholder="Coffee Name" autofocus="autofocus" name="roaster_name" value="<?php echo $row['roaster_name'];?>" required>
                    <input type="text" name="roaster_id" value="<?php echo $row['roaster_id'];?>" hidden>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="charges">Wolrds Coffee Charge (%)</label>
                    <input type="number" id="charges"  name="charges" placeholder="Charges(in %)" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="file_image">Roaster Image</label>
                    <input type="file" id="file_image" name="file" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-label-group">
                    <label  for="catalog_show">Roaster is shown in Catalog</label>
                    <div class="checkbox-custm">
                      <input type="checkbox" value="1" id="catalog_show" name="catalog_show" checked>
                      <span class="checkmark"></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-label-group">
                    <label for="tax_pay">Naxus tax is payed</label>
                    <div class="checkbox-custm">
                      <input type="checkbox" value="1" id="tax_pay" name="tax_pay" checked>
                      <span class="checkmark"></span>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_location">Location</label>
                    <input type="text" id="roaster_location" class="form-control" placeholder="Location" autofocus="autofocus" name="roaster_location" value="<?php echo $row['roaster_location'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_latitude">Latitude</label>
                    <input type="number" step="any" id="roaster_latitude" class="form-control" placeholder="Latitude" autofocus="autofocus" name="roaster_latitude" value="<?php echo $row['latitude'];?>" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_longitude">Longitude</label>
                    <input type="number" step="any" id="roaster_longitude" class="form-control" placeholder="Longitude" autofocus="autofocus" name="roaster_longitude" value="<?php echo $row['longitude'];?>" required>
                  </div>
                </div>
               
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_description">Description</label>
                    <textarea rows="5" id="roaster_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_description"><?php echo $row['description'];?></textarea>
                  </div>
                </div>
                 <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="url">URL</label>
                    <input type="text" id="url" class="form-control" placeholder="url..." autofocus="autofocus" name="url" value="<?php echo $row['url'];?>">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_story">Story</label>
                    <textarea rows="5" id="roaster_story" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_story"><?php echo $row['story'];?></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="country">Country</label>
                    <select id="country" class="form-control get_state" placeholder="Country" autofocus="autofocus" name="country">
                      <option value="0" hidden>Select Country</option>
                      <?php 
                        foreach ($countries as $row) 
                        {
                          ?>
                          <option id="<?php echo $row['id'];?>" value="<?php echo $row['name']." ".$row['sortname'];?>"><?php echo $row['name'];?></option>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="state">State</label>
                    <select id="state" class="form-control" placeholder="State" autofocus="autofocus" name="state">



                    </select>                    
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="city">City</label>
                    <input type="text" id="city" class="form-control" placeholder="City" autofocus="autofocus" name="city" value="<?php echo $row['city'];?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="address">Address</label>
                    <textarea rows="5" id="address" class="form-control" placeholder="Address..." autofocus="autofocus" name="address" required><?php echo $row['address'];?></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" id="zip_code" class="form-control" placeholder="Zip code" autofocus="autofocus" name="zip_code" value="<?php echo $row['zip_code'];?>" required>
                  </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Save Roaster">
                </div>
                
                </div>
            </form>
            </div>
            
          </div>

            </div>
        </div>




<?php include('footer.php');?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
input::placeholder {
  color: #928989 !important;
}
textarea::placeholder {
  color: #928989 !important;
}

</style>
<script type="text/javascript">
  $('select.get_state').change(function()
  {
    var country_id = $(".get_state option:selected").attr('id');
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee_admin/fetch_state",
            data: {'country_id':country_id},
            success: function(res) 
            {
                console.log(country_id);

                $('#state').html(res);
            }
}); 

  });
</script>
<script >
  $('#submit_roaster').click(function(){
      if($("#country").val()<1)
      {
        alert('Select your country or state');
      }
  });
</script>
