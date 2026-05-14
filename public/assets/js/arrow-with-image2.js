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
            customPaging : function(slider, i) {
                var title = $(slider.$slides[i]).find('.feature-style').data('title');
                return '<a class="pager__item"> ' + title + ' </a>';
            },
        });
        setTimeout(function() {
            $('.feature-3').find('.slick-prev').prepend('<div class="prev-slick-img slick-thumb-nav"></div>');
            $('.feature-3').find('.slick-next').append('<div class="next-slick-img slick-thumb-nav"></div>');
            get_prev_slick_img();
            get_next_slick_img();
        }, 500);

        $('.feature-3').on('click', '.slick-prev', function() {
            get_prev_slick_img();
        });
        $('.feature-3').on('click', '.slick-next', function() {
            get_next_slick_img();
        });
        $('.feature-3').on('swipe', function(event, slick, direction) {
            if (direction == 'left') {
                get_prev_slick_img();
            }
            else {
                get_next_slick_img();
            }
        });

        $('.slick-dots').on('click', 'li a', function() {
            var li_no = $(this).parent('li').index();
            if ($(this).parent('li').index() > li_no) {
                get_prev_slick_img()
            }
            else {
                get_next_slick_img()
            }
        });
        function get_prev_slick_img() {
            // For prev img
            var prev_slick_img = $('.slick-current').prev('.slick-slide').find('img').attr('src');
            $('.prev-slick-img img').attr('src', prev_slick_img);
            $('.prev-slick-img').css('background-image', 'url(' + prev_slick_img + ')');
            // For next img
            var prev_next_slick_img = $('.slick-current').next('.slick-slide').find('img').attr('src');
            $('.next-slick-img img').attr('src', prev_next_slick_img);
            $('.next-slick-img').css('background-image', 'url(' + prev_next_slick_img + ')');
        }
        function get_next_slick_img() {
            // For next img
            var next_slick_img = $('.slick-current').next('.slick-slide').find('img').attr('src');
            $('.next-slick-img img').attr('src', next_slick_img);
            $('.next-slick-img').css('background-image', 'url(' + next_slick_img + ')');
            // For prev img
            var next_prev_slick_img = $('.slick-current').prev('.slick-slide').find('img').attr('src');
            $('.prev-slick-img img').attr('src', next_prev_slick_img);
            $('.prev-slick-img').css('background-image', 'url(' + next_prev_slick_img + ')');
        }
        // End
        
    })

})(jQuery);