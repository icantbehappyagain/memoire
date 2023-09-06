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
        <h1>e<span style="color:#054940;">X</span>pert<span style="color: #054940;">one</span></h1>
        </div>
    <!-- <a href="#"><img src="logo.png" class="logo"></a> -->
    <div>
        <ul class="nav">
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
             <div class="container">
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
        </div>
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