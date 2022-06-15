<?php

session_start();
    require_once('./component_menu.php');

    require_once ('./CreateDb.php');

    $database = new CreateDb("Productdb", "Producttb");


if (isset($_POST['add'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $countcart = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],

            );

            $_SESSION['cart'][$countcart] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id'],

        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}








if (isset($_POST['like'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['favs'])){

        $item_array_id = array_column($_SESSION['favs'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in favorites..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
            $countfavs = count($_SESSION['favs']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
            );

            $_SESSION['favs'][$countfavs] = $item_array;
        }

    }else{
        $item_array = array(
                'product_id' => $_POST['product_id'],
        );

        // Create new session variable
        $_SESSION['favs'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestoGrill</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>RestoGrill</a>

    <nav class="navbar">
        <a class = "active" href="#home">home</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#review">review</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="favs.php" class="fas fa-heart">
        <?php

            if (isset($_SESSION['favs'])){
                $countfavs = count($_SESSION['favs']);
                echo "<span id=\"favs_count\" class=\"text-warning bg-light\">$countfavs</span>";
            }else{
                    echo "<span id=\"favs_count\" class=\"text-warning bg-light\">0</span>";
            }
        ?>
        </a>

        <a href="cart.php" class="fas fa-shopping-cart">
        <?php

            if (isset($_SESSION['cart'])){
                $countcart = count($_SESSION['cart']);
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$countcart</span>";
            }else{
                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }
        ?>
        </a>  
    </div>

</header>

<!-- header section ends-->

<!-- search form  -->

<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>Bang Bang Cauliflower</h3>
                    <p>Crispy baked cauliflower pieces smothered in a spicy, creamy bang bang sauce. A delicious vegetarian appetizer, lunch or party food!</p>
                    <form action="index.php" method="post">
                    <button type = "submit" class = "btn btn-warning my-1" name = "add">Order
                    <input type='hidden' name='product_id' value='1'>
                </div>
                <div class="image">
                    <img src="food_images/Veg_Starters/dish1.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>Egg Curry</h3>
                    <p>Egg curry is a comforting Indian dish of curried eggs. It is basically made with hard boiled eggs, onions, tomatoes, whole & ground spices and herbs. Egg curry is made in several ways, with recipes varying by state and even by family.</p>
                    <form action="index.php" method="post">
                    <button type = "submit" class = "btn btn-warning my-1" name = "add">Order
                    <input type='hidden' name='product_id' value='32'>
                </div>
                <div class="image">
                    <img src="food_images/Main_Course/dish6.jpg" alt="">










                    
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>Mango Ice-Cream waffles</h3>
                    <p>Mangoes impart a lucious creamy texture and rich flavour to this delicious frozen dessert. Waffles are cooked until they become golden-brown in color, with a crispy outer texture and a soft interior.</p>
                    <form action="index.php" method="post">
                    <button type = "submit" class = "btn btn-warning my-1" name = "add">Order
                    <input type='hidden' name='product_id' value='40'>
                </div>
                <div class="image">
                    <img src="./food_images/Dessert/dish1.jpg" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->


<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="food_images/aboutpic.jpg" alt="">
        </div>

        <div class="content">
            <h3>best food in the country</h3>
            <p>Our technology platform connects customers, restaurant partners and delivery partners, serving their multiple needs. Customers use our platform to search and order amazing food.</p>
            <p>On the other hand, we provide restaurant partners with industry-specific marketing tools which enable them to engage and acquire customers to grow their business.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

    <h2 class="heading"> Veg Starters </h2>

    <div class="box-container"> 
    <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result) ){
            if($row['product_id']>=0 && $row['product_id']<=14)
            component_menu($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
        }
    ?>
    </div>
    <p> 
        '
    </p>

    <h2 class="heading"> Non-Veg Starters </h2>

    <div class="box-container"> 
    <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result) ){
            if($row['product_id']>=15 && $row['product_id']<=19)
            component_menu($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
        }
    ?>
    </div>

    <p> 
       '
    </p>

    <h2 class="heading"> Soup </h2>

    <div class="box-container"> 
    <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result) ){
            if($row['product_id']>=20 && $row['product_id']<=26)
            component_menu($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
        }
    ?>
    </div>

    <p> 
        '
    </p>

    <h2 class="heading"> Main Course</h2>

    <div class="box-container"> 
    <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result) ){
            if($row['product_id']>=27 && $row['product_id']<=39)
            component_menu($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
        }
    ?>
    </div>

    <p> 
        '
    </p>

    <h2 class="heading"> Dessert </h2>

    <div class="box-container"> 
    <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result) ){
            if($row['product_id']>=40)
            component_menu($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
        }
    ?>
    </div>
</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="review_1.jpg" alt="">
                    <div class="user-info">
                        <h3>Rahul Malhotra</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p>Although, I have never been to the restaurant, the online order placing service is very good. It is certainly one of the best food providers with the service of home delivery, that too with an option of cash on delivery.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="review_1.jpg" alt="">
                    <div class="user-info">
                        <h3>Mohan Bhargava</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>I ordered chicken, mutton, paneer dishes with some dal and raita. All the dishes were good. The gravy of paneer and soya chaap was very good. Overall, in budget and quality food, no compromise with taste.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="review_1.jpg" alt="">
                    <div class="user-info">
                        <h3>Aman Mathur</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>The pasta and pizza are delicious! The breakfast menu is equally varied. I could have ordered at least 6 items on the menu. The service is great, prices are reasonable.</p>
            </div>

        

        </div>

    </div>
    
</section>

<!-- review section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">


        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+91-987654321</a>
            <a href="#">restogrill@gmail.com</a>
            <a href="#">bangalore, india - 560064</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
            <a href="#">linkedin</a>
        </div>

    </div>


</section>

<!-- footer section ends -->

<!-- loader part  -->

<div class="loader-container">
    <img src="food_images/loader2.gif" alt="">
</div>




















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>