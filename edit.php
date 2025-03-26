<?php
session_start();
require_once('configV.php'); // Database connection

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$error_message = "";

// Fetch user data
$stmt = $conn->prepare("SELECT email, username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatebtn'])) {
    $new_email = trim($_POST['email']);
    $new_username = trim($_POST['username']);
    
    if (empty($new_email) || empty($new_username)) {
        $error_message = "Please fill in all fields!";
    } else {
        // Update user data
        $stmt = $conn->prepare("UPDATE users SET email = ?, username = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_email, $new_username, $user_id);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Profile updated successfully!";
            header("Location: edit.php");
            exit();
        } else {
            $error_message = "Error updating profile!";
        }
        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <form action="" method="post">
        <h3>Edit Profile</h3>
        
        <?php if (!empty($error_message)) { ?>
            <span class="error-msg"><?php echo $error_message; ?></span>
        <?php } ?>
        
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <input type="submit" name="updatebtn" value="Update Profile" class="form-btn">
    </form>
</body>
</html>