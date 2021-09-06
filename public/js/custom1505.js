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
  });


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
    loop: false,
    rewind:true,
    autoplay:false,
    dots:false,
    nav:false,
    animateOut: 'fadeOut',
    smartSpeed:1000,
    mouseDrag:false,
    responsiveClass:true,
    responsive:{
        0:{
            mouseDrag:false,
        },
        1024:{
            mouseDrag:false,
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
  if($(window).width() < 768){
    temp2 ='14px';
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
          items:1.4,
          loop: true,
          nav:false,
          margin:14,
        },
        480:{
          items:2.4,
          loop: true,
          nav:false,
          margin:14,
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
      $('.image-gallery-slider .owl-item').removeClass('large').css('margin-right','14px');
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
    items: 5,
    margin:13,
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
        },
        768:{
          items: 4,
        },
        1200:{
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
          items: 3,
          dots:false,
          nav:false,
          margin:10,
          stagePadding:0,
          autoplay:true,
        },
        480:{
          items: 3,
          dots:false,
          nav:false,
          autoplay:true,
        },
        768:{
          items:3,
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
    // $('.blog-list').addClass('owl-carousel');
    // $('.blog-list').owlCarousel({
    //   items: 2.5,
    //   margin:10,
    //   loop: true,
    //   autoplay:true,
    //   dots:false,
    //   nav:true,
    //   smartSpeed:1000,
    //   responsiveClass:true,
    //   responsive:{
    //       0:{
    //         items: 1.3,
    //         dots:true,
    //         nav:false,
    //       },
    //       480:{
    //         items:2.3,
    //         dots:true,
    //         nav:false,
    //       }
    //   }
    // });
   
    $('.durable-safe ul li:last').remove();
    $('.durable-safe ul').addClass('owl-carousel');
    $('.durable-safe ul').owlCarousel({
      items: 3.5,
      margin:10,
      loop: true,
      autoplay:true,
      dots:false,
      nav:false,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 3.2,
          },
          480:{
            items:3.5,
          }
      }
    });

    
  }

  if($(window).width() < 768){
    $('.series-option-sec .series-recommended .right').addClass('owl-carousel');
    $('.series-option-sec .series-recommended .right').owlCarousel({
      items: 3,
      margin:10,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      responsiveClass:true,
      responsive:{
          0:{
            items: 3,
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

    // $('.value-list').addClass('owl-carousel');
    // $('.value-list').owlCarousel({
    //   items: 3,
    //   margin:15,
    //   loop: true,
    //   autoplay:true,
    //   dots:true,
    //   nav:false,
    //   slideBy:1,
    //   smartSpeed:1000,
    //   responsiveClass:true,
    //   responsive:{
    //       0:{
    //         items:1.7,
    //         margin:10,
    //       },
    //       480:{
    //         items: 2.5,
    //       },
    //       768:{
    //         items: 3,
    //       }
    //   }
    // });

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
    arrows: true,
    centerMode: false,
    vertical: true,
    verticalSwiping: true,
    focusOnSelect: true,
    autoplay:true,
    // asNavFor: '.slider-nav-gallery',
    //autoplay: true
  });
  // $('.slider-nav-gallery').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   asNavFor: '.slider-for-heading',
  //   dots: false,
  //   arrows: true,
  //   centerMode: true,
  //   vertical: true,
  //   verticalSwiping: true,
  //   focusOnSelect: true,
  // });

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
      arrows: true,
      }
      },

      {
      breakpoint: 480,
      settings: {
      slidesToShow:3,
      arrows: true,
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

 if($(window).width() <= 992){
  $ ('.footer-menu .footer-menu-box h6').click(function(ev){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h6').removeClass('active');
    $(this).parent().find('ul').slideToggle();
    $(this).parent().siblings().find('ul').slideUp();
  });
 }
  

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
          items: 1.5,
          margin:10,
          autoplay:true,
        },
        480:{
          items:2.5,
          margin:20,
          autoplay:true,
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
          items: 2,
          margin:10,
        },
        480:{
          items: 3,
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

  $('.life-slider').owlCarousel({
    items:3,
    margin:40,
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
          items: 1.5,
          margin:10,
        },
        480:{
          items: 2.5,
          margin:20,
        },
        768:{
          items:2,
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
      autoplay:false,
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
      console.log(event.item.index)   
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

  $('.series-design-slider').owlCarousel({
    items:3,
    margin:10,
    loop: true,
    autoplay:true,
    dots:false,
    nav:true,
    center:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:3,
          loop: true,
          autoplay:true,
          margin:10,
        },
        480:{
          items:3,
          loop: true,
          autoplay:true,
          margin:10,
        },
        768:{
          items:3,
        },
        1280:{
          items:3,
        }
      }
  });

  if($(window).width() < 768){
    $('.press-list').addClass('owl-carousel');
    $('.press-list').owlCarousel({
      items:3,
      margin:15,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.5,
          },
          480:{
            items:2.5,
          }
        }
    });

    $('.advt-list').addClass('owl-carousel');
    $('.advt-list').owlCarousel({
      items:3,
      margin:15,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.5,
          },
          480:{
            items:2.5,
          }
        }
    });

    $('.trim-pencil-box').addClass('owl-carousel');
    $('.trim-pencil-box').owlCarousel({
      items:3.5,
      margin:10,
      loop: true,
      autoplay:true,
      dots:false,
      nav:false,
      stagePadding:2,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.5,
          },
          480:{
            items:2.5,
          }
        }
    });

    $('.color-list').addClass('owl-carousel');
    $('.color-list').owlCarousel({
      items:4,
      margin:15,
      loop: true,
      autoplay:false,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:3,
            autoplay:true,
          },
          480:{
            items:4,
            autoplay:true,
          }
        }
    });
  } 

  if($(window).width() < 993){
    $('.customer-rev-list').addClass('owl-carousel');
    $('.retail-slider').owlCarousel({
      items:3,
      margin:15,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.3,
          },
          480:{
            items:2.3,
          }
        }
    });

    $('.testimonials-slider').owlCarousel({
      items:3,
      margin:15,
      loop: true,
      autoplay:true,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.3,
          },
          480:{
            items:2.3,
          }
        }
    });

    $('.mesh-slider').addClass('owl-carousel');
    $('.mesh-slider').owlCarousel({
      items:3,
      margin:15,
      loop: true,
      autoplay:false,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.3,
            autoplay:true,
          },
          480:{
            items:2.3,
            autoplay:true,
          },
          768:{
            items:3,
          }
        }
    });

    $('.mesh-style-slider').addClass('owl-carousel');
    $('.mesh-style-slider').owlCarousel({
      items:4,
      margin:15,
      loop: true,
      autoplay:false,
      dots:false,
      nav:true,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:1.3,
            autoplay:true,
          },
          480:{
            items:2.3,
            autoplay:true,
          },
          768:{
            items:3,
          }
        }
    });


  } 

  $('.quality-innovate-slider').owlCarousel({
      items:1,
      margin:0,
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
            nav:false,
            dots:true,
          },
          480:{
            items:1,
            nav:false,
            dots:true,
          },
          992:{
            items:1,
          }          
        }
    });

  $('.right-slider').owlCarousel({
      items:1,
      margin:2,
      loop: true,
      autoplay:true,
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
            items:1,
          },
          992:{
            items:1,
          }          
        }
    });

  $('.image-content .two-slider').owlCarousel({
    items:2,
    margin:15,
    loop: true,
    autoplay:true,
    dots:false,
    nav:true,
    stagePadding:2,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1,
        },
        480:{
          items:1,
        },
        768:{
          items:2,
        }          
      }
  });
  $('.image-content .single-slider').owlCarousel({
    items:1,
    margin:2,
    loop: true,
    autoplay:true,
    dots:false,
    nav:true,
    stagePadding:1,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
    responsive:{
        0:{
          items:1,
        },
        480:{
          items:1,
        },
        768:{
          items:1,
        }          
      }
  });

  if($(window).width() <= 992){
    $('.about-portfolio-list').addClass('owl-carousel');
    $('.about-portfolio-list').owlCarousel({
      items:5,
      margin:15,
      loop: true,
      autoplay:true,
      dots:true,
      nav:false,
      stagePadding:1,
      smartSpeed:1000,
      mouseDrag:true,
      responsiveClass:true,
      responsive:{
          0:{
            items:2.5,
          },
          480:{
            items:3.5,
          },
          768:{
            items:5,
          }          
        }
    });
  }


  $('.inner-top-nav ul li a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.inner-top-nav-tab .inner-top-nav-content').hide();
    $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();

   


    handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length;

    if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
       var handleId = $(this).attr('href');
      clienHeight = $('.client-sec').offset().top - clienDistTop ;
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(handleId).offset().top - 240  },1000);
      }  
    }

    $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');

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

    if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
      clienHeight = $('.client-sec').offset().top - clienDistTop ;
    }
  });


  $('.upvc-sliding-window-sec .inner-top-nav-content h4').click(function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h4').removeClass('active');
    $(this).parent().find('.content').slideToggle();
    $(this).parent().siblings().find('.content').slideUp();
    $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');
  });

  $('.window-handle-sec .inner-top-nav-content h4').click(function(){
    $(this).toggleClass('active');
    $(this).parent().siblings().find('h4').removeClass('active');
    $(this).parent().find('.mob-content').slideToggle();
    $(this).parent().siblings().find('.mob-content').slideUp();
  })

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

    retailSize = $(revTabId).find('.retail .customer-rev-list .item').length; 
    testimonialSize = $(revTabId).find('.testimonial .customer-rev-list .item').length;
    projectSize = $(revTabId).find('.project .customer-rev-list .item').length;


    if($(this).closest('.customer-rev-tab-sec').hasClass('fixed')){
      faqDist = $('.faq-sec').offset().top - faqDistTop ;
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(revTabId).offset().top - 200 },1000);
      }
      if($(window).width() <= 1200 && $(window).width() >= 768){
        $('html,body').animate({scrollTop:$(revTabId).offset().top - 180 },1000);
      }
      if($(window).width() < 768){
        $('html,body').animate({scrollTop:$(revTabId).offset().top - 120 },1000);
      }
    }
  });

  var retailSize = $('.customer-rev-tab-list .customer-rev-tab-box').eq(0).find('.retail .customer-rev-list .item').length;
  var retailShow=3;
  var testimonialSize = $('.customer-rev-tab-list .customer-rev-tab-box').eq(0).find('.testimonial .customer-rev-list .item').length;
  var testimonialShow=3;
  var projectShow = 3;
  var projectSize = 0;

  $('.customer-rev-tab-list .customer-rev-tab-box').each(function(index,value){
      if($('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.retail').length){
        $('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.retail .customer-rev-list .item:lt('+retailShow+')').show();
      }
      if($('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.testimonial').length){
        $('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.testimonial .customer-rev-list .item:lt('+testimonialShow+')').show();
      }
      if($('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.project').length){
        $('.customer-rev-tab-list .customer-rev-tab-box').eq(index).find('.project .customer-rev-list .item:lt('+projectShow+')').show();
      }
  });

  $(document).on('click', '.retail .load-more', function () {
      retailShow = (retailShow+3 <= retailSize) ? retailShow+3 : retailSize;      
      $(this).closest('.inner-div').find('.customer-rev-list .item:lt('+retailShow+')').slideDown();

      console.log(retailShow , retailSize)
      if(retailShow == retailSize){
        $(this).fadeOut();
      }

      faqDist = $('.faq-sec').offset().top - faqDistTop ;
  });
  $(document).on('click', '.testimonial .load-more', function () {
      testimonialShow = (testimonialShow + 3 <= testimonialSize) ? testimonialShow+3 : testimonialSize;      
      $(this).closest('.inner-div').find('.customer-rev-list .item:lt('+testimonialShow+')').slideDown();
      if(testimonialShow == testimonialSize){
        $(this).fadeOut();
      }

      faqDist = $('.faq-sec').offset().top - faqDistTop ;
  });
  $(document).on('click', '.project .load-more', function () {
    console.log(projectShow)
      projectShow = (projectShow + 3 <= projectSize) ? projectShow+3 : projectSize;      
      $(this).closest('.inner-div').find('.customer-rev-list .item:lt('+projectShow+')').slideDown();
      if(projectShow == projectSize){
        $(this).fadeOut();
      }

      faqDist = $('.faq-sec').offset().top - faqDistTop ;
  });


 

  $('.accreditation-link a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var awardTabId = $(this).attr('href');
    $('.award-accreditation-tab .award-accreditation-tab-box ').hide();
    $(awardTabId).fadeIn();

    awardSize = $(awardTabId).find('.award-accreditation-list .item').length; 
  });

  var awardSize = $('.award-accreditation-tab .award-accreditation-tab-box').eq(0).find('.award-accreditation-list .item').length;
  var awardShow=8;
  $('.award-accreditation-tab .award-accreditation-tab-box').each(function(index,value){
      $('.award-accreditation-tab .award-accreditation-tab-box').eq(index).find('.award-accreditation-list .item:lt('+awardShow+')').show();
  });

  $(document).on('click', '.award-accreditation-tab .load-more', function () {
      awardShow = (awardShow+8 <= awardSize) ? awardShow+8 : awardSize;      
      $(this).closest('.award-accreditation-tab-box').find('.award-accreditation-list .item:lt('+awardShow+')').slideDown();
      if(awardShow == awardSize){
        $(this).fadeOut();
      }
  });

  $('.explore-more a').click(function(){
    $(this).parent().hide();
    $(this).closest('.inner-page-content').addClass('active');

    if($('.tab-link').length){
      tabHeight = $('.tab-link').offset().top - $('header').height()*2;
    }
    if($('.faq-sec').length){
     faqDist = $('.faq-sec').offset().top - faqDistTop  ; 
       console.log(faqDist)
    }
    if($('.customer-appreciation-sec').length){
      customAppr = $('.customer-appreciation-sec').offset().top - faqDistTop  ;
      console.log(customAppr)
    }
  });
  
  $('.mesh-grill-link a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var meshId = $(this).attr('href');
    $('.mesh-grill-list .mesh-grill-box').hide();
    $(meshId).fadeIn();

    if($(this).closest('.mesh-grill-sec').hasClass('fixed')){
      if($(window).width() < 992){
         customAppr = $('.customer-appreciation-sec').offset().top - (faqDistTop) + $('.tab-link').height() ;
      }else{
        customAppr = $('.customer-appreciation-sec').offset().top - (faqDistTop);
      }
      console.log(customAppr)
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(meshId).offset().top - 200 },1000);
      }
      if($(window).width() <= 1200 && $(window).width() >= 768){
        $('html,body').animate({scrollTop:$(meshId).offset().top - 180 },1000);
      }
      if($(window).width() < 768){
        $('html,body').animate({scrollTop:$(meshId).offset().top - 120 },1000);
      }
    }

  });


  $(document).on('click','.clolor-finish-link a',function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    var colorId = $(this).attr('href');
    $('.color-finish-list .color-finish-box').hide();
    $(colorId).fadeIn(); 
   
    if($(this).closest('.color-finish-sec').hasClass('fixed')){
      if($(window).width() < 992){
         customAppr = $('.customer-appreciation-sec').offset().top - (faqDistTop) + $('.tab-link').height() ;
      }else{
        customAppr = $('.customer-appreciation-sec').offset().top - (faqDistTop);
      }
       console.log(customAppr)
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(colorId).offset().top - 200 },1000);
      }      
      if($(window).width() < 768){
        $('html,body').animate({scrollTop:$(colorId).offset().top - 120 },1000);
      }
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


  $('.galley-box input[type="checkbox"]').click(function(){
      if($(this).prop('checked') == true){
        $(this).parent().addClass('active');
      }else{
        $(this).parent().removeClass('active');
      }
  });

  var gallery_size = $(".galley-image-listing ul li").length;
  var gallery_show = 8;
  $('.galley-image-listing ul li:lt('+gallery_show+')').show();
  $('.galley-image-listing .load-more-btn .load-more').click(function () {
      gallery_show = (gallery_show + 8 <= gallery_size) ? gallery_show + 8 : gallery_size;
      $('.galley-image-listing ul li:lt('+gallery_show+')').slideDown();
      if(gallery_show == gallery_size){
        setTimeout(function(){
          $('.galley-image-listing .load-more-btn .load-more').hide();  
          $('.galley-image-listing .load-more-btn .load-less').show();         
        },500);
      }
  });

  $('.galley-image-listing .load-more-btn .load-less').click(function () {
      gallery_show = (gallery_show-8<8) ? 8 : gallery_show-8;
      $('.galley-image-listing ul li').not(':lt('+gallery_show+')').slideUp();
      if(gallery_show <= 8){
        setTimeout(function(){
          $(".galley-image-listing .load-more-btn .load-more").show();
          $('.galley-image-listing .load-more-btn .load-less').hide()
        },500);
      }
  });

  $('.filter-icon a').click(function(){
    $('.galley-filter-box').addClass('active');
    $('.mob-overlay').fadeIn();
    $('body').addClass('menu-open');
  });

  $('.filter-close').click(function(){
    $('.mob-overlay').hide();
    $('.galley-filter-box').removeClass('active');
    $('body').removeClass('menu-open');
  });

  $('.mob-overlay').click(function(){
    $(this).hide();
    $('.galley-filter-box').removeClass('active');
    $('body').removeClass('menu-open');

    $('.burger-menu').removeClass('active');
    $('header .menu-list').removeClass('active');
    $('body').removeClass('menu-open');
    menuFlag = true;
  });

  $('.series-box-list .series-link li a').click(function(ev){
      ev.preventDefault();
      var seriesId = $(this).attr('href');
      $('html,body').animate({scrollTop:$(seriesId).offset().top - 110}, 1000);
  })
  



  if($(window).width() > 992){
    // var clear;
    // $('.banner .item .left .image').mouseover(function(){
    //   $(this).addClass('active');
    //    $('.banner').addClass('hover');
    //    clearTimeout(clear);
    //     clear=setTimeout(function(){
    //       // $('.banner .item .left .image').addClass('hide');
    //    },800)
    // })
    // $('.banner .item .left .image').mouseleave(function(){
    //   $(this).removeClass('active');
    //    $('.banner').removeClass('hover');
    //    clearTimeout(clear);
    //    // $('.banner .item .left .image').removeClass('hide');
    // });
  }

});  

