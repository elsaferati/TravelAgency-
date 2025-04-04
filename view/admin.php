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
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="../public/images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p id="title"><a href="../view/index.php"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>

        <div class="navigation" id="navigation">
            <div class="nav-item item-close-button">
                <button class="close-button" onclick="closeMenu()"><img class="close-icon" src="../public/images/close.jpg"
                        alt="close-icon" /></button>
            </div>
            <div class="nav-item">
                <a class="nav-item-href primary-button" href="../view/log-in.php">
                    Join us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="about.html">
                    <nav>About us</nav>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="../view/contact-us.php">
                    Contact us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" id="menu" href="#"> Destinations </a>
                <div class="dropdown">
                    <ul>
                        <li><a href="../view/albania.php">Albania</a></li>
                        <li><a href="../view/sweden.php">Sweden</a></li>
                        <li><a href="../view/italy.php">Italy</a></li>
                        <li><a href="../view/uk.php">UK</a></li>
                        <li><a href="../view/greece.php">Greece</a></li>
                        <li><a href="../view/spain.php">Spain</a></li>
                    </ul>
                </div>
                </a>
            </div>
        </div>
        <div class="burger-menu">
            <button onclick="openMenu()"><img class="burget-icon" src="../public/images/burger.jpg" alt="burger-icon" /></button>
        </div>
    </header>
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

            <!-- Main content area -->
            <div class="main-content">
                <h1>Welcome to the Admin Dashboard</h1>
                <p>Choose a section from the left sidebar to manage.</p>
            </div>
        </div>
    </main>
</body>

</html>