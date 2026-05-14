new WOW().init();

(function($) {
    "use strict";
    // colorpicker js
    var color_picker1 = document.getElementById("ColorPicker1").value;
    document.getElementById("ColorPicker1").onchange = function() {
        color_picker1 = this.value;
        document.documentElement.style.setProperty('--theme-default', color_picker1);
    };

    var color_picker2 = document.getElementById("ColorPicker2").value;
    document.getElementById("ColorPicker2").onchange = function() {
        color_picker2 = this.value;
        document.documentElement.style.setProperty('--theme-default2', color_picker2);
    };
})(jQuery);