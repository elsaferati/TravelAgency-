

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "logindata";
$port = 3307;

$conn = new mysqli($host, $username, $password, $database , $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Remove or comment out the following line
// echo "Connected successfully to logindata!";
?>
