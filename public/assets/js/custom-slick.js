/*=====================
     slick slider js
     ==========================*/
$(document).ready(function(){
    $('.slide-1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        autoplay: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.slide-2').slick({
        dots: false,
        infinite: true,
        speed: 700,
        arrows: false,
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.slide-3').slick({
        dots: false,
        infinite: true,
        speed: 700,
        autoplay: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 321,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });

    $('.blog-1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.blog-2').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.testimonial-1').slick({
        dots: true,
        infinite: true,
        speed: 500,
        arrows: false,
        autoplay: true,
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '120px',
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.testimonial-2').slick({
        dots: false,
        infinite: true,
        speed: 700,
        fade: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            }
        ]
    });

    $('.testimonial-3').slick({
        dots: true,
        infinite: true,
        speed: 500,
        arrows: false,
        autoplay: true,
    });

    $('.comment-right').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        autoplay: true,
        asNavFor: '.img-testimonial',
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                }
            }
        ]
    });

    $('.img-testimonial').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        autoplay: true,
        asNavFor: '.comment-right',
    });

    $('.about-1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.about-2').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.about-3').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });

    // landing page slider
    $('.slide-center-1').slick({
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 3,
        dots: false,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    arrows: false,
                    centerPadding: '150px',
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.service-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '300px',
        responsive: [
            {
                breakpoint: 1916,
                settings: {
                    centerPadding: '160px',
                }
            },
            {
                breakpoint: 1848,
                settings: {
                    centerPadding: '100px',
                }
            },
            {
                breakpoint: 1712,
                settings: {
                    centerPadding: '70px',
                }
            },
            {
                breakpoint: 1660,
                settings: {
                    centerPadding: '30px',
                }
            },
            {
                breakpoint: 1556,
                settings: {
                    centerPadding: '0px',
                }
            },
            {
                breakpoint: 1461,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '40px',
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '0px',
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    centerPadding: '0px',
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '0px',
                    arrows: false,
                }
            }
        ]
    });

    $('.property-1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.property-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.property-3').slick({
        dots: true,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '190px',
        responsive: [
            {
                breakpoint: 1660,
                settings: {
                    centerPadding: '30px',
                }
            },
            {
                breakpoint: 1556,
                settings: {
                    centerPadding: '0px',
                }
            },
            {
                breakpoint: 1461,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '40px',
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '20px',
                }
            },
            {
                breakpoint: 1320,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '400px',
                }
            },
            {
                breakpoint: 1230,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '370px',
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '350px',
                }
            },
            {
                breakpoint: 1175,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '320px',
                }
            },
            {
                breakpoint: 1110,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '300px',
                }
            },
            {
                breakpoint: 1065,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '270px',
                }
            },
            {
                breakpoint: 1015,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '260px',
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '230px',
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '210px',
                }
            },
            {
                breakpoint: 930,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '180px',
                }
            },
            {
                breakpoint: 915,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '150px',
                }
            },
            {
                breakpoint: 810,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '120px',
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '100px',
                    arrows: false,
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '60px',
                }
            },
            {
                breakpoint: 620,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '30px',
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '0px',
                }
            },
            {
                breakpoint: 445,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '-20px',
                }
            }
        ]
    });

    $('.property-4').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });

    $('.feature-1').slick({
        dots: false,
        infinite: true,
        fade: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            }
        ]
    });

    $('.feature-2').slick({
        dots: true,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1461,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.feature-4').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.offer-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.pricing-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.home-slider-1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.home-slider-2').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    arrows: false,
                }
            },
        ]
    });

    $('.home-slider-3').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 481,
                settings: {
                    arrows: false,
                }
            },
        ]
    });

    $('.home-slider-4').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        asNavFor: '.home-nav',
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                }
            },
        ]
    }).slickAnimation();

    $('.home-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.home-slider-4',
        arrows: false,
        dots: false,
        focusOnSelect: true
    });


    $('.footer-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1461,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    // common grid slider
    $('.grid-slider').slick({
        dots: false,
        infinite: true,
        speed: 800,
        fade: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.feature-slider').slick({
        dots: false,
        infinite: true,
        speed: 800,
        fade: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // thumbnail slider
    $('.slider-for').each(function (key, item) {

        var sliderIdName = 'slider' + key;
        var sliderNavIdName = 'sliderNav' + key;

        this.id = sliderIdName;
        $('.slider-nav')[key].id = sliderNavIdName;

        var sliderId = '#' + sliderIdName;
        var sliderNavId = '#' + sliderNavIdName;

        $(sliderId).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: sliderNavId
        });

        $(sliderNavId).slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: sliderId,
            arrows: false,
            dots: false,
            focusOnSelect: true
        });

    });

    // gallery slider
    $('.gallery-for').each(function (key, item) {

        var sliderIdName = 'slider' + key;
        var sliderNavIdName = 'sliderNav' + key;

        this.id = sliderIdName;
        $('.gallery-nav')[key].id = sliderNavIdName;

        var sliderId = '#' + sliderIdName;
        var sliderNavId = '#' + sliderNavIdName;

        $(sliderId).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: sliderNavId
        });

        $(sliderNavId).slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            asNavFor: sliderId,
            arrows: false,
            dots: false,
            focusOnSelect: true,
        });

    });

    // single property slider
    $('.single-property-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.main-property-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // center slider
    $('.center-slider').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 360,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '30px',
                    slidesToShow: 1
                }
            }
        ]
    });
});