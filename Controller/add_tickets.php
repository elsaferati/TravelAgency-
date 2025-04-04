<?php
require_once '../model/Ticket.php';

$data = json_decode(file_get_contents("php://input"), true);
$ticket = new Ticket();

if ($ticket->createTicket($data['from'], $data['to'], $data['departure'], $data['return_date'], $data['passengers'], $data['class'])) {
    echo json_encode(["message" => "Bileta u shtua me sukses"]);
} else {
    echo json_encode(["error" => "Gabim gjatë shtimit të biletës"]);
}
?>