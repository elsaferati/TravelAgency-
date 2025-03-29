<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tickets WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>