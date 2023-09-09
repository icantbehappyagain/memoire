<?Php

// الاتصال مع قاعدة البيانات

$conn = mysqli_connect('localhost:3307','root','root','memoire');
if(!$conn){
    echo 'Error:'. mysqli_connect_error();
}

$client =         $_POST['client'];
$email =         $_POST['email'];
$product =         $_POST['product'];
$phone =         $_POST['phone'];
$address =         $_POST['address'];
$total =         $_POST['total'];
$password =         $_POST['password'];





?>

