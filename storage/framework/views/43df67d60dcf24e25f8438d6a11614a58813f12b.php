
<?php $__env->startSection('content'); ?>

<div class="window-handle-sec">

<?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/internal-door/internal-door-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/internal-door/internal-door-mobile-banner1.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/internal-door/internal-door-banner.jpg')); ?>">
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
          <h1>  About DCM Shriram </h1>
        <?php endif; ?>
           </div></div> 
      </div>

      <div class="inner-page-content" data-aos="fade-up">
        <div class="container-fluid">
        <?php if($content): ?>
              <?php echo $content; ?>

            <?php endif; ?>
        </div>
      </div>
      <div class="buiseness-portfolio-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Business Portfolio</h4>
          <div class="portfolio-list">
                <?php $ik=0; $it=0; ?>
                <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="item" data-aos="fade-right" <?php if($ik<4): ?> data-aos-delay="<?php echo e($it=$it+200); ?>" <?php endif; ?>>
              <div class="image"><img src="<?php echo asset("images/about/$abv->image"); ?>"></div>
              <h6><?php echo e($abv->title); ?></h6>
              <ul>
                <?php echo $abv->description; ?>

              </ul>
            </div>
              <?php  $ik= $ik+1; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    
      <div class="infrastructure-sec" id="infrastructure-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Our Infrastructure</h4>
          <div class="infra-slider owl-carousel">
              <?php $ik=0; $it=0; ?>
              <?php $__currentLoopData = $about_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="item" data-aos="fade-right" <?php if($ik<4): ?> data-aos-delay="<?php echo e($it=$it+200); ?>" <?php endif; ?>>
              <div class="image"><img src="<?php echo e(asset("images/about/$abv->image")); ?>"></div>
              <div class="content">
                <h6><?php echo e($abv->title); ?></h6>
               <?php echo $abv->description; ?>

              </div>
            </div>
              <?php  $ik= $ik+1; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

      <div class="value-sec" id="ourvalue">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading">
              <h4 class="text-center" data-aos="fade-up">Our Values</h4>
              <p class="text-center" data-aos="fade-up">
                  <?php if($about): ?>
                  <?php echo e(strip_tags($about)); ?>

                  <?php endif; ?></p>
            </div>
            <div class="value-list">
                <?php $ik=0; $it=0; ?>
              <?php $__currentLoopData = $about_infa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item" data-aos="fade-right" data-aos-delay="<?php echo e($it=$it+200); ?>">
                <div class="value-name"><span><?php echo e(substr($abv->title,0,1)); ?></span></div>
                <div class="image"><img src="<?php echo e(asset("images/about/$abv->image")); ?>"></div>
                <div class="content">
                  <h6><?php echo e($abv->title); ?></h6>
                  <?php echo $abv->description; ?>

                </div>
              </div>
               
             
              <?php  $ik= $ik+1; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="leadership-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Our Leadership</h4>
          <div class="leadership-list">
                <?php $i=0; $ad=0; ?>
                <?php $__currentLoopData = $leadership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item" data-aos="fade-right" <?php if($i>4): ?> data-aos-delay="<?php echo e($ad=$ad+200); ?>" <?php endif; ?>>
              <div class="image"><img src="<?php echo asset("images/about/$aval->image"); ?>"></div>
              <div class="content">
                <h6><?php echo e($aval->title); ?></h6>
               <?php echo $aval->description; ?>            
              </div>
            </div> 
               
                <?php $i=$i+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="bottom-strip">
             <?php if($about): ?>
              <?php echo $about; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>
     

   
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/about_dcm.blade.php ENDPATH**/ ?>