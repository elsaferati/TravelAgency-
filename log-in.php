<?php
// log-in.php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to the CSS File -->
    <link rel="stylesheet" href="styles/log-in-style.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="LoginController.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" name="login">Login</button>
        </form>
        <div class="links">
            <a href="register_form.php">Don't have an account? Register here</a>
            <a href="#">Forgot Password?</a>
        </div>
    </div>
</body>
</html>
