<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Overpass:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/shared.css">
    <link rel="stylesheet" href="styles/about-us.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/contact-us.css">
    <script src="script/header.js" type="text/javascript"></script>
    <title>Contact-us</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p  id="title"><a href="index.html"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>
    
        <div class="navigation" id="navigation">
            <div class="nav-item item-close-button">
                <button class="close-button" onclick="closeMenu()"><img class="close-icon" src="images/close.jpg" alt="close-icon" /></button>
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
            <button onclick="openMenu()"><img class="burget-icon" src="images/burger.jpg" alt="burger-icon" /></button>
        </div>
    </header>
    <main>
        <div class="contact"><h1>Contact Us</h1></div>
        <div class="img">
            <img src="images/contact-us.jpg" alt="">
             
    <form id="contactForm" action="userinformation.php" method="post" onsubmit="sendMessage(event)">
    <label for="user">Name:</label>
    <input type="text" id="user" name="user" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit">Send Message</button>
</form>
        </div>
       
        <script>
            function sendMessage(event) {
    event.preventDefault(); 

    var name = document.getElementById('user').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  
    if (name.trim() === '') {
        alert('Please enter your name.');
        return;
    }

    if (email.trim() === '') {
        alert('Please enter your email.');
        return;
    } else if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    if (message.trim() === '') {
        alert('Please enter your message.');
        return;
    }

   
    document.getElementById('contactForm').submit();  
    alert('Your message was successfully sent');
}

        </script>
    </main>
    <footer>
        <div id="footer-part">
            <section id="social-part">
                <h3>Social</h3>
                <ul class="footer-content-special">
                    <li><a href="https://www.facebook.com"><img class="last-img" src="images/facebook.jpg" alt="facebook"></a></li>
                    <li><a href="https://www.instagram.com"><img class="last-img" src="images/insta.jpg" alt="instagram"></a></li>
                    <li><a href="https://www.linkedin.com"><img class="last-img" src="images/in.jpg" alt="linkedin"></a></li>
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
                    <li><p>Partnership</p></li>
                    <li><p>FAQ</p></li>
                    <li><p>Get in touch</p></li>
                </ul>
            </section>
        </div>
    </footer>
</body>
</html>
