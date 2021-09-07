
<?php $__env->startSection('content'); ?>

        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
          <div class="heading"><div class="container-fluid">        <?php if(!empty($pageData->page_title)): ?>
          <h1>   <?php echo $pageData->page_title; ?></h1>
        <?php else: ?>
          <h1>  Great Facade </h1>
        <?php endif; ?>
           </div></div> 
      </div>

      <div class="facade-client-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
             <?php if(!empty($pageData->page_description)): ?>
                <?php echo $pageData->page_description; ?>


            <?php endif; ?>
            <div class="facade-client-slider owl-carousel">
                  <?php  $kk = 0;  $i_k=0; ?>
                      <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkey => $ccoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item" data-aos="fade-right" <?php if($kk>0): ?> data-aos-delay="<?php echo e($i_k=$i_k+200); ?>" <?php endif; ?>>
                <div class="image">
                  <img src="<?php echo asset("images/greatfacade/$ccoo->reference_image"); ?>">
                  <span class="play" data-video-id="<?php echo e($ccoo->youtube_url); ?>"><img src="<?php echo asset("images/site_images/images/play.png"); ?>"></span>
                </div>
                <div class="desc">
                  <h6><?php echo e($ccoo->title); ?></h6>
                    <p class="addReadMore showlesscontent"> <?php echo e(strip_tags($ccoo->description)); ?> </p>
                </div>
              </div>
                <?php
                if($kkey>3){ $kk=0; }
                ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
          </div>
        </div>
      </div>

   
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/great_facade.blade.php ENDPATH**/ ?>