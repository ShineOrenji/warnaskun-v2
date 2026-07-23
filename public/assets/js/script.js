'use strict';



/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector('[data-preaload]');

window.addEventListener('load', function () {
  preloader.classList.add('loaded');
  document.body.classList.add('loaded');
});



/**
 * add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector('[data-navbar]');
const navTogglers = document.querySelectorAll('[data-nav-toggler]');
const overlay = document.querySelector('[data-overlay]');
const navLinks = document.querySelectorAll('[data-nav-link]');

const toggleNav = function () {
  navbar.classList.toggle('active');
  overlay.classList.toggle('active');
  document.body.classList.toggle('nav-active');
}

const closeNav = function () {
  navbar.classList.remove('active');
  overlay.classList.remove('active');
  document.body.classList.remove('nav-active');
}

addEventOnElements(navTogglers, 'click', toggleNav);

// Close navbar when clicking on nav links
addEventOnElements(navLinks, 'click', function () {
  closeNav();
});

/**
 * HEADER HIDE/SHOW ON SCROLL - IMPROVED
 */

let lastScrollPosition = 0;
const headerElement = document.querySelector('[data-header]');

window.addEventListener('scroll', function() {
  const currentScrollPosition = window.scrollY;
  
  // Jika scroll ke bawah dan posisi scroll > 50px
  if (currentScrollPosition > lastScrollPosition && currentScrollPosition > 50) {
    headerElement.classList.add('hide');
  } 
  // Jika scroll ke atas atau di posisi atas
  else {
    headerElement.classList.remove('hide');
  }
  
  lastScrollPosition = currentScrollPosition;
});

/**
 * HEADER
 * 
 * header will active after scroll 100px
 */

const header = document.querySelector('[data-header]');
const backTopBtn = document.querySelector('[data-back-top-btn]');

const activeElementOnScroll = function () {
  if (window.scrollY > 100) {
    header.classList.add('active');
    backTopBtn.classList.add('active');
  } else {
    header.classList.remove('active');
    backTopBtn.classList.remove('active');
  }
}

window.addEventListener('scroll', activeElementOnScroll);



/**
 * SCROLL REVEAL
 */

const revealElements = document.querySelectorAll('[data-reveal]');

const revealElementOnScroll = function () {
  for (let i = 0, len = revealElements.length; i < len; i++) {
    const isElementOnScreen = revealElements[i].getBoundingClientRect().top < window.innerHeight / 1.15;

    if (isElementOnScreen) {
      revealElements[i].classList.add('revealed');
    } else {
      revealElements[i].classList.remove('revealed');
    }
  }
}

window.addEventListener('scroll', revealElementOnScroll);

window.addEventListener('load', revealElementOnScroll);



/**
 * HERO SLIDER
 */

const heroSliderItems = document.querySelectorAll('[data-hero-slider-item]');
const heroSliderPrevBtn = document.querySelector('[data-prev-btn]');
const heroSliderNextBtn = document.querySelector('[data-next-btn]');

let currentSlidePos = 0;
let lastActiveSliderItem = heroSliderItems[0];

const updateSliderPos = function () {
  lastActiveSliderItem.classList.remove('active');
  heroSliderItems[currentSlidePos].classList.add('active');
  lastActiveSliderItem = heroSliderItems[currentSlidePos];
}

const slideNext = function () {
  if (currentSlidePos >= heroSliderItems.length - 1) {
    currentSlidePos = 0;
  } else {
    currentSlidePos++;
  }

  updateSliderPos();
}

heroSliderNextBtn.addEventListener('click', slideNext);

const slidePrev = function () {
  if (currentSlidePos <= 0) {
    currentSlidePos = heroSliderItems.length - 1;
  } else {
    currentSlidePos--;
  }

  updateSliderPos();
}

heroSliderPrevBtn.addEventListener('click', slidePrev);

/**
 * auto slide
 */

let autoSlideInterval;

const autoSlide = function () {
  autoSlideInterval = setInterval(function () {
    slideNext();
  }, 5000);
}

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], 'mouseover', function () {
  clearInterval(autoSlideInterval);
});

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], 'mouseout', autoSlide);

window.addEventListener('load', autoSlide);



/**
 * PARALLAX EFFECT
 */

const parallaxItems = document.querySelectorAll('[data-parallax-item]');

let x, y;

window.addEventListener('mousemove', function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // reverse the number eg. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    const speed = parallaxItems[i].dataset.parallaxSpeed;
    parallaxItems[i].style.transform = `translate(${x * speed}px, ${y * speed}px)`;
  }

});