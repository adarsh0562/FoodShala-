<?php 
    session_start();
	if(!isset($_SESSION['rest_id'])){
	header("location:index.php");
	exit();
	}
?>