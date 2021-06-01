<?php
include("plugins/db-connect.php");
$id=$_SESSION["rest_id"];

$sql = "SELECT * FROM restaurant WHERE restaurant_id = '$id'";

$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
	//echo '<script>alert("3");</script>';
$rest_name = $row["restaurant_name"];
$rest_email = $row["restaurant_email"];
$rest_pass = $row["restaurant_password"];
$rest_open = $row["restaurant_openTime"];
$rest_close = $row["restaurant_closeTime"];
$rest_desc = $row["restaurant_desc"];
$rest_place = $row["restaurant_place"];
$rest_type = $row["restaurant_type"];
$rest_logo = $row["restaurant_logo"];
}
?>