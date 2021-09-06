<!DOCTYPE html>
<html lang="en">
<head>
 
    
    <?php if(!empty($meta_title)): ?>
      <title><?php echo e($meta_title); ?></title>
    <?php else: ?>
      <title>Fenesta</title>
    <?php endif; ?>
      <meta charset="utf-8">
        <?php if(!empty($meta_description)): ?>
         <meta name="description" content="<?php echo e($meta_description); ?>">
        <?php else: ?>
        <meta name="description" content="">
        <?php endif; ?>
      
        <?php if(!empty($meta_keyword)): ?>
         <meta name="keywords" content="<?php echo e($meta_keyword); ?>" />
        <?php else: ?>
        <meta name="keywords" content="" />
        <?php endif; ?>
      
        <?php if(!empty($og_title)): ?>
         <meta property="og:title" content="<?php echo e($og_title); ?>" />
        <?php else: ?>
        <meta property="og:title" content="" />
        <?php endif; ?>
      
        <?php if(!empty($og_desc)): ?>
         <meta property="og:description" 
          content="<?php echo e($og_desc); ?>" />
        <?php else: ?>
        <meta property="og:description" 
          content="" />
        <?php endif; ?>
        <?php if(!empty($og_image )): ?>
         <meta property="og:image" 
          content="<?php echo e(asset('images').'/'.$og_image); ?>" />
        <?php else: ?>
        <meta property="og:image" 
          content="" />
        <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('images/favicon.ico')); ?>" />
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
  <link rel="stylesheet" href="<?php echo e(asset('css/common_new.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
.addReadMore.showlesscontent .SecSec,
.addReadMore.showlesscontent .readLess {
    display: none;
}

.addReadMore.showmorecontent .readMore {
    display: none;
}

.addReadMore .readMore,
.addReadMore .readLess {
    font-weight: bold;
    margin-left: 2px;
    color: blue;
    cursor: pointer;
}

.addReadMoreWrapTxt.showmorecontent .SecSec,
.addReadMoreWrapTxt.showmorecontent .readLess {
    display: block;
}
      .error-cc {
     color: red;
    padding-top: 5px;
}
        h1{
            text-transform: capitalize;
        }
        .error {
    font-size: 12px;
    color: red;
    padding-top: 5px;
}
        .message-box.message-box-frmBlog.success{
            color: green;
    padding-top: 5px;
        }
        .message-box.message-box-frmBlog.error{
             color: red;
    padding-top: 5px;
        }
        .message-box.message-box-frmNewsletter.success {
    color: green;
    padding-top: 5px;
}
        .message-box.message-box-frmNewsletter.error {
     color: red;
    padding-top: 5px;
}      
        .message-box.message-box-brochure.success {
    color: green;
    padding-top: 5px;
}
        .message-box.message-box-brochure.error {
     color: red;
    padding-top: 5px;
}
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
    
    
     <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"17152836"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
      <!-- End UET tag -->
<!-- Global site tag (gtag.js) - Google Ads: 1026052676 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1026052676"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-1026052676');
</script>
<script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
          'send_to': 'AW-1026052676/XAAYCOO4rbcBEMSkoekD',
          'event_callback': callback
      });
      return false;
    }
