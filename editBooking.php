<?php
include 'Booking.php';

if (isset($_GET['id'])) {
    // Initialize the Booking class
    $booking = new Booking();
    
    // Fetch booking details by ID
    $bookingDetails = $booking->getBookingById($_GET['id']);
    
    // Check if booking exists, if not, display error message
    if (!$bookingDetails) {
        die("Booking not found!");
    }

    // Handle form submission to update booking
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $checkIn = $_POST['check_in'];
        $checkOut = $_POST['check_out'];
        $totalPrice = $_POST['total_price'];

        // Update booking using the updateBooking method
        if ($booking->updateBooking($id, $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)) {
            // Redirect to bookings info page after successful update
            echo "<script>alert('Booking updated!'); window.location.href='bookingsInfo.php';</script>";
        } else {
            echo "Error updating booking!";
        }
    }
} else {
    // If no ID is provided in the URL, display an error message
    die("Booking ID not provided! Please ensure the URL includes ?id=.");
}
?>

<!-- Booking Edit Form -->
<form method="POST" action="editBooking.php">
    <input type="hidden" name="id" value="<?= isset($bookingDetails['id']) ? htmlspecialchars($bookingDetails['id']) : '' ?>">
    <input type="text" name="full_name" value="<?= isset($bookingDetails['full_name']) ? htmlspecialchars($bookingDetails['full_name']) : '' ?>" required>
    <input type="email" name="email" value="<?= isset($bookingDetails['email']) ? htmlspecialchars($bookingDetails['email']) : '' ?>" required>
    <input type="tel" name="phone" value="<?= isset($bookingDetails['phone']) ? htmlspecialchars($bookingDetails['phone']) : '' ?>" required>
    <input type="date" name="check_in" value="<?= isset($bookingDetails['check_in']) ? htmlspecialchars($bookingDetails['check_in']) : '' ?>" required>
    <input type="date" name="check_out" value="<?= isset($bookingDetails['check_out']) ? htmlspecialchars($bookingDetails['check_out']) : '' ?>" required>
    <input type="text" name="total_price" value="<?= isset($bookingDetails['total_price']) ? htmlspecialchars($bookingDetails['total_price']) : '' ?>" required readonly>
    <button type="submit">Update Booking</button>
</form>


