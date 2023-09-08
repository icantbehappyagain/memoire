<?php
session_start();
include('config.php');

// add product to the cart
if (isset($_POST['product_id'])) {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $_SESSION['cart'][$_POST['product_id']] = $_POST['product_id'];
    echo '<script>alert("Product added succesfully!!");</script>';
}

$connect =mysqli_connect('localhost:3307','root','root','memoire');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <section class="header">
        <div class="logo">
            <h1>eXpertone</h1>
            </div>
        <!-- <a href="#"><img src="logo.png" class="logo"></a> -->
        <div>
            <ul class="nav">
                 <li><a href="index.html"> Acceuil</a></li>
                 <li><a href="products.php">Produits</a>  <!--  <ul class="submenu">
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

    
   
<section class="pro">

<?php 
$id=      $_GET['id'];
$id =     mysqli_real_escape_string($conn ,$id);
$id =     htmlentities($id);
    $sql = "SELECT * FROM product WHERE id = $id limit 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){  
    ?>
    <div class="col4">
            <img src="<?php echo $row['image_path'];?>">
        <div class="weet-info">
            <h4><?php echo $row['name'];?></h4>
            <hr class="hr">
            <p>Marque : expertones</p>
            <p><?php echo $row['description'];?></p>
            <p class="price"><?php echo $row['price'];?> DA</p>
            <p class="weet-small-t">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint illo corrupti dolorem a id expedita consequatur, architecto illum dolore minus quasi nostrum aliquid qui quia, dicta tempore quae. Amet.</p>
        </div>
        <div class="weet-info-2">
            <h2>Order</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint illo corrupti dolorem a id expedita consequatur, architecto illum dolore minus quasi nostrum aliquid qui quia, dicta tempore quae. Amet.</p>
            <hr class="weet-hr">
            <p>livraison 58 wilaya is Available </p>
            <form action="" method="post">
 
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button type="submit" class="btn"> add to cart</button>
                    </form>
        </div>
    </div>
</div>
<?php                 
  }
  }
  ?>  
</section>
    

<!--LAST PART | START-->
<footer class="footer">
    <div id="contact"></div>
    <div class="container1">
                 <div class="footer-col-left">
      <h1>Expertone</h1>.com            
      <p>001 Rue AADL ,  Road National 1 Laghouat 03000<br> <br>
        We are a company specialized in the field of cosmetics and skin care products. learn more about us from <a href="about-us.php">here</a></p>
               </div>
        <div class="row1">

            <div class="footer-col">
                <h4>company</h4>
                <ul>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about-us.php">about us</a></li>
                    <li><a href="our-services.php">our services</a></li>
                    <li><a href="terms.php">terms of use</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                 <li><a href="help.php">Help center</a></li>
                 <li><a href="faq.php">FAQ</a></li>
                 <li><a href="how-to-use.php">How to use</a></li>
                 <li><a href="payment.php">payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>community</h4>
                <ul>
                 <li><a href="general.php">general</a></li>
                 <li><a href="team.php">Our Team</a></li>
                 <li><a href="partners.php">partners</a></li>
                 <li><a href="jobs.php">jobs</a></li>
                </ul>
            </div>
            <div class="footer-col-social">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
                    <a href="#"> <i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/213658478777"> <i class="fab fa-whatsapp"></i></a>
                </div>
                <p>Email: info@expertone.com <br>
                    phone: +213 658478777
                </p>
            </div>
        </div>
    </div>
</footer>
<!--LAST PART | END-->  

 <script src="js/try.js"></script>

</body>
</html>
  
</body>
</html>