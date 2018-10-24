<?php
//doelse webservice model ......
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Coffee_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->database();
    }
//===================================================================================//
   public function fetch_all_products()
   {
   		$this->db->select('*');
   		$this->db->from('coffee_detail');
   		$query=$this->db->get();
   		$response=$query->result_array();
   		if($response)
   		{
   			return $response;
   		}
   		else
   		{
   			return false;
   		}
   }

//===================================================================================//
   public function filter_roaster_location($location)
   {
    if($location)
    {
        $this->db->select('*');
        $this->db->from('roaster_detail');
        $this->db->where_in('roaster_location',$location);
        $query=$this->db->get();
        $response=$query->result_array();
        return $response; 
    }
    else
    {
            $this->db->select('*');
            $this->db->from('roaster_detail');
            $query=$this->db->get();
            $response=$query->result_array();
            return $response;
      
    }
  }
//===================================================================================//
      public function fetch_all_roasters()
   {
      $this->db->select('*');
      $this->db->from('roaster_detail');
      $query=$this->db->get();
      $response=$query->result_array();
      if($response)
      {
        return $response;
      }
      else
      {
        return false;
      }
   }
   
//===================================================================================//
   public function search_roast_type($roast_type)
   {
    if($roast_type)
    {
        $this->db->select('*');
        $this->db->from('coffee_detail');
        $this->db->where_in('roast_type',$roast_type);
        $query=$this->db->get();
        $response=$query->result_array();
        return $response; 
    }
    else
    {
            $this->db->select('*');
            $this->db->from('coffee_detail');
            $query=$this->db->get();
            $response=$query->result_array();
            return $response;
      
    }
  }
//===================================================================================//
   public function filter_location($location)
   {
    if($location)
    {
        $this->db->select('*');
        $this->db->from('coffee_detail');
        $this->db->where_in('location',$location);
        $query=$this->db->get();
        $response=$query->result_array();
        return $response; 
    }
    else
    {
            $this->db->select('*');
            $this->db->from('coffee_detail');
            $query=$this->db->get();
            $response=$query->result_array();
            return $response;
      
    }
  }
//===================================================================================//  
    public function get_coffee_detail($coffee_id)
    {
            $this->db->select('*');
            $this->db->from('coffee_detail');
            $this->db->where('coffee_id',$coffee_id);
            $query=$this->db->get();
            $response=$query->result_array();
            return $response;
    }
//===================================================================================// 
  public function get_roaster_detail($roaster_id)
  {
      $this->db->select('*');
      $this->db->from('roaster_detail');
      $this->db->where('roaster_id',$roaster_id);
      $query=$this->db->get();
      $response=$query->result_array();
      return $response;
  }
//===================================================================================//  
    public function filter_price($min_price,$max_price)
    {
            $this->db->select('*');
            $this->db->from('coffee_detail');
            //$this->db->where('coffee_price <=',$price);
            $this->db->where('coffee_price >=', $min_price);
            $this->db->where('coffee_price <=', $max_price);
            $query=$this->db->get();
            $response=$query->result_array();
            return $response;
    }   
//===================================================================================//  
    public function browse_coffee()
    {
       $this->db->select("*");
       $this->db->from('coffee_detail');
       $this->db->order_by('coffee_rating','desc');
       $this->db->limit(3);
       $query=$this->db->get();
       $response=$query->result_array();
       return $response;
    }
//===================================================================================//  
    public function latest_products()
    {
      $this->db->select("*");
       $this->db->from('coffee_detail');
       $this->db->order_by('coffee_id','desc');
       $this->db->limit(5);
       $query=$this->db->get();
       $response=$query->result_array();
       return $response;
    }
//===================================================================================//
    public function best_sellers()
    {
      // //$this->db->select('count(product_id)');
      // $this->db->select('distinct(product_id)');
      // $this->db->from('user_cart');
      // $count=$this->db->get();
      // $count_detail=$count->result_array();
      // print_r($count_detail);

       $this->db->select("*");
       $this->db->from('coffee_detail');
       $this->db->order_by('coffee_rating','desc');
       $this->db->limit(4);
       $query=$this->db->get();
       $response=$query->result_array();
       return $response;
    }
//===================================================================================//
    public function special_coffee()
    {
       $this->db->select("*");
       $this->db->from('coffee_detail');
       $this->db->where('coffee_price >',"50.00");
       //$this->db->order_by('coffee_rating','desc');
       $this->db->limit(2);
       $query=$this->db->get();
       $response=$query->result_array();
       return $response;
    }
