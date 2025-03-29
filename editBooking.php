<?php
include 'Booking.php';

if (isset($_GET['id'])) {
    $booking = new Booking();
    $bookingDetails = $booking->getBookingById($_GET['id']);

    if (!$bookingDetails) {
        die("Booking not found!");
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $checkIn = $_POST['check_in'];
        $checkOut = $_POST['check_out'];
        $totalPrice = $_POST['total_price'];

        if ($booking->updateBooking($id, $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)) {
            echo "<script>alert('Booking updated!'); window.location.href='bookingsInfo.php';</script>";
        } else {
            echo "Error updating booking!";
        }
    }
}
?>

<!-- Booking Edit Form -->
<form method="POST" action="editBooking.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($bookingDetails['id']) ?>">
    <input type="text" name="full_name" value="<?= htmlspecialchars($bookingDetails['full_name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($bookingDetails['email']) ?>" required>
    <input type="tel" name="phone" value="<?= htmlspecialchars($bookingDetails['phone']) ?>" required>
    <input type="date" name="check_in" value="<?= htmlspecialchars($bookingDetails['check_in']) ?>" required>
    <input type="date" name="check_out" value="<?= htmlspecialchars($bookingDetails['check_out']) ?>" required>
    <input type="text" name="total_price" value="<?= htmlspecialchars($bookingDetails['total_price']) ?>" required readonly>
    <button type="submit">Update Booking</button>
</form>

