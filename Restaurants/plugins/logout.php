<?php
session_start();
session_destroy();
unset($_SESSION["rest_id"]);
unset($_SESSION["rest_email"]);
header("Location:../index.php");
?>