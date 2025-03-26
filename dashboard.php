<?php
session_start();
require_once('configV.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}

// Fetch all users
$stmt = $conn->query("SELECT id, name, email FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['email']) ?>!</h1>
    <a href="logout.php">Logout</a>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Edit</th><th>Delete</th></tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><a href="edit.php?id=<?= $user['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Delete user?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
