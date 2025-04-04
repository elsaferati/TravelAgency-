<?php

class Message {
    private $db;

    // Constructor
    public function __construct() {
        $this->db = new Database();
    }

    // Create a new message
    public function create($user, $email, $message) {
        $conn = $this->db->connect();
        $query = "INSERT INTO userdata (user, email, message) VALUES ('$user', '$email', '$message')";
        return mysqli_query($conn, $query);
    }

    // Get all messages
    public function getAllMessages() {
        $conn = $this->db->connect();
        $query = "SELECT id, user, email, message FROM userdata";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Get a message by ID
    public function getMessageById($id) {
        $conn = $this->db->connect();
        $query = "SELECT * FROM userdata WHERE id = $id";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    // Update a message
    public function update($id, $user, $email, $message) {
        $conn = $this->db->connect();
        $query = "UPDATE userdata SET user='$user', email='$email', message='$message' WHERE id=$id";
        return mysqli_query($conn, $query);
    }

    // Delete a message
    public function delete($id) {
        $conn = $this->db->connect();
        $query = "DELETE FROM userdata WHERE id = $id";
        return mysqli_query($conn, $query);
    }
}
?>
