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
    <link rel="stylesheet" href="css/s2/styles.css" type="text/css"> <!-- connect to a CSS stylesheet to produce styles for HTML elements -->
    <link rel="icon" href="images/index_images/rose_icon.png">  <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- CSS library for social media icons -->
    <!-- Snik, M., 2020. AOS - Animate On Scroll Library. [online] Michalsnik.github.io. Available at: <https://michalsnik.github.io/aos/> [Accessed 2 August 2020]. -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- animate on scroll library  -->
    <title>Rose FX | About</title> <!-- webpage title -->
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

    <!-- main content -->
    <main>
        <!-- hero content with image and text -->
        <section class="hero">
            <div class="hero-text" data-aos="fade-up" data-aos-duration="1000">
                <!-- hero text -->
                <h2>Let me explain how we work.</h2>
                <p>
                    We are a company that consists of florists from all
                    around the world. Our main goal is to reach every area in
                    the world and send flowers. We have gathered to put
                    a smile in everyone's faces that receive these flowers.
                    We are more like a charity company that the only purpose we
                    gathered for is to bring happiness to those who needs and wants it.
                    That's really all.
                </p>
            </div>
            <div class="hero-img">
                <!-- image for the hero content -->
                <img src="images/about_images/green-flower-bouquet-on-white-background-961402.jpg" alt="hero image - green flower with pink ribbon">
            </div>
        </section>

        <!-- these ellipses are clickable and change the text depending on which step was clicked -->
        <section class="step-by-step" data-aos="fade-up">
            <div class="ellipses">
                <img src="images/about_images/ellipse1.png" alt="Number 1" onclick="change1();"> <!-- js functions-->
                <img src="images/about_images/ellipse2.png" alt="Number 2" onclick="change2();">
                <img src="images/about_images/ellipse3.png" alt="Number 3" onclick="change3();">
                <img src="images/about_images/ellipse4.png" alt="Number 4" onclick="change4();">
            </div>
            <div class="main-text">
                <!-- initial text -->
                <h2 id="heading-text">Click a number to display info.</h2>
                <p id="desc"></p>
            </div>
        </section>

        <!-- this section shows the text about why customers should choose this florist shop -->
        <section class="why-us">
            <div class="inner-text">
                <div class="why-us-text">
                    <!-- main text for Why Us section -->
                    <h2>Why Choose Rose FX?</h2>
                    <p>
                        We at Rose FX ensures that we deliver the best qualities
                        of our products. We ensure that our products can reach you
                        as soon as we can. It is our duty as the pride of florists to
                        deliver all flowers catered for throughout the whole process from
                        payment to safety in your hands. Here are some of our best features:
                    </p>
                </div>

                <!-- these images are obtained from royal free website and these icons explain the best features of Rose FX -->
                <div class="why-icons" data-aos="fade-left" data-aos-anchor-placement="top-center"> <!-- AOS attibutes -->
                    <div class="icon"> <!-- quick delivery time explanation -->
                        <img src="images/about_images/clock-regular.svg" alt="">
                        <h3>Quick Delivery Time</h3>
                        <p>After selecting and checking out, we will confirm it as soon as possible (approximately two minutes) and expect us to deliver your items 2 days after.</p>
                    </div>
                    <div class="icon"> <!-- 24/7 care explanation -->
                        <img src="images/about_images/24_7.png" alt="">
                        <h3>24/7 Care</h3>
                        <p>Our care for our products does not only last whilst it is in store, our staff memebrs stay with the flowers and deliver them personally to you!</p>
                    </div>
                    <div class="icon"> <!-- Great quality explanation -->
                        <img src="images/about_images/quality.png" alt="">
                        <h3>Incomparable Quality</h3>
                        <p>The quality we provide to our customers are unmatched and the flowers appear to be freshly picked! Our flowers will arrive at your door at its best appearance.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- carousel slider which shows images about the services done by Rose FX -->

        <div class="slide-contain" data-aos="zoom-in-up" data-aos-duration="350" data-aos-anchor-placement="top-center">
            <!-- Ilieva, I., 2020. White And Purple Flower Bouquet · Free Stock Photo. [online] Pexels. Available at: <https://www.pexels.com/photo/white-and-purple-flower-bouquet-3786677/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img1.jpg" style="width:100%">
            </div>
        
            <!-- Pexels. 2020. White Rose And Pink Daisy · Free Stock Photo. [online] Available at: <https://www.pexels.com/photo/beautiful-blank-bloom-blooming-267360/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img2.jpg" style="width:100%">
            </div>
        
            <!-- Koppens, Y., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/photo-of-bouquet-of-flowers-in-can-1809334/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img3.jpg" style="width:100%">
            </div>

            <!-- Shevtsova, D., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/pink-and-green-flower-bouquet-on-bed-sheet-929976/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img4.jpg" style="width:100%">
            </div>

            <!-- Grafierende, F., 2020. [online] Pexels. Available at: <https://www.pexels.com/photo/photo-of-red-and-yellow-petaled-tulips-in-glass-vase-2058499/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img5.jpg" style="width:100%">
            </div>

            <!-- Adderley, C., 2020. Tables With Flower Decors · Free Stock Photo. [online] Pexels. Available at: <https://www.pexels.com/photo/tables-with-flower-decors-2306281/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img6.jpg" style="width:100%">
            </div>

            <!-- Pexels. 2020. [online] Available at: <https://www.pexels.com/photo/pink-white-petal-flower-on-white-curtain-near-white-sand-beach-on-daytime-169188/> [Accessed 3 August 2020]. -->
            <div class="slides fade-in">
                <img src="images/about_images/img7.jpg" style="width:100%">
            </div>
        
            <!-- Next and previous buttons -->
            <a class="previous" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next-img" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        
        <!-- The dots/circles that changes the photos for the carousel slider -->
        <div class="space">
            <span class="dots" onclick="thisSlide(1)"></span>
            <span class="dots" onclick="thisSlide(2)"></span>
            <span class="dots" onclick="thisSlide(3)"></span>
            <span class="dots" onclick="thisSlide(4)"></span>
            <span class="dots" onclick="thisSlide(5)"></span>
            <span class="dots" onclick="thisSlide(6)"></span>
            <span class="dots" onclick="thisSlide(7)"></span>
        </div>
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
    <script src="js/opennav2.js"></script> <!-- opens the navigation bar when hambruger icon is clicked in mobile view -->
    <script src="js/ellipse.js"></script> <!-- change text and subheading when a step is clicked -->
    <script src="js/slider.js"></script> <!-- javascript that switches to the next photo when buttons are clicked -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- animate on scroll CDN -->
    <script>
        AOS.init();
    </script>
    <!-- initialise animate on scroll -->
</body>
</html>