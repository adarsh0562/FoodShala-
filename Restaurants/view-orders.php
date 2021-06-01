<?php
include 'dash.php';
?>
<?php
  include("plugins/db-connect.php");
$id = $_SESSION['rest_id'];      
        if(!$conn)
       {
           die('not connected');
       }
            $con=  mysqli_query($conn, "SELECT * FROM order_details WHERE rest_id = '$id'and status<>'delivered' ORDER BY id DESC ");

?>


<div class="container viewMenu" style="overflow: scroll;overflow-y: hidden;">
  <h1>Orders</h1><hr>
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
        <th>Time</th>
        <th>Cust_Name</th>
        <th>Cust_Contact</th>
        <th>Delivered To</th>
        <th></th>
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
                        $id = $row['id'];
                        echo '<a href="order_action.php?req=confirm&id='.$id.'" class="btn btn-success">confirm</a>';
                        echo '<a href="order_action.php?req=cancel&id='.$id.'" class="btn btn-danger" style="margin-top:10px;">Cancel</a>';
                      }
                      if($row['status']=="confirmed")
                      {
                        $id = $row['id'];
                        echo '<a href="order_action.php?req=deliver&id='.$id.'" class="btn btn-success">Mark Delivered</a>';
                      }
                      if($row['status']=="cancelled")
                      {
                        $id = $row['id'];
                        echo '<a class="btn btn-danger">cancelled</a>';
                      }
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
                <td><?php echo $row['order_timing'] ;?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['customer_contact']; ?></td>
                <td><?php echo $row['customer_address'] ;?></td>                
                  
                
            </tr>
        <?php
             }
             ?>
             
    </tbody>
  </table>
</div>

<?php

include 'footer.php';
?>