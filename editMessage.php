<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'userinfo');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user message details by ID
    $query = "SELECT * FROM userdata WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $user = $row['user'];
        $email = $row['email'];
        $message = $row['message'];
    } else {
        echo "Message not found!";
        exit();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    // Update query
    $updateQuery = "UPDATE userdata SET user='$user', email='$email', message='$message' WHERE id=$id";

    if (mysqli_query($connection, $updateQuery)) {
        echo "<script>alert('Message updated!'); window.location.href='contact-messages.php';</script>";
    } else {
        echo "Error updating message: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Message</title>
    <style>
        /* Styling for the form and button */
        .edit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        /* Form styling */
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Edit User Message</h2>

<!-- Edit Form -->
<form method="POST" action="editMessage.php">
    <input type="hidden" name="id" value="<?= $id ?>">

    <label for="user">Name:</label>
    <input type="text" id="user" name="user" value="<?= htmlspecialchars($user) ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required><?= htmlspecialchars($message) ?></textarea>

    <button type="submit" class="edit-btn">Update Message</button>
</form>

</body>
</html>


