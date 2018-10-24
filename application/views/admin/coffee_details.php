<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Coffee Details</title>

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
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">Coffee Details</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <?php
                $success=$this->session->flashdata('success');
                if($success)
                {
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $success;?>
                        </div>
                    </div>
                    <?php
                }
                $error_msg=$this->session->flashdata('error_msg');
                if($error_msg)
                {
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Information !</strong> <?php echo $error_msg;?>
                        </div>
                    </div>                
                    <?php
                }
                ?>
                <div class="row">

          <div id="coffee_details" class="card mb-3">
            <div class="card-header" style="font-size: 23px;">
              <i class="fa fa-table"></i> 
              Coffee List
          </div>
          <div class="add_coffee text-right" style="margin-top: -13px;"><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/add_new_coffee" class="btn-success btn_add">Add new Coffee</a></div>
          <br>
            <div class="card-body">
              <div class="table-responsive table-scroll">
                <table class="table table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Sr.No.</th>
                    <th>Coffee Image</th>
                    <th>Coffee Name</th>
                    <th>Roaster Name</th>
                    <th>Roast Type</th>
                    <th>Coffee Weight</th>
                    <th>Coffee Type</th>
                    <th>Coffee Tasting</th>
                    <th>Elevation</th>
                    <th>Producer</th>
                    <th>Coffee Region</th>
                    <th>Location</th>
                    <th>Coffee Price</th>
                    <th>Coffee Rating</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($coffee_details)
                    {
                        $i=0;
                        foreach ($coffee_details as $row) 
                        {
                          
                           $i=$i+1; 
                           $split=explode('-', $row['roaster']);
                        
                    ?>

                    <tr>
                        <td><?php echo $i;?></td>
                        <td><img src="<?php echo base_url().$row['coffee_image'];?>" height="100px"></td>
                        <td><?php echo $row['coffee_name'];?></td>
                        <td><?php echo $split[0];?></td>
                        <td><?php echo $row['roast_type'];?></td>
                        <td><?php echo $row['weight'];?></td>
                        <td><?php echo $row['coffee_type'];?></td>
                        <td><?php echo $row['coffee_tasting'];?></td>
                        <td><?php echo $row['elevation'];?></td>
                        <td><?php echo $row['producer'];?></td>
                        <td><?php echo $row['region'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td><?php echo $row['coffee_price'];?></td>
                        <td><?php echo $row['coffee_rating'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td class="action_td">
                            <a href="javascript:void(0)" id="<?php echo $row['coffee_id'];?>" class="edit edit_coffee" onclick="edit_coffee(<?php echo $row['coffee_id'];?>);">
                                <i class="fa fa-pencil-square-o"></i> 
                                Edit 
                            </a>
                            <a href="javascript:void(0)" id="<?php echo $row['coffee_id'];?>" class="delete delete_coffee" onclick="delete_coffee(<?php echo $row['coffee_id'];?>);">
                                <i class="fa fa-trash"></i> 
                                Delete 
                            </a>
                        </td>
                    </tr>  
                    <?php
                    
                    }
                    }
                    ?>                              
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated On <?php echo $coffee_details[0]['date'];?></div>
          </div>


                </div>
            </div>
        </div>

<?php include('footer.php');?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // $(document).ready(function(){
    //     $('#edit_modal').modal('show');
    // });
</script>
<script>
    // $('.edit_coffee').click(function(){

    //     $('#edit_modal').modal('show');

    // });
    function edit_coffee(coffee_id)
    {
        
       // $('#edit_modal').modal('show'); 
       // $('.modal-content').html(coffee_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee_admin/edit_coffee_detail",
            data: {'coffee_id':coffee_id},
            success: function(res) 
            {
                console.log(coffee_id);

                $('.modal-content').html(res);
                 $('#edit_modal').modal('show');
                    
            }
});       
    }
    function delete_coffee(coffee_id)
    {
        $("#delete_coffee_id").val(coffee_id);
        $('#confirmation_modal').modal('show'); 
    }
</script>

<div class="modal fade" id="confirmation_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Coffee</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/delete_coffee">
                <input type="text" id="delete_coffee_id" name="coffee_id" hidden>
            Are you sure want to delete coffee?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Yes</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
      
    </div>
  </div>




<!-- Modal -->
  <div class="modal fade" id="edit_modal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Coffee details</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
            <form method="POST" action="">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_name">Coffee Name</label>
                    <input type="text" id="coffee_name" class="form-control" placeholder="Coffee Name" required="required" autofocus="autofocus" name="coffee_name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <!-- <input type="text" id="roaster_name" class="form-control" placeholder="Roaster Name" required="required" autofocus="autofocus" name="roaster_name"> -->
                    <select name="roaster_name" class="form-control" required="required" autofocus="autofocus">
                        <option value="">Cafe Kreyol</option>
                        <option value="">Yes Cafe</option>
                        <option value="">Cafe Kreyol</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="roast_type">Roaster Type</label>
                    <input type="text" id="roast_type" class="form-control" placeholder="Roaster Type" required="required" autofocus="autofocus" name="roast_type">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_weight">Coffee weight</label>
                    <input type="text" id="coffee_weight" class="form-control" placeholder="Weight" required="required" autofocus="autofocus" name="coffee_weight">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_tasting">Tasting</label>
                    <input type="text" id="coffee_tasting" class="form-control" placeholder="Tasting" required="required" autofocus="autofocus" name="coffee_tasting">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_elevation">Elevation</label>
                    <input type="text" id="coffee_elevation" class="form-control" placeholder="Elevation" required="required" autofocus="autofocus" name="coffee_elevation">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_producer">Producer</label>
                    <input type="text" id="coffee_producer" class="form-control" placeholder="Producer" required="required" autofocus="autofocus" name="coffee_producer">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_location">Location</label>
                    <input type="text" id="coffee_location" class="form-control" placeholder="Location" required="required" autofocus="autofocus" name="coffee_location">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_price">Coffee Price</label>
                    <input type="text" id="coffee_price" class="form-control" placeholder="Coffee Price" required="required" autofocus="autofocus" name="coffee_price">
                  </div>
                </div>
                <div class="col-md-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-md-6 submit_btn text-center">
                    <input type="submit" id="submit_coffee" class="btn btn-success" autofocus="autofocus" name="submit_coffee" value="Update Details">
                </div>
                
                </div>
            </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>
