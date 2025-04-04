<?php
require_once '../config/contactDatabase.php';
require_once '../model/contactMessages.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $messageObj = new Message();
    if ($messageObj->delete($id)) {
        echo "<script>alert('Message deleted successfully!'); window.location.href='contact-messages.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

