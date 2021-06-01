<?php
include 'dash.php';
?>
<?php
  include("plugins/db-connect.php");
$id = $_SESSION['rest_id']; 
$today= date("Y-m-d");
    
        if(!$conn)
       {
           die('not connected');
       }
            $deliver =  mysqli_query($conn, "SELECT count( * ) as  total_order FROM order_details WHERE rest_id='$id' and status='delivered';");
            $row1=  mysqli_fetch_array($deliver);

            $monthly_earning = mysqli_query($conn, "SELECT sum(total_price) as monthy_earning FROM order_details where rest_id='$id' and status='delivered' and MONTH(order_date) and YEAR(order_date);");
            
            $row2=  mysqli_fetch_array($monthly_earning);
            $today_order = mysqli_query($conn, "SELECT count(*) as today_order FROM order_details WHERE rest_id='$id' and  DATE(order_date) = '$today'");
            
            $row3=  mysqli_fetch_array($today_order);
            $today_earning = mysqli_query($conn, "SELECT sum(total_price) as today_earning  FROM order_details WHERE rest_id='$id' and status='delivered' and  DATE(order_date) = '$today'");
            
            $row4=  mysqli_fetch_array($today_earning);
            

?>
<div class="container">
	<center>
	<div class="row">
		<div class="col-md-6">
			<div class="box w3-right">
				<img src="../assets/images/icons/order-food.svg">
				<h1><?php echo $row3['today_order']; ?></h1>
				<p>Order Recieved</p>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box w3-left">
				<img src="../assets/images/icons/food-delivery.svg">
				<h1><?php echo $row1['total_order']; ?></h1>
				<p>Order Delivered</p>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box w3-right">
				<img src="../assets/images/icons/money.svg">
				<h1>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo round($row4['today_earning']); ?></h1>
				<span class="inrSign"><i class="fa fa-inr"></i></span>
				<p style="margin-top: -35px">Today's Earning</p>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box w3-left">
				<img src="../assets/images/icons/money-1.svg">
				<h1>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo round($row2['monthy_earning']); ?></h1>
				<span class="inrSign"><i class="fa fa-inr"></i></span>
				<p style="margin-top: -35px">Monthly Earning</p>
			</div>
		</div>
	</div>
</center>
</div>

<?php

include 'footer.php';
?>
