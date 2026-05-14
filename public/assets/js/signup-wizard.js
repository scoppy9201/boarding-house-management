(function ($) {
    "use strict";

     /*=====================
     wizard js
     ==========================*/   

     // step 1
     $("#needs-validation").submit(function(e) {
      e.preventDefault();

      var FirstName = $('#first-name').val();
      var Phonenum = $('#phone-number').val();
      var Emailadd = $('#email').val();
      var Pwdinput = $('#pwd-input').val();
   
      if (FirstName !== '' && Phonenum !== '' && Emailadd !== '' && Pwdinput !== ''){
         $("#needs-validation").addClass("was-validated");  
         $('.wizard-step-2').addClass('d-block').removeClass('d-none');
         $('.wizard-step-1').removeClass('d-block').addClass('d-none');
         $('.step-1').removeClass('active').addClass('disabled');
         $('.step-2').addClass('active');
      }


      $("#needs-validation input").each(function() {
         if(!isNaN(this.value)) {
            $("#needs-validation").addClass("was-validated");  
         }
     });
     return false;
    });

    // step 2
     $(".prev1").click(function() {
        $('.step-1').addClass('active').removeClass('disabled');
        $('.step-2, .step-3, .step-4').removeClass('active');
        $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
        $('.wizard-step-1').addClass('d-block').removeClass('d-none');
     });

      $("#needs-validation1").submit(function(e) {
         e.preventDefault();
   
         var Address = $('#address').val();
         var Cityname = $('#city_name').val();
         var StateName = $('#state_name').val();
         var Countryname = $('#country_name').val();
         var Zipcode = $('#pin_code').val();
      
         if (Address !== '' && Cityname !== '' && StateName !== '' && Countryname !== '' && Zipcode !== ''){
            $("#needs-validation1").addClass("was-validated");  
            $('.wizard-step-3').addClass('d-block').removeClass('d-none');
            $('.wizard-step-2').removeClass('d-block').addClass('d-none');
            $('.step-2').removeClass('active').addClass('disabled');
            $('.step-3').addClass('active');

            var first_name = $('#first-name').val();
            var phone_number = $("#phone-number").val();
            var email_add = $("#email").val();
            var address = $('#address').val();
            var city_name = $("#city_name").val();
            var state_name = $("#state_name").val();
            var country_name = $("#country_name").val();
            var pin_code = $("#pin_code").val();

            $(".first_name").html(first_name);
            $(".phone_number").html(phone_number);
            $(".email_add").html(email_add);

            $(".address-type").html(address);
            $(".city-name").html(city_name);
            $(".state-name").html(state_name);
            $(".country-name").html(country_name);
            $(".pin-code").html(pin_code);
         }
   
   
         $("#needs-validation1 input").each(function() {
            if(!isNaN(this.value)) {
               $("#needs-validation1").addClass("was-validated");  
            }
        });
        return false;
       });

      // step 3

      $(".prev2").click(function() {
         $('.step-2').addClass('active').removeClass('disabled');
         $('.step-3').removeClass('active').removeClass('disabled');
         $('.wizard-step-3').removeClass('d-block').addClass('d-none');
         $('.wizard-step-2').addClass('d-block').removeClass('d-none');
      });

      $(".next3").click(function() {
         $('.step-3').removeClass('active').addClass('disabled');

         swal({
            title: "Are you sure you want to submit the form?",
            text: "please confirm the details",
            icon: "success",
            buttons: [true, "submit"],
            dangerMode: true,
        }).then(function(isConfirm) {
         if(isConfirm){
            var notify = $.notify('Your form details submitted successfully.', {
               type: 'success',
               allow_dismiss: false,
               delay: 200000,
               placement: {
               from: 'top',
               align: 'right'
            },
               timer: 30000
            });
            window.setTimeout(function(){
               location.reload();
            } ,4000);
         }
            
         });
      });
   
})(jQuery);