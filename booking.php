<?php
    if(!isset($_SESSION)) {
        session_start(); // start the session if not started yet
    }

    if (!isset($_SESSION['username'])) {
        header("Location: contact.php"); // if session username doesn't exist, disable directly entering in this web page through the address bar
    }
    else {
        // add links for this booking page and add an anchor tag to end the session / log out
        $_SESSION['booking_link'] = "
            <div class='session_links'>
                <a href='booking.php' class='booklinks'>Booking</a>
                <a href='php/logout.php' class='booklinks'>Log Out</a>
            </div>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- relevant meta tags to define character set and responsive behaviour scale -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/s4/styles.css" type="text/css"> <!-- connect to a CSS stylesheet to produce styles for HTML elements -->
    <link rel="icon" href="images/index_images/rose_icon.png">  <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- CSS library for social media icons -->
    <!-- Snik, M., 2020. AOS - Animate On Scroll Library. [online] Michalsnik.github.io. Available at: <https://michalsnik.github.io/aos/> [Accessed 2 August 2020]. -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- animate on scroll library  -->
    <title>Rose FX | Make a Booking</title> <!-- webpage title -->
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
                echo $_SESSION['booking_link']; // add to DOM
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
                    echo $_SESSION['booking_link']; // add to DOM
                }
            ?>
        </div>
    </div>

    <!-- welcome message for the user - display their username -->
    <section class="welcome">
        <div class="welcome-text" data-aos="fade-up" data-aos-duration="1250">
            <!-- Write a subheading containing a welcome message -->
            <?php echo "<h2>Welcome, " . $_SESSION['username'] . "!</h2>" ?>
            <p>Get in touch with our florists!</p>
        </div>
    </section>

    <!-- main content for booking page -->
    <main>
        <section class="booked" id="booked-appointments">
            <div class="booking-text">
                <!-- this fetches data from the database, the date, title and description  -->
                <h2>Requested Appointments</h2>
                <div class="base-fetch">
                    <?php
                        $username = $_SESSION['username']; // create a new variable containing the value of the session username

                        $conn = new mysqli("fareham.city.ac.uk", "aczw949", "180019843", "aczw949"); // connect to the database

                        // query that will select the data from the database 
                        $query = "SELECT appointment, title, description FROM BookedAppointments WHERE username = '$username'";
                        // execute the query
                        $result = $conn->query($query);
                        // if the result did not return empty, fetch them
                        if (!empty($result)) { 
                            // fetch all the rows in the outputted result of the query
                            while ($row = mysqli_fetch_array($result)) {
                                // echo result to the DOM
                                echo "<div class='fetch-res'>";
                                echo "<p>" . $row['appointment'] . "</p>";
                                echo "<p>" . $row['title'] . "</p>";
                                echo "<p>" . $row['description'] . "</p>";
                                echo "</div>";
                            }
                        }
                        else {
                            // if there are no data found, fetch this paragraph element
                            echo "<p>No bookings found!</p>";
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- this is a form that contains input fields for the user to book an appointment with the florist -->
        <section class="request" id="request-appointments">
            <div class="request-text">
                <!-- form -->
                <h2>Book an Appointment Here</h2>
                <!-- action attribute holds a file where the data will be sent -->
                <!-- POST means save it securely in a database -->
                <form action="php/book.php" method="POST" id="book_an_appointment">
                    <div class="fields">
                        <!-- Input fields -->
                        <input type="date" name="bookingDate" id="bookingDate">
                        <input type="text" placeholder="Appointment Title" name="bookingTitle" id="bookingTitle">
                        <textarea name="bookingDesc" id="bookingDesc" placeholder="Describe the purpose of your appointment..."></textarea>
                        <small id="bookingTag"></small> <!-- Error message -->
                    </div>
                    <!-- Submit button -->
                    <input type="submit" value="Book Appointment" name="bookSubmit">
                </form>
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
    <script src="js/opennav2.js"></script>
    <script src="js/booking.js"></script> <!-- validation for the booking form -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <!-- CDN for the AOS library -->
    <script>
        AOS.init();
    </script>
    <!-- initialise the AOS script -->
</body>
</html>