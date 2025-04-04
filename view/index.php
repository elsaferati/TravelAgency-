

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Overpass:wght@300&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/styles/shared.css">
    <link rel="stylesheet" href="../public/styles/style.css">
    <link rel="stylesheet" href="../public/styles/header.css">
    <script src="../public/script/header.js" type="text/javascript"></script>
    <title>Travel</title>
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo-image-container">
                <img class="logo" src="../public/images/2(1).png" alt="Logo" />
            </div>
            <div class="logo-text-container">
                <p id="title"><a href="../view.index.php"><strong>W A V E</strong></a></p>
                <p id="under-title">Do More Than Travel</p>
            </div>
        </div>

        <div class="navigation" id="navigation">
            <div class="nav-item item-close-button">
                <button class="close-button" onclick="closeMenu()"><img class="close-icon"
                        src="../public/images/close.jpg" alt="close-icon" /></button>
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
            <button onclick="openMenu()"><img class="burget-icon"
                    src="../public/images/burger.jpg" alt="burger-icon" /></button>
        </div>
    </header>
    <main>
        <section id="first-section">        
                <img src="../public/images/84.jpg" alt="Traveling">
    
                <div id="main-page-text">
                    <ul>
                        <li id="main-txt">
                            <p > <h1 >Let's  travel  together ...</h1></p>
                        </li>
                        <li id="under-main-txt" >
                          <p >The biggest adventure you can take is</p>
                          <p> to live the life of your dreams.</p>
                          <a href="../view/tickets.php"><button>Get your Ticket</button></a>
                        </li>
                    </ul>
            </div>
           
        </div>
        </section>
        <section id="second-section">
            <p>Book your dream stay !</p>
            
                <div>
                    <button class="icon" onclick="scrolll()"><i class="fas fa-angle-left"></i></button>
                </div>
                <div id="cover">
                 <ul id="scroll-images">
                <li class="child">
                    <a href="../view/spain.php">
                        <img class="cild-img" src="../public/images/barcelona.webp" alt="Barcelona">   
                    </a>
                </li>
                <li class="child">
                    <a href="../view/sweden.php">
                        <img class="cild-img" src="../public/images/stockholm.jpg" alt="Stockholm">
                    </a>
                </li>
                <li class="child">
                    <a href="../view/albania.php">
                        <img class="child-img" src="../public/images/albania.jpg" alt="Ksamil">    
                    </a>
                </li>
                <li class="child">
                    <a href="../view/greece.php">
                        <img class="child-img" src="../public/images/santorini.jpg" alt="Santorini">
                    </a>
                </li>
                <li class="child">
                    <a href="../view/uk.php">
                        <img class="child-img" src="../public/images/uk.jpg" alt="London">
                    </a>
                </li>
                <li class="child">
                    <a href="../view/italy.php">
                        <img class="child-img" src="../public/images/italyy.jpg" alt="Venecia">
                    </a>
                </li>
            </ul>
            </div>
            <button class="icon" onclick="scrollr()"><i class="fas fa-angle-right"></i></button>

            <script>
                function scrolll(){
                    var left=document.querySelector(".scroll-images");
                    left.scrollBy(350, 0);
                }
                function scrollr(){
                    var right=document.querySelector(".scroll-images");
                    right.scrollBy(-350, 0);
                }
            </script>
           
        </section>
        <section id="third-section">
            <p>You have worked so hard for your money,  now let the money  work for you!</p>
            <p><a href="https://industry.traveloregon.com"> Learn about traveling</a></p>
        </section>

        <section id="fourth-section">
            <img src="images/what-we-offer.jpg" alt="Traveling">
            <section id="fourth-section-content">
                <div class="our-care">
                <p class="number">1</p>
                <p class="title-number">High Quality </p>
                <p>Our experts have meticulously vetted every available rental, 
                    filtering out the thousands that don't meet our standards - saving you from disappointment.</p>

            </div>
            <div class="our-care">
                <p class="number">2</p>
                <p  class="title-number">Instant Care</p>
                <p>An in-house care team - real humans, immediately available, 24/7.
                     Efficient and empowered home experts, whose sole task is to make your stay exceptional</p>
            </div>
            <div class="our-care">
                <p class="number">3</p>
                <p class="title-number">Total Reassurance</p>
                <p>In the very rare event your host cancels 48 hours after your booking, 
                    we will find you a new Plum home up to 20% more expensive than the original. Within 5 days of check-in,
                     it's up to 50%</p>
            </div> 
            </section>

        </section>
        <section id="fifth-section">
            <img src="../public/images/foto5.jpg" alt="best-place">
            <div id="fifth-section-content">
                <p>Stay in the world's most remarkable homes!</p>
                <ul id="in-fifth-section">
                    <a href="../view/hotels.php"> <button type="button" >Book your restaurant</button></a>
                 
                </ul>
            
            </div>
            
        </section>
    </main>

    <footer>

        <div id="contact-us-part">
            <label for="contact-us" ><h2>Contact us</h2></label>
        <select name="contact-us" id="contact-us">
            <option value="">Instagram</option>
            <option value="">Email</option>
            <option value="">Number</option>
            <option value="">Facebook</option>
        </select>
        </div>
        
        <div id="footer-part">
             <section id="social-part">
            <h3>Social</h3>
              <ul class="footer-content-special">
        <li > 
            <a href="https://www.facebook.com">
                <img class="last-img" src="/..public/images/facebook.jpg" alt="facebook">
            </a>
           
        <li>
            <a href="https://www.instagram.com">
                <img  class="last-img" src="/..public/images/insta.jpg" alt="instagram"></li>
            </a>
        <li> 
            <a href="https://www.linkedIn">
                <img  class="last-img" src="/..public/images/in.jpg" alt="linkedin"></li>
            </a>
         <li> 
            <a href="https://www.youtube.com">
                <img  class="last-img" src="/..public/images/youtube.jpg" alt="youtube"></li>
            </a>
         <li><a href="https://twitter.com"> 
            <img  class="last-img" src="/..public/images/twitter.jpg" alt="twitter"></li>
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