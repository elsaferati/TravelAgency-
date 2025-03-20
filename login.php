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
?>  $password = $_POST['password'];
