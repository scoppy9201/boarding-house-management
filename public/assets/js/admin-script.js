/*-----------------------------------------------------------------------------------

 Template Name:Sheltos
 Template URI: themes.pixelstrap.com/Sheltos
 Description: This is Real Estate website
 Author: Pixelstfrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
// 01.loader js
// 02.Tap to Top
// 03.Image to background js
// 04.liked js
// 05.Dropdown select

(function ($) {
    "use strict";

    /*=====================
     01. loader js
     ==========================*/
     $(window).on('load', function () {
        setTimeout(function(){
            $('.loader-wrapper').fadeOut('slow');
        }, 1000);
        $('.loader-wrapper').remove('slow');
    });

    /*=====================
     02. Tap to Top
     ==========================*/
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').addClass('top');
        } else {
            $('.tap-top').removeClass('top');
        }
    });

    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /*=====================
     03. Image to background js
     ==========================*/
     $(".bg-top").parent().addClass('b-top');
     $(".bg-bottom").parent().addClass('b-bottom');
     $(".bg-center").parent().addClass('b-center');
     $(".bg-left").parent().addClass('b-left');
     $(".bg-right").parent().addClass('b-right');
     $(".bg_size_content").parent().addClass('b_size_content');
     $(".bg-img").parent().addClass('bg-size');
     $(".bg-img.blur-up").parent().addClass('blur-up lazyload');
     $('.bg-img').each(function () {
 
         var el = $(this),
             src = el.attr('src'),
             parent = el.parent();
 
 
         parent.css({
             'background-image': 'url(' + src + ')',
             'background-size': 'cover',
             'background-position': 'center',
             'background-repeat': 'no-repeat',
             'display': 'block'
         });
 
         el.hide();
     });
 
      /*=====================
      04. liked js
      ==========================*/
      $(".like-bottom").on('click', function() {
         $(this).parents(".property-box").toggleClass('liked-img');
      });

    /*=====================
     05. Dropdown select
     ==========================*/
    $(".dropdown-menu a").on('click', function() {
        var a = $(this).closest("a");
        var getSampling = a.text();
        $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span').text(getSampling);
    });

    $(".mobile-search").on('click', function(){
        $(".search-form").toggleClass("open");
    }); 

     // show number 
    $(".agent-contact > li .label").click(function(){
        $(this).parent().toggleClass("show");
    });
    
})(jQuery);

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}