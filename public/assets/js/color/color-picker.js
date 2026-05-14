// number js
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}    
function maxLengthCheck(object)
{
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
}

(function($) {
    "use strict";
    // colorpicker js
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

$('#datepicker').datepicker({
     uiLibrary: 'bootstrap4',
     format: 'dd mmmm yy'
 });