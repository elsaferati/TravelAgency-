<?php
include 'bookingres.php';  // Include the Booking class for handling DB operations

// Check if the request is POST and contains form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the form data
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkIn = $_POST['check_in'];
    $time = $_POST['time'];  // Time of reservation
    $people = $_POST['people'];
    $restaurant = $_POST['restaurant'];

    // Validate inputs (optional)
    if (empty($fullName) || empty($email) || empty($phone) || empty($checkIn) || empty($time) || empty($people) || empty($restaurant)) {
        echo 'All fields are required!';
        exit;
    }

    // Create a new instance of the Booking class
    $booking = new Booking();
    if ($booking->addBooking($fullName, $email, $phone, $checkIn, $time, $people, $restaurant)) {
        echo 'Booking successfully added!';
    } else {
        echo 'Error: Unable to add booking!';
    }
}
?>
