var header = document.getElementById('header2');  // target header for mobile view
var navigation = document.getElementById('nvgt'); // target navigation tab

// open the navigation tab on click of the hamburger icon
function burgerClick() {
    if (header.style.top == "0px") {
        header.style.top = "77px"; // set to this position on click if its current position is 0px
        navigation.style.top = "0px";
        header.style.transition = "all 0.5s ease 0s"; // apply transition property
    }
    else {
        header.style.top = "0px"; // if top position is not equal to 0, then hide the navigation bar onclick
        navigation.style.top = "-77px";
    }
}