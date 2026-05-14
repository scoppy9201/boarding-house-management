(function ($) {
    "use strict";

     /*=====================
     wizard js
     ==========================*/
    

     $(".prev1").on('click', function() {
        $('.step-1').addClass('active').removeClass('disabled');
        $('.step-2, .step-3, .step-4').removeClass('active');
        $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
        $('.wizard-step-1').addClass('d-block').removeClass('d-none');
     });

 

      $(".prev2").on('click', function() {
         $('.step-2').addClass('active').removeClass('disabled');
         $('.step-3').removeClass('active');
         $('.wizard-step-3').removeClass('d-block').addClass('d-none');
         $('.wizard-step-2').addClass('d-block').removeClass('d-none');
      });

      $(".prev3").on('click', function() {
         $('.step-3').addClass('active').removeClass('disabled');
         $('.step-4').removeClass('active');
         $('.wizard-step-4').removeClass('d-block').addClass('d-none');
         $('.wizard-step-3').addClass('d-block').removeClass('d-none');
      });

      $(".step-again").on('click', function() {
        $('.step-1').addClass('active').removeClass('disabled');
        $('.step-2, .step-3, .step-4').removeClass('active').removeClass('disabled');
        $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
        $('.wizard-step-1').addClass('d-block').removeClass('d-none');
     });

})(jQuery);