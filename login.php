<?php
session_start();

require_once('config2.php');
include_once('userRepository.php');
include_once('user.php');

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Please fill the required fields!";
    } else {
        include_once('users.php');
        $email = $_POST['email'];
      
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $user['role'];
                header("location: dashboard.php");
                exit();
            }
        }
        echo "Incorrect Username or Password!";
    }
}
?> 

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
    <link rel="stylesheet" href="styles/log-in-style.css">
    <link rel="stylesheet" href="styles/shared.css"> 
    <link rel="stylesheet" href="styles/header.css">
    <script src="script/header.js" type="text/javascript"></script>

    <title>Log in</title>
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
       <input type="submit" name="submit" value="login now" class="form-btn">
       <p>don't have an account? <a href="register_form.php">register now</a></p>
     </form>
   </div>
   </div>

    
            
       
   <script>
  

  let emailRegex = /^[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
  let passRegex = /^[a-z1-9]{8,15}$/;
  let userRegex = /^[a-zA-Z]$/;
  
  
  function validateLoginForm() {
  
      let emailInput = document.getElementById('userId');
      let emailError = document.getElementById('emailError');
      let passInput = document.getElementById('password');
      let passError = document.getElementById('passError');
      
  
      emailError.innerText = '';
      passError.innerText = '';
  
  
      if (!emailRegex.test(emailInput.value)) {
          emailInput.style.border = "1px solid red";
          emailError.innerText = 'Invalid email';
          return false;
      }
  
      if (!passRegex.test(passInput.value)) {
          passInput.style.border = "1px solid red";
          passError.innerText = 'Invalid password';
          return false;
      }
  
      alert('Login form submitted successfully!');
      return true;
  }

  
function validateRegisterForm() {

let emailInput = document.getElementById('userId');
let emailError = document.getElementById('emailError');
let passInput = document.getElementById('password');
let passError = document.getElementById('passError');
let userInput = document.getElementById('registerUser');
let userError = document.getElementById('userError');

emailError.innerText = '';
passError.innerText = '';
userError.innerText = '';

if (!emailRegex.test(emailInput.value)) {
    emailInput.style.border = "1px solid red";
    emailError.innerText = 'Invalid email';
    return false;
}

if (!passRegex.test(passInput.value)) {
    passInput.style.border = "1px solid red";
    passError.innerText = 'Invalid password';
    return false;
}

if (!userRegex.test(userInput.value)) {
    userInput.style.border = "1px solid red";
    userError.innerText = 'Invalid user ID';
    return false;
}

alert('Register form submitted successfully!');
return true;
}

  
