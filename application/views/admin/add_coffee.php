<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add New Coffee</title>

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
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/add_new_coffee">Add New Coffee</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
        <div id="add_coffee" class="card mb-3">
            <div class="card-header" style="font-size: 23px;">
              <i class="fa fa-wpforms"></i> 
               Add coffee
          </div>
          <div class="all_coffee text-right" style="margin-top: -13px;"><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details" class="btn-success btn_add">All Coffee's</a></div>
          <br>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/save_new_coffee" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="coffee_name">Coffee Name</label>
                    <input type="text" id="coffee_name" class="form-control" placeholder="Coffee Name" autofocus="autofocus" name="coffee_name">
                    
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <select name="roaster_name" class="form-control" autofocus="autofocus">
                        <option value="" hidden></option>
                        
                        <?php
                        if($roaster_names)
                        {
                            foreach ($roaster_names as $roaster)
                            {
                            ?>
                                <option value="<?php echo $roaster['roaster_name']."-".$roaster['roaster_id'];?>"><?php echo $roaster['roaster_name'];?></option>
                            <?php
                            }
                        }
                        else
                        {
                            ?>

                            <option value="">No roaster found</option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roast_type">Roaster Type</label>
                    <input type="text" id="roast_type" class="form-control" placeholder="Roaster Type" autofocus="autofocus" name="roast_type" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="coffee_weight">Coffee weight</label>
                    <input type="text" id="coffee_weight" class="form-control" placeholder="Weight" autofocus="autofocus" name="coffee_weight" >
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_type">Coffee Type</label>
                    <input type="text" id="coffee_type" class="form-control" placeholder="Tasting" autofocus="autofocus" name="coffee_type" >
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_region">Region</label>
                    <input type="text" id="coffee_region" class="form-control" placeholder="Elevation" autofocus="autofocus" name="coffee_region" >
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="file_image">Coffee Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>




                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_tasting">Tasting</label>
                    <input type="text" id="coffee_tasting" class="form-control" placeholder="Tasting" autofocus="autofocus" name="coffee_tasting" >
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_elevation">Elevation</label>
                    <input type="text" id="coffee_elevation" class="form-control" placeholder="Elevation" autofocus="autofocus" name="coffee_elevation" >
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_producer">Producer</label>
                    <input type="text" id="coffee_producer" class="form-control" placeholder="Producer" autofocus="autofocus" name="coffee_producer" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="coffee_location">Location</label>
                   <!--  <input type="text" id="coffee_location" class="form-control" placeholder="Location" autofocus="autofocus" name="coffee_location" > -->
                   <select name="coffee_location" class="form-control" autofocus="autofocus">
                        <option value="" hidden></option>
                        
                        <?php
                        if($locations)
                        {
                            foreach ($locations as $location)
                            {
                            ?>
                                <option value="<?php echo $location['roaster_location'];?>"><?php echo $location['roaster_location'];?></option>
                            <?php
                            }
                        }
                        else
                        {
                            ?>

                            <option value="">No location found</option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="coffee_price">Coffee Price</label>
                    <input type="text" id="coffee_price" class="form-control" placeholder="Coffee Price" autofocus="autofocus" name="coffee_price" >
                  </div>
                </div>
                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_coffee" class="btn btn-success" autofocus="autofocus" name="submit_coffee" value="Save Coffee">
                </div>
                
                </div>
            </form>
            </div>
            
          </div>

            </div>
        </div>




<?php include('footer.php');?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

