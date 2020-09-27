<?php
    // connect to the database
    $conn = new mysqli('fareham.city.ac.uk', 'aczw949', '180019843', 'aczw949');
    if ($conn->connect_errno) {
        // if there is an error to the database connection, output text and the error
        printf("Connection failed: %s\n", $conn->connect_error);
        // exit the connection
        exit();
    } 
    else {
        // declare the variables for registration and assign values to these variables from the data entered by the user in the fields
        // real_escape_string makes data safe when sending a query to mySQL
        $username = $conn->real_escape_string($_POST['username']);
        $firstName = $conn->real_escape_string($_POST['fname']);
        $lastName = $conn->real_escape_string($_POST['sname']);
        $mobile = $conn->real_escape_string($_POST['mobile']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['pword']);

        $hashed_pword = md5($password); // encrypt the given password

        // this is for back-end form validation
        // query that selects the username field
        $query_username = "SELECT username FROM UserDetails WHERE username = '$username'";
        // execute the query
        $res_username = mysqli_query($conn, $query_username);
        // query that selects the email field
        $query_email = "SELECT email FROM UserDetails WHERE email = '$email'";
        // execute the query
        $res_email = mysqli_query($conn, $query_email);

        // if result for username query returns a number greater than 0 then run the javascript alert and redirect to contact page
        // in simple terms, if the username entered by the user already exists, then alert a message
        if (mysqli_num_rows($res_username) > 0) {
            echo "<script language='javascript'>
                    alert('Username already taken. Registration failed.');
                    window.location.href = 'https://smcse.city.ac.uk/student/aczw949/website_project_new/contact.php';
                    </script>";
        }
        // if result for username query returns a number greater than 0 then run the javascript alert and redirect to contact page
        // in simple terms, if the email entered by the user already exists, then alert a message
        else if (mysqli_num_rows($res_email) > 0) {
            echo "<script language='javascript'>
                    alert('Email is already registered. Registration failed.');
                    window.location.href = 'https://smcse.city.ac.uk/student/aczw949/website_project_new/contact.php';
                    </script>";
        }
        // if both username and email doe snot exist yet then...
        else {
            // insert values from the input fields to the database (including the encrypted password to ensure no one knows what it is)
            mysqli_query($conn, "INSERT INTO UserDetails (username, fName, lName, mobile, email, password)
            VALUES ('$username', '$firstName', '$lastName', '$mobile', '$email', '$hashed_pword')")
            or die(mysqli_error($conn)); // cancel if there is an error

            // then redirect the user to the same page and log in!
            echo "<script language='javascript'>
                    alert('Registered successfully!')
                    window.location.href = 'https://smcse.city.ac.uk/student/aczw949/website_project_new/contact.php';
                    </script>";
        }
    }
?>