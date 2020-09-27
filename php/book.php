<?php
    if(!isset($_SESSION)) {
        session_start(); // start the session
    }

    // declare variables containing the values from the input field
    $username = $_SESSION['username'];
    $booking_date = $_POST['bookingDate'];
    $booking_title = $_POST['bookingTitle'];
    $booking_desc = $_POST['bookingDesc'];

    // connect to the database
    $conn = new mysqli('fareham.city.ac.uk', 'aczw949', '180019843', 'aczw949');
    if ($conn->connect_errno) {
        // if there is a connection error with the database, show result and exit
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    }
    else {        
        // if connection is successful, insert into the BookedAppointments table the value from the input fields
        mysqli_query($conn, "INSERT INTO BookedAppointments (`username`, `appointment`, `title`, `description`)
        VALUES ('$username', '$booking_date', '$booking_title', '$booking_desc')")
        or die(mysqli_error($conn)); // if there is an error, cancel

        header("Location: ../booking.php"); // after inserting values, redirect user to the booking page
    }
?>