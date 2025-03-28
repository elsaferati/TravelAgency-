<?php

$connection = mysqli_connect('localhost', 'root', '', 'userinfo');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id, user, email, message FROM userdata";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Messages</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Button Styling */
        button, a.button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }

        button:hover, a.button:hover {
            background-color: #4CAF50; 
            color: #fff; 
        }

        button.delete, a.delete {
            background-color: #f44336; 
            color: white;
        }

        button.delete:hover, a.delete:hover {
            background-color: #e53935; 
        }

        button.edit, a.edit {
            background-color: #008CBA; 
            color: white;
        }

        button.edit:hover, a.edit:hover {
            background-color: #007bb5; 
        }
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
            <th>Actions</th> <!-- Added an Actions column -->
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
            echo "<td>
                    <a href='editMessage.php?id=" . $row['id'] . "' class='edit'>Edit</a> | 
                    <a href='deleteMessage.php?id=" . $row['id'] . "' class='delete' onclick='return confirm(\"Are you sure you want to delete this message?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php

mysqli_free_result($result);
mysqli_close($connection);
?>

</body>
</html>


