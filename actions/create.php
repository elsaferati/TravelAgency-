<?php
require_once __DIR__ . '/../models/Ticket.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket = new Ticket();
    $result = $ticket->create($_POST['from'], $_POST['to'], $_POST['date'], $_POST['return_date'], $_POST['passengers'], $_POST['class']);
    
    if ($result) {
        header("Location: ../tickets.php?success=Ticket booked successfully");
    } else {
        echo "Error booking ticket.";
    }
}
?>