// target elements from the DOM using this function
function $(id) {
    return document.getElementById(id);
}

// change the form heading and text when the login button has been clicked
$("logBtn").addEventListener("click", function() {
    $("fieldset1").style.display = "none"; // hide register form
    $("fieldset2").style.display = "block"; // show login form

    $("form-heading").innerHTML = "To Book - Login!"; // change text
    $("form-p").innerHTML = "Please login with your registered username. (Not your email!)";

});

// change the form heading and text when the register button has been clicked
$("regBtn").addEventListener("click", function() {
    $("fieldset1").style.display = "block"; // show register form
    $("fieldset2").style.display = "none"; // hide login form

    $("form-heading").innerHTML = "Create an Account"; // change text
    $("form-p").innerHTML = "In order to book an appointment, you must be registered.";
});

var allowSubmit = false; // set boolean value to false

// when clicking the submit button for the register form, if 'allowSubmit' is false, do not submit and then run function which contains form validations
$("regform").addEventListener("submit", (e) => {
    if (!allowSubmit) {
        e.preventDefault();
        checkRegData(); // check for errors
    } else {
        // prevent the preventDefault function, how ironic
    }
});

// when clicking the submit button for the login form, if 'allowSubmit' is false, do not submit and then run function which contains form validations
$("loginform").addEventListener("submit", (e) => {
    if (!allowSubmit) {
        e.preventDefault();
        checkLoginData(); // check for errors
    } else {
        // prevent the preventDefault function, how ironic  
    }
});

function checkRegData() {
    // declare constants to have a fixed value and trim off any whitespaces on the values to escape data
    const usernameValue = $("username").value.trim(); // target id of input elements using the $ function
    const firstNameValue = $("fname").value.trim();
    const surnameValue = $("sname").value.trim();
    const mobileValue = $("mobile").value.trim();
    const emailValue = $("email").value.trim();
    const passwordValue = $("pword").value.trim();
    const passwordMatchValue = $("confirm").value.trim();

    var name_valid = /^[A-Za-z]+$/; // regex that configures patterns for the full name input field to only have alphabetical letters
    var pass_validation = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/; 
    // regex that configures patterns for the password input field to have at least 6-15 characters, an uppercase and lowercase letter, a number and a special character

    // username validation
    var usernameValid = false; // set boolean value to false
    if (usernameValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("usernameTag").style.display = "inline";
        $("usernameTag").innerHTML = "Please fill in this field.";
    } else {
        $("usernameTag").style.display = "none"; // remove error message
        usernameValid = true; // set boolean variable to true
    }

    // name validation
    var nameValid = false; // set boolean value to false
    if (firstNameValue == "" || surnameValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("nameTag").style.display = "inline";
        $("nameTag").innerHTML = "Please fill in this field.";
    } else if (!firstNameValue.match(name_valid) || !surnameValue.match(name_valid)) { 
        // if there are other characters other than alphabetical characters, then display text
        $("nameTag").style.display = "inline";
        $("nameTag").innerHTML = "Alphabetical characters only.";
    } else { 
        $("nameTag").style.display = "none"; // if successful, hide error message and set boolean variable to true
        nameValid = true;
    }

    // UK mobile number validation
    var mobileValid = false; // set boolean value to false
    if (mobileValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("mobileTag").style.display = "inline";
        $("mobileTag").innerHTML = "Please fill in this field.";
    } else if (mobileValue.length != 11) { // if the length is not equal to 11, display error message
        $("mobileTag").style.display = "inline";
        $("mobileTag").innerHTML = "Must be 11 digits.";
    } else { 
        $("mobileTag").style.display = "none"; // hide error message
        mobileValid = true; // set boolean variable to true
    }

    // email validation
    var emailValid = false; // set boolean value to false
    if (emailValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("emailTag").style.display = "inline";
        $("emailTag").innerHTML = "Please fill in this field.";
    } else if ((!emailValue.includes("@") && (!emailValue.includes(".com"))) || (!emailValue.includes("@") || !emailValue.includes(".com"))) {
        // if the value for this field does not include @ and .com, display error message
        $("emailTag").style.display = "inline";
        $("emailTag").innerHTML = "Please enter a valid email.";
    } else {
        $("emailTag").style.display = "none"; // hide error message
        emailValid = true; // set boolean variable to true
    }

    // password validation
    var pwordValid = false; // set boolean value to false
    if (passwordValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("pwordTag").style.display = "inline";
        $("pwordTag").innerHTML = "Please fill in this field.";
    } else if (!passwordValue.match(pass_validation)) { // if value of password input field does not match the regex pattern then display error message
        $("pwordTag").style.display = "inline";
        $("pwordTag").innerHTML = "Password must be 6-15 characters with at least one uppercase, one lowercase letters, one number and a special character.";
    } else {
        $("pwordTag").style.display = "none"; // hide error message 
        pwordValid = true; // set boolean variable to true
    }

    // password match validation
    var confirmValid = false; // set boolean value to false
    if (passwordMatchValue == "") { // if empty then replace error message text with "Please fill in this field"
        $("confirmTag").style.display = "inline";
        $("confirmTag").innerHTML = "Please fill in this field.";
    } else if (passwordMatchValue != passwordValue) { // if confirm password does not match the original password, display error message
        $("confirmTag").style.display = "inline";
        $("confirmTag").innerHTML = "Must match the password given.";
    } else {
        $("confirmTag").style.display = "none"; // if input is valid, hide erroe message
        confirmValid = true; // set boolean variable to true
    }

    function isValid() {
        // if all boolean variables are true, then set the main boolean variable "allowSubmit" to true
        if (usernameValid && nameValid && mobileValid && emailValid && pwordValid && confirmValid) {
            allowSubmit = true;            
        }
    }

    isValid(); // run this function
}

// form validation for the login form
function checkLoginData() {
    // target and refine value of these input fields in the login form
    const loginUsernameValue = $("login_username").value.trim();
    const loginPasswordValue = $("login_pword").value.trim();

    // if the input fields are empty display error messages
    if (loginUsernameValue == "" || loginPasswordValue == "") {
        $("loginUsernameTag").style.display = "inline";
        $("loginUsernameTag").innerHTML = "Please fill in this field.";

        $("loginPasswordTag").style.display = "inline";
        $("loginPasswordTag").innerHTML = "Please fill in this field.";
    }
    else if (loginUsernameValue != "" && loginPasswordValue != "") {
        // if not empty, allowSubmit is now true
        allowSubmit = true;
    }
}   