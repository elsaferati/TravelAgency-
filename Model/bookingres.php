<?php
include '../config/databaseres.php';  // Include the database connection class

class Booking
{
    private $db;

    // Constructor initializes database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    // Method to add a new booking
    public function addBooking($fullName, $email, $phone, $checkIn, $time, $people, $restaurant)
    {
        // Get the database connection
        $connection = $this->db->getConnection();

        // Prepare the SQL query to insert a new booking
        $query = "INSERT INTO bookingres (name, email, phonenumber, date, time, nrpersons, restaurant) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $connection->prepare($query);

        // Bind the parameters
        $stmt->bind_param('sssssis', $fullName, $email, $phone, $checkIn, $time, $people, $restaurant);

        // Execute the query and return true if successful, false otherwise
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Failure
        }
    }

    // Method to fetch all bookings (for viewing purposes)
    public function getAllBookings()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM bookingres";
        $result = $connection->query($query);

        if ($result === false) {
            die("Error fetching bookings: " . $connection->error);
        }

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
    // Inside the Booking class in bookingres.php

public function getBookingById($id)
{
    $connection = $this->db->getConnection();

    // Query to fetch booking details by ID
    $query = "SELECT * FROM bookingres WHERE id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $id);  // 'i' is for integer

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a booking was found
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();  // Return the booking details as an associative array
    } else {
        return null;  // Return null if no booking is found
    }
}


    // Method to update a booking
    public function updateBooking($id, $fullName, $email, $phone, $checkIn, $time, $people, $restaurant)
    {
        $connection = $this->db->getConnection();
        $query = "UPDATE bookingres SET name=?, email=?, phonenumber=?, date=?, time=?, nrpersons=?, restaurant=? WHERE id=?";
        
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sssssiis', $fullName, $email, $phone, $checkIn, $time, $people, $restaurant, $id);

        return $stmt->execute();
    }

    // Method to delete a booking
    public function deleteBooking($id)
    {
        $connection = $this->db->getConnection();
        $query = "DELETE FROM bookingres WHERE id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}
?>
