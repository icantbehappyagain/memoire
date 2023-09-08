<?php
session_start();
$success = "";
$login = "";
// todo: get the user login from the session

if (
	!empty($_POST['email'])
	&& !empty($_POST['password'])
	&& !empty($_POST['firstname'])
	&& !empty($_POST['type'])
	&& $_POST['type'] == 'singin'
) {
    $hostname = 'localhost';
    $username = 'root';
    $password = '';

	// Create connection
    $connect =mysqli_connect($hostname, $username, $password, "memoire");

	// Check connection
	if (!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$email = $_POST['email'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];

	// Insert data into table
	$sql = "INSERT INTO user (email, fullname, password) 
		VALUES ('$email','$firstname','$password')";
	if (mysqli_query($connect, $sql)) {
		$success = "New record created successfully";

	} else {
		$success = "There was an error : ". mysqli_error($connect);
	}	header('location:produits.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/985aa39e17.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>form</title>
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
<section class="fr">
    <style>
         .fr{      
         
            background-image: url('pics/bg4.png');
            background-repeat: no-repeat;
            background-size: 27%;
            background-position: left;
        }

    </style>
    <div class="smth">
    <form method="POST" action="" >
        <h1>Inscription</h1> 
        <div class="box">
            <input type="text" name="firstname" placeholder="Full Name" ><i class="fa-regular fa-user"></i>
        </div>
        <div class="box">
            <input type="text" name="email" placeholder="Email"><i class="fa-regular fa-user"></i>
        </div>
        <div class="box">
            <input type="password" name="password" placeholder="Mot de Passe" ><i class="fa-solid fa-lock"></i>
        </div>
       
        <input type="hidden" name="type" value="singin">
     <button type="text" class="btn2">Insecrire</button><strong><?= $success ?></strong>
     <div class="reg">
        <p>vous n'avez pas de compte ?
        <a href="form.php">connexion </a></p>
     </div>
    </form>
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
  