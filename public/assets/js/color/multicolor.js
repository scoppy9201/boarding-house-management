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

    var color_picker3 = document.getElementById("ColorPicker3").value;
    document.getElementById("ColorPicker3").onchange = function() {
        color_picker3 = this.value;
        document.documentElement.style.setProperty('--theme-default3', color_picker3);
    };

    var color_picker4 = document.getElementById("ColorPicker4").value;
    document.getElementById("ColorPicker4").onchange = function() {
        color_picker4 = this.value;
        document.documentElement.style.setProperty('--theme-default4', color_picker4);
    };

    var color_picker5 = document.getElementById("ColorPicker5").value;
    document.getElementById("ColorPicker5").onchange = function() {
        color_picker5 = this.value;
        document.documentElement.style.setProperty('--theme-default5', color_picker5);
    };

    var color_picker6 = document.getElementById("ColorPicker6").value;
    document.getElementById("ColorPicker6").onchange = function() {
        color_picker6 = this.value;
        document.documentElement.style.setProperty('--theme-default6', color_picker6);
    };

    var color_picker7 = document.getElementById("ColorPicker7").value;
    document.getElementById("ColorPicker7").onchange = function() {
        color_picker7 = this.value;
        document.documentElement.style.setProperty('--theme-default7', color_picker7);
    };
})(jQuery);