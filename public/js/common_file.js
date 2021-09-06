  // $(document).ready(function() { 

  //       // Script to toggle the floating search bar
  //       $("#searchIcon").click(function() {
  //          // $("#floatingSearch").slideToggle();
  //          $("#floatingSearch").toggleClass('slideLeft');
  //          $("#floatingSearch input[type='text']").focus();
  //       }); 
  //   });
        

$(document).ready(function(){
    $(".slide-toggle").click(function(){
        // $(".searchBox").animate({
        //     width: "toggle"
        // });
        $(".searchBox").toggle();
        $(this).toggleClass('setActive');
        $('.searchBox').toggleClass('setActiveBox');          

    });

    if ( $('#suggesstion-box').children().length > 0 ) {
        alert('hello')
    }

    if( $('#suggesstion-box')[0].hasChildNodes() ) { 
        alert('hello')
     }

     $(".close_btn").click(function(){
        $("#right_btm_box").hide();
        });
});

    
// AJAX call for autocomplete 

// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we're scaling
// using CSS3 transforms
// ------------------------------------------
// captchaScale = containerWidth / elementWidth

function scaleCaptcha(elementWidth) {
  // Width of the reCAPTCHA element, in pixels
  var reCaptchaWidth = 304;
  // Get the containing element's width
    var containerWidth = $('.container').width();
  
  // Only scale the reCAPTCHA if it won't fit
  // inside the container
  if(reCaptchaWidth > containerWidth) {
    // Calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // Apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')'
    });
  }
}

$(function() { 
 
  // Initialize scaling
  scaleCaptcha();
  
  // Update scaling on window resize
  // Uses jQuery throttle plugin to limit strain on the browser
  $(window).resize( $.throttle( 100, scaleCaptcha ) );
  
});

      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });

