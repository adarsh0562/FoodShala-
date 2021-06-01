<?php
session_start();
session_destroy();
unset($_SESSION["cust_id"]);
unset($_SESSION["cust_email"]);
header("Location:../index.php");
?>