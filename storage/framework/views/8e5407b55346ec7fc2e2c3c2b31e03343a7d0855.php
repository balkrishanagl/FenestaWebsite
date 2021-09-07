<head>

    <?php if(!empty($pageData[0]->meta_title)): ?>
      <title><?php echo e($pageData[0]->meta_title); ?></title>
    <?php else: ?>
      <title>Fenesta</title>
    <?php endif; ?>
      <meta charset="utf-8">
        <?php if(!empty($pageData[0]->meta_description)): ?>
         <meta name="description" content="<?php echo e($pageData[0]->meta_description); ?>">
        <?php else: ?>
        <meta name="description" content="">
        <?php endif; ?>
      
        <?php if(!empty($pageData[0]->meta_keyword)): ?>
         <meta name="keywords" content="<?php echo e($pageData[0]->meta_keyword); ?>" />
        <?php else: ?>
        <meta name="keywords" content="" />
        <?php endif; ?>
      
        <?php if(!empty($pageData[0]->og_title)): ?>
         <meta property="og:title" content="<?php echo e($pageData[0]->og_title); ?>" />
        <?php else: ?>
        <meta property="og:title" content="" />
        <?php endif; ?>
      
        <?php if(!empty($pageData[0]->og_desc)): ?>
         <meta property="og:description" 
          content="<?php echo e($pageData[0]->og_desc); ?>" />
        <?php else: ?>
        <meta property="og:description" 
          content="" />
        <?php endif; ?>
        <?php if(!empty($pageData[0]->og_image)): ?>
         <meta property="og:image" 
          content="<?php echo e(asset('images').'/'.$pageData[0]->og_image); ?>" />
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
  <link rel="stylesheet" href="<?php echo e(asset('css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/animation.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common_new.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
      <style>
          
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
 
</head><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/head.blade.php ENDPATH**/ ?>