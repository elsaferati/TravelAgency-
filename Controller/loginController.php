<?php
// LoginController.php
session_start();

require_once '../model/userRepository.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Check if email and password fields are empty
    if (empty($_POST['email']) || empty($_POST['password'])) {
        die("Email and password are required.");
    }

    // Trim the input fields
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Create an instance of UserRepository to fetch the user by email
    $userRepository = new UserRepository();
    $user = $userRepository->getUserByEmail($email);

    // Check if the user was found
    if (!$user) {
        die("⚠️ User not found with email: " . $email);
    }

    // Check if password matches the hash stored in the database
    if (!password_verify($password, $user->getPassword())) {
    }

    // Rehash the password if necessary
    if (password_needs_rehash($user->getPassword(), PASSWORD_DEFAULT)) {
        // Rehash the password
        $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the password in the database
        $userRepository->updatePassword($email, $newHashedPassword);
    }


    // If login is successful, set session variables
    $_SESSION['user_id'] = $user->getId();
    $_SESSION['role'] = $user->getRole();

    // Redirect to dashboard after successful login
    header("Location: ../view/dashboard.php");
    exit();
}
