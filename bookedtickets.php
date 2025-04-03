<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ticket_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['ticket_id'];
    $conn->query("DELETE FROM tickets WHERE id='$id'");
}

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
        button {
            padding: 5px 10px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <h2>Booked Tickets</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>From</th>
            <th>To</th>
            <th>Departure</th>
            <th>Return</th>
            <th>Passengers</th>
            <th>Class</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= isset($row['from_city']) ? $row['from_city'] : 'N/A' ?></td>
            <td><?= isset($row['to_city']) ? $row['to_city'] : 'N/A' ?></td>
            <td><?= isset($row['departure_date']) ? $row['departure_date'] : 'N/A' ?></td>
            <td><?= isset($row['return_date']) ? $row['return_date'] : 'N/A' ?></td>
            <td><?= isset($row['passengers']) ? $row['passengers'] : 'N/A' ?></td>
            <td><?= isset($row['class']) ? $row['class'] : 'N/A' ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="ticket_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                </form>
                <a href="edit_ticket.php?id=<?= $row['id'] ?>"><button>Edit</button></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>