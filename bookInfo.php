<?php
include 'Booking.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $totalPrice = $_POST['total_price'];

    $booking = new Booking();

    if ($booking->addBooking($fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)) {
        echo "<script>alert('Booking confirmed!'); window.location.href='albania.php';</script>";
    } else {
        echo "Error: Unable to add booking!";
    }
}
?>





