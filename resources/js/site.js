import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import focus from "@alpinejs/focus";
import morph from "@alpinejs/morph";
import persist from "@alpinejs/persist";
import precognition from "laravel-precognition-alpine";
import Swiper from "swiper/bundle";
import "swiper/css/bundle";

// Call Alpine.
window.Alpine = Alpine;
Alpine.plugin([collapse, focus, morph, persist, precognition]);
Alpine.start();

const swiper = new Swiper(".swiper-container", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    loopFillGroupWithBlank: false,
    slidesPerView: "auto",
    initialSlide: 2,
    coverflowEffect: {
        rotate: 40,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
