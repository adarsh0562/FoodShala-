<?php
if(!isset($_SESSION)){
    session_start();
}
@session_start();
$_SESSION['food_id'] = $_GET['food_id'];
$food_id = $_SESSION['food_id'];

include("plugins/login-check.php");
include 'header.php';
include 'navbar.php';

echo $food_id;
include("plugins/db-connect.php");

$sql = "SELECT * FROM food WHERE id = '$food_id'";

$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
  //echo '<script>alert("3");</script>';

//$_SESSION['food_id'] = $row["id"];
$_SESSION['rest_id'] = $row["rest_id"];
$_SESSION['food_title'] = $row["title"];
$_SESSION['food_price'] = $row["price"];
$food_price = $_SESSION['food_price'];
$food_desc = $row["description"];
$food_image = $row["image_name"];
$food_type = $row["food_type"];
}
?>
<!-- end -->
<div class="container-fluid">
  <section id="portfolio" class="portfolio" style="margin-bottom: -200px;">
    <div class="container">
        <div class="row">
            <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                <div class="col-md-12">

                    <div class="head_title text-center">
                       <h2 style="margin-top: 40px;">Your Cart</h2><hr>
                      <div class="container" style="margin:0 auto;">
                        <div class="w3-row w3-border w3-padding">
                          <div class="w3-third w3-container">
                            <div class="dishImage">
                              <img src="../assets/images/<?php echo $food_image; ?>">
                            </div>
                          </div>
                          <div class="w3-twothird w3-container dishDetails">
                            <h4><?php echo $_SESSION['food_title']; ?></h4>  
                            <span>
                              <img src="../assets/images/<?php
                               if($food_type=="veg"){
                                echo "veg.jpg";
                               }else{
                                echo "nonveg.jpg";
                               }
                              ?>"class="vegIcon w3-right">
                            </span>
                            <p><?php echo $food_desc; ?></p>
                            <p> <i class="fa fa-inr"> </i><span id="price"><?php echo ' '.$_SESSION['food_price']; ?></span></p>
                            <form class="w3-left increaseDecreaseBtn">
                              <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                              <input type="number" id="number" value="1" />
                              <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="container">
                      <div class="box w3-right">
                        <h2 class="">Billing</h2>
                        <table width="250" style="text-align: left;">
                          <tr><td>Amount</td><td><span  id="amount"><?php echo ' '.$food_price*1; ?></span></td></tr>
                          <tr><td>Tax</td><td>18%</td></tr>
                          <tr><td>Total Amount</td><td><span id="totalAmount"><?php echo ' '.$food_price+($food_price*(18/100)); ?></span></td></tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>


<?php
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
 
 include("plugins/db-connect.php");

  $cust_id = $_SESSION["cust_id"];
  $cust_email = $_SESSION["cust_email"];
  $food_title = $_SESSION['food_title'];
  $food_price = $_SESSION['food_price'];
  $rest_id = $_SESSION['rest_id'];
  $food_id = $_POST['food_id'];
  $name = $_POST['name'];
  $mobile=$_POST["mobile"];
  $add = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $address = "$add , $city , $state , {$zip}";
  $qty = $_POST["qty"];
  $total = $_POST["total"];
  $date= date("Y-m-d");
  $timing = date("H:m");
  $qry = "INSERT INTO `order_details` (`food_id`, `rest_id`, `food_name`, `food_price`, `food_qty`, `total_price`, `order_date`, `order_timing`,`status`, `customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$food_id', '$rest_id', '$food_title', '$food_price', '$qty', '$total', '$date','$timing','pending', '$cust_id', '$name', '$mobile', '$cust_email', '$address')";

  
  $showError =  $qry;
  //echo $qry;
  $result = mysqli_query($conn, $qry);
    
            if ($result) {
                $showAlert = true; 
                echo '<script>alert("Order  Successfully!!!");</script>;';
            }
        else{
          echo '<script>alert("Error!!");</script>;';

        }
  
 }   
?>

<section id="portfolio" class="portfolio">
  <div class="container-fluid text-center w3-center">
      <div class="row">
          <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
              <div class="col-md-12">
                  <h3 class="text-center" style="margin-left: 40px;border-bottom: 3px solid red;font-weight: bold;">Check out Form</h1>
                      <form class="billingForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <!-- Error Messages and Alerts -->
    <?php
          
          if($showAlert) {
          
              echo "<script>setTimeout(\"location.href = 'all_foods.php';\",10);</script>"; 
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
                              <label for="inputName4 w3-left">Name</label>
                              <input type="text" class="form-control" id="inputName4" placeholder="Enter Name" name="name" value="<?php echo $_SESSION['cust_name'];?>">
                            </div>
                            <div class="form-group">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Enter Email" name="email" value="<?php echo $_SESSION['cust_email'];?>">
                            </div>
                            <div class="form-group">
                              <label for="inputMobile4">Mobile</label>
                              <input type="phone" class="form-control" id="inputMobile4" placeholder="Enter Mobile" name="mobile" value="<?php echo $_SESSION['cust_mobile'];?>">
                            </div>
                          
                            <div class="form-group">
                              <label for="inputAddress" style="margin-left: 20px">Address</label>
                              <input type="text"  name="address" class="form-control" id="inputAddress" placeholder="Enter Full Address">
                            </div>
                            
                            <div class="form-group">
                              <label for="inputCity">City</label>
                              <input type="text" name="city" class="form-control" id="inputCity" placeholder="Enter City">
                            </div>
                            <div class="form-group">
                              <label for="inputState">State</label>
                              <input type="text" name="state" class="form-control" id="inputState" placeholder="Enter State">
                            </div>
                            
                            <div class="form-group">
                              <label for="inputZip">Zip</label>
                              <input type="number" name="zip" class="form-control" id="inputZip" placeholder="Enter Zip Code">
                            </div>
                            <div class="form-group">
                              <input type="number" name="qty" class="form-control" id="inputQty" hidden value="1">
                              <input type="number" name="total" class="form-control" id="inputTotal" value="<?php echo $_SESSION['food_price']+($_SESSION['food_price']*(18/100)); ?>" hidden>

                              <input type="text" class="form-control" id="inputId4" name="food_id" value="<?php echo $_SESSION['food_id'];?>" readonly hidden>
                            </div>
                            
                          
                          
                          <button type="submit"  class="btn btn-primary">Place Order</button>
                        </form>
                      
                  
              </div>
          </div>
      </div>
  </div>
</section>


<?php
include 'footer.php';
?>