<?php
$userId = $_GET['id'];
include_once 'userRepository.php';



$userRepository = new UserRepository();

$user  = $userRepository->getUserById($userId);


?>


