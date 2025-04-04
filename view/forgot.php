<?php
session_start();
require_once '../model/userRepository.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $userRepo = new UserRepository();
    $user = $userRepo->getUserByEmail($email);

    if ($user) {
        $_SESSION['reset_email'] = $email;
        header("Location: ../controller/reset-password.php");
        exit();
    } else {
        $error = "❌ Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Link to the CSS File -->
    <link rel="stylesheet" href="../public/styles/log-in-style.css">
</head>

<body>
    <h2>Forgot Password</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Reset Password</button>
    </form>
    <a href="../view/log-in.php">Back to Login</a>
</body>

</html>