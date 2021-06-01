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
   $rest_id = $_SESSION['rest_id'];
   $dish_name = $_POST['dish_name'];
   $dish_desc = $_POST["dish_desc"];
   $dish_price = $_POST["dish_price"];
   $dish_type = $_POST["dish_type"];
   $dish_image = $_POST['dish_image'];
   
            
   $sql = "INSERT INTO `food` ( `title`,`description`, 
                `price`, `food_type`,`image_name`,`rest_id`) 
                VALUES ('$dish_name', '$dish_desc', '$dish_price','$dish_type','$dish_image','$rest_id')";
    
   $result = mysqli_query($conn, $sql);
    
   if ($result)
      {
         $showAlert = true; 
          echo '<script>alert("Menu Added Successfully");</script>;';
      }else { 
            $showError = "Insertion Failed!!!!"; 
        }      

    
}//end if   
    
?>
<div class="container">
   <div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <h2>Add Menu</h2>
      <p>Please fill in this form to add Menu list</p>
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
                  <span class="fas fa-hamburger"></span>
               </span>                    
            </div>
            <input type="text" class="form-control" name="dish_name" placeholder="Dish Name" required="required">
         </div>
        </div>
        <div class="form-group">
         <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text">
                  <i class="fa fa-table"></i>
               </span>                    
            </div>
            <textarea class="form-control" name="dish_desc" placeholder="Dish disc"></textarea>
            
         </div>
        </div>
      <div class="form-group">
         <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text">
                  <i class="fa fa-inr"></i>
               </span>                    
            </div>
            <input type="number" class="form-control" name="dish_price" placeholder="Dish price" required="required">
         </div>
        </div>
     
      <div class="form-group">
         <div class="input-group">
            
            <p>Dish Type :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <?php 
               if ($rest_type=="veg") {
                  echo '<input type="radio" class="foodType" name="dish_type" value="veg">&nbsp; Veg</p><br>&nbsp;&nbsp;&nbsp;&nbsp;';
               }if ($rest_type=="nonveg") {
                  echo '<input type="radio" class="" name="dish_type" value="nonveg">&nbsp; Non Veg</p>&nbsp;&nbsp;&nbsp;&nbsp;';
               }if ($rest_type=="mixed") {
                echo '<input type="radio" class="foodType" name="dish_type" value="veg">&nbsp; Veg</p><br>&nbsp;&nbsp;&nbsp;&nbsp;
               <p><input type="radio" class="" name="dish_type" value="nonveg">&nbsp; Non Veg</p>&nbsp;&nbsp;&nbsp;&nbsp;';
               }
            ?>
         </div>
      </div>
      <div class="form-group">
         <div class="input-group">
            <p>Dish Image
               <input type="file" name="dish_image" value="Dish Image"></p>
         </div>
      </div>
       
      <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Add Dish</button>
        </div>
    </form>
</div>
</div>
<?php
include 'footer.php';
?>