<?php
session_start();

// Optional: Display a logout message or log the event
$_SESSION['message'] = "You have been logged out successfully.";

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: ../view/log-in.php");

exit();
?>
