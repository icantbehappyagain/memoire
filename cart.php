<?php
include 'config.php';
session_start();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
    die;
}
$cart_products = "";
$cart_total=0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cart_products = implode(",", $_SESSION['cart']);

    $hostname = 'localhost:3307';
    $username = 'root';
    $password = 'root';
    
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



// اذا ضغط على الزر تم

if (isset($_POST['submit'])){

    $product =               mysqli_real_escape_string($conn ,$_POST['product']);
    $client =                mysqli_real_escape_string($conn ,$_POST['client']);
    $phone =                 mysqli_real_escape_string($conn ,$_POST['phone']);
    $address =               mysqli_real_escape_string($conn ,$_POST['address']);
    $total =                 mysqli_real_escape_string($conn ,$_POST['total']);
    
    $sql = "SELECT * FROM orders ";
    $result = mysqli_query($conn, $sql);

  $sql = "INSERT INTO `orders` ( product , client , phone  , address , total) 
  VALUES( '$product' , '$client' , '$phone' , '$address' ,'$total' ) ";
  $result = mysqli_query($conn, $sql) ;


       if($result){
        echo '<script>alert("Order sent succesfully!!");</script>';

      }else{

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
    <link rel="stylesheet" href="css/order.css">

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
            <li><a href="index.php"> Acceuil</a></li>
            <li><a href="products.php">Produits</a> </li>
            <li><a href="about.html"> à propos</a></li>
            <li><a href="contact.php"> Contact</a></li>
            <li><a class="active"  href="cart.php" class="bot"><i class="fa-solid fa-cart-plus"></i></a></li>
            <li><a href="logout.php">Logout</a></li>
       </ul>
    </div>
    
</section>

		<!-----------cart----------->



<div class="weet-t1">

    

<div class="wrapper">
                <?php if (isset($products) && count($products) > 0) { ?>
                    <?php foreach ($products as $product) { ?>
        <div class="shop">
                <div class="box">
                    <img src="<?= $product['image_path'] ?>">
                    <div class="content">
                        <h3><?= $product['name'] ?></h3>
                        <h4>Price: $<?= $product['price'] ?></h4>
                        <p class="unit">Quantity: <input name="quantity[<?= $product['id'] ?>]" value="1"></p>
                        <p class="btn-area"><a href="?remove=<?= $product['id'] ?>" class="btn2">Remove</a></p>
                    </div>
                </div>
        </div>
        <?php
                $cart_total += $product['price'];
                $cart_name += $product['name'];
            }
            ?>
        <?php
			} else {
				echo "
				<center>
				<h1>Your cart is empty </h1></center>
				";
			}
			?>
</div>              

	<!-- code here -->
	<div class="card-p">
		<div class="card-image">	
			<h2 class="card-heading">
        Total is $<?= $cart_total ?>
			</h2>
		</div>
		<form class="card-form" action="" method="POST">
        <input type="hidden" name="total" class="input-field" value="<?= $cart_total ?> Da" />
        <input type="hidden" name="product" class="input-field" value="<?= $product['name'] ?>" />

			<div class="input">
				<input type="text" name="client" class="input-field" value="" required/>
				<label class="input-label">Full name</label>
			</div>
						<div class="input">
				<input type="number" name="phone" class="input-field" value="" required/>
				<label class="input-label">Phone Number</label>
			</div>
						<div class="input">
				<input type="text" name="address" class="input-field" required/>
				<label class="input-label">Address</label>
			</div>
			<div class="action">
				<button name="submit" class="action-button">Submit</button>
			</div>
		</form>
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
  