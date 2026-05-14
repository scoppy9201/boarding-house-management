new WOW().init();

(function($) {
   "use strict";
   // colorpicker js
   var color_picker5 = document.getElementById("ColorPicker5").value;
   document.getElementById("ColorPicker5").onchange = function() {
       color_picker5 = this.value;
       document.documentElement.style.setProperty('--theme-default5', color_picker5);
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