<?php
session_start();
<<<<<<< Updated upstream
include_once 'DatabaseConnection.php';
=======
require_once('configV.php'); // Database connection
>>>>>>> Stashed changes

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginbtn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

<<<<<<< Updated upstream
require_once __DIR__ . '/config2.php';
include_once 'userRepository.php';
include_once __DIR__ . '/user.php';

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        die("Please fill in both email and password!");
    } else {
        // Retrieve user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Initialize database connection
        $dbConnection = new DatabaseConnection();
        $conn = $dbConnection->startConnection();

        // Query the database for the user with the provided email
        $sql = "SELECT * FROM crudtable WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If user is found and password matches
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Assuming 'role' column exists in the table

            // Redirect based on user role
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();  // Stop further script execution
            } else {
                header("Location: user_dashboard.php");
                exit();  // Stop further script execution
            }
        } else {
            // Incorrect login details
            die("Incorrect Username or Password!");
        }
=======
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields!";
    } else {
        // Check database connection
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Prepare a statement to get user details securely
        $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            // Regenerate session ID for security
            session_regenerate_id(true);

            // Store user details in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect email or password!";
        }
>>>>>>> Stashed changes
    }
}

// Check for error messages
$error_message = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']); // Clear error after displaying
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Overpass:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
=======
    <title>Login</title>
>>>>>>> Stashed changes
    <link rel="stylesheet" href="styles/log-in-style.css">
</head>
<body>
<<<<<<< Updated upstream
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p id="title"><a href="index.html"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>

        <div class="navigation" id="navigation">
            <div class="nav-item item-close-button">
                <button class="close-button" onclick="closeMenu()"><img class="close-icon"
                        src="images/close.jpg" alt="close-icon" /></button>
            </div>
            <div class="nav-item">
                <a class="nav-item-href primary-button" href="log-in.php">
                    Join us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="about.html">
                    <nav>About us</nav>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="contact-us.php">
                    Contact us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" id="menu" href="#"> Destinations </a>
                <div class="dropdown">
                    <ul>
                        <li><a href="albania.html">Albania</a></li>
                        <li><a href="sweden.html">Sweden</a></li>
                        <li><a href="italy.html">Italy</a></li>
                        <li><a href="uk.html">UK</a></li>
                        <li><a href="greece.html">Greece</a></li>
                        <li><a href="spain.html">Spain</a></li>
                    </ul>
                </div>
                </a>
            </div>
        </div>
        <div class="burger-menu">
            <button onclick="openMenu()"><img class="burget-icon"
                    src="images/burger.jpg" alt="burget-icon" /></button>
        </div>
    </header>

    <main>
        <div class="hero">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" controls>
                <source src="images/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
            </video>
            <div class="form-container">
                <form action="" method="post">
                    <h3>login now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="email" name="email" required placeholder="enter your email">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="submit" name="loginbtn" value="login now" class="form-btn">
                    <p>don't have an account? <a href="register_form.php">register now</a></p>
                </form>
            </div>
        </div>
    </main>

    <footer style="margin-top: 43.5rem;">
        <div id="footer-part">
            <section id="social-part">
                <h3>Social</h3>
                <ul class="footer-content-special">
                    <li><a href="https://www.facebook.com"><img class="last-img" src="images/facebook.jpg" alt="facebook"></a></li>
                    <li><a href="https://www.instagram.com"><img class="last-img" src="images/insta.jpg" alt="instagram"></a></li>
                    <li><a href="https://www.linkedIn"><img class="last-img" src="images/in.jpg" alt="linkedin"></a></li>
                    <li><a href="https://www.youtube.com"><img class="last-img" src="images/youtube.jpg" alt="youtube"></a></li>
                    <li><a href="https://twitter.com"><img class="last-img" src="images/twitter.jpg" alt="twitter"></a></li>
                </ul>
            </section>
            <section>
                <h3>Product</h3>
                <ul class="footer-content">
                    <li><p>The plum test</p></li>
                    <li><p>Become a host</p></li>
                    <li><p>Affiliate program</p></li>
                </ul>
            </section>
            <section>
                <h3>Company</h3>
                <ul class="footer-content">
                    <li><p>Our story</p></li>
                    <li><p>Journal</p></li>
                    <li><p>Careers</p></li>
                </ul>
            </section>
            <section>
                <h3>Contact</h3>
                <ul class="footer-content">
                    <li><p>Partenship</p></li>
                    <li><p>FAQ</p></li>
                    <li><p>Get in touch</p></li>
                </ul>
            </section>
        </div>
    </footer>
</body>
</html>



=======
    <form action="" method="post">
        <h3>Login Now</h3>
        
        <?php if (!empty($error_message)) { ?>
            <span class="error-msg"><?php echo $error_message; ?></span>
        <?php } ?>
        
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="submit" name="loginbtn" value="Login Now" class="form-btn">
        
        <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
    </form>
</body>
</html>
>>>>>>> Stashed changes
