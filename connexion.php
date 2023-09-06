<?php
// Define database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'memoire';

// Create a database connection
$link = mysqli_connect($hostname, $username, $password);

// Check if the connection was successful
if (!$link) {
    die('Error: Unable to connect to the database.');
}

// Create the database if it doesn't exist
$req = 'CREATE DATABASE IF NOT EXISTS ' . $database;
if (mysqli_query($link, $req)) {
    echo 'Database is created.' . '<br>';
} else {
    echo mysqli_error($link);
}

// Switch to the 'expertone' database
mysqli_select_db($link, $database);

// Define a function to execute SQL queries and handle errors
function executeQuery($link, $query, $successMessage) {
    if (mysqli_query($link, $query)) {
        echo $successMessage;
    } else {
        echo mysqli_error($link);
    }
}

// Create the 'order' table
$tab = 'CREATE TABLE IF NOT EXISTS `order` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `id_user` int NOT NULL,
    `datep` date NOT NULL
)';
executeQuery($link, $tab, 'Table order is created.' . '<br>');

// Create the 'order_has_product' table
$tab = 'CREATE TABLE IF NOT EXISTS `order_product` (
    `id_product` int NOT NULL,
    `id_order` int NOT NULL,
    `quantity` int NOT NULL
)';
executeQuery($link, $tab, 'Table order_product is created.' . '<br>');

// Create the 'user' table
$tab = 'CREATE TABLE IF NOT EXISTS `user` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `fullname` varchar(50) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `is_admin` tinyint(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
)';
executeQuery($link, $tab, 'Table user is created.' . '<br>');

// Insert the first user
$user = "INSERT IGNORE INTO `user` 
    (`fullname`, `email`, `password`, `is_admin`) VALUES
    ('admin', 'admin@gmail.com', 'admin', 1)";
executeQuery($link, $user, 'First user is created.' . '<br>');

// Create the 'product' table
$tab = 'CREATE TABLE IF NOT EXISTS `product` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `price` int(11) NOT NULL,
    `description` text NOT NULL,
    `image_path` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
)';
executeQuery($link, $tab, 'Table product is created.' . '<br>');

// Close the database connection
mysqli_close($link);

 ?>