//===================================================================================//
    public function send_subscribe_email($email)
    {
      $this->db->select('*');
      $this->db->from('subscriber_user');
      $this->db->where('subscriber_email',$email);
      $query=$this->db->get();
      $subscriber=$query->result_array();
      if($subscriber)
      {
          return false;
      }
      else
      {
          $data['subscriber_email']=$email;
          $data['date']=date('d-m-Y');
          $this->load->library('parser');
            //$date=date('m-d-Y');
            $message="<html>
                   <head>
                        </head>
                              <body>
                                <div style='margin-left: 200px; margin-right: 200px; margin-top: 30px;'>
                                    <div>
                                    <img src='http://52.2.212.171/Worlds_coffee/assets/images/coffee.png' alt='Logo' title='Logo'style='display:block;height: 246px;margin-left: 110px;' />
                                    <h4><b>Worlds Coffee</b></h4><br>
                                   <div style='text-align:left'>Hi, ".$email.",<br>
                                   <br>
                                    Welcome and congratulations on Subscribe our Worlds coffee. The Worlds coffee will help you to find out best coffee roasters.<br>
                                    <br>
                                                                                
                                     We will also send you latest updates about coffee. <br>
                                  <br>
                                                                                
                                  <br>
                                  <br>
                                  <br> 
                                </div>
                                
                                    Thanks,<br>
                                    <strong style='color: #034973;'>-Worlds Coffee</strong></div></div>
                                 </body>
                                 </html>";          
                        

                                    $this->load->library('email');

                                    $config['protocol'] = 'smtp';

                                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';

                                    $config['smtp_port']    = '465';

                                    $config['smtp_timeout'] = '7';

                                    $config['smtp_user']    = 'atpl.ajay1@gmail.com';

                                    $config['smtp_pass']    = '@ajay1818';

                                    $config['charset']    = 'utf-8';

                                    $config['newline']    = "\r\n";

                                    $config['mailtype'] = 'html'; // or html

                                    $config['validation'] = TRUE; // bool whether to validate email or not      

                                    $this->email->initialize($config);

                        $this->email->from('you@example.com', 'Worlds Coffee');
                        $this->email->to($email);
                        $this->email->subject('Thanks for Subscription');
                        $this->email->message($message);
                        $this->email->set_mailtype("html");
                        if($this->email->send())
                        {
                          if($this->db->insert('subscriber_user',$data))
                          {
                            return true;
                          }
                        }
                        else
                        {
                            return false;
                        }
      }


     
    }
//===================================================================================//
    public function send_contact_email($data)
    {
      $email="atpl.ajay1@gmail.com";

        $this->load->library('parser');
        //$date=date('m-d-Y');
        $message="<html>
             <head>
                  </head>
                        <body>
                          <div style='margin-left: 200px; margin-right: 200px; margin-top: 30px;'>
                              <div>
                              <h4><b>Contact Us Mail</b></h4><br>
                             <p>Hi, Worlds Coffee,<br>
                              You got a E-mail
                              </p>

                              <table>
                               <tr>
                                  <td>Name</td>
                                  <td>".$data['name']."</td>
                                </tr>
                                <tr>
                                  <td>Email-Id</td>
                                  <td>".$data['email']."</td>
                                </tr>
                                <tr>
                                  <td>Mobile No.</td>
                                  <td>".$data['number']."</td>
                                </tr>
                                <tr>
                                  <td>Message</td>
                                  <td>".$data['message']."</td>
                                </tr>
                              </table>
                              <br><br>
                          
                              Thanks,<br>
                              <strong style='color: #034973;'>-Worlds Coffee</strong></div></div>
                           </body>
                           </html>";          
                    

                                $this->load->library('email');

                                $config['protocol'] = 'smtp';

                                $config['smtp_host'] = 'ssl://smtp.googlemail.com';

                                $config['smtp_port']    = '465';

                                $config['smtp_timeout'] = '7';

                                $config['smtp_user']    = 'atpl.ajay1@gmail.com';

                                $config['smtp_pass']    = '@ajay1818';

                                $config['charset']    = 'utf-8';

                                $config['newline']    = "\r\n";

                                $config['mailtype'] = 'html'; // or html

                                //$config['validation'] = TRUE; // bool whether to validate email or not      

                                $this->email->initialize($config);

                    $this->email->from('you@example.com', 'Worlds Coffee');
                    $this->email->to($email);
                    $this->email->subject('Contact Us');
                    $this->email->message($message);
                    $this->email->set_mailtype("html");
                    if($this->email->send())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
    }
//===================================================================================//
      public function fetch_latest_news()
      {
          $this->db->select('*');
          $this->db->from('news_detail');
          $this->db->limit(3);
          $this->db->order_by('news_id','desc');
          $query=$this->db->get();
          $response=$query->result_array();
          if($response)
          {
            return $response;
          }
          else
          {
            return false;
          }
      }
//===================================================================================//
    public function search_coffee_name($search_text)
    {
      if($search_text)
      {
        $query=$this->db->query("SELECT * FROM `coffee_detail` WHERE `coffee_name` LIKE '".$search_text."%'");
        $response=$query->result_array();
        if($response)
        {
          return $response;
        }
        else
        {
          return false;
        }        
      }
      else
      {
        return false;
      }

    }

