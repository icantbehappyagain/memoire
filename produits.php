<?php 
include('connexion.php');
session_start();
// add product to the cart
if (isset($_POST['product_id'])) {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $_SESSION['cart'][$_POST['product_id']] = $_POST['product_id'];
    echo '<script>alert("Product added succesfully!!");</script>';
}
$connect =mysqli_connect($hostname, $username, $password, "memoire");


$sql = "SELECT * FROM product ";

$resultat = mysqli_query($connect, $sql);

$products = $resultat->fetch_all(MYSQLI_ASSOC);

$resultat = mysqli_query($connect, $sql);

if (!$resultat) {
    die("MySQL Error: " . mysqli_error($connect));
}


?> 

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produits</title>
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
<section class="pro">
<div class="row">
			<h2 class="tit">Bienvinue</h2><style>.tit{	background-image:url(pics/h4.jpg) ;}</style>
			
		</div>
    <h2>Nouveaux Produits</h2>
    <p>nouvelle collection pour vous</p>
    <div class="row">
        <?php

            foreach ($products as $product) { ?>
                <div class="col4">
                    <form action="" method="post">
                        <img src="<?= $product['image_path'] ?>">
                        <h4><?= $product['name'] ?> </h4>
                       
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <p><?= $product['price'] ?> Da</p> 
                        <button type="submit" class="btn1"> add to cart</button>
                    </form>
                </div>
            <?php
            }
            ?>

        </div>
        
      
        </div>
    </section>

      

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
  