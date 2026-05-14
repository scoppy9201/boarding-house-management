new WOW().init();

(function($) {
    "use strict";
    // colorpicker js
    var color_picker10 = document.getElementById("ColorPicker10").value;
    document.getElementById("ColorPicker10").onchange = function() {
        color_picker10 = this.value;
        document.documentElement.style.setProperty('--theme-default10', color_picker10);
    };

})(jQuery);

document.getElementById('pwd-icon1').onclick = function() {
    if( this.classList.contains(open) ) {
    eleother.type="password";
    this.classList.remove(open);
    this.className += ' '+close;
    } else {
        eleother.type="text";
        this.classList.remove(close);
        this.className += ' '+open;
    }
}