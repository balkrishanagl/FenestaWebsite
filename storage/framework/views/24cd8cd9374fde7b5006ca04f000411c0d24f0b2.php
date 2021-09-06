
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
          <h1> Trims </h1>
        <?php endif; ?>
           </div></div> 
      </div>
            
      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
                <?php if(!empty($content)): ?>
                    <?php echo $content; ?>

                <?php endif; ?>
          </div>
      
          <div class="explore-more"><a href="javascript:;">Explore More <span><img src="<?php echo e(asset("images/site_images/images/about/explore-more.png")); ?>"></span></a></div>
        </div>
      </div>
      <div class="trim-option-sec mt50">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up"><?php echo $pageData->page_title; ?></h4>
          <div class="trim-option-slider">
               <?php  $kk = 0;  $i_k=0; ?>
                      <?php $__currentLoopData = $trims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkey => $ccoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="item" data-aos="fade-right" <?php if($kk>0): ?> data-aos-delay="<?php echo e($i_k=$i_k+200); ?>" <?php endif; ?>>
              <div class="image"><img src="<?php echo e(asset("images/trim/$ccoo->image")); ?>"></div>
              <div class="content">
                <div class="title"><?php echo e($ccoo->title); ?></div>
               <?php echo $ccoo->description; ?>

              </div>
            </div>
                <?php $kk=$kk+1;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
      <div class="trim-pencil-sec mt60">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up"><?php echo e($Multitrims[0]->title); ?></h4>
          <div class="trim-pencil-box">
                <?php  $kk1 = 0;  $i_k1=0; ?>
                      <?php $__currentLoopData = explode(',',$Multitrims[0]->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkey1 => $ccoo1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" data-aos="fade-right"  <?php if($kk1>0): ?> data-aos-delay="<?php echo e($i_k1=$i_k1+200); ?>" <?php endif; ?>>
              <img src="<?php echo e(asset("images/trim/$ccoo1")); ?>">
            </div>
               <?php $kk1=$kk1+1;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
          </div>
          <div class="pencil-info" data-aos="fade-up">
            <?php echo $Multitrims[0]->description; ?>

          </div>
        </div>
      </div>
  
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/trims.blade.php ENDPATH**/ ?>