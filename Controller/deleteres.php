<?php
include '../controller/bookingres.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new instance of the Booking class
    $booking = new Booking();

    // Delete the booking with the given ID
    if ($booking->deleteBooking($id)) {
        echo "<script>alert('Booking deleted!'); window.location.href='resinfo.php';</script>";
    } else {
        echo "Error deleting booking!";
    }
}
?>
