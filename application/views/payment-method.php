


<?php include('header.php')?>

<?php $length=sizeof($cart_detail);
foreach ($cart_detail as $cart_item) 
            {

              $sum_price=$cart_item['cart_item_count']*$cart_item['coffee_price'];
              $total_price+= $sum_price;
              $cart_id=$cart_item['cart_id'];
            }
 foreach ($cart_detail as $cart) 
  {
      $id_cart[]=$cart['cart_id'];
  }

  $id_cart=implode(",",$id_cart);
 // print_r($id_cart);
?>

<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/payment_method">Payment Method</a></li>
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
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/payment_method">Payment Method</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Confirm</a></li>
          </ul>
        </div>
        <div class="col-sm-8 cont-info payment-method"><br>
           <img src="<?php echo base_url();?>assets/images/stripe-logo.png" alt="stripe" class="img-fluid" width="200"/>
           <h4>Connect with Stripe to accept payments</h4>
           <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#visa"><img src="<?php echo base_url();?>assets/images/visa-card.png" alt="visa"/></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#master_card"><img src="<?php echo base_url();?>assets/images/master-card.png" alt="master card"/></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#american_express"><img src="<?php echo base_url();?>assets/images/american-express.png" alt="american express"/></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#jcb_card"><img src="<?php echo base_url();?>assets/images/jcb-card.png" alt="jcb card"/></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#discover_card"><img src="<?php echo base_url();?>assets/images/discover-card.png" alt="discover card"/></a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="visa">
    <form name="form1" id="visa_form" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/confirm_order"><br><br>
    <!--   <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script> -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Card Number*</label>
              <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" onChange="addhyphen();"/>
              <input type="text" name="cart_type" value="Visa card" hidden>
              
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Card holder name*</label>
              <input type="text" placeholder="Ex.Dineillee Donse" class="form-control" name="card_holder_name"/>
            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Expire date*</label>
              <div class="row">
                <div class="col-sm-6">
              <select name="month" class="form-control" placeholder="MM">
                <option value="" hidden>MM</option>
                <?php
                    for ($m=1; $m<=12; $m++) 
                    {
                echo '  <option value="' . $m . '">' . $m . '</option>';
            }
                ?>

              </select>
                </div>
            <div class="col-sm-6">


              <select name="year" class="form-control" placeholder="YYYY">
                <option value="" hidden>YYYY</option>
                <?php
              $cur_year = date('Y');
                  for ($i=0; $i<=20; $i++) {
                    ?>
                      <option value="<?php echo $cur_year+$i;?>"><?php echo $cur_year+$i;?></option>
                    <?php
                     
                  }
              ?>
              </select>
            </div>
          </div>
            </div>
            <div class="form-group col-sm-6">
              <label>Security Code*</label>
            <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv"/>
            <input type="text" name="amount" value="<?php echo $total_price;?>" hidden>
            </div>
            <div class="form-group col-sm-12 text-right"><br>
             <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price."0";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                   <?php
                  }
                  else
                  {
                    ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price.".00";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                    <?php
                  }
              ?>
            </div>
           </div>
         </form>
       </div>
  <div class="tab-pane container fade" id="master_card"><!-- master card -->
<form name="form1" id="master_form" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/confirm_order"><br><br>
  <!-- <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script> -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Card Number*</label>
              <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" onChange="addhyphen();"/>
              <input type="text" name="cart_type" value="Master card" hidden>
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Card holder name*</label>
              <input type="text" placeholder="Ex.Dineillee Donse" class="form-control" name="card_holder_name"/>
            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Expire date*</label>
              <div class="row">
                <div class="col-sm-6">
              <select name="month" class="form-control" placeholder="MM">
                <option value="" hidden>MM</option>
                <?php
                    for ($m=1; $m<=12; $m++) 
                    {
                echo '  <option value="' . $m . '">' . $m . '</option>';
            }
                ?>

              </select>
                </div>
            <div class="col-sm-6">


              <select name="year" class="form-control" placeholder="YYYY">
                <option value="" hidden>YYYY</option>
                <?php
              $cur_year = date('Y');
                  for ($i=0; $i<=20; $i++) {
                    ?>
                      <option value="<?php echo $cur_year+$i;?>"><?php echo $cur_year++;?></option>
                    <?php
                     
                  }
              ?>
              </select>
            </div>
          </div>
            </div>
            <div class="form-group col-sm-6">
              <label>Security Code*</label>
            <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv"/>
            <input type="text" name="amount" value="<?php echo $total_price;?>" hidden>
            </div>
            <div class="form-group col-sm-12 text-right"><br>
             <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price."0";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                   <?php
                  }
                  else
                  {
                    ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price.".00";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                    <?php
                  }
              ?>
            </div>
           </div>
         </form>
  </div>
  <div class="tab-pane container fade" id="american_express"><!-- american Express -->
    <form name="form1" id="american_form" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/confirm_order"><br><br>
