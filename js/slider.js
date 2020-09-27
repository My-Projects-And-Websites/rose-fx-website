var slideIndex = 1; // current slide number
showSlides(slideIndex);

// Next/previous control buttons
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function thisSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides"); // target elements that has the class name slides
  var dots = document.getElementsByClassName("dot"); // target elements that has the class name dot

  // on the last image, reset image slider to the first image to create a loop
  if (n > slides.length) {
    slideIndex = 1;
  }

  // on the first image, if previous button is clicked, move to the last image
  if (n < 1) {
    slideIndex = slides.length;
  }

  // hide images
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }

  // show image according to slider value
  slides[slideIndex-1].style.display = "block";
}