<style type="text/css">
    
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Worlds Coffee Admin dashboard</title>
<?php include('header.php');?>
<div class="wrapper dashboard"  style="background-image: url('<?php echo base_url();?>assets/images/photo-1504538292323-20e79775474d.jpeg');">
    
<?php include('sidebar.php');?>
<!-- <?php //print_r($coffee_count);?>
<?php //print_r($roaster_count);?>
<?php //echo $hello;?> -->

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
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin">Dashboard</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                
                            </div>
                            <div class="content">
                                <img src="<?php echo base_url();?>assets/images/VuJWN2m.jpg" width="100%"  style="height: 185px;">
                                <div class="footer">
                                    <div class="legend">
                                       <h4 class="title"><b>Total Coffee's</b></h4>
                                        <p class="category">Last Campaign Performance</p> 
                                    <p><b>Coffee's Count:</b> <?php print_r($coffee_count[0]['total_coffee']);?></p>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> updated on <?php echo date('d-m-Y');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                
                            </div>
                            <div class="content">
                                <img src="<?php echo base_url();?>assets/images/dreamstime_s_Cooked_Beans_w_Shovel.jpg" width="100%"  style="height: 185px;">
                                <div class="footer">
                                    <div class="legend">
                                       <h4 class="title"><b>Total Roaster's</b></h4>
                                <p class="category">Last Campaign Performance</p>
                                        
                                    <p><b>Roaster's Count:</b> <?php echo $roaster_count[0]['total_roaster'];?></p>
                                
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> updated on <?php echo date('d-m-Y');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="card">
                            
                            <div class="header">
                                
                            </div>
                            <div class="content">
                                <img src="<?php echo base_url();?>assets/images/cc-video-poster.jpg" width="100%" style="height: 185px;">
                                <div class="footer">
                                    <div class="legend">
                                <h4 class="title"><b>Payments</b></h4>
                                <p class="category">Last 30 Days</p>
                                       <p><b>Payments Count:</b> <?php echo $last_month[0]['total_payments'];?></p>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> updated on <?php echo date('d-m-Y');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>





<?php include('footer.php');?>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 