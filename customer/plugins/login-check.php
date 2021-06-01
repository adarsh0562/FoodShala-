<?php 
    @session_start();
	if(!isset($_SESSION['cust_id'])){
	header("location:login.php");
	exit();
	}
?>