</script>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '798653120213833');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=798653120213833&ev=PageView&noscript=1"
/>
</noscript>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P83WHJ');</script>

    
    <!-- Google Tag Manager -->
    <script>setTimeout(function(){(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P83WHJ');}, 10000);</script>
    <!-- End Google Tag Manager -->
    <!--Bing Remarketing Code: -->
    
    
    <script>setTimeout(function(){ (function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"17152836"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq"); }, 5000);</script><noscript><img src="//bat.bing.com/action/0?ti=17152836&Ver=2" 
    height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
    <!--End Bing Remarketing Code: -->
        
      <!-- UET tag -->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"17152836"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq"); </script>
<!-- End UET tag -->
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '798653120213833');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=798653120213833&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    <script type = "text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'AW-1026052676');
    </script>
    
</head>
<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P83WHJ" height="0" width="0" loading="lazy" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    <header>
	<div class="container-fluid">
		<div class="inner-header">
			<div class="logo"><a href="<?php echo e(url('/')); ?>">
              <img src="<?php echo e(asset('images/logo/'.$datasettings['logo'])); ?>"></a></div>
			<div class="header-right">
				<img class="lp_icon" src="<?php echo e(asset('images/site_images/lp-header-icon.png')); ?>" alt="">
			</div>
		</div>
	</div>
</header> 


  <div class="main-sec inner-page enq_lp">
   
<!-- site main -->
         <?php if(session()->has('message_susuccess')): ?>
          <div class="alert alert-success"> <?php echo e(session()->get('message_susuccess')); ?> </div>
          <?php endif; ?>

          <?php if(session()->has('message_error')): ?>
          <div class="alert alert-error"> <?php echo e(session()->get('message_error')); ?> </div>
          <?php endif; ?> 
          <?php echo $__env->yieldContent('content'); ?> 
      
      
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
                 <li><a target="_blank" href="<?php echo e($datasettings['facebook']); ?>"><img src="<?php echo e(asset('images/site_images/fb.png')); ?>"></a></li>
                  <li><a target="_blank" href="<?php echo e($datasettings['twitter']); ?>"><img src="<?php echo e(asset('images/site_images/tweet.png')); ?>"></a></li>
                  <li><a target="_blank" href="<?php echo e($datasettings['linkedin']); ?>"><img src="<?php echo e(asset('images/site_images/linked.png')); ?>"></a></li>
                  <li><a target="_blank" href="<?php echo e($datasettings['youtube']); ?>"><img src="<?php echo e(asset('images/site_images/yt.png')); ?>"></a></li>
                  <li><a target="_blank" href="<?php echo e($datasettings['insta']); ?>"><img src="<?php echo e(asset('images/site_images/insta.png')); ?>"></a></li>
              </ul>
            </div>
            <div class="footer-menu">
              <div class="footer-menu-box">
                <h6><a href="<?php echo e(url('/window')); ?>">Windows <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
                <ul>
                  <?php
                 use App\Models\WindowdoorType;
                
                 $wind = WindowdoorType::where('is_delete','0')->get();
                  
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
                <h6><a href="<?php echo e(url('/door')); ?>">Doors <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
                <ul>
                    <?php
                   $doors = $wind->where('type','Door');
                  ?>
                  <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php
                    $ttype = strtolower($dd->type);
                    $pt = strtolower($dd->slug);
                    ?>
                    
                <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($dd->title); ?>   </a></li>
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
                  <li><a href="<?php echo e(url('/enquire-now')); ?>" >Submit Enquiry</a></li>
                  <li><a href="mailto:response@fenesta.com">Email Us</a></li>
                  <li><a href="javascript:;" data-toggle="modal" data-target=".complaint-popup">Customer Complaint</a></li>
                  <li><a href="javascript:;" data-toggle="modal" data-target=".buiseness-popup">Reach the Business Head</a></li>
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
                <li><a href="<?php echo e(url('/sitemap')); ?>"> Site Map</a></li>
              </ul>
              <p>  <?php echo e($datasettings['copyright']); ?> </p>
            </div>
          </div>
        </div>
    </footer>
  </div>

  <div class="back-to-top">
      
    
      
      
     <a href="https://www.konverse.ai/"
        id="konverse-ref-id" data-bot-id="fenesta"
        title="Konverse.ai - Whatsapp chatbot retargeting Suite"
        style="display:none">WhatsApp for Business Chatbot</a>


    <a href="#banner">
       <img src="<?php echo e(asset('images/site_images/back-top.png')); ?>">
    </a>
  </div>

  <!-------- Mobile Footer --------->
 

  <div class="mob-overlay"></div>

  <!-- The landing Pop Modal -->
  <div class="modal fade videoPopup" id="videoPopup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close"><img src="<?php echo e(asset('images/site_images/close.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
             <div id="video-placeholder" style="position: relative;"></div>
          </div>       
        </div> 
      </div>
    </div>
  </div>


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
            <form class="enquiry-form" id="enquiry-form" action="<?php echo e(url('/submit-enquiry-now')); ?>" method="post" novalidate>
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
                <select class="form-control userstate" id="userstate" name="state">
                  <option value="">State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
                  <div class="error" id="error_userstate" ></div>
              </div>
              <div class="form-group">
                <select class="form-control usercity" id="usercity" name="city">
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
                <select class="form-control userstate" name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control usercity" name="city">
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
                 <div id="complaint_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
               
              </div>
              <div class="form-group">
                <button type="submit" id="submit-btn-complaint-form" name="" class="blue-btn submitcc"> Submit Complaint</button>
              </div> 
                <div class="message-box message-box-cc" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
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
                <select class="form-control userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control usercity " name="city">
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
                  <div id="reachhead_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" id="submit-btn-complaint-forma" name="" class="blue-btn submitcca"> Submit Complaint</button>
              </div>   
                   <div class="message-box message-box-cca" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
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
                <select class="form-control  type " name="type">
                  <option value="Windowdoorconsult"> For Windows & Doors</option>
                  <option value="Interiorsconsult">For Interiors and Architecture </option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control usercity " name="city">
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
                  <div id="consult_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ"></div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit"  id="submit-btn-consult-form" name="" class="blue-btn submitexpert"> Submit Consult</button>
              </div>   
                   <div class="message-box message-box-expert" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
                  
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>

<?php
   $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

        { 
           ?>
<a href="https://api.whatsapp.com/send?phone=917428691568&text=Hi" id="whatpp_icons" style="text-decoration: none;" target="_blank">
	 <img src="https://i.ibb.co/N9P0K9H/239px-Whats-App-svg.png" width="50" height="50"/>
</a>
<?php
        }
        else{
          ?>


 <script>
    	setTimeout(function(){ 
    	    
    	var script = document.createElement('script');
script.src = "https://chat.konverse.ai/konverse.js";
script.async = true;
document.getElementsByTagName('head')[0].appendChild(script);    
    	    
    	}, 1000);
    </script>

<?php } ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fullpage.js')); ?>"></script>
<script src="<?php echo e(asset('js/scrolloverflow.min.js')); ?>"></script>
<script src="http://www.youtube.com/iframe_api"></script>
<script src="<?php echo e(asset('js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('js/common_file.js')); ?>"></script>

           
<script type="text/javascript">
    
    $(document).ready(function(){
    $(".region , .ptype").change(function(){
      var testval = [];
     $('.region:checked').each(function() {
       testval.push($(this).val());
     });
      var testval1 = [];
     $('.ptype:checked').each(function() {
       testval1.push($(this).val());
     });
     var page = $('#pid').val(); 
//        alert(testval);
//        alert(testval1);
    $.ajax({
            type:'POST',
            dataType: "html",
            url:'<?php echo e(url("/showcasedata")); ?>',
            headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
            data: { "region_id" : testval , "type_id" : testval1 , "page" : page },
            success: function(data){
              //console.log(data);
               // alert($('.ajaxdata').html());
                if(data){
              $('.ajaxdata').html(data);
                    $('.noresult').hide();
                }else{
                    $('.ajaxdata').html('');
                     $('.noresult').show();
                    
                }
              $('.sloadi').hide();
            }
        });
    });
});
    
    
  var client_size = $(".client_list ul li").length;
  var client_show = 10;
  $('.client_list ul li:lt('+client_size+')').hide();
    
  $('.client_list ul li:lt('+client_show+')').slideDown();
  $('.client_list .load-more-btn .load-more').click(function () {
//      alert(client_size);
      client_show = (client_show + 10 <= client_size) ? client_show + 10 : client_size;
      
      $('.client_list ul li:lt('+client_show+')').slideDown();
      if(client_show == client_size){
//          alert(client_size);
//      alert(client_show);
       //setTimeout(function(){
          $('.client_list .load-more-btn .load-more').hide();  
          $('.client_list .load-more-btn .load-less').show();         
       // },500);
      }
  });

  $('.client_list .load-more-btn .load-less').click(function () {
      client_show = (client_show-10<10) ? 10 : client_show-10;
      $('.client_list ul li').not(':lt('+client_show+')').slideUp();
      if(client_show <= 10){
       // setTimeout(function(){
          $(".client_list .load-more-btn .load-more").show();
          $('.client_list .load-more-btn .load-less').hide()
       // },500);
      }
  });


//   $(document).ready(function () {
//		$("p").attr("data-aos","fade-up");
//	});

 // start frmBlog
 $("#frmBlog").on("submit", function(r) {

var form_id="frmBlog";

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



var   name = jQuery("#"+form_id+" #name").val(); 
     if(name==''){        
     
            jQuery("#"+form_id+ " #error_" + "name").html("Please enter name.");
             jQuery("#"+form_id+ " #error_"+"name").show();
            jQuery("#"+form_id+" #name").focus();
            jQuery("#"+form_id+" #name").addClass('fld-error'); 
            return false;       
            
    } 

    var   email = jQuery("#"+form_id+" #email").val(); 
   if(email==''){        

            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+"  #email").focus();
            jQuery("#"+form_id+"  #email").addClass('fld-error');         
            return false;
           
      }

    if(IsEmail(email)==false){ 
            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+" #email").focus();
            jQuery("#"+form_id+" #email").addClass('fld-error');         
            return false;
                
            
    } 


    

    
var   message = jQuery("#"+form_id+" #message").val(); 
     if(message==''){        
     
            jQuery("#"+form_id+ " #error_" + "message").html("Please enter message.");
             jQuery("#"+form_id+ " #error_"+"message").show();
            jQuery("#"+form_id+" #message").focus();
            jQuery("#"+form_id+" #message").addClass('fld-error'); 
            return false;       
            
    } 

  /*  if(grecaptcha && grecaptcha.getResponse().length==0)
      
      {
            jQuery("#"+form_id+ " #error_"+"recaptcha").html("Please select recaptcha.");
            jQuery("#"+form_id+" #recaptcha").focus();
            jQuery("#"+form_id+" #recaptcha").addClass('fld-error');         
            return false;
          
      }
*/

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
                                if(response.status==1){

                                  $("#" + form_id).trigger("reset");
                                 jQuery(".message-box-" + form_id).removeClass("error");
                                 jQuery(".message-box-" + form_id).addClass("success");

                                 } else{
                                jQuery(".message-box-" + form_id).removeClass("success");
                                 jQuery(".message-box-" + form_id).addClass("error");                        
                                } 
                              
                                //jQuery(".message-box-" + form_id).html(response.message);
                               jQuery(".message-box-frmBlog").html(response.message);



                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  

               
             },
              error: function(e) {
                 jQuery('#submit-btn-'+form_id).removeAttr('disabled');
                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                           
                            $( "#"+form_id+ " #error_"+e).html(a);
                            $("#"+form_id+  " #" + e).addClass('fld-error');  
                             $("#"+form_id+  " #" + e).focus();            
                             

                        })  
                    },
           });
           // grecaptcha.reset();
            return false;
   
    })


 // end frmBlog

    
    
    var player; 
    var player2;
    $('.testimonials-slider .image .play').on('click', function () {
        var url = $(this).attr('data-video-id');
        player.cueVideoById(url);
        player.playVideo();
        $('.videoPopup').modal('show');

    }); 
    


    $('.upvc_video .inner .play_btn').on('click', function () {
        var url = $(this).attr('data-video-id');
        player.cueVideoById(url);
        player.playVideo();
        $('.videoPopup').modal('show');

    });   

    
  $('.facade-client-slider .image .play').on('click', function () {
      var url = $(this).attr('data-video-id');
      player.cueVideoById(url);
      player.playVideo();
      $('.videoPopup').modal('show');

  });   

  $('.client-sec .image .play').on('click', function () {
      var url = $(this).attr('data-video-id');
      player.cueVideoById(url);
      player.playVideo();
      $('.videoPopup').modal('show');

  });   

  $('.videoPopup .close').click(function(){
    player.pauseVideo();
     $('.videoPopup').modal('hide');
  });

   $('.videoPopup').click(function(){
    player.pauseVideo();
     $('.videoPopup').modal('hide');
  })

  function onYouTubeIframeAPIReady() {
      player = new YT.Player('video-placeholder', {
          videoId: '',     
      });
  }


