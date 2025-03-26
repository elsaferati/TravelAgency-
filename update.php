<?php
session_start();
require_once('configV.php');
require_once('userRepository.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$userRepository = new UserRepository();
$userId = $_SESSION['user_id']; // Get logged-in user's ID
$user = $userRepository->getUserById($userId);

if (!$user) {
    die("User not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validate inputs
    if (empty($name) || empty($email)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        // Update user details (without changing password)
        if ($userRepository->updateUser($userId, $name, $email, null)) {
            $_SESSION['success'] = "Profile updated successfully!";
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            $error = "Failed to update profile!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>

<h2>Update Profile</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<?php if (isset($_SESSION['success'])) { echo "<p style='color:green;'>{$_SESSION['success']}</p>"; unset($_SESSION['success']); } ?>

<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    
    <button type="submit">Update</button>
</form>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
