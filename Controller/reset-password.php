<?php
session_start();
require_once '../Model/UserRepository.php';

if (!isset($_SESSION['reset_email'])) {
    header("Location: ../view/forgot.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $newPassword = trim($_POST['password']);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $userRepo = new UserRepository();
    $success = $userRepo->updatePassword($_SESSION['reset_email'], $hashedPassword);

    if ($success) {
        unset($_SESSION['reset_email']); // Remove session variable after reset
        header("Location: ../view/log-in.php");
        exit();
    } else {
        $error = "❌ Failed to reset password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="password" name="password" placeholder="Enter new password" required>
        <button type="submit">Update Password</button>
    </form>
    <a href="../view/log-in.php">Back to Login</a>
</body>
</html>
