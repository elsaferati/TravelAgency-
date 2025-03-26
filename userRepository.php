<?php
// Include necessary files for the database connection
include_once 'configV.php';
include_once 'DatabaseConnection.php';

class UserRepository {
    private $connection;
    private $table = 'crudtable'; // Ensure this matches your actual table name

    function __construct() {
        try {
            $dbConnection = new DatabaseConnection();
            $this->connection = $dbConnection->startConnection(); 
        } catch (Exception $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    // Insert a new user into the database
    function insertUser($user) {
        $conn = $this->connection;
        $name = $user->getName();
        $email = $user->getEmail();
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT); // Secure password hashing

        try {
            $sql = "INSERT INTO $this->table (name, email, password) VALUES (?, ?, ?)";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $email, $hashedPassword]);

            echo "<script>alert('User has been inserted successfully!');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Error inserting user: " . $e->getMessage() . "');</script>";
        }
    }

    // Retrieve all users from the database
    function getAllUsers() {
        $conn = $this->connection;

        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $conn->query($sql);
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "<script>alert('Error fetching users: " . $e->getMessage() . "');</script>";
            return [];
        }
    }

    // Retrieve a single user by their ID
    function getUserById($id) {
        $conn = $this->connection;

        try {
            $sql = "SELECT * FROM $this->table WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$id]);

            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "<script>alert('Error fetching user: " . $e->getMessage() . "');</script>";
            return null;
        }
    }

    // Update an existing user in the database
    function updateUser($id, $name, $email, $password = null) {
        $conn = $this->connection;

        try {
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $sql = "UPDATE $this->table SET name=?, email=?, password=? WHERE id=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$name, $email, $hashedPassword, $id]);
            } else {
                $sql = "UPDATE $this->table SET name=?, email=? WHERE id=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$name, $email, $id]);
            }

            echo "<script>alert('Update was successful');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Error updating user: " . $e->getMessage() . "');</script>";
        }
    }

    // Delete a user from the database
    function deleteUser($id) {
        $conn = $this->connection;

        try {
            $sql = "DELETE FROM $this->table WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$id]);

            echo "<script>alert('Delete was successful');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Error deleting user: " . $e->getMessage() . "');</script>";
        }
    }
}
?>
