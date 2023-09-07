<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: form.php');
    die;
}

$products = [];
$hostname = 'localhost:3307';
$username = 'root';
$password = 'root';


// Create connection
    $connect = mysqli_connect($hostname ,$username ,$password, "memoire");

    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

$sql = "SELECT * FROM product ";

$resultat = mysqli_query($connect, $sql);

$products = $resultat->fetch_all(MYSQLI_ASSOC);
$resultat = mysqli_query($connect, $sql);

if (!$resultat) {
    die("MySQL Error: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Brand</h1>
        </div>
        <ul>
            <li><img src="dashboard (2).png" alt=""> <a href="index.php">&nbsp; <span>Commandes</span> </a></li>
              <li><img src="dashboard (2).png" alt=""   > <a href="add.php">&nbsp; <span>Ajouter</span> </a></li>
               <li><img src="dashboard (2).png" alt=""  > <a href="users.php">&nbsp; <span>Clients</span> </a></li>
			   <div style="height: 350px;"></div>
               <li > <a class="nav-link px-3" href="deconnect.php">Deconnecter</a></li>
          </ul>
    </div>
    <div class="container">
       
        <div class="content">
          
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                     
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>description</th>
                            <th>price</th>
                        </tr>
                    </thead>

                        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                <td><?= $product['id'] ?> </td>
                <td><?= $product['name'] ?> </td>
                <td><?= $product['description'] ?> </td>
                <td><?= $product['price'] ?> </td>
                
                </tr>
            <?php } ?>
          </tbody>
                    </table>
                </div>
              
            </div>
        </div>
    </div>
</body>

</html>