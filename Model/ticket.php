<?php
require_once 'ticketsdatabase.php';

class Ticket {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createTicket($from, $to, $departure, $return_date, $passengers, $class) {
        $sql = "INSERT INTO tickets (from_location, to_location, departure_date, return_date, passengers, class) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssis", $from, $to, $departure, $return_date, $passengers, $class);
        return $stmt->execute();
    }

    public function getTicket($id) {
        $sql = "SELECT * FROM tickets WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateTicket($id, $from, $to, $departure, $return_date, $passengers, $class) {
        $sql = "UPDATE tickets SET from_location=?, to_location=?, departure_date=?, return_date=?, passengers=?, class=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssisi", $from, $to, $departure, $return_date, $passengers, $class, $id);
        return $stmt->execute();
    }

    public function deleteTicket($id) {
        $sql = "DELETE FROM tickets WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getAllTickets() {
        $sql = "SELECT * FROM tickets";
        return $this->conn->query($sql);
    }
}
?>