//===================================================================================//
    public function add_to_cart($data)
    {
      $user_id=$this->session->userdata('session_id');
      $this->db->select('*');
      $this->db->from('user_cart');
      $this->db->where('product_id',$data['product_id']);
      $this->db->where('user_id',$user_id);
      $this->db->where('payment_status',"0");
      $this->db->limit(1);
      $fetch=$this->db->get();
      $fetch_product=$fetch->result_array();
      if($fetch_product)
      {
        $count_val=$fetch_product[0]['count_val'];
        $count_val=$count_val+$data['count_val'];

        $this->db->set('count_val',$count_val);
         $this->db->where('product_id',$data['product_id']);
        if($this->db->update('user_cart'))
        {
          return true;
        }
      }
      else
      {
          if($this->db->insert('user_cart',$data))
          {
            return true;
          }
      }


        
    }
//===================================================================================//
    public function get_cart()
    {
      $user_id=$this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from('user_cart');
        $this->db->where('user_id',$user_id);
        $this->db->where('payment_status',"0");
        $fetch_cart=$this->db->get();
        $cart_detail=$fetch_cart->result_array();
        if($cart_detail)
        {
          foreach ($cart_detail as $cart_item) 
          {
              $cart_id=$cart_item['cart_id'];
              $c_user_id=$cart_item['user_id'];
              $cart_product=$cart_item['product_id'];
              $cart_item_count=$cart_item['count_val'];

              $this->db->select('*');
              $this->db->from('coffee_detail');
              $this->db->where('coffee_id',$cart_product);
              $fetch_product=$this->db->get();
              $product_detail=$fetch_product->result_array();
              if($product_detail)
              {
                foreach ($product_detail as $product) 
                {
                    $coffee_id=$product['coffee_id'];
                    $company_name=$product['company_name'];
                    $coffee_name=$product['coffee_name'];
                    $coffee_image=$product['coffee_image'];
                    $roast_type=$product['roast_type'];
                    $coffee_type=$product['coffee_type'];
                    $roaster=$product['roaster'];
                    $coffee_price=$product['coffee_price'];
                    $coffee_rating=$product['coffee_rating'];
                    $weight=$product['weight'];
                }
              }

            $view[]=array('cart_id'=>$cart_id,'user_id'=>$c_user_id,'cart_item_count'=>$cart_item_count,'coffee_id'=>$coffee_id,'company_name'=>$company_name,'weight'=>$weight,'coffee_name'=>$coffee_name,'coffee_image'=>$coffee_image,'roast_type'=>$roast_type,'coffee_type'=>$coffee_type,'roaster'=>$roaster,'coffee_price'=>$coffee_price,'coffee_rating'=>$coffee_rating);
          }
          return $view;
        }
        else
        {
          return false;
        }

    }
