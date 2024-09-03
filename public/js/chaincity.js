 //all javascript function for chaincity
 jQuery(function(){
    class ChainCity{
 
    //basic function for header animation
     BasicFunctions(){
        $(window).on('scroll', function() {
             let scrollHeight=$(document).scrollTop();
             if(scrollHeight>550){
                $(".navbar").addClass("bg-dark")
             }
             else if(scrollHeight<550){
                $(".navbar").removeClass("bg-dark") 
             }
          });

          //dashboard pop search listing
          $(".search-listing-input").click(function(){
             $(".search-listing-input").attr("disabled",true);
             $(".search-listing").fadeIn(1000);
             $(".search-listing").removeClass('d-none');
          });

          //close listing search popup
          $(".listpopup-button").click(function(){
              $(".search-listing").hide(1000);
              $(".search-listing-input").attr("disabled",false);
          })

       }

     //form handling basic function
     HandleForm(){
      $('input').focus(function() {
         var containerId = $(this).closest('.input-group');
         $(containerId).css('border-color', '#0b9e16');
     });
 
     $('input').blur(function() {
         var containerId= $(this).closest('.input-group');
         if ($(this).val() === '') {
             $(containerId).css('border-color', '#eb3931');
         }
     });

         //toggle password
         $(".toggle-password").click(function() {
            var input = $(".password");
            
            if (input.attr("type") === "password") {
               input.attr("type", "text");
               //toogle class
               $(".toggle-password").removeClass("bi-eye-slash");
               $(".toggle-password").addClass("bi-eye");

            } 
            else {
               input.attr("type", "password");
               //toogle class
               $(".toggle-password").removeClass("bi-eye");
               $(".toggle-password").addClass("bi-eye-slash");
               
            }
      });
     }
      
  }
 
    
 let jsclass= new ChainCity();
 
 jsclass.BasicFunctions();
 jsclass.HandleForm();
 
})
   