<?php include('header.php')?>
<?php
$user_id=$this->session->userdata('session_id');
$user_info=$this->Coffee_model->get_user_info($user_id);
if($user_info)
{
  foreach ($user_info as $row) 
  {
    $name=$row['name'];
    $split=explode(' ',$name);
    $firstname=$split[0];
    $lastname=$split[1];
    $email=$row['email'];
    $phone=$row['phone'];
  }
}

?>

<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/contact_information">Contact information</a></li>
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
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/contact_information">Contact information</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Delivery details</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Payment Method</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Confirm</a></li>
          </ul>
        </div>





        <div class="col-sm-8 cont-info"><br>
           <?php
          $info=$this->session->flashdata('error_msg');
          if($info)
          {
            ?>
            <div class="alert alert-info">
                <strong>Info.! </strong> <?php echo $info;?>
          </div>
            <?php
          }
          ?>
           <h1>Contact Information</h1><br>
           <form method="POST" id="contact_info" action="<?php echo base_url(); ?>index.php/Worlds_coffee/delivery_details">
           <div class="row">
            <div class="form-group col-sm-6">
              <label>First Name <span style="color:red;">*</span></label>
              <input type="text" autocomplete="off" placeholder="Ex.Mark" class="form-control First_Name" name="First_Name" value="<?php echo $firstname;?>" required/>
            </div>
            <div class="form-group col-sm-6">
              <label>Last Name <span style="color:red;">*</span></label>
              <input type="text" autocomplete="off" placeholder="Ex.Desons" class="form-control Last_Name" name="Last_Name" value="<?php echo $lastname;?>" required />
            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Email <span style="color:red;">*</span></label>
              <input type="email" autocomplete="off" placeholder="happycustomer@gmail.com" class="form-control" name="email" value="<?php echo $email;?>" />
            </div>
            <div class="form-group col-sm-6">
              <label>Phone Number <span style="color:red;">*</span></label>
              <input type="number" autocomplete="off" placeholder="7854265412" class="form-control" name="Phone_Number" value="<?php echo $phone;?>" required />
            </div>
            <div class="form-group col-sm-12 text-right"><br>
             <b> <button type="submit" class="btn bg-transparent">NEXT <i class="fas fa-arrow-circle-right"></i></button> </b>
            </div>
           </div>
         </form>
        </div>
        <div class="col-sm-4 cart-item-div">
        <div class="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {

    $('#contact_info').validate({ // initialize the plugin
      ignore: ".ignore",
        rules: {
            First_Name: {
                required: true
            },
            Last_Name: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            Phone_Number: {
                // required: true,
                minlength:8,
                maxlength:11
            }
        },
         messages: {
        First_Name: "<div class='error_msg'>First name required</div>",
        Last_Name: "<div class='error_msg'>Last name required</div>",
        email:
        {
          required:"<div class='error_msg'>Email required</div>",
          email:"<div class='error_msg'>! Invalid email</div>"
        },
        Phone_Number:
        {
          required:"<div class='error_msg'>Phone number required</div>",
          minlength:"<div class='error_msg'>Must contain 8-11 Digits </div>",
          maxlength:"<div class='error_msg'>Must contain 8-11 Digits </div>",
        }

        /*username: {
            required: "Enter a username",
            minlength: jQuery.format("Enter at least {0} characters"),
            remote: jQuery.format("{0} is already in use")
        }*/
    }
    });

});
function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('.First_Name').bind('keypress', testInput);
$('.Last_Name').bind('keypress', testInput);
</script>