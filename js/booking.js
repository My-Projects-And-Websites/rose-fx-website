// target element using this function
function $(id) {
    return document.getElementById(id);
}

var allowSubmit = false; // set boolean value to false for this variable

// on submit, if 'allowSubmit' is false, do not allow submission of data to the value of the action attribute
$("book_an_appointment").addEventListener("submit", (e) => {
    if (!allowSubmit) {
        // stop the user from submitting, mainly used for form validation
        e.preventDefault();
        checkBookingData(); // run this function
    } else {
        // prevent the preventDefaul() from happening, how ironic
    }
});

// create the validation of the form
function checkBookingData() {
    // trim values in case there are any whitespaces at the end and front of the value
    const bookingDateValue = $('bookingDate').value.trim();
    const bookingTitleValue = $('bookingTitle').value.trim();
    const bookingDescValue = $('bookingDesc').value.trim();

    // if empty display error
    if (bookingDateValue == "" || bookingTitleValue == "" || bookingDescValue == "") {
        $("bookingTag").style.display = "inline";
        $("bookingTag").innerText = "Please fill in all the fields."; // display error message
    }
    else {
        allowSubmit = true; // if not empty, allowSubmit is then set to true then let the form be sent to the PHP file
    }
}