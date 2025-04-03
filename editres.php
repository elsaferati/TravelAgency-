<?php
include 'bookingres.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($booking->getBookingById($id)) {
        // Proceed with processing the booking
    } else {
        die("Booking not found!");
    }
} else {
    die("Invalid request. No ID specified.");
}


    // Handle form submission to update the booking
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $checkIn = $_POST['check_in'];
        $time = $_POST['time'];
        $people = $_POST['people'];
        $restaurant = $_POST['restaurant'];

        // Update booking details
        if ($booking->updateBooking($id, $fullName, $email, $phone, $checkIn, $time, $people, $restaurant)) {
            echo "<script>alert('Booking updated!'); window.location.href='resinfo.php';</script>";
        } else {
            echo "Error updating booking!";
        }
    }
}
?>

<!-- Booking Edit Form -->
<form method="POST" action="editres.php?id=<?= htmlspecialchars($id) ?>">
    <h3>Edit Reservation</h3>

    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" value="<?= htmlspecialchars($bookingDetails['name']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($bookingDetails['email']) ?>" required>

    <label for="phone">Phone:</label>
    <input type="tel" name="phone" value="<?= htmlspecialchars($bookingDetails['phonenumber']) ?>" required>

    <label for="check_in">Date:</label>
    <input type="date" name="check_in" value="<?= htmlspecialchars($bookingDetails['date']) ?>" required>

    <label for="time">Time:</label>
    <input type="time" name="time" value="<?= htmlspecialchars($bookingDetails['time']) ?>" required>

    <label for="people">Number of People:</label>
    <input type="number" name="people" value="<?= htmlspecialchars($bookingDetails['nrpersons']) ?>" required>

    <label for="restaurant">Restaurant:</label>
    <select name="restaurant" required>
        <option value="La Piazza" <?= ($bookingDetails['restaurant'] == 'La Piazza') ? 'selected' : '' ?>>La Piazza</option>
        <option value="Gourmet Bistro" <?= ($bookingDetails['restaurant'] == 'Gourmet Bistro') ? 'selected' : '' ?>>Gourmet Bistro</option>
    </select>

    <button type="submit">Update Reservation</button>
</form>
