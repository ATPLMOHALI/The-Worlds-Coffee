<?php include('header.php');

foreach ($card_detail as $card) 
{
  $payment_id=$card['payment_id'];
  $cart_ids=$card['cart_ids'];
  $transaction_id=$card['transaction_id'];
//   $card_holder_name=$card['card_holder_name'];
//   $cart_type=$card['cart_type'];
//   $amount=$card['amount'];
//   $expire_month=$card['expire_month'];
//   $expire_year=$card['expire_year'];
//   $cvv=$card['cvv'];
}
?>

<?php
$user_id=$this->session->userdata('session_id');
$user_info=$this->Coffee_model->get_user_info($user_id);
if($user_info)
{
  foreach ($user_info as $row) 
  {
    $country=$row['country'];
    $city=$row['city'];
    $address=$row['address'];
    $post_code=$row['post_code'];
  }
}

?>

<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/delivery_details">Delivery details</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="container">
      <div class="row">
        <div class="col-sm-12 cont-info">
          <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/contact_information">Contact information</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/delivery_details">Delivery details</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/payment_method">Payment Method</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Confirm</a></li>
          </ul>
        </div>
        <div class="col-sm-8 cont-info"><br>
           <h1>Confirm Order</h1><br>
           <div class="row" style="margin-bottom: 24px;">
             <div class="table-responsive table-scroll">
                <table class="table table table-hover table-striped" width="100%" cellspacing="0">
                  <thead>
                    <tr> 
                        <th>Product Name</th>                         
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Coffee Price</th>
                        <th class="text-center">Total Price</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($cart_detail)
                    {
                        
                        $length=sizeof($cart_detail);
                          foreach ($cart_detail as $cart_item) 
                          {

                            $sum_price=$cart_item['cart_item_count']*$cart_item['coffee_price'];
                            $total_sum+= $sum_price;
                            $cart_id=$cart_item['cart_id'];
                            $product_total=$cart_item['cart_item_count']*$cart_item['coffee_price'];
                           ?>
                        <tr>
                                               
                        <td><?php echo $cart_item['coffee_name'];?></td>
                        <td class="text-center"><?php echo $cart_item['cart_item_count'];?></td>

                        <td class="text-center">$<?php echo $cart_item['coffee_price'];?></td>
                        <td class="text-center">$<?php echo number_format($product_total,2);?></td>
                        
                        </tr>                            
                            <?php
                        }
                    }
                    ?>
                    

                  </tbody>
                </table>
                <?php
                //print_r($price_cal);
                ?>
                <div class="row price_cal_div">
                  <div class="col-sm-12">
                    
                    <div class="total_price">
                    <hr class="horizontal_tab">
                      <span class="float-left">Total Price :</span>
                      <span class="float-right" style="padding-right: 50px;">$<?php echo number_format($total_sum,2);?></span>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <!-- <hr class="horizontal_tab"> -->
                    <div class="service_charges">
                      <span class="float-left">Shipping Charges :</span>
                      <span class="float-right" style="padding-right: 50px;">$<?php echo number_format($price_cal['shipping_charges'],2);?></span>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <!-- <hr class="horizontal_tab"> -->
                    <div class="service_fee">
                      <span class="float-left">Service Fee :</span>
                      <span class="float-right" style="padding-right: 50px;">$<?php echo number_format($price_cal['service_fee'],2);?></span>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <!-- <hr class="horizontal_tab"> -->
                    <div class="service_tax">
                      <span class="float-left">Service tax :</span>
                      <span class="float-right" style="padding-right: 50px;">$<?php echo number_format($price_cal['service_tax'],2);?></span>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <hr class="horizontal_tab">
                    <div class="grand_total">
                      <span class="float-left"><strong>Grand total :</strong></span>
                      <span class="float-right" style="padding-right: 50px;"><b>$<?php echo number_format($price_cal['total_price'],2);?></b></span>
                    </div>
                  </div>

                </div>
                 <form name="form1" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/pay_stripe"><br><br>

            
              
         <!-- <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" value="<?php echo $card_number;?>" hidden/> -->
          
          <!-- <input type="text" name="cart_type" value="<?php echo $cart_type;?>" hidden> 
          <select name="month" class="form-control" placeholder="MM" hidden>
              <option value="<?php echo $expire_month;?>"><?php echo $expire_month;?></option>
          </select>
          <select name="year" class="form-control" placeholder="YYYY" hidden>
              <option value="<?php echo $expire_year;?>"><?php echo $expire_year;?></option>
          </select>   
          <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv" value="<?php echo $cvv;?>" hidden/> -->
          <input type="text" name="roaster_price" value="<?php echo $price_cal['roaster_total'];?>" hidden>
          <input type="text" name="shipping_charges" value="<?php echo number_format($price_cal['shipping_charges'],2);?>" hidden>
          <input type="text" name="cart_ids" value="<?php echo $cart_ids;?>" hidden>
          <input type="text" name="actual_sum" value="<?php echo $total_sum;?>" hidden>
          <input type="text" name="transaction_id" value="<?php echo $transaction_id;?>" hidden/>
          <input type="text" name="payment_id" value="<?php echo $payment_id;?>" hidden>
          <input type="text" name="amount" value="<?php echo number_format($price_cal['total_price'],2);?>" hidden>
          <input type="text" name="service_tax" value="<?php echo number_format($price_cal['service_tax'],2);?>" hidden>
          
           
           
              
               <button type="submit" class="float-right btn btn-success">Confirm Order</button>   </form>
              </div>
             
           </div>
        </div>
        <div class="col-sm-4 cart-item-div"><br>
            <h3 class="text-center">Cart Items</h3><br>
           <?php
          $length=sizeof($cart_detail);
            foreach ($cart_detail as $cart_item) 
            {

              $sum_price=$cart_item['cart_item_count']*$cart_item['coffee_price'];
              $total_price+= $sum_price;
              $cart_id=$cart_item['cart_id'];
             ?>
          <div class="media">
          <img src="<?php echo base_url().$cart_item['coffee_image'];?>" style="width:60px;" class="align-self-center mr-3"/>
          <div class="media-body"><?php echo $cart_item['coffee_name'];?><small class="clr-grey" style="display:block;"><?php echo $cart_item['weight'];?></small></div>
          <div class="float-right text-right" style="width:130px;"><b>$<?php echo $cart_item['coffee_price'];?> <span class="clr-grey">x<?php echo $cart_item['cart_item_count'];?></span></b></div>
        </div><hr>
          <?php
            }
          ?>
       <div class="row justify-content-end">
        <div class="col-sm-11"><br>
        <div class="row">
        <div class="col-sm-6 text-right"><p class="font22">Total Price : </p></div>
        <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <div class="col-sm-6 text-right"><b class="font22">$<span id="total_price"><?php echo $total_price."0";?></span></b></div>
                   <?php
                  }
                  else
                  {
                    ?>
                    <div class="col-sm-6 text-right"><b class="font22">$<span id="total_price"><?php echo $total_price.".00";?></span></b></div>
                    <?php
                  }
              ?>
        <!-- <div class="col-sm-6 text-right"><b class="font22">$<span id="total_price"><?php //echo $total_price;?></span></b></div> -->
        <div class="col-sm-6 text-right"><p class="font22">Items : </p></div>
        <div class="col-sm-6 text-right"><b class="font22"><?php echo $length;?></b></div>
      </div>
      </div><br>
      </div>
      </div>
     </div>
  	</div>
  </div>
</section>

<?php include('footer.php');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {

    $('#delivery_info').validate({ // initialize the plugin
        rules: {
            Country_Name: {
                required: true
            },
            City_Name: {
                required: true
            },
            address: {
                required: true,
            },
            Post_Code: {
                required: true
            }
        },
         messages: {
        Country_Name: "<div class='error_msg'>Country required</div>",
        City_Name: "<div class='error_msg'>City required</div>",
        address:"<div class='error_msg'>Address required</div>",
        Post_Code:"<div class='error_msg'>Post code required</div>",
    }
    });

});

</script>