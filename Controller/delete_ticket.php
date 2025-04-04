<?php
require_once '../model/ticket.php';

if (isset($_GET['id'])) {
    $ticket = new Ticket();
    if ($ticket->deleteTicket($_GET['id'])) {
        echo "Bileta u fshi me sukses!";
    } else {
        echo "Gabim gjatë fshirjes!";
    }
}
