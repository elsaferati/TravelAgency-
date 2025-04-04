<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "../config/ticketdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request. No ticket ID provided.");
}

$ticket_id = $_GET['id'];

$sql = "SELECT * FROM tickets WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ticket_id);
$stmt->execute();
$result = $stmt->get_result();
$ticket = $result->fetch_assoc();

if (!$ticket) {
    die("Ticket not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from_city'];
    $to = $_POST['to_city'];
    $departure = $_POST['departure_date'];
    $return = $_POST['return_date'];
    $passengers = $_POST['passengers'];
    $class = $_POST['class'];

    $update_sql = "UPDATE tickets SET from_city=?, to_city=?, departure_date=?, return_date=?, passengers=?, class=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssisi", $from, $to, $departure, $return, $passengers, $class, $ticket_id);

    if ($update_stmt->execute()) {
        header("Location: ../view/bookedtickets.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
</head>

<body>
    <h2>Edit Ticket</h2>
    <form method="POST">
        From: <input type="text" name="from_city" value="<?= isset($ticket['from_city']) ? $ticket['from_city'] : '' ?>" required><br>
        To: <input type="text" name="to_city" value="<?= isset($ticket['to_city']) ? $ticket['to_city'] : '' ?>" required><br>
        Departure Date: <input type="date" name="departure_date" value="<?= isset($ticket['departure_date']) ? $ticket['departure_date'] : '' ?>" required><br>
        Return Date: <input type="date" name="return_date" value="<?= isset($ticket['return_date']) ? $ticket['return_date'] : '' ?>" required><br>
        Passengers: <input type="number" name="passengers" value="<?= isset($ticket['passengers']) ? $ticket['passengers'] : '' ?>" required><br>
        Class:
        <select name="class" required>
            <option value="economy" <?= (isset($ticket['class']) && $ticket['class'] == "economy") ? 'selected' : '' ?>>Economy</option>
            <option value="business" <?= (isset($ticket['class']) && $ticket['class'] == "business") ? 'selected' : '' ?>>Business</option>
            <option value="first" <?= (isset($ticket['class']) && $ticket['class'] == "first") ? 'selected' : '' ?>>First</option>
        </select><br>

        <button type="submit">Update Ticket</button>
    </form>

    <br>
    <a href="../view/bookedtickets.php">Go back to Booked Tickets</a>
</body>

</html>