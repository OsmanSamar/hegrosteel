import "babel-polyfill";
import "bootstrap";
import Swiper from "swiper";
// Styling
import "../scss/style.scss";
import AOS from 'aos';
AOS.init();

// Fontawesome
import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
  faFacebookF,
  faTwitter,
  faInstagram,
  faLinkedinIn,
} from "@fortawesome/free-brands-svg-icons";
import { Navigation } from "swiper/modules";
library.add(faFacebookF, faTwitter, faInstagram, faLinkedinIn);
dom.watch();

// General
jQuery(document).ready(function ($) {
  if ($(".login.wp-core-ui").length) {
    $("#user_login").attr("placeholder", "Gebruikersnaam of e-mailadres");
    $("#user_pass").attr("placeholder", "Wachtwoord");
  }
});

//Scrollbar
var target = window.location.hash,
    target = target.replace('#', '');

// delete hash so the page won't scroll to it
window.location.hash = "";

// now whenever you are ready do whatever you want
// (in this case I use jQuery to scroll to the tag after the page has loaded)
jQuery(window).on('load', function() {
    if (target) {
      setTimeout(() => {
        
       document.getElementById(target).scrollIntoView()
       window.location.hash=target;
      }, 400);
    }
});

function swiperScrollbar(swiper, scrollbarEl, slideCount) {
  if (typeof scrollbarEl == "string") {
    scrollbarEl = document.querySelector(scrollbarEl);
  }
  scrollbarEl.innerHTML = "";
  let inputElement = document.createElement("input");
  inputElement.type = "range";
  inputElement.classList.add("custom-scrollbar");
  inputElement.min = 0;
  inputElement.max = 1000;
  inputElement.value = 0;
  // inputElement.style.setProperty("--width", `${100 / slideCount}%`);
  let stepSize = 1000 / (slideCount - 1);
  inputElement.addEventListener("input", () => {
    let truevalue = Math.round((inputElement.value / 1000) * (slideCount - 1));
    swiper.slideTo(truevalue);

    // Calculate progress and update red color
    let percentage = (inputElement.value / inputElement.max) * 100;
    inputElement.style.backgroundSize = (percentage % 100.5) + "%";
    inputElement.style.setProperty("--width", (percentage % 100.5) + "%");
  });
  inputElement.addEventListener("change", () => {
    // smoothly lock onto true value for the slide in the range element
    let truevalue = Math.round(inputElement.value / stepSize);

    let difference = truevalue * stepSize - inputElement.value;

    let interval = setInterval(() => {
      let newValue =
        inputElement.value + difference / 10 < truevalue * stepSize
          ? inputElement.value + difference / 10
          : truevalue * stepSize;
      inputElement.value = newValue;
      if (inputElement.value >= truevalue * stepSize) {
        clearInterval(interval);
      }
    }, 100);
  });
  swiper.on("slideChange", () => {
    inputElement.value = swiper.realIndex * stepSize;

    //Added
    let percentage = (inputElement.value / inputElement.max) * 100;
    inputElement.style.backgroundSize = (percentage % 100.5) + "%";

    inputElement.style.setProperty("--width", (percentage % 100.5) + "%");
  });

  scrollbarEl.insertAdjacentElement("beforeend", inputElement);
}

//Tabs
document.addEventListener("DOMContentLoaded", function () {
  const tabLinks = document.querySelectorAll(".tab-link");
  const tabContents = document.querySelectorAll(".tab-content");

  tabLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const target = this.getAttribute("data-tab");

      // Remove active class from all links and hide all content
      tabLinks.forEach((l) => l.classList.remove("active"));
      tabContents.forEach((content) => (content.style.display = "none"));

      // Add active class to clicked link and show content
      this.classList.add("active");
      document.getElementById(target).style.display = "block";
    });
  });
});

//Projecten Swiper
document.querySelectorAll(".projecten-slider").forEach((x) => {
  let slideCount = x.querySelectorAll(".swiper-slide").length;
  let swiper = new Swiper(x.querySelector(".projecten-swiper"), {
    slidesPerView: 1,
    // centeredSlides: true,
    grabCursor: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: x.querySelector(".swiper-button-next"),
      prevEl: x.querySelector(".swiper-button-prev"),
    },
    modules: [Navigation],

    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1280: {
        slidesPerView: 3,
      },
      1440: {
        slidesPerView: 3,
      },
    },

    // Reinitialize AOS after Swiper initialization
    on: {
      init: function () {
        // AOS.refresh();
      },
      slideChangeTransitionEnd: function () {
        // AOS.refresh();
      },
    },
  });

  swiperScrollbar(
    swiper,
    x.querySelector(".custom-swiper-scrollbar"),
    slideCount
  );
});

// Swiper img Single project
//Images Swiper Single vactuure
document.querySelectorAll(".images-slider,.image-slider").forEach((x) => {
  let slideCount = x.querySelectorAll(".swiper-slide").length;
  let swiper = new Swiper(x.querySelector(".images-swiper,.image-swiper"), {
    slidesPerView: 1.3,
   // centeredSlides: false,
    grabCursor: true,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: x.querySelector(".swiper-button-next"),
      prevEl: x.querySelector(".swiper-button-prev"),
    },
    modules: [Navigation],
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1280: {
        slidesPerView: 2,
      },
      1440: {
        slidesPerView: 2,
      },
    },

    // Reinitialize AOS after Swiper initialization
    on: {
      init: function () {
        // AOS.refresh();
      },
      slideChangeTransitionEnd: function () {
        // AOS.refresh();
      },
    },
  });

  swiperScrollbar(
    swiper,
    x.querySelector(".custom-swiper-scrollbar"),
    slideCount
  );
});




