<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'userinfo';
    private $connection;

    // Create the connection
    public function connect() {
        if (!$this->connection) {
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (mysqli_connect_errno()) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
        return $this->connection;
    }

    // Close the connection
    public function close() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }
}
?>
