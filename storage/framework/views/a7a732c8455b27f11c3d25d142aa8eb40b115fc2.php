
<?php $__env->startSection('content'); ?>

        <div class="privacy-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
  
       <?php if(empty($banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?></h1>
        <?php else: ?>
          <h1>  Page </h1>
        <?php endif; ?>
           </div></div> 
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
             <div class="bg-grey">
                <?php if(!empty($content)): ?>
                    <?php echo $content; ?>

                <?php endif; ?>
          </div>
        </div>
      </div>

   
     


</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cms_page.blade.php ENDPATH**/ ?>