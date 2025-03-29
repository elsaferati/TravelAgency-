<?php
class UserRepository {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch user by ID
    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing query: " . $this->conn->error);
        }
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }
    
        return $result->fetch_assoc();
    }
    

    // Fetch user by email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function getAllUsers() {
        // Query to fetch all users from the database
        $stmt = $this->conn->query("SELECT * FROM users");
        
        // Fetch all results as an associative array
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    // Insert a new user
    public function insertUser($name, $email, $password, $role) {
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $password, $role);
        return $stmt->execute();
    }

    // Update user details
    public function updateUser($userId, $name, $email, $password, $role) {
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $password, $role, $userId);
        return $stmt->execute();
    }

    // Delete a user
    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }
}
?>
