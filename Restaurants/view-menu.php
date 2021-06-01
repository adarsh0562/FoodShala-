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
            $conn=  mysqli_query($conn, "SELECT * FROM food WHERE rest_id = '$id'");
       ?>
<div class="container viewMenu" style="overflow: scroll;overflow-y: hidden;">
  <h1>MENU</h1><hr>
  <table class="table table-hover menuTable">
    <thead>
      <tr>
      	<th>Dish Image</th>
        <th>Dish Name</th>
        <th>Dish Price</th>
        <th>Dish Desc</th>
        <th>Dish type</th>
      </tr>
    </thead>
    <tbody>
      <?php

             while($row=  mysqli_fetch_array($conn))
             {
                 ?>
            <tr>
                <td><img src="../assets/images/<?php echo $row['image_name']; ?>" class="foodImage"></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['description'] ;?></td>
                <td>
                  
                    <img src="../assets/images/<?php
                     if($row['food_type']=="veg"){
                      echo "veg.jpg";
                     }else{
                      echo "nonveg.jpg";
                     }
                    ?>"class="vegIcon">
                  </td>
                
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
