<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add New News</title>

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
                    
                    
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/Worlds_coffee_admin/add_new_news">Add New News</a>
                </div>
                <?php include('navbar.php');?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
        <div id="add_coffee" class="card mb-3">
            <div class="card-header" style="font-size: 23px;">
              <i class="fa fa-wpforms"></i> 
               Add News
          </div>
          <div class="all_coffee text-right" style="margin-top: -13px;"><a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details" class="btn-success btn_add">All News</a></div>
          <br>
            <div class="card-body">
               <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/save_new_news" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="hash_tags">Hash Tags</label>
                    <input type="text" id="hash_tags" class="form-control" placeholder="Hash Tags" autofocus="autofocus" name="hash_tags">
                    
                  </div>
                </div>                
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="file_image">News Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="news_description">News Description</label>
                    <textarea rows="5" id="news_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="news_description"></textarea>
                  </div>
                </div>


                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Save News">
                </div>
                
                </div>
            </form>
            </div>
            
          </div>

            </div>
        </div>




<?php include('footer.php');?>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

