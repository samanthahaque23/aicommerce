import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade'; // Include fade effect

import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules'; // Import fade effect

// Register Swiper modules
Swiper.use([Navigation, Pagination, Autoplay, EffectFade]);

document.addEventListener('DOMContentLoaded', function () {
    // Initialize the hero slider with fade effect
    const heroSwiper = new Swiper('.hero-slider .swiper-container', {
        effect: 'fade', // Use fade effect
        loop: true,
        autoplay: {
            delay: 5000, // Auto slide every 5 seconds
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        fadeEffect: {
            crossFade: true // Ensures smoother transitions
        }
    });

    // Initialize the regular product slider
    const productSwiper = new Swiper('.swiper-container:not(.hero-slider .swiper-container)', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
});
