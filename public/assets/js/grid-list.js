/*=====================
     grid & list view js
     ==========================*/
(function ($) {
  "use strict";
  //list layout view
  $('.grid-btn').on('click', function (e) {
    $(this).addClass("active").siblings('.active').removeClass('active');
    $('.property-grid').removeClass("list-view");
    $(".property-grid").children().addClass("col-md-6").removeClass("col-md-12");
    $(".property-grid-3 .property-grid").children().addClass("col-md-6 col-xl-4").removeClass("col-xl-6");
  });
  $('.list-btn').on('click', function (e) {
    $(this).addClass("active").siblings('.active').removeClass('active');
    $('.property-grid').addClass("list-view");
    $(".property-grid").children();
    $(".property-grid").children().addClass("col-md-12").removeClass("col-md-6");
    $(".property-grid-3 .property-grid").children().addClass("col-md-12 col-xl-6").removeClass("col-md-6 col-xl-4");
  });
})(jQuery);


