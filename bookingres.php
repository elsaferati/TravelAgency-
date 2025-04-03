<?php
include 'databaseres.php';  // Include the database connection class

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
        return $stmt->execute();
    }

    // Method to fetch all bookings (for viewing purposes)
    public function getAllBookings()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM bookingres";
        $result = $connection->query($query);

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
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