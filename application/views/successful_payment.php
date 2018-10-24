<?php include('header.php')?>
<?php
$shipment_detail=$this->session->userdata('shipment');
$estimated_days=$shipment_detail['estimated_days']+1;
if($info)
{
	foreach ($info as $row) 
	{
		$payment_id=$row['payment_id'];
		$charge_id=$row['charge_id'];
		$transaction_id=$row['transaction_id'];
		$card_number=$row['card_number'];
		$card_holder_name=$row['card_holder_name'];
		$created=$row['created'];
	}
}
?>
<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://52.2.212.171/Worlds_coffee/">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment Successful</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="about prt-pre-page-back-div">
  	<div class="container">
      <div class="row cart_product success-payment">
      <div class="col-sm-5 success-payment-div">
       <img src="<?php echo base_url();?>assets/images/payment-done.png" class="img-fluid" alt="payment"/>
       <h4>Hi <?php echo $card_holder_name;?>, Congratulations</h4>
       <h1>Payment Successful !</h1><br>
       <p>Your order will be delivered in <b>maximum <?php echo $estimated_days; ?> working days</b>.</p>
     </div>
     <div class="col-sm-1"></div>
     <div class="col-sm-6 success-payment-div">
      <div class="table-responsive cart-table">
        <table class="table" align="center">
          <thead>
          <tr class="bg-gray">
            <th class="text-uppercase"><b>Payment Receipt</b></th>
            <th class="text-right">Date : 14/09/2018</th>
          </tr>
          </thead>
        <tbody>
        <tr>
        	<td colspan="2">
        	<b>Payment Id :</b> <?php echo $payment_id;?><br>
        	<b>Charge Id :</b> <?php echo $charge_id;?><br>
        	<b>Transaction Id :</b> <?php echo $transaction_id;?><br>
        	<b>Card Number :</b> <?php echo $card_number;?><br>
        	<b>Card Holder Name :</b> <?php echo $card_holder_name;?><br>
        	<b>Created :</b> <?php echo $created;?><br>
        	</td>
        </tr>
        <tr class="bg-gray">
        	<td colspan="2">
        	<b>Item Details:-</b>
        	</td>
        </tr>
        <?php
        //print_r($product_detail);
          foreach ($product_detail as $rows) 
          {
            $grand_total=$grand_total+$rows['total_price'];
            $roaster=explode('-',$rows['roaster']);
            ?> 
          <tr>
            <td>
              <b>Item Name :</b> <?php echo $rows['coffee_name'];?><br>
              <b>Roast :</b> <?php echo $rows['roast_type'];?><br>
              <b>Roaster :</b> <?php echo $roaster[0];?>
              </td>
              <td>
              <b>Quantity :</b> <?php echo $rows['products_count'];?><br>  
              <b>Price :</b> $<?php echo $rows['coffee_price'];?><br>
                  
                    <?php
              //product price
                $pattern = '/[.]/';
                  //total price
                  if (preg_match($pattern, $rows['total_price']))
                  {
                   ?>
                   <b>Total :</b> $<?php echo $rows['total_price']."0";?>
                   <?php
                  }
                  else
                  {
                    ?>
                    <b>Total :</b> $<?php echo $rows['total_price'].".00";?>
                    <?php
                  }
              ?>
              
              
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
       </table>
        <div class="row price_cal_div">
                  <div class="col-sm-12">
                    
                    <div class="total_price">
                    <hr class="horizontal_tab">
                      <span class="float-left">Total Price :</span>
                      <span class="float-right" style="padding-right: 50px;">$<?php echo number_format($grand_total,2);?></span>
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
      </div>
      </div><br>

          </div>

  	</div>

  	</div>
    <span class="text-center">&copy TheWorldsCoffee 2018. All rights reserved</span>
  </div>

</section>



<?php include('footer.php');?>