<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Payment Details</title>

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
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">Payment Details</a>
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
              Payment information
          </div>
          <!-- <div class="add_coffee text-right" style="margin-top: -13px;"><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/add_new_roaster" class="btn-success btn_add">Add new Roaster</a></div> -->
          <br>
            <div class="card-body">
              <div class="table-responsive table-scroll text-center">
                <table class="table table table-hover table-striped text-center" id="dataTable" width="100%" cellspacing="0">
 <thead>
                    <tr>
                    <th>Sr.No.</th>
                    <th>Date</th>
                    <th>Card holder Name</th>
                    <th>Charge Id</th>
                    <th>Transaction Id</th>
                    <th>Card Type</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $pattern = '/[.]/';
                    if($payment_detail)
                    {
                        $i=0;
                        foreach ($payment_detail as $row) 
                        {
                          
                           $i=$i+1; 
                        
                    ?>

                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['created'];?></td>
                        <td><?php echo $row['card_holder_name'];?></td>
                        <td><?php echo $row['charge_id'];?></td>
                        <td><?php echo $row['transaction_id'];?></td>
                        <td><?php echo $row['cart_type'];?></td>
                        <td><?php echo number_format($row['amount'],2);?></td>
                        <td><?php
                             if($row['payment_status']==1)
                            {
                               ?>
                               <span style="color: green"><i class="fa fa-check"></i> Complete</span>
                               <?php 
                            }
                            else
                            {
                               ?>
                               <span style="color:#00b8ff;"><i class="fa fa-clock-o"></i> Pending...</span>
                               <?php                                 
                            }
                            ?>
                        </td>
                        <!-- <td class="action_td">
                            <a href="javascript:void(0)" id="<?php echo $row['news_id'];?>" class="edit edit_news" onclick="edit_news(<?php echo $row['news_id'];?>);">
                                <i class="fa fa-pencil-square-o"></i> 
                                Edit 
                            </a><br>
                            <a href="javascript:void(0)" id="<?php echo $row['news_id'];?>" class="delete delete_news" onclick="delete_news(<?php echo $row['news_id'];?>);">
                                <i class="fa fa-trash"></i> 
                                Delete 
                            </a>
                        </td> -->
                        <!-- <td><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_view?id=<?php echo $row['news_id'];?>" id="<?php echo $row['coffee_id'];?>" class="view_detail view_full_detail btn btn-info" >
                                <i class="fa fa-info-circle"></i> 
                                View full detail 
                            </a></td> -->
                    </tr>  
                    <?php
                    
                    }
                    }
                    ?>                              
                  </tbody>                  
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated On <?php echo $payment_detail[0]['created'];?></div>
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
    function edit_roaster(roaster_id)
    {
        
       // $('#edit_modal').modal('show'); 
       // $('.modal-content').html(coffee_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee_admin/edit_roaster_detail",
            data: {'roaster_id':roaster_id},
            success: function(res) 
            {
                console.log(roaster_id);

                $('.modal-content').html(res);
                 $('#edit_modal').modal('show');
                    
            }
});       
    }
    function delete_roaster(roaster_id)
    {
        $("#delete_roaster_id").val(roaster_id);
        $('#confirmation_modal').modal('show'); 
    }

</script>

<div class="modal fade" id="confirmation_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Roaster</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/delete_roaster">
                <input type="text" id="delete_roaster_id" name="roaster_id" hidden>
            Are you sure want to delete Roaster?
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
  <div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Coffee details</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
           <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/update_coffee_detail" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <input type="text" id="roaster_name" class="form-control" placeholder="Coffee Name" autofocus="autofocus" name="roaster_name" value="<?php echo $row['roaster_name'];?>">
                    <input type="text" name="roaster_id" value="<?php echo $row['roaster_id'];?>" hidden>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="file_image">Roaster Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="coffee_location">Location</label>
                    <input type="text" id="coffee_location" class="form-control" placeholder="Location" autofocus="autofocus" name="coffee_location" value="<?php echo $row['location'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_latitude">Latitude</label>
                    <input type="number" id="roaster_latitude" class="form-control" placeholder="Latitude" autofocus="autofocus" name="roaster_latitude" value="<?php echo $row['latitude'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_longitude">Longitude</label>
                    <input type="number" id="roaster_longitude" class="form-control" placeholder="Longitude" autofocus="autofocus" name="roaster_longitude" value="<?php echo $row['longitude'];?>">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_description">Description</label>
                    <textarea rows="5" id="roaster_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_description" value="<?php echo $row['description'];?>"></textarea>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_story">Story</label>
                    <textarea rows="5" id="roaster_story" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_story" value="<?php echo $row['story'];?>"></textarea>
                  </div>
                </div>

                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Update Details">
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

