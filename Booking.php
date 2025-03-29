<?php
include 'bookDatabase.php';

class Booking
{
    private $db;

    // Constructor initializes database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    // Method to add a new booking
    public function addBooking($fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)
    {
        $connection = $this->db->getConnection();
        $query = "INSERT INTO bookings (full_name, email, phone, check_in, check_out, total_price) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $connection->prepare($query);
        $stmt->bind_param('sssssd', $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice);

        return $stmt->execute();
    }

    // Method to fetch all bookings
    public function getAllBookings()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT Id, full_name, email, phone, check_in, check_out, total_price FROM bookings";
        $result = $connection->query($query);

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    // Method to fetch a booking by ID
    public function getBookingById($id)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM bookings WHERE Id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Method to update a booking
    public function updateBooking($id, $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice)
    {
        $connection = $this->db->getConnection();
        $query = "UPDATE bookings SET full_name=?, email=?, phone=?, check_in=?, check_out=?, total_price=? WHERE Id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sssssdi', $fullName, $email, $phone, $checkIn, $checkOut, $totalPrice, $id);

        return $stmt->execute();
    }

    // Method to delete a booking
    public function deleteBooking($id)
    {
        $connection = $this->db->getConnection();
        $query = "DELETE FROM bookings WHERE Id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }
}
?>


