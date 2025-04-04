<?php
include 'Booking.php';

$booking = new Booking();

// Check if the ID is provided in the URL
if (!isset($_GET['Id']) || empty($_GET['Id'])) {
    die("Booking ID not provided! Please ensure the URL includes ?Id=.");
}

$id = $_GET['Id'];  // Fetch ID from URL

// Fetch booking details by ID
$bookingDetails = $booking->getBookingById($id);

// If no booking found, display an error
if (!$bookingDetails) {
    die("Booking not found!");
}

// Handle form submission to update booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $totalPrice = $_POST['total_price'];

    // Update booking using the updateBooking method
    if ($booking->updateBooking($id, $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)) {
        echo "<script>alert('Booking updated!'); window.location.href='bookingsInfo.php';</script>";
        exit;
    } else {
        echo "Error updating booking!";
    }
}
?>

<!-- Booking Edit Form -->
<form method="POST" action="editBooking.php?Id=<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="Id" value="<?= htmlspecialchars($id) ?>"> 
    <input type="text" name="full_name" value="<?= htmlspecialchars($bookingDetails['full_name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($bookingDetails['email']) ?>" required>
    <input type="tel" name="phone" value="<?= htmlspecialchars($bookingDetails['phone']) ?>" required>
    <input type="date" name="check_in" value="<?= htmlspecialchars($bookingDetails['check_in']) ?>" required>
    <input type="date" name="check_out" value="<?= htmlspecialchars($bookingDetails['check_out']) ?>" required>
    <input type="text" name="total_price" value="<?= htmlspecialchars($bookingDetails['total_price']) ?>" required readonly>
    <button type="submit">Update Booking</button>
</form>






