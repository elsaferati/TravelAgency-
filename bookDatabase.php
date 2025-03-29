<?php

class Database
{
    private $connection;

    // Constructor to establish connection
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'bookings', 3306);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to get connection
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
