<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Worlds_coffee extends CI_Controller {

	function __construct() 
	{
    // if( isset( $_GET['session_id'] ) ) 
    // {
    //   echo $_GET['session_id'];
    //    $_COOKIE[ $this->sess_cookie_name ] = $_GET['session_id'];
    // }
       

        parent::__construct();
        date_default_timezone_set('UTC');
         $this->load->model('Coffee_model');
        $this->load->helper('url');
        //$this->load->library('session');
        $this->load->library('pagination');
        
        // $this->load->view('header',$data);
        $string=$this->genrate_string(10);
        //echo $string;
        // if($this->session->userdata('session_id'))
        // {
        //     $session_id=$this->session->userdata('session_id');
        //     //echo $session_id;
        // }
        // else
        // {
        //   $data['browser']=$_SERVER['HTTP_USER_AGENT'];
        //   $data['session_token']=$string;
        //   $data['ip_address']=$_SERVER['REMOTE_ADDR'];
        //   if($this->db->insert('session_user',$data))
        //   {
        //     $user_id=$this->db->insert_id();
        //     $this->session->set_userdata('session_id',$user_id);
        //   }
        }
        // $session_id = $this->session->userdata('session_id');
        // if($session_id!=13)
        // {
        //   echo "<script> alert('Web site is under Development');</script>";
        //   redirect("Worlds_coffee/google","refresh");
        // }

	}
public function test()
{

          
 $session_id = $this->session->userdata('session_id');
  echo "My Session ID is $session_id"; 
 //$this->load->view('mapbox');  
}
  public function google()
  {
      header('location:https://www.google.com/');
  }	
//==================================================================================//
	public function index()
	{
    $data['latest_products']=$this->Coffee_model->latest_products();
    $data['best_sellers']=$this->Coffee_model->best_sellers();
    $data['special_coffee']=$this->Coffee_model->special_coffee();
    $data['browse_coffee']=$this->Coffee_model->browse_coffee();
    $data['latest_news']=$this->Coffee_model->fetch_latest_news();
    
    //print_r($data);
		$this->load->view('index',$data);

	}
  //==================================================================================//
  public function cart()
  {
    $data['cart_detail']=$this->Coffee_model->get_cart();
    $this->load->view('cart.php',$data);
  }
//==================================================================================//
	public function catalog()
	{
    $extend=$this->input->get('val');
      //$data['all_products']=$this->Coffee_model->fetch_all_products();
      $data['best_sellers']=$this->Coffee_model->best_sellers();
                if($extend)
                {
                  $data['val']=$extend;
                  $limit_per_page=$extend;
                }
                else
                {
                  $limit_per_page = 3;
                }
                    
                    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
                         $total_records=$this->Coffee_model->get_total_coffee();
                    if ($total_records >=0)
                    {      
                        $data['all_products']=$this->Coffee_model->coffee_detail($limit_per_page,$page*$limit_per_page);
                        $config['base_url'] = base_url() . '/index.php/Worlds_coffee/catalog';
                        $config['total_rows'] = $total_records;
                        $config['per_page'] = $limit_per_page;
                        $config["uri_segment"] = 3;
                        $config['num_links'] = 2;
                        $config['use_page_numbers'] = TRUE;
                        $config['reuse_query_string'] = TRUE;
                        $config['first_link'] = false;
                        $config['last_link'] = false;
                        $config['prev_link'] = false;
                        $config['next_link'] = false;
                        $this->pagination->initialize($config);     
                        $data["links"] = $this->pagination->create_links();    
                    }
		
		$this->load->view('catalog',$data);
	}
//==================================================================================//
	public function about()
	{
		$this->load->view('about');
	}
//==================================================================================//
	public function map()
	{
    $data['all_roasters']=$this->Coffee_model->fetch_all_roasters();
		$this->load->view('map',$data);
	}
//==================================================================================//
	public function contact()
	{
		$this->load->view('contact');
	}
//==================================================================================//
	public function product_preview()
	{
    $coffee_id=$_GET['id'];
    $data['coffee_detail']=$this->Coffee_model->get_coffee_detail($coffee_id);
		$this->load->view('product-preview',$data);
	}
//==================================================================================//
		public function roasters()
	{
    
		$data['all_roasters']=$this->Coffee_model->fetch_all_roasters();
		$this->load->view('roasters',$data);
	}
//==================================================================================//
    public function roasters_view()
    {
      $roaster_id=$_GET['id'];
      $data['roaster_detail']=$this->Coffee_model->get_roaster_detail($roaster_id);
      $roaster_name=$data['roaster_detail'][0]['roaster_name'];
      $data['roaster_coffee']=$this->Coffee_model->fetch_roaster_coffee($roaster_name);
      $this->load->view('roaster-view',$data);
    }
