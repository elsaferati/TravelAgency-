<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'userinfo');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get message ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated form data
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Update the message in the database
    $query = "UPDATE `userdata` SET `user` = '$user', `email` = '$email', `message` = '$message' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Message updated successfully!'); window.location.href='contact-messages.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Fetch the message details for editing
$query = "SELECT * FROM `userdata` WHERE `id` = '$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

// If the record is not found, redirect to the contact messages page
if (!$row) {
    echo "<script>window.location.href='contact-messages.php';</script>";
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Message</title>
</head>
<body>

<h2>Edit User Message</h2>

<form action="editMessage.php?id=<?php echo $id; ?>" method="POST">
    <label for="user">Name:</label>
    <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($row['user']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required><?php echo htmlspecialchars($row['message']); ?></textarea>

    <button type="submit">Update Message</button>
</form>

</body>
</html>
