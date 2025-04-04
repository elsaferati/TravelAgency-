<?php
require_once 'contactDatabase.php';
require_once 'contactMessages.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $messageObj = new Message();
    $message = $messageObj->getMessageById($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if ($messageObj->update($id, $user, $email, $message)) {
            echo "<script>alert('Message updated!'); window.location.href='contact-messages.php';</script>";
        } else {
            echo "Error updating message: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User Message</title>
</head>
<body>
    <h2>Edit User Message</h2>
    <form method="POST" action="editMessage.php?id=<?= $id ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="user">Name:</label>
        <input type="text" name="user" value="<?= htmlspecialchars($message['user']) ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($message['email']) ?>" required>
        
        <label for="message">Message:</label>
        <textarea name="message" required><?= htmlspecialchars($message['message']) ?></textarea>
        
        <button type="submit">Update Message</button>
    </form>
</body>
</html>



