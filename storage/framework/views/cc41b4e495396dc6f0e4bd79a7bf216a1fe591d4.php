
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
?>
        <div class="window-handle-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
  <style> 
      .switch a{
          bottom:150px;
      }
  </style> 
  
       <?php if(empty($banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/site_images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?></h1>
        <?php else: ?>
          <h1>  Page </h1>
        <?php endif; ?>
           </div></div> 
    
    
        <div class="switch"><a href="<?php echo e(url('/doors')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    
      </div>

    
      <div class="inner-page-content">
        <div class="container-fluid">
          <p data-aos="fade-up"> <?php if(!empty($content)): ?>
            <?php echo $content; ?>

            <?php endif; ?></p>
        </div>
      </div>
      <div class="product-by-design-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Products - By Design</h4>
          <div class="product-design-box">
              
            <?php $__currentLoopData = $windowproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php
              $windowtypes = WindowType::where('is_delete',0)->where('product',$wp->id)->where('product_type','Window')->get();
              $wkki=0;
              $type_w = strtolower($wp->type);
              $slug_w = strtolower($wp->slug);
              ?>
            <div class="box" data-aos="zoom-in">
              <a href="<?php echo e(url("/$type_w/$slug_w")); ?>">  <h3><?php echo e($wp->title); ?></h3></a>
              <div class="image"><a href="<?php echo e(url("/$type_w/$slug_w")); ?>"><img src="<?php echo asset("images/windowdoortype/$wp->fullimage"); ?>"></a></div>
              <div class="product-design-slider owl-carousel common-design-slider">
                  <?php $__currentLoopData = $windowtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkk => $wtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-aos="fade-right" <?php if($wkk>0): ?>  data-aos-delay="<?php echo e($wkki+200); ?>" <?php endif; ?> >                  
                  <span class="icon"><img src="<?php echo e(asset('images/windowtype/'.$wtt->image)); ?>"></span><?php echo e($wtt->title); ?>

                </div>
                  <?php
                  $wkki = $wkki+200;
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      
          </div>
        </div>
      </div>

      <div class="product-by-appl-sec">
        <h4 class="text-center" data-aos="fade-up">Products - By Application</h4>
        <div class="image-box" data-aos="zoom-in">
          <picture>
            <source srcset="images/site_images/window/product-application-banner.jpg" media="(min-width:768px)">
            <source srcset="images/site_images/window/product-application-banner.jpg" media="(min-width:320px)">
            <img src="images/site_images/window/product-application-banner.jpg">  
          </picture> 
        </div>
        <div class="container-fluid">
          <div class="product-by-appl-tab" data-aos="fade-up">
            <ul class="application-tab-list">
               <?php $__currentLoopData = $byapplication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bak => $bav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <li><a href="#<?php echo e(str_replace(' ', '', $bav->title)); ?>" <?php if($bak==0): ?> class="active" <?php endif; ?> ><?php echo e($bav->title); ?></a></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="product-by-appl-tab-list">
                <?php $__currentLoopData = $byapplication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bak => $bav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <div class="product-by-appl-tab-box" id="<?php echo e(str_replace(' ', '', $bav->title)); ?>" <?php if($bak==0): ?>  style="display: block;" <?php endif; ?>  >
                <h3 class="active"><?php echo e($bav->title); ?></h3>
                <div class="content" <?php if($bak==0): ?> style="display: block;" <?php endif; ?>  >
                  <?php echo $bav->content; ?>

                </div>
              </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            
            </div>
          </div>
        </div>
      </div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta <?php echo $title; ?></h4>
          <div class="content">
            <?php if(!empty($about)): ?>
            <?php echo $about; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/windows/index.blade.php ENDPATH**/ ?>