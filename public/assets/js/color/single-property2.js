
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
            
        })(jQuery);

        $('[href="#gallery"]').on('shown.bs.tab', function (e) {
            $('.gallery-for').resize();
            $('.gallery-for').resize();
        });