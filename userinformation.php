<?php

$connection = mysqli_connect('localhost', 'root', '', 'userinfo', 3306);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = isset($_POST['user']) ? $_POST['user'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$query = "INSERT INTO `userdata`(`user`, `email`, `message`) VALUES ('$user', '$email', '$message')";

$result = mysqli_query($connection, $query);

if ($result) {
    echo "<script>alert('Message is sent!'); window.location.href='contact-us.php';</script>";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the connection
mysqli_close($connection);

?>


