<?php
include 'header.php';
include("plugins/login-check.php");
include('plugins/session_values.php');
?>


<style>
	@media only screen and(max-width: 600px){
	.coverPhoto{
	background-color: white;
	height: 600px;
	width: 300px;
}
}
</style>
<body style="background-image: url('../assets/images/bg1.jpg');">
<div class="container-fluid coverPhoto" style="background-image:url('../assets/images/bg2.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<div class="restaurantLogo w3-center">
					<img src="../assets/images/<?php
					 if($rest_logo){
					 	echo $rest_logo;
					 }else{
					 	echo "noimage.jpg";
					 }
					?>">
				</div>
			</div>
			<div class="col-sm-12 col-md-9">
				<div class="restaurant_desc">
					<h1><?php echo $rest_name;?></h1>

					<img src="../assets/images/<?php
					 if($rest_type=="veg"){
					 	echo "veg.jpg";
					 }else{
					 	echo "nonveg.jpg";
					 }
					?>"class="vegIcon">

					<span>5.0 &nbsp;<i class="fa fa-star"></i> Ratings</span><br>
					<p>Time : <?php 
					if($rest_open && $rest_close){
						echo strftime('%I:%M %p',strtotime($rest_open)).' To '.strftime('%I:%M %p',strtotime($rest_close));
					}?>
					</p>
					<p style="margin-top: -10px;margin-bottom: 0px;"><?php echo $rest_place;?></p>
					<p>
						 <?php 
					if($rest_desc){
						echo $rest_desc;
					}else{
						echo 'Some Description of your Restaurant....';
					}?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-12 sideMenu" style="padding-right:-30px;">
			<div class="sidebar " style="margin-right:-50px;width:100%;">
			  <a class="active" href="home.php">STATUS</a>
			  <a href="view-orders.php">VIEW ORDERS</a>
			  <a href="order-delivered.php">DELIVERED ORDER</a>
			  <a href="view-menu.php">VIEW MENU</a>
			  <a href="add-menu.php">ADD MENU</a>
			  <a href="customize.php">CUSTOMIZE</a>
			  <a href="plugins/logout.php">LOG OUT</a>
			</div>
		</div>
		<div class="col-md-10 col-sm-12" style="margin-left:-25px;">

		