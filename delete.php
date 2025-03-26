<?php
session_start();
require_once('configV.php');

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$userId = $_GET['id'];

// Delete user
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
if ($stmt->execute([$userId])) {
    $_SESSION['success'] = "User deleted!";
} else {
    $_SESSION['error'] = "Failed to delete user!";
}
header("Location: dashboard.php");
exit();
?>
