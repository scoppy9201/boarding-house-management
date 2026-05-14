(function ($) {
   "use strict";

    /*=====================
    wizard js
    ==========================*/
    // step 1
    $("#needs-validation").submit(function(e) {
     e.preventDefault();

     var UserName = $('#user_name').val();
     var LastName = $('#last_name').val();
     var PhoneNum = $('#phone_num').val();
     var Datepick = $('#datepicker').val();
   
      if (UserName !== '' && LastName !== '' && PhoneNum !== '' && Datepick !== ''){
         $("#needs-validation").addClass("was-validated");  
         $('.step-1').removeClass('active').addClass('disabled');
         $('.step-2').addClass('active');
         $('.wizard-step-2').addClass('d-block').removeClass('d-none');
         $('.wizard-step-1').removeClass('d-block').addClass('d-none');
      }

      $("#needs-validation input").each(function() {
         if(!isNaN(this.value)) {
            $("#needs-validation").addClass("was-validated");  
         }
     });
     return false;

   });

   // step 2
    $(".prev1").on("click", function () {
       $('.step-1').addClass('active').removeClass('disabled');
       $('.step-2, .step-3, .step-4').removeClass('active');
       $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
       $('.wizard-step-1').addClass('d-block').removeClass('d-none');
    });

     $("#needs-validation1").submit(function(e) {
      e.preventDefault();

      var Emailadd = $('#email_add').val();
      var Pwdd = $('#pwdd').val();
      var Pwdd1 = $('#pwdd1').val();
      var Address = $('#address').val();
      var Zipcode = $('#zip_code').val();
   
      if (Emailadd !== '' && Pwdd !== '' && Pwdd1 !== '' && Address !== '' && Zipcode !== ''){
         $("#needs-validation1").addClass("was-validated");  
         $('.step-2').removeClass('active').addClass('disabled');
         $('.step-3').addClass('active');
         $('.wizard-step-3').addClass('d-block').removeClass('d-none');
         $('.wizard-step-2').removeClass('d-block').addClass('d-none');
      }


      $("#needs-validation1 input").each(function() {
         if(!isNaN(this.value)) {
            $("#needs-validation1").addClass("was-validated");  
         }
     });
     return false;
    });

     // step 3

     $(".prev2").on("click", function () {
        $('.step-2').addClass('active').removeClass('disabled');
        $('.step-3').removeClass('active').removeClass('disabled');
        $('.wizard-step-3').removeClass('d-block').addClass('d-none');
        $('.wizard-step-2').addClass('d-block').removeClass('d-none');
     });

     $(".next3").on("click", function () {
        $('.step-3').removeClass('active').addClass('disabled');

        swal({
           title: "Are you sure you want to submit the form?",
           text: "please check account details",
           icon: "success",
           buttons: [true, "submit"],
           dangerMode: true,
       }).then(function(isConfirm) {
            if(isConfirm){
               var notify = $.notify('Your Account created successfully.', {
                  type: 'success',
                  allow_dismiss: false,
                  delay: 2000,
                  placement: {
                     from: 'top',
                     align: 'right'
                  },
                  timer: 300,
                  
               });
               window.setTimeout(function(){
                  location.reload();
               } ,4000);
               

            }
           
        });
     });
  
})(jQuery);