<?php
include 'config/db.php';

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>From City</th><th>To City</th><th>Departure Date</th><th>Return Date</th><th>Passengers</th><th>Class</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["from_city"] . "</td><td>" . $row["to_city"] . "</td><td>" . $row["departure_date"] . "</td><td>" . $row["return_date"] . "</td><td>" . $row["passengers"] . "</td><td>" . $row["class"] . "</td><td><a href='update_ticket.php?id=" . $row["id"] . "'>Edit</a> | <a href='../controller/delete_ticket.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No tickets found!";
}
