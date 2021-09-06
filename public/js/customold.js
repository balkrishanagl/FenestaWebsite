$(function(){

  var menuFlag = true;
  $('.burger-menu').click(function(){
    if(menuFlag){
      $(this).addClass('active');
      $('header .menu-list').addClass('active');
      // $('.mob-overlay').fadeIn();
      menuFlag = false;
    }else{
      $(this).removeClass('active');
      $('header .menu-list').removeClass('active');
      $('.mob-overlay').hide();
      menuFlag = true;
    }
  })


  $('.banner').addClass('load-active');
  $('.banner .count-box .image').click(function(){
  	$(this).parent().find('.count-desc').addClass('active');
  });
  $('.banner .count-box .shut').click(function(){
  	$(this).parent().removeClass('active');
  });


  $('.banner-slider').owlCarousel({
    items: 1,
    margin:0,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:false,
    responsiveClass:true,
    responsive:{
        0:{
            mouseDrag:true,
            autoplay:false,
        },
        1024:{
            mouseDrag:false,
            autoplay:false,
        }  
    }
  });

  if($(window).width() > 767){
    $('.address-slider').owlCarousel({
      items:3,
      margin:12,
      loop: true,
      autoplay:false,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1,
          },
          480:{
            items:2,
          },
          768:{
            items:2,
          },
          993:{
            items:3,
          }
      }
    });
  }else{
    $('.address-slider').removeClass('owl-carousel');
  }

  
  $('.client-slider').owlCarousel({
    items:3,
    margin:35,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1.5,
          nav:false,
          margin:13,
        },
        480:{
          items:2.5,
          nav:false,
          margin:13,
        },
        768:{
          items:2,
        },
        993:{
          items:3,
        }
    }
  });

  var items;
  var temp2 ='50px';
  var temp1;
  if($(window).width() < 1200){
    temp2 ='40px';
  }
  if($(window).width() < 993){
    temp2 ='30px';
  }

  $('.image-gallery-slider').owlCarousel({
    items:4,
    margin:0,
    loop: false,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1,
        },
        480:{
          items:2,
        },
        768:{
          items:4,
        },
        1024:{
          items:4
        },
        1500:{
          items:4
        }
    },
    onInitialized  : counter
  }).on('changed.owl.carousel',function(event){
      $('.image-gallery-slider .owl-item').removeClass('large').css('margin-right','0px');
    console.log(event.item.index)
    if(event.item.index > temp1){
      console.log(temp1,temp2)
      $('.image-gallery-slider .owl-item').eq(event.item.index + 1).addClass('large').css('margin-right',temp2);
      $('.image-gallery-slider .owl-item').eq(event.item.index + 2).addClass('large');
    }    
    if(event.item.index <= temp1){
      $('.image-gallery-slider .owl-item').eq( event.item.index + 1).addClass('large').css('margin-right',temp2);
      $('.image-gallery-slider .owl-item').eq( event.item.index + 2).addClass('large');
    }


  })


  function counter(event){
       items = event.item.count;     // Number of items
        temp1 =  event.item.index;
      $('.image-gallery-slider .owl-item').eq( event.item.index + 1).addClass('large').css('margin-right',temp2);
      $('.image-gallery-slider .owl-item').eq( event.item.index + 2).addClass('large');
  }

  $('.clientele-slider').owlCarousel({
    items: 1,
    margin:0,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
        },
        480:{
        }
    }
  });

  $('.clientele-slider-mob').owlCarousel({
    items: 1,
    margin:0,
    loop: true,
    autoplay:false,
    dots:true,
    nav:false,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
        },
        480:{
        }
    }
  });

  $('.social-feed-slider').owlCarousel({
    items: 3,
    margin:20,
    loop: false,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1.4,
          nav:false,
        },
        480:{
          items: 2.4,
          nav:false,
        },
        768:{
          items: 3,
        },
        1024:{
          items: 3,
        }
    }
  });

  if($(window).width() > 767){
    $('.customer-apprec-slider').owlCarousel({
      items: 3,
      margin:20,
      loop: false,
      autoplay:false,
      dots:false,
      nav:true,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1,
          },
          480:{
            items: 1,
          },
          768:{
            items: 2,
          },
          1024:{
            items: 3,
          }
      }
    });
  }else{
    $('.customer-apprec-slider').removeClass('owl-carousel')
  }

  $('.product-style-slider').owlCarousel({
    items: 3,
    margin:40,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          dots:true,
          nav:false,
          margin:0,
        },
        480:{
          items: 2,
          dots:true,
          nav:false,          
          margin:20,
        },
        768:{
          items: 2,
          margin:20,
        },
        1024:{
          items: 3,
          margin:20,
        },
        1200:{
          items: 3,
        }
    }
  });

  $('.feature-slider').owlCarousel({
    items: 4,
    margin:15,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    stagePadding:10,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          dots:true,
          nav:false,
          margin:0,
          stagePadding:0,
        },
        480:{
          items: 2,
          dots:true,
          nav:false,
        },
        768:{
          items: 2,
        },
        1024:{
          items:3,
        },
        1200:{
          items: 4,
        }
    }
  });
  

  $('.product-design-slider').owlCarousel({
    items: 3,
    margin:0,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    onInitialized  : addCurrentClass,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:0,
          stagePadding:5,
        },
        480:{
          items:2,
          margin:0,
          stagePadding:5,
        },
        768:{
          items: 3,
        },
        1024:{
          items: 2,
        },
        1200:{
          items: 3,
        }
    }
  }).on('changed.owl.carousel',function(event){
      $('.product-design-slider .owl-item').removeClass('current');
      $('.product-design-slider .owl-item').eq( event.item.index).addClass('current');
  });
  function addCurrentClass(event){
      $('.product-design-slider .owl-item').eq( event.item.index).addClass('current');
  }

  $('.product-design-slider1').owlCarousel({
    items: 3,
    margin:0,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    onInitialized  : addCurrentClass1,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:0,
          stagePadding:5,
        },
        480:{
          items:2,
          margin:0,
          stagePadding:5,
        },
        768:{
          items: 3,
        },
        1024:{
          items: 2,
        },
        1200:{
          items: 3,
        }
    }
  }).on('changed.owl.carousel',function(event){
      $('.product-design-slider1 .owl-item').removeClass('current');
      $('.product-design-slider1 .owl-item').eq( event.item.index).addClass('current');
  });
  function addCurrentClass1(event){
      $('.product-design-slider1 .owl-item').eq( event.item.index).addClass('current');
  }

  if($(window).width() < 768){
    $('.blog-list').addClass('owl-carousel');
    $('.blog-list').owlCarousel({
      items: 2.5,
      margin:10,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1.3,
            dots:true,
            nav:false,
          },
          480:{
            items:2.3,
            dots:true,
            nav:false,
          }
      }
    });
  }
  


  
  $('.wide-range .left .image-tab a').click(function(ev){
    ev.preventDefault();
    var id = $(this).attr('href');
    console.log(id)
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $(this).closest('.wide-range-list').find('.image-box .image').hide();
    $('.wide-range .left .image-box').find(id).fadeIn();
  });

  $('.wide-range .right .tab-list a').click(function(ev){
    ev.preventDefault();
    var divid = $(this).attr('href');
    var index = $(this).index();
    var width = $('.line-slider ul li').eq(index).width() * index + $('.line-slider ul li').eq(index).width()/2;
    $('.wide-range .right .line-slider .blu-line').css('width',width);
    $('.wide-range .right .line-slider .blu-line-auto').css('width',width);
   
    $('.line-slider ul li').removeClass('active')
    $('.line-slider ul li').eq(index).addClass('active');
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $('.wide-range .left .wide-range-list').hide();
    $('.wide-range .left .wide-range-list').eq(index).fadeIn();
    stopSlider();
  });

  if($(window).width() <=992){
    $('.wide-range .right .tab-list a').eq(0).addClass('active');
    
    $('.wide-range .bottom').addClass('owl-carousel');
    $('.wide-range .bottom').owlCarousel({
      items: 3,
      margin:20,
      loop: true,
      autoplay:false,
      dots:true,
      nav:false,
      slideBy:3,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1,
            margin:0
          },
          480:{
            items: 2,
          },
          768:{
            items: 2,
          }
      }
    });
  }

  $('.select').select2({
    minimumResultsForSearch: -1
  });


   $('.slider-for-heading').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    centerMode: true,
    vertical: true,
    verticalSwiping: true,
    focusOnSelect: true,
    asNavFor: '.slider-nav-gallery',
    //autoplay: true
  });
  $('.slider-nav-gallery').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for-heading',
    dots: false,
    arrows: true,
    centerMode: true,
    vertical: true,
    verticalSwiping: true,
    focusOnSelect: true,
  });

  $('.slider-for-visual').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    fade: true,
    cssEase: 'ease-in-out',
    asNavFor: '.slider-visual-gallery',
    //autoplay: true
  });
  $('.slider-visual-gallery').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for-visual',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
      {
      breakpoint: 768,
      settings: {
      slidesToShow: 3,
      }
      },

      {
      breakpoint: 767,
      settings: {
      slidesToShow:6,
      dots: true,
      }
      },

      {
      breakpoint: 480,
      settings: {
      slidesToShow: 4,
      dots: true
      }
      },
    ], 
  });

  $('.slick-image-gallery').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    fade: true,
    cssEase: 'ease-in-out',
    asNavFor: '.slick-image-gallery-thumb',
    //autoplay: true
  });
  $('.slick-image-gallery-thumb').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slick-image-gallery',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [     
      {
      breakpoint: 767,
      settings: {
      slidesToShow:6,
      dots: true,
      }
      },

      {
      breakpoint: 480,
      settings: {
      slidesToShow: 4,
      dots: true
      }
      },
    ], 
  });

  $('.slick-option-gallery').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    fade: true,
    cssEase: 'ease-in-out',
    asNavFor: '.slick-option-gallery-thumb',
    //autoplay: true
  });
  $('.slick-option-gallery-thumb').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slick-option-gallery',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [  
      {
      breakpoint: 1200,
      settings: {
      slidesToShow:4,
      dots: true,
      }
      },  

      {
      breakpoint: 767,
      settings: {
      slidesToShow:4,
      dots: true,
      }
      },

      {
      breakpoint: 480,
      settings: {
      slidesToShow:4,
      dots: true
      }
      },
    ], 
  });

    

  $('.social-sec .right ul li a').click(function(ev){
    ev.preventDefault();
    var socialId = $(this).attr('href');
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.social-sec .social-feed .social-box').hide();
    $('.social-sec .social-feed').find(socialId).fadeIn();
  });

  $('.footer-menu .footer-menu-box h6').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h6').removeClass('active');
    $(this).parent().find('ul').slideToggle();
    $(this).parent().siblings().find('ul').slideUp();
  });

  $('.faq-accord h5').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h5').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
  });

  $('.series-accord h3').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h3').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
  });

  $('.application-tab-list li a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var tabId = $(this).attr('href');
    $('.product-by-appl-tab-box').hide();
    $(tabId).fadeIn();
  });

  $('.product-by-appl-tab-list h3').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h3').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
  });

  $('.product-by-appl-tab-box .read-more').click(function(){
    $(this).parent().find('p span').slideDown();
    $(this).hide();
  })

  if($(window).width() > 992){
    var clear;
    $('.banner .item .left .image').mouseover(function(){
      $(this).addClass('active');
       $('.banner').addClass('hover');
       clearTimeout(clear);
        clear=setTimeout(function(){
          // $('.banner .item .left .image').addClass('hide');
       },800)
    })
    $('.banner .item .left .image').mouseleave(function(){
      $(this).removeClass('active');
       $('.banner').removeClass('hover');
       clearTimeout(clear);
       // $('.banner .item .left .image').removeClass('hide');
    });
  }

});  

