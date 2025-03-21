<?php
session_start();

// Check if the user is not logged in, redirect to login page
/* if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
} */

require_once('config2.php');
require_once('userRepository.php');

$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
<h1>User Dashboard</h1>
    