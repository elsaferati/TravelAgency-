<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotels</title>
  <link rel="stylesheet" href="styles/shared.css">
    <link rel="stylesheet" href="styles/about-us.css">
    <link rel="stylesheet" href="styles/header.css">
  <script src="script/header.js" type="text/javascript"></script>
  <link rel="stylesheet" href="styles/hotels.css">
</head>
<body>
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
            <button class="close-button" onclick="closeMenu()"><img class="close-icon" src="images/close.jpg"
                    alt="close-icon" /></button>
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
                    <li><a href="albania.php">Albania</a></li>
                    <li><a href="sweden.php">Sweden</a></li>
                    <li><a href="italy.php">Italy</a></li>
                    <li><a href="uk.php">UK</a></li>
                    <li><a href="greece.php">Greece</a></li>
                    <li><a href="spain.php">Spain</a></li>
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
    <div class="headd">
      <div class="button1"><img src="images/hotel.png" alt="hotel"></div>
      <div class="button2"><a href="tickets.php"><img src="images/plane.jpg" alt="plane"></a></div>
    </div>
    <div class="foto" style="background-image: url(images/bgg.avif);">
      <div class="fotot">
          <div class="city-box" data-city="Paris">
              <img src="images/paris.jpg" alt="Paris">
              <p>Paris, France</p>
              <button class="book-button" onclick="openRestaurantModal()">Book</button>
          </div>
  
          <div class="city-box" data-city="Budapest">
              <img src="images/budapest.jpg" alt="Budapest">
              <p>Budapest, Hungary</p>
              <button class="book-button" onclick="openRestaurantModal()">Book</button>
          </div>
  
          <div class="city-box" data-city="NewYork">
              <img src="images/new york.jpg" alt="New York">
              <p>New York, USA</p>
              <button class="book-button" onclick="openRestaurantModal()">Book</button>
          </div>

            <div class="city-box" data-city="Tirana">
                <img src="images/tirana.jpg" alt="tirana">
                <p>Tirana, Albania</p>
                <button class="book-button" onclick="openRestaurantModal()">Book</button>
            </div>

            <div class="city-box" data-city="Prishtine">
                <img src="images/prishtina.jpg" alt="prishtina">
                <p>Prishtine, Kosova</p>
                <button class="book-button" onclick="openRestaurantModal()">Book</button>
            </div>

            <div class="city-box" data-city="Rome">
                <img src="images/rome.jpg" alt="rome">
                <p>Rome, Italy</p>
                <button class="book-button" onclick="openRestaurantModal()">Book</button>
            </div>

            <div class="city-box" data-city="Berlin">
                <img src="images/berlin.webp" alt="berlin">
                <p>Berlin, Germany</p>
                <button class="book-button" onclick="openRestaurantModal()">Book</button>
            </div>

            <div class="city-box" data-city="Stockholm">
                <img src="images/sweden.jpg" alt="sweden">
                <p>Stockholm, Sweden</p>
                <button class="book-button" onclick="openRestaurantModal()">Book</button>
            </div>

        </div>
    </div>

<!-- Restaurant Booking Modal -->
<div id="restaurantBookingModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeRestaurantModal()">&times;</span>
        <h3>Reserve Your Table</h3>
        <form id="restaurantBookingForm" action="reservation.php" method="POST">
            <input type="text" id="fullName" name="full_name" placeholder="Full Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="tel" id="phone" name="phone" placeholder="Phone" required pattern="^\+?[0-9]{10,15}$" title="Enter a valid phone number (10-15 digits)">
            
            <label for="checkIn">Check-in Date</label>
            <input type="date" id="checkIn" name="check_in" required>

            <label for="time">Reservation Time</label>
            <input type="time" id="time" name="time" required>

            <label for="people">Number of People</label>
            <input type="number" id="people" name="people" required min="1">

            <label for="restaurant">Select Restaurant</label>
            <select id="restaurant" name="restaurant" required>
                <option value="La Piazza">La Piazza</option>
                <option value="Gourmet Bistro">Gourmet Bistro</option>
            </select>
            
            <button type="submit">Confirm Reservation</button>
        </form>
    </div>
</div>

<script>
   // Function to open the restaurant booking modal
function openRestaurantModal() {
    document.getElementById("restaurantBookingModal").style.display = "block";
}

// Function to close the restaurant booking modal
function closeRestaurantModal() {
    document.getElementById("restaurantBookingModal").style.display = "none";
}

// Close the modal if the user clicks anywhere outside of the modal content
window.onclick = function(event) {
    if (event.target == document.getElementById("restaurantBookingModal")) {
        closeRestaurantModal();
    }
};

</script>
  
    
  </main>
  <footer>
    <div id="footer-part">
        <section id="social-part">
            <h3>Social</h3>
            <ul class="footer-content-special">
                <li>
                    <a href="https://www.facebook.com">
                        <img class="last-img" src="images/facebook.jpg" alt="facebook">
                    </a>

                <li>
                    <a href="https://www.instagram.com">
                        <img class="last-img" src="images/insta.jpg" alt="instagram">
                </li>
                </a>
                <li>
                    <a href="https://www.linkedIn">
                        <img class="last-img" src="images/in.jpg" alt="linkedin">
                </li>
                </a>
                <li>
                    <a href="https://www.youtube.com">
                        <img class="last-img" src="images/youtube.jpg" alt="youtube">
                </li>
                </a>
                <li><a href="https://twitter.com">
                        <img class="last-img" src="images/twitter.jpg" alt="twitter"></li>
                </a>


            </ul>
        </section>

        <section>
            <h3>Product</h3>
            <ul class="footer-content">
                <li>
                    <p>The plum test</p>
                </li>
                <li>
                    <p>Become a host</p>
                </li>
                <li>
                    <p>Affiliate program</p>
                </li>
            </ul>
        </section>
        <section>
            <h3>Company</h3>
            <ul class="footer-content">
                <li>
                    <p>Our story</p>
                </li>
                <li>
                    <p>Journal</p>
                </li>
                <li>
                    <p>Careers</p>
                </li>
            </ul>
        </section>
        <section>
            <h3>Contact</h3>
            <ul class="footer-content">
                <li>
                    <p>Partenship</p>
                </li>
                <li>
                    <p>FAQ</p>
                </li>
                <li>
                    <p>Get in touch</p>
                </li>
            </ul>
        </section>
    </div>


</footer>
</body>

</html>