<?php
// Establish a connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'bookings', 3306);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data from the POST request
$fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$checkIn = isset($_POST['check_in']) ? $_POST['check_in'] : '';
$checkOut = isset($_POST['check_out']) ? $_POST['check_out'] : '';
$totalPrice = isset($_POST['total_price']) ? $_POST['total_price'] : '';

// Sanitize the input to prevent SQL injection
$fullName = mysqli_real_escape_string($connection, $fullName);
$email = mysqli_real_escape_string($connection, $email);
$phone = mysqli_real_escape_string($connection, $phone);
$checkIn = mysqli_real_escape_string($connection, $checkIn);
$checkOut = mysqli_real_escape_string($connection, $checkOut);
$totalPrice = mysqli_real_escape_string($connection, $totalPrice);

// Prepare the SQL query to insert the booking data into the database
$query = "INSERT INTO `bookings` (`full_name`, `email`, `phone`, `check_in`, `check_out`, `total_price`) 
          VALUES ('$fullName', '$email', '$phone', '$checkIn', '$checkOut', '$totalPrice')";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the insertion was successful
if ($result) {
    // Display success message and redirect to a confirmation page (e.g., thank you page)
    echo "<script>alert('Booking confirmed!'); window.location.href='albania.php';</script>";
} else {
    // Display error message if there was an issue with the query
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>




