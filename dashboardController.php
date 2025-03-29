<?php
session_start();
require_once 'DatabaseConnection.php';
require_once 'UserRepository.php';

class DashboardController {
    private $db;
    private $userRepo;

    public function __construct() {
        // Set up database connection and repository
        $conn = new DatabaseConnection();
        $this->db = $conn->getConnection();
        $this->userRepo = new UserRepository($this->db);
    }

    // Check if the user is logged in and retrieve their data
    public function loadDashboard() {
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login if user is not logged in
            header("Location: log-in.php");
            exit();
        }

        $userId = $_SESSION['user_id'];
        $userData = $this->userRepo->getUserById($userId); // Fetch user data by ID
        
        if (!$userData) {
            echo "Error fetching user data.";
            exit();
        }

        // If user is an admin, fetch all users
        $allUsers = [];
        if ($_SESSION['role'] == 'admin') {
            $allUsers = $this->userRepo->getAllUsers(); // Get all users for admin
        }

        // Return the data to be used in the dashboard view
        return [
            'userData' => $userData,
            'allUsers' => $allUsers
        ];
    }
}
?>