if($(window).width() <= 992){ 
  $(window).scroll(function(){
     if($(window).scrollTop() > $('.banner').height() || $(window).scrollTop() > $('.inner-banner').height()){
        $('.mobile-footer').addClass('active');
        clearInterval(clearInterval);
     }else{
        $('.mobile-footer').removeClass('active')
     }
  })
}

var clearInterval;

$(window).on('load', function(){
  $('.social-sec .social-feed').css('height',$('.social-sec .social-feed').height());

  if($(window).width() <= 992){
     clearInterval(clearInterval);
     setInterval(showDiv, 4000);
  }
});

function showDiv() {
  setTimeout(function(){
      $('.banner').toggleClass('hover');
      $('.banner .owl-item.active .left .image').toggleClass('active');
  },2000);
  console.log('1')
}

if($(window).width()>=992){    
  $('#fullpage').fullpage({
    anchors: ['banner', 'wide-range', 'location', 'client-say', 'solution', 'visual-design', 'image-gallery', 'latest-updates', 'social-feed', 'customer-appreciation', 'footer'],
    scrollingSpeed: 1500,
    menu: '.navigationWrapper',
    scrollOverflow: true,

    afterLoad:function(origin,destination,direction){ 
      if(destination.index == 1){
        var length = $('.line-slider ul li').length;
        for(var i=0; i < length; i++){
           arr.push($('.line-slider ul li').eq(i).width() * i + $('.line-slider ul li').eq(i).width()/2);
        }
        divWidth = arr[0];
        console.log(arr)
        // $('.wide-range .right .line-slider .blu-line').css('width',arr[0]);
        // $('.wide-range .right .line-slider .blu-line-auto').css('width',arr[0]);
        startSlider();
      
      }
     
      if(destination.index > 0){
        $('.back-to-top a').fadeIn();
      }else{
        $('.back-to-top a').hide();
      }

    }   
  }); 
}

