<!DOCTYPE html>
<html lang="en">
<head>
  <title>404 page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo e(asset('css/fullpage.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/slick-slider.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/checkbox.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/aos.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/animation.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    
  <link rel="stylesheet" href="<?php echo e(asset('css/404/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/404/responsive.css')); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     
    <style>
          .message-box.message-box-enquiry-form.error {
     color: red;
    padding-top: 5px;
}
        .message-box.message-box-enquiry-form {
    color: green;
    padding: 5px;
}
         .message-box.message-box-cc.error {
     color: red;
    padding-top: 5px;
}
        .message-box.message-box-cc {
    color: green;
    padding: 5px;
}
  .message-box.message-box-cca.error {
     color: red;
    padding-top: 5px;
}
        .message-box.message-box-cca {
    color: green;
    padding: 5px;
}

  .message-box.message-box-expert.error {
     color: red;
    padding-top: 5px;
}
        .message-box.message-box-expert {
    color: green;
    padding: 5px;
}


    </style>
</head>
<body>
    
  <header class="home">
    <div class="container-fluid">
      <div class="inner-header">
        <div class="logo"><a href="<?php echo e(url('/')); ?>">
              <img src="<?php echo e(asset('images/logo/'.$datasettings['logo'])); ?>"></a></div>
        <div class="header-right">
          <div class="top">
            <a href="<?php echo e(url('/brochure')); ?>"><img class="hover" src="<?php echo e(asset('images/site_images/images/broucher.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/broucher-white.png')); ?>">Brochure</a>
            <a href="javascript:;"><img class="hover" src="<?php echo e(asset('images/site_images/images/enquire.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/enquire-white.png')); ?>">Enquire</a>
            <a href="tel:18001029880"><img class="hover" src="<?php echo e(asset('images/site_images/images/phone.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/phone-white.png')); ?>">1800 102 9880</a>
          </div>
          <div class="bottom">
            <ul class="menu-list">
              <li><a href="<?php echo e(URL('/')); ?>">Home</a></li>
                <li class="drop-down"><a href="<?php echo e(URL('/about-us')); ?>">About Us</a>
                
                      <div class="submenu">
                      <ul class="">
                        <li><a href="<?php echo e(URL('/about-us#ourvalue')); ?>">Our Value</a>

                          </li>
                        <li ><a href="<?php echo e(URL('/about-us#infrastructure-sec')); ?>">Our Infrastructure</a>   
                        </li>
                        <li ><a href="<?php echo e(URL('/about-us#awards')); ?>">Awards & Accreditations</a>   
                        </li>
                      </ul>
                    </div>  
                  
                </li>
              <li  class="drop-down"><a href="javascript:;">Products</a>
                <div class="submenu">
                  <ul class="">
                    <li><a href="<?php echo e(URL('/window')); ?>">Windows</a>
                     
                      </li>
                    <li ><a href="<?php echo e(URL('/door')); ?>">Doors</a>   
                    </li>
                  </ul>
                </div>  
                
                </li>
               <li class="drop-down"><a href="javascript:;">Why Fenesta</a>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="<?php echo e(URL('/style-benefits')); ?>">Style & Benefits</a></li>
                    <li><a href="<?php echo e(URL('/quality-innovation')); ?>">Quality & Innovation</a></li>
                    <li><a href="<?php echo e(URL('/awards-accreditations')); ?>">Awards & Accreditations</a></li>
                    <li><a href="<?php echo e(URL('/services-infrastructure')); ?>">Services & Infrastucture</a></li>
                    <li><a href="<?php echo e(URL('/brand-heritage')); ?>">Brand & Heritage</a></li>
                    <li><a href="<?php echo e(URL('/green-sustainability')); ?>">Green & Sustainability</a></li>
                  </ul>
                </div>  
                </li>
               <li class="drop-down"><a href="javascript:;">Showcase</a>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="<?php echo e(URL('/showcase/clientele')); ?>">Clientele</a></li>
                    <li><a href="<?php echo e(URL('/showcase/gallery')); ?>">Gallery</a></li>
                    <li><a href="<?php echo e(URL('/customer-reviews')); ?>">Testimonials</a></li>
                  </ul>
                </div>  
                </li>
              <li><a href="https://www.fenesta.com/VisualizeDesign/index.html">Customize</a></li>
               <li class="drop-down"><a href="javascript:;">Contact Us</a>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="https://api.whatsapp.com/send?phone=917428691568&text=Hi">Market Outside India Whatsapp</a></li>
                    <li><a href="sms:+56161&body=Hi">SMS <WINDOW> TO 56161</WINDOW></a></li>
                    <li><a href="mailto:response@fenesta.com" >Email Us</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".complaint-popup">Customer Complaint</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".buiseness-popup"> Reach the Business head </a></li>
                  </ul>
                </div>  
              </li>
            </ul>
            <div class="search-box">
              <span  class="search-icon" id="searchIcon">
                 <img class="search-image" src="<?php echo e(asset('images/site_images/search.png')); ?>">
                <img class="mob-search-image" src="<?php echo e(asset('images/site_images/search-blue.png')); ?>">
              </span>
            </div>
            <div class="mob-locate-icon">
              <img class="" src="<?php echo e(asset('images/site_images/images/locate-icon-blue.png')); ?>"> Gurugram
            
            </div>
              
              
            <!-- Floating Search bar. Appear on click of search Icon on top menu -->
             <div class="floatingSearch" id="floatingSearch">
              <div class="search-box-container">
                <form>
                  <input type="text" placeholder="Search"/>
                  <!-- <input type="button" value="Search" class="blue-btn btnSearch"/> -->
                </form>
              </div>
            </div>
            <!-- /floatingSearch -->
 <style>
   /* 
      .search-box{
        width: fit-content;
        height: fit-content;
        position: relative;
      }
      .input-search{
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        font-size: 18px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: #22a6b3;
        padding-right: 40px;
        color:#fff;
      }
      .input-search::placeholder{
        color:rgba(255,255,255,.5);
        font-size: 18px;
        letter-spacing: 2px;
        font-weight: 100;
      }
      .btn-search{
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 20px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color:#ffffff ;
        background-color:transparent;
        pointer-events: painted;  
      }
      .btn-search:focus ~ .input-search{
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom:1px solid rgba(255,255,255,.5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
      }
      .input-search:focus{
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom:1px solid rgba(255,255,255,.5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
      } */

 
     #searchIcon { cursor: pointer; }
              .floatingSearch {position: absolute; right: 80px; left: 354px; top: 50px; padding: 10px 15px; background: #ffffff; box-shadow: 0px 0px 10px 3px rgb(0 0 0 / 30%); display: none;}     

              .floatingSearch .btnSearch {margin-left: 10px; padding: 4px 17px; } 
              .search-box-container input {width: 100%;padding: 3px 10px; border: 1px solid #0098da;}

     
    </style>

    <script>
     $(document).ready(function() { 

        // Script to toggle the floating search bar
        $("#searchIcon").click(function() {
           $("#floatingSearch").slideToggle();
           $("#floatingSearch input[type='text']").focus();
        }); 
    });
  </script>
              
              
          </div>
        </div>
      </div>
    </div>
  </header>  
  <div class="main-sec inner-page">
   
    <div class="not-found-sec">
      <div class="container-fluid">        
        <div class="image" data-aos="zoom-in">
          <picture>
            <source srcset="<?php echo e(asset('images/404/not-found.png')); ?>" media="(min-width:768px)">
            <source srcset="<?php echo e(asset('images/404/not-found-mob.png')); ?>" media="(min-width:320px)">
            <img src="<?php echo e(asset('images/404/not-found.png')); ?>">
          </picture> 
        </div>
        <div class="back-home text-center" ><a href="<?php echo e(url('/')); ?>" class="blue-btn white"> Back to home</a></div>
      </div>    
    </div>
      <footer>
        <div class="container-fluid">
          <div class="inner-box">
            <div class="top-footer">
              
                <h4><?php echo e($datasettings['subscribetitle']); ?></h4>
                <form name="frmNewsletter"  id="frmNewsletter" method="post" action="<?php echo e(url('newsletter')); ?>">
                        <?php echo e(csrf_field()); ?>

               
                <div class="form-group">
                <input  maxlength="100" placeholder="Enter Email Address"  name="email" id="email" onKeyUp="Remove('frmNewsletter','email')" type="email" >
                <button type="submit" class="blue-btn">Subscribe</button>
                 </div>
                <div class="message-box message-box-frmNewsletter" style="display:none;"> <span class="message-text"></span> </div>
                <div class="error" id="error_email" ></div>
                </form>
              
              <ul class="social-link">
                 <li><a href="<?php echo e($datasettings['facebook']); ?>"><img src="<?php echo e(asset('images/site_images/fb.png')); ?>"></a></li>
                  <li><a href="<?php echo e($datasettings['twitter']); ?>"><img src="<?php echo e(asset('images/site_images/tweet.png')); ?>"></a></li>
                  <li><a href="<?php echo e($datasettings['linkedin']); ?>"><img src="<?php echo e(asset('images/site_images/linked.png')); ?>"></a></li>
                  <li><a href="<?php echo e($datasettings['youtube']); ?>"><img src="<?php echo e(asset('images/site_images/yt.png')); ?>"></a></li>
                  <li><a href="<?php echo e($datasettings['insta']); ?>"><img src="<?php echo e(asset('images/site_images/insta.png')); ?>"></a></li>
              </ul>
            </div>
            <div class="footer-menu">
              <div class="footer-menu-box">
                <h6><a href="<?php echo e(url('/window')); ?>">Windows <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
                <ul>
                  <?php
                 use App\Models\WindowdoorType;
                
                 $wind = WindowdoorType::where('is_delete',0)->get();
                  
                 $windows = $wind->where('type','Window');
                ?>
                  <?php $__currentLoopData = $windows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $ttype = strtolower($ww->type);
                    $pt = strtolower($ww->slug);
                    ?>
                <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($ww->title); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <div class="footer-menu-box">
                <h6><a href="<?php echo e(url('/door')); ?>">Door <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
                <ul>
                    <?php
                   $doors = $wind->where('type','Door');
                  ?>
                  <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php
                    $ttype = strtolower($dd->type);
                    $pt = strtolower($dd->slug);
                    ?>
                    
                <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($dd->title); ?>  </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </ul>
              </div>
              <div class="footer-menu-box">
                <h6>Discover Fenesta <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
                <ul>
                    <li><a href="<?php echo e(url('/about-us')); ?>">About Fenesta</a></li>
                  <li><a href="<?php echo e(url('/about-dcm')); ?>">DCM Shriram</a></li>
                  <li><a href="<?php echo e(url('/news-media')); ?>">News & Media</a></li>
                  <li><a href="<?php echo e(url('/awards-accreditations')); ?>">What's New</a></li>
                  <li><a href="<?php echo e(url('/style-benefits')); ?>">Why Fenesta</a></li>
                  <li><a href="<?php echo e(URL('/showcase/gallery')); ?>">Showcase</a></li>
                </ul>
              </div>
              <div class="footer-menu-box">
                <h6>Support <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
                <ul>
                  <li><a href="<?php echo e(url('/locate-us')); ?>">Locate Us  </a></li>
                   <li><a href="<?php echo e(url('/great-facade')); ?>">Great Facades </a></li>
                  <li><a href="<?php echo e(url('/brochure')); ?>">Request a Brochure  </a></li>
                  <li><a href="javascript:;" data-toggle="modal" data-target=".consult-popup">Consult  </a></li>
                  <li><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                </ul>
              </div>
              <div class="footer-menu-box">
                <h6>Contact Us <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
                <ul>
                  <li><a href="tel:18001029880">Call Toll Free 1800 102 9880</a></li>
                  <li><a href="sms:+56161&body=Hi">SMS <WINDOW> TO 56161</a></li>
                  <li><a href="javascript:;">Submit Enquiry</a></li>
                  <li><a href="mailto:response@fenesta.com">Email Us</a></li>
                  <li><a href="javascript:;">Customer Complaint</a></li>
                  <li><a href="javascript:;">Reach the Business Head</a></li>
                </ul>
              </div>
            </div>
            <div class="dwnload-app">
              <h6>Download The App Now</h6>
               <a href="<?php echo e($datasettings['playstore']); ?>"><img src="<?php echo e(asset('images/site_images/g-play-store.png')); ?>"></a>
            <a href="<?php echo e($datasettings['appstore']); ?>"><img src="<?php echo e(asset('images/site_images/app-store.png')); ?>"></a>
            </div>
            <div class="bottom-footer">
              <ul>
                <li><a href="https://career10.successfactors.com/career?company=dcmshriramP">Careers</a></li>
                <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policies</a></li>
                <li><a href="<?php echo e(url('/disclaimer')); ?>"> Disclaimer</a></li>
                <li><a href="javascript:;"> Site Map</a></li>
              </ul>
              <p>  <?php echo e($datasettings['copyright']); ?> </p>
            </div>
          </div>
        </div>
    </footer>
  </div>

  <div class="back-to-top">
    <a href="#banner">
      <img src="<?php echo e(asset('images/site_images/images/back-top.png')); ?>">
    </a>
  </div>

  <!-------- Mobile Footer --------->
  <div class="mobile-footer">
    <div class="container-fluid">
      <ul>
        <li>
          <a href="javascript:;">
         <!--    <img class="grey" src="images/locate-icon.png">
            <img class="blue" src="images/home-active.png"> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="13.803" height="17.121" viewBox="0 0 13.803 17.121"><defs><style>.a{fill:#040b37;}.b{fill:none;stroke:#707070;}</style></defs><g transform="translate(-48.886)"><g transform="translate(48.886)"><path class="a" d="M61.45,2.966a6.888,6.888,0,0,0-11.326,0,6.89,6.89,0,0,0-.8,6.348,5.426,5.426,0,0,0,1,1.651l5.011,5.886a.6.6,0,0,0,.908,0l5.009-5.884a5.431,5.431,0,0,0,1-1.649A6.891,6.891,0,0,0,61.45,2.966ZM61.134,8.9a4.255,4.255,0,0,1-.787,1.289l0,0-4.557,5.352-4.559-5.355A4.258,4.258,0,0,1,50.44,8.9a5.7,5.7,0,0,1,.666-5.251,5.7,5.7,0,0,1,9.363,0A5.7,5.7,0,0,1,61.134,8.9Z" transform="translate(-48.886)"/><path class="b" d="M7.162,16.331"/></g><g transform="translate(52.447 3.539)"><path class="a" d="M159.095,106.219a3.341,3.341,0,1,0,3.341,3.341A3.344,3.344,0,0,0,159.095,106.219Zm0,5.488a2.147,2.147,0,1,1,2.147-2.147A2.15,2.15,0,0,1,159.095,111.707Z" transform="translate(-155.754 -106.219)"/></g></g></svg>
            <span>Locate</span>
          </a>
        </li>
        <li>
          <a href="javascript:;">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.121" height="17.121" viewBox="0 0 17.121 17.121"><defs><style>.a{fill:#040b37;}</style></defs><path class="a" d="M8.526,13.409A.669.669,0,1,1,9.2,12.74.669.669,0,0,1,8.526,13.409ZM9.2,10.4V9.5a2.788,2.788,0,1,0-2.63-4.7,2.738,2.738,0,0,0-.847,1.988.669.669,0,0,0,1.338,0,1.412,1.412,0,0,1,.437-1.025,1.48,1.48,0,0,1,1.092-.412,1.444,1.444,0,0,1,.264,2.857,1.25,1.25,0,0,0-.991,1.227V10.4a.669.669,0,0,0,1.338,0Zm3.794,5.488a.669.669,0,1,0-.693-1.144,7.286,7.286,0,1,1,2.262-2.174.669.669,0,1,0,1.112.743A8.556,8.556,0,0,0,2.507,2.507a8.561,8.561,0,0,0,10.483,13.38Zm0,0" transform="translate(0.001 0)"/></svg>
            <span>Enquiry</span>
          </a>
        </li>
        <li>
          <a href="tel:18001029880">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.121" height="17.121" viewBox="0 0 17.121 17.121"><g transform="translate(0 -0.001)"><g transform="translate(0 0.001)"><g transform="translate(0 0)"><path d="M248.605,22.3h.03a5.5,5.5,0,0,1,5.507,5.534.605.605,0,0,0,.6.608h0a.606.606,0,0,0,.605-.6,6.707,6.707,0,0,0-6.718-6.751H248.6a.605.605,0,0,0,0,1.211Z" transform="translate(-240.492 -20.452)"/><path d="M15.5,12.49a2.293,2.293,0,0,0-.7-1.575,5.631,5.631,0,0,0-2.23-1.481A2.5,2.5,0,0,0,10,10.16l0,0-.819.813a12.191,12.191,0,0,1-2.58-2l-.08-.08a12.267,12.267,0,0,1-2-2.581L5.337,5.5l0,0a2.5,2.5,0,0,0,.727-2.562A5.631,5.631,0,0,0,4.586.705,2.3,2.3,0,0,0,1.389.59L1.371.606,1.348.628A4.912,4.912,0,0,0,0,4.227,11.5,11.5,0,0,0,3.66,11.841l.006.006a14.776,14.776,0,0,0,1.446,1.258.605.605,0,0,0,.737-.961,13.539,13.539,0,0,1-1.332-1.159l-.006-.006a10.279,10.279,0,0,1-3.3-6.759A3.74,3.74,0,0,1,2.193,1.5l0,0a1.089,1.089,0,0,1,1.517.055c1.568,1.626,1.454,2.393.761,3.1L3.354,5.78a.605.605,0,0,0-.123.673,12.234,12.234,0,0,0,2.434,3.3l.08.08a12.234,12.234,0,0,0,3.3,2.434.605.605,0,0,0,.673-.123l1.131-1.122c.71-.693,1.478-.806,3.1.761A1.089,1.089,0,0,1,14.01,13.3l0,0a3.729,3.729,0,0,1-2.7.982H11.28a7.851,7.851,0,0,1-2.988-.707.605.605,0,1,0-.48,1.112,8.932,8.932,0,0,0,3.461.806h.034a4.9,4.9,0,0,0,3.564-1.347l.022-.024.016-.017A2.293,2.293,0,0,0,15.5,12.49Z" transform="translate(0 -0.001)"/><path d="M294.522,112.863a3.327,3.327,0,0,0-1.572-.9.605.605,0,1,0-.323,1.167,2.118,2.118,0,0,1,1.039.594,2.164,2.164,0,0,1,.588,1.02l.009.03a.605.605,0,1,0,1.161-.344l-.008-.028A3.332,3.332,0,0,0,294.522,112.863Z" transform="translate(-283.337 -108.547)"/></g></g></g></svg>
            <span>Call Us</span>
          </a>
        </li>        
        <li>
          <a href="javascript:;" class="menu-btn">
            <div class="burger-menu"><span></span></div>
            <span>Menu</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="mob-overlay"></div>



  <!------------Enquiry Pop Up ------------>
  <div class="modal fade enquiry-popup" id="enquiry-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="">Please Enter Your Details</h5>            
            <form class="enquiry-form" id="enquiry-form" action="<?php echo e(url('/submit-enquiry')); ?>" method="post" novalidate>
                 <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" id="username" class="form-control" name="name" placeholder="Name*">
                  <div class="error" id="error_username" ></div>
              </div>
              <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email ID*">
                  <div class="error" id="error_email" ></div>
              </div>
              <div class="form-group">
                <input type="text" id="userphone" class="form-control" name="mobile" placeholder="Phone No*"> 
                  <div class="error" id="error_userphone" ></div>
              </div>
              <div class="form-group">
                <select class="select userstate" id="userstate" name="state">
                  <option value="">State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
                  <div class="error" id="error_userstate" ></div>
              </div>
              <div class="form-group">
                <select class="select usercity" id="usercity" name="city">
                  <option value="">City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
                  <div class="error" id="error_usercity" ></div>
              </div>
              <div class="form-group">
                <button id="submit-btn-enquiry-form" type="submit" name="" class="blue-btn enquirysubmit"> Submit </button>
              </div>   
              <div class="message-box message-box-enquiry-form" style="display:none;"> <span class="message-text"></span> </div>           
              <div class="form-group">
                <p>*By clicking Submit button I agree that I have read the <br> <a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a></p>
              </div>
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>

  <!------------Complaint Pop Up ------------>
  <div class="modal fade complaint-popup" id="complaint-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">CUSTOMER COMPLAINTS</h5>
            <p class="text-center">We are sorry if we have caused any inconvenience to you. Please fill up the form below with your details. Our customer support staff will make sure we address your issue at the earliest.</p>
            <form class="complaint-form" id="complaint-form" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" required value="Customercomplaint">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address*">
              </div>
              <div class="form-group">
                <select class="select userstate" name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="select usercity" name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group">
                <div class="captcha">
                 <div class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
               
              </div>
              <div class="form-group">
                <button type="submit" name="" class="blue-btn submitcc"> Submit Complaint</button>
              </div> 
                <div class="message-box message-box-cc" style="display:none;"> <span class="message-text"></span> </div> 
			</form>	
          </div>
            
          </div>       
        </div> 
      </div>
  </div>

  <!------------Buiseness Pop Up ------------>
  <div class="modal fade buiseness-popup" id="buiseness-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>" alt=""></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">Reach The Buiseness Head</h5>
            <p class="text-center">Do you have a suggestion, a question, a business proposal or a concern that you'd like to share with our Business Head? Fill in form below to reach him directly.</p>
            <form class="complaint-form" id="complaint-forma" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" required value="Reachbusiness">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address*">
              </div>
              <div class="form-group">
                <select class="select userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="select usercity " name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group">
                <div class="captcha">
                  <div class="g-recaptcha" required data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
               <div class="gerror error"></div>
              </div>
              <div class="form-group">
                <button type="submit" name="" class="blue-btn submitcca"> Submit Complaint</button>
              </div>   
                   <div class="message-box message-box-cca" style="display:none;"> <span class="message-text"></span> </div> 
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>

  <!------------consult Pop Up ------------>
  <div class="modal fade consult-popup" id="consult-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>" alt=""></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">Expert Consultation</h5>
            <p class="text-center">Whether you are looking for that perfect window for your room or a signature door for your entrance, our team of experts are here to help. Our consultants will help you with tips and solutions for every query specific to your need. To help us serve you better, please fill in your details below:</p>
            <form class="consult-form" id="consult-form" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
               <div class="form-group">
                <select class="select type " name="type">
                  <option value="Windowdoorconsult"> For Windows & Doors</option>
                  <option value="Interiorsconsult">For Interiors and Architecture </option>
                </select>
              </div>
              <div class="form-group">
                <select class="select userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="select usercity " name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group">
                <div class="captcha">
                  <div class="g-recaptcha" required data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
               <div class="gerror error"></div>
              </div>
              <div class="form-group">
                <button type="submit" name="" class="blue-btn submitexpert"> Submit Consult</button>
              </div>   
                   <div class="message-box message-box-expert" style="display:none;"> <span class="message-text"></span> </div> 
                  
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fullpage.js')); ?>"></script>
<script src="<?php echo e(asset('js/scrolloverflow.min.js')); ?>"></script>
<script src="http://www.youtube.com/iframe_api"></script>
<script src="<?php echo e(asset('js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>


    <script>
 $('.enquirysubmit').click(function(r){
   r.preventDefault();
   $('#enquiry-form').validate({
    rules:{
      name:'required',
      state:'required',
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
      name:'Please enter your name',
      state:'Please enter state',
      mobile:{
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#enquiry-form').valid()){
       
var form_id="enquiry-form";

jQuery(".message-box-" +form_id).hide();
jQuery("#"+form_id+" .error").html(" ");  
    

        var s = $(this);       
        r.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
     // js validation 
// var   username = jQuery("#"+form_id+" #username").val(); 
//   if(username==''){        
//
//            jQuery("#"+form_id+ " #error_"+"username").html("Please enter name.");
//            jQuery("#"+form_id+ " #error_"+"username").show();
//            jQuery("#"+form_id+"  #username").focus();
//            jQuery("#"+form_id+"  #username").addClass('fld-error');         
//            return false;
//           
//      }
//
//  
//    var   email = jQuery("#"+form_id+" #email").val(); 
//   if(email==''){        
//
//            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
//            jQuery("#"+form_id+ " #error_"+"email").show();
//            jQuery("#"+form_id+"  #email").focus();
//            jQuery("#"+form_id+"  #email").addClass('fld-error');         
//            return false;
//           
//      }
//    if(IsEmail(email)==false){ 
//            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
//            jQuery("#"+form_id+ " #error_"+"email").show();
//            jQuery("#"+form_id+" #email").focus();
//            jQuery("#"+form_id+" #email").addClass('fld-error');         
//            return false;     
//            
//    } 
//     var   userphone = jQuery("#"+form_id+" #userphone").val(); 
//   if(userphone==''){        
//
//            jQuery("#"+form_id+ " #error_"+"userphone").html("Please enter Phone.");
//            jQuery("#"+form_id+ " #error_"+"userphone").show();
//            jQuery("#"+form_id+"  #userphone").focus();
//            jQuery("#"+form_id+"  #userphone").addClass('fld-error');         
//            return false;
//           
//      }
//
//    var   userstate = jQuery("#"+form_id+" #userstate").val(); 
//   if(userstate==''){        
//
//            jQuery("#"+form_id+ " #error_"+"userstate").html("Please enter state.");
//            jQuery("#"+form_id+ " #error_"+"userstate").show();
//            jQuery("#"+form_id+"  #userstate").focus();
//            jQuery("#"+form_id+"  #userstate").addClass('fld-error');         
//            return false;
//           
//      }
//
//    var   usercity = jQuery("#"+form_id+" #usercity").val(); 
//   if(usercity==''){        
//
//            jQuery("#"+form_id+ " #error_"+"usercity").html("Please enter city.");
//            jQuery("#"+form_id+ " #error_"+"usercity").show();
//            jQuery("#"+form_id+"  #usercity").focus();
//            jQuery("#"+form_id+"  #usercity").addClass('fld-error');         
//            return false;
//           
//      }

 // js validation  end 
       // ajax
             jQuery.ajax({ 
             url: $("#" + form_id).attr("action"),
             type: 'POST',
             data: $("#" + form_id).serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-"+form_id).attr('disabled'); 
              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-" + form_id).html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  
                               jQuery("#"+form_id+" .form-control").val("");  
               
             },
              error: function(e) {
                 jQuery('#submit-btn-'+form_id).removeAttr('disabled');
                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( "#"+form_id+ " #error_"+e).html(a);
                            $("#"+form_id+  " #" + e).addClass('fld-error');  
                             $("#"+form_id+  " #" + e).focus();            
                             

                        })  
                    },
           });
            //grecaptcha.reset();
            return false;
   }
    })
    
 $('.submitcc').click(function(r){

   r.preventDefault();
   $('#complaint-form').validate({
    rules:{
      name:'required',
      address:'required',
      state:'required',
      message:'required',
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
      name:'Please enter your name',
      address:'Please enter address',
      state:'Please enter state',
      message:'Please enter message',
      mobile:{
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });


   if($('#complaint-form').valid()){
//     $('#complaint-form').serializeArray().forEach(function(item,index){
//           arr[item.name] = item.value ;
//       });
//     console.log(arr)
//   }
//        var s = $(this);       
//        r.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
       // ajax
             jQuery.ajax({ 
             url: $("#complaint-form").attr("action"),
             type: 'POST',
             data: $("#complaint-form").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery(".submitcc").attr('disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                               jQuery("#complaint-form .form-control").val("");  
                                jQuery(".message-box-cc").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-cc").show(); 
                                jQuery(".submitcc").removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  

               
             },
              error: function(e) {
                 jQuery('.submitcc').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( ".submitcc #error_"+e).html(a);            
                             

                        })  
                    },
           });
            grecaptcha.reset();
            return false;
       
   }
   
    });
 
 $('.submitcca').click(function(r){
   r.preventDefault();
   $('#complaint-forma').validate({
    rules:{
      name:'required',
      address:'required',
      state:'required',
      message:'required',
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
      name:'Please enter your name',
      address:'Please enter address',
      state:'Please enter state',
      message:'Please enter message',
      mobile:{
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#complaint-forma').valid()){
       
//        var googleResponse = $('#g-recaptcha-response').val();
//alert(googleResponse);
//     $('#complaint-forma').serializeArray().forEach(function(item,index){
//           arr[item.name] = item.value ;
//       });
//     console.log(arr)
//   }
//
//        var s = $(this);       
//        r.preventDefault();
       //if(grecaptcha && grecaptcha.getResponse().length > 0){
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
       // ajax
             jQuery.ajax({ 
             url: $("#complaint-forma").attr("action"),
             type: 'POST',
             data: $("#complaint-forma").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery(".submitcca").attr('disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-cca").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-cca").show(); 
                                jQuery(".submitcca").removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  
                                jQuery("#complaint-forma .form-control").val("");  
               
             },
              error: function(e) {
                 jQuery('.submitcca').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( ".submitcca #error_"+e).html(a);            
                             

                        })  
                    },
           });
       
//       }else{
//          $( ".gerror").html('reCAPTCHA Required'); 
//           return false;
//       }
            grecaptcha.reset();
            return false;
   }
    })
  
</script>

    <script>
     var urla = "<?php echo e(url('/')); ?>/getstate";//should return json with a list of cities only   
         $.ajax({
        url:urla,
        dataType:'html',
        success: function(items){
            $('.userstate').html(items);
             $('.userstate').change(function(){
                var url = "<?php echo e(url('/')); ?>/getcity";//should return json with a list of cities only
                var std = $(this).find(':selected').data('id');
            //    alert(std);
                var data = {'state':std};
                $.ajax({
                    url:url,
                    data:data,
                    dataType:'html',
                    success: function(items){
                         $('.usercity').html(items);
                    }
                })
            }).change();
        }
    })
        
        
 $('.userstate').change(function(){
    var url = "<?php echo e(url('/')); ?>/getcity";//should return json with a list of cities only
    var std = $(this).find(':selected').data('id');
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.usercity').html(items);
        }
    })
});

 $('.submitexpert').click(function(r){
   r.preventDefault();
   $('#consult-form').validate({
    rules:{
      name:'required',
      type:'required',
      state:'required',
      message:'required',
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
      name:'Please enter your name',
      type:'Please select Type',
      state:'Please enter state',
      message:'Please enter message',
      mobile:{
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#consult-form').valid()){
       
//        var googleResponse = $('#g-recaptcha-response').val();
//alert(googleResponse);
//     $('#complaint-forma').serializeArray().forEach(function(item,index){
//           arr[item.name] = item.value ;
//       });
//     console.log(arr)
//   }
//
//        var s = $(this);       
//        r.preventDefault();
       //if(grecaptcha && grecaptcha.getResponse().length > 0){
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
       // ajax
             jQuery.ajax({ 
             url: $("#consult-form").attr("action"),
             type: 'POST',
             data: $("#consult-form").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery(".submitexpert").attr('disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-expert").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-expert").show(); 
                                jQuery(".submitexpert").removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  
                                jQuery("#consult-form .form-control").val("");  
               
             },
              error: function(e) {
                 jQuery('.submitexpert').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                  jQuery(".message-box-expert").show(); 
                          jQuery(".message-box-expert").html("<div class='error'>The given data was invalid.</div>").delay(5000).fadeOut();         
                             
                    },
           });
       
//       }else{
//          $( ".gerror").html('reCAPTCHA Required'); 
//           return false;
//       }
            grecaptcha.reset();
            return false;
   }
    })
</script>
</body>
</html>
<?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/layouts/404template_page.blade.php ENDPATH**/ ?>