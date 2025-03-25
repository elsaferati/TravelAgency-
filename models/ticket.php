<?php
require_once __DIR__ . '/../config/database.php';

class Ticket {
    private $conn;
    private $table_name = "tickets";

    public function __construct() {
        $database = new DatabaseConnection();
        $this->conn = $database->getConnection();
    }

    public function create($from, $to, $date, $return_date, $passengers, $class) {
        $query = "INSERT INTO " . $this->table_name . " (from_location, to_location, date, return_date, passengers, class) VALUES (:from, :to, :date, :return_date, :passengers, :class)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":from", $from);
        $stmt->bindParam(":to", $to);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":return_date", $return_date);
        $stmt->bindParam(":passengers", $passengers);
        $stmt->bindParam(":class", $class);
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $from, $to, $date, $return_date, $passengers, $class) {
        $query = "UPDATE " . $this->table_name . " SET from_location=:from, to_location=:to, date=:date, return_date=:return_date, passengers=:passengers, class=:class WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":from", $from);
        $stmt->bindParam(":to", $to);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":return_date", $return_date);
        $stmt->bindParam(":passengers", $passengers);
        $stmt->bindParam(":class", $class);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>