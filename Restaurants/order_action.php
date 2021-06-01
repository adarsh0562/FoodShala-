<?php
include('plugins/session_values.php');

$id = $_GET['id'];
$req = $_GET['req'];
if($req == "confirm")
{
$sql = "UPDATE order_details set status='confirmed' where id='$id'";
$result = mysqli_query($conn, $sql);
if ($result)
   	{
   		echo '<script>alert("Order Confirmed!!!");</script>';
	   	header('Location: view-orders.php');
	}else{ 
			echo '<script>alert("Technical Error!!!");</script>';
            header('Location: view-orders.php');
        }  
}
if($req == "cancel")
{
$sql = "UPDATE order_details set status='cancelled' where id='$id'";
$result = mysqli_query($conn, $sql);
if ($result)
   	{
   		echo '<script>alert("Order Cancelled!!!");</script>';
	   
	}else{ 
			echo '<script>alert("Technical Error!!!");</script>';
            
        }  
}
if($req == "deliver")
{
$sql = "UPDATE order_details set status='delivered' where id='$id'";
$result = mysqli_query($conn, $sql);
if ($result)
   	{
   		echo '<script>alert("Order Delivered!!!");</script>';
	   
	}else{ 
			echo '<script>alert("Technical Error!!!");</script>';
            
        }  
}
	header('Location: view-orders.php');
?>
    
