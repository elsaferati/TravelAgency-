<?php
include '../model/bookingres.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkIn = $_POST['check_in'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $restaurant = $_POST['restaurant'];

    // Create a new Booking instance
    $booking = new Booking();

    // Attempt to add the booking
    if ($booking->addBooking($fullName, $email, $phone, $checkIn, $time, $people, $restaurant)) {
        echo "<script>alert('Booking successful!'); window.location.href='../view/hotels.php';</script>";
    } else {
        echo "<script>alert('Error adding booking.'); window.location.href='../view/hotels.php';</script>";
    }
}
