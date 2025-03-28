<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "userinfo";
    private $port = 3306;
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class Message {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMessages() {
        $query = "SELECT id, user, email, message FROM userdata";
        $stmt = $this->db->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

$database = new Database();
$messageObj = new Message($database);
$messages = $messageObj->getAllMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Messages</title>
    <style>
        table { width: 80%; margin: 0 auto; padding-top: 20px; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .edit-btn { background-color: #4CAF50; color: white; padding: 5px 10px; border: none; cursor: pointer; }
        .edit-btn:hover { background-color: #45a049; }
        .delete-btn { background-color: #f44336; color: white; padding: 5px 10px; border: none; cursor: pointer; }
        .delete-btn:hover { background-color: #e53935; }
    </style>
</head>
<body>
<h2 style="text-align: center;">User Messages</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Email</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['user']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td>
                    <a href='editMessage.php?id=<?= $row['id'] ?>'><button class='edit-btn'>Edit</button></a>
                    <a href='deleteMessage.php?id=<?= $row['id'] ?>' onclick='return confirm("Are you sure?")'>
                        <button class='delete-btn'>Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>




