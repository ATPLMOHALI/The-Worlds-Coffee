<?php include('header.php');

$countries = array("Afghanistan", "Akrotiri", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Islands", "Australia", "Austria", "Azerbaijan", "The Bahamas", "Bahrain", "Bangladesh", "Barbados", "Bassas da India", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Democratic Republic of the Congo", "Republic of the Congo", "Cook Islands", "Coral Sea Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Dhekelia", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "The Gambia", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jersey", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "North Korea", "South Korea", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Federated States of Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Navassa Island", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paracel Islands", "Paraguay", "Peru", "Philippines", "Pitcairn Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tibet", "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tromelin Island", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wake Island", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Zambia","Zimbabwe");
?>

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
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/delivery_details">Delivery details</a></li>
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
          
           <h1>Delivery Details</h1><br>
           <form method="POST" id="delivery_info" action="<?php echo base_url(); ?>index.php/Worlds_coffee/get_payment_details">
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Country <span style="color:red;">*</span></label>
              <!-- <input type="text" placeholder="Enter country name" class="form-control" name="Country_Name" value="<?php echo $country;?>" /> -->
              <select style="width:98%;" name="Country_Name" class="form-control" id="country" selected="<?php echo $country;?>">
                                <?php
                                if($country)
                                {
                                    echo "<option value=".$country.">".$country."</option>";
                                }
                                else
                                {
                                    echo "<option hidden>Ex. Colombia</option>";
                                }

                                ?>
                                <?php
                                for($i=0; $i<=count($countries); $i++)
                                {
                               
                                ?> 
                                <option value="<?php echo $countries[$i];?>"><?php echo $countries[$i];?></option>
                                <?php 
                                    
                                
                                }   
                                ?>
                                <!--<option>India</option>
                                <option>United Kingdom</option>
                                <option>China</option>-->
                               </select>
            </div>
            <div class="form-group col-sm-6">
              <label>City <span style="color:red;">*</span></label>
              <input type="text" autocomplete="off" placeholder="Ex. Gold Coast" class="form-control" name="City_Name" value="<?php echo $city;?>" />
              <input type="text" name="cart_ids" value="<?php print_r($id_cart);?>" hidden>
            </div>
           </div>
           <div class="row">
            <div class="form-group col-sm-6">
              <label>Address <span style="color:red;">*</span></label>
              <input type="text" autocomplete="off" placeholder="Ex. xyz" class="form-control" name="address" value="<?php echo $address;?>" />
              <input type="text" name="total_price" value="<?php echo number_format($total_price,2);?>" hidden>
            </div>
            <div class="form-group col-sm-6">
              <label>Post Code <span style="color:red;">*</span></label>
              <input type="number" autocomplete="off" placeholder="Ex. 12345" class="form-control" name="Post_Code" value="<?php echo $post_code;?>" />
            </div>
            <div class="form-group col-sm-12 text-right"><br>
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_q9fz2P8FE0TzGDYiKcD6EZBk"
                    data-name="Worlds coffee"
                    data-description="Widget"
                    data-image="<?php echo base_url();?>assets/images/logo.png"
                    data-locale="auto"
                    data-panelLabel="Proceed">
                </script>
             <!-- <b> <button type="submit" class="btn bg-transparent">NEXT <i class="fas fa-arrow-circle-right"></i></button> </b> -->
            </div>
           </div>
         </form>
        </div>
        <div class="col-sm-4 cart-item-div"><br>
            <h3 class="text-center">Cart Items</h3><br>
           <?php
          $length=sizeof($cart_detail);
            foreach ($cart_detail as $cart_item) 
            {

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