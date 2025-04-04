<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Traveler</title>
    <link rel="stylesheet" href="../view/styles/log-in-style.css">
</head>
<body>
    <div class="container">
        <h2>Create an Account</h2>
        <form action="../controller/registerController.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <select id="role" name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

            <button type="submit" name="register">Register</button>
            </form>
        <p>Already have an account? <a href="../view/log-in.php">Login here</a>.</p>
    </div>
</body>
</html>


