<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $passengers = $_POST['passengers'];
    $class = $_POST['class'];

    $sql = "INSERT INTO tickets (from_city, to_city, departure_date, return_date, passengers, class) 
            VALUES ('$from_city', '$to_city', '$departure_date', '$return_date', '$passengers', '$class')";

    if ($conn->query($sql) === TRUE) {
        echo "New ticket booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>