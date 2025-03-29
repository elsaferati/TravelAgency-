<?php
include 'Booking.php';

$booking = new Booking();
$bookings = $booking->getAllBookings();  // Now fetching all bookings through the class method

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .edit-btn { background-color: #4CAF50; color: white; }
        .delete-btn { background-color: #f44336; color: white; }
    </style>
</head>
<body>

<h2 style="text-align: center;">Booking List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
            <th>Total Price ($)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($bookings) {
            foreach ($bookings as $row) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['Id']) ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['check_in']) ?></td>
                    <td><?= htmlspecialchars($row['check_out']) ?></td>
                    <td><?= htmlspecialchars($row['total_price']) ?></td>
                    <td class='actions'>
                        <a href='editBooking.php?Id=<?= $row['Id'] ?>'>
                            <button class='edit-btn'>Edit</button>
                        </a>
                        <a href='deleteBooking.php?Id=<?= $row['Id'] ?>' onclick='return confirm("Are you sure?")'>
                            <button class='delete-btn'>Delete</button>
                        </a>
                    </td>
                </tr>
            <?php } 
        } else {
            echo "<tr><td colspan='8'>No bookings found.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>



