<?php
include('connexion.php');
session_start();
$cart_products = "";
$cart_total=0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cart_products = implode(",", $_SESSION['cart']);

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    
    // Create connection
        $connect = mysqli_connect($hostname ,$username ,$password, "memoire");
    
  
    

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
        <h1>eXpertone</h1>
        </div>
    <!-- <a href="#"><img src="logo.png" class="logo"></a> -->
    <div>
        <ul class="nav">
            <li><a class="active" href="index.php"> Acceuil</a></li>
            <li><a href="produits.php">Produits</a> </li>
            <li><a href="about.html"> à propos</a></li>
            <li><a href="form.php"> Contact</a></li>
            <li><a href="cart.php" class="bot"><i class="fa-solid fa-cart-plus"></i></a></li>
       </ul>
    </div>
    
</section>

		<!-----------cart----------->



    <div class="wrapper">
    <?php if (isset($products) && count($products) > 0) { ?>
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
           
             
           
                <a href="singin.php" class="btn">Acheter</a>
        
        </div>
        <?php
			} else {
				echo "
				<center>
				<h1>Your cart is empty </h1></center>
				";
			}
			?>
    </div>
</div>


<!--LAST PART | START-->
<footer class="footer">
    <div id="contact"></div>
    <div class="container1">
                 <div class="footer-col-left">
      <h1>Expertone</h1>.com            
      <p>Entreprise d'Expert One ,city El-akhwa  djelly,Rue N8 Eucalyptus -alger<br> <br>
        Nous sommes une entreprise spécialisée dans le domaine des cosmétiques et des produits de soins de la peau. Apprenez-en davantage sur nous grâce à <a href="aboutus.php">ici</a></p>
               </div>
        <div class="row1">

            <div class="footer-col">
                <h4>Entreprise</h4>
                <ul>
                    <li><a href="index.html">Accuiel</a></li>
                    <li><a href="about.html">A propose</a></li>
                    <li><a href="produits.php">nos services</a></li>
                
                </ul>
            </div>
            <div class="footer-col">
                <h4>obtenir de l'aide</h4>
                <ul>
                 <li><a href="about.html">Help center</a></li>
                 <li><a href="faq.php">FAQ</a></li>
                 <li><a href="about.html">options de paiement</a></li>
                </ul>
            </div>
      
            <div class="footer-col-social">
                <h4>Suivez-nous</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100063640342753"> <i class="fab fa-facebook-f"></i></a>    
                    <a href="mailto:expert.one.cos@gmail.com"><i class="far fa-envelope"></i></a>
                    <a href="https://wa.me/213662162422"> <i class="fab fa-whatsapp"></i></a>
                </div>
                <p>Email: expert.one.cos@gmail.com <br>
                    phone: +213 662 16 24 22
                </p>
            </div>
        </div>
    </div>
</footer>
<!--LAST PART | END-->  

 <script src="js/try.js"></script>

</body>
</html>
  