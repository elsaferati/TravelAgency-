<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Traveler</title>
    <link rel="stylesheet" href="styles/log-in-style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="loginController.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register_form.php">Register here</a>.</p>
    </div>
</body>
</html>
