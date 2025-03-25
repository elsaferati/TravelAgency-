<?php
include_once 'userRepository.php';
session_start();

<<<<<<< Updated upstream
$userRepository = new UserRepository();

$user = $userRepository->getUserById($userId);
=======
// Validate user ID
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    die("Invalid user ID.");
}

$userId = (int) $_GET['id'];
$userRepository = new UserRepository();

// Get user details
$user = $userRepository->getUserById($userId);
if (!$user) {
    die("User not found.");
}

// Generate CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editBtn'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }

    // Validate and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    if (!$email) {
        die("Invalid email format.");
    }

    // If password is provided, hash it; otherwise, keep the old password
    $password = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $user['password'];

    // Update user in the database
    $userRepository->updateUser($userId, $name, $email, $password);

    // Unset CSRF token
    unset($_SESSION['csrf_token']);

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit;
}
>>>>>>> Stashed changes
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h3>Edit User</h3>
    <form action="" method="post">
<<<<<<< Updated upstream
        <input type="text" name="id" value="<?=$user['id']?>" readonly> <br> <br>
        <input type="text" name="name" value="<?=$user['name']?>"> <br> <br>
        <input type="text" name="email" value="<?=$user['email']?>"> <br> <br>
        <input type="text" name="password" placeholder="Enter new password (leave blank to keep current)"> <br> <br>
        <input type="submit" name="editBtn" value="Save"> <br> <br>
    </form>
</body>
</html>

<?php 

if (isset($_POST['editBtn'])) {
    $id = $user['id']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

    
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT); 
    } else {
        $password = $user['password']; 


    $userRepository->updateUser($id, $name, $email, $password);
    header("Location: dashboard.php");
}

?>
=======
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>"> 
        <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required></label> <br><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required></label> <br><br>
        <label>New Password (leave blank to keep current): 
            <input type="password" name="password">
        </label> <br><br>
        <input type="submit" name="editBtn" value="Save">
    </form>
</body>
</html>
>>>>>>> Stashed changes