function Remove(form_id,id){
    jQuery('#error_'+id).html('');
    //jQuery('#'+id).removeClass('fld-error');

    jQuery("#"+form_id+ " #error_"+id).html("");
    jQuery("#"+form_id+ " #"+id).removeClass('fld-error');

}//end Remove 

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}//end IsEmail
function IsPhone(phone) {
  var regex = /^([0-9]{10})+$/;
  return regex.test(phone);
}//endIsPhone

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
    && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
    
 jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Please enter letters and spaces only");
     
 jQuery.validator.addMethod("addressonly", function(value, element) 
{
return this.optional(element) || /^[a-z0-9A-Z," "]+$/i.test(value);
}, "Please enter correct address");
       
 jQuery.validator.addMethod("matches", function(value, element) 
{
return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
}, "Please enter correct number");
    
   // start frmNewsletter
 $("#frmNewsletter").on("submit", function(r) {

var form_id="frmNewsletter";

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


    var   email = jQuery("#"+form_id+" #email").val(); 
   if(email==''){        

            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+"  #email").focus();
            jQuery("#"+form_id+"  #email").addClass('fld-error');         
            return false;
           
      }


    if(IsEmail(email)==false){ 
            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+" #email").focus();
            jQuery("#"+form_id+" #email").addClass('fld-error');         
            return false;
            return false;       
            
    } 

  $(this).prop("disabled", true);
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
                                if(response.status==1){

                                  $("#" + form_id).trigger("reset");
                                 jQuery(".message-box-" + form_id).removeClass("error");
                                 jQuery(".message-box-" + form_id).addClass("success");

                                 } else{
                                jQuery(".message-box-" + form_id).removeClass("success");
                                 jQuery(".message-box-" + form_id).addClass("error");                        
                                } 
                              
                                //jQuery(".message-box-" + form_id).html(response.message);
                               jQuery(".message-box-frmNewsletter").html(response.message).delay(5000).fadeOut();

                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  

               
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
   
    })
   // start brouche
 $("#brochure").on("submit", function(r) {

var form_id="brochure";

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

    var   email = jQuery("#"+form_id+" #email").val(); 
   if(email==''){        

            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+"  #email").focus();
            jQuery("#"+form_id+"  #email").addClass('fld-error');         
            return false;
           
      }

    var   username = jQuery("#"+form_id+" #username").val(); 
   if(username==''){        

            jQuery("#"+form_id+ " #error_"+"username").html("Please enter name.");
            jQuery("#"+form_id+ " #error_"+"username").show();
            jQuery("#"+form_id+"  #username").focus();
            jQuery("#"+form_id+"  #username").addClass('fld-error');         
            return false;
           
      }

    var   userphone = jQuery("#"+form_id+" #userphone").val(); 
   if(userphone==''){        

            jQuery("#"+form_id+ " #error_"+"userphone").html("Please enter Phone.");
            jQuery("#"+form_id+ " #error_"+"userphone").show();
            jQuery("#"+form_id+"  #userphone").focus();
            jQuery("#"+form_id+"  #userphone").addClass('fld-error');         
            return false;
           
      }


    if(IsEmail(email)==false){ 
            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+" #email").focus();
            jQuery("#"+form_id+" #email").addClass('fld-error');         
            return false;
            return false;       
            
    } 

  $(this).prop("disabled", true); 
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
                                if(response.status==1){

                                  $("#" + form_id).trigger("reset");
                                 jQuery(".message-box-" + form_id).removeClass("error");
                                 jQuery(".message-box-" + form_id).addClass("success");

                                    
                                    var link=document.createElement('a');
                                     link.href = "<?php echo url('/'); ?>/images/brochure/"+response.pdf;
                                    link.download = response.pdf;
                                    link.click();
                                    link.remove();
                                    
                                 } else{
                                jQuery(".message-box-" + form_id).removeClass("success");
                                 jQuery(".message-box-" + form_id).addClass("error");                        
                                } 
                              
                                //jQuery(".message-box-" + form_id).html(response.message);
                               jQuery(".message-box-brochure").html(response.message).delay(5000).fadeOut();;

                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  

               
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
   
    })

 $('.enquirysubmit').click(function(r){
   r.preventDefault();
   $('#enquiry-form').validate({
    rules:{
      name: {
                lettersonly: true,
                required: true,
            },
      state:'required',
      mobile:{
        matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
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
      
name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
      mobile:{
          matches:"Please enter correct number",
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
       
    
        var __VIEWSTATE = $('#__VIEWSTATE').val();
        var __VIEWSTATEGENERATOR = $('#__VIEWSTATEGENERATOR').val();
        var email_type_pro = $('#email_type_pro').val();
        var state_tags = $('#userstate').val();
        var name = $('#username').val();
        var tagss = $('#usercity').val();
        var txt_cityFrom = $('#usercity').val();
        var lp_url = $('#lp_url').val();
        var utm_source = $('#utm_source').val();
        var utm_medium = $('#utm_medium').val();
        var utm_campaignname = $('#utm_campaignname').val();
        var utm_campaignid = $('#utm_campaignid').val();
        var utm_adgroupname = $('#utm_adgroupname').val();
        var utm_adgroupid = $('#utm_adgroupid').val();
        var utm_keyword = $('#utm_keyword').val();
        var utm_website = $('#utm_website').val();
        var utm_geo = $('#utm_geo').val();
        var utm_type = $('#utm_type').val();
        var utm_adgroup = $('#utm_adgroup').val();
        var utm_creativeid = $('#utm_creativeid').val();
        var utm_ad_name = $('#utm_ad_name').val();
        var sds = 'hghd';
        var txt_OTP = $('#txt_OTP').val();
        var whatsapp = $('#whatsapp').val();
        var publisher_id = $('#publisher_id').val();
        var hdnLid = $('#hdnLid').val();
        var txt_email = $('#email').val();
        var txtNumber = $('#userphone').val();
        var _token = $('input[name=_token]').val();
       


				//alert($('#txt_OTP').show());
				if(utm_source == 'Netcore' || utm_source == 'netcore'){
				    publisher_id = $('#utmpublisher_id').val();
				}
				//document.getElementById("cmdsave").disabled = true;
        if(state_tags == ''){
              state_tags = $('#statetagsSecond').val();
        }
        fbq('track','Lead');
       
        $(this).prop("disabled", true); 
 // js validation  end 
       // ajax
             jQuery.ajax({ 
             url: $("#" + form_id).attr("action"),
             type: 'POST',
             data: "_token="+_token+"&txt_name="+name+"&txt_telephoneno="+txtNumber+"&txt_email="+txt_email+"&__VIEWSTATE="+__VIEWSTATE+"&__VIEWSTATEGENERATOR="+__VIEWSTATEGENERATOR+"&email_type_pro="+email_type_pro+"&state_tags="+state_tags+"&ddlcity="+tagss+"&txt_cityFrom="+txt_cityFrom+"&lp_url="+lp_url+"&utm_source="+utm_source+"&utm_medium="+utm_medium+"&utm_campaignname="+utm_campaignname+"&utm_campaignid="+utm_campaignid+"&utm_adgroupname="+utm_adgroupname+"&utm_adgroupid="+utm_adgroupid+"&utm_creativeid="+utm_creativeid+"&utm_ad_name="+utm_ad_name+"&utm_keyword="+utm_keyword+"&utm_website="+utm_website+"&utm_geo="+utm_geo+"&utm_type="+utm_type+"&sds="+sds+"&txt_OTP="+txt_OTP+"&utm_adgroup="+utm_adgroup+"&hdnLid="+hdnLid+"&whatsapp="+whatsapp+"&publisher_id="+publisher_id,
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-"+form_id).attr('disabled'); 
              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
//                                jsonObj = JSON.parse(response);
                              
//                                jQuery(".message-box-" + form_id).html(response.message).delay(5000).fadeOut();
//                                jQuery(".message-box-" + form_id).show(); 
//                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  
//                               jQuery("#"+form_id+" .form-control").val("");  
                 
                 
                  var resultOtp = response;
                $('#hdnLid').val(resultOtp.lId);
                $('#cmdreset').hide();
                $('#cmdsave').removeAttr('disabled');
                $('#txt_name').prop('readonly', true);
                $('#txt_telephoneno').prop('readonly', true);
                $('#txt_email').prop('readonly', true);
                $('#txt_cityFrom').prop('readonly', true);
//                var txtOPT = $('#txt_OTP').val('');
//                console.log(resultOtp.msg);
                if(resultOtp.mssg=='SMS' ||  resultOtp.lId==''){
                   window.location.href = "<?php echo e(url('thank-you')); ?>"; 
                }else{
                    if(resultOtp.msg=='OTP success'){
                        //window.location.href = 'https://www.fenesta.com/beta/thanks-new-mobile-display-otp.php';
                        window.location.href = "<?php echo e(url('thank-you')); ?>";
                        
                    }else if(resultOtp.msg=='OTP is sent successfully!'){
                        $('#otpMsgSuccs').text('OTP is sent successfully!');
                        $('#home').hide();
                        $('#otp').show();
                        //$( "#dialog" ).dialog();
                      // 	var modal = document.getElementById('myModal');
                      // 	modal.style.display = "block";
                        $('#cmdsave').hide();
                    }else if(txtOPT == ''){
                                $('#crctOtpTxtsent').hide();
                                $('#crctOtpTxt').hide();
                                alert('Please enter correct OTP.');
                            }else if(resultOtp.msg=='duplicate'){
                                $('#crctOtpTxtsent').hide();
                                $('#crctOtpTxt').hide();
                            alert('Your Query already exists with us. One of our executive will get in touch with you shortly.');
                    }else{
                            alert('Please enter correct OTP.');
                            $('#txt_OTP').val('');
                            $('#cmdsave').removeAttr('disabled');
                    }
                }
               
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
      name: {
                lettersonly: true,
                required: true,
            },
      address: {
                addressonly: true,
                required: true,
            },
      state:'required',
      message: {
            lettersonly: true,
            required: true,
        },
      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
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
      
    name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      address:{
        required: "Please enter address",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
      message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
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
       
//       grecaptcha.render('g-recaptcha', {
//          'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
//        });
       
     
       
       var CaptchaCallback1 = function() {
    if ( $('#complaint_recaptcha').length ) {
        grecaptcha.render(document.getElementById('complaint_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
      
       
         if(grecaptcha.getResponse(0) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
             
         }else{
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
         $(this).prop("disabled", true); 
       // ajax
             jQuery.ajax({ 
             url: $("#complaint-form").attr("action"),
             type: 'POST',
             data: $("#complaint-form").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-complaint-form").attr('disabled','disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                               jQuery("#complaint-form .form-control").val("");  
                                jQuery(".message-box-cc").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-cc").show(); 
                                jQuery(".submitcc").removeAttr('disabled'); 
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
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
//            grecaptcha.reset();
            return false;
         }
   }
   
    });
 
 $('.submitcca').click(function(r){
   r.preventDefault();
   $('#complaint-forma').validate({
    rules:{
      name: {
                lettersonly: true,
                required: true,
            },
      address: {
            addressonly: true,
            required: true,
        },
      state:'required',
      message: {
            lettersonly: true,
            required: true,
        },

      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
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
     name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
       address:{
        required: "Please enter address",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
       message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
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
       
//         alert($('#reachhead_recaptcha').length);
       
             var CaptchaCallback12 = function() {
    if ( $('#reachhead_recaptcha').length ) {
        grecaptcha.render(document.getElementById('reachhead_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
       
       
         if(grecaptcha.getResponse(1) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
             
         }else{
             
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
         $(this).prop("disabled", true); 
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
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
               
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
//            grecaptcha.reset();
            return false;
   }
   }
    })
 $('.submitexpert').click(function(r){
   r.preventDefault();
   $('#consult-form').validate({
    rules:{
        name: {
                lettersonly: true,
                required: true,
            },
      type:'required',
      state:'required',
       message: {
            lettersonly: true,
            required: true,
        },

 
      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
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
        name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      type:'Please select Type',
      state:'Please enter state',
        message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
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
        
             var CaptchaCallback = function() {
    if ( $('#consult_recaptcha').length ) {
        grecaptcha.render(document.getElementById('consult_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
       
         if(grecaptcha.getResponse(2) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
         }else{
             
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
         $(this).prop("disabled", true); 
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
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
               
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
//            grecaptcha.reset();
            return false;
   }
   }
    })
    
    
</script>
    <script>
	$('.hardware-list').owlCarousel({
        loop:false,
        nav:true,
        dots:false,
        margin:0,
        responsive:{
            0:{
                items:1,
				nav:false,
				stagePadding: 35,
				loop: true
            },
            768:{
                items:3
            },
			1024:{
                items:4
            },
            1366:{
                items:4
            }
        }
    });
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
 
        
        $("#suggesstion-box").hide();
                $(document).ready(function(){
            $("#search-box").keyup(function(){
                
                 $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
                if($(this).val()==''){
                    $("#suggesstion-box").hide();
                    return false;
                }
                $.ajax({
                type: "POST",
                url: "<?php echo e(url('/search-auto-data')); ?>",
//                data:'keyword='+$(this).val(),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "keyword": $(this).val()
                },
                dataType:'html',
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(<?php echo e(url('images/LoaderIcon.gif')); ?>) no-repeat 165px");
                },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                }
                });
            });
        });
        //To select country name
//        function selectCountry(val) {
//        $("#search-box").val(val);
//        $("#suggesstion-box").hide();
//        }

        
        function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 160;
    // Text to show when text is collapsed
    var readMoreTxt = " ... Read More";
    // Text to show when text is expanded
    var readLessTxt = " Read Less";


    //Traverse all selectors with this class and manupulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }

    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});
     
        
        
$('#cmdOtp').click(function(){
    
    if($('#whatsapp').val()==''){
        alert("Please select the checkbox !");
        return false;
    }
    
        var _token = $('input[name=_token]').val();
		var name = document.getElementById('username').value;
		var txt_OTP = $('#txt_OTP').val();
		var txtNumber = $('#userphone').val();
		var __VIEWSTATE = $('#__VIEWSTATE').val();
		var __VIEWSTATEGENERATOR = $('#__VIEWSTATEGENERATOR').val();
		var email_type_pro = $('#email_type_pro').val();
		var state_tags = $('#userstate').val();
        var tagss = $('#usercity').val();
        var txt_cityFrom = $('#usercity').val();
		var utm_source = $('#utm_source').val();
		var lp_url = $('#lp_url').val();
		var utm_medium = $('#utm_medium').val();
		var utm_campaignname = $('#utm_campaignname').val();
		var utm_campaignid = $('#utm_campaignid').val();
		var utm_adgroupname = $('#utm_adgroupname').val();
		var utm_adgroupid = $('#utm_adgroupid').val();
		var utm_keyword = $('#utm_keyword').val();
		var utm_website = $('#utm_website').val();
		var utm_geo = $('#utm_geo').val();
		var utm_type = $('#utm_type').val();
		var whatsapp = $('#whatsapp').val();
		var publisher_id = $('#publisher_id').val();
		var utm_adgroup = $('#utm_adgroup').val();
		var utm_creativeid = $('#utm_creativeid').val();
		var utm_ad_name = $('#utm_ad_name').val();
		var sds = 'hghd';
		var hdnLid = $('#hdnLid').val();
		var txt_email = $('#email').val();
	    if(utm_source == 'Netcore' || utm_source == 'netcore'){
				    publisher_id = $('#utmpublisher_id').val();
				}
		if(state_tags == ''){
		    	state_tags = $('#statetagsSecond').val();
		}
		$.ajax({
			url: "<?php echo e(url('/verify-otp')); ?>",
			type: 'post', 
			data: "txt_name="+name+"&_token="+_token+"&txt_telephoneno="+txtNumber+"&txt_email="+txt_email+"&__VIEWSTATE="+__VIEWSTATE+"&__VIEWSTATEGENERATOR="+__VIEWSTATEGENERATOR+"&email_type_pro="+email_type_pro+"&state_tags="+state_tags+"&ddlcity="+tagss+"&txt_cityFrom="+txt_cityFrom+"&lp_url="+lp_url+"&utm_source="+utm_source+"&utm_medium="+utm_medium+"&utm_campaignname="+utm_campaignname+"&utm_campaignid="+utm_campaignid+"&utm_adgroupname="+utm_adgroupname+"&utm_creativeid="+utm_creativeid+"&utm_ad_name="+utm_ad_name+"&utm_adgroupid="+utm_adgroupid+"&utm_keyword="+utm_keyword+"&utm_website="+utm_website+"&utm_geo="+utm_geo+"&utm_type="+utm_type+"&sds="+sds+"&txt_OTP="+txt_OTP+"&utm_adgroup="+utm_adgroup+"&hdnLid="+hdnLid+"&whatsapp="+whatsapp+"&publisher_id="+publisher_id,
			success: function(response){
				var resultOtp = response;
//				var resultOtp = JSON.parse(response);
				console.log(resultOtp);
				if(resultOtp.msg=='OTP success'){
					window.location.href = "<?php echo e(url('thank-you')); ?>";
				}else if(resultOtp.msg=='OTP is incorrect'){
                    $('#crctOtpTxtsent').hide();
					$('#crctOtpTxt').html(resultOtp.msg).show();
				}
			}
		});
	});
	$('#cmdOtpResend').click(function(){
        
		var hdnLid = $('#hdnLid').val();
		var txtNumber = $('#userphone').val();
        var _token =  "<?php echo e(csrf_token()); ?>";
		$.ajax({
			url: "<?php echo e(url('/resend-otp')); ?>",
			type: 'post',
			data: "&hdnLidRsnd="+hdnLid+"&txtNumberRsnd="+txtNumber+"&_token="+_token,
			success: function(response){
                var resendOtp = response;
//                var resendOtp = JSON.parse(response);
                $('#crctOtpTxt').hide();
                $('#crctOtpTxtsent').html(resendOtp.msg).show();
				console.log(response);
			}
		});
	});
        
</script>
</body>
</html>
<?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/layouts/enqurytemplate_page.blade.php ENDPATH**/ ?>