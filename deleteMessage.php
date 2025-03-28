<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'userinfo');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get message ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Delete the message from the database
    $query = "DELETE FROM `userdata` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Message deleted successfully!'); window.location.href='contact-messages.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
