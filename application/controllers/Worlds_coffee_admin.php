<?php
error_reporting(0);
class Worlds_coffee_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Admin_model');
        error_reporting(0);
    }
//===============================================================================//
    public function index()
    {
        $user_id=$this->session->userdata('user_id');
        if($user_id)
        {
           
           redirect('Worlds_coffee_admin/dashboard',"refresh");
        }
        else
        {
            $this->load->view('admin/login');
            //$this->load->view('admin/dashboard');
        }
        
        
    }
//========================================================================//

    public function logout_user()
    {
        $this->session->unset_userdata('user_id');
        redirect('Worlds_coffee_admin/index',"refresh");

    }
    public function test()
    {
        // $data['count_coffee']=$this->Admin_model->count_coffee();
        // $data['count_roaster']=$this->Admin_model->count_roaster();
        // $data['last_month']=$this->Admin_model->last_month_payments();
        // print_r($data);
        $this->load->view('admin/test_payment');
    }
//=========================================================================//

    public function dashboard()
    {
        $data['coffee_count']=$this->Admin_model->count_coffee();
        $data['roaster_count']=$this->Admin_model->count_roaster();
        $data['last_month']=$this->Admin_model->last_month_payments();
        //print_r($data);
        //$data['hello']="hello";
        $this->load->view('admin/dashboard.php',$data);
    }
//=========================================================================//
    public function user_login()
    {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $response=$this->Admin_model->user_login($email,$password);
        if($response)
        {
            $user_id=$response[0]['user_id'];
            $this->session->set_userdata('user_id',$user_id);
            redirect('Worlds_coffee_admin/dashboard',"refresh");
        }
        else
        {
            $this->load->view('admin/login');
        }

    }
//===============================================================================//
    public function coffee_details()
    {
    	$data['coffee_details']=$this->Admin_model->coffee_details();
    	$this->load->view('admin/coffee_details',$data);
    }
