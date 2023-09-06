<?php
@include('connexion.php'); 
session_start();
$cart_products = "";
$cart_total=0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cart_products = implode(",", $_SESSION['cart']);

// Create connection
    $connect = mysqli_connect($hostname ,$username ,$password, "memoire");

    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }


    // Your existing code to fetch products from the 'product' table
    $sql = "SELECT * FROM product WHERE id IN ($cart_products)";
    $resultat = mysqli_query($connect, $sql);
    $products = $resultat->fetch_all(MYSQLI_ASSOC);

    // Your code for adding orders to the database here
    if (isset($_POST['cart']) && isset($_SESSION['user'])) {
        $user_id = $_SESSION['user'][0]['id'];
        $order = "INSERT INTO orders (id_user,datep) VALUES ($user_id, NOW())";
        if (mysqli_query($link, $order)) {
            $cart_array = explode(",", $cart_products);
            foreach ($cart_array as $key => $value) {
                // Your code here to add items to the order_product table
            }
            $_SESSION['cart'] = [];
        } else {
            die("error: " . mysqli_error($link));
        }
    }

    // Your code for removing items from the cart here
    if (isset($_GET['remove'])) {
        unset($_SESSION['cart'][$_GET['remove']]);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>

<section class="header">
    <div class="logo">
        <h1>e<span style="color:#054940;">X</span>pert<span style="color: #054940;">one</span></h1>
        </div>
    <!-- <a href="#"><img src="logo.png" class="logo"></a> -->
    <div>
           <ul class="nav">
             <li><a class="active" href="index.html"> Acceuil</a></li>
             <li><a href="produits.php">Produits</a> <!--  <ul class="submenu">
        <li><a href="#">Product 1</a></li>
        <li><a href="#">Product 2</a></li>
        <li><a href="#">Product 3</a></li>
      </ul> --></li>
             <li><a href="about.php"> à propos</a></li>
             <li><a href="form.php"> Contact</a></li>
             <li><a href="cart.php" class="bot"><i class="fa-solid fa-cart-plus"></i></a></li>
        </ul>
    </div>
    
</section>
		<!-----------cart----------->



    <div class="wrapper">
    <h1>Shopping Cart</h1>
    <div class="project">
        <div class="shop">
            <?php foreach ($products as $product) { ?>
                <div class="box">
                    <img src="<?= $product['image_path'] ?>">
                    <div class="content">
                        <h3><?= $product['name'] ?></h3>
                        <h4>Price: $<?= $product['price'] ?></h4>
                        <p class="unit">Quantity: <input name="quantity[<?= $product['id'] ?>]" value="1"></p>
                        <p class="btn-area"><a href="?remove=<?= $product['id'] ?>" class="btn2">Remove</a></p>
                    </div>
                </div>
            <?php
                $cart_total += $product['price'];
            }
            ?>
        </div>
        <div class="right-bar">
            <p><span>Subtotal</span> <span>$<?= $cart_total ?></span></p>
            
            <hr>
            <p><span>Total</span> <span>$<?= $cart_total ?></span></p>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Checkout</a>
            <?php } else { ?>
                <a href="singin.php" class="btn">Acheter</a>
            <?php } ?>
        </div>
    </div>
</div>

	<!-- FOOTER-->

        <script src="js/try.js"></script>

<footer class="footer-section">
       
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                             <a href="index.html"><h1>e<span style="color:#054940;">X</span>pert<span style="color: #054940;">one</span></h1></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                                            </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                   
                        </div>
                    </div>
                </div>
            </div>
             <!-- <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>1010 Avenue, sw 54321, chandigarh</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>9876543210 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>mail@info.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2018, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a></p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
  