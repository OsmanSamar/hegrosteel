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
                slidesPerView: 3.8,
            },
            1440: {
                slidesPerView: 5,
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

   
});