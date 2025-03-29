<?php
include 'Booking.php';

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];

    $booking = new Booking();

    if ($booking->deleteBooking($id)) {
        echo "<script>alert('Booking deleted!'); window.location.href='bookingsInfo.php';</script>";
    } else {
        echo "Error deleting booking!";
    }
}
?>

