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
	$image_path = "img/".$_FILES['img']['name'];
    
    //move file to img folder 
    if(!move_uploaded_file($_FILES['img']['tmp_name'],dirname (__FILE__)."\\..\\img\\".$_FILES['img']['name']))
        die('failed to move file');
    // connect to database
    $link=mysqli_connect('localhost','root','','expertone') or die('erorr');
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
    <link rel="stylesheet" type="text/css" href="admin/styl.css">
	<title>forma</title>

</head>
<body>
	<div class="container">
<div class="admin-product-form-container centered">

	<form method="POST" enctype="multipart/form-data">
		<fieldset>
			<label>Name of product:</label>
			<input type="text" name="name"><br>

			<label>Price of product:</label>
			<input type="number" min="1" name="price"><br>

			<label>Description of product:</label>
			<input type="text" name="description"><br>

			<label>Add image:</label>
			<input type="file" name="img"><br>
			<button type="submit"> Add product</button>
		</fieldset>
	</form>
</div>
</div>
</body>
</html>