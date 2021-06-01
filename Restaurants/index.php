<?php
include 'header.php';
?>
<?php

session_start();
$message="";
if(count($_POST)>0) {

    include("plugins/db-connect.php");

//echo '<script>alert("1");</script>';

$email=$_POST["email"];
$pass=$_POST["password"];
//echo '<script>alert("$email");</script>;';
$sql = "SELECT * FROM restaurant WHERE restaurant_email = '$email' and restaurant_password = '$pass'";
//echo '<script>alert("2");</script>';

$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
	//echo '<script>alert("3");</script>';
$_SESSION["rest_id"] = $row["restaurant_id"];
$_SESSION["rest_email"] = $row["restaurant_email"];
}
 else {
    $message = "<h4 class='alert alert-danger'> <strong>WARNING!</strong> <i>Incorrect Email or Password</i> </h4>";
    //echo "<script>setTimeout(\"location.href = 'login.php';\",1000);</script>";
}
}
if(isset($_SESSION["rest_email"])) {
   echo "<script>setTimeout(\"location.href = 'home.php';\",10);</script>";
}

?>
<body>
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate="">
		<h2>Log In</h2>
		<p>Welcome to Login Page</p>
		<hr>
		<span><?php echo "$message";?></span>
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
	<div class="text-center">New Here? <a href="signup.php">Register here</a></div>
</div>
</body>
</html>