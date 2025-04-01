<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ticket_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kontrollo nëse ka një ID bilete të dërguar për editim
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tickets WHERE id='$id'";
    $result = $conn->query($sql);

    // Sigurohu që ekziston një rresht për këtë ID
    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
    } else {
        die("Ticket not found.");
    }
} else {
    die("No ticket ID provided.");
}

// Kontrollo nëse është dërguar formulari për editim
if (isset($_POST['update'])) {
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $passengers = $_POST['passengers'];
    $class = $_POST['class'];

    // Përditëso biletën
    $update_sql = "UPDATE tickets SET from_city='$from_city', to_city='$to_city', departure_date='$departure_date', return_date='$return_date', passengers='$passengers', class='$class' WHERE id='$id'";

    if ($conn->query($update_sql) === TRUE) {
        // Pasi përditësohet me sukses, ridrejto në faqen e biletave të rezervuara
        header("Location: bookedtickets.php"); // Këtu e përdor emrin e saktë të fajllit
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
        <label for="from_city">From: </label>
        <input type="text" name="from_city" value="<?= isset($ticket['from_city']) ? $ticket['from_city'] : '' ?>" required><br>

        <label for="to_city">To: </label>
        <input type="text" name="to_city" value="<?= isset($ticket['to_city']) ? $ticket['to_city'] : '' ?>" required><br>

        <label for="departure_date">Departure Date: </label>
        <input type="date" name="departure_date" value="<?= isset($ticket['departure_date']) ? $ticket['departure_date'] : '' ?>" required><br>

        <label for="return_date">Return Date: </label>
        <input type="date" name="return_date" value="<?= isset($ticket['return_date']) ? $ticket['return_date'] : '' ?>" required><br>

        <label for="passengers">Passengers: </label>
        <input type="number" name="passengers" value="<?= isset($ticket['passengers']) ? $ticket['passengers'] : '' ?>" required><br>

        <label for="class">Class: </label>
        <select name="class" required>
            <option value="business" <?= $ticket['class'] == 'business' ? 'selected' : '' ?>>Business</option>
            <option value="economy" <?= $ticket['class'] == 'economy' ? 'selected' : '' ?>>Economy</option>
            <option value="first" <?= $ticket['class'] == 'first' ? 'selected' : '' ?>>First</option>
            <option value="premium" <?= $ticket['class'] == 'premium' ? 'selected' : '' ?>>Premium</option>
        </select><br>

        <button type="submit" name="update">Update Ticket</button>
    </form>

    <br><br>
    <a href="bookedtickets.php">Go back to Booked Tickets</a>
</body>
</html>
