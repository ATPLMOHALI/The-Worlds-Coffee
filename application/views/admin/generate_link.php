<?php
$main_url=base_url()."index.php/Worlds_coffee_admin/stripe_connect_link?link_id=";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Generate stripe link to connect</title>

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
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
        <div class="container-fluid">
        <div id="add_coffee" class="card mb-3">
            <div class="card-header" style="font-size: 23px;">
              <i class="fa fa-link"></i> 
               Genrate account activation link
          </div>
          <br>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 submit_btn text-center">
                      <a href="javascript:void(0)" id="<?php echo $main_url;?>" class="get_link" onclick="get_link(<?php echo $roaster_id;?>,this.id)">
                      <input type="submit" id="submit" class="btn btn-success" name="genrate_stripe_link" value="GET ACCOUNT ACTIVATION LINK"></a>
                  </div>
                    <div class="form-label-group col-sm-12">
                      <label for="stripe_link">Link</label>
                      <input type="text" id="stripe_link" class="form-control" placeholder="Link genrated here.." name="stripe_link">
                    </div>
                
                
                </div>

            </div>
            
          </div>

            </div>
        </div>




<?php include('footer.php');?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  function get_link(roaster_id,main_url)
  {
      //alert(roaster_id);
      var genrate_code=makeid();
      var genrate_url=main_url+genrate_code+"-"+roaster_id;
      //alert(url);
      var link_id=genrate_code+"-"+roaster_id;
      $('#stripe_link').hide();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee_admin/set_session",
            data: {'link_id':link_id},
            success: function(res) 
            {
              $('#stripe_link').val(genrate_url).fadeIn(1500);
            }
  }); 
      

      console.log(url);
  }

// $('.get_link').onclick(function(){

//   //var roaster_id=$(this).attr('id');
//   alert("hello");

// });
 function makeid() 
 {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 20; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
</script>
