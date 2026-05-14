(function ($) {
  "use strict";
  $(".customizer-links").on("click", function () {
    $(".customizer-wrap").addClass("open");
    $(".left-sidebar").css("left", "-365px");
    $(".left-sidebar").removeClass("open");
  });

  $(".setting-back").on("click", function () {
    $(".customizer-wrap").removeClass("open");
  });

  // light dark layout js
  var $setting_check = $(".setting-check");
  var $layout_type = $("body");
  $setting_check.on("click", function () {
    $layout_type.toggleClass("dark-layout");
    if (this.checked) {
      $layout_type.addClass("dark-layout");
    } else {
      $layout_type.removeClass("dark-layout");
    }
  });

  // rtl layout js
  var $setting_check1 = $(".setting-check1");
  $setting_check1.on("click", function () {
    $layout_type.toggleClass("rtl");
    if (this.checked) {
      $("html").attr("dir", "rtl");
    } else {
      $("html").attr("dir", "ltr");
    }
  });
})(jQuery);
