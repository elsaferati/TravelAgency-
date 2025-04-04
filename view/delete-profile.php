
<?php
session_start();
require_once 'UserRepository.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/log-in.php");
    exit();
}

// Fetch user details from the database
$userRepository = new UserRepository();
$user = $userRepository->getUserById($_SESSION['user_id']);

if (!$user) {
    header("Location: ../view/log-in.php");
    exit();
}

// Handle deletion when the user confirms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($userRepository->deleteUser($user->getId())) {
        session_unset();
        session_destroy();
        header("Location: ../view/log-in.php");
        exit();
    } else {
        echo "<script>alert('❌ Error deleting user.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
    <link rel="stylesheet" href="../public/styles/log-in-style.css">
</head>
<body>

    <div class="dashboard-container">
        <h1>Welcome to your Delete Profile</h1>
        <br>
        <br>
        <br>
        <br>

        <button id="openDeleteModal" class="delete">Delete My Account</button>
       
    </div>

    <!-- Delete Account Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <h2>Are you sure you want to delete your account?</h2>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user->getName()); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
                <p><strong>Role:</strong> <?php echo htmlspecialchars($user->getRole()); ?></p>
            </div>
            <br>
            <div class="modal-footer">
                <form method="POST" action="../view/delete-profile.php">
                    <button type="submit" class="delete">Yes, Delete My Account</button>
                </form>
                <br>
                <button type="button" class="close" id="cancelBtn">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("deleteModal");
        var openBtn = document.getElementById("openDeleteModal");
        var closeBtns = document.getElementsByClassName("close");

        openBtn.onclick = function() {
            modal.style.display = "block";
        };

        for (var i = 0; i < closeBtns.length; i++) {
            closeBtns[i].onclick = function() {
                modal.style.display = "none";
            };
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>

</body>
</html>
