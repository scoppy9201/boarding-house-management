/*=====================
     grid & list view js
     ==========================*/
(function ($) {
    "use strict";
    //list layout view
    $('.grid-btn').on('click', function (e) {
      for(var i=0;i<6;i++) {
        $('.grid-slider')[i].slick.refresh();
      }
    });
})(jQuery);