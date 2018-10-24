<div class="sidebar" data-image="<?php echo base_url();?>assets/images/banner.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo text-center">
                <img src="<?php echo base_url();?>assets/images/logo.png" height="42px">
                <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin" class="simple-text">
                   Worlds Coffee Admin
                </a>
            </div>
            <?php
            $actual_link = "$_SERVER[REQUEST_URI]";
            //echo $actual_link;
            $end_split=end(explode('/',$actual_link));
            if($end_split=="coffee_details")
            {
                ?>
            <ul class="nav">
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>

                <?php
            }
            else if($end_split=="roaster_details")
            {
                ?>
            <ul class="nav">
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>

                <?php
            }
            else if($end_split=="news_details")
            {
                ?>
            <ul class="nav">
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>
                <?php
            }
            else if($end_split=="booking_product_info")
            {
                ?>
            <ul class="nav">
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>
                <?php

            }
            else if($end_split=="payment_detail")
            {
                ?>
            <ul class="nav">
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>

                <?php
            }
            else
            {
              ?>
            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/coffee_details">
                        <i class="fa fa-coffee"></i>
                        <p>Coffee Details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/roaster_details">
                        <i class="fa fa-users"></i>
                        <p>Roaster details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/news_details">
                        <i class="fa fa-newspaper-o"></i>
                        <p>News details</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/booking_product_info">
                        <i class="fa fa-product-hunt"></i>
                        <p>Booking Products Detail</p>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url();?>index.php/Worlds_coffee_admin/payment_detail">
                        <i class="fa fa-cc-stripe"></i>
                        <p>Payment Details</p>
                    </a>
                </li>
                
            </ul>
              <?php  
            }

            ?>
            
    	</div>
    </div>