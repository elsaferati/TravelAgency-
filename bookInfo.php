<?php
// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'bookings');

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input to prevent SQL injection
    $fullName = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $checkIn = $_POST['check_in'];  // No need to escape date, but it's still good practice
    $checkOut = $_POST['check_out'];
    $totalPrice = $_POST['totalPrice'];

    // Prepare the SQL query to insert the booking data into the database
    $query = "INSERT INTO `bookings` (`full_name`, `email`, `phone`, `check_in`, `check_out`, `total_price`) 
              VALUES ('$fullName', '$email', '$phone', '$checkIn', '$checkOut', '$totalPrice')";

    $result = mysqli_query($connection, $query);

    // Check if the insertion was successful
    if ($result) {
        // Return success message
        echo "Booking confirmed!";
    } else {
        // Return error message
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the connection
mysqli_close($connection);
?>



