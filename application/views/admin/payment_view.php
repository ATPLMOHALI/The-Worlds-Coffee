<?php
//INSERT INTO `roaster_detail` (`roaster_id`, `roaster_name`, `roaster_image`, `roaster_location`)
$pattern = '/[.]/';
foreach ($product_details as $row) 
{
$payment_id=$row['payment_id'];
$username=$row['username'];
$email=$row['email'];
$phone=$row['phone'];
$delivery_address=$row['address'].",".$row['city'].",".$row['country'].",Post Code :".$row['post_code'];
$quantity=$row['products_count'];                     
$date=$row['date'];
$payment_status=$row['payment_status'];

// echo  $coffee_count;

}
$coffee_count=count($product_details[0]['coffee_details']);

foreach ($product_details[0]['coffee_details'] as $rows) 
    {
            
          

        if($coffee_count>1)
        {
          $coffee_name[]=$rows['coffee_name'];
          $roaster_name[]=$rows['roaster'];
          $weight[]=$rows['weight'];
          $roast_type[]=$rows['roast_type'];
          $coffee_price[]=$rows['coffee_price'];
          $products_count[]=$rows['products_count'];
          $total_price[]=$rows['total_price'];
          $payment_status=$rows['payment_status'];
        }
        else
        {
          $coffee_name=$rows['coffee_name'];
          $roaster_name=$rows['roaster'];
          $weight=$rows['weight'];
          $roast_type=$rows['roast_type'];
          $coffee_price=$rows['coffee_price'];
          $total_products=$rows['products_count'];
          $payment_status=$rows['payment_status'];
          if (preg_match($pattern, $rows['total_price']))
            {
              $total_price=$rows['total_price']."0";
            }
            else
            {
              $total_price=$rows['total_price'].".00";
            }
        }
    }
    if($coffee_count>1)
    {
      
        $coffee_name=implode(',', $coffee_name);
          $roaster_name=implode(',', $roaster_name);
          $weight=implode(',', $weight);
          $roast_type=implode(',', $roast_type);
          $coffee_price=implode(',', $coffee_price);
          $products_count=implode('+', $products_count);
          $price=implode('+', $total_price);
          // echo $price;
          $split_price=explode('+', $price);
          // print_r($split_price);
          $split=explode('+', $products_count);
          $count_quantity=count($split);
          for ($i=0; $i <$count_quantity; $i++) 
          { 
            $total_products=$total_products+$split[$i];
          }
          for ($i=0; $i < $coffee_count; $i++) 
          { 
            $total_product_price=$total_product_price+$split_price[$i];
          }
          // print_r($total_product_price);
          $total_products=$products_count."=".$total_products;
          if (preg_match($pattern, $total_product_price))
            {
              $total_product_price=$price."=".$total_product_price."0";
            }
            else
            {
              $total_product_price=$price."=".$total_product_price.".00";
            }

    }
          
?>


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
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">Payment Detail</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info"><i class="fa fa-arrow-left"></i> All Booking Products</a>
          <div id="roaster_view_detail" class="card mb-3">

              <div class="middle">
                <!-- <div class="container"> -->
                  <div id="print_receipt" class="row">
                    <div class="print_detail text-right" style="margin-top: -13px;" ><span class="btn-success btn_add" onclick="javascript:printDiv('print_receipt')">Print Page</span> </div>
                    <div class="col-sm-12 terms-condition roaster-view"><br>
                      <div class="row">
                        <table class="table table table-hover table-striped" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                <th><b>Field Name</b></th>
                                <th><b>Description</b></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Payment Id</td>
                                <td><?php echo $payment_id;?></td>
                              </tr>
                              <tr>
                                <td>Coffee Images</td>
                                <td><div>
                                <?php
                                foreach ($product_details[0]['coffee_details'] as $rows) 
                                {
                                  ?>
                                  <img src="<?php echo base_url().$rows['coffee_image'];?>" height="100px">
                                  <?php
                                }
                                ?></div>
                                </td>
                              </tr>
                              <tr>
                                <td>Coffee Name</td>
                                <td>
                                  <?php echo $coffee_name?>
                                </td>
                              </tr>
                              <tr>
                                <td>Roaster Name</td>
                                <td><?php echo $roaster_name;?></td>
                              </tr>
                              <tr>
                                <td>Buyer Name</td>
                                <td><?php echo $username;?></td>
                              </tr>
                              <tr>
                                <td>Buyer Email</td>
                                <td><?php echo $email;?></td>
                              </tr>
                              <tr>
                                <td>Phone No.</td>
                                <td><?php echo $phone;?></td>
                              </tr>
                              <tr>
                                <td>Coffee weight</td>
                                <td><?php echo $weight;?></td>
                              </tr>
                              <tr>
                                <td>Roast type</td>
                                <td><?php echo $roast_type;?></td>
                              </tr>
                              <tr>
                                <td>Delivery Address</td>
                                <td><?php echo $delivery_address;?></td>
                              </tr>
                              <tr>
                                <td>Quantity</td>
                                <td><?php echo $total_products?></td>
                              </tr>
                              <tr>
                                <td>Coffee Price</td>
                                <td><?php echo "$".$coffee_price;?></td>
                              </tr>
                              <tr>
                                <td>Total Price</td>
                                <td><?php echo "$".$total_product_price;?></td>
                              </tr>
                              <tr>
                                <td>Date</td>
                                <td><?php echo $date;?></td>
                              </tr>
                              <tr>
                                <td>Payment Status</td>
                                <td><?php
                            if($payment_status==1)
                            {
                               ?>
                               <span style="color: green;"><i class="fa fa-check"></i> Complete</span>
                               <?php 
                            }
                            else
                            {
                               ?>
                               <span style="color: #00b8ff;"><i class="fa fa-clock-o"></i> Pending...</span>
                               <?php                                 
                            }
                            ?>
                            </td>
                              </tr>
                              
                              
                            </tbody>
                        </table> 
                      

                 </div><br><br>
                </div>
              </div>
            </div>
            <!-- </div> -->
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
     function printDiv(divID)
     {
         //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
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