//===================================================================================//
    public function delete_cart_item($cart_id)
    {
        $this->db->where('cart_id', $cart_id);
        if($this->db->delete('user_cart'))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
//===================================================================================//
    public function get_cart_count()
    {
      $user_id=$this->session->userdata('session_id');
      //echo "session".$user_id;
      $this->db->select('count(cart_id) as cart_count');
      $this->db->from('user_cart');
      $this->db->where('user_id',$user_id);
      $this->db->where('payment_status',"0");
      $count=$this->db->get();
      $total_count=$count->result_array();
      //print_r($total_count);
      if($total_count)
      {
          return $total_count;
      }
      else
      {
         return false;
      }
    }
//===================================================================================//
    public function update_cart($cart_id,$count)
    {
      $this->db->set('count_val',$count);
      $this->db->where('cart_id',$cart_id);
      if($this->db->update('user_cart'))
      {
        return true;
      }

    }
//===================================================================================//
    public function add_user_info($user_info)
    {
        $user_id=$this->session->userdata('session_id');
        if($user_id)
        { 
          $user_info['user_id']=$user_id;
          $this->db->select('*');
          $this->db->from('user_info');
          $this->db->where('user_id',$user_id);
          $query=$this->db->get();
          $fetch_user=$query->result_array();
          if($fetch_user)
          {
            $this->db->set($user_info);
            $this->db->where('user_id',$user_id);
            if($this->db->update('user_info')) 
            {
              return true;
            }

          }
          else
          {
            if($this->db->insert('user_info',$user_info))
            {
              return true;
            }
          }
            
        }

    }
//===================================================================================//
    public function add_delivery_info($delivery_info)
    {
      $user_id=$this->session->userdata('session_id');
      $query=$this->db->where('user_id',$user_id)->limit(1)->get('user_info');
      $details=$query->result_array();
        if($details)
        {
          if($user_id)
          {
              $this->db->set($delivery_info);
              $this->db->where('user_id',$user_id);
              
               $update=$this->db->update('user_info');
              if($update) 
              {
                return true;
              }
              else
              {
                return false;
              }
          }
        }
        else
        {
           return false;
        }

    }
//===================================================================================//
      public function get_user_info($user_id)
      {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $query=$this->db->get();
        $response=$query->result_array();
        if($response)
        {
          return $response;
        }
        else
        {
          return false;
        }
      }
//===================================================================================//
      public function add_card_detail($data)
      {
        if($data['cart_ids'])
        {
          
          $data['user_id']=$this->session->userdata('session_id');
          $check=$this->db->where('user_id',$data['user_id'])->where('payment_status','0')->limit(1)->get('payment_info');
          $check_detail=$check->result_array();
          // print_r($check_detail);
          if($check_detail)
          {
              $this->db->set($data);
              $this->db->where('user_id',$data['user_id']);
              $this->db->where('payment_status','0');
              if($this->db->update('payment_info'))
              {
                $payment_id=$check_detail[0]['payment_id'];
                $payment_detail=$this->db->where('payment_id',$payment_id)->get('payment_info');
                // $response=$payment_detail->result_array();
                // echo "</br>";
                // print_r($response);
                return $payment_detail->result_array();
              }
          }
          else
          {
              if($this->db->insert('payment_info',$data))
              {
                $p_id=$this->db->insert_id();
                $payment_info=$this->db->where('payment_id',$p_id)->get('payment_info');
                return $payment_info->result_array();
              } 
          }
          
        }
        else
        {
          $user_id=$this->session->userdata('session_id');
          $query=$this->db->where('user_id',$user_id)->where('payment_status',"0")->limit(1)->order_by('payment_id','desc')->get('payment_info');
          $response=$query->result_array();
          return $response;

        }
      }
//================================================================================//
      public function update_payment_info($payment_id,$data)
      {
        $data['created']=date('d-m-Y H:i:s');
        $data['payment_status']="1";
        $this->db->set($data);
        $this->db->where('payment_id',$payment_id);
        $this->db->where('payment_status','0');
        if($this->db->update('payment_info'))
        {
          
          $payment_detail=$this->db->where('payment_id',$payment_id)->get('payment_info');
          return $payment_detail->result_array();
        }
      }
//================================================================================//
      public function update_status($user_id)
      {

        // $this->db->where('user_id',$user_id);
        // if($this->db->delete('user_cart'))
        // {
        //     return true;
        // }
        // else
        // {
        //   return false;
        // }

          $this->db->set('payment_status',"1");
          $this->db->where('user_id',$user_id);
          if($this->db->update('user_cart'))
          {
              $this->db->set('payment_status',"1");
              $this->db->where('user_id',$user_id);
              if($this->db->update('user_info'))
              {
                  return true;
              }    
          }
          else
          {
              return false;
          }
      }
//===================================================================================//
   public function thankyou_mail($product,$amount)
    {
        //$email="atpl.ajay1@gmail.com";
        //$product="80,81";
        $products=$this->cart_products($product);
        $user_id=$this->session->userdata('session_id');
        $query=$this->db->where('user_id',$user_id)->get('user_info');
        $user_info=$query->result_array();
        $username=$user_info[0]['name'];
        $email=$user_info[0]['email'];
        // print_r($products);
        //echo json_encode($products);
        $output="";
        foreach ($products as $row) 
          {
            $split=explode('-',$row['roaster']);
            $image = str_replace(' ', '%20', $row['coffee_image']);
            $output.="<tr>";
            $output.="<td>".$row['coffee_name']."</td>";
            $output.="<td><img width='80px' height='120px' src='http://52.2.212.171/Worlds_coffee/".$image."'></td>";
            // $output.="<td>".base_url().$row['coffee_image']."</td>";
            $output.="<td>".$row['roast_type']."</td>";
            $output.="<td>".$split[0]."</td>";
            $output.="<td>".$row['products_count']."</td>";
            $output.="<td>$".number_format($row['coffee_price'],2)."</td>";
            $output.="<td>$".number_format($row['total_price'],2)."</td>";
            $output.="</tr>";
          
        }                        
        //$this->load->library('parser');
        //$date=date('m-d-Y');
        $shipment_detail=$this->session->userdata('shipment');
       //print_r($shipment_detail);
        $estimated_days=$shipment_detail['estimated_days']+1;
        $message="<html>
             <head>
                  </head>
                        <body style='font-family:calibri;font-size: 16px;'>
                        <div style='width: 900px;margin: 0 auto;'>
                          <div style='margin-top: 30px;'>
                              <div>
                              <div>
                              <img src='".base_url()."assets/shippo_label.png' height='100px'>
                              </div
                              <h4><b><p>You have Placed a order from Worlds coffee</p></b></h4>
                             <p>Hi, <b>".ucwords($username)."</b> ,<br>
                              Congratulations....!<br>
                              Thankyou for purchasing our Products
                              </p>
                              <br>
                              <b>Order Details:-</b>
                              <div>
                              <p>Track your order : <a href='https://tools.usps.com/go/TrackConfirmAction?tLabels=".$shipment_detail['tracking_number']."'><b>".$shipment_detail['tracking_number']."</b></a></p>
                              <p> Your order will be delivered within <b>".$estimated_days." Days</b></p>
                              <p> <a href='".$shipment_detail['transaction_url']."' target='_blank'>Click here for transaction detail >>></a></p>
                              </div>
                              <hr>
                              <table style='border:1px solid #ddd;' cellpadding='15'>
                                <thead>
                                <th align='left'>Item Name</th>
                                <th>Product Image</th>
                                <th>Roast Type</th>
                                <th>Roaster</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                </thead>
                                <tbody>".$output."
                                <tr>
                                <td colspan='5'>Total Price (include all Charges):</td>
                                <td colspan='2' style='font-size: 20px;font-weight: 600;'>$ ".number_format($amount,2)."</td>
                                </tr>
                                </tbody>
                              </table>
                              <br><br>
                          
                              Thanks,<br>
                              <strong style='color: #034973;'>-Worlds Coffee</strong></div></div>
                              </div>
                           </body>
                           </html>";          
               // echo $message;     

                                $this->load->library('email');

                                $config['protocol'] = 'smtp';

                                $config['smtp_host'] = 'ssl://smtp.googlemail.com';

                                $config['smtp_port']    = '465';

                                $config['smtp_timeout'] = '7';

                                $config['smtp_user']    = 'atpl.ajay1@gmail.com';

                                $config['smtp_pass']    = '@ajay1818';

                                $config['charset']    = 'utf-8';

                                $config['newline']    = "\r\n";

                                $config['mailtype'] = 'html'; // or html

                                //$config['validation'] = TRUE; // bool whether to validate email or not      

                                $this->email->initialize($config);

                    $this->email->from('you@example.com', 'Worlds Coffee');
                    $this->email->to($email);
                    $this->email->subject('Thank-you from Worlds coffee');
                    $this->email->message($message);
                    $this->email->set_mailtype("html");
                    if($this->email->send())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }   
    }  
