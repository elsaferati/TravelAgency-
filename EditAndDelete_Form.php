<?php
session_start();
require_once 'DatabaseConnection.php';
require_once 'UserRepository.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

// Initialize the database connection and repository
$conn = new DatabaseConnection();
$db = $conn->getConnection();
$userRepo = new UserRepository($db);

// Fetch the current user data to display in the edit form
$userData = $userRepo->getUserById($_SESSION['user_id']);
if (!$userData) {
    echo "Error fetching user data.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles/log-in-style.css">
</head>
<body>
    <div class="edit-container">
        <h2>Edit Your Profile</h2>

        <!-- Form to update user profile -->
        <form method="POST" action="EditAndDeleteController.php">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['name']); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role</label>
            <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($userData['role']); ?>" required>

            <button type="submit" name="update">Update</button>
        </form>

        <!-- Form to delete user account -->
        <form method="POST" action="EditAndDeleteController.php" onsubmit="return confirm('Are you sure you want to delete your account?')">
            <button type="submit" name="delete" class="delete-btn">Delete Account</button>
        </form>
    </div>
</body>
</html>
