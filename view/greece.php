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
         <link rel="stylesheet" href="styles/second-shared.css">
         <link rel="stylesheet" href="styles/header.css">
         <script src="script/header.js" type="text/javascript"></script>
        <title>Greece</title>
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
                    src="images/burger.jpg" alt="burget-icon" /></button>
        </div>
    </header>
<main>
    <section id="first-section">
        <ul>
            <li id="first-img">
                <img src="images/greece1.webp" alt="greece">
            </li>
            <li>
                 <img src="images/greece2.jpg" alt="greece">
            </li>
        </ul>
    </section>

    <section id="second-section">
        <img src="images/home.jpg" alt="">
         <p id="title">Book a stay in one of the best homes in Greece</p>
           <p>We selected the 1349 homes worth renting in this location</p> 
           <ul id="input">
         <li id="date">
                <label for="date"></label>
             <input type="date" name="date" id="date" min="2023-10-01" placeholder="Reserve your date">
             
         </li>
           <li>
            <form action="search" method="get">
                <input type="text" name="q" placeholder="Search..." />
                <button type="submit">Search</button>
             </form>
         </li>
           </ul>
    </section>
       

    <section id="third-section">
        <style>
            .btn{
                padding: 10px 25px; 
                border-radius: 6px; 
                margin-left: 7rem; 
                margin-top: 2rem;
                cursor: pointer;
                box-shadow:  1px 3px 4px rgb(72, 69, 69);
                background-color: rgb(153, 148, 148);
            }
            .btn:hover{
                background-color: rgb(147, 141, 141);
            }
        </style>
        <ul>
            <li>
                <img src="images/greece3.webp" alt="greece">
                <div>
                    <h2>Montorgueil Gem</h2>
                <p>6 guests, 3 bedrooms, 3 bathrooms</p>
                <p class="title2">Greece</p>
                <p>
                    You'll be right in the swing of things with a stay at this 18th-century apartment in the heart of the 2nd Arrondissement
                     and just a three-minute stroll from the Metro. Take your pick from the blockbuster sights 
                     the Louvre, Palais Royal, and Notre Dame are all just a short jaunt away. </p>
                     <a href="hotels.html"><button  class="btn" type="button">Book</button></a>
                </div>
                
            </li>
            <li>
                <img src="images/greece4.webp" alt="greece">
                <div>
                    <h2>Durance</h2>
                <p>5 guests, 2 bedrooms, 2 bathrooms</p>
                <p class="title2">Greece</p>
                <p>
                    You'll be right in the swing of things with a stay at this 18th-century apartment in the heart of the 2nd Arrondissement
                     and just a three-minute stroll from the Metro. Take your pick from the blockbuster sights 
                     the Louvre, Palais Royal, and Notre Dame are all just a short jaunt away. </p>
                     <a href="hotels.html"><button  class="btn" type="button">Book</button></a>
                </div>
                
            </li>
            <li>
                <img src="images/greece5.webp" alt="greece">
                <div>
                   <h2>La Fontaine</h2>
                <p>3 guests, 2 bedrooms, 1 bathroom</p>
                <p class="title2">Greece</p>
                <p>
                    You'll be right in the swing of things with a stay at this 18th-century apartment in the heart of the 2nd Arrondissement
                     and just a three-minute stroll from the Metro. Take your pick from the blockbuster sights 
                     the Louvre, Palais Royal, and Notre Dame are all just a short jaunt away. </p> 
                     <a href="hotels.html"><button  class="btn" type="button">Book</button></a>
                </div>
                
            </li>
        </ul>
    </section>

<hr>  

    <section id="sixth-section">
        <h1 style="margin-left: 1rem; font-weight: bold;">Popular places in Greece</h1>
        <div class="container2">
            <div class="box one "  data-text="Meteora"><img src="images/meteora.webp" alt=""></div>
            <div class="box two " data-text="Cephalonia"><img src="images/cephalonia.webp" alt=""></div>
            <div class="box three " data-text="Delphi"><img src="images/delphi.webp" alt=""></div>
            <div class="box four " data-text="Andros"><img src="images/androswebp.webp" alt=""></div>
            <div class="box five " data-text="Rhodes"><img src="images/hodes.webp" alt=""></div>
        </div>

    </section>

    <section id="fourth-section">
        <h1>Popular in Greece</h1>
        <ul>
            <li>
               <img src="images/food.jpg" alt="food"> 
               <p>Amazing food</p>
            </li>
            <li>
                
            <img src="images/party.jpg" alt="party">
            <p>Great party</p>
            </li>
            <li>
                <img src="images/pool.jpg" alt="pool">
                <p>Swimming pool</p>
            </li>
            <li>
                
            <img src="images/service.webp" alt="room-service">
            <p>Room service</p>
            </li>
            <li>
                <img src="images/community.jpg" alt="community">
                <p>Large Groups</p>
            </li>
            
        </ul>
    </section>

  



    <section id="fifth-section">
        <img src="images/greece6.webp" alt="lokacioni">
        <ul id="whole-part">
            <h2>Get around</h2>
           <ul class="in">
               <ul class="right">
              <li  class="top"><p>Train station</p></li>
              <li class="title1"><p>Ourense-San Francisco</p></li>
          </ul>
          <li class="left"><p>1 hr 46 min</p></li>
       </ul>
       <ul class="in">
       
           <ul class="right">
              <li  class="top"><p>Train station</p></li>
              <li class="title1"><p>Ourense</p></li>
          </ul>
          <li class="left"><p>2 hr 18 min</p></li>
       </ul>
       <ul class="in">
       
           <ul class="right">
              <li  class="top"><p>Train station</p></li>
              <li class="title1"><p>Barbantes</p></li>
          </ul>
          <li><p class="left">4 hr 52 min</p></li>
       </ul>
       <ul class="in">

           <ul class="right">
              <li class="top"><p>Bus stop</p></li>
              <li class="title1"><p>Soutopenedo Bar Avenida</p></li>
          </ul>
          <li><p class="left">46 min</p></li>
       </ul>
       </ul>

    </section>

    
    <!-- Booking Modal -->
<div id="bookingModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Book Your Room</h3>
        <form id="bookingForm" action="bookInfo.php" method="POST">
            <input type="text" id="fullName" name="full_name" placeholder="Full Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="tel" id="phone" name="phone" placeholder="Phone" required pattern="^\+?[0-9]{10,15}$" title="Enter a valid phone number (10-15 digits)">
            <label for="checkIn">Check-in Date</label>
            <input type="date" id="checkIn" name="check_in" required>
            <label for="checkOut">Check-out Date</label>
            <input type="date" id="checkOut" name="check_out" required>
            <label for="price">Total Price ($)</label>
            <input type="text" id="price" name="total_price" readonly>
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</div>

<script src="script/header.js" defer></script>
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