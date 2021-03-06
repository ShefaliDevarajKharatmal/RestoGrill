<?php

session_start();
    require_once('./component_menu.php');
    require_once ('./CreateDb.php');


$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>





<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> 

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header>
    <a href="index.php" class="logo"><i class="fas fa-utensils"></i>RestoGrill</a>
    <nav class="navbar">
        <a href="index.php#home">home</a>
        <a href="index.php#about">about</a>
        <a href="index.php#menu">menu</a>
        <a href="index.php#review">review</a>
       
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
        <a href="#" class="fas fa-shopping-cart">
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






<div class="container">
	<h1></h1>
	<div class="cart">
		<div class="products">
			<?php
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['product_id'] == $id){
                                    cartElement($row['product_name'], $row['product_price'], $row['product_id'],  $row['product_v'], $row['product_img']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }
            ?>
		</div>


		<div class="cart-total">
			
			<p style="font-size:17px">
				<span>Number of Items</span>
				<?php
                    if (isset($_SESSION['cart'])){
                        $countcart  = count($_SESSION['cart']);
                        echo "$countcart";
                    }else{
                        echo "0";
                    }
                ?>
			</p>

			<p style="font-size:17px">
				<span>Subtotal</span>
				???<?php 
                echo number_format((float)($total), 2, '.', ''); 
                ?>
			</p>

			<p style="font-size:17px">
				<span>GST</span>

				<span>???<?php 
             
                echo number_format((float)($total * 0.05), 2, '.', '');
                ?></span>
			</p>
			<p style="font-size:25px">
				<span>Total</span>
				<span>??? <?php 
                echo number_format((float)($total + ($total * 0.05)), 2, '.', '');
                ?></span>
			</p>






			<a href="checkout.php"><h1>Proceed to Checkout</h1></a>
		</div>





	</div>
</div>

</body>
</html>
