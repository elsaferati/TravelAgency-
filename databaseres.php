<?php

class Database
{
    private $connection;

    // Constructor to establish connection
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'bookingsres', 3306);  // Update with actual credentials

        // Check for a successful connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to get the connection
    public function getConnection()
    {
        return $this->connection;
    }

    // Method to close the connection
    public function close()
    {
        $this->connection->close();
    }
}
?>
