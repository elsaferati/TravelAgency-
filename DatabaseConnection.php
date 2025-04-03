<?php
class DatabaseConnection {
    private $connection;
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'logindata';  // Database for registration users

    public function __construct() {
        // Database credentials are hardcoded for 'logindata'
    }

    // Establish the connection to the 'logindata' database
    public function getConnection() {
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        // Check for connection error
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }else {
            echo "Connected successfully";  // Debugging message
        }

        // Return the database connection instance
        return $this->connection;
    }
}
?>
