<?php
// UserRepository.php
require_once '../model/user.php';

class UserRepository
{
    private $connection;

    public function __construct()
    {
        // Create database connection
        $this->connection = new mysqli('localhost', 'root', '', 'logindata');
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Get user by email (used for login)
    public function getUserByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->connection->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the user from the result
        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
        } else {
            echo "❌ No user found with email: $email";
            return null;
        }
    }

    // Register a new user
    // Register a new user
    public function registerUser($name, $email, $password, $role)
    {
        // Check if the email already exists
        $checkStmt = $this->connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        if (!$checkStmt) {
            die("❌ Prepare failed: " . $this->connection->error);
        }

        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->bind_result($emailCount);
        $checkStmt->fetch();
        $checkStmt->close();

        // If the email is already registered, return false
        if ($emailCount > 0) {
            echo "❌ Email already exists! Please choose a different one.";
            return false;
        }

        // Hash the password before saving to the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->connection->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("❌ Prepare failed: " . $this->connection->error);
        }

        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            return true; // Successfully registered
        } else {
            die("❌ Execute failed: " . $stmt->error); // Debugging error
        }
    }



    // Update user information
    public function updateUser($id, $name, $email, $password)
    {
        // If password is provided, hash it using PASSWORD_DEFAULT
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        $stmt = $this->connection->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $hashedPassword, $id);

        if ($stmt->execute()) {
            echo "🎉 User updated successfully!";
        } else {
            die("❌ Execute failed: " . $stmt->error);
        }
    }

    // Delete user by ID
    // UserRepository.php - deleteUser method
    public function deleteUser($id)
    {
        // Prepare the DELETE statement to remove the user from the database
        $stmt = $this->connection->prepare("DELETE FROM users WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->connection->error);
        }

        // Bind the user ID parameter to the statement
        $stmt->bind_param("i", $id);

        // Execute the query and check if the deletion was successful
        if ($stmt->execute()) {
            echo "🎉 User deleted successfully!";
        } else {
            die("❌ Execute failed: " . $stmt->error); // Debugging message
        }
    }



    // Get user by ID (used in dashboard and other places)
    public function getUserById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Debugging: Check if results are returned
        // Remove this in production, it's just for debugging
        // echo "<pre>"; var_dump($result); echo "</pre>";

        if ($row = $result->fetch_assoc()) {
            return new User($row['id'], $row['name'], $row['email'], $row['password'], $row['role']);
        } else {
            echo "❌ No user found with ID: $id";
            return null;
        }
    }
    public function updatePassword($email, $newHashedPassword)
    {
        $stmt = $this->connection->prepare("UPDATE users SET password = ? WHERE email = ?");

        if (!$stmt) {
            die("❌ Prepare failed: " . $this->connection->error);
        }

        $stmt->bind_param("ss", $newHashedPassword, $email);

        if (!$stmt->execute()) {
            die("❌ Execute failed: " . $stmt->error);
        }

        return true;
    }
}
