var heading = document.getElementById("heading-text"); // target the heading for the step by step section
var description = document.getElementById("desc"); // target the description (paragraph element)

// on click of step 1, change the subheading and its color along with the description
function change1() {
    heading.innerHTML = "Select an Item";
    heading.style.color = "#ffbfc3";
    
    description.innerHTML = "Proceed with the order and complete the checkout is only the first step. When you are sure that you have what you want in their basket, checkout would be the next choice. We will then send a mail through the email you used to register to show that it was a successful transaction."
}

// on click of step 2, change the subheading and its color along with the description
function change2() {
    heading.innerHTML = "Confirm and Prepare";
    heading.style.color = "#b4becb";
    
    description.innerHTML = "The email that you will receive contains details about the confirmation of the order. There will be a tracking hyperlink to display the details of your items. From the moment we start preparing your order until the time it is delivered to your home, it will be displayed in the details."

}

// on click of step 3, change the subheading and its color along with the description
function change3() {
    heading.innerHTML = "Out for Delivery";
    heading.style.color = "#ffbfc3";

    description.innerHTML = "Once we have confirmed and are fully prepared for the beautiful flowers to be delivered, the status in the tracking will change to 'Out for Delivery' meaning it has started its journey and it's time to be excited! The items will be delivered in approcimately 2-3 days and it will be tended with care by a staff member until it arrives on your hands to preserve its great quality."
}

// on click of step 4, change the subheading and its color along with the description
function change4() {
    heading.innerHTML = "Fresh at Home";
    heading.style.color = "#b4becb";

    description.innerHTML = "It is finally on your hands! We hope the items you ordered exceeds your expectations and please leave a feedback! We would be delighted to know what you think about our products!"
}