if($(window).width() <= 992){ 
  if($('.not-found-sec').length){
    var notFound = $('.not-found-sec').offset().top + 50 ;
    console.log(notFound)
  }

  if($('.filter-icon').length){
    var filterTop = $('.filter-icon').offset().top - 80 ;
    console.log(filterTop)
  }

  $(window).scroll(function(){
    console.log($(window).scrollTop())
     if($(window).scrollTop() > $('.banner').height() || $(window).scrollTop() > $('.inner-banner').height() || $(window).scrollTop() > notFound){
        $('.mobile-footer').addClass('active');
        clearInterval(clearInterval);
     }else{
        $('.mobile-footer').removeClass('active')
     }

     if($(window).scrollTop() > filterTop){
        $('.filter-icon').addClass('fixed').css('opacity','1');
        $('.bottom-box').addClass('fixed');
     }
     if($(window).scrollTop() < filterTop){
        $('.filter-icon').removeClass('fixed');
        $('.bottom-box').removeClass('fixed');
     }

      if($('.about-finesta').length){
        if($(window).scrollTop() >= aboutHeight){
          $('.filter-icon').css('opacity','0');
          $('.bottom-box').removeClass('fixed');         
          console.log( 'greaterthan')
        }
      }
  })
}

var clearInterval;

