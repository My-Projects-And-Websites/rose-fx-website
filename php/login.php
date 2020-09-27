<?php
    if(!isset($_SESSION)) {
        session_start(); // start the session if it still does not exist
    }

    // connect to the database
    $conn = new mysqli('fareham.city.ac.uk', 'aczw949', '180019843', 'aczw949');
    if ($conn->connect_errno) {
        // if there is an error, print text and error then exit
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    }
    else {
        // declare variables containing values from the input field
        $userLogin = $_POST['login_username'];
        $userPass = $_POST['login_pword'];

        // encrypt the password entered in the input field
        $hashed_login = md5($userPass);

        // select the username and password fields that matches the input entered in the input fields in the form
        $query = "SELECT username, password FROM UserDetails WHERE username = '$userLogin' AND password = '$hashed_login'";
        // execute the query
        $result = $conn->query($query);
        // store the results in $row variable
        $row = mysqli_fetch_row($result);

        // if $row returned no results from the query, then output a javascript alert
        if (!isset($row[0]) || !isset($row[1])) {
            // this will alert a message to the user and then redirect to the specified page
            echo "<script language='javascript'>
                    alert('Please enter valid credentials.');
                    window.location.href = 'https://smcse.city.ac.uk/student/aczw949/website_project_new/contact.php';
                  </script>";
        }
        // if there is a match then activate a custom session called 'username' which allows access to the booking page
        else if ($userLogin == $row[0] && $hashed_login == $row[1]) {
            $_SESSION['username'] = $userLogin;

            // redirect to this page
            header("Location: ../booking.php");
        }
    }
?>