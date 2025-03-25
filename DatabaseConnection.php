<?php

class DatabaseConnection
{
    private $server = "localhost"; 
    private $username = "root"; 
    private $password = ""; 
    private $database = "logindata";
    private $port = "3306"; 
    private static $connection = null; // Singleton pattern: storing the connection

    // Start the connection
    public function startConnection()
    {
        if (self::$connection === null) {
            try {
                // Create PDO connection
                self::$connection = new PDO(
                    "mysql:host=$this->server;port=$this->port;dbname=$this->database",
                    $this->username,
                    $this->password
                );

                // Set the error mode to exception
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Log error to file (do not show to user in production)
                error_log("Database Connection Failed: " . $e->getMessage());
                // Display user-friendly error
                die("Database connection failed. Please try again later.");
            }
        }

        return self::$connection;
    }

    // Close the connection explicitly (optional, usually handled automatically)
    public function closeConnection()
    {
        self::$connection = null;
    }
}
?>