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
        <link rel="stylesheet" href="css/s1/styles.css" type="text/css"> <!-- connect to a CSS stylesheet to produce styles for HTML elements -->
        <link rel="icon" href="images/index_images/rose_icon.png"> <!-- Favicon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- CSS library for social media icons -->
        <!-- Snik, M., 2020. AOS - Animate On Scroll Library. [online] Michalsnik.github.io. Available at: <https://michalsnik.github.io/aos/> [Accessed 2 August 2020]. -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- animate on scroll library  -->
        <title>Rose FX | Home</title> <!-- webpage title -->
    </head>
    <body>
        <!-- header that holds logo and navigation elements, onload animation using animate on scroll library attributes -->
        <header data-aos="fade-right" data-aos-duration="1250" id="header1">
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
            </div>
        </header>

        <!-- hide this header and only reveal if screen width is lower than 480px -->
        <header data-aos="fade-right" data-aos-duration="1250" id="header2" style="top: 0px;">
            <div class="mobile-container"> <!-- semantic class to define this header is for the mobile -->
                <div class="logo">
                    <img src="images/index_images/rose_main.png" alt="Company logo" class="img-logo" id="mbl-logo">
                </div>
                <!-- toggle button for hamburger icon to reveal navigation tab onclick with a JS function -->
                <div class="hbg-icon" id="hburger" onclick="burgerClick()">
                    <p>&#9776;</p> <!-- HTML Entity for Hamburger Icon -->
                </div>
            </div>
        </header>

        <!-- navigation tab which is revealed on click of the hamburger icon -->
        <div class="navigate" id="nvgt" style="top: -77px;">
            <nav> <!-- Navigation links for the mobile header -->
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- section that contains minimal information that fully explains what the company is -->
        <section class="hero">
            <div class="hero-text" data-aos="fade-up" data-aos-duration="1250"> <!-- more 'animate on scroll' attributes -->
                <!-- main text -->
                <h1>Flowers from us to <br> your doorstep.</h1>
                <p>#1 florist around the globe.</p>
            </div>
            <div class="hero-img">
                <!-- image of the blue and pink flowers -->
                <!-- Shaffer, E., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/pink-grey-and-white-petaled-flowers-clip-art-2395251/> [Accessed 2 August 2020]. -->
                <img src="images/index_images/pink-grey-and-white-petaled-flowers-clip-art-2395251.jpg" alt="hero image - blue and pink flowers">
            </div>
        </section>

        <!-- section that contains a small amount of info for the 'about' page -->
        <section class="mini-about" data-aos="fade-left">
            <div class="about-text">
                <!-- main text for this section -->
                <h2>WHO ARE WE?</h2>
                <p>
                    Together we are Rose FX and I am its representative, Sharon Justique. I founded
                    Rose FX after having a deep insight of how the world is moving right now. I figured
                    to myself that the world needs happiness despite the current events. I am happy to
                    have found a team that is in love with the idea I discovered and I love their willingness
                    to help out others in this period of time.
                </p>
                <a href="about.php" class="click-about">Find Out More</a> <!-- redirect user to about page -->
            </div>
            <div class="about-img">
                <!-- Nelson, H., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/close-up-photography-of-a-woman-near-wall-1065084/> [Accessed 2 August 2020]. -->
                <img src="images/index_images/close-up-photography-of-a-woman-near-wall-1065084.jpg" alt="woman representative of the company">
            </div>
        </section>

        <!-- section that contains a small amount of info for the 'contact' page -->
        <section class="mini-contact" data-aos="fade-right">
            <div class="contact-img">
            <!-- Fotios, L., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/person-holding-yellow-and-white-flowers-2106037/> [Accessed 2 August 2020]. -->
                <img src="images/index_images/person-holding-yellow-and-white-flowers-2106037.jpg" alt="person holding flowers">
            </div>
            <div class="contact-text">
                <!-- main text for this section -->
                <h2>GET IN TOUCH</h2>
                <p>
                    Make sure you get in touch with us! We are happy to help 
                    suit your needs according to our products and services.
                    We are here to bring happiness to people around the globe.
                    Don't be shy! Our goal is to help reach people and you reaching
                    out to us yourself is already a contribution we will appreciate.
                    Looking forward to hearing from you!
                </p>
                <a href="contact.php" class="click-about">Contact Us</a> <!-- redirect user to contact page -->
            </div>
        </section>

        <!-- only add in to the DOM if the session is ongoing and username session variable is in effect -->
        <?php
            if (isset($_SESSION['username'])) { // if it exists, declare a new session variable
                $_SESSION['mini-booking'] = "        
                    <section class='mini-booking' data-aos='fade-left'>
                        <div class='booking-text'>
                            <h2>BOOK AN APPOINTMENT</h2>
                            <p>
                                Want to book an appointment? Log in to your account and book an appointment now!
                                We will manage the time available on the date that you have booked and let you know
                                about the next steps. 
                            </p>
                            <a href='booking.php' class='click-booking'>Booking</a>
                        </div>
                    </section>
                    ";

                echo $_SESSION['mini-booking']; // implement session value to the DOM
            }
        ?>

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
        <script src="js/opennav.js"></script> <!-- open the navbar -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- CDN for the AOS library -->
        <script>
            AOS.init(); 
        </script> <!-- initialise the aos effect -->
    </body>
</html>