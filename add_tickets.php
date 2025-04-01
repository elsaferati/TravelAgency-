<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$from = $data['from'];
$to = $data['to'];
$departure = $data['departure'];
$return_date = $data['return_date'];
$passengers = $data['passengers'];
$class = $data['class'];

$sql = "INSERT INTO tickets (from_location, to_location, departure_date, return_date, passengers, class) 
        VALUES ('$from', '$to', '$departure', '$return_date', '$passengers', '$class')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Bileta u shtua me sukses"]);
} else {
    echo json_encode(["error" => "Gabim: " . $conn->error]);
}

$conn->close();
?>