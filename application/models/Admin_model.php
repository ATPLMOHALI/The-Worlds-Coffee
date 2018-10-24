
<?php
//worlds coffee admin model ......

error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Admin_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
        //date_default_timezone_set('Asia/kolkata');
    }
    
//=======================================================================//
    public function user_login($email,$password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
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
        //print_r($response);
        
    }
//=======================================================================//
    public function coffee_details()
    {
      $this->db->select('*');
      $this->db->from('coffee_detail');
      $this->db->order_by('coffee_id','desc');
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
//=======================================================================//
    public function coffee_detail($coffee_id)
    {
        $this->db->select('*');
        $this->db->from('coffee_detail');
        $this->db->where('coffee_id',$coffee_id);
        $this->db->limit(1);
        $query=$this->db->get();
        $response=$query->result_array();
        //print_r($response);
        return $response;
    }
//================================================================================//
    public function get_roaster()
    {
        $this->db->select('*');
        //$this->db->distinct();
        $this->db->from('roaster_detail');
        $query=$this->db->get();
        $response=$query->result_array();
        //print_r($response);
        return $response;
    }
//=========================================================================//
    public function update_coffee_detail($coffee_id,$data)
    {
        $this->db->set($data);
        $this->db->where('coffee_id',$coffee_id);
        $this->db->update('coffee_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        }

    }
//=============================================================================//
    public function save_new_coffee($data)
    {
      $data['date']=date('d-m-Y');
      if($this->db->insert('coffee_detail',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
//================================================================================//
    public function delete_coffee($coffee_id)
    {
        $this->db->where('coffee_id',$coffee_id);
        $this->db->delete('coffee_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        }
    }
//=========================End Coffee Changes================================//

////////////////////////////////////////////Roaster Changes/////////////////////////
//================================================================================//
    public function roaster_details()
    {

      $this->db->select('*');
      $this->db->from('roaster_detail');
      $this->db->order_by('roaster_id','desc');
      //$this->db->limit(1);
      $query=$this->db->get();
      $response=$query->result_array();
      foreach ($response as $row) 
      {
        $roaster_id=$row['roaster_id'];

          $this->db->select('count(coffee_id) as coffee_count');
          $this->db->from('coffee_detail');
          $this->db->where('roaster_id',$roaster_id);
          $coffee=$this->db->get();
          $coffee_detail=$coffee->result_array();
          foreach ($coffee_detail as $rows) 
          {
            $coffee_count=$rows['coffee_count'];
          } 
          
          $response2[]=array_merge($row,$coffee_detail);
      }

      
        //print_r($response2);
      if($response2)
      {
        return $response2;
      }
      else
      {
        return false;
      }
      //print_r($response);
      
    }
//==================================================================//
    public function roaster_detail($roaster_id)
    {
      $this->db->select('*');
      $this->db->from('roaster_detail');
      $this->db->where('roaster_id',$roaster_id);
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
//=========================================================================//
    public function update_roaster_detail($roaster_id,$data)
    {
        $this->db->set($data);
        $this->db->where('roaster_id',$roaster_id);
        $this->db->update('roaster_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        }
    }
//================================================================================//
    public function save_roaster_detail($data)
    {
        $data['date']=date('d-m-Y');
      if($this->db->insert('roaster_detail',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
//================================================================================//
    public function delete_roaster($roaster_id)
    {
        $this->db->where('roaster_id',$roaster_id);
        $this->db->delete('roaster_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        }
    }
//=========================End Roaster Changes================================//
    public function news_details()
    {
        $this->db->select('*');
        $this->db->from('news_detail');
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
//==================================================================//
    public function news_detail($news_id)
    {
      $this->db->select('*');
      $this->db->from('news_detail');
      $this->db->where('news_id',$news_id);
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
//=========================================================================//
    public function update_news_detail($news_id,$data)
    {
        $this->db->set($data);
        $this->db->where('news_id',$news_id);
        $this->db->update('news_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        }      
    }
//=========================================================================//
    public function save_news_detail($data)
    {

        $data['date']=date('d-m-Y');
        if($this->db->insert('news_detail',$data))
        {
          return true;
        }
        else
        {
          return false;
        }      
    }
//=========================================================================//
    public function delete_news($news_id)
    {
        $this->db->where('news_id',$news_id);
        $this->db->delete('news_detail');
        if($this->db->affected_rows()>0)
        {
          return true;
        }
        else
        {
          return false;
        } 
    }
//========================================================================//
    public function product_details()
    {
        $this->db->select('*');
      $this->db->from('payment_info');
      // $this->db->limit(1);
      $this->db->order_by('payment_id','desc');
      $query_info=$this->db->get();
      $payment_info=$query_info->result_array();
      foreach ($payment_info as $payment) 
      {
        $cart_ids=$payment['cart_ids'];
        //echo $cart_ids;
        $payment_id=$payment['payment_id'];
        $user_id=$payment['user_id'];
        
        $date=$payment['created'];
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $user_info=$this->db->get();
        $user_payment_info=$user_info->result_array();
        foreach ($user_payment_info as $user) 
        {
            $username=$user['name'];
            $email=$user['email'];
            $phone=$user['phone'];
            $country=$user['country'];
            $city=$user['city'];
            $address=$user['address'];
            $post_code=$user['post_code'];

        }



        if($cart_ids)
        {
            $query=$this->db->query("SELECT * FROM user_cart WHERE cart_id IN ($cart_ids)");
        $response=$query->result_array();
        if($response)
        {
            foreach ($response as $rows) 
            {
                $product_id=$rows['product_id'];
                $products_count=$rows['count_val'];
                $payment_status=$rows['payment_status'];

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
            }
        }
        
              
      }
      $view[]=array('payment_id'=>$payment_id,'user_id'=>$user_id,'username'=>$username,'email'=>$email,'phone'=>$phone,'country'=>$country,'city'=>$city,'address'=>$address,'post_code'=>$post_code,'payment_status'=>$payment_status,'products_count'=>$products_count,'coffee_id'=>$coffee_id,'company_name'=>$company_name,'weight'=>$weight,'coffee_name'=>$coffee_name,'coffee_image'=>$coffee_image,'roast_type'=>$roast_type,'coffee_type'=>$coffee_type,'roaster'=>$roaster,'coffee_price'=>$coffee_price,'coffee_rating'=>$coffee_rating,'total_price'=>$total_price,'date'=>$date);
    }
    //print_r($view);
    return $view;
  }
//=======================================================================//
    public function get_product_details($payment_id)
    {
          $this->db->select('*');
          $this->db->from('payment_info');
          $this->db->where('payment_id',$payment_id);
          $query_info=$this->db->get();
          $payment_info=$query_info->result_array();
          foreach ($payment_info as $payment) 
          {
            $cart_ids=$payment['cart_ids'];
            //echo $cart_ids;
            $payment_id=$payment['payment_id'];
            $user_id=$payment['user_id'];
            
            $date=$payment['created'];
            $this->db->select('*');
            $this->db->from('user_info');
            $this->db->where('user_id',$user_id);
            $this->db->limit(1);
            $user_info=$this->db->get();
            $user_payment_info=$user_info->result_array();
            foreach ($user_payment_info as $user) 
            {
                $username=$user['name'];
                $email=$user['email'];
                $phone=$user['phone'];
                $country=$user['country'];
                $city=$user['city'];
                $address=$user['address'];
                $post_code=$user['post_code'];
            }



            if($cart_ids)
            {
                $query=$this->db->query("SELECT * FROM user_cart WHERE cart_id IN ($cart_ids)");
            $response=$query->result_array();
            if($response)
            {
                foreach ($response as $rows) 
                {
                    $product_id=$rows['product_id'];
                    $products_count=$rows['count_val'];
                    $payment_status=$rows['payment_status'];

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
                  $coffees[]=array('coffee_id'=>$coffee_id,'company_name'=>$company_name,'weight'=>$weight,'coffee_name'=>$coffee_name,'coffee_image'=>$coffee_image,'roast_type'=>$roast_type,'coffee_type'=>$coffee_type,'payment_status'=>$payment_status,'roaster'=>$roaster,'coffee_price'=>$coffee_price,'products_count'=>$products_count,'coffee_rating'=>$coffee_rating,'total_price'=>$total_price);     
                }
            }
            
                  
          }
          $view[]=array('payment_id'=>$payment_id,'user_id'=>$user_id,'username'=>$username,'email'=>$email,'phone'=>$phone,'country'=>$country,'city'=>$city,'address'=>$address,'post_code'=>$post_code,'date'=>$date,'coffee_details'=>$coffees);
        }
        // print_r($view);
        return $view;
        }
//================================================================================//
    public function get_payment_detail()
    {
        $this->db->select('*');
        $this->db->from('payment_info');
        $this->db->order_by('payment_id','desc');
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
//=================================================================================//
    public function count_coffee()
    {
        $this->db->select('count(coffee_id) as total_coffee');
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
//================================================================================//
    public function count_roaster()
    {
        $this->db->select('count(roaster_id) as total_roaster');
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
//================================================================================//
    public function last_month_payments()
    {
      $first_date=date('d-m-Y', strtotime('-31 days'));
      // echo $first_date."</br>";

      $last_date=date('d-m-Y');
        $query=$this->db->query("SELECT count(payment_id) as total_payments FROM `payment_info` WHERE created >= ' $first_date' AND created < '$last_date'");
        $response=$query->result_array();
        // print_r($response);
        if($response)
        {
          return $response;

        }
        else
        {
          return false;
        }       
    }
//=======================================================================================//
    public function fetch_countries()
    {
      $this->db->select('*');
      $this->db->from('countries');
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
//======================================================================================//
    public function fetch_states($country_id)
    {
      $this->db->select('*');
      $this->db->from('states');
      $this->db->where('country_id',$country_id);
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
//============================================================================================//
    public function client_states($roaster_id)
    {
        $query=$this->db->where('roaster_id',$roaster_id)->limit(1)->get('roaster_detail');  
        $response=$query->result_array();
        //print_r($response);
        foreach ($response as $row) 
        {
          $country=$row['country'];
          $country=end(explode(' ',$country));
        } 
        $sortname=$country;
        //echo $sortname;
        if($response)
        {

          $country=$this->db->where('sortname',$sortname)->limit(1)->get('countries');
          $country_detail=$country->result_array();
          foreach ($country_detail as $rows) 
          {
              $country_id=$rows['id'];
          }
          $states=$this->db->where('country_id',$country_id)->get('states');
          $states_detail=$states->result_array();
        }
          //print_r($states_detail);
          return $states_detail;

    }
//===========================================================================//
    public function fetch_country($roaster_id)
    {
        $query=$this->db->where('roaster_id',$roaster_id)->limit(1)->get('roaster_detail');  
        $response=$query->result_array();
        foreach ($response as $row) 
        {
          $country=end(explode(' ', $row['country']));
        }
        return $country;
    }
//===========================================================================//
    public function update_roaster($account_id,$roaster_id)
    {
      $data['stripe_account_id']=$account_id;
      $data['connect_status']="1";
      $this->db->set($data);
      $this->db->where('roaster_id',$roaster_id);
      if($this->db->update('roaster_detail'))
      {
        return true;
      }
      else
      {
        return false;
      }

    }
}
?>