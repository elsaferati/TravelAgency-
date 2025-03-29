<?php
session_start();
require_once 'DatabaseConnection.php';
require_once 'UserRepository.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

// Initialize the database connection and repository
$conn = new DatabaseConnection();
$db = $conn->getConnection();
$userRepo = new UserRepository($db);

// Fetch the current user data to display in the edit form
$userData = $userRepo->getUserById($_SESSION['user_id']);
if (!$userData) {
    echo "Error fetching user data.";
    exit();
}

// Check if the form is being submitted for update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If the form is for updating the profile
    if (isset($_POST['update'])) {
        // Get the updated user details from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'] ?? 'user'; // Default to 'user' if no role is specified

        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Update the user's data
        if ($userRepo->updateUser($_SESSION['user_id'], $name, $email, $hashedPassword, $role)) {
            // Redirect to the dashboard if update is successful
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error updating user information.";
        }
    }

    // If the form is for deleting the account
    if (isset($_POST['delete'])) {
        // Delete the user account
        if ($userRepo->deleteUser($_SESSION['user_id'])) {
            // If deletion is successful, log out and redirect to the login page
            session_unset();
            session_destroy();
            header("Location: log-in.php");
            exit();
        } else {
            echo "Error deleting account.";
        }
    }
}
?>
