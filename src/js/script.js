import 'babel-polyfill'
import 'bootstrap'

// Styling
 import '../scss/style.scss'

// Fontawesome
import { dom, library } from '@fortawesome/fontawesome-svg-core'
import { faFacebookF, faTwitter, faInstagram, faLinkedinIn } from '@fortawesome/free-brands-svg-icons'
library.add(faFacebookF, faTwitter, faInstagram, faLinkedinIn)
dom.watch()

// General
jQuery(document).ready(function($){
    if($('.login.wp-core-ui').length){
        $('#user_login').attr('placeholder', 'Gebruikersnaam of e-mailadres');
        $('#user_pass').attr('placeholder', 'Wachtwoord')
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
    });
    inputElement.addEventListener("change", () => {
        // smoothly lock onto true value for the slide in the range element
        let truevalue = Math.round(inputElement.value / stepSize);

        let difference = truevalue * stepSize - inputElement.value;

        let interval = setInterval(() => {
            let newValue = inputElement.value + difference / 10 < truevalue * stepSize ? inputElement.value + difference / 10 : truevalue * stepSize;
            inputElement.value = newValue;
            if (inputElement.value >= truevalue * stepSize) {
                clearInterval(interval);
            }
        }, 100);
    });
    swiper.on("slideChange", () => {
        inputElement.value = swiper.realIndex * stepSize;
    });
   
    scrollbarEl.insertAdjacentElement("beforeend", inputElement);
}


document.querySelectorAll(".projecten-slider").forEach((x) => {
    let slideCount = x.querySelectorAll(".swiper-slide").length;
    let swiper = new Swiper(x.querySelector(".projecten-swiper"), {
        slidesPerView: 1,
        centeredSlides: false,
        grabCursor: true,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: x.querySelector(".swiper-button-next"),
            prevEl: x.querySelector(".swiper-button-prev"),
        },

        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1280: {
                slidesPerView: 3,
            },
            1440: {
                slidesPerView: 3.3,
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

    swiperScrollbar(swiper, x.querySelector(".custom-swiper-scrollbar"), slideCount);

   
});