//================================================================================//
    public function roaster_products($cart_id,$roaster_data_serach)
    {
      $user_id=$this->session->userdata('session_id');
        $split=explode(',',$cart_id);
        $length=sizeof($split);

        $query=$this->db->query("SELECT * FROM user_cart WHERE cart_id IN ($cart_id)");
        $response=$query->result_array();
        if($response)
        {
              foreach ($response as $rows) 
              {
                  $product_id=$rows['product_id'];
                  $products_count=$rows['count_val'];


                    $coffee=$this->db->where('coffee_id',$product_id)->where('roaster',$roaster_data_serach)->get('coffee_detail');
                    $coffee_detail=$coffee->result_array();
                    foreach ($coffee_detail as $row) 
                    {
                        $coffee_id=$row['coffee_id'];
                        $company_name=$row['company_name'];
                        $coffee_name=$row['coffee_name'];
                        $coffee_image=$row['coffee_image'];
                        $roast_type=$row['roast_type'];
                        $coffee_type=$row['coffee_type'];
                        $roaster=$row['roaster'];
                        $coffee_price=$row['coffee_price'];
                        $coffee_rating=$row['coffee_rating'];
                        $weight=$row['weight'];
                         $total_price=$coffee_price*$products_count;
                      $view[]=array('user_id'=>$user_id,'products_count'=>$products_count,'coffee_id'=>$coffee_id,'company_name'=>$company_name,'weight'=>$weight,'coffee_name'=>$coffee_name,'coffee_image'=>$coffee_image,'roast_type'=>$roast_type,'coffee_type'=>$coffee_type,'roaster'=>$roaster,'coffee_price'=>$coffee_price,'coffee_rating'=>$coffee_rating,'total_price'=>$total_price);
                      }
              }
              
                return $view;
        }
        else
        {
          return false;
        }
    }

//================================================================================//
    public function cart_products($cart_id)
    {

        $user_id=$this->session->userdata('session_id');
      $split=explode(',',$cart_id);
      $length=sizeof($split);

      $query=$this->db->query("SELECT * FROM user_cart WHERE cart_id IN ($cart_id)");
      $response=$query->result_array();
      if($response)
      {
            foreach ($response as $rows) 
            {
                $product_id=$rows['product_id'];
                $products_count=$rows['count_val'];


                  $coffee=$this->db->where('coffee_id',$product_id)->get('coffee_detail');
                  $coffee_detail=$coffee->result_array();
                  foreach ($coffee_detail as $row) 
                  {
                      $coffee_id=$row['coffee_id'];
                      $company_name=$row['company_name'];
                      $coffee_name=$row['coffee_name'];
                      $coffee_image=$row['coffee_image'];
                      $roast_type=$row['roast_type'];
                      $coffee_type=$row['coffee_type'];
                      $roaster=$row['roaster'];
                      $coffee_price=$row['coffee_price'];
                      $coffee_rating=$row['coffee_rating'];
                      $weight=$row['weight'];
                       $total_price=$coffee_price*$products_count;
                    }


                $view[]=array('user_id'=>$user_id,'products_count'=>$products_count,'coffee_id'=>$coffee_id,'company_name'=>$company_name,'weight'=>$weight,'coffee_name'=>$coffee_name,'coffee_image'=>$coffee_image,'roast_type'=>$roast_type,'coffee_type'=>$coffee_type,'roaster'=>$roaster,'coffee_price'=>$coffee_price,'coffee_rating'=>$coffee_rating,'total_price'=>$total_price);

            }
              return $view;
      }
      else
      {
        return false;
      }
    }
