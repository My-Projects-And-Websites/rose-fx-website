<?php
    if(!isset($_SESSION)) { // if session hasn't started yet, then start the session
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- relevant meta tags to define character set and responsive behaviour scale -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/s3/styles.css" type="text/css"> <!-- connect to a CSS stylesheet to produce styles for HTML elements -->
    <link rel="icon" href="images/index_images/rose_icon.png"> <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- CSS library for social media icons -->
    <!-- Snik, M., 2020. AOS - Animate On Scroll Library. [online] Michalsnik.github.io. Available at: <https://michalsnik.github.io/aos/> [Accessed 2 August 2020]. -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- animate on scroll library  -->
    <title>Rose FX | Contact Us</title> <!-- webpage title -->
</head>
<body>
    <!-- header that holds logo and navigation elements, onload animation using animate on scroll library attributes -->
    <header id="header1">
        <div class="inner-container"> <!-- marginised inner header -->
            <div class="logo"> <!-- logo -->
                <img src="images/index_images/rose_main.png" alt="Company logo" class="img-logo" id="main-logo">
            </div>
            <nav> <!-- navigation links to other PHP based web applications -->
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <!-- if session username exists, add these anchor tags to the header -->
            <?php
                if (isset($_SESSION['username'])) {
                    $_SESSION['booking_link'] = "
                        <div class='session_links'>
                            <a href='booking.php' class='booklinks'>Booking</a>
                            <a href='php/logout.php' class='booklinks'>Log Out</a>
                        </div>
                    ";

                    echo $_SESSION['booking_link']; // add to DOM
                }
            ?>
        </div>
    </header>

    <!-- hide this header and only reveal if screen width is lower than 480px -->
    <header id="header2" style="top: 0px;">
        <div class="mobile-container"> <!-- semantic class to define this header is for the mobile -->
            <div class="logo">
                <img src="images/index_images/rose_main.png" alt="Company logo" class="img-logo" id="mbl-logo">
            </div>
            <!-- toggle button for hamburger icon to reveal navigation tab onclick with a JS function -->
            <div class="hbg-icon" id="hburger" onclick="burgerClick2()">
                <p>&#9776;</p> <!-- HTML Entity for Hamburger Icon -->
            </div>
        </div>
    </header>

    <!-- navigation tab which is revealed on click of the hamburger icon -->
    <div class="navigate" id="nvgt" style="top: -150px;">
        <nav> <!-- Navigation links for the mobile header -->
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <!-- anchor tags for mobile phone appears if session username exists -->
        <div id="php-links">
            <?php
                if (isset($_SESSION['username'])) {
                    $_SESSION['booking_link'] = "
                        <div class='session_links'>
                            <a href='booking.php' class='booklinks'>Booking</a>
                            <a href='php/logout.php' class='booklinks'>Log Out</a>
                        </div>
                    ";

                    echo $_SESSION['booking_link']; // add to DOM
                }
            ?>
        </div>
    </div>

    <!-- main content of contact page -->
    <main>
        <section class="contact-us"> <!-- contains everything inside the main -->
            <div class="inner-contact"> <!-- marginises the section -->
                <div class="lets-talk">
                    <!-- main text -->
                    <h2>Let's Talk</h2>
                    <p>Here's how to get in touch, looking forward to hear from you!</p>

                    <!-- info for the methods on how to get in touch -->
                    <div class="info">
                        <ul>
                            <li class="info-contact">
                                <div class="contact-icon">
                                    <img src="images/contact_images/open_hours.png" alt="Opening hours"> <!-- Opening hours icon -->
                                </div>
                                <p>Opening Hours: <strong>9:00 AM - 6:30 PM</strong></p> <!-- Opening hour text -->
                            </li>
                            <li class="info-contact">
                                <div class="contact-icon">
                                    <img src="images/contact_images/mail_icon.png" alt="Mail"> <!-- Mail icon -->
                                </div>
                                <a href="mailto:rosefx@admin.com">Send Us An Email - click me!</a> <!-- when clicked, open mail app and compose an email -->
                            </li>
                            <li class="info-contact">
                                <div class="contact-icon">
                                    <img src="images/contact_images/phone.png" alt="Phone number"> <!-- Phone number icon -->
                                </div>
                                <p>020 673 1350</p> <!-- Fake phone number, if it matches your number, I'm sorry -->
                            </li>
                            <li class="info-contact">
                                <div class="contact-icon">
                                    <img src="images/contact_images/store.png" alt="Store icon"> <!-- Store icon -->
                                </div>
                                <a href="https://www.google.com/maps/search/rose+fx/@51.5286528,-0.0997035,18z"> <!-- Random address, again if it matches yours, I'm sorry -->                                   
                                    123 Million Dollar Street <br>
                                    United Kingdom, London <br>
                                    EC1V 8AD
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="reg-log-form" data-aos="fade-up" data-aos-duration="1250"> <!-- AOS attribute for the form -->
                    <div class="form-text"> <!-- text that describes the form -->
                        <!-- main text, change on button click with JS -->
                        <h3 id="form-heading">Create an Account</h3>
                        <p id="form-p">In order to book an appointment, you must be registered.</p>
                    </div>

                    <div class="reg-log-btn" data-aos="fade-right" data-aos-duration="1250"> <!-- clickable buttons that toggles register/login form -->
                        <button id="regBtn">Register</button> <!-- display Register form -->
                        <!-- if session username is active, remove login button but if not, display login button and form -->
                        <?php
                            if (!isset($_SESSION['username'])) {
                                $_SESSION['login-button'] = "<button id='logBtn'>Login</button>";

                                echo $_SESSION['login-button'];
                            }
                        ?>
                    </div>

                    <!-- register form  -->
                    <!-- send data to the file in the action value -->
                    <!-- POST method means save the data securely in the database -->
                    <!-- ID is used to for JS -->
                    <!-- Data AOS attributes -->
                    <form action="php/register.php" method="POST" id="regform" data-aos="fade-left" data-aos-duration="1250">
                        <!-- fieldset that contains input fields for the register form -->
                        <fieldset class="fields" id="fieldset1">
                            <div class="input-type-1"> <!-- username input -->
                                <input type="text" placeholder="Username" name="username" id="username">
                                <small id="usernameTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-2">
                                <!-- Enter first name and last name -->
                                <input type="text" placeholder="First Name" name="fname" id="fname">
                                <input type="text" placeholder="Surname" name="sname" id="sname">
                                <small id="nameTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-1">
                                <!-- Enter mobile number -->
                                <input type="text" placeholder="UK Mobile No" name="mobile" id="mobile">
                                <small id="mobileTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-1">
                                <!-- Enter email address -->
                                <input type="text" placeholder="Email Address" name="email" id="email">
                                <small id="emailTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-1">
                                <!-- Enter password -->
                                <input type="password" placeholder="Create a Password" name="pword" id="pword">
                                <small id="pwordTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-1">
                                <!-- Confirm password -->
                                <input type="password" placeholder="Confirm Password" name="confirm" id="confirm">
                                <small id="confirmTag">Error Message</small> <!-- error message for username if there is an error in the input -->
                            </div>

                            <div class="input-type-1">
                                <!-- Submit button -->
                                <input type="submit" value="Submit" name="confirm" id="registerBtn">
                            </div>
                        </fieldset>
                    </form>

                    <!-- If session username does not exist, echo this to the DOM -->
                    <?php
                        if (!isset($_SESSION['username'])) {
                            $_SESSION['login'] = "                    
                            <form action='php/login.php' method='POST' id='loginform'>
                                <fieldset class='fields' id='fieldset2'>
                                    <div class='input-type-1'>
                                        <input type='text' placeholder='Username' name='login_username' id='login_username'>
                                        <small id='loginUsernameTag'>Error Message</small>
                                    </div>

                                    <div class='input-type-1'>
                                        <input type='password' placeholder='Password' name='login_pword' id='login_pword'>
                                        <small id='loginPasswordTag'>Error Message</small>
                                    </div>

                                    <div class='input-type-1'>
                                        <input type='submit' value='Login' name='confirm' id='loginBtn'>
                                    </div>
                                </fieldset>
                                </form>
                            ";

                            // this is the login form 

                            echo $_SESSION['login']; // add to the DOM
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <footer>
        <div class="inner-footer"> <!-- inner footer is marginised -->
            <!-- copyright statement -->
            <div class="copy">
                <!-- HTML entity for copyright sign -->
                <p>Copyright &copy; 2020 Rose FX</p>
            </div>
            <div class="socials">
                <!-- social media icons for the footer, empty link -->
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-twitter"></a>
            </div>
        </div>
        <!-- disclaimer to declare that the website is fiction -->
        <div class="disclaimer">
            <p>
                Rose FX is a fictitious brand created solely for the 
                purpose of the All products and people associated with Rose FX
                are also fictitious. Any resemblance to real brands, products, 
                or people is purely coincidental. Information provided about the 
                product is also fictitious and should not be construed to be 
                representative of actual products on the market in a similar 
                product category.
            </p>
        </div>
    </footer>

    <!-- javascript -->
    <script src="js/index_redirect.js"></script> <!-- when main logo is clicked, head home -->
    <script src="js/opennav2.js"></script> <!-- open navigation bar in mobile view on click -->
    <script src="js/form_reg_log.js"></script> <!-- validation for the form -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- aos CDN library -->
    <script>
        AOS.init();
    </script>
    <!-- Initialise the AOS animation -->
</body>
</html>