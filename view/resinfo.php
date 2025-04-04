<?php
include '../model/bookingres.php';

$booking = new Booking();
$bookings = $booking->getAllBookings();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Link to Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/styles/header.css">
  <link rel="stylesheet" href="../public/styles/admin.css">
  <script src="../public/script/header.js" type="text/javascript"></script>
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
    }

    table {
      width: 90%;
      margin: 20px auto;
      margin-left: 15rem;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid #ddd;
    }

    th,
    td {
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
        <a href="../view/admin.php">
          <h2>Admin Panel</h2>
        </a>
        <ul>
          <li><a href="../view/bookingsInfo.php"><i class="fas fa-bed"></i> Hotel Booking</a></li>
          <li><a href="../view/resinfo.php"><i class="fas fa-utensils"></i> Restaurant Reservations</a></li>
          <li><a href=""><i class="fas fa-sign-in-alt"></i> Login</a></li>
          <li><a href=""><i class="fas fa-user-plus"></i> Register</a></li>
          <li><a href="../view/contact-messages.php"><i class="fas fa-envelope"></i> Contact-us</a></li>
          <li><a href="../view/bookedtickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
        </ul>
      </div>

      <!-- Content on the right -->
      <div class="content">
        <h1>Reservations List</h1>

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date</th>
              <th>Time</th>
              <th>Table Size</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($bookings)): ?>
              <?php foreach ($bookings as $row): ?>
                <tr>
                  <td><?= htmlspecialchars($row['id']) ?></td>
                  <td><?= htmlspecialchars($row['name']) ?></td>
                  <td><?= htmlspecialchars($row['email']) ?></td>
                  <td><?= htmlspecialchars($row['phonenumber']) ?></td>
                  <td><?= htmlspecialchars($row['date']) ?></td>
                  <td><?= htmlspecialchars($row['time']) ?></td>
                  <td><?= htmlspecialchars($row['nrpersons']) ?></td>
                  <td class="actions">
                    <a href="../controller/editres.php?id=<?= $row['id'] ?>"><button class="edit-btn">Edit</button></a>
                    <a href="../controller/deleteres.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')"><button class="delete-btn">Delete</button></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8">No bookings found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>

</html>