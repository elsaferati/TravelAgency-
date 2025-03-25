<?php
$server = "localhost"; 
$username = "root";
$password = "";
$database = "logindata"; // ✅ Make sure this matches the correct database
$port = "3306";

// Establish a connection
$conn = mysqli_connect($server, $username, $password, $database, $port);

// Check for a successful connection
if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error()); // Log the error
    die("Database connection failed: " . mysqli_connect_error()); // Show for debugging
}

// Set character set to utf8mb4 for security
mysqli_set_charset($conn, "utf8mb4");

echo "Connected successfully to logindata!";
?>
