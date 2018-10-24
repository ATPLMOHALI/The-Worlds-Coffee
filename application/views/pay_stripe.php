<!-- <script src="https://checkout.stripe.com/checkout.js"></script>

<button id="customButton">Purchase</button>
<div class="token"></div>
<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_q9fz2P8FE0TzGDYiKcD6EZBk',
  image: '<?php echo base_url();?>assets/images/logo.png',
  locale: 'auto',
  token: function(token) {
    // $('#token').val(token.id);
    //$('.token').html(token);
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Worlds coffee',
    panelLabel:'Proceed'
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script> -->
<form action="<?php echo base_url();?>index.php/Worlds_coffee/pay_stripe_test">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_q9fz2P8FE0TzGDYiKcD6EZBk"
    data-name="Worlds coffee"
    data-description="Widget"
    data-image="<?php echo base_url();?>assets/images/logo.png"
    data-locale="auto"
    data-panelLabel="Proceed">
  </script>
</form>