//===================================================================================//
    public function admin_mail($product,$amount)
    {
        $email="atpl.aslam@gmail.com";
        //$product="80,81";
        $products=$this->cart_products($product);
        $user_id=$this->session->userdata('session_id');
        $query=$this->db->where('user_id',$user_id)->get('user_info');
        $user_info=$query->result_array();
        $username=$user_info[0]['name'];
        $email_id=$user_info[0]['email'];
        $address=$user_info[0]['address'];
        // print_r($products);
        //echo json_encode($products);
        $output="";
        foreach ($products as $row) 
          {
            $split=explode('-',$row['roaster']);
            $image = str_replace(' ', '%20', $row['coffee_image']);
            $output.="<tr>";
            $output.="<td>".$username."</td>";
            $output.="<td>".$email_id."</td>";
            $output.="<td>".$row['coffee_name']."</td>";
            $output.="<td><img width='80px' height='120px' src='http://52.2.212.171/Worlds_coffee/".$image."'></td>";
            // $output.="<td>".base_url().$row['coffee_image']."</td>";
            $output.="<td>".$row['roast_type']."</td>";
            $output.="<td>".$split[0]."</td>";
            $output.="<td>".$row['products_count']."</td>";
            $output.="<td>$".number_format($row['coffee_price'],2)."</td>";
            $output.="<td>$".number_format($row['total_price'],2)."</td>";
            $output.="<td>".$address."</td>";
            $output.="<td> Complete </td>";
            $output.="</tr>";
          
        }                        
        //$this->load->library('parser');
        //$date=date('m-d-Y');
        $shipment_detail=$this->session->userdata('shipment');
        $message="<html>
             <head>
                  </head>
                        <body>
                        <div style='width: 1038px;margin: 0 auto;'>
                          <div style='margin-top: 30px;'>
                              <div>
                              <h4><b><p>Order Place</p></b></h4>
                             <p>Hi, <b>Worlds Coffee</b>,<br>
                              ".ucwords($username)." Place a order from your Web -site.
                              </p>
                              <b>Order Details:-</b>
                              <div>
                              <p>Track order : <a href='https://tools.usps.com/go/TrackConfirmAction?tLabels=".$shipment_detail['tracking_number']."'><b>".$shipment_detail['tracking_number']."</b></a></p>
                              <p> <a href='".$shipment_detail['transaction_url']."' target='_blank'>Click here for transaction detail >>></a></p>
                              </div>
                              <hr>
                              <table align='center' style='border:1px solid #ddd;' cellpadding='15'>
                                <thead>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Item Name</th>
                                <th>Product Image</th>
                                <th>Roast Type</th>
                                <th>Roaster</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Delivery Address</th>
                                <th>Payment status</th>
                                </thead>
                                <tbody>".$output."
                                <tr>
                                <td colspan='9'>Total Price (include all Charges):</td>
                                <td colspan='2' style='font-size: 20px;font-weight: 600;'>$ ".number_format($amount,2)."</td>
                                </tr>
                                </tbody>
                              </table>
                              <br><br>
                          
                              Thanks,<br>
                              <strong style='color: #034973;'>-Worlds Coffee</strong></div></div>
                              </div>
                           </body>
                           </html>";          
               //echo $message;     

                                $this->load->library('email');

                                $config['protocol'] = 'smtp';

                                $config['smtp_host'] = 'ssl://smtp.googlemail.com';

                                $config['smtp_port']    = '465';

                                $config['smtp_timeout'] = '7';

                                $config['smtp_user']    = 'atpl.ajay1@gmail.com';

                                $config['smtp_pass']    = '@ajay1818';

                                $config['charset']    = 'utf-8';

                                $config['newline']    = "\r\n";

                                $config['mailtype'] = 'html'; // or html

                                //$config['validation'] = TRUE; // bool whether to validate email or not      

                                $this->email->initialize($config);

                    $this->email->from('you@example.com', 'Worlds Coffee');
                    $this->email->to($email);
                    $this->email->subject('Order Detail');
                    $this->email->message($message);
                    $this->email->set_mailtype("html");
                    if($this->email->send())
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    } 
    }
