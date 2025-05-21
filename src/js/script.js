import "babel-polyfill";
import "bootstrap";

// Styling
import "../scss/style.scss";

// Fontawesome
import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
  faFacebookF,
  faTwitter,
  faInstagram,
  faLinkedinIn,
} from "@fortawesome/free-brands-svg-icons";
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
  inputElement.style.setProperty("--width", `${100 / slideCount}%`);
  let stepSize = 1000 / (slideCount - 1);
  inputElement.addEventListener("input", () => {
    let truevalue = Math.round((inputElement.value / 1000) * (slideCount - 1));
    swiper.slideTo(truevalue);

    // Calculate progress and update red color
    let percentage = (inputElement.value / inputElement.max) * 100;
    inputElement.style.backgroundSize = (percentage % 100.5) + "%";
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
    centeredSlides: true,
    grabCursor: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: x.querySelector(".swiper-button-next"),
      prevEl: x.querySelector(".swiper-button-prev"),
    },

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

//Images Swiper Single vactuure

document.querySelectorAll(".images-slider").forEach((x) => {
  let slideCount = x.querySelectorAll(".swiper-slide").length;
  let swiper = new Swiper(x.querySelector(".images-swiper"), {
    slidesPerView: 1,
    centeredSlides: true,
    grabCursor: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: x.querySelector(".swiper-button-next"),
      prevEl: x.querySelector(".swiper-button-prev"),
    },

    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1280: {
        slidesPerView: 3,
      },
      1440: {
        slidesPerView: 2.5,
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

document.querySelectorAll(".image-slider").forEach((x) => {
  let slideCount = x.querySelectorAll(".swiper-slide").length;
  let swiper = new Swiper(x.querySelector(".image-swiper"), {
    slidesPerView: 1,
    centeredSlides: true,
    grabCursor: true,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: x.querySelector(".swiper-button-next"),
      prevEl: x.querySelector(".swiper-button-prev"),
    },

    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1280: {
        slidesPerView: 3,
      },
      1440: {
        slidesPerView: 2.5,
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

// Scroll to down

// document
//   .querySelector(".arrow-container a")
//   .addEventListener("click", function (e) {
//     e.preventDefault();
//     document.querySelector("#Service-Section").scrollIntoView({
//       behavior: "smooth",
//     });
//   });


//Gsap Scroll animation
gsap.config({ trialWarn: false });
document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  // To check the first image
  const photos = document.querySelectorAll(".photo:not(:first-child)");

  if (photos.length > 0) {
    // To hide the first image
     gsap.set(photos, { opacity: 0, scale: 1 });
    //1
    // gsap.set(photos, {yPercent:101});

    // To Scroll the image
    const animation = gsap.to(photos, {
      opacity: 1,
      scale: 1,
      duration: 1,
      stagger: 1,
    });
    //2

    //   const animation = gsap.to(photos, {
    //   yPercent:0,
    //   duration: 1,
    //   stagger: 1,
    // });

    ScrollTrigger.create({
      trigger: ".gallery",
      start: "top top",
      end: "bottom bottom",
      pin: ".right",
      animation: animation,
      scrub: true,
    // markers: true
    });
  } else {
    console.warn("No .photo:not(:first-child) found.");
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

  let split = new SplitText("h2", { type: "lines" });
  let masks;
  function makeItHappen() {
    masks = [];
    split.lines.forEach((target) => {
      let mask = document.createElement("span");
      mask.className = "mask";
      target.append(mask);
      masks.push(mask);
      gsap.to(mask, {
        scaleX: 0,
        transformOrigin: "right center",
        ease: "none",
        scrollTrigger: {
          trigger: target,

          scrub: true,
          start: "top center",
          end: "bottom center",
        },
      });
    });
  }

  window.addEventListener("resize", newTriggers);

  function newTriggers() {
    ScrollTrigger.getAll().forEach((trigger, i) => {
      trigger.kill();
      masks[i].remove();
    });
    split.split();
    makeItHappen();
  }

  makeItHappen();
});
