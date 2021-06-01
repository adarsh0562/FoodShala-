<?php
include 'dash.php';
include('plugins/session_values.php');
?>


<?php
    
$showAlert = false; 
$showError = false; 
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include("plugins/db-connect.php");   
   $id = $_SESSION['rest_id'];
   $name = $_POST['name'];
	$open=$_POST["open"].' AM';
	$close=$_POST["close"].' PM';
	$desc = $_POST["desc"];
	$location = $_POST['loc'];
	$foodType = $_POST['foodType'];
	$logo = $_POST['logo'];
            
   $sql = "UPDATE restaurant set 
				restaurant_name='$name', 
				restaurant_openTime ='$open', 
				restaurant_closeTime ='$close',
				restaurant_desc='$desc',
				restaurant_place='$location',
				restaurant_type='$foodType',
				restaurant_logo='$logo'
				where restaurant_id='$id'";
    
   $result = mysqli_query($conn, $sql);
    
   if ($result)
   	{
	      $showAlert = true; 
	       echo '<script>alert("Customization Successfully");</script>;';
	   }else { 
            $showError = "Customization Failed!!!!"; 
        }      

    
}//end if   
    
?>
<body>
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2>Customize</h2>
		<p>Please fill in this form for Customizing your data</p>
		<hr>
		<!-- Error Messages and Alerts -->
		<?php
			    
			    if($showAlert) {
			    
			        echo "<script>setTimeout(\"location.href = 'home.php';\",10);</script>"; 
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
			        
			   
		?>
		<!-- Alert End -->
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="name" placeholder="Restaurant Name" required="required"  value="<?php echo $rest_name;?>">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" value="<?php echo $_SESSION['rest_email'];?>" readonly="">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-clock"></i>
					</span>                    
				</div>
				<input type="Time" class="form-control" name="open" placeholder="Open Time" required="required"  value="<?php echo $rest_open;?>">
				<input type="Time" class="form-control" name="close" placeholder="Close Time" required="required"  value="<?php echo $rest_close;?>">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						
						<i class="fa fa-table"></i>
					</span>                    
				</div>
				<textarea class="form-control" cols="4" rows="4" name="desc" placeholder="Dish disc">
					 <?php echo $rest_desc;?>
				</textarea>

			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="loc" placeholder="Place" required="required"  value="<?php echo $rest_place;?>">
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
				<p>Restaurant Type</p>&nbsp;&nbsp;&nbsp;&nbsp;
				<p><input type="radio" class="foodType" name="foodType" value="veg"
				 <?php if($rest_type=="veg") {echo "checked";}?> >&nbsp; Veg</p><br>&nbsp;&nbsp;&nbsp;&nbsp;
				<p><input type="radio" class="" name="foodType" value="nonveg" <?php if($rest_type=="nonveg") {echo "checked";}?> >&nbsp; Non Veg</p>&nbsp;&nbsp;&nbsp;&nbsp;
				<p><input type="radio" class="" name="foodType" value="mixed" <?php if($rest_type=="mixed") {echo "checked";}?> >&nbsp; Mixed</p>
			</div>
        </div>
        <div class="form-group">
         <div class="input-group">
            <p>Restaurant Logo
               <input type="file" name="logo" required></p>


         </div>
      </div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">customize</button>
        </div>
    </form>
</div>
<?php
include 'footer.php';
?>