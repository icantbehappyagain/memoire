<?Php

// الاتصال مع قاعدة البيانات

$conn = mysqli_connect('localhost:3307','root','root','memoire');
if(!$conn){
    echo 'Error:'. mysqli_connect_error();
}



?>

