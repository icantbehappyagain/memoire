<?php 
session_start();
// add product to the cart
if (!isset($_SESSION['user']) || $_SESSION['user'][0]['is_admin'] != 1)
{ 
	header('location: ../form.php');
}

if (isset($_POST['name'])
    && isset($_POST['price'])
	&& isset($_POST['description'])
	&& isset($_FILES['img'])
) {
    // assigne variables 
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$image_path = "pics/".$_FILES['img']['name'];
    
    //move file to img folder 
    if(!move_uploaded_file($_FILES['img']['tmp_name'],dirname (__FILE__)."\\..\\pics\\".$_FILES['img']['name']))
        die('failed to move file');
    // connect to database
    $link=mysqli_connect('localhost','root','','memoire') or die('erorr');
    //insert new product to database
    $tab="INSERT INTO product (name,price,description,image_path)
		values ('$name','$price','$description','$image_path');";
    if (mysqli_query($link,$tab)) {
        header('location: index.php');
    }else echo mysqli_error($link);	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styl.css">


	<title>forma</title>

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
	<form method="POST" enctype="multipart/form-data"  class="add">
		<fieldset class="fadd">
			<label class ="ladd">Name of product:</label>
			<input class="iadd" type="text" name="name"><br>

			<label class ="ladd">Price of product:</label>
			<input class="iadd" type="number" min="1" name="price"><br>

			<label class ="ladd" >Description of product:</label>
			<input class="iadd" type="text" name="description"><br>

			<label class ="ladd">Add image:</label>
			<input  class="iadd"type="file" name="img"><br>
			<button class="bt" type="submit"> Add product</button>
		</fieldset>
	</form>

</body>
</html>