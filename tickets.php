<?php
require_once 'models/Ticket.php';
session_start();

$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

$ticket = new Ticket();
$tickets = $ticket->read();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tickets</title>
  <link rel="stylesheet" href="styles/shared.css">
    <link rel="stylesheet" href="styles/about-us.css">
    <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/tickets.css">
  <script src="script/header.js" type="text/javascript"></script>
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
                        <li><a href="albania.php">Albania</a></li>
                        <li><a href="sweden.html">Sweden</a></li>
                        <li><a href="italy.php">Italy</a></li>
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
                    src="images/burger.jpg" alt="burger-icon" /></button>
        </div>
    </header>
  <main>
      <div class="headd">
        <div class="button2"><img src="images/plane.jpg" alt="plane"></div>
        <div class="button1"><img src="images/hotel.png" alt="hotel"></div>
        
      </div>
    <div class="foto" style="background-image: url(images/foto.jpg);">
      <div class="checkbox">
        <div class="type">
          <div class="check">
           <a href="oneway.html"><input type="button" value="One-way"></a> </div>
          <div class="check">
            <input type="button" value="Return"></div>
        </div>
        <hr>
        <div class="destinations">
          <div class="from">
          <form action="actions/create.php" method="POST">
            <label for="from">From</label>
            <div class="option">
              <select name="city" id="city"
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
            <label for="to">To</label>
            <div class="option2">
              <select name="city2" id="city2"
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
          <div class="date1">
            <label>Date</label>
            <div>
              <input type="date"
                style="width: 300px; height: 40px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            </div>
          </div>
          <div class="date2">
            <label>Return-Date</label>
            <div>
              <input type="date"
                style="width: 300px; height: 40px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            </div>
          </div>
        </div>
        <div class="end">
          <div class="passengers">
            <label>Passengers</label>
            <select name="p" id="p"
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
            <label>Class</label>
            <select name="c" id="c"
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
            </form>
            <?php if ($isAdmin): ?>
      <h2>Booked Tickets</h2>
      <table border="1">
        <tr>
          <th>ID</th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>
          <th>Return Date</th>
          <th>Passengers</th>
          <th>Class</th>
          <th>Action</th>
        </tr>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
          <td><?php echo $ticket['id']; ?></td>
          <td><?php echo $ticket['from_location']; ?></td>
          <td><?php echo $ticket['to_location']; ?></td>
          <td><?php echo $ticket['date']; ?></td>
          <td><?php echo $ticket['return_date']; ?></td>
          <td><?php echo $ticket['passengers']; ?></td>
          <td><?php echo $ticket['class']; ?></td>
          <td>
          <form action="actions/delete.php" method="POST" style="display:inline;">
              <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
              <button type="submit">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
   


  </main>
  <footer>
    <div id="footer-part">
        <section id="social-part">
       <h3>Social</h3>
         <ul class="footer-content-special">
   <li > 
       <a href="https://www.facebook.com">
           <img class="last-img" src="images/facebook.jpg" alt="facebook">
       </a>
      
   <li>
       <a href="https://www.instagram.com">
           <img  class="last-img" src="images/insta.jpg" alt="instagram"></li>
       </a>
   <li> 
       <a href="https://www.linkedIn">
           <img  class="last-img" src="images/in.jpg" alt="linkedin"></li>
       </a>
    <li> 
       <a href="https://www.youtube.com">
           <img  class="last-img" src="images/youtube.jpg" alt="youtube"></li>
       </a>
    <li><a href="https://twitter.com"> 
       <img  class="last-img" src="images/twitter.jpg" alt="twitter"></li>
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