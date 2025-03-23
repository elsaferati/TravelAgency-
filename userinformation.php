<?php

$connection = mysqli_connect('localhost', 'root', '', 'userinfo');
if (!file_exists(__DIR__ . '/config2.php')) {
    die("Error: config2.php not found!");
}

$user = isset($_POST['user']) ? trim($_POST['user']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if (empty($user) || empty($email) || empty($message)) {
    die("All fields are required.");
}

$query = "INSERT INTO userdata (user, email, message) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "sss", $user, $email, $message);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Your message was successfully sent'); window.location.href='contact-us.php';</script>";
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_stmt_close($stmt);
mysqli_close($connection);

?>

