<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="../public/styles/shared.css">
    <link rel="stylesheet" href="/public/styles/about-us.css">
    <link rel="stylesheet" href="../public/styles/header.css">
    <script src="../public/script/header.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../public/styles/hotels.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="/public/images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p id="title"><a href="index.php"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>

        <div class="navigation" id="navigation">
            <div class="nav-item item-close-button">
                <button class="close-button" onclick="closeMenu()"><img class="close-icon" src="/public/images/close.jpg"
                        alt="close-icon" /></button>
            </div>
            <div class="nav-item">
                <a class="nav-item-href primary-button" href="../view/log-in.php">
                    Join us
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-item-href" href="../view/about.html">
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
                        <li><a href="../viewuk.php">UK</a></li>
                        <li><a href="../view/greece.php">Greece</a></li>
                        <li><a href="../view/spain.php">Spain</a></li>
                    </ul>
                </div>
                </a>
            </div>
        </div>
        <div class="burger-menu">
            <button onclick="openMenu()"><img class="burget-icon" src="/public/images/burger.jpg" alt="burger-icon" /></button>
        </div>
    </header>
    <main>
        <div class="headd">
            <div class="button1"><img src="/public/images/hotel.png" alt="hotel"></div>
            <div class="button2"><a href="../view/tickets.php"><img src="/public/images/plane.jpg" alt="plane"></a></div>
        </div>
        <div class="foto" style="background-image: url(images/bgg.avif);">
            <div class="fotot">
                <div class="city-box" data-city="Paris">
                    <img src="/public/images/paris.jpg" alt="Paris">
                    <p>Paris, France</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Budapest">
                    <img src="/public/images/budapest.jpg" alt="Budapest">
                    <p>Budapest, Hungary</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="NewYork">
                    <img src="/public/images/new york.jpg" alt="New York">
                    <p>New York, USA</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Tirana">
                    <img src="/public/images/tirana.jpg" alt="tirana">
                    <p>Tirana, Albania</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Prishtine">
                    <img src="/public/images/prishtina.jpg" alt="prishtina">
                    <p>Prishtine, Kosova</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Rome">
                    <img src="/public/images/rome.jpg" alt="rome">
                    <p>Rome, Italy</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Berlin">
                    <img src="/public/images/berlin.webp" alt="berlin">
                    <p>Berlin, Germany</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

                <div class="city-box" data-city="Stockholm">
                    <img src="/public/images/sweden.jpg" alt="sweden">
                    <p>Stockholm, Sweden</p>
                    <button onclick="openRestaurantModal()">Book a Table</button>
                </div>

            </div>
        </div>

        <!-- Restaurant Booking Modal -->
        <div id="restaurantBookingModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeRestaurantModal()">&times;</span>
                <h3>Reserve Your Table</h3>
                <form id="restaurantBookingForm" action="../controller/reservation.php" method="POST">
                    <h4>Contact Information</h4>
                    <input type="text" id="fullName" name="full_name" placeholder="Full Name" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="tel" id="phone" name="phone" placeholder="Phone" required pattern="^\+?[0-9]{10,15}$" title="Enter a valid phone number (10-15 digits)">

                    <h4>Available Time Choice</h4>
                    <label for="check_in">Date</label>
                    <input type="date" id="check_in" name="check_in" required>

                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" required>

                    <h4>Table Size</h4>
                    <label for="people">Number of People</label>
                    <input type="number" id="people" name="people" min="1" required>

                    <h4>Select Restaurant</h4>
                    <select name="restaurant" id="restaurant" required>
                        <option value="1">La Piazza</option>
                        <option value="2">Gourmet Bistro</option>
                        <option value="3">Sunset Grill</option>
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
                            <img class="last-img" src="/public/images/facebook.jpg" alt="facebook">
                        </a>

                    <li>
                        <a href="https://www.instagram.com">
                            <img class="last-img" src="/public/images/insta.jpg" alt="instagram">
                    </li>
                    </a>
                    <li>
                        <a href="https://www.linkedIn">
                            <img class="last-img" src="/public/images/in.jpg" alt="linkedin">
                    </li>
                    </a>
                    <li>
                        <a href="https://www.youtube.com">
                            <img class="last-img" src="/public/images/youtube.jpg" alt="youtube">
                    </li>
                    </a>
                    <li><a href="https://twitter.com">
                            <img class="last-img" src="/public/images/twitter.jpg" alt="twitter"></li>
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