$(window).on('load', function(){
  $('.social-sec .social-feed').css('height',$('.social-sec .social-feed').height());

  if($(window).width() <= 992){
     // clearInterval(clearInterval);
     // setInterval(showDiv, 4000);
  }
});

// function showDiv() {
//   setTimeout(function(){
//       $('.banner').toggleClass('hover');
//       $('.banner .owl-item.active .left .image').toggleClass('active');
//   },2000);
//   console.log('1')
// }

if($(window).width()>=992){    
  $('#fullpage').fullpage({
    anchors: ['banner', 'durable-safe', 'wide-range','quality-innovate', 'location','unmatch-service', 'client-say', 'visual-design','image-gallery', 'awards','latest-blog', 'customer-appreciation', 'footer'],
    scrollingSpeed: 1500,
    menu: '.navigationWrapper',
    scrollOverflow: true,
     licenseKey: '',

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
          $('.efficient-tablist ul').addClass('fixed').css('width',width);
       }else{
          $('.efficient-tablist ul').removeClass('fixed');
       }
    }else{
      scrollPosition = screen.availHeight + $(window).scrollTop() - 50;
       if($(window).scrollTop() >= offSet && scrollPosition <=tabletop){
          $('.efficient-tablist ul').addClass('fixed').css('width',width);
       }else{
          $('.efficient-tablist ul').removeClass('fixed');
       }
    }
  });
}


var tabHeight = 0;
var faqDist = 0;
var customAppr = 0;
var faqDistTop = $('header').height()*2 + $('.tab-link').height();

var handleLink = 0;
var clienHeight = 0;
var clienDistTop =  $('header').height()*3 + $('.window-handle-sec .inner-top-nav .window-handle-fix').height();
var colorSliderHeight = 0;

var aboutHeight = 0;
var aboutHeightTop = $('header').height()*3 ;
console.log(aboutHeightTop)

if($('.tab-link').length){
  if($(window).width()>1450){
    tabHeight = $('.tab-link').offset().top - ($('header').height()+ 15);

  }
  if($(window).width()<=1450 && $(window).width() > 992){
    tabHeight = $('.tab-link').offset().top - ($('header').height()+ 25);
    if($('.clolor-finish-link').length){
       tabHeight = $('.tab-link').offset().top - ($('header').height()+ 70);
    }
    if($('.mesh-grill-link').length){
       tabHeight = $('.tab-link').offset().top - ($('header').height()+ 70);
       console.log(tabHeight)
    }
  }

  if($(window).width()<=992 && $(window).width() > 0){
    tabHeight = $('.tab-link').offset().top - ($('header').height()+ 25);
    if($('.clolor-finish-link').length){
       tabHeight = $('.tab-link').offset().top - ($('header').height()+ 40);
    }
  }
  
}

