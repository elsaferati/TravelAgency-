<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tickets</title>
  <link rel="stylesheet" href="../public/styles/shared.css">
  <link rel="stylesheet" href="../public/styles/about-us.css">
  <link rel="stylesheet" href="../public/styles/header.css">
  <link rel="stylesheet" href="../public/styles/tickets.css">
  <script src="../public/script/header.js" type="text/javascript"></script>
</head>

<body>
  <header>
    <div class="logo-container">
      <div class="logo-image-container">
        <img class="logo" src="../public/images/2(1).png" alt="Logo" />
      </div>
      <div class="logo-text-container">
        <p id="title"><a href="index.php"><strong>W A V E</strong></a></p>
        <p id="under-title">Do More Than Travel</p>
      </div>
    </div>

    <div class="navigation" id="navigation">
      <div class="nav-item item-close-button">
        <button class="close-button" onclick="closeMenu()"><img class="close-icon"
            src="../public/images/close.jpg" alt="close-icon" /></button>
      </div>
      <div class="nav-item">
        <a class="nav-item-href primary-button" href="log-in.php">
          Join us
        </a>
      </div>
      <div class="nav-item">
        <a class="nav-item-href" href="../about.html">
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
      <button onclick="openMenu()"><img class="burget-icon"
          src="../public/images/burger.jpg" alt="burger-icon" /></button>
    </div>
  </header>
  <main>
    <div class="headd">
      <div class="button2"><img src="../public/images/plane.jpg" alt="plane"></div>
      <div class="button1"><a href="../view/hotels.php"><img src="../public/images/hotel.png" alt="hotel"></a></div>

    </div>
    <div class="foto" style="background-image: url(../public/images/foto.jpg);">
      <div class="checkbox">
        <div class="type">
          <div class="check">
            <a href="../oneway.html"><input type="button" value="One-way"></a>
          </div>
          <div class="check">
            <input type="button" value="Return">
          </div>
        </div>
        <hr>
        <div class="destinations">
          <div class="from">
            <form method="POST" action="../controller/create_ticket.php">
              <label for="from_city">From</label>
              <div class="option">
                <select name="from_city" required
                  style="width: 300px; height: 40px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                  <option value="#"></option>
                  <option value="Italy">Rome,Italy</option>
                  <option value="Albania">Tirana,Albania</option>
                  <option value="Kosova">Prishtine,Kosova</option>
                  <option value="USA">New York,USA</option>
                  <option value="Budapest">Budapest,Hungary</option>
                  <option value="France">Paris,France</option>
                  <option value="Japan">Tokyo,Japan</option>
                  <option value="Germany">Berlin,Germany</option>
                </select>
              </div>
          </div>
          <div class="to">
            <label for="to_city">To</label>
            <div class="option2">
              <select name="to_city" required
                style="width: 300px; height: 40px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                <option value="#"></option>
                <option value="Italy">Rome,Italy</option>
                <option value="Albania">Tirana,Albania</option>
                <option value="Kosova">Prishtine,Kosova</option>
                <option value="USA">New York,USA</option>
                <option value="Budapest">Budapest,Hungary</option>
                <option value="France">Paris,France</option>
                <option value="Japan">Tokyo,Japan</option>
                <option value="Germany">Berlin,Germany</option>
              </select>
            </div>
          </div>
        </div>
        <div class="datat">
          <label for="departure_date">Departure Date:</label>
          <input type="date" name="departure_date" required><br>

          <label for="return_date">Return Date:</label>
          <input type="date" name="return_date"><br>
        </div>
        <div class="end">
          <div class="passengers">
            <label for="passengers">Passengers:</label>
            <select name="passengers" required
              style="border-radius: 50px; height: 30px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
              <option value="#"></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="class">
            <label for="class">Class:</label>
            <select name="class" required
              style="border-radius: 50px; height: 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
              <option value="#"></option>
              <option value="economy">Economy</option>
              <option value="business">Business</option>
              <option value="first">First</option>
              <option value="premium">Premium</option>
            </select>
          </div>
          <div class="searchbox">
            <input type="submit" value="Book your ticket">

          </div>
        </div>
      </div>



  </main>
  <footer>
    <div id="footer-part">
      <section id="social-part">
        <h3>Social</h3>
        <ul class="footer-content-special">
          <li>
            <a href="https://www.facebook.com">
              <img class="last-img" src="../public/images/facebook.jpg" alt="facebook">
            </a>

          <li>
            <a href="https://www.instagram.com">
              <img class="last-img" src="../public/images/insta.jpg" alt="instagram">
          </li>
          </a>
          <li>
            <a href="https://www.linkedIn">
              <img class="last-img" src="../public/images/in.jpg" alt="linkedin">
          </li>
          </a>
          <li>
            <a href="https://www.youtube.com">
              <img class="last-img" src="../public/images/youtube.jpg" alt="youtube">
          </li>
          </a>
          <li><a href="https://twitter.com">
              <img class="last-img" src="../public/images/twitter.jpg" alt="twitter"></li>
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