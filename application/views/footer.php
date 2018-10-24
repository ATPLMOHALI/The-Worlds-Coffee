
<section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-9">
					<ul class="footer-nav">
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li><a href="<?php echo base_url()?>index.php/Worlds_coffee/catalog">Catalog</a></li>
						<li><a href="<?php echo base_url()?>index.php/Worlds_coffee/about">About</a></li>
						<li><a href="<?php echo base_url()?>index.php/Worlds_coffee/map">Map</a></li>
						<li><a href="<?php echo base_url()?>index.php/Worlds_coffee/contact">Contact</a></li>
						<!-- <li><a href="<?php //echo base_url()?>">Delivery Information</a></li> -->
					</ul>
				</div>
				<div class="col-sm-3 col-3">
					<ul class="footer-nav bottom-social-li float-right">
				<li><a href="https://www.facebook.com/The-Worlds-Coffee-1849603458603768/" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
        <li><a href="https://twitter.com/login" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.instagram.com/theworldscoffee/" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div><hr>
			<div class="row">
			<div class="col-sm-6 col-12 mobile-center">
				<address>
					theworldscoffee@protonmail.com<br>
					Austin, Texas<br>
					+61 040 1774 289
				</address>
			</div>
			<div class="col-sm-6 col-12"><br>
				<form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee/subscribe" class="form-inline">
		<button type="submit" class="btn col-sm-3 bg-transparent clr-white text-uppercase" style="letter-spacing:0.065rem !important;">Subscribe</button>
 		<input type="email" name="email" placeholder="Type email address to receive our news" class="form-control col-sm-9" required>
 			</form><br>
			</div>
			</div><hr>
			<div class="row">
				<div class="col-sm-12 col-xs-12 text-center copyright">
					<p style="color:#d0d0d0;"><a href="<?php echo base_url()?>index.php/Worlds_coffee/privacy_policy">Privacy policy</a> & <a href="<?php echo base_url()?>index.php/Worlds_coffee/terms_of_services">Terms of Service</a></p>
					<p>&copy; TheWorldsCoffee 2018. All rights reserved</p>
				</div>
			</div>
		</div>
	</footer>
</section>


<!--js start-->
<!-- <script src="<?php //echo base_url();?>assets/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<!-- <script src="<?php //echo base_url();?>assets/js/popper.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>

<!--js close-->

	<script>
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		  load: {
      		  filter: '.latest'  
      		}     
				});								
			
			}
		};
		// Run the show!
		filterList.init();
	});	
	</script>

<script>
$('#inc').click(function() {
   $('#output').html(function(i, val) { return val*1+1 });
});
$('#dec').click(function() {
	
		$('#output').html(function(i, val) { 
			if(val>1)
			{
				return val*1-1
			}
			 
		});
   
 });
</script>
<script>
	$('.use-address').click(function () {
    var id = $(this).closest("tr").find('tdspan').text();
    alert(id);
});
</script>

<script>
	$(".search-btn").click(function(){
		// var coffee_url=";
		window.location.href = "<?php echo base_url();?>index.php/Worlds_coffee/catalog"; 
			$(".input").toggleClass("active").focus;
  			$(this).toggleClass("animate");
  			$(".input").val("");
  
});

</script>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-52-2-212-171-worlds-coffee-index-php.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


<script>

	    $(".input_search").keyup(function(){  
	    var search=$(".input_search").val();   
	       console.log(search);
          $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/search_coffee",
                data: {'search_text':search},
                success: function(res) {
                    
                    //window.location(coffee_url);
                    $('.products').html(res);
                    
                }
});
    
        
    });

    $(".input_search_res").keyup(function(){  
	    var search=$(".input_search_res").val();   
	       console.log(search);
          $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/search_coffee",
                data: {'search_text':search},
                success: function(res) {
                    
                    //window.location(coffee_url);
                    $('.products').html(res);
                    
                }
});
    
        
    }); 

</script>
</body>
</html>