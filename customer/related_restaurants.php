<?php
include 'header.php';
include 'navbar.php';
$rest_id = $_GET['rest_id'];
    include("plugins/db-connect.php");
         
        if(!$conn)
        {
            die('not connected');
        }
        $conn=  mysqli_query($conn, "SELECT * FROM restaurant WHERE restaurant_id='$rest_id'");
        $row=  mysqli_fetch_array($conn);
?>
<div class="container-fluid">
    <section id="portfolio" class="portfolio" style="margin-bottom: -200px;">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 restaurantLogo">
                                                <img src="../assets/images/<?php echo $row['restaurant_logo']; ?>">
                                            </div>
                                        <div class="col-md-8 restaurantDetails">
                                            
                                            <h1><?php echo $row['restaurant_name']; ?></h1>
                                            
                                            <img src="
                                                <?php
                                                    if($row['restaurant_type']=="veg"){
                                                        echo '../assets/images/veg.jpg';
                                                        }else{
                                                            echo '../assets/images/nonveg.jpg';
                                                        }
                                                 ?>"
                                                 class="vegIcon"> <span>5.0 &nbsp;<i class="fa fa-star"></i> Ratings</span><br>
                                            <p>Time : <?php echo $row['restaurant_openTime'].' To '.$row['restaurant_closeTime']; ?> </p>
                                            <p style="margin-top: -10px;margin-bottom: 0px;"><?php echo $row['restaurant_place']; ?></p>
                                            <p class="w3-large"><?php echo $row['restaurant_desc']; ?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    include("plugins/db-connect.php");
         
        if(!$conn)
        {
            die('not connected');
        }
        $conn=  mysqli_query($conn, "SELECT * FROM food WHERE rest_id='$rest_id'");
?>
	<section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                            	<br><br>
                                <h4>All Available Dishes</h4>
                                <h3>Hungry???</h3>
                            </div>

                            <div class="main_portfolio_content">
                                <?php
                                while($row=  mysqli_fetch_array($conn))
                                    {

                                    ?>

                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    
                                        <img src="../assets/images/<?php echo $row['image_name']; ?>" alt="" class="food_images" style="width: 350px;"/>
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
        <section id="ourPakeg" class="ourPakeg">
            <div class="container">
                <div class="main_pakeg_content">
                    <div class="row">
                        <div class="head_title text-center">
                            <h4>Amazing</h4>
                            <h3>Delicious</h3>
                        </div>

                        <div class="single_pakeg_one text-right wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Drinks</h4>
                                    </div>

                                    <ul>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_two text-left wow rotateInDownLeft">
                            <div class="col-md-6 col-sm-8">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Main course </h4>
                                    </div>

                                    <ul>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_three text-left wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Desserts</h4>
                                    </div>

                                    <ul>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                        <li> Tuna Roast Source.........................................$24.5 </li>
                                    </ul>
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