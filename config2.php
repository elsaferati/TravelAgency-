<?php

$server = "localhost"; // Change this if MySQL is running on a different host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "userinfo"; 
$port = "3306";

$conn = mysqli_connect($server, $username, $password, $database,$port);
if (!file_exists(__DIR__ . '/config2.php')) {
    die("Error: config2.php not found!");
}

?>