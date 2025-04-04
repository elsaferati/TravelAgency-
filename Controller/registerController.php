<?php
require_once '../model/userRepository.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])) {
        die("❌ Missing form fields");
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $userRepository = new UserRepository();
    $success = $userRepository->registerUser($name, $email, $hashedPassword, $role);

    if ($success) {
        echo "🎉 User successfully registered!";
        header("Location: ../view/log-in.php");

        exit;
    } else {
        die("❌ Registration failed!");
    }
}
