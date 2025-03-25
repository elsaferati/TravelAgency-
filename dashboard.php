<?php
session_start();
require_once('config2.php');
require_once('userRepository.php');

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        function confirmDelete(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete.php?id=" + userId;
            }
        }
    </script>
</head>
<body>

<h1>User Dashboard</h1>
<p>Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>
<a href="logout.php">Logout</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><a href="edit.php?id=<?= $user['id'] ?>">Edit</a></td>
            <td><button onclick="confirmDelete(<?= $user['id'] ?>)">Delete</button></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
