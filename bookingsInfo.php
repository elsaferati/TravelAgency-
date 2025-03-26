<?php

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'bookings');

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch booking data from the 'bookings' table
$query = "SELECT id, full_name, email, phone, check_in, check_out, total_price FROM bookings";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Booking List</title>
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
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch and display each row of the result set
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['check_in']) . "</td>";
            echo "<td>" . htmlspecialchars($row['check_out']) . "</td>";
            echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Free the result and close the connection
mysqli_free_result($result);
mysqli_close($connection);
?>

</body>
</html>
