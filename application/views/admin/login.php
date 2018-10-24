<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>
    <style type="text/css">
      body#LoginForm{ background-image:url("<?php echo base_url();?>assets/images/login_bg.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;background-attachment: fixed;}
    </style>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
      <div class="logo text-center">
        <img src="<?php echo base_url();?>assets/images/logo.png" height="87px">
          <h3>Worlds Coffee Admin</h3> 
                
            </div>
            <br>
   </div>
    <form id="Login" method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/user_login">

        <div class="form-group">

          <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">

        </div>

        <div class="form-group">
          <label for="email">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">

        </div>
        <div class="forgot">
        <!-- <a href="reset.html">Forgot password?</a> -->
</div>
        <button type="submit" class="btn btn-success">Login</button>

    </form>
    </div>
</div></div></div>


</body>
</html>
