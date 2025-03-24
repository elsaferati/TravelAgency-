<?php
require_once __DIR__ . '/../models/Ticket.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket = new Ticket();
    $result = $ticket->delete($_POST['id']);

    if ($result) {
        header("Location: ../tickets.php?success=Ticket deleted successfully");
    } else {
        echo "Error deleting ticket.";
    }
}
?>