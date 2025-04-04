
<?php
session_start();
require_once 'UserRepository.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

// Fetch user details from the database
$userRepository = new UserRepository();
$user = $userRepository->getUserById($_SESSION['user_id']);

if (!$user) {
    header("Location: log-in.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $password = $user->getPassword();
    }

    $userRepository->updateUser($user->getId(), $name, $email, $password);
    header("Location: dashboard.php");
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

    <h2>Welcome to your Edit Profile</h2>
    <button id="openEditModal">Edit Profile</button>

    <a href="dashboard.php">Back to Dashboard</a>

    <!-- Edit Profile Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <h2>Edit Profile</h2>
            </div>
            <div class="modal-body">
                <form action="edit-profile.php" method="POST">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($user->getName()); ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>" required>

                    <label for="password">New Password (Leave blank to keep current password):</label>
                    <input type="password" name="password" placeholder="Enter new password">

                    <button type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("editModal");
        var openBtn = document.getElementById("openEditModal");
        var closeBtn = document.getElementsByClassName("close")[0];

        openBtn.onclick = function() {
            modal.style.display = "block";
        };

        closeBtn.onclick = function() {
            modal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>

</body>
</html>
