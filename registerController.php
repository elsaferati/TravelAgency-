<?php
session_start();
require_once 'DatabaseConnection.php';
require_once 'UserRepository.php';

$conn = new DatabaseConnection();
$db = $conn->getConnection();
$userRepo = new UserRepository($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'] ?? 'user'; // Default to 'user'

    $existingUser = $userRepo->getUserByEmail($email);

    if ($existingUser) {
        header("Location: register_form.php?error=email_exists");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    if ($userRepo->insertUser($name, $email, $hashedPassword, $role)) {
        header("Location: log-in.php");
        exit();
    } else {
        header("Location: register_form.php?error=registration_failed");
        exit();
    }
}
?>
