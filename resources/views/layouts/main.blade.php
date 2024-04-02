<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dash.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>


@yield('content')


<script>
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

</script>