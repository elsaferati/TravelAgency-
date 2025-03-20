<?php
session_start();

require_once('config2.php');
include_once('userRepository.php');
include_once('user.php');

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Please fill the required fields!";
    } else {
        include_once('users.php');
        $email = $_POST['email'];
      
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $user['role'];
                header("location: dashboard.php");
                exit();
            }
        }
        echo "Incorrect Username or Password!";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Overpass:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/log-in-style.css">
    <link rel="stylesheet" href="styles/shared.css"> 
    <link rel="stylesheet" href="styles/header.css">
    <script src="script/header.js" type="text/javascript"></script>

    <title>Log in</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p id="title"><a href="index.html"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>
