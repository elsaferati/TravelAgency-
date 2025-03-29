<?php
// Include the DashboardController

require_once 'DashboardController.php';
// Initialize the DashboardController
$controller = new DashboardController();
$data = $controller->loadDashboard(); // Fetch the data for the dashboard

// Extract the data passed from the controller
$userData = $data['userData'];
$allUsers = $data['allUsers'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/log-in-style.css"> <!-- Your custom CSS -->
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($userData['name']); ?>!</h1>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($userData['role']); ?></p>

        <!-- Admin-only section: Display all users -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <h2>All Registered Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allUsers as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- Logout Button -->
        <div class="action-buttons">
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Need help? <a href="contact.php">Contact support</a></p>
        </div>
    </div>
</body>
</html>
