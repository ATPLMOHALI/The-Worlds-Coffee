
<?php
$cart_count=$this->Coffee_model->get_cart_count();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>The Worlds Coffee</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">


<!--css start-->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/worlds-coffee.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/layout.css">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png"/>


<!--css close-->
</head>

<body>
<section>
	<header>
		<div class="navigation">
			<div class="container">
	<nav class="navbar navbar-expand-sm">
	<div class="d-none d-sm-block"><a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt="worlds coffee" class="logo"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon">
           	<i class="icon-bar"></i>
           	<i class="icon-bar"></i>
           	<i class="icon-bar"></i>
           </span>
        </button>
        <div class="d-block d-sm-none">
       <ul class="navbar-nav responsive-nav">
  	<li class="nav-item">
       <a class="nav-link search-btn" href="javascript:void(0)"><img src="<?php echo base_url();?>assets/images/search.png" alt="search"/>
     </a>
  <div class="search-box">
      <input type="text" placeholder="Search for Coffee" name="input_search" class="input input_search_res" style="opacity:0;">
  </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/Worlds_coffee/cart"><img src="<?php echo base_url();?>assets/images/cart.png" alt="cart"/>
       <?php
          if($cart_count[0]['cart_count']>0)
          {
            if($cart_count[0]['cart_count']>10)
            {
              ?>
            <span class="count_cart"><?php echo $cart_count[0]['cart_count'];?><sup>+</sup></span>
            <?php
            }
            else
            {
              ?>
                  <span class="count_cart"><?php echo $cart_count[0]['cart_count'];?></span>
              <?php
            }
            
          }

        ?>
      </a>
    </li>
  </ul>
</div>
  <!-- Brand -->
  

  <!-- Links -->
  <div id="navbarNavDropdown" class="navbar-collapse collapse">
    <?php
$url=$_SERVER['REQUEST_URI']; 
$r = parse_url($url);
$endofurl = substr($r['path'], strrpos($r['path'], '/'));
$endurl=explode('/',$endofurl);
// print_r($endurl);
$endurl=$endurl[1];
 // echo $endurl;
if($endurl=="catalog") 
  {
    ?>

  <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
<?php
}
else if($endurl=="about")
{
  ?>
  <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
<?php
}
else if($endurl=="map")
{
  ?>
  <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
  <?php
}
else if($endurl=="contact")
{
  ?>
   <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
  <?php
}
else if($endurl==0)
{
  ?>
  <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
  <?php
}
else
{
  ?>
        <ul class="navbar-nav mr-auto bd-top">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/catalog">Catalog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/about">About</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/map">Map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/worlds_coffee/contact">Contact</a>
    </li>
  </ul>
  <?php
}
?>

  <div class="d-none d-sm-block">
  <ul class="navbar-nav mt-rt-30">
  	<li class="nav-item">
     <div class="search-box">
      <input type="text" placeholder="Search for Coffee" name="input_search" class="input input_search" style="opacity:0;">
       <a class="nav-link search-btn" href="javascript:void(0)"><img src="<?php echo base_url();?>assets/images/search.png" alt="search"/>
     </a>
  </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url();?>index.php/Worlds_coffee/cart"><img src="<?php echo base_url();?>assets/images/cart.png" alt="cart"/>
        <?php
          if($cart_count[0]['cart_count']>0)
          {
            if($cart_count[0]['cart_count']>10)
            {
              ?>
            <span class="count_cart"><?php echo $cart_count[0]['cart_count'];?><sup>+</sup></span>
            <?php
            }
            else
            {
              ?>
                  <span class="count_cart"><?php echo $cart_count[0]['cart_count'];?></span>
              <?php
            }
            
          }

        ?>
      
    </a>
    </li>
  </ul>
</div>

</div>
</nav>
</div>
</div>
</header>
</section>