<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have a stylesheet -->
</head>
<body>
    <div class="container">
        <h2>Join Traveler and Your Adventure Awaits</h2>
        <form action="registerController.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>

            <button type="submit">Register - Start Your Journey</button>
        </form>
        <p>Already have an account? <a href="log-in.html">Login here</a>.</p>
    </div>
</body>
</html>