//Gsap Scroll animation
gsap.config({ trialWarn: false });

document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);
  const photos = document.querySelectorAll(".gallery .photo");

  if (photos.length > 0) {
    //To Dispaly the first image
    gsap.set(photos, { opacity: 0, scale: 1 });
    gsap.set(photos[0], { opacity: 1 });

    // Create a trigger for each image after the first one.
    for (let i = 1; i < photos.length; i++) {
      ScrollTrigger.create({
        trigger: ".gallery",
        start: () => `top+=${window.innerHeight * (i - 0.5)} top`,
        end: () => `top+=${window.innerHeight * i} top`,
        scrub: true,
        onUpdate: (self) => {
          const progress = self.progress;

          if (progress > 0.5) {
            gsap.set(photos[i - 1], { opacity: 0 });
            gsap.set(photos[i], { opacity: 1 });
          } else {
            gsap.set(photos[i - 1], { opacity: 1 });
            gsap.set(photos[i], { opacity: 0 });
          }
        },
      });
    }

    // Install the photos section
    ScrollTrigger.create({
      trigger: ".gallery",
      start: "top top",
      end: () => "+=" + window.innerHeight * (photos.length - 1),
      pin: ".right",
      scrub: true,
      // markers: true
    });
  } else {
    console.warn("No .photo found.");
  }
});


//Voor filter
let page = 1;
function loadMore() {
  let postholder = document.querySelector(".post-holder");
  let inputs = document.querySelectorAll(".filter-input");
  let params = new URLSearchParams();
  params.set("page", page);
  inputs.forEach((input) => {
    if (input.name != "") {
      if (input.type == "checkbox" || input.type == "radio") {
        if (input.checked) {
          params.append(input.name, input.value);
        }
      } else if (input.value != "") {
        params.set(input.name, input.value);
      }
    }
  });
  postholder.scrollIntoView();

  fetch(
    "/wp-json/hegrosteel/v1/" +
      postholder.dataset.type +
      "?" +
      params.toString()
  )
    .then((response) => response.json())
    .then((data) => {
      postholder.innerHTML = data.html;
      document.querySelector(".pagination-wrap").innerHTML = data.pagination;
    });
}
let timeout;
document.querySelectorAll(".filter-input").forEach((input) => {
  input.addEventListener("input", () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      page = 1;
      loadMore();
    }, 500);
  });
});

document.querySelectorAll(".pagination-wrap").forEach((x) => {
  x.addEventListener("click", (event) => {
    if (event.target.classList.contains("pagination-item")) {
      page = event.target.dataset.page;
      let postholder = document.querySelector(".post-holder");
      postholder.scrollIntoView();
      loadMore();
    }
  });
});

//shown collapse event
const navbar = document.querySelector("#navbarSupportedContent");
navbar.addEventListener("shown.bs.collapse", () => {
  navbar.classList.add("menu-open");
});
navbar.addEventListener("hidden.bs.collapse", () => {
  navbar.classList.remove("menu-open");
});


//ScrollTrigger Text Reveal
document.addEventListener("DOMContentLoaded", () => {
  console.clear();
  gsap.registerPlugin(ScrollTrigger, SplitText);

// Target h2 inside .quote_section only
  const quoteText = document.querySelector(".quote_section h2");

  if (!quoteText) return;

  // Divide the text into lines
  let split = new SplitText(quoteText, { type: "lines" });
  let masks = [];

// Implement the animation
  function makeItHappen() {
    masks = [];

    split.lines.forEach((line) => {
      const mask = document.createElement("span");
      mask.className = "mask";
      line.append(mask);
      masks.push(mask);
    });

    gsap.to(masks, {
      scaleX: 0,
      transformOrigin: "right center",
      ease: "none",
      stagger: 0.1,
      scrollTrigger: {
        trigger: document.querySelector(".quote_section"),
        start: "top 90%",     // The effect starts early
        end: "bottom 28%",    // Ends late
        // scrub: true,
        scrub: 0.5
        // markers: true,      // Enable it if you want to see the start and end of the trigger
      },
       stagger: 0.3 // Gradual delay between elements
    });
  }

// To reactivate when changing the screen size
  function newTriggers() {
    ScrollTrigger.getAll().forEach(trigger => trigger.kill());
    masks.forEach(mask => mask?.remove());
    split.split();
    makeItHappen();
  }

  window.addEventListener("resize", newTriggers);
  makeItHappen();
});








//Navigation delay after page load voor a tag on footer to open sections on Werkenbij
document.addEventListener("DOMContentLoaded", function () {
  // Check if there's a hash in the URL
  if (window.location.hash) {
    const target = document.querySelector(window.location.hash);
    if (target) {
      // Delay scroll to allow full rendering
      setTimeout(() => {
        target.scrollIntoView({ behavior: "smooth" });
      }, 300); // 300ms delay to wait until DOM is ready
    }
  }
});

//#scrollbar-indicator
window.addEventListener("scroll", function () {
  const indicator = document.getElementById("scrollbar-indicator");
  const scrollTop = window.scrollY;
  const docHeight = document.body.scrollHeight - window.innerHeight;
  const scrollPercent = (scrollTop / docHeight) * 100;
  indicator.style.width = scrollPercent + "%";
});


