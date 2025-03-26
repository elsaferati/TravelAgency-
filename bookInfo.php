<?php
// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'bookings', 3306);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is sent via POST
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$checkIn = isset($_POST['checkIn']) ? $_POST['checkIn'] : '';
$checkOut = isset($_POST['checkOut']) ? $_POST['checkOut'] : '';
$totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '';

// SQL query to insert the booking into the database
$query = "INSERT INTO `bookings` (`full_name`, `email`, `phone`, `check_in`, `check_out`, `total_price`) 
          VALUES ('$fullName', '$email', '$phone', '$checkIn', '$checkOut', '$totalPrice')";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the insertion was successful
if ($result) {
    echo "<script>alert('Booking confirmed!'); window.location.href='thank-you.php';</script>";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the connection
mysqli_close($connection);
?>
