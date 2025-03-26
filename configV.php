

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "logindata";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Remove or comment out the following line
// echo "Connected successfully to logindata!";
?>
