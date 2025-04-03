<?php
// dashboard.php
session_start();
require_once 'UserRepository.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
} else {
    echo "Logged in as User ID: " . $_SESSION['user_id'];
    echo "Role: " . $_SESSION['role'];
}


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

// Fetch user details from the database
$userRepository = new UserRepository();
$user = $userRepository->getUserById($_SESSION['user_id']); // Get user by ID from session

// If user not found, redirect to login page
if (!$user) {
    header("Location: log-in.php");
    exit();
}else {
    echo "User found: " . $user->getName() . "<br>";  // Output the user's name to confirm
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/log-in-style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Welcome, <?php echo $user->getName(); ?>!</h1>
            <a href="logout.php" class="dashboard-btn">Log Out</a>
        </div>

        <div class="user-info">
            <h2>Your Profile Information</h2>
            <p><span class="user-detail">Name:</span> <?php echo $user->getName(); ?></p>
            <p><span class="user-detail">Email:</span> <?php echo $user->getEmail(); ?></p>
            <p><span class="user-detail">Role:</span> <?php echo $user->getRole(); ?></p>
        </div>

        <div class="actions">
            <a href="edit-profile.php?user_id=<?php echo $user->getId(); ?>" class="dashboard-btn">Edit Profile</a>
            <a href="delete-profile.php?user_id=<?php echo $user->getId(); ?>" class="delete">Delete Account</a>
        </div>
    </div>
</body>
</html>