<!--       <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script> -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Card Number*</label>
              <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" onChange="addhyphen();"/>
              <input type="text" name="cart_type" value="American Express" hidden>
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Card holder name*</label>
              <input type="text" placeholder="Ex.Dineillee Donse" class="form-control" name="card_holder_name"/>

            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Expire date*</label>
              <div class="row">
                <div class="col-sm-6">
              <select name="month" class="form-control" placeholder="MM">
                <option value="" hidden>MM</option>
                <?php
                    for ($m=1; $m<=12; $m++) 
                    {
                echo '  <option value="' . $m . '">' . $m . '</option>';
            }
                ?>

              </select>
                </div>
            <div class="col-sm-6">


              <select name="year" class="form-control" placeholder="YYYY">
                <option value="" hidden>YYYY</option>
                <?php
              $cur_year = date('Y');
                  for ($i=0; $i<=20; $i++) {
                    ?>
                      <option value="<?php echo $cur_year+$i;?>"><?php echo $cur_year++;?></option>
                    <?php
                     
                  }
              ?>
              </select>
            </div>
          </div>
            </div>
            <div class="form-group col-sm-6">
              <label>Security Code*</label>
            <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv"/>
            <input type="text" name="amount" value="<?php echo $total_price;?>" hidden>
            </div>
            <div class="form-group col-sm-12 text-right"><br>
              <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price."0";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                   <?php
                  }
                  else
                  {
                    ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price.".00";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                    <?php
                  }
              ?>
             
            </div>
           </div>
         </form>
  </div>
  <div class="tab-pane container fade" id="jcb_card"><!-- JCB Card -->
    <form name="form1" id="jcb_form" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/confirm_order"><br><br>
<!--       <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script> -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Card Number*</label>
              <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" onChange="addhyphen();"/>
              <input type="text" name="cart_type" value="JCB Card" hidden>
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Card holder name*</label>
              <input type="text" placeholder="Ex.Dineillee Donse" class="form-control" name="card_holder_name"/>
            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Expire date*</label>
              <div class="row">
                <div class="col-sm-6">
              <select name="month" class="form-control" placeholder="MM">
                <option value="" hidden>MM</option>
                <?php
                    for ($m=1; $m<=12; $m++) 
                    {
                echo '  <option value="' . $m . '">' . $m . '</option>';
            }
                ?>

              </select>
                </div>
            <div class="col-sm-6">


              <select name="year" class="form-control" placeholder="YYYY">
                <option value="" hidden>YYYY</option>
                <?php
              $cur_year = date('Y');
                  for ($i=0; $i<=20; $i++) {
                    ?>
                      <option value="<?php echo $cur_year+$i;?>"><?php echo $cur_year++;?></option>
                    <?php
                     
                  }
              ?>
              </select>
            </div>
          </div>
            </div>
            <div class="form-group col-sm-6">
              <label>Security Code*</label>
            <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv"/>
            <input type="text" name="amount" value="<?php echo $total_price;?>" hidden>

            </div>
            <div class="form-group col-sm-12 text-right"><br>
             <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price."0";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                   <?php
                  }
                  else
                  {
                    ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price.".00";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                    <?php
                  }
              ?>
            </div>
           </div>
         </form>
  </div>
  <div class="tab-pane container fade" id="discover_card"><!-- discover Card -->
    <form name="form1" id="discover_form" method="POST" action="<?php echo base_url(); ?>index.php/Worlds_coffee/confirm_order"><br><br>
<!--       <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script> -->
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Card Number*</label>
              <input type="text" placeholder="4242424242424242" class="form-control card_number" name="Card_Number" onChange="addhyphen();"/>
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Card holder name*</label>
              <input type="text" placeholder="Ex.Dineillee Donse" class="form-control" name="card_holder_name"/>
              <input type="text" name="cart_type" value="Discover Card" hidden>
            </div>
           </div>
           <div class="row">
           <div class="form-group col-sm-6">
              <label>Expire date*</label>
              <div class="row">
                <div class="col-sm-6">
              <select name="month" class="form-control" placeholder="MM">
                <option value="" hidden>MM</option>
                <?php
                    for ($m=1; $m<=12; $m++) 
                    {
                echo '  <option value="' . $m . '">' . $m . '</option>';
            }
                ?>

              </select>
                </div>
            <div class="col-sm-6">


              <select name="year" class="form-control" placeholder="YYYY">
                <option value="" hidden>YYYY</option>
                <?php
              $cur_year = date('Y');
                  for ($i=0; $i<=20; $i++) {
                    ?>
                      <option value="<?php echo $cur_year++;?>"><?php echo $cur_year++;?></option>
                    <?php
                     
                  }
              ?>
              </select>
            </div>
          </div>
            </div>
            <div class="form-group col-sm-6">
              <label>Security Code*</label>
            <input type="text" placeholder="CCV/CVV" class="form-control" name="cvv"/>
            <input type="text" name="amount" value="<?php echo $total_price;?>" hidden>
            </div>
            <div class="form-group col-sm-12 text-right"><br>
              
               <?php
                $pattern = '/[.]/';
                  if (preg_match($pattern, $total_price))
                  {
                   ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price."0";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                   <?php
                  }
                  else
                  {
                    ?>
                   <b> <button type="submit" class="btn btn-success">Proceed $<?php echo $total_price.".00";?> <i class="fas fa-arrow-circle-right"></i></button> </b>
                    <?php
                  }
              ?>
              
              
             
            </div>
           </div>
         </form>
  </div>
