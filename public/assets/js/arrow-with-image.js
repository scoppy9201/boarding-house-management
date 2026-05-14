(function ($) {
    $(function() {

        // Slick slider for prev/next thumbnails images
        $('.feature-3').slick({
            dots: false,
            infinite: true,
            speed: 800,
            fade: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                    }
                }
            ],
        });
    })

})(jQuery);