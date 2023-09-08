<?Php

// الاتصال مع قاعدة البيانات

$conn = mysqli_connect('localhost','root','','memoire');
if(!$conn){
    echo 'Error:'. mysqli_connect_error();
}



?>

