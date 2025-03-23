<?php
include_once 'config2.php';
include_once 'DatabaseConnection.php';



class UserRepository
{
    private $connection;
    private $table = 'crudtable';

    function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->connection = $dbConnection->startConnection();
    }


    function insertUser($user)
    {

        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO $this->table (id,name,email,password) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id, $name, $email, $password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }
