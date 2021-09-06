$(function(){

  var menuFlag = true;
  $('.burger-menu').click(function(){
    if(menuFlag){
      $(this).addClass('active');
      $('header .menu-list').addClass('active');
      $('.mob-overlay').fadeIn();
      $('body').addClass('menu-open');
      menuFlag = false;
    }else{
      $(this).removeClass('active');
      $('header .menu-list').removeClass('active');
      $('body').removeClass('menu-open');
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

  if($(window).width() > 0){
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
            margin:5,
            stagePadding:2,
          },
          480:{
            items:2,
            stagePadding:5,
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
    // $('.address-slider').removeClass('owl-carousel');
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

  if($(window).width() > 0){
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
            items: 2,
            margin:10,
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
    // $('.customer-apprec-slider').removeClass('owl-carousel')
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
          margin:10,
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

  if($(window).width() < 993){
    $('.hardware-list').addClass('owl-carousel');
    $('.hardware-list').owlCarousel({
      items: 3.5,
      margin:10,
      loop: true,
      autoplay:true,
      dots:true,
      nav:false,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1.3
          },
          480:{
            items:2.3
          },
          768:{
            items:3.2
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

  $('#find').click(function(){
     $(this).hide();
     $(this).siblings().css('display','inline-block');
     $('.slelect-box .form-group').hide();
     $('.slelect-box .showrooms').show();
     $('.address-slider').fadeIn();
     $('.locate-sec .view-showroom').fadeIn();
  });

  $('#search-again').click(function(){
     $(this).hide();
     $(this).siblings().css('display','inline-block');
     $('.slelect-box .form-group').show();
     $('.slelect-box .showrooms').show();
     $('.address-slider').hide();
     $('.locate-sec .view-showroom').hide();
  })

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

    $('.value-list').addClass('owl-carousel');
    $('.value-list').owlCarousel({
      items: 3,
      margin:15,
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
          },
          480:{
            items: 2,
          },
          768:{
            items: 3,
          }
      }
    });

    $('.benefit-slider').addClass('owl-carousel');
    $('.benefit-slider').owlCarousel({
      items: 3,
      margin:15,
      loop: true,
      autoplay:false,
      dots:true,
      nav:false,
      slideBy:3,
      stagePadding:5,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1,
          },
          480:{
            items: 2,
          },
          768:{
            items: 3,
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

  // $('.slider-for-visual').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: false,
  //   focusOnSelect: true,
  //   fade: true,
  //   cssEase: 'ease-in-out',
  //   asNavFor: '.slider-visual-gallery',
  // });
  // $('.slider-visual-gallery').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   asNavFor: '.slider-for-visual',
  //   dots: false,
  //   arrows: false,
  //   focusOnSelect: true,
  //   responsive: [
  //     {
  //     breakpoint: 768,
  //     settings: {
  //     slidesToShow: 3,
  //     }
  //     },

  //     {
  //     breakpoint: 767,
  //     settings: {
  //     slidesToShow:6,
  //     dots: true,
  //     }
  //     },

  //     {
  //     breakpoint: 480,
  //     settings: {
  //     slidesToShow: 4,
  //     dots: true
  //     }
  //     },
  //   ], 
  // });

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

  $ ('.footer-menu .footer-menu-box h6').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h6').removeClass('active');
    $(this).parent().find('ul').slideToggle();
    $(this).parent().siblings().find('ul').slideUp();
  });

  $('.faq-accord h5').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
    $(this).parent().siblings().find('h5').removeClass('active'); 
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
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();    
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h3').removeClass('active');
  });

   $('.series-accord h3').click(function(ev){    
    $(this).parent().siblings().find('.content').slideUp();    
    $(this).parent().find('.content').slideToggle();
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h3').removeClass('active');
  });

  $('.product-by-appl-tab-box .read-more').click(function(){
    $(this).parent().find('p span').slideDown();
    $(this).hide();
  });

  $('.switch1').click(function(){
    $(this).toggleClass('active');
  });

  $('.switch1 a').click(function(ev){
    ev.stopPropagation();
    $(this).toggleClass('active');
  });
  
  
  $('.efficient-tablist li a').click(function(){
    var index = $(this).parent().index();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.efficient-tab-box .efficient-tab-content').hide();
    $('.efficient-tab-box .efficient-tab-content').eq(index).fadeIn();

    tabletop = $('.energy-efficient-table').offset().top ;
    $('html,body').animate({scrollTop:$('.efficient-tab-box').offset().top - 100},1000);
  });


  $('.efficient-tab-box .efficient-tab-content h3').click(function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h3').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();

  });

  $('.archive ul li > a').click(function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
  });

  $('.recommend-slider').owlCarousel({
    items: 1,
    margin:0,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    slideBy:1,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:0
        },
        480:{
          items: 1,
        },
        768:{
          items: 1,
        }
    }
  });

  $('.fenesta-edge-slider').owlCarousel({
    items: 2,
    margin:70,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    slideBy:1,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:10
        },
        480:{
          items: 1,
        },
        768:{
          items: 2,
          margin:20,
        },
        1280:{
          items: 2,
          margin:40,
        },
        1450:{
          items: 2,
        },

    }
  });

  $('.infra-slider').owlCarousel({
    items:3,
    margin:35,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    slideBy:1,
    smartSpeed:1000,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:10,
        },
        480:{
          items:2,
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

  $('.award-accred-slider').owlCarousel({
    items:4,
    margin:50,
    loop: true,
    autoplay:false,
    dots:false,
    nav:true,
    slideBy:1,
    smartSpeed:1000,    
    stagePadding:5,
    responsiveClass:true,
    responsive:{
        0:{
          items: 1,
          margin:10,
        },
        480:{
          items: 2,
          margin:20,
        },
        768:{
          items:3,
          margin:20,
        },
        1024:{
          items: 4,
          margin:20,
        },
        1200:{
          items: 4,
        }

    }
  });

  if($(window).width() < 768){
    $('.recommend-slider-mob').owlCarousel({
      items: 1,
      margin:10,
      loop: true,
      autoplay:false,
      dots:false,
      nav:true,
      slideBy:1,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 1,
            margin:5,
            stagePadding:2,
          },
          480:{
            items: 2,
            stagePadding:5,
          },
          768:{
            items: 1,
          }
      }
    });
    
    $('.science-work-list-mob').addClass('owl-carousel');
    $('.science-work-list-mob').owlCarousel({
      items: 3,
      margin:10,
      loop: true,
      autoplay:true,
      dots:true,
      nav:false,
      slideBy:1,
      center:true,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 2,
            stagePadding:0,
          },
          480:{
            items:3,
            stagePadding:5,
          }
      }
    }).on('changed.owl.carousel',function(event){      
      var imageName = $('.science-work-list-mob .owl-item').eq( event.item.index).find('.item').data('image');
      $('.middle .center-image img').attr('src',imageName);
    });
  }

  $('.facade-client-slider').owlCarousel({
    items:3,
    margin:60,
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
          margin:15,
        },
        480:{
          items:2.5,
          margin:15,
        },
        768:{
          items:2,
          margin:30,
        },
        993:{
          items:3,
          margin:30,
        },
        1280:{
          items:3,
        }
    }
  });

  $('.address-list-slider').owlCarousel({
    items:1,
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
        480:{
          items:2,
        },
        768:{
          items:2,
        },
        993:{
          items:3,
        },
        1280:{
          items:1,
        }
      }
    }
  });
  $('.video-slider').owlCarousel({
    items:1,
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
        480:{
          items:2,
        },
        768:{
          items:2,
        },
        993:{
          items:3,
        },
        1280:{
          items:1,
        }
      }
    }
  });

  $('.glass-option-slider').owlCarousel({
    items:5,
    margin:35,
    loop: false,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1.4,
          nav:false,
          margin:15,
          loop: true,
          autoplay:true,
        },
        480:{
          items:2.4,
          nav:false,
          margin:15,
          loop: true,
          autoplay:true,
        },
        768:{
          items:3,
          margin:20,
          loop: true,
          autoplay:true,
        },
        1280:{
          items:5,
        }
      }
  });

   $('.window-glaze-slider').owlCarousel({
    items:3,
    margin:60,
    loop: false,
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1.5,
          loop: true,
          autoplay:true,
          margin:15,
          nav:false,
        },
        480:{
          items:2.5,
          loop: true,
          autoplay:true,
          margin:15,
          nav:false,
        },
        768:{
          items:3,
          margin:30,
        },
        1280:{
          items:3,
        }
      }
  });

  $('.inner-top-nav ul li a').click(function(){
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.inner-top-nav-tab .inner-top-nav-content').hide();
    $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();

    handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length; 
  });

//   $(".blue-btn").toggle(
// function(){$(".blue-btn").css({"color": "blue"});},
// function(){$(".blue-btn").css({"color": "yellow"});},
// function(){$(".blue-btn").css({"color": "red"});
// });

  if($(window).width() > 767){
    $('.science-work-list .item').click(function(){
      var image = $(this).data('image');
      $(this).addClass('active');
      $(this).siblings().removeClass('active');
      $('.middle .center-image img').attr('src',image);
    });
  }
  
  var handleSize = $('.inner-top-nav-content').eq(0).find('.handle-list .item').length;
  var handleShow=15;
  if($(window).width() <= 767){
      handleShow = 6;
  }
  $('.inner-top-nav-content').each(function(index,value){
      $('.inner-top-nav-content').eq(index).find('.handle-list .item:lt('+handleShow+')').show();
  });

  
  $(document).on('click', '.inner-top-nav-content .load-more', function () {
    if($(window).width() <= 767){
        handleShow = (handleShow+6 <= handleSize) ? handleShow+6 : handleSize; 
    }else{
      handleShow = (handleShow+15 <= handleSize) ? handleShow+15 : handleSize;  
    }          
    $(this).closest('.inner-top-nav-content').find('.handle-list .item:lt('+handleShow+')').slideDown();
    if(handleShow === handleSize){
      $(this).fadeOut();
    }
  });

  $('.locate-tab-sec .locate-link a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var tabId = $(this).attr('href');
    $('.locate-tab-list .locate-tab-box').hide();
    $(tabId).fadeIn();
  });

  $('.customer-rev-link a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var revTabId = $(this).attr('href');
    $('.customer-rev-tab-list .customer-rev-tab-box ').hide();
    $(revTabId).fadeIn();

    reviewSize = $(revTabId).find('.customer-rev-list .item').length; 
  });

  var reviewSize = $('.customer-rev-tab-list .customer-rev-tab-box').eq(0).find('.customer-rev-list .item').length;
  var reviewShow=6;
  $('.customer-rev-tab-list .customer-rev-tab-box').each(function(index,value){
      $('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.customer-rev-list .item:lt('+reviewShow+')').show();
  });

  $(document).on('click', '.customer-rev-tab-list .load-more', function () {
      reviewShow = (reviewShow+6 <= reviewSize) ? reviewShow+6 : reviewSize;      
      $(this).closest('.customer-rev-tab-box').find('.customer-rev-list .item:lt('+reviewShow+')').slideDown();
      if(reviewShow == reviewSize){
        $(this).fadeOut();
      }
  });



  var size_li = $(".energy-efficient-table .left ul li").length;
  var x=4;
  $('.energy-efficient-table .left ul li:lt('+x+')').css('display','flex');
  // $('.energy-efficient-table .left .view-more').click(function () {
  //     x = (x+4 <= size_li) ? x+4 : size_li;
  //     $('.energy-efficient-table .left ul li:lt('+x+')').slideDown().css('display','flex');
  //     if(x == size_li){
  //       setTimeout(function(){
  //         $('.energy-efficient-table .left .view-more').hide();         
  //       },500);
  //     }
  // });

  var right_size_li = $(".energy-efficient-table .right ul li").length;
  var y=4;
  $('.energy-efficient-table .right ul li:lt('+y+')').css('display','flex');
  // $('.energy-efficient-table .right .view-more').click(function () {
  //     y = (y+4 <= right_size_li) ? y+4 : right_size_li;
  //     $('.energy-efficient-table .right ul li:lt('+y+')').slideDown().css('display','flex');
  //     if(y == right_size_li){
  //       setTimeout(function(){
  //         $('.energy-efficient-table .right .view-more').hide();         
  //       },500);
  //     }
  // });

  if($(window).width() <= 480){
    $(".energy-efficient-table .left ul").clone(true).appendTo('.energy-efficient-table .left').addClass('clone');
    $(".energy-efficient-table .right ul").clone(true).appendTo('.energy-efficient-table .right').addClass('clone');
  }

  if($(window).width() <= 767){
    $(".window-glass-tables .chart-table").clone(true).appendTo('.window-glass-tables .glass-chart .inner-table').addClass('clone');    
  }


  var totalEvent = $('.latest-event-list .item').length;
  var evntShow = 8;
  $('.latest-event-list .item:lt('+evntShow+')').show();
  $('.latest-event-list-sec .load-more').click(function(){
      evntShow = (evntShow + 8 <= totalEvent) ? evntShow + 8 : totalEvent;
      $('.latest-event-list .item:lt('+evntShow+')').slideDown();
      if(evntShow == totalEvent){
        $(this).fadeOut();
      }
  });



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
    anchors: ['banner', 'wide-range', 'location', 'client-say', 'solution', 'visual-design','image-gallery', 'awards','latest-blog', 'customer-appreciation', 'footer'],
    scrollingSpeed: 1500,
    menu: '.navigationWrapper',
    scrollOverflow: true,

    afterLoad:function(origin,destination,direction){ 
      if(destination.index == 0){
         $('.banner .count').prop('Counter',0).delay(0).animate({
              Counter: $('.banner .count').text()
          }, {
              duration: 2000,
              easing: 'swing',
              step: function (now) {
                  $(this).text(Math.ceil(now));
              }
        });
      }
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


if($(window).width() > 1023){
  if($('.energy-efficient-table').length){
    var tabletop = $('.energy-efficient-table').offset().top ;
  }
  if($('.energy-efficient-table').length){
    var offSet = $('.efficient-tablist ul').offset().top - 100;
  }
  var scrollPosition;
  
  var width = $('.efficient-tablist ul').width();
    console.log( offSet,tabletop, screen.availHeight)
  $(window).scroll(function(){
    if($(window).width() < $(window).height()){
       scrollPosition = screen.availWidth + $(window).scrollTop() - 50; 
       if($(window).scrollTop() >= offSet && scrollPosition <=tabletop){
           console.log(tabletop, screen.availHeight)
          $('.efficient-tablist ul').addClass('fixed').css('width',width);
       }else{
          $('.efficient-tablist ul').removeClass('fixed');
          console.log($(window).scrollTop(), scrollPosition)
       }
    }else{
      scrollPosition = screen.availHeight + $(window).scrollTop() - 50;
       if($(window).scrollTop() >= offSet && scrollPosition <=tabletop){
           console.log(tabletop, screen.availHeight)
          $('.efficient-tablist ul').addClass('fixed').css('width',width);
       }else{
          $('.efficient-tablist ul').removeClass('fixed');
          console.log($(window).scrollTop(), scrollPosition)
       }
    }
  });
}

// if($('.wide-design-palette .big-image').length){
//   var bigImageLeft = 110;
//   if($(window).width() < 1550 && $(window).width() >= 1320){
//      bigImageLeft = $('.wide-design-palette .inner-wrap').offset().left / 2  - $('.wide-design-palette .big-image').width() / 2 + 40;
//      alert(bigImageLeft)
//   }
//   if($(window).width() < 1320 && $(window).width() > 1200){
//      bigImageLeft = $('.wide-design-palette .inner-wrap').offset().left / 2  - $('.wide-design-palette .big-image').width() / 2 - 20;
//      alert(bigImageLeft)
//   }
//   if($(window).width() <= 1200 && $(window).width() > 1023){
//      bigImageLeft = $('.wide-design-palette .inner-wrap').offset().left / 2  - $('.wide-design-palette .big-image').width() / 2;
//      alert(bigImageLeft)
//   }
//   $('.wide-design-palette .big-image').css('left',bigImageLeft )
// }
