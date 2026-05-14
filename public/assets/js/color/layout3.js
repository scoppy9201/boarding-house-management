new WOW().init();

(function ($) {
    "use strict";
    // colorpicker js
    var color_picker8 = document.getElementById("ColorPicker8").value;
    document.getElementById("ColorPicker8").onchange = function () {
        color_picker8 = this.value;
        document.documentElement.style.setProperty('--theme-default8', color_picker8);
    };

    var color_picker9 = document.getElementById("ColorPicker9").value;
    document.getElementById("ColorPicker9").onchange = function () {
        color_picker9 = this.value;
        document.documentElement.style.setProperty('--theme-default9', color_picker9);
    };
})(jQuery);