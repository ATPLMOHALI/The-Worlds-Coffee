


<?php include('header.php')?>


<div class="top-page-headings">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				 <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>index.php/Worlds_coffee/cart">Cart</a></li>
  	</ul>
			</div>
		</div>
	</div>
</div>
<section>
  <div class="middle">
  	<div class="cart-section">
  	<div class="container">
      <div class="row cart_product">
        <?php
  		if($cart_detail)
        {
          ?>
           <div class="col-sm-12">
      <div class="table-responsive cart-table">
        <table class="table text-center">
          <thead>
          <tr>
            <th>Item Name</th>
            <th>Roast</th>
            <th>Roaster</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>&nbsp;</th>
          </tr>
          </thead>
        <tbody >
        
          <?php
          $length=sizeof($cart_detail);
            foreach ($cart_detail as $cart_item) 
            {

              $sum_price=$cart_item['cart_item_count']*$cart_item['coffee_price'];
              $total_price+= $sum_price;
              $cart_id=$cart_item['cart_id'];
             ?>

                <tr id="<?php echo $cart_item['cart_id'];?>">
                <td>
                <div class="media text-left"><img src="<?php echo base_url().$cart_item['coffee_image'];?>" style="width:70px;" class="align-self-center mr-3"/>
                <div class="media-body" style="width:50px;margin-top:1rem;"><b><?php echo $cart_item['coffee_name'];?></b><small class="clr-grey" style="display:block;"><?php echo $cart_item['weight'];?></small></div>
                </td>
                <td><?php echo $cart_item['roast_type'];?></td>
                <td><?php echo $cart_item['company_name'];?></td>
                <td>
              <a class="decrease" id="<?php echo $cart_id;?>" href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/count-minius.png" alt="decrease"/></a>
              <b id="output<?php echo $cart_id;?>"><?php echo $cart_item['cart_item_count'];?></b>
              <a class="increase" id="<?php echo $cart_id;?>" href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/count.png" alt="increase"/></a></td>
                <td>$<span id="count_price<?php echo $cart_id;?>"><?php echo $cart_item['coffee_price'];?></span></td>
              <?php
                $pattern = '/[.]/';
                ?>
                  
                   <td><b>$<span id="count_sum<?php echo $cart_id;?>"><?php echo number_format($sum_price,2);?></span></b></td>
                  
                
                <!-- <?php //echo base_url();?>index.php/Worlds_coffee/delete_cart_item?cart_id=<?php //echo $cart_item['cart_id'];?> -->
                <td><a href="javascript:void(0)" class="font26 clr-grey delete_cart" onclick="delete_cart_item(<?php echo $cart_item['cart_id'];?>)"><img src="<?php echo base_url();?>assets/images/cross.png" height="25px" alt="cart"/></a></td>
              </tr>
             <?php
            }
          ?>
      </tbody>
      </table>
      </div>
      </div>
    </div><hr>
    <div class="row justify-content-end">
      <div class="col-sm-4"><br>
        <div class="row">
        <div class="col-sm-6 text-right"><p class="font22">Total Price : </p></div>
        
                   <div class="col-sm-6 text-right"><b class="font22">$<span id="total_price"><?php echo number_format($total_price,2);?></span></b></div>
                  


        
        <div class="col-sm-6 text-right"><p class="font22">Items : </p></div>
        <div class="col-sm-6 text-right"><b class="font22"><?php echo $length;?></b></div>
        <!-- <a href="<?php //echo base_url(); ?>index.php/Worlds_coffee/catalog" class="btn btn-success">Continue Shopping </a>  -->
        <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/contact_information" class="btn btn-success col-sm-12">Place Order </a> 
      </div>
      <?php

        }
        else
        {
          ?>
          <div class="col-sm-12 text-center no_data">
            <img src="<?php echo base_url();?>assets/images/empty_cart.jpg" alt="" class="img-fluid"><br>
            
            Looks like you have no item in your cart.<br>
            click <a href="<?php echo base_url();?>index.php/Worlds_coffee/catalog"><span class="back_link"> here</span></a> to continue shopping.

          </div>
          <?php
        }
        ?>
    </div>
  	</div>
  	</div>
  </div>
</section>
  <?php include('footer.php');?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- <script>
  $(document).ready(function(){
    $('#delete_cart_item').modal('show'); 
  });
</script> -->

<script>

   function delete_cart_item(cart_id)
  {
    $('#cart_id').val(cart_id);
    console.log(cart_id);
    $('#delete_cart_item').modal('show'); 

//       $.ajax({
//                 type: "POST",
//                 url: "<?php //echo base_url();?>index.php/Worlds_coffee/delete_cart_item",
//                 data: {'cart_id':cart_id},
//                 success: function(res) {
//                   console.log(cart_id);
                    

//                     //window.location(coffee_url);
//                     $('.cart_product').html(res);
                    
//                 }
// });
  }

</script>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->

<script>
  //var id=<?php// echo $user_cart_id;?>;
$('.increase').click(function() {
  //var val=$('#output').text();
  var id=this.id;
  //alert(this.id);
  $(this).closest('tr').find('#output'+id).html(function(i, val){
      val=val*1+1;
      $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/update_cart",
                data: {'cart_id':id,'count':val},
                success: function(res) {
                  console.log(id);
                  console.log(val);

                    
                }
              });
        var price=$(this).closest('tr').find('#count_price'+id).text();
        console.log(val);
        console.log(price);
          $(this).closest('tr').find('#count_sum'+id).html(function(i, sum) { 
          var sum=price*val;
          sum=sum.toFixed(2);
          return sum 

           });
           $('#total_price').html(function(i, total) { 
          var total=parseFloat(total)+parseFloat(price);
          console.log(total);
          total=total.toFixed(2);
          return total
           });  
          return val
        });

   
});
$('.decrease').click(function() {
  var id=this.id;
  //alert(this.id);
  $(this).closest('tr').find('#output'+id).html(function(i, val) { 
      if(val>1)
      {
        dec=val*1-1;
        $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/Worlds_coffee/update_cart",
                data: {'cart_id':id,'count':dec},
                success: function(res) {
                  console.log(id);
                  console.log(dec);

                    
                }
              });
       
          var price=$(this).closest('tr').find('#count_price'+id).text();
          console.log(dec);
          console.log(price);
        $(this).closest('tr').find('#count_sum'+id).html(function(i, sum) { 
          var sum=sum-price;
          sum=sum.toFixed(2);
          return sum 
           });  
      $('#total_price').html(function(i, total) { 
          var total=parseFloat(total)-parseFloat(price);
          console.log(total);
          total=total.toFixed(2);
          return total 
           });   
      }
    return dec   
    });
   
 });
</script>


<!-- Modal -->
  <div class="modal fade" id="delete_cart_item" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Remove item</h4>
          <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee/delete_cart_item">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" id="cart_id" name="cart_id" hidden>
          <p>Are you really want to remove item from cart?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Yes</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
