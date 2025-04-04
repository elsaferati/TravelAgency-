<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $passengers = $_POST['passengers'];
    $class = $_POST['class'];

    $sql = "UPDATE tickets SET from_city='$from_city', to_city='$to_city', departure_date='$departure_date', return_date='$return_date', passengers='$passengers', class='$class' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tickets WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<form method="POST" action="../controller/update_ticket.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="from_city">From City:</label>
    <input type="text" name="from_city" value="<?php echo $row['from_city']; ?>" required><br>
    
    <label for="to_city">To City:</label>
    <input type="text" name="to_city" value="<?php echo $row['to_city']; ?>" required><br>
    
    <label for="departure_date">Departure Date:</label>
    <input type="date" name="departure_date" value="<?php echo $row['departure_date']; ?>" required><br>
    
    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" value="<?php echo $row['return_date']; ?>"><br>
    
    <label for="passengers">Passengers:</label>
    <input type="number" name="passengers" value="<?php echo $row['passengers']; ?>" required><br>
    
    <label for="class">Class:</label>
    <input type="text" name="class" value="<?php echo $row['class']; ?>" required><br>
    
    <input type="submit" value="Update Ticket">
</form>

<?php } ?>