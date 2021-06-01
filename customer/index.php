<?php
include 'header.php';
include 'navbar.php';
?>

<?php
    include("plugins/db-connect.php");
         
        if(!$conn)
        {
            die('not connected');
        }
        $conn=  mysqli_query($conn, "SELECT * FROM food");
?>

        <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1>FoodShala</h1>
                                    <p class="w3-text-white">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. </p>
                                    <a href="#portfolio" type="button" class="btn-lg">Start Order</a>
                                </div>
                            </div>	
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <img src="assets/images/ab.png" alt="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4>About us</h4>
                                <h3>WE ARE TASTY</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan</p>

                                <p>dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettingdard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>

                                <a href="" class="btn btn-primary">click here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <h4>Delightful</h4>
                                <h3>Experience</h3>
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

        



<?php
include 'footer.php';
?>