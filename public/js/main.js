document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1, // Show one slide at a time
        spaceBetween: 30, // Optional space between slides
        loop: true, // Enable looping
        autoplay: {
            delay: 2500, // Delay in milliseconds between transitions (2.5 seconds here)
            disableOnInteraction: false, // Continue autoplay when the user interacts with the swiper
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // Allow pagination bullet clicks
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
