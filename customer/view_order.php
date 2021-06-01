<?php
include 'header.php';
include 'navbar.php';
$cust_id = $_GET['cust_id'];


  include("plugins/db-connect.php");
$_SESSION['cust_id'] = $cust_id;      
        if(!$conn)
       {
           die('not connected');
       }
            $con=  mysqli_query($conn, "SELECT * FROM order_details WHERE customer_id = $cust_id ORDER BY id DESC;");


?>


<div class="container">
	<section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                            	<br><br>
                                <h4>Your Orders</h4><hr>
                                

                                
                            </div>

                            <div class="main_portfolio_content" style="overflow-x: scroll;">
                            <div  style="overflow-x:auto;">
                                <table class="table table-hover menuTable">
                                    <thead>
                                      <tr>
                                        <th width="100" >Status</th>
                                        <th>Order Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Qty.</th>
                                        <th>Bill</th>
                                        <th>date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                             while($row=  mysqli_fetch_array($con))
                                             {
                                                
                                                   ?>
                                            <tr>
                                                <td>
                                                  <?php 
                                                      if($row['status']=="pending")
                                                      {
                                                        echo '<a class="btn btn-warning">pending</a>';
                                                        
                                                      }
                                                      if($row['status']=="delivered")
                                                      {
                                                        echo '<a class="btn btn-success">delivered</a>';
                                                        
                                                      }
                                                      if($row['status']=="cancelled")
                                                      {
                                                        echo '<a class="btn btn-danger">cancelled</a>';
                                                      }
                                                      if($row['status']=="confirmed")
                                                      {
                                                        echo '<a class="btn btn-info">confirmed</a>';
                                                      }
                                                  //echo $row['status'];
                                                  ?>
                                                    
                                                  </td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td>
                                                  <?php
                                                  $food_id = $row['food_id'];
                                                    include("plugins/db-connect.php");
                                                    $sql = "SELECT * FROM food WHERE id = '$food_id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $data  = mysqli_fetch_array($result);
                                                    if(is_array($data)) {
                                                      $food_image = $data['image_name'];
                                                    ?>
                                                    <img src="../assets/images/<?php echo $food_image; }?>"  class="foodImage">
                                                </td>
                                                <td><?php echo $row['food_name']; ?></td>
                                                <td><?php echo $row['food_price']; ?></td>
                                                <td><?php echo $row['food_qty'] ;?></td>
                                                <td><?php echo $row['total_price']; ?></td>
                                                <td><?php echo $row['order_date']; ?></td>
                                                  
                                                
                                            </tr>
                                        <?php
                                             }
                                             ?>
                                             
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
<?php
include 'footer.php';
?>