//===============================================================================//
    public function roaster_mail($product,$amount)
    {
        $roaster_detail=$this->session->userdata('roasters_pricing');
        //print_r($roaster_detail);
        foreach ($roaster_detail as $roaster) 
        {
          $roaster_id=$roaster['roaster_id'];
          $roaster_price=$roaster['roaster_price'];
          $roaster_query=$this->db->where('roaster_id',$roaster_id)->get('roaster_detail');
          $roaster_data=$roaster_query->result_array();
          $roaster_name=$roaster_data[0]['roaster_name'];
          $roaster_email=$roaster_data[0]['roaster_email'];
          $roaster_data_serach=$roaster_name."-".$roaster_id;
          //echo $roaster_data_serach;
        $user_id=$this->session->userdata('session_id');
        $query=$this->db->where('user_id',$user_id)->get('user_info');
        $user_info=$query->result_array();
        $username=$user_info[0]['name'];
        $email_id=$user_info[0]['email'];
        $address=$user_info[0]['address']; 
        $products=$this->roaster_products($product,$roaster_data_serach);
        //print_r($products);
        // print_r($products);
        //echo json_encode($products);
        $output="";
        foreach ($products as $row) 
          {
            $split=explode('-',$row['roaster']);
            $image = str_replace(' ', '%20', $row['coffee_image']);
            $output.="<tr>";
            $output.="<td>".$username."</td>";
            $output.="<td>".$email_id."</td>";
            $output.="<td>".$row['coffee_name']."</td>";
            $output.="<td><img width='80px' height='120px' src='http://52.2.212.171/Worlds_coffee/".$image."'></td>";
            // $output.="<td>".base_url().$row['coffee_image']."</td>";
            $output.="<td>".$row['roast_type']."</td>";
            $output.="<td>".$split[0]."</td>";
            $output.="<td>".$row['products_count']."</td>";
            $output.="<td>$".number_format($row['coffee_price'],2)."</td>";
            $output.="<td>$".number_format($row['total_price'],2)."</td>";
            $output.="<td>".$address."</td>";
            $output.="<td> Complete </td>";
            $output.="</tr>";
          
        }                        
        //$this->load->library('parser');
        //$date=date('m-d-Y');
        
        $shipment_detail=$this->session->userdata('shipment');
        $message="<html>
             <head>
                  </head>
                        <body>
                        <div style='width: 1038px;margin: 0 auto;'>
                          <div style='margin-top: 30px;'>
                              <div>
                              <h4><b><p>Order Place</p></b></h4>
                             <p>Hi, <b>".ucwords($roaster_name)."</b>,<br>
                              ".ucwords($username)." Buy your coffee from Worlds coffee Web-site.
                              </p>
                              <b>Order Details:-</b>
                              <div>
                              <p>Track order : <a href='https://tools.usps.com/go/TrackConfirmAction?tLabels=".$shipment_detail['tracking_number']."'><b>".$shipment_detail['tracking_number']."</b></a></p>
                              <p> <a href='".$shipment_detail['transaction_url']."' target='_blank'>Click here for transaction detail >>></a></p>
                              </div>
                              <hr>
                              <table align='center' style='border:1px solid #ddd;' cellpadding='15'>
                                <thead>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Item Name</th>
                                <th>Product Image</th>
                                <th>Roast Type</th>
                                <th>Roaster</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Delivery Address</th>
                                <th>Payment status</th>
                                </thead>
                                <tbody>".$output."
                                <tr>
                                <td colspan='9'>Total Price (include all Charges):</td>
                                <td colspan='2' style='font-size: 20px;font-weight: 600;'>$ ".number_format($roaster_price,2)."</td>
                                </tr>
                                </tbody>
                              </table>
                              <br><br>
                          
                              Thanks,<br>
                              <strong style='color: #034973;'>-Worlds Coffee</strong></div></div>
                              </div>
                           </body>
                           </html>";          
               //echo $message;     

                                $this->load->library('email');

                                $config['protocol'] = 'smtp';

                                $config['smtp_host'] = 'ssl://smtp.googlemail.com';

                                $config['smtp_port']    = '465';

                                $config['smtp_timeout'] = '7';

                                $config['smtp_user']    = 'atpl.ajay1@gmail.com';

                                $config['smtp_pass']    = '@ajay1818';

                                $config['charset']    = 'utf-8';

                                $config['newline']    = "\r\n";

                                $config['mailtype'] = 'html'; // or html

                                //$config['validation'] = TRUE; // bool whether to validate email or not      

                                $this->email->initialize($config);

                    $this->email->from('you@example.com', 'Worlds Coffee');
                    $this->email->to($roaster_email);
                    $this->email->subject('Order Detail');
                    $this->email->message($message);
                    $this->email->set_mailtype("html");
                    $send=$this->email->send();
                  }
                    if($send)
                    {
                      //echo $message;
                        return true;
                    }
                    else
                    {
                        return false;
                    } 
        
    }
//===============================================================================//
  public function coffee_detail($limit,$start)
  {
  
      $query=$this->db->query("SELECT * FROM coffee_detail limit $start,$limit");
      return $query->result_array();
  }
//===================================================================================//

  public function get_total_coffee()
  {
    $this->db->select('*');
    $this->db->from("coffee_detail");
    return $this->db->count_all_results();
  }
