/*=====================
 Zoom gallery Js
 ==========================*/
$(document).ready(function() {

    $('.zoom-gallery').magnificPopup({
        delegate: 'a.zoom',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile mfp-img',
        image: {
            verticalFit: true,
        },
        gallery: {
            enabled: false
        },
        zoom: {
            enabled: false,
            duration: 500, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }

    });
});
