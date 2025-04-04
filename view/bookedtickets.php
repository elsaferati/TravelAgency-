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
    <title>Dashboard</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/styles/header.css">
    <link rel="stylesheet" href="../public/styles/admin.css">
    <script src="../public/script/header.js" type="text/javascript"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        main {
            display: flex;
            justify-content: flex-start;
            min-height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 10px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .content {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
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

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">
            <!-- Sidebar on the left -->
            <div class="sidebar">
                <a href="../view/admin.php">
                    <h2>Admin Panel</h2>
                </a>
                <ul>
                    <li><a href="../view/bookingsInfo.php"><i class="fas fa-bed"></i> Hotel Booking</a></li>
                    <li><a href="../view/resinfo.php"><i class="fas fa-utensils"></i> Restaurant Reservations</a></li>
                    <li><a href=""><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    <li><a href=""><i class="fas fa-user-plus"></i> Register</a></li>
                    <li><a href="../view/contact-messages.php"><i class="fas fa-envelope"></i> Contact-us</a></li>
                    <li><a href="../view/bookedtickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="content">
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
                                    <button class="delete-btn" type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                                </form>
                                <a href="../view/edit_ticket.php?id=<?= $row['id'] ?>">
                                    <button class="edit-btn">Edit</button>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

</body>

</html>

<?php
$conn->close();
?>