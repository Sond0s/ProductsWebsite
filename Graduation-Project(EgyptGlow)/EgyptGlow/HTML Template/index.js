// JS functions to control sections
$(document).ready(function () {
    $("#banner-area .owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });

    // top products carousel
    $("#top-products .owl-carousel").owlCarousel({

        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // brands filtering grid
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items with buttons

    $(".button-group").on("click", "button", function () {

        var filterValue = $(this).attr("data-filter");
        $grid.isotope({ filter: filterValue });
    });
});