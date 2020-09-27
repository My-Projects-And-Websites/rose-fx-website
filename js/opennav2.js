var header = document.getElementById('header2'); // target header for mobile view
var navigation = document.getElementById('nvgt'); // target navigation tab

// open the navigation tab on click of the hamburger icon
function burgerClick2() {
    if (header.style.top == "0px") {
        header.style.top = "150px"; // set to this position on click if its current position is 0px
        navigation.style.top = "0px";
        header.style.transition = "all 0.5s ease 0s"; // apply transition property
    }
    else {
        header.style.top = "0px";
        navigation.style.top = "-150px"; // if top position is not equal to 0, then hide the navigation bar onclick
    }
}

// the difference of this opennav javascript, this is applied to files that will have PHP based anchor element on the header when user is logged in