//================================================================================//
    public function product_detail($product)
    {
      $products=$this->cart_products($product);
      return $products;
    }
//================================================================================//
    public function fetch_roaster_coffee($roaster_name)
    {
        $this->db->select('*');
        $this->db->from('coffee_detail');
        $this->db->where('roaster',$roaster_name);
        $query=$this->db->get();
        $response=$query->result_array();
        return $response;

    }
//================================================================================//
    // public function add_connect($connect_id)
    // {
    //     $this->db->set('stripe_account_id',$connect_id);
    //     $this->db->where('roaster_id','1');  
    //     if($this->db->update('roaster_detail'))
    //     {
    //       echo $connect_id;
    //       return true;
    //     }
    //     else
    //     {
    //       return false;
    //     }  
    // }
//================================================================================//
    public function fetch_roasters($cart_ids)
    {
    $query=$this->db->query("SELECT * FROM user_cart WHERE cart_id IN ($cart_ids)");
        //$query=$this->db->get();
        $response=$query->result_array();
        foreach ($response as $row) 
        {
            $product_id[]=$row['product_id'];
        }
        $product_ids=implode(',',$product_id);
        //echo $product_ids;
        $coffee=$this->db->query("SELECT * FROM coffee_detail WHERE coffee_id IN ($product_ids)");
        $coffee_detail=$coffee->result_array();
        foreach ($coffee_detail as $row) 
        {
          $roasters[]=$row['roaster'];
        }
        
        for ($i=0; $i < count($roasters); $i++) 
        { 
          $roast=$roasters[$i];
          $roast=explode(' ',$roast);
          $roaster=$this->db->query("SELECT * FROM roaster_detail WHERE roaster_name LIKE '%Cafe'");
          $roaster_detail=$roaster->result_array();
          $roasters[]=$roaster_detail;
        }
          print_r($roasters);
        foreach ($roaster_detail as $row) 
        {
          $stripe_account_ids[]=$row['stripe_account_id'];
        }
        if($coffee_detail)
        {
          print_r($stripe_account_ids);
          return $stripe_account_ids;
        }
        else
        {
          return false;
        }
    }
//==============================================================================================//
    public function fetch_user_information()
    {
        $user_id=$this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $query=$this->db->get();
        $response=$query->result_array();
        if($response)
        {
            return $response;
        }
        else
        {
            return false;
        }
    }
//=====================================================================================
    public function fetch_card_detail()
    {
        $user_id=$this->session->userdata('session_id');
        $this->db->select('*');
        $this->db->from('payment_info');
        $this->db->where('user_id',$user_id);
        $this->db->where('payment_status','0');
        $this->db->order_by('payment_id','desc');
        $this->db->limit(1);
        $query=$this->db->get();
        $response=$query->result_array();
        if($response)
        {
            return $response;
        }
        else
        {
            return false;
        }      
    }
//========================================================================//
    public function get_roasters_detail($cart_ids)
    {
      //echo $cart_ids;
      $roasters=array();
      $cart_id=explode(',',$cart_ids);
      $check=$this->db->where("cart_id in ($cart_ids)")->get('user_cart');
      $cart_detail=$check->result_array();
      //print_r($cart_detail);
      foreach ($cart_detail as $row) 
      {
          $coffee_id=$row['product_id'];
          $coffee_count=$row['count_val'];

          $coffee=$this->db->where("coffee_id",$coffee_id)->get('coffee_detail');
          $coffee_details=$coffee->result_array(); 
          $roster_name=$coffee_details[0]['roaster'];
          //echo $roster_name."</br>";
          if(in_array($roster_name,$roasters))
          {
            $search=array_search($roster_name,$roasters);
            $coffee_price[$search]=number_format($coffee_price[$search]+$coffee_details[0]['coffee_price']*$coffee_count,2);   
            $search=NULL;   
          }
          else
          {
            $roasters[]=$roster_name;
            $coffee_price[]=number_format($coffee_details[0]['coffee_price']*$coffee_count,2);
          }
          $roster_name=NULL;

      }

      // print_r($roasters);
      // echo "</br>";
      $i=0;
      foreach ($roasters as $row) 
      {
          $roaster_id=end(explode('-',$row));
          $roaster=$this->db->where("roaster_id",$roaster_id)->get('roaster_detail');
          $roaster_details=$roaster->result_array();
          foreach ($roaster_details as $rows) 
          {
              $roaster_id=$rows['roaster_id'];
              $stripe_account_id=$rows['stripe_account_id'];
              $charges=$rows['charges'];
              $roaster_price=$coffee_price[$i];
              $roasters_pricing[]=array('roaster_id'=>$roaster_id,'stripe_account_id'=>$stripe_account_id,'roaster_price'=>$roaster_price,'charges'=>$charges);
          }
          $i=$i+1;
      }
      //print_r($roasters_pricing);
      return $roasters_pricing;

    }
}