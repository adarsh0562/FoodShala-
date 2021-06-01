<?php
include 'header.php';
include 'navbar.php';
         $cust_id = $_SESSION['cust_id'];
// include("plugins/login-check.php");

?>
<?php
    include("plugins/db-connect.php");
    
        if(!$conn)
        {
            die('not connected');
        }
        $conn=  mysqli_query($conn, "SELECT * FROM food");
?>
<div class="container">
	<section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                            	<br><br>
                                <h4>All Available Dishes</h4>
                                <h3>Hungary???</h3>

                                
                            </div>

                            <div class="main_portfolio_content">
                                <?php
                                while($row=  mysqli_fetch_array($conn))
                                    {

                                    ?>

                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    
                                        <img src="../assets/images/<?php echo $row['image_name']; ?>" alt="" class="food_images"/>
                                        <div class="portfolio_images_overlay text-center">
                                            <h6><?php echo $row['title']; ?></h6>
                                            <p class="product_price" style="font-size: 32px;"><i class="fa fa-inr"></i>
                                                <?php echo $row['price']; ?></p>
                                                <a href="order.php?food_id=<?php echo $row['id']; ?>" class="btn btn-primary">order</a>
                                            <a href="related_restaurants.php?rest_id=<?php echo $row['rest_id']; ?>" class="btn btn-primary" style="margin-top: 10px;">visit Restaurant</a><br>
                                            
                                            
                                        </div>
                                    
                                </div>
                                <?php
                                 }
                                 ?>
                                
                                                              
                                
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