//==================================================================================//

	public function filter_roast_type()
	{
		$roast_type=$this->input->post('roast_type');
		//print_r($roast_type);
		$search_roast_type=$this->Coffee_model->search_roast_type($roast_type);
    if($search_roast_type)
    {
            foreach ($search_roast_type as $product) 
            {
                ?>
            <li class="text-center">
                <div class="img-relative-div">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/>
                    <span class="tagline">Medium</span>
                </div>
              
            <div class="rating">
                <?php
                $rating=$product['coffee_rating'];

                $rating1=floor($rating);
                $decimalstart=$rating-$rating1;
                $pointrating=$decimalstart*10;
                $rating2=ceil($rating);
                $unfieldstar=5-$rating2;
                  for($i=0;$i<$rating1;$i++)
                  {
                  ?>  
                  <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16">       
                  <?php
                  } 
                  if (strpos($decimalstart,'.') !== false) {
                    ?>
                  <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16">
                  <?php 
                }
                for($j=0;$j<$unfieldstar;$j++)
                {
                  ?>
                <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16"> 
              <?php 
                }
              ?>    
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
              <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>"> 
                <h3><?php echo $product['coffee_name'];?></h3></a>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                 <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
      }
      else
      {
        ?>
        <div class="text-center no_data justify-content-center">
          <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
        </div>
        <?php
      }

	}
//==================================================================================//
	public function filter_location()
	{
		$location=$this->input->post('location');
		//print_r($location);
		$search_location=$this->Coffee_model->filter_location($location);
    if($search_location)
    {

            foreach ($search_location as $product) 
            {
                ?>
            
            <li class="text-center">
                <div class="img-relative-div">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/>
                    <span class="tagline">Medium</span>
                </div>
                
            <div class="rating">
                <?php
                $rating=$product['coffee_rating'];

                $rating1=floor($rating);
                $decimalstart=$rating-$rating1;
                $pointrating=$decimalstart*10;
                $rating2=ceil($rating);
                $unfieldstar=5-$rating2;
                  for($i=0;$i<$rating1;$i++)
                  {
                  ?>  
                  <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16">       
                  <?php
                  } 
                  if (strpos($decimalstart,'.') !== false) {
                    ?>
                  <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16">
                  <?php 
                }
                for($j=0;$j<$unfieldstar;$j++)
                {
                  ?>
                <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16"> 
              <?php 
                }
              ?>    
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>"> 
                <h3><?php echo $product['coffee_name'];?></h3></a>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                 <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
      }
      else
      {
        ?>
        <div class="text-center no_data justify-content-center">
          <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
        </div>
        <?php
      }

	}
//==================================================================================//
	public function filter_roaster_location()
	{
		$location=$this->input->post('location');
		//print_r($location);
		$search_location=$this->Coffee_model->filter_roaster_location($location);
    if($search_location)
    {

		foreach ($search_location as $row) 
          {
           ?>
           <li class="text-center">
        <a href="#"><img src="<?php echo base_url().$row['roaster_image'];?>" alt="<?php echo $row['roaster_name'];?>" class="img-fluid"/></a>
        <h1><?php echo $row['roaster_name'];?></h1>
        <h4><?php echo $row['roaster_location'];?></h4>
        </li>
           <?php
          }
       }
      else
      {
        ?>
        <div class="text-center no_data justify-content-center">
          <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
        </div>
        <?php
      }


            
	}
//==================================================================================//
  public function filter_price()
  {
    $min_price=$this->input->post('min_price');
    $max_price=$this->input->post('max_price');
    $min_price=$min_price.".00";
    $max_price=$max_price.".00";
    // echo $min_price."</br>";
    // echo $max_price;
    $search_price=$this->Coffee_model->filter_price($min_price,$max_price);
    //echo count($search_price);
                  
    if($search_price)
    {
            foreach ($search_price as $product) 
            {
                ?>
                
            <li class="text-center">
                <div class="img-relative-div">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/>
                    <span class="tagline">Medium</span>
                </div>
                
            <div class="rating">
                <?php
                $rating=$product['coffee_rating'];

                $rating1=floor($rating);
                $decimalstart=$rating-$rating1;
                $pointrating=$decimalstart*10;
                $rating2=ceil($rating);
                $unfieldstar=5-$rating2;
                  for($i=0;$i<$rating1;$i++)
                  {
                  ?>  
                  <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16">       
                  <?php
                  } 
                  if (strpos($decimalstart,'.') !== false) {
                    ?>
                  <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16">
                  <?php 
                }
                for($j=0;$j<$unfieldstar;$j++)
                {
                  ?>
                <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16"> 
              <?php 
                }
              ?>    
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/product_preview?id=<?php echo $product['coffee_id']; ?>"> 
                <h3><?php echo $product['coffee_name'];?></h3></a>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                 <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
            }
        }
      else
      {
        ?>
        <div class="text-center no_data justify-content-center">
          <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
        </div>
        <?php
      }

  }
//==================================================================================//
  public function privacy_policy()
  {
      $this->load->view('privacy-policy');
  }
//==================================================================================//
  public function terms_of_services()
  {
      $this->load->view('terms-and-conditions');
  }
//==================================================================================//
  public function subscribe()
  {
      $email=$this->input->post('email');
      $email_send=$this->Coffee_model->send_subscribe_email($email);
      if($email_send==true)
      {
          
          $message = "Thanks for Subscriptions";
          echo "<script type='text/javascript'>alert('$message');</script>";
          redirect("","refresh");
          
      }
      else
      {
          
          $message = "You already Subscribe our News";
          echo "<script type='text/javascript'>alert('$message');</script>";
          redirect("","refresh");
          
      }
      //echo $email;
  }
//==================================================================================//
    public function contact_mail()
    {
        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['number']=$this->input->post('number');
        $data['message']=$this->input->post('message');

        
        $send_email=$this->Coffee_model->send_contact_email($data);
        if ($send_email) 
        {
            $message = "Thanks for Contact us we will contact you shortly";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect("","refresh");
        }
        else
        {
            $message = "Email Not sended";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect("","refresh");
        }
    }
//==================================================================================//
    public function search_coffee()
    {
      $search_text=$this->input->post('search_text');
      // echo $search_text;
      $search_coffee=$this->Coffee_model->search_coffee_name($search_text);
      if($search_coffee)
      {



            foreach ($search_coffee as $product) 
            {
                ?>
            <li class="text-center">
                <div class="img-relative-div">
                    <img src="<?php echo base_url().$product['coffee_image'];?>" alt="dark art"/>
                    <span class="tagline"><?php echo $product['roast_type'];?></span>
                </div>
                
            <div class="rating">
                <?php
                $rating=$product['coffee_rating'];

                $rating1=floor($rating);
                $decimalstart=$rating-$rating1;
                $pointrating=$decimalstart*10;
                $rating2=ceil($rating);
                $unfieldstar=5-$rating2;
                  for($i=0;$i<$rating1;$i++)
                  {
                  ?>  
                  <img src="<?php echo base_url();?>assets/images/star.png" height="16" width="16">       
                  <?php
                  } 
                  if (strpos($decimalstart,'.') !== false) {
                    ?>
                  <img src="<?php echo base_url();?>assets/images/star<?php echo $pointrating;?>.png" height="16" width="16">
                  <?php 
                }
                for($j=0;$j<$unfieldstar;$j++)
                {
                  ?>
                <img src="<?php echo base_url();?>assets/images/unfield-star.png" height="16" width="16"> 
              <?php 
                }
              ?>    
            </div>
                <!-- <img src="<?php //echo base_url();?>assets/images/rating.png" alt="rating" class="rating-img"/> -->
                <h3><?php echo $product['coffee_name'];?></h3>
                <p><?php echo $product['company_name'];?></p>
                <span class="rate">$<?php echo $product['coffee_price'];?><small class="clr-gray">/1lbs</small></span><br>
                <a href="<?php echo base_url(); ?>index.php/Worlds_coffee/add_to_cart2?product_id=<?php echo $product['coffee_id']; ?>" class="btn btn-success">Add to Cart <img src="<?php echo base_url();?>assets/images/basket.png" alt="basket"/></a>
            </li>

              <?php  
        }
      }
      else
      {
        ?>
        <div class="text-center no_data justify-content-center">
          <img src="<?php echo base_url();?>assets/images/NoRecordFound.png" class="img-fluid">
        </div>
        <?php
      }
            
    }
//==================================================================================//
    public function search()
    {
      $search_text=$this->input->get('search_text');
      // echo $search_text;
      $data['all_products']=$this->Coffee_model->search_coffee_name($search_text);
      $data['best_sellers']=$this->Coffee_model->best_sellers();
      $this->load->view('catalog',$data);
    }

//================================================================================//
    public function add_to_cart()
    {
      $user_id=$this->session->userdata('session_id');
      //echo $user_id;
        $data['user_id']=$user_id;
        $data['count_val']=$this->input->post('count_val');
        $data['product_id']=$this->input->post('product_id');
        $add_cart=$this->Coffee_model->add_to_cart($data);

      
    }
//================================================================================//
    public function add_to_cart2()
    {
      $user_id=$this->session->userdata('session_id');
      //echo $user_id;
        $data['user_id']=$user_id;
        $data['count_val']="1";
        $data['product_id']=$this->input->get('product_id');
        $add_cart=$this->Coffee_model->add_to_cart($data);
        if($add_cart)
        {
          redirect('Worlds_coffee/cart',"refresh");
        }
      
    }
//===============================================================================//
    public function genrate_string( $length ) {

       $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  

       $size = strlen( $chars );

       

       for( $i = 0; $i < $length; $i++ ) 
       {

              $str.= $chars[ rand( 0, $size - 1 ) ];

               

       }
       return $str;

}
//==================================================================================//
    public function delete_cart_item()
    {
        $cart_id=$this->input->post('cart_id');
        //echo $cart_id;
        $delete_cart_item=$this->Coffee_model->delete_cart_item($cart_id);
        if($delete_cart_item)
        {
          redirect('Worlds_coffee/cart',"refresh");
        }
        
    }
//==================================================================================//
    public function update_cart()
    {
      $cart_id=$this->input->post('cart_id');
      $count=$this->input->post('count');
      $update_cart=$this->Coffee_model->update_cart($cart_id,$count);
    }
//==================================================================================//
    public function contact_information()
    {
      $user_cart=$this->Coffee_model->get_cart();
      if($user_cart==Null)
      {
        redirect('Worlds_coffee/cart',"refresh");
      }
      $data['cart_detail']=$this->Coffee_model->get_cart();
      $this->load->view('contact-information',$data);
    }
//==================================================================================//
    public function delivery_details()
    {
      $user_cart=$this->Coffee_model->get_cart();
      if($user_cart==Null)
      {
        redirect('Worlds_coffee/cart',"refresh");
      }
      if($_POST)
      {
          $user_info['name']=$this->input->post('First_Name')." ".$this->input->post('Last_Name');
          $user_info['email']=$this->input->post('email');
          $user_info['phone']=$this->input->post('Phone_Number');        
      }

      //print_r($user_info);
      if($user_info)
      {
        $user_information=$this->Coffee_model->add_user_info($user_info);
      }
      
      if($user_information)
      {
        $data['cart_detail']=$this->Coffee_model->get_cart();
        //$this->session->set_userdata('payment_session','worlds_coffee');
        $this->load->view('delivery-details',$data);
      }
      else
      {
        redirect('Worlds_coffee/contact_information',"refresh");
      }
      
    }
//==================================================================================//
    public function get_payment_details()
    {
      $user_cart=$this->Coffee_model->get_cart();
      if($user_cart==Null)
      {
        redirect('Worlds_coffee/cart',"refresh");
      }

      if($this->input->post('Country_Name'))
      {
        $delivery_info['country']=$this->input->post('Country_Name');
      }
      if($this->input->post('City_Name'))
      {
        $delivery_info['city']=$this->input->post('City_Name');
      }
      if($this->input->post('address'))
      {
        $delivery_info['address']=$this->input->post('address');
      }
      if($this->input->post('Post_Code'))
      {
        $delivery_info['post_code']=$this->input->post('Post_Code');
      }

      // if($delivery_info)
      // {
      //    //print_r($user_info);
      // }
      if($_POST)
      {
        $data['transaction_id']=$_POST['stripeToken'];
        $data['cart_ids']=$_POST['cart_ids'];
        $data['payment_type']=$_POST['stripeTokenType'];
        $data['payment_email']=$_POST['stripeEmail'];
        $data['amount']=$_POST['total_price'];
        $total_amount=$data['amount'];

      }
      else
      {
         redirect('Worlds_coffee/contact_information',"refresh");
      }
      // print_r($data);
      // echo "</br>";
     if($data)
     {
        $payment_info=$this->Coffee_model->add_card_detail($data);
        $user_cart=$this->Coffee_model->get_cart();
        $quantity=count($user_cart);
        // echo $quantity;
        // print_r($payment_info);
        // echo "</br>";
        // print_r($user_cart);
        // echo "</br>";
        // print_r($user_info);
        

     }
      $delivery_information=$this->Coffee_model->add_delivery_info($delivery_info);
      
      if($delivery_information)
      {
          $user_info=$this->Coffee_model->fetch_user_information();
          $shipment_detail=$this->add_shipment($user_info); 
          $tax_detail=$this->tax_calculation($user_info,$shipment_detail,$total_amount,$quantity);
          if($shipment_detail)
          {

            $this->confirm_order($shipment_detail,$data,$tax_detail,$data['cart_ids']);
            // print_r($shipment_detail);
          // echo "</br>";
          // $shipping_amount=$shipment_detail['shipping_amount'];
          // // echo $shipping_amount."</br>";
          // $price_cal=$this->price_cal($total_amount,$shipping_amount);
          // // echo "</br>";
          // print_r($price_cal);

          }
          
      }
    }
//==================================================================================//
    public function stripe_payment()
    {
      $this->load->view('stripe-payment');
    }
//==================================================================================//
        //pay_stripe?user_id=12&amount=500&card_number=4242424242424242&month=10&year=2023&cvv=123
    public function pay_stripe()   // generate charge token using create charge token
    {
          $roaster_amount=$_POST['roaster_price'];
          $roaster_amount=$roaster_amount*100;
          $payment_id=$_POST['payment_id'];
          $cart_ids=$_POST['cart_ids'];
          $token=$_POST['transaction_id'];
          $service_tax=$_POST['service_tax'];
          $shipping_charges=$_POST['shipping_charges'];
          $user_id = $this->session->userdata('session_id');
         $post_amount = $_POST['amount'];
         $amount=$post_amount*100;
         $data['amount']=$post_amount;
             if($amount<50)
             {
                return false;
             }
         $log1 = $this->db->where(array('session_id' => $user_id))->get('session_user');
          $user1 = $log1->result_array();

    $actual_sum=$_POST['actual_sum'];

    $roasters_pricing=$this->get_roasters_pricing($cart_ids,$shipping_charges,$service_tax);
    $this->session->set_userdata('roasters_pricing',$roasters_pricing);
    //print_r($roasters_pricing);

try {
    require_once 'stripe/init.php';

        //$view=array('id'=>$token);
          \Stripe\Stripe::setApiKey('sk_test_rpN7KgbAB1jLHHftZgYhAZDp');

        $return1= \Stripe\Charge::create(array("amount" => $amount, "currency" => "usd","description" => "Example", "source" => $token));

            $id = $return1->id;
            $trans=$return1->balance_transaction;

            foreach ($roasters_pricing as $row) 
            {
              $charges=$charges+$row['charges'];
              $roaster_price=$row['roaster_price']*100;
              // Create a Transfer to a connected account (later):
              $transfer = \Stripe\Transfer::create(array(
                "amount" => $roaster_price,
                "currency" => "usd",
                "destination" => $row['stripe_account_id'],
              ));
            }
        

            $view=array('charge_id'=>$id,'balance_transaction'=>$trans);
            $data['charge_id']=$id;
            //$data['transaction_id']=$trans;
            $this->session->unset_userdata('payment_session');
            if($view)
            {
              if($data)
              {
                
              $send_email=$this->send_mail($cart_ids,$post_amount);
              $update_status==$this->Coffee_model->update_status($user_id);
              $payment_info['info']=$this->Coffee_model->update_payment_info($payment_id,$data);
              $this->successful_payment($payment_info,$cart_ids,$actual_sum,$shipping_charges,$service_tax,$charges);
              $data=NULL;
              }
              
            }
            else
            {
              $msg="unsucessful";
              echo  $msg;
            }
  // Use Stripe's library to make requests...
} catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
  $body = $e->getJsonBody();
  $err  = $body['error'];
  if($err['type']=="card_error")
  {
    $alert=$err['message'];
    echo "<script type='text/javascript'>alert('$alert');</script>";
    header('Location:'.base_url().'index.php/Worlds_coffee/unsuccessful_payment');
  }
  //redirect('Worlds_coffee/unsuccessful_payment');
  // print('Status is:' . $e->getHttpStatus() . "\n");
  // print('Type is:' . $err['type'] . "\n");
  // print('Code is:' . $err['code'] . "\n");
  // // param is '' in this case
  // print('Param is:' . $err['param'] . "\n");
  // print('Message is:' . $err['message'] . "\n");
} 
       
          
        

}
//==================================================================================//
    public function successful_payment($payment_info,$cart_ids,$actual_sum,$shipping_charges,$service_tax)
    {
      // if($payment_info)
      // {

        // print_r($payment_info);
        // echo "<br>".$cart_ids;
      $payment_info['price_cal']=$this->price_cal($actual_sum,$shipping_charges,$service_tax,$charges);
         $payment_info['product_detail']=$this->Coffee_model->product_detail($cart_ids);
        $this->load->view('successful_payment',$payment_info);
      // }
      // else
      // {
      //   $cart_ids="100,101";
      //   echo $cart_ids;
      //   $payment_info['product_detail']=$this->Coffee_model->product_detail($cart_ids);
      //   $this->load->view('successful_payment',$payment_info);
      // }
      
    }
//==================================================================================//
    public function unsuccessful_payment()
    {
      $this->load->view('unsuccessful_payment');
    }
//==================================================================================//
    public function send_mail($cart_ids,$amount)
    {
      $this->Coffee_model->thankyou_mail($cart_ids,$amount);
      $this->Coffee_model->admin_mail($cart_ids,$amount);
       $this->Coffee_model->roaster_mail($cart_ids,$amount);
    }
//==================================================================================//
    public function latest_news_preview()
    {
      $news_id=$_GET['id'];
      $query=$this->db->where('news_id',$news_id)->get('news_detail');
      $data['news_detail']=$query->result_array();
      $this->load->view('latest_news_preview',$data);
    }
//==================================================================================//
//     public function roaster_map()
//     {
//         $roaster_id=$this->input->post('roaster_id');
//         //echo $roaster_id;
//         $roaster_detail=$this->Coffee_model->get_roaster_detail($roaster_id);
//         foreach ($roaster_detail as $row) 
//         {
//             $latitude=$row['latitude'];
//             $longitude=$row['longitude'];
//         }
//         $map_url="https://maps.google.com/maps?q=".$latitude.",".$longitude."&hl=es;z=14&amp;output=embed";
//         if($roaster_detail)
//         {
//           

//         }


//     }
//==================================================================================//
      public function roaster_map()
      {
        $roaster_id=$this->input->post('roaster_id');
        $roaster_detail=$this->Coffee_model->get_roaster_detail($roaster_id);
        foreach ($roaster_detail as $row) 
        {
            $latitude=$row['latitude'];
            $longitude=$row['longitude'];
        }
       //  $data=array('latitude'=>$latitude,'longitude'=>$longitude);
       // print_r($data);
        echo $latitude.",".$longitude;
      

      }
//==================================================================================//
      public function confirm_order($shipment_detail,$data,$tax_detail,$cart_ids)
      {
      $user_cart=$this->Coffee_model->get_cart();
      if($user_cart==Null)
      {
        redirect('Worlds_coffee/cart',"refresh");
      }
        $shipping_amount=$shipment_detail['shipping_amount'];
        $total_amount=$data['amount'];
        $tax_amount=$tax_detail['amount_to_collect'];
        $this->session->set_userdata('shipment',$shipment_detail);
        //print_r($shipment_detail);
          // // echo $shipping_amount."</br>";
          // $price_cal=$this->price_cal($total_amount,$shipping_amount);
          // // echo "</br>";
          // print_r($price_cal);

        // $data['cart_ids']=$_POST['cart_ids'];
        // $data['card_type']=$_POST['card_type'];
        // $data['card_holder_name']=$_POST['card_holder_name'];
        // $data['amount']=$_POST['amount'];
        // $data['card_number']=$_POST['Card_Number'];
        // $data['expire_month']=$_POST['month'];
        // $data['expire_year']=$_POST['year'];
        // $data['cvv']=$_POST['cvv'];

          
          //$shipping_amount="7.98";
        //   $total_amount=$data1['card_detail'][0]['amount'];
        //   $cart_ids=$data1['card_detail'][0]['cart_ids'];
          // echo $cart_ids;
          $roasters_pricing=$this->get_roasters_pricing($cart_ids,$shipping_amount,$tax_amount);
          foreach ($roasters_pricing as $row) 
          {
            $charges=$charges+$row['charges'];
          }
          //echo $charges;
          $data1['card_detail']=$this->Coffee_model->fetch_card_detail();
          $data1['cart_detail']=$this->Coffee_model->get_cart();
          $data1['price_cal']=$this->price_cal($total_amount,$shipping_amount,$tax_amount);
          //print_r($data1['price_cal']);
          $this->load->view('confirm_order',$data1);
      }
//==================================================================================//
      public function testing()
      {
          $payment_id=$_POST['payment_id'];
          $cart_ids=$_POST['cart_ids'];
          $cart_type=$_POST['cart_type'];
          $card_holder_name=$_POST['card_holder_name'];
          $card_number=$_POST['Card_Number'];
          $month=$_POST['month'];
          $year=$_POST['year'];
          $cvv=$_POST['cvv'];
         $amount=$_POST['amount'];


        $data['payment_id']=$payment_id;
        $data['cart_ids']=$cart_ids;
        $data['cart_type']=$cart_type;
        $data['card_holder_name']= $card_holder_name;
        $data['amount']=$amount; 
        $data['card_number']=$card_number;
        $data['expire_month']=$month;
        $data['expire_year']=$year;
        $data['cvv']=$cvv;

        echo "<pre>";
        print_r($data);
        echo "</pre>";
      }
//==================================================================================//
      public function test2()
      {
        $amount=110;
        $admin = $this->calcFee($amount, 'USD','admin');
        $roaster=$this->calcFee($amount, 'USD','roaster');
        /*print_r($charge_data);
        echo "shipping charges: ".$admin['shipping_charges']."</br>";
        echo "admin transaction fee: ".$admin['transaction_fee']."</br>";
        echo "roaster transaction fee: ".$roaster['transaction_fee']."</br>";
        echo "Total transaction fee: ".$total_transaction_fee."</br>";

        echo "Service tax: ".$roaster['service_tax']."</br>";
        echo "Total Price: ".$total_price."</br>";*/
        $total_transaction_fee=$roaster['transaction_fee']+$admin['transaction_fee'];

        $total_price=$admin['total']+$roaster['total'];


        

        $data['shipping_charges']=number_format($admin['shipping_charges'],2);
        $data['total_with_shipping']=number_format($admin['shipping_charges']+$amount,2);
        $data['service_fee']=number_format($total_transaction_fee,2);
        $data['service_tax']=number_format($roaster['service_tax'],2);
        $data['total_price']=number_format($total_price,2);
        $data['total_roaster']=$roaster['total'];

        print_r($data);

        
        /*$number=(0.5 * 27)/100;

        echo number_format((float)$number, 2, '.', '');*/
      }
//==================================================================================//
    public function price_cal($amount,$shipping_amount,$tax_amount)
    {

        $admin = $this->calcFee($amount, 'USD','admin',$shipping_amount,$tax_amount);
        
        $roaster=$this->calcFee($amount, 'USD','roaster',$shipping_amount,$tax_amount);
        //echo $roaster['transaction_fee']."+".$admin['transaction_fee']."<br>";
        $total_transaction_fee=$roaster['transaction_fee']+$admin['transaction_fee'];
        //echo $total_transaction_fee."<br>";


        //echo $admin['total']."+".$roaster['total']."<br>";
        $total_price=$admin['total']+$roaster['total'];
        //echo $total_price."<br>";
        $data['shipping_charges']=number_format($admin['shipping_charges'],2);
        $data['total_with_shipping']=number_format($admin['shipping_charges']+$amount,2);
        $data['service_fee']=number_format($total_transaction_fee,2);
        $data['service_tax']=number_format($roaster['service_tax'],2);
        $data['total_price']=number_format($total_price,2);
        $data['roaster_total']=number_format($roaster['total'],2);
        // print_r($data);
        return $data;
    }
//==================================================================================//
    public function calcFee($amnt,$currency,$user_type,$shipping_amount,$tax_amount) 
    {
      $shipping_charges=$shipping_amount;
      $service_tax=$tax_amount;
        $fees = array('USD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30),
                    'GBP'=>array('Percent'=> 2.4, 'Fixed'=> 0.20),
                    'EUR'=>array('Percent'=> 2.4, 'Fixed'=> 0.24) ,
                    'CAD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30) ,
                    'AUD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30) ,
                    'NOK'=>array('Percent'=> 2.9, 'Fixed'=> 2) ,
                    'DKK'=>array('Percent'=> 2.9, 'Fixed'=> 1.8) ,
                    'SEK'=>array('Percent'=> 2.9, 'Fixed'=> 1.8),
                    'JPY'=>array('Percent'=> 3.6, 'Fixed'=> 0) ,
                    'MXN'=>array('Percent'=> 3.6, 'Fixed'=> 3) 
                    ); 
        if($user_type=="admin")
        {
          $admin_charges=$amnt*0.05;     /*profit 5%*/
          $amount=$shipping_charges+$admin_charges+$service_tax;

          $fee = $fees[$currency];
           // print_r($fee);
          $amount = number_format($amount,2);
          $total = ($amount + $fee['Fixed']) / (1 - $fee['Percent'] / 100);
          $stripe_fee = $total - $amount;
          $transaction_fee=$admin_charges+$stripe_fee;

          $val=array('amount'=>$amount,'admin_charges'=>number_format($admin_charges,2),'stripe_fee'=>number_format($stripe_fee,2),'transaction_fee'=>number_format($transaction_fee,2),'shipping_charges'=>$shipping_charges,'service_tax'=>$service_tax,'total'=>number_format($total,2));
        }
        else if($user_type=="roaster")
        {
          /*if($charges)
          {
            $charges="0.".$charges;
          }*/
          
          $roaster_charges=($amnt*0.5)/100;     /*profit 0.5%*/
          $amount=$amnt+$roaster_charges;

          $fee = $fees[$currency];
           // print_r($fee);
          $amount = number_format($amount,2);
          $total = ($amount + $fee['Fixed']) / (1 - $fee['Percent'] / 100);
          $stripe_fee = $total - $amount;
          $transaction_fee=$roaster_charges+$stripe_fee;

          $val=array('amount'=>$amount,'roaster_charges'=>number_format($roaster_charges,2),'stripe_fee'=>number_format($stripe_fee,2),'transaction_fee'=>number_format($transaction_fee,2),'shipping_charges'=>$shipping_charges,'service_tax'=>$service_tax,'total'=>number_format($total,2));      
        }
       
      
      return $val;
    
}
//==========================================Shippo ==========================================//
    public function add_shipment($user_info)
    {
      foreach ($user_info as $row) 
      {
          $name=$row['name'];
          $phone=$row['phone'];
          $county=$row['country'];
          $city=$row['city'];
          $address=$row['address'];
          $post_code=$row['post_code'];
          $email=$row['email'];

      }
      require_once 'shippo/Shippo.php';


      Shippo::setApiKey('shippo_test_3f75fc639b3ac44bda82113133ed3f509add8dcd');
        //from address
          $from_address = array(
              'name' => 'Mr Hippo',
              'company' => 'Shippo',
              'street1' => '3210 esperanza crossing',
              'city' => 'austin',
              'state' => 'CA',
              'zip' => '78758',
              'country' => 'US',
              'phone' => '+1 555 341 9393',
              'email' => 'mr-hippo@goshipppo.com',
          );
          //to address
          $to_address = array(
              'name' => $name,
              'company' => 'client',
              'street1' => $address,
              'city' => $city,
              'state' => 'CA',
              'zip' => $post_code,
              'country' => 'US',
              'phone' => $phone,
              'email' => $email,
          );
          //parcel detail
          $parcel = array(
              'length'=> '5',
              'width'=> '5',
              'height'=> '5',
              'distance_unit'=> 'in',
              'weight'=> '1',
              'mass_unit'=> 'lb',
          );
          //create shipment
          $shipment = Shippo_Shipment::create(
          array(
              'address_from'=> $from_address,
              'address_to'=> $to_address,
              'parcels'=> array($parcel),
              'async'=> false,
          ));
          //$rates=$shipment['rates'];
          $rate = $shipment['rates'][1];
          $amount=$rate['amount'];
          $estimated_days=$rate['estimated_days'];
          $duration_terms=$rate['duration_terms'];
          $currency=$rate['currency'];

          //create transaction 
          $transaction = Shippo_Transaction::create(array(
              'rate'=> $rate['object_id'],
              'async'=> false,
          ));

          if ($transaction['status'] == 'SUCCESS'){
            // echo "Available rates:" . "\n";
            //   foreach ($rates as $rate) {
            //       echo "--> " . $rate['provider'] . " - " . $rate['servicelevel']['name'] . "\n";
            //       echo "  --> " . "Amount: "             . $rate['amount'] . "\n";
            //       echo "  --> " . "Days to delivery: "   . $rate['days'] . "\n";
            //   }
            //   echo "\n";
              // echo "--> " . "Shipping label url: " . $transaction['label_url'] . "</br>";
              // echo "--> " . "Shipping tracking number: " . $transaction['tracking_number'] . "</br>";
              // echo "amount   :".$amount."</br>";
              // echo "estimated_days   :".$estimated_days."</br>";
              // echo "duration_terms   :".$duration_terms."</br>";
              // echo "currency   :".$currency."</br>";

          $shippo_detail=array('transaction_url'=>$transaction['label_url'],'tracking_number'=>$transaction['tracking_number'],'shipping_amount'=>$amount,'estimated_days'=>$estimated_days,'duration_terms'=>$duration_terms,'currency'=>$currency);
          // print_r($shippo_detail);
          return  $shippo_detail;

          }
          else 
          {
              // echo "Transaction failed with messages:" . "\n";
              // foreach ($transaction['messages'] as $message) {
              //     echo "--> " . $message . "\n";
              // }
            $this->session->set_flashdata('error_msg',"Please correct your address. We are only delivering in US.");
              redirect("Worlds_coffee/contact_information","refresh");
          }
    }
//===========================================================================================//
    public function pay_stripe_test()
    {
      if($_POST['stripeToken'])
      {
        echo $_POST['stripeToken'];
      }
      $this->load->view('pay_stripe');
    }
//===========================================================================================//
    public function tax_calculation($user_info,$shipment_detail,$total_amount,$quantity)
    {
      foreach ($user_info as $row) 
      {
          $name=$row['name'];
          $phone=$row['phone'];
          $county=$row['country'];
          $city=$row['city'];
          $address=$row['address'];
          $post_code=$row['post_code'];
          $email=$row['email'];

      }

      $shipment_amount=$shipment_detail['amount'];

      require_once 'vendor/autoload.php';
      $client = TaxJar\Client::withApiKey("1737febfed2b299970cd4f2ab2145f9f");

    try
    {
      $order_taxes = $client->taxForOrder([
        'from_country' => 'US',
        'from_zip' => '92093',
        'from_state' => 'CA',
        'from_city' => 'La Jolla',
        'from_street' => '9500 Gilman Drive',
        'to_country' => 'US',
        'to_zip' => $post_code,
        'to_state' => 'CA',
        'to_city' => $city,
        'to_street' => $address,
        'amount' => $total_amount,
        'shipping' => $shipment_amount,
        'line_items' => [
          [
            'id' => '1',
            'quantity' => $quantity,
            'product_tax_code' => '40030',
            'unit_price' => $total_amount,
            'discount' => 0
          ]
        ]
      ]);
      //  echo "</br>";
      // echo $order_taxes->amount_to_collect;
      // echo "</br>";
      // echo $order_taxes->rate;
      $rate=$order_taxes->rate;
      $amount_to_collect=$order_taxes->amount_to_collect;
      $view=array('rate'=>$rate,'amount_to_collect'=>$amount_to_collect);
      return $view;
      }
      catch (TaxJar\Exception $e) 
      {
      // 406 Not Acceptable – transaction_id is missing
      //echo $e->getMessage();

      // 406
      //echo $e->getStatusCode();
      $this->session->set_flashdata('error_msg',$e->getMessage());
      redirect("Worlds_coffee/contact_information","refresh");
}
     

    }
//=========================================================================//
    public function get_roasters_pricing($cart_ids,$shipping_charges,$service_tax)
    {
      $cart_ids=$cart_ids;
      $shipping_amount=$shipping_charges;
      $service_tax=$service_tax;
      $get_roasters_detail=$this->Coffee_model->get_roasters_detail($cart_ids);
      //print_r($get_roasters_detail);
      foreach ($get_roasters_detail as $row) 
      {
          $stripe_account_id=$row['stripe_account_id'];
          $amount=$row['roaster_price'];
          $charges=$row['charges'];
          $roaster_id=$row['roaster_id'];
          $roaster=$this->calcFee($amount, 'USD','roaster',$shipping_amount,$service_tax,$charges);
          $roaster_price=$roaster['total'];
         $response[]=array('roaster_id'=>$roaster_id,'stripe_account_id'=>$stripe_account_id,'roaster_price'=>$roaster_price,'charges'=>$charges);
      }
      //print_r($response);
      return $response;
    }
//=====================================================================//
    public function check_shipment()
    {
       $shipment_detail=$this->session->userdata('shipment');
       print_r($shipment_detail);
    } 
//=======================================================================//
    public function email_test()
    {
      $cart_ids="210,211";
      $amount="280";
      $this->Coffee_model->roaster_mail($cart_ids,$amount);
    }
}