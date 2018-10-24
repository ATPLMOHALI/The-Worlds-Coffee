<?php include('header.php')?>


<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/Worlds_coffee">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url();?>index.php/Worlds_coffee/contact">Contact</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle bg-brown">
  	<div class="about contact">
  	<div class="container">
      <div class="row">
  		<div class="col-sm-6">
  			<h3>Contacts</h3>
        <address>
          <i class="fas fa-envelope"></i> theworldscoffee@protonmail.com<br>
          <i class="fas fa-map-marker-alt"></i> Austin, Texas<br>
          <i class="fa fa-phone" aria-hidden="true"></i> +61 040 1774 289
        </address><br><br>
        <h3>Follow us on socials</h3>
        <address class="bottom-social-li contact-li">
          <a href="https://www.facebook.com/The-Worlds-Coffee-1849603458603768/" target="_blank"><i class="fab fa-facebook-f "></i></a>
          <a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/theworldscoffee/" target="_blank"><i class="fab fa-instagram"></i></a>
        </address>
  		</div>
      <div class="col-sm-6">
        <h3>Contact Form</h3>
        <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee/contact_mail">
          <div class="form-group">
            <label>Name*</label>
            <input type="text" name="name" required placeholder="Ex. Denielle" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Email*</label>
            <input type="email" name="email" required placeholder="happycustomer@gmail.com" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Phone*</label>
            <input type="number" name="number" required placeholder="+61 040 1774 289" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Message*</label>
            <textarea placeholder="Start Writing..." name="message" class="form-control" style="height:120px;margin-top: 14px;"></textarea>
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn bg-transparent clr-white text-uppercase" style="border: 1px solid;">Submit</button>
          </div>
        </form>
      </div>
    </div>
  		</div>
  	</div>
  </div>
</section>

<?php include('footer.php');?>