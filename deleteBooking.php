<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'bookings');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM bookings WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Booking deleted!'); window.location.href='bookingsInfo.php';</script>";
    } else {
        echo "Error deleting booking: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($connection);
?>
