jQuery(document).ready(function($) {
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Initialize Lightbox
    $('.lightbox').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
        },
    });
});
