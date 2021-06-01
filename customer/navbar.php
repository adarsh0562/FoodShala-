<div class='preloader'><div class='loaded'>&nbsp;</div></div>
<header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">	
                <div class="container">
                    <div class="row">	
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                            <div class="call_us_text">
								<a href=""><i class="fa fa-clock-o"></i> Order Foods 24/7</a>
								
							</div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                            </div>	
                        </div>

                    </div>			
                </div>
            </div>

            <!-- End navbar-collapse-->

            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="#"><h1 class="w3-white logo">FoodShala</h1></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.php#slider">Home</a></li>
                                        <li><a href="index.php#abouts">About us</a></li>
                                        <li><a href="index.php#portfolio">Top Dishes</a></li>
                                        <li><a href="all_foods.php">All Dishes</a></li>
                                        <?php 
                                            @session_start();
                                            // Set session variables
                                              if(isset($_SESSION['cust_id'])){
                                                  echo "
                                                  <li><a>Welcome &nbsp;".$_SESSION["cust_name"]."</a></li>
                                                  <li><a href='view_order.php?cust_id=".$_SESSION["cust_id"]."'>view order </a></li>
                                                  <li><a href='plugins/logout.php'>Logout</a></li>";
                                               }
                                        ?>
                                        
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>	
        </header> <!-- End Header Section -->
