
"use strict";

$(document).ready(function() {

    // Tap to top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $('.tap-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('header').addClass("sticky");
        }
        else {
            $('header').removeClass("sticky");
        }
    });
    
    // Scrollspy initiation
    $('body').scrollspy({
        target: '#scroll-spy',
        offset: 20
    });

    $('nav.navbar a, .scrollTop').on('click', function(event){
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash (#)
            var hash = this.hash;

            // Ensure no section has relevant class
            $('section').removeClass("focus");

            // Add class to target
            $(hash).addClass("focus");

            // Remove thy class after timeout
            setTimeout(function(){
                $(hash).removeClass("focus");
            }, 2000);

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area (the speed of the animation)
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 10
            }, 600, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });

            // Collapse Navbar for mobile view
            $(".navbar-collapse").collapse('hide');
        }

    });
    $(window).scroll(function(){
        var scrollPos = $('body').scrollTop();
        if(scrollPos > 0){
            $('.navbar').addClass('show-color');
            $('.scrollTop').addClass('show-button');
        } else{
            $('.navbar').removeClass('show-color');
            $('.scrollTop').removeClass('show-button');
        }
    });
    
});