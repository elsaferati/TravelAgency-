<?php
// Database configuration
define('DB_HOST', 'localhost');  // Update with your database host
define('DB_NAME', 'logindata');  // Database name is now 'logindata'
define('DB_USER', 'root');  // Update with your database username
define('DB_PASSWORD', '');  // Update with your database password

// Make sure this is declared once across all included files
if (!class_exists('DatabaseConnection')) {
    class DatabaseConnection {
        private $connection;

        public function startConnection() {
            try {
                $this->connection = new PDO(
                    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                    DB_USER,
                    DB_PASSWORD
                );
                // Set the PDO error mode to exception
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }
}
?>

