<?php 
$page_url="$_SERVER[REQUEST_URI]";
$roaster_id=end(explode('-',$page_url));
//echo $roaster_id;
//echo $country;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Stripe Connect</title>
    <style type="text/css">
    </style>

<?php include('header.php');?>

      <div class="container">
        <h2>Identify verfication</h2>
        <span style="font-size: 20px;line-height: 2;">(*) - required fields</span>
        <div id="add_coffee" class="card mb-3">
            <div class="card-header" style="font-size: 28px;">
              <i class="fa fa-cc-stripe"></i>&nbsp;&nbsp;
               Stripe connect
          </div>
          
            <div class="card-body" style="padding: 4%;">

              <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/stripe_connect" enctype="multipart/form-data">
              
                <div class="row">
                <div class="detail_header">
                  <div class="col-sm-12"><h3>Address</h3></div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">State *</label>
                    <select id="state" class="form-control" placeholder="State" autofocus="autofocus" name="state" required>
                      <option value="0" hidden>Select state</option>
                      <?php 
                        foreach ($states as $row) 
                        {
                          ?>
                          <option id="<?php echo $row['id'];?>" value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                          <?php
                        }
                      ?>

                    </select>
                    <input type="text" name="roaster_id" value="<?php echo $roaster_id;?>" hidden>
                    <input type="text" name="country" value="<?php echo $country;?>" hidden>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="street">Street *</label>
                    <input type="text" id="street"  name="street" placeholder="Street" class="form-control" required>
                  </div>
                </div>

              

                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="city">City *</label>
                    <input type="text" id="city" name="city" placeholder="City" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="zip_code">Postal Code *</label>
                    <input type="number" id="zip_code"  name="zip_code" placeholder="Zip code" class="form-control" required>
                  </div>
                </div>
              </div>

              <!-- second -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                <div class="detail_header">
                    <div class="col-sm-12"><h3>Business data</h3></div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="business_name">Business Name *</label>
                    <input type="text" id="business_name" class="form-control" placeholder="Business Name" autofocus="autofocus" name="business_name" required>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="business_tax_id">Business tax id *</label>
                    <input type="text" id="business_tax_id" class="form-control" placeholder="Business tax id" autofocus="autofocus" name="business_tax_id" required>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="business_type">Business type *</label>
                    <input type="text" id="business_type" class="form-control" placeholder="Business type" autofocus="autofocus" name="business_type" required>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                <div class="detail_header">
                  <div class="col-sm-12"><h3>Personal data</h3></div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" class="form-control" placeholder="Ex. Mark" autofocus="autofocus" name="first_name" required>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" id="last_name" class="form-control" placeholder="Ex. Desons" autofocus="autofocus" name="last_name" required>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_dob">Date of birth *</label>
                    <input type="date" id="roaster_dob" class="form-control" placeholder="DD-MM-YYY" autofocus="autofocus" name="roaster_dob" required>
                  </div>
                </div>
                </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_email">Email *</label>
                    <input type="email" id="roaster_email" class="form-control" placeholder="Ex. ex@example.com " autofocus="autofocus" name="roaster_email" required>
                  </div>
              </div>

              <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="ssn_number">Personal id number *</label>
                    <input type="number" id="ssn_number" class="form-control" placeholder="SSN" autofocus="autofocus" name="ssn_number" required>
                  </div>
              </div>

              <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="verify_document">Verification document *</label>
                    <small><p>A scan of document verify your Identity (e.g passport or driver's licence)</p></small>
                    <input type="file" name="verify_document" id="verify_document" required>
                  </div>
              </div>
              </div>

              <div class="row">
                <div class="detail_header">
                  <div class="col-sm-12"><h3>Card data</h3></div>
                </div>

                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="card_number">Card number</label>
                    <input type="number" id="card_number" class="form-control" placeholder="Card Number" autofocus="autofocus" name="card_number" >
                  </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="expire_date">Expiration date</label>
                    <input type="text" id="expire_date" class="form-control" placeholder="Ex. MM/YYYY" autofocus="autofocus" name="expire_date" pattern="([0-9]{2}[/]?){2}" title="Expire date should be in MM/YY.">
                  </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="cvv_number">CVV</label>
                    <input type="number" id="cvv_number" class="form-control" placeholder="Ex. 123" maxlength="3" pattern="([0-9]){3}" name="cvv_number" title="CVV have only three numbers. >
                  </div>
              </div>
              </div>
                <div class="clearfix"></div>
                <div class="col-sm-12 submit_btn text-center">
                    <input type="submit" id="stripe_connect" class="btn btn-success" autofocus="autofocus" name="stripe_connect" value="Submit">
                </div>
                
            </form>
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
    $('#document').click(function(){ $('#verify_document').trigger('click'); });
</script>
<script>
  $('#stripe_connect').click(function(){
        if($('#state').val()<1)
        {
          alert("Select state.");
        }
  });
</script>
