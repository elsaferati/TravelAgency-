<?php
// First, check if the required config and connection files exist
if (!file_exists(__DIR__ . '/config2.php')) {
    die("Error: config2.php not found!");
}

include_once 'config2.php';
include_once 'DatabaseConnection.php';

class UserRepository {
    private $connection;
    private $table = 'crudtable'; // The name of your user table in the database

    function __construct() {
        // Create a new database connection
        $dbConnection = new DatabaseConnection();
        $this->connection = $dbConnection->startConnection();
    }

    // Insert a new user into the database
    function insertUser($user) {
        $conn = $this->connection;

        $name = $user->getName();
        $email = $user->getEmail();
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);  // Hash the password before inserting

        $sql = "INSERT INTO $this->table (name, email, password) VALUES (?, ?, ?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$name, $email, $password]);

        echo "<script> alert('User has been inserted successfully!'); </script>";
    }

    // Retrieve all users from the database
    function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT * FROM $this->table";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    // Retrieve a single user by their ID
    function getUserById($id) {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM $this->table WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
    
        // Fetch the user data from the executed statement
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }

    // Update an existing user in the database
    function updateUser($id, $name, $email, $password = null) {
        $conn = $this->connection;

        // If password is provided, hash it before updating
        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        // If no new password, don't update the password field
        if ($password === null) {
            $sql = "UPDATE $this->table SET name=?, email=? WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $email, $id]);
        } else {
            $sql = "UPDATE $this->table SET name=?, email=?, password=? WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $email, $password, $id]);
        }

        echo "<script>alert('Update was successful'); </script>";
    }

    // Delete a user from the database
    function deleteUser($id) {
        $conn = $this->connection;

        $sql = "DELETE FROM $this->table WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);

        echo "<script>alert('Delete was successful'); </script>";
    }
}
?>