var arr = [];
var divWidth;
var clearId;
function startSlider(){
  clearTimeout(clearId);
  clearId = setTimeout(lineSlider ,3000)
}
 function stopSlider(){
  clearTimeout(clearId);
}

function lineSlider(){
    
    $('.wide-range .right .line-slider .blu-line-auto').animate({
        width: divWidth
      }, 3000, function() {
      startSlider();
    });

  if( divWidth <= arr[0]){
    $('.wide-range.active .right .tab-list a').removeClass('active');
    $('.wide-range.active .right .tab-list a').eq(0).addClass('active');
    $('.wide-range .right .line-slider ul li').removeClass('active');
    $('.wide-range .right .line-slider ul li').eq(0).addClass('active');
    $('.wide-range .left .wide-range-list').hide();
    $('.wide-range .left .wide-range-list').eq(0).fadeIn();  
  }
    
  if(divWidth > arr[0] && divWidth <= arr[1]){

    $('.wide-range.active .right .tab-list a').removeClass('active');
    $('.wide-range.active .right .tab-list a').eq(1).addClass('active');
    $('.wide-range .right .line-slider ul li').removeClass('active');
    $('.wide-range .right .line-slider ul li').eq(1).addClass('active');
    $('.wide-range .left .wide-range-list').hide();
    $('.wide-range .left .wide-range-list').eq(1).fadeIn();   
  }
  if(divWidth > arr[1]){
     $('.wide-range.active .right .tab-list a').removeClass('active');
    $('.wide-range.active .right .tab-list a').eq(2).addClass('active');
    $('.wide-range .right .line-slider ul li').removeClass('active');
    $('.wide-range .right .line-slider ul li').eq(2).addClass('active');
    $('.wide-range .left .wide-range-list').hide();
    $('.wide-range .left .wide-range-list').eq(2).fadeIn(); 
      divWidth = 0;
      stopSlider();
  }
    if(divWidth == 0){
     divWidth = arr[0];      
    }else{
      divWidth = divWidth + $('.line-slider ul li').width();
    }

}

if($(window).width()>=992){  
AOS.init({
  duration:1000
});
}
  