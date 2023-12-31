<?php
include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sty.css">
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
             <li><a href="products.php">Produits</a> <!--  <ul class="submenu">
        <li><a href="#">Product 1</a></li>
        <li><a href="#">Product 2</a></li>
        <li><a href="#">Product 3</a></li>
      </ul> --></li>
             <li><a href="about.php"> à propos</a></li>
             <li><a href="form.php"> Contact</a></li>
             <li><a href="cart.php" class="bot"><i class="fa-solid fa-cart-plus"></i></a></li>
             <li><a href="login.php"> Login</a></li>
        </ul>
    </div>
    
</section>
<section id="hero"> 
 <div class="container">
        <div id="slide">
            <div class="item" style="background-image: url(pics/1.jpg);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
            <div class="item" style="background-image: url(pics/4.jpg);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
            <div class="item" style="background-image: url(pics/3.jpg);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
            <div class="item" style="background-image: url(pics/4.jpg);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
            <div class="item" style="background-image: url(pics/8.png);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
            <div class="item" style="background-image: url(pics/9.jpg);">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button>See more</button>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
</section>
   

   





<section class="pro ">

    <div class="weet-title">
        <div class="weet-text">
            <h2>Produits populaires</h2>
            <hr class="hr center">
        </div>
        <a href="products.php">Voir plus de produits >></a>
    </div>
    <div class="row">
    <div class="carousel-container">
        <div class="carousel" id="carousel">
    <?php 
    $sql = "SELECT * FROM product limit 9";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){  
    ?>
            <a href="product.php?id=<?php echo $row['id'];?>" class="col4 card">
                <h4><?php echo $row['name'];?></h4>
                <img src="<?php echo $row['image_path'];?>">
                <p><?php echo $row['price'];?> DA</p>
            </a>
<?php                 
  }
  }
  ?>    
  </div>
</div>          
    <button class="carousel-button" onclick="prevSlide()"><</button>
    <button class="carousel-button" onclick="nextSlide()">></button> 
      </div>
</section>








<!-- <section class="pro ">

    <div class="weet-title">
        <div class="weet-text">
            <h2>Nouveaux Produits</h2>
            <hr class="hr center">
        </div>
        <a href="products.php">Voir plus de produits >></a>
    </div>
    <div class="row">
    <div class="carousel-container">
        <div class="carousel" >
    <?php 
    $sql = "SELECT * FROM product limit 4";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){  
    ?>
            <a href="product.php?id=<?php echo $row['id'];?>" class="col4 card">
                <h4><?php echo $row['name'];?></h4>
                <img src="<?php echo $row['image_path'];?>">
                <p><?php echo $row['price'];?> DA</p>
            </a>
<?php                 
  }
  }
  ?>    
   
  </div>
</div>          

      </div>
    <div id="banr">
        <a  href="products.php" class="btn">Voir plus de produits >></a>
    </div>
</section> -->




    


      





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
 <script src="script.js"></script>

</body>
</html>
  