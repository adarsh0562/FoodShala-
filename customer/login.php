<?php
@session_start();
$message="";
if(count($_POST)>0) {

    include("plugins/db-connect.php");

//echo '<script>alert("1");</script>';

$email=$_POST["email"];
$pass=$_POST["password"];
//echo '<script>alert("$email");</script>;';
$sql = "SELECT * FROM customer WHERE customer_email = '$email' and customer_password = '$pass'";
//echo '<script>alert("2");</script>';

$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
	//echo '<script>alert("3");</script>';
$_SESSION["cust_id"] = $row["id"];
$_SESSION["cust_name"] = $row["customer_name"];
$_SESSION["cust_email"] = $row["customer_email"];
$_SESSION["cust_mobile"] = $row["customer_mobile"];

}
 else {
    $message = "<h4 class='alert alert-danger'> <strong>WARNING!</strong> <i>Incorrect Email or Password</i> </h4>";
    //echo "<script>setTimeout(\"location.href = 'login.php';\",1000);</script>";
}
}
if(isset($_SESSION["cust_email"])) {
   // echo "<script>setTimeout(\"location.href = 'order.php?food_id='.'$food_id'.\",10);</script>";
   $food_id = $_SESSION['food_id'];
   echo $food_id;
   $url = 'order.php?food_id='.$food_id;
   header('Location: '.$url);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/form.css">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body style="background-image:url('assets/images/ftbg.jpg');">
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
		<h2>Log In</h2>
		<p>Welcome to Login Page</p>
		<hr><span><?php echo "$message";?></span>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
        </div>
    </form>
	<div class="text-center" style="font-weight: bold;color: darkblue;">New Here? <a href="signup.php">Register here</a></div>
</div>
</body>
</html>