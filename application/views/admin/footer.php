



    <!--   Core JS Files   -->
    

	<!-- <script src="<?php //echo base_url();?>assets/admin/assets/js/bootstrap.min.js" type="text/javascript"></script> -->

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>assets/admin/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url();?>assets/admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>assets/admin/assets/js/demo.js"></script>


<script src="<?php echo base_url();?>assets/admin/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/admin/assets/datatables/jquery.dataTables.js"></script>

<script src="<?php echo base_url();?>assets/admin/assets/datatables/dataTables.bootstrap4.js"></script>




    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/js/datatables-demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>





        <footer class="footer">
            <div class="container-fluid">
                <!-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav> -->
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="<?php echo base_url();?>">Worlds Coffee</a>
                </p>
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
            </div>
        </footer>


    </div>
</div>
</body>
</html>
  <!-- Logout -->
<div class="modal fade" id="logout_confirmation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Logout?</h4>
        </div>
        <div class="clearfix"></div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url();?>index.php/Worlds_coffee_admin/logout_user">
            Are you really want to Logout?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Logout</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

 