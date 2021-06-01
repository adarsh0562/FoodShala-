<?php
include 'header.php';
?>


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
	$location = $_POST['loc'];
	$foodType = $_POST['foodType'];
            
    
    $sql = "Select * from restaurant where restaurant_email='$email'";
    
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
            $sql = "INSERT INTO `restaurant` ( `restaurant_name`,`restaurant_email`, 
                `restaurant_password`, `restaurant_place`,`restaurant_type`) 
                VALUES ('$name', '$email', '$pass','$location','$foodType')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
                echo '<script>alert("Restaurant Register Successfully!!!\nNow you can login!!!");</script>;';
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Username not available"; 
   } 
    
}//end if   
    
?>
<body>


<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
		<!-- Error Messages and Alerts -->
		<?php
			    
			    if($showAlert) {
			    
			        echo "<script>setTimeout(\"location.href = 'index.php';\",10);</script>"; 
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
				<input type="text" class="form-control" name="name" placeholder="Restaurant Name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>" required="required">
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
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="loc" placeholder="Location" required="required" value="<?php echo isset($_POST["loc"]) ? $_POST["loc"] : ''; ?>">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<!-- <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div> -->
				<p><input type="radio" class="foodType" name="foodType" value="<?php echo isset($_POST["foodType"]) ? $_POST["foodType"] : 'veg'; ?>">&nbsp; Veg</p><br>&nbsp;&nbsp;&nbsp;&nbsp;
				<p><input type="radio" class="" name="foodType" value="<?php echo isset($_POST["foodType"]) ? $_POST["foodType"] : 'nonveg'; ?>">&nbsp; Non Veg</p>&nbsp;&nbsp;&nbsp;&nbsp;
				<p><input type="radio" class="" name="foodType" value="<?php echo isset($_POST["foodType"])  ? $_POST["foodType"] : 'mixed'; ?>">&nbsp; Mixed</p>
			</div>
        </div>
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="index.php">Login here</a></div>
</div>
</body>
</html>