<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include("plugins/db-connect.php");   
    
    $name = $_POST['name'];
	$email=$_POST["email"];
	$pass=$_POST["password"];
	$cpassword = $_POST["cpassword"];
	$mobile = $_POST["mobile"];
            
    
    $sql = "Select * from customer where customer_email='$email'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($pass == $cpassword) && $exists==false) {
    
            // $hash = password_hash($pass, 
            //                     PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `customer` ( `customer_name`,`customer_email`, 
                `customer_password`,`customer_mobile`) 
                VALUES ('$name', '$email', '$pass','$mobile')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
                echo '<script>alert("Registeration Successfully!!!\nNow you can login!!!");</script>;';
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Email is already taken!!!"; 
   } 
    
}//end if   
    
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
		<!-- Error Messages and Alerts -->
		<?php
			    
			    if($showAlert) {
			    
			        echo "<script>setTimeout(\"location.href = 'login.php';\",10);</script>"; 
			    }
			    
			    if($showError) {
			    
			       echo ' <div class="alert alert-danger 
				            alert-dismissible fade show" role="alert"> 
				        <strong>Error!</strong> '. $showError.'
				    
				       <button type="button" class="close" 
				            data-dismiss="alert aria-label="Close">
				            <span aria-hidden="true">×</span> 
				       </button> 
				     </div> ';  
			   }
			        
			    if($exists) {
			        echo ' <div class="alert alert-danger 
			            alert-dismissible fade show" role="alert">
			    
			        <strong>Error!</strong> '. $exists.'
			        <button type="button" class="close" 
			            data-dismiss="alert" aria-label="Close"> 
			            <span aria-hidden="true">×</span> 
			        </button>
			       </div> '; 
			     }
			   
		?>
		<!-- Alert End -->

        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="name" placeholder="Name" required="required" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="number" class="form-control" name="mobile" placeholder="Mobile number" required="required" value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
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
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required="required">
			</div>
        </div>
        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div class="text-center" style="font-weight: bold;color: darkblue;">Already have an account? <a href="login.php">Login here</a></div>
</div>
</body>
</html>