<?php
require_once 'contactDatabase.php';  // Including the updated database file
require_once 'contactMessages.php';  // Including the updated messages file

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
  <title>Dashboard</title>
  <!-- Link to Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/admin.css">
  <script src="script/header.js" type="text/javascript"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    main {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
      flex-direction: column;
      height: 100vh;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
    }

    table {
      width: 80%;
      margin: 20px auto;
      margin-left: 13rem;
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

    .actions button {
      margin-right: 5px;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #4CAF50;
      color: white;
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
    }

    .sidebar {
      width: 200px;
      background-color: #333;
      color: white;
      padding: 10px;
      position: fixed;
      height: 100%;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .sidebar ul li a i {
      margin-right: 10px;
    }
  </style>
</head>

<body>

  <main>
    <div class="container">
      <!-- Sidebar on the left -->
      <div class="sidebar">
      <a href="admin.php"><h2>Admin Panel</h2></a>
        <ul>
          <li><a href="bookingsInfo.php"><i class="fas fa-bed"></i> Hotel Booking</a></li>
          <li><a href="resinfo.php"><i class="fas fa-utensils"></i> Restaurant Reservations</a></li>
          <li><a href=""><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <li><a href=""><i class="fas fa-user-plus"></i> Register</a></li>
          <li><a href="contact-messages.php"><i class="fas fa-envelope"></i> Contact-us</a></li>
          <li><a href="bookedtickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
        </ul>
      </div>

      <!-- Title for User Messages -->
      <h1>User Messages</h2>

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
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['id']) . "</td>";
              echo "<td>" . htmlspecialchars($row['user']) . "</td>";
              echo "<td>" . htmlspecialchars($row['email']) . "</td>";
              echo "<td>" . htmlspecialchars($row['message']) . "</td>";
              echo "<td class='actions'>
                      <a href='editMessage.php?id=" . $row['id'] . "'>
                          <button class='edit-btn'>Edit</button>
                      </a> | 
                      <a href='deleteMessage.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this message?\")'>
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
    </div>
  </main>

</body>
</html>









