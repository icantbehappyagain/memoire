<?php
include "config.php";

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
            <li><a class="active" href="index.php"> Acceuil</a></li>
            <li><a href="produits.php">Produits</a> </li>
            <li><a href="about.html"> à propos</a></li>
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
            <p>Marque : expertone</p>
            <p><?php echo $row['description'];?></p>
            <p class="price"><?php echo $row['price'];?> DA</p>
            <p class="weet-small-t">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint illo corrupti dolorem a id expedita consequatur, architecto illum dolore minus quasi nostrum aliquid qui quia, dicta tempore quae. Amet.</p>
        </div>
        <div class="weet-info-2">
            <h2>Order</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint illo corrupti dolorem a id expedita consequatur, architecto illum dolore minus quasi nostrum aliquid qui quia, dicta tempore quae. Amet.</p>
            <hr class="weet-hr">
            <p>livraison 58 wilaya is availble </p>
            <button class="btn">Add to Cart</button>
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
  