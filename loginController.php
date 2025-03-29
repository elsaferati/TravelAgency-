<?php
session_start();
require_once 'DatabaseConnection.php';
require_once 'UserRepository.php';

$conn = new DatabaseConnection();
$db = $conn->getConnection();
$userRepo = new UserRepository($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $userRepo->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: log-in.php?error=invalid_credentials");
        exit();
    }
}
?>
