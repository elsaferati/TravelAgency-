<?php
require_once 'contactDatabase.php';  // Including the updated database file
require_once 'contactMessages.php';  // Including the updated messages file

$connection = mysqli_connect('localhost', 'root', '', 'userinfo');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id, user, email, message FROM contactMessages";
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
        /* Styling for table, th, td */
        table {
            width: 80%; /* Adjust width as needed */
            margin: 0 auto; /* Centers the table horizontally */
            display: block;
            padding-top: 20px; /* Optional: adds some space from the top */
        }

        th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Button styling inside table */
        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        /* Edit button style */
        .edit-btn {
            background-color: #4CAF50; 
            color: white;
        }

        .edit-btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        /* Delete button style */
        .delete-btn {
            background-color: #f44336; 
            color: white;
        }

        .delete-btn:hover {
            background-color: #e53935; /* Darker red on hover */
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
            echo "<td class='actions'>
                    <a href='modifyMessage.php?id=" . $row['id'] . "'>
                        <button class='edit-btn'>Edit</button>
                    </a> | 
                    <a href='removeMessage.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this message?\")'>
                        <button class='delete-btn'>Delete</button>
                    </a>
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






