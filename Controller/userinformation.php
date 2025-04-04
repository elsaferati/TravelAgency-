<?php
require_once '../controller/contactDatabase.php';
require_once '../model/contactMessages.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    $messageObj = new Message();
    if ($messageObj->create($user, $email, $message)) {
        echo "<script>alert('Message is sent!'); window.location.href='contact-us.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>