if($('.window-handle-sec .inner-top-nav .window-handle-fix').length){
  handleLink = $('.window-handle-sec .inner-top-nav .window-handle-fix').offset().top - ($('header').height()+ 25);
  console.log(handleLink)
}

$(window).on('load',function(){
   $('.welcome-popup').modal('show');

  if($('.faq-sec').length){
   faqDist = $('.faq-sec').offset().top - faqDistTop  ; 
     console.log(faqDist)
  }
  if($('.customer-appreciation-sec').length){
    customAppr = $('.customer-appreciation-sec').offset().top - faqDistTop  ;
    if($('.clolor-finish-link').length){
      customAppr = customAppr + 60;
    }
    if($(window).width() < 768){
      customAppr = customAppr + 60;
      if($('.clolor-finish-link').length){
        customAppr = customAppr - 80;
      }
    }
    console.log(customAppr)
  }

  if($('.client-sec').length){
   clienHeight = $('.client-sec').offset().top - clienDistTop  ; 
     console.log(clienHeight)
  }

  if($('.about-finesta').length){
   aboutHeight = $('.about-finesta').offset().top -  aboutHeightTop; 
     console.log(aboutHeight)
  }
  

  colorSliderHeight = $('.right-slider .owl-item').height();
  if($(window).width() > 767){
    $('.right-slider').css('height',colorSliderHeight )
  }else{
    $('.right-slider').css('height',colorSliderHeight + 60)
    $('.color-list').css('height',$('.color-list .owl-item').height() + 60)
  }
  
  if($(window).width() < 768){
    $('.mesh-slider').css('height',$('.mesh-slider .owl-item').height() + 60 )
    $('.mesh-style-slider').css('height',$('.mesh-style-slider .owl-item').height() + 60 )
  }

  if($(window).width() < 993){
    $('.customer-rev-list').css('height',$('.customer-rev-list .owl-item').height() + 60 )
    $('.testimonials-slider').css('height',$('.testimonials-slider .owl-item').height() + 60 )
  }
 
})