</div>


           
        </div>
        <div class="col-sm-4 cart-item-div"><br>
            <h3 class="text-center">Cart Items</h3><br>
           <?php
          $length=sizeof($cart_detail);
            foreach ($cart_detail as $cart_item) 
            {

              
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

    $('#discover_form').validate({ // initialize the plugin
        rules: {
            Card_Number: {
                required: true
            },
            card_holder_name: {
                required: true
            },
            month: {
                required: true,
            },
            year: {
                required: true,
            },
            cvv: {
                required: true
            }
        },
         messages: {
        Card_Number: "<div class='error_msg'>Card number required</div>",
        card_holder_name: "<div class='error_msg'>Card holder name required</div>",
        month:"<div class='error_msg'>Expire date required</div>",
        year:"<div class='error_msg'>Expire date required</div>",
        cvv:"<div class='error_msg'>Card cvv required</div>",
        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});



  $(document).ready(function () {

    $('#visa_form').validate({ // initialize the plugin
        rules: {
            Card_Number: {
                required: true
            },
            card_holder_name: {
                required: true
            },
            month: {
                required: true,
            },
            year: {
                required: true,
            },
            cvv: {
                required: true
            }
        },
         messages: {
        Card_Number: "<div class='error_msg'>Card number required</div>",
        card_holder_name: "<div class='error_msg'>Card holder name required</div>",
        month:"<div class='error_msg'>Expire date required</div>",
        year:"<div class='error_msg'>Expire date required</div>",
        cvv:"<div class='error_msg'>Card cvv required</div>",
        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});


  $(document).ready(function () {

    $('#master_form').validate({ // initialize the plugin
        rules: {
            Card_Number: {
                required: true
            },
            card_holder_name: {
                required: true
            },
            month: {
                required: true,
            },
            year: {
                required: true,
            },
            cvv: {
                required: true
            }
        },
         messages: {
        Card_Number: "<div class='error_msg'>Card number required</div>",
        card_holder_name: "<div class='error_msg'>Card holder name required</div>",
        month:"<div class='error_msg'>Expire date required</div>",
        year:"<div class='error_msg'>Expire date required</div>",
        cvv:"<div class='error_msg'>Card cvv required</div>",
        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});


  $(document).ready(function () {

    $('#jcb_form').validate({ // initialize the plugin
        rules: {
            Card_Number: {
                required: true
            },
            card_holder_name: {
                required: true
            },
            month: {
                required: true,
            },
            year: {
                required: true,
            },
            cvv: {
                required: true
            }
        },
         messages: {
        Card_Number: "<div class='error_msg'>Card number required</div>",
        card_holder_name: "<div class='error_msg'>Card holder name required</div>",
        month:"<div class='error_msg'>Expire date required</div>",
        year:"<div class='error_msg'>Expire date required</div>",
        cvv:"<div class='error_msg'>Card cvv required</div>",
        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});


  $(document).ready(function () {

    $('#american_form').validate({ // initialize the plugin
        rules: {
            Card_Number: {
                required: true
            },
            card_holder_name: {
                required: true
            },
            month: {
                required: true,
            },
            year: {
                required: true,
            },
            cvv: {
                required: true
            }
        },
         messages: {
        Card_Number: "<div class='error_msg'>Card number required</div>",
        card_holder_name: "<div class='error_msg'>Card holder name required</div>",
        month:"<div class='error_msg'>Expire date required</div>",
        year:"<div class='error_msg'>Expire date required</div>",
        cvv:"<div class='error_msg'>Card cvv required</div>",
        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});

</script>
  <script>
  function addhyphen()
{
      str = $(".card_number").val();
      str = str.substring(0,4) + "-" + str.substring(4,str.length);
      str = str.substring(0,9) + "-" + str.substring(9,str.length);
      str = str.substring(0,14) + "-" + str.substring(14,str.length);
      form1.Card_Number.value = str;
}
</script>