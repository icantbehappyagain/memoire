<?php
include 'config.php';

session_start();

if(isset($_SESSION['email'])){
    header('Location: index.php');
    die;
}

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' limit 1";
    $result = mysqli_query($conn, $sql);
    
    if($result -> num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header("Location: index.php");
        die;
        } 

        else{
        }
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
             <li><a href="index.php"> Acceuil</a></li>
             <li><a href="products.php">Produits</a> <!--  <ul class="submenu">
        <li><a href="#">Product 1</a></li>
        <li><a href="#">Product 2</a></li>
        <li><a href="#">Product 3</a></li>
      </ul> --></li>
             <li><a href="about.php"> à propos</a></li>
             <li><a href="contact.php"> Contact</a></li>
             <li><a href="cart.php" class="bot"><i class="fa-solid fa-cart-plus"></i></a></li>
             <li><a class="active" href="login.php"> Login</a></li>

        </ul>
    </div>
     
</section>
<section class="fr">
    <style>
        .fr{      
         
            background-image: url('pics/bg.jpg');
            background-repeat: no-repeat;
            background-size: 30%;
            background-position: left;
        }

      
    </style>
<div class="smth">
    <form method="POST" action="" >
        <h1>connexion</h1>
        <div class="box">
            <input type="text" name="email" placeholder="email" ><i class="fa-regular fa-user"></i>
        </div>
        <div class="box">
            <input type="password" name="password" placeholder="mot de passe" ><i class="fa-solid fa-lock"></i>
        </div>
        <input type="hidden" name="type" value="login">
     <button type="text" name="submit" class="btn2">Connexion</button><strong><?= $login;?></strong>    
   
    </form>
  </div>
</section>
  

</body>
</html>