<?php
require_once __DIR__ . '/../models/Ticket.php';

$ticket = new Ticket();
$tickets = $ticket->read();

echo json_encode($tickets);
?>