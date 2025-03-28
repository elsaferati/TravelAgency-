<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'bookings');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if booking ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch booking details
    $query = "SELECT * FROM bookings WHERE id = $id";
    $result = mysqli_query($connection, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $fullName = $row['full_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $checkIn = $row['check_in'];
        $checkOut = $row['check_out'];
        $totalPrice = $row['total_price'];
    } else {
        echo "Booking not found!";
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fullName = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $totalPrice = $_POST['total_price'];

    // Update query
    $updateQuery = "UPDATE bookings SET full_name='$fullName', email='$email', phone='$phone', check_in='$checkIn', check_out='$checkOut', total_price='$totalPrice' WHERE id=$id";

    if (mysqli_query($connection, $updateQuery)) {
        echo "<script>alert('Booking updated!'); window.location.href='bookingsInfo.php';</script>";
    } else {
        echo "Error updating booking: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!-- Edit Form -->
<form method="POST" action="editBooking.php">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="full_name" value="<?= htmlspecialchars($fullName) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
    <input type="tel" name="phone" value="<?= htmlspecialchars($phone) ?>" required>
    <input type="date" name="check_in" value="<?= htmlspecialchars($checkIn) ?>" required>
    <input type="date" name="check_out" value="<?= htmlspecialchars($checkOut) ?>" required>
    <input type="text" name="total_price" value="<?= htmlspecialchars($totalPrice) ?>" required readonly>
    <button type="submit">Update Booking</button>
</form>