//===============================================================================//
    public function edit_coffee_detail()
    {
        $coffee_id=$this->input->post('coffee_id');
        $get_detail=$this->Admin_model->coffee_detail($coffee_id);
        $roaster_names=$this->Admin_model->get_roaster();
        $locations=$this->Admin_model->get_roaster();
        if($get_detail)
        {
            foreach ($get_detail as $row) 
            {
               ?>

                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Coffee details</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/update_coffee_detail" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_name">Coffee Name</label>
                    <input type="text" id="coffee_name" class="form-control" placeholder="Coffee Name" autofocus="autofocus" name="coffee_name" value="<?php echo $row['coffee_name'];?>">
                    <input type="text" name="coffee_id" value="<?php echo $row['coffee_id'];?>" hidden>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <!-- <input type="text" id="roaster_name" class="form-control" placeholder="Roaster Name" autofocus="autofocus" name="roaster_name"> -->
                    <?php
                    $split=explode('-',$row['roaster']);
                    ?>
                    <select name="roaster_name" class="form-control" autofocus="autofocus">
                        <option value="0" hidden>no roaster</option>
                        <option value="<?php echo $row['roaster'];?>" selected hidden><?php echo $split[0];?></option>
                        <?php
                        if($roaster_names)
                        {
                            foreach ($roaster_names as $roaster)
                            {
                            ?>
                                <option value="<?php echo $roaster['roaster_name']."-".$roaster['roaster_id'];?>"><?php echo $roaster['roaster_name'];?></option>
                            <?php
                            }
                        }
                        else
                        {
                            ?>

                            <option value="">No roaster found</option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="roast_type">Roaster Type</label>
                    <input type="text" id="roast_type" class="form-control" placeholder="Roaster Type" autofocus="autofocus" name="roast_type" value="<?php echo $row['roast_type'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_weight">Coffee weight</label>
                    <input type="text" id="coffee_weight" class="form-control" placeholder="Weight" autofocus="autofocus" name="coffee_weight" value="<?php echo $row['weight'];?>">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_type">Coffee Type</label>
                    <input type="text" id="coffee_type" class="form-control" placeholder="Tasting" autofocus="autofocus" name="coffee_type" value="<?php echo $row['coffee_type'];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_region">Region</label>
                    <input type="text" id="coffee_region" class="form-control" placeholder="Elevation" autofocus="autofocus" name="coffee_region" value="<?php echo $row['region'];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="file_image">Coffee Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>




                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_tasting">Tasting</label>
                    <input type="text" id="coffee_tasting" class="form-control" placeholder="Tasting" autofocus="autofocus" name="coffee_tasting" value="<?php echo $row['coffee_tasting'];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_elevation">Elevation</label>
                    <input type="text" id="coffee_elevation" class="form-control" placeholder="Elevation" autofocus="autofocus" name="coffee_elevation" value="<?php echo $row['elevation'];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <label for="coffee_producer">Producer</label>
                    <input type="text" id="coffee_producer" class="form-control" placeholder="Producer" autofocus="autofocus" name="coffee_producer" value="<?php echo $row['producer'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_location">Location</label>
                    <!-- <input type="text" id="coffee_location" class="form-control" placeholder="Location" autofocus="autofocus" name="coffee_location" value="<?php //echo $row['location'];?>"> -->
                    <select name="coffee_location" class="form-control" autofocus="autofocus">
                        <option value="" hidden></option>
                        <option value="<?php echo $row['location'];?>" selected><?php echo $row['location'];?></option>
                        
                        <?php
                        if($locations)
                        {
                            foreach ($locations as $location)
                            {
                            ?>
                                <option value="<?php echo $location['roaster_location'];?>"><?php echo $location['roaster_location'];?></option>
                            <?php
                            }
                        }
                        else
                        {
                            ?>

                            <option value="">No location found</option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="coffee_price">Coffee Price</label>
                    <input type="text" id="coffee_price" class="form-control" placeholder="Coffee Price" autofocus="autofocus" name="coffee_price" value="<?php echo $row['coffee_price'];?>">
                  </div>
                </div>
                <div class="col-md-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-md-6 submit_btn text-center">
                    <input type="submit" id="submit_coffee" class="btn btn-success" autofocus="autofocus" name="submit_coffee" value="Update Details">
                </div>
                
                </div>
            </form>
        </div>


               <?php
            }
        }
    }
//===============================================================================//
    public function update_coffee_detail()
    {
        if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/coffee_images/" .$rand. $file_name);

            $_POST['coffee_image'] ="assets/images/coffee_images/".$rand . $file_name;
        }

        $coffee_id=$this->input->post('coffee_id');
        if($this->input->post('coffee_name'))
        {
            $data['coffee_name']=$this->input->post('coffee_name'); 
        }
        if($this->input->post('roaster_name'))
        {
            $data['roaster']=$this->input->post('roaster_name');
        }
        if($this->input->post('roast_type'))
        {
            $data['roast_type']=$this->input->post('roast_type');
        }
        if($this->input->post('coffee_weight'))
        {
            $data['weight']=$this->input->post('coffee_weight');
        }
        if($this->input->post('coffee_type'))
        {
            $data['coffee_type']=$this->input->post('coffee_type');
        }
        if($this->input->post('coffee_region'))
        {
            $data['region']=$this->input->post('coffee_region');
        }
        if($this->input->post('coffee_tasting'))
        {
            $data['coffee_tasting']=$this->input->post('coffee_tasting');
        }
        if($this->input->post('coffee_elevation'))
        {
            $data['elevation']=$this->input->post('coffee_elevation');
        }
        if($this->input->post('coffee_producer'))
        {
            $data['producer']=$this->input->post('coffee_producer'); 
        }
        if($this->input->post('coffee_location'))
        {
            $data['location']=$this->input->post('coffee_location');
        }
        if($this->input->post('coffee_price'))
        {
            $data['coffee_price']=$this->input->post('coffee_price');
        }
        if($_POST['coffee_image'])
        {
            $data['coffee_image']=$_POST['coffee_image'];
        }
        $response=$this->Admin_model->update_coffee_detail($coffee_id,$data);
        if($response)
        {
            $this->session->set_flashdata('success',"Coffee details updated successfully.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"You have made no changes.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
        
    }
//===============================================================================//
    public function add_new_coffee()
    {
        $data['locations']=$this->Admin_model->get_roaster();
        $data['roaster_names']=$this->Admin_model->get_roaster();
        $this->load->view('admin/add_coffee',$data);
    }
//===============================================================================//
    public function save_new_coffee()
    {

         if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/coffee_images/" .$rand. $file_name);

            $_POST['coffee_image'] ="assets/images/coffee_images/".$rand . $file_name;
        }

        if($this->input->post('coffee_name'))
        {
            $data['coffee_name']=$this->input->post('coffee_name'); 
        }
        if($this->input->post('roaster_name'))
        {
            $data['roaster']=$this->input->post('roaster_name');
            $data['company_name']=$this->input->post('roaster_name');
        }
        if($this->input->post('roast_type'))
        {
            $data['roast_type']=$this->input->post('roast_type');
        }
        if($this->input->post('coffee_weight'))
        {
            $data['weight']=$this->input->post('coffee_weight');
        }
        if($this->input->post('coffee_type'))
        {
            $data['coffee_type']=$this->input->post('coffee_type');
        }
        if($this->input->post('coffee_region'))
        {
            $data['region']=$this->input->post('coffee_region');
        }
        if($this->input->post('coffee_tasting'))
        {
            $data['coffee_tasting']=$this->input->post('coffee_tasting');
        }
        if($this->input->post('coffee_elevation'))
        {
            $data['elevation']=$this->input->post('coffee_elevation');
        }
        if($this->input->post('coffee_producer'))
        {
            $data['producer']=$this->input->post('coffee_producer'); 
        }
        if($this->input->post('coffee_location'))
        {
            $data['location']=$this->input->post('coffee_location');
        }
        if($this->input->post('coffee_price'))
        {
            $data['coffee_price']=$this->input->post('coffee_price');
        }
        if($_POST['coffee_image'])
        {
            $data['coffee_image']=$_POST['coffee_image'];
        }
        $response=$this->Admin_model->save_new_coffee($data);
        if($response)
        {
            $this->session->set_flashdata('success',"New coffee added successfully.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"Coffee details not added.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
    }
//===========================================================================//
    public function delete_coffee()
    {
        $coffee_id=$this->input->post('coffee_id');
         $response=$this->Admin_model->delete_coffee($coffee_id);
        if($response)
        {
            $this->session->set_flashdata('success',"Coffee deleted successfully.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"Coffee details not deleted.");
            redirect('Worlds_coffee_admin/coffee_details',"refresh");
            
        }
    }
//==============================================================================//
    public function roaster_details()
    {
        $data['roaster_details']=$this->Admin_model->roaster_details();
        $this->load->view('admin/roaster_detail',$data);
    }
//===============================================================================//
    public function roaster_view()
    {
        $roaster_id=$this->input->get('id');
        $data['roaster_detail']=$this->Admin_model->roaster_detail($roaster_id);
         $this->load->view('admin/roaster_view_detail',$data);
    }
//=============================================================================//
    public function edit_roaster_detail()
    {
        $roaster_id=$this->input->post('roaster_id');
        $get_detail=$this->Admin_model->roaster_detail($roaster_id);
        $countries=$this->Admin_model->fetch_countries();
        //$states=$this->Admin_model->client_states($roaster_id);
         if($get_detail)
        {
            foreach ($get_detail as $row) 
            {
               ?>

                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Roaster details</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
             <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/update_roaster_detail" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <input type="text" id="roaster_name" class="form-control" placeholder="Coffee Name" autofocus="autofocus" name="roaster_name" value="<?php echo $row['roaster_name'];?>" required>
                    <input type="text" name="roaster_id" value="<?php echo $row['roaster_id'];?>" hidden>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="charges">Wolrds Coffee Charge (%)</label>
                    <input type="number" id="charges"  name="charges" placeholder="Charges(in %)" class="form-control" required value="<?php echo $row['charges'];?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="file_image">Roaster Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-label-group">
                    <label  for="catalog_show">Shown in Catalog</label>
                    <div class="checkbox-custm">
                      <input type="checkbox" value="1" id="catalog_show" name="catalog_show" checked>
                      <span class="checkmark"></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-label-group">
                    <label for="tax_pay">Naxus tax is payed</label>
                    <div class="checkbox-custm">
                      <input type="checkbox" value="1" id="tax_pay" name="tax_pay" checked>
                      <span class="checkmark"></span>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_location">Location</label>
                    <input type="text" id="roaster_location" class="form-control" placeholder="Location" autofocus="autofocus" name="roaster_location" value="<?php echo $row['roaster_location'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_latitude">Latitude</label>
                    <input type="number" step="any" id="roaster_latitude" class="form-control" placeholder="Latitude" autofocus="autofocus" name="roaster_latitude" value="<?php echo $row['latitude'];?>" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_longitude">Longitude</label>
                    <input type="number" step="any" id="roaster_longitude" class="form-control" placeholder="Longitude" autofocus="autofocus" name="roaster_longitude" value="<?php echo $row['longitude'];?>" required>
                  </div>
                </div>
               
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_description">Description</label>
                    <textarea rows="5" id="roaster_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_description"><?php echo $row['description'];?></textarea>
                  </div>
                </div>
                 <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="url">URL</label>
                    <input type="text" id="url" class="form-control" placeholder="url..." autofocus="autofocus" name="url" value="<?php echo $row['url'];?>">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_story">Story</label>
                    <textarea rows="5" id="roaster_story" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_story"><?php echo $row['story'];?></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="country">Country</label>
                    <select id="country" class="form-control get_state" placeholder="Country" autofocus="autofocus" name="country" value="<?php echo $row['country'];?>">
                      <option value="0" hidden>Select Country</option>
                      <?php 
                        foreach ($countries as $rows) 
                        {
                          ?>
                          <option id="<?php echo $rows['id'];?>" value="<?php echo $rows['name']." ".$rows['sortname'];?>"><?php echo $rows['name'];?></option>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="state">State</label>
                    <select id="state" class="form-control" placeholder="State" autofocus="autofocus" name="state" value="<?php echo $row['state'];?>">



                    </select>                    
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="city">City</label>
                    <input type="text" id="city" class="form-control" placeholder="City" autofocus="autofocus" name="city" value="<?php echo $row['city'];?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="address">Address</label>
                    <textarea rows="5" id="address" class="form-control" placeholder="Address..." autofocus="autofocus" name="address" required><?php echo $row['address'];?></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" id="zip_code" class="form-control" placeholder="Zip code" autofocus="autofocus" name="zip_code" value="<?php echo $row['zip_code'];?>" required>
                  </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Save Roaster">
                </div>
                
                </div>
            </form>
             <!-- <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/update_roaster_detail" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="roaster_name">Roaster Name</label>
                    <input type="text" id="roaster_name" class="form-control" placeholder="Roaster Name" autofocus="autofocus" name="roaster_name" value="<?php echo $row['roaster_name'];?>">
                    <input type="text" name="roaster_id" value="<?php echo $row['roaster_id'];?>" hidden>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="file_image">Roaster Image</label>
                    <input type="file" id="file_image" name="file" class="form-control">
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_location">Location</label>
                    <input type="text" id="roaster_location" class="form-control" placeholder="Location" autofocus="autofocus" name="roaster_location" value="<?php echo $row['roaster_location'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_latitude">Latitude</label>
                    <input type="number" id="roaster_latitude" class="form-control" placeholder="Latitude" autofocus="autofocus" name="roaster_latitude" value="<?php echo $row['latitude'];?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-label-group">
                    <label for="roaster_longitude">Longitude</label>
                    <input type="number" id="roaster_longitude" class="form-control" placeholder="Longitude" autofocus="autofocus" name="roaster_longitude" value="<?php echo $row['longitude'];?>">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_description">Description</label>
                    <textarea rows="5" id="roaster_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_description"><?php echo $row['description'];?></textarea>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-label-group">
                    <label for="roaster_story">Story</label>
                    <textarea rows="5" id="roaster_story" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="roaster_story"><?php echo $row['story'];?></textarea>
                  </div>
                </div>

                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Update Details">
                </div>
                
                </div>
            </form> -->
        </div>
        <script type="text/javascript">
  $('select.get_state').change(function()
  {
    var country_id = $(".get_state option:selected").attr('id');
     console.log(country_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/Worlds_coffee_admin/fetch_state",
            data: {'country_id':country_id},
            success: function(res) 
            {
                console.log(country_id);

                $('#state').html(res);
            }
}); 

  });
</script>


               <?php
            }
        }
    }
//==============================================================================//
    public function update_roaster_detail()
    {
        if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/roaster_image/" .$rand. $file_name);

            $_POST['roaster_image'] ="assets/images/roaster_image/".$rand . $file_name;
        }

        $roaster_id=$this->input->post('roaster_id');
        if($this->input->post('roaster_name'))
        {
            $data['roaster_name']=$this->input->post('roaster_name');
        }
        if($this->input->post('roaster_location'))
        {
            $data['roaster_location']=$this->input->post('roaster_location');
        }
        if($this->input->post('roaster_latitude'))
        {
            $data['latitude']=$this->input->post('roaster_latitude');
        }
        if($this->input->post('roaster_longitude'))
        {
            $data['longitude']=$this->input->post('roaster_longitude');
        }
        if($this->input->post('roaster_description'))
        {
            $data['description']=$this->input->post('roaster_description');
        }
        if($this->input->post('roaster_story'))
        {
            $data['story']=$this->input->post('roaster_story');
        }
        if($_POST['roaster_image'])
        {
            $data['roaster_image']=$_POST['roaster_image'];
        }
        if($_POST['charges'])
        {
            $data['charges']=$_POST['charges'];
        }
        if($_POST['catalog_show'])
        {
            $data['catalog_show']=$_POST['catalog_show'];
        }
        if($_POST['tax_pay'])
        {
            $data['tax_pay']=$_POST['tax_pay'];  
        }
        if($_POST['url'])
        {
            $data['url']=$_POST['url'];    
        }
        if($_POST['country'])
        {
            $data['country']=$_POST['country'];    
        }
        if($_POST['state'])
        {
            $data['state']=$_POST['state'];    
        }
        if($_POST['city'])
        {
            $data['city']=$_POST['city'];    
        }
        if($_POST['address'])
        {
            $data['address']=$_POST['address'];    
        }
        if($_POST['zip_code'])
        {
            $data['zip_code']=$_POST['zip_code'];    
        }
        // print_r($data);
        $response=$this->Admin_model->update_roaster_detail($roaster_id,$data);
        if($response)
        {
            $this->session->set_flashdata('success',"Roaster details updated successfully.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"You have made no changes.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
        }
    }
//============================================================================//
    public function add_new_roaster()
    {
        $data['countries']=$this->Admin_model->fetch_countries();
        $this->load->view('admin/add_roaster',$data);
    }
//===============================================================================//
    public function save_new_roaster()
    {
        if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/roaster_image/" .$rand. $file_name);

            $_POST['roaster_image'] ="assets/images/roaster_image/".$rand . $file_name;
        }

        if($this->input->post('roaster_name'))
        {
            $data['roaster_name']=$this->input->post('roaster_name');
        }
        if($this->input->post('roaster_location'))
        {
            $data['roaster_location']=$this->input->post('roaster_location');
        }
        if($this->input->post('roaster_latitude'))
        {
            $data['latitude']=$this->input->post('roaster_latitude');
        }
        if($this->input->post('roaster_longitude'))
        {
            $data['longitude']=$this->input->post('roaster_longitude');
        }
        if($this->input->post('roaster_description'))
        {
            $data['description']=$this->input->post('roaster_description');
        }
        if($this->input->post('roaster_story'))
        {
            $data['story']=$this->input->post('roaster_story');
        }
        if($_POST['roaster_image'])
        {
            $data['roaster_image']=$_POST['roaster_image'];
        }
        if($_POST['charges'])
        {
            $data['charges']=$_POST['charges'];
        }
        if($_POST['catalog_show'])
        {
            $data['catalog_show']=$_POST['catalog_show'];
        }
        if($_POST['tax_pay'])
        {
            $data['tax_pay']=$_POST['tax_pay'];  
        }
        if($_POST['url'])
        {
            $data['url']=$_POST['url'];    
        }
        if($_POST['country'])
        {
            $data['country']=$_POST['country'];    
        }
        if($_POST['state'])
        {
            $data['state']=$_POST['state'];    
        }
        if($_POST['city'])
        {
            $data['city']=$_POST['city'];    
        }
        if($_POST['address'])
        {
            $data['address']=$_POST['address'];    
        }
        if($_POST['zip_code'])
        {
            $data['zip_code']=$_POST['zip_code'];    
        }
         //print_r($data);
        $response=$this->Admin_model->save_roaster_detail($data);
        if($response)
        {
            $this->session->set_flashdata('success',"New Roaster details added.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"New roaster not added.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
        }
    }
//=====================================================================//
    public function delete_roaster()
    {
        $roaster_id=$this->input->post('roaster_id');
         $response=$this->Admin_model->delete_roaster($roaster_id);
        if($response)
        {
            $this->session->set_flashdata('success',"Roaster deleted successfully.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"Roaster details not deleted.");
            redirect('Worlds_coffee_admin/roaster_details',"refresh");
            
            
        }
    }
//========================End of Roaster Changes=========================//
    public function news_details()
    {
        $data['news_details']=$this->Admin_model->news_details();
        $this->load->view('admin/news_details',$data); 
    }
//=====================================================================//
    public function news_view()
    {
        $news_id=$this->input->get('id');
        $data['news_detail']=$this->Admin_model->news_detail($news_id);
         $this->load->view('admin/news_view',$data);
    }
//======================================================================//
    public function edit_news_detail()
    {
        $news_id=$this->input->post('news_id');
        $get_detail=$this->Admin_model->news_detail($news_id);
         if($get_detail)
        {
            foreach ($get_detail as $row) 
            {
               ?>

                <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update News details</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
             <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/update_news_detail" enctype="multipart/form-data">
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-label-group">
                    <label for="hash_tags">Hash Tags</label>
                    <input type="text" id="hash_tags" class="form-control" placeholder="Hash Tags" autofocus="autofocus" name="hash_tags" value="<?php echo $row['hash_tags'];?>">
                    <input type="text" name="news_id" value="<?php echo $row['news_id'];?>" hidden>
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
                    <textarea rows="5" id="news_description" class="form-control" placeholder="Start Writing..." autofocus="autofocus" name="news_description"><?php echo $row['news_description'];?></textarea>
                  </div>
                </div>


                <div class="col-sm-6 cancel_btn text-center">
                    <input type="button"  class="btn btn-default" autofocus="autofocus" name="cancel_btn" value="Cancel">
                </div>
                <div class="col-sm-6 submit_btn text-center">
                    <input type="submit" id="submit_roaster" class="btn btn-success" autofocus="autofocus" name="submit_roaster" value="Update Details">
                </div>
                
                </div>
            </form>
        </div>


               <?php
            }
        }
    }
//=========================================================================//
    public function update_news_detail()
    {
        if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/news_images/" .$rand. $file_name);

            $_POST['news_image'] ="assets/images/news_images/".$rand . $file_name;
        }

        $news_id=$this->input->post('news_id');
        if($this->input->post('hash_tags'))
        {
            $data['hash_tags']=$this->input->post('hash_tags');
        }
        if($this->input->post('news_description'))
        {
            $data['news_description']=$this->input->post('news_description');
        }
        if($_POST['news_image'])
        {
            $data['news_image']=$_POST['news_image'];
        }
        // print_r($data);
        // echo $news_id;
        $response=$this->Admin_model->update_news_detail($news_id,$data);
        if($response)
        {
            $this->session->set_flashdata('success',"News details updated successfully.");
            redirect('Worlds_coffee_admin/news_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"You have made no changes.");
            redirect('Worlds_coffee_admin/news_details',"refresh");
            
        } 
    }
//======================================================================//
    public function add_new_news()
    {
        $this->load->view('admin/add_news',$data);
    }
//======================================================================//
    public function save_new_news()
    {
       if ($_FILES['file']['name']) 
        {
            //echo "hello";
            $rand = rand();
            $file_name = str_replace(' ', '_', $_FILES['file']['name']);
            $move = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/news_images/" .$rand. $file_name);

            $_POST['news_image'] ="assets/images/news_images/".$rand . $file_name;
        }

        if($this->input->post('hash_tags'))
        {
            $data['hash_tags']=$this->input->post('hash_tags');
        }
        if($this->input->post('news_description'))
        {
            $data['news_description']=$this->input->post('news_description');
        }
        if($_POST['news_image'])
        {
            $data['news_image']=$_POST['news_image'];
        }
        // print_r($data);
        // echo $news_id;
        $response=$this->Admin_model->save_news_detail($data);
        if($response)
        {
            $this->session->set_flashdata('success',"New News details Added successfully.");
            redirect('Worlds_coffee_admin/news_details',"refresh");
            
        }
        else
        {
            $this->session->set_flashdata('error_msg',"New News details no added.");
            redirect('Worlds_coffee_admin/news_details',"refresh");
            
        } 
    }
//=========================================================================//
    public function delete_news()
    {
        $news_id=$this->input->post('news_id');
         $response=$this->Admin_model->delete_news($news_id);
        if($response)
        {
            $this->session->set_flashdata('success',"News deleted successfully.");
            redirect('Worlds_coffee_admin/news_details',"refresh");    
        }
        else
        {
            $this->session->set_flashdata('error_msg',"News details not deleted.");
            redirect('Worlds_coffee_admin/news_details',"refresh");   
        }
    }
//========================================================================//
    public function booking_product_info()
    {
        $data['product_details']=$this->Admin_model->product_details();
        $this->load->view('admin/booking_product_detail',$data);
    }
//=======================================================================//
    public function payment_view()
    {
        $payment_id=$this->input->get('id');
        $data['product_details']=$this->Admin_model->get_product_details($payment_id);
        $this->load->view('admin/payment_view',$data);
    }
//======================================================================//
    public function payment_detail()
    {
        $data['payment_detail']=$this->Admin_model->get_payment_detail();
        $this->load->view('admin/payment_info',$data);
    }
//=============================================================================//
    public function fetch_state()
    {
        $country_id=$this->input->post('country_id');
        $fetch_state=$this->Admin_model->fetch_states($country_id);
        if($fetch_state)
        {
            foreach ($fetch_state as $row) 
            {
               ?>
               <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
               <?php
            }
        }
        
    }
//=====================================================================================//
    public function genrate_stripe_connect()
    {
        $data['roaster_id']=$_GET['id'];
        $this->session->set_userdata('roaster_id',$data['roaster_id']);
        $this->load->view('admin/generate_link',$data);
    }
//===================================================================//
    public function stripe_connect_link()
    {
    	$link_id=$this->session->userdata('link_id');
    	$url_link_id=$this->input->get('link_id');
    	$data['url_link_id']=$url_link_id;
    	$roaster_id=$this->session->userdata('roaster_id');
        //echo $roaster_id;
    	if($url_link_id==$link_id)
    	{
    		$data['states']=$this->Admin_model->client_states($roaster_id);
            $data['country']=$this->Admin_model->fetch_country($roaster_id);
		    $this->load->view('admin/stripe_connect',$data);    
    	}
    	else
    	{
    		echo "Invalid request";
    	}
    	


    }
//======================================================================//
    public function set_session()
    {
    	$link_id=$this->input->post('link_id');
    	//echo $link_id;
    	$this->session->set_userdata('link_id',$link_id);
    }
//======================================================================//
    public function stripe_connect()
    {
        $roaster_id=$this->input->post('roaster_id');
        $state=$this->input->post('state');
        $street=$this->input->post('street');
        $city=$this->input->post('city');
        $zip_code=$this->input->post('zip_code');
        $country=$this->input->post('country');

        //Business data
        $business_name=$this->input->post('business_name');
        $business_tax_id=$this->input->post('business_tax_id');
        $business_type=$this->input->post('business_type');

        //Personal Data
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $roaster_dob=$this->input->post('roaster_dob');

        $dob=date('d-m-Y',strtotime($roaster_dob));
        $dob=explode('-',$dob);

        //other details
        $email=$this->input->post('email');
        $ssn_number=$this->input->post('ssn_number');
        $verify_document=$this->input->post('verify_document');

        //Card Details
        if($this->input->post('card_number'))
        {
          $card_number=$this->input->post('card_number');  
        }
        if($this->input->post('expire_date'))
        {
          $expire_date=$this->input->post('expire_date');            
        }
        if($this->input->post('cvv_number'))
        {
          $cvv_number=$this->input->post('cvv_number');            
        }

        $this->db->set('roaster_email',$email);
        $this->db->where('roaster_id',$roaster_id);
        $this->db->update('roaster_detail');
  try{
        require_once 'stripe/init.php';

        \Stripe\Stripe::setApiKey("sk_test_rpN7KgbAB1jLHHftZgYhAZDp");

$result=\Stripe\Account::create(array(
          "type" => "custom",
          "country" => $country,
          "email" => $email,
          "legal_entity"=> array(
                    "address"=> array(
                      "city"=> $city,
                      "country"=> $country,
                      "line1"=> $street,
                      "line2"=> null,
                      "postal_code"=> $zip_code,
                      "state"=> $state
                    ),
                    "business_name"=>$business_name,
                    //"business_tax_id_provided"=> $business_tax_id,
                    "dob"=>array(
                          "day"=>$dob[0],
                          "month"=>$dob[1],
                          "year"=>$dob[2]
                    ),
                    "first_name"=>$first_name,
                    "last_name"=>$last_name,
                    //"personal_id_number_provided"=>$ssn_number,
            )    
        ));
        $account_id=$result->id;
        //print_r($account_id);
        if($account_id)
        {
            $response=$this->Admin_model->update_roaster($account_id,$roaster_id);
            if($response)
            {
                $this->session->set_flashdata('success',"Roaster connected with stripe (Check with 10-12 hours)");
                redirect('Worlds_coffee_admin/roaster_details',"refresh");    
            }
            else
            {
                $this->session->set_flashdata('error_msg',"Please correct details of roaster.");
                redirect('Worlds_coffee_admin/roaster_details',"refresh");   
            }
            }
    }
    catch(\Stripe\Error $e) {
        print_r($e);
    }



        
  


    }
//==========================================================================//
    public function pricing()
    {
        // require('include/class-product-pricing.php');
        // $array = apply_filters( 'woocommerce_get_price', $array, $int, $int ); 
                         
        //     if ( !empty( $array ) ) { 
                                     
        //        // everything has led up to this point... 
        //         print_r($array);
                                     
        //     } 

    }
}