console.log(tabHeight)
$(window).on('scroll',function(){
  console.log($(window).scrollTop())
  if($(window).scrollTop() < tabHeight){
    $('.tab-sec').removeClass('fixed'); 
    $('.tab-sec .color-finish-list h4').hide();
    $('.color-finish-sec h4.get-anim').css({'transform':'translateY(0%)', 'opacity':'1'});
    $('.tab-sec .get-fix').css({'box-shadow':' none'});
  }

  if($(window).scrollTop() >= tabHeight ){
    $('.tab-sec .get-fix').css({'transform':'translateY(0%)', 'box-shadow':' 0 7px 6px -4px rgb(0, 0, 0,0.2)'});
    $('.tab-sec').addClass('fixed');

    $('.tab-sec .color-finish-list h4').fadeIn(1000);
    $('.color-finish-sec h4.get-anim').css({'transform':'translateY(100%)', 'opacity':'0'});
    console.log( tabHeight)
  }
  
  if($('.faq-sec').length){
    if($(window).scrollTop() >= faqDist){
      // $('.tab-sec').removeClass('fixed');
      if($('.tab-sec').hasClass('fixed')){
        $('.tab-sec .get-fix').css({'transform':'translateY(-100%)', 'box-shadow':'none'});
        console.log( 'greaterthan ')
      }
      
    }
  }

  if($('.customer-appreciation-sec').length){

    if($(window).scrollTop() >= customAppr){
      // $('.tab-sec').removeClass('fixed');
      if($('.tab-sec').hasClass('fixed')){
        $('.tab-sec .get-fix').css({'transform':'translateY(-100%)', 'box-shadow':'none'});
        console.log( 'greaterthan ')
      }
      
    }
  } 

  if($(window).scrollTop() < handleLink){
    $('.window-handle-sec .inner-top-nav .window-handle-fix').removeClass('fixed'); 
    $('.window-handle-sec .inner-top-nav-tab').removeClass('active'); 
  } 

  if($(window).scrollTop() >= handleLink){
    $('.window-handle-sec .inner-top-nav .window-handle-fix').addClass('fixed');
    $('.window-handle-sec .inner-top-nav-tab').addClass('active'); 
    $('.window-handle-sec .inner-top-nav .window-handle-fix').css({'transform':'translateY(0%)', 'box-shadow':' 0 7px 6px -4px rgb(0, 0, 0,0.2)'});
  }

  if($('.client-sec').length){
    if($(window).scrollTop() >= clienHeight){
      //$('.window-handle-sec .inner-top-nav .window-handle-fix').removeClass('fixed');
      if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
        $('.window-handle-sec .inner-top-nav .window-handle-fix').css({'transform':'translateY(-100%)', 'box-shadow':'none'});
      
        console.log( 'greaterthan')
      }
      
    }
  }
  
});



var arr = {};
$('.submit').click(function(ev){
  ev.preventDefault();
   $('#complaint-form').validate({
    rules:{
      name:'required',
      mobile:{
        required:true,
        minlength:10,
        number:true,
        maxlength:10
       },
      email:{
        required:true,
        email:true
      }
    },
    messages:{
      name:'Please enter your firstname',
      mobile:{
        required:'Plesae enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Plesae enter email',
        email:"Please enter a valid email address"
      },
    }

   });


   if($('#complaint-form').valid()){
     $('#complaint-form').serializeArray().forEach(function(item,index){
           arr[item.name] = item.value ;
       });
     console.log(arr)
   }
})



