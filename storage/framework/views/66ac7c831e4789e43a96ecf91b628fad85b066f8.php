
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
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
          <div class="heading"><div class="container-fluid">        <?php if(!empty($pageData->page_title)): ?>
          <h1>   <?php echo $pageData->page_title; ?></h1>
        <?php else: ?>
          <h1>  Customer Reviews </h1>
        <?php endif; ?>
           </div></div> 
      </div>

      <div class="customer-rev-tab-sec tab-sec">
        <div class="container-fluid">
          <div class="get-fix">
            <ul class="customer-rev-link tab-link">
              <li><a href="#retail" class="active">Retail</a></li>
              <li><a href="#projects">Projects</a></li>          
            </ul>
          </div>
        </div>
        <div class="customer-rev-tab-list tab-list">
          <div class="container-fluid">
            <div class="customer-rev-tab-box" id="retail" style="display: block;">
              <div class="retail inner-div">
                <h4>Customer Appreciation on Retail</h4>
                <div class="customer-rev-list retail-slider">
                    


                    <?php $io=0; $datadelay=200; ?>
                    <?php $__currentLoopData = $retailcus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rcus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="item" data-aos="fade-right" <?php if($io>1): ?> data-aos-delay=<?php echo e($datadelay); ?> <?php endif; ?> >
                    <div class="heading">
                      <div class="image"><img src="<?php echo asset("images/appreciation/$rcus->image"); ?>"><span></span></div>
                      <div class="right">
                        <div class="name"><?php echo e($rcus->name); ?></div>
                        <div class="date"> <?php echo e(date("d,M Y",strtotime($rcus->created_at))); ?>  <img src="<?php echo e(asset('images/site_images/images/globe.png')); ?>"></div>                      
                      </div>
                    </div>
                    <?php echo $rcus->description; ?>

                  </div>
                    <?php
                    $io=$io+1;
                    $datadelay=$datadelay+200;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
                </div>
                <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a></div>
              </div>
              <div class="testimonial inner-div">
                <h4>Testimonials on Retail</h4>
                <div class="customer-rev-list testimonials-slider">
                     <?php $iot=0; $datadelayt=200; ?>
                    <?php $__currentLoopData = $reatiltestimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item" data-aos="fade-right"  <?php if($iot>1): ?> data-aos-delay=<?php echo e($datadelayt); ?> <?php endif; ?>  >
                    <div class="image">
                      <img src="<?php echo asset("images/testimonials/reference/$testimonial->reference_image"); ?>">
                      <span class="play" data-video-id="<?php echo e($testimonial->youtube_url); ?>"><img src="<?php echo e(asset('images/site_images/play.png')); ?>"></span>
                    </div>
                    <div class="desc">
                      <div class="pic"><img src="<?php echo asset("images/testimonials/user/$testimonial->user_image"); ?>"></div>
                      <div class="right">
                        <h6><?php echo e($testimonial->name); ?></h6>
                        <p><?php echo e($testimonial->city); ?></p>
                      </div>
                    </div>
                  </div> 
                      <?php
                    $iot=$iot+1;
                    $datadelayt=$datadelayt+200;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                </div>
                <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a></div>
              </div>
            </div>
            <div class="customer-rev-tab-box" id="projects">
              <div class="project inner-div">
                <h4>Customer Appreciation on Projects</h4>
                <div class="customer-rev-list retail-slider">
                     <?php $io1=0; $datadelay1=200; ?>
                    <?php $__currentLoopData = $projectcus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rcus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="item" data-aos="fade-right" <?php if($io1>1): ?> data-aos-delay=<?php echo e($datadelay1); ?> <?php endif; ?> >
                    <div class="heading">
                      <div class="image"><img src="<?php echo asset("images/appreciation/$rcus->image"); ?>"><span></span></div>
                      <div class="right">
                        <div class="name"><?php echo e($rcus->name); ?></div>
                        <div class="date"><?php echo e(date("d,M Y",strtotime($rcus->created_at))); ?> <img src="<?php echo e(asset('images/site_images/images/globe.png')); ?>"></div>                      
                      </div>
                    </div>
                    <?php echo $rcus->description; ?>

                  </div>
                    <?php
                    $io1=$io1+1;
                    $datadelay1=$datadelay1+200;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
                    
                </div>
                <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a></div>
              </div>  
              <div class="testimonial inner-div">
                <h4>Testimonials on Projects</h4>
                <div class="customer-rev-list testimonials-slider">
                    
                    <?php $iot1=0; $datadelayt1=200; ?>
                    <?php $__currentLoopData = $projecttestimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item" data-aos="fade-right"  <?php if($iot1>1): ?> data-aos-delay=<?php echo e($datadelayt1); ?> <?php endif; ?>  >
                    <div class="image">
                      <img src="<?php echo asset("images/testimonials/reference/$testimonial->reference_image"); ?>">
                      <span class="play" data-video-id="<?php echo e($testimonial->youtube_url); ?>"><img src="<?php echo e(asset('images/site_images/play.png')); ?>"></span>
                    </div>
                    <div class="desc">
                      <div class="pic"><img src="<?php echo asset("images/testimonials/user/$testimonial->user_image"); ?>"></div>
                      <div class="right">
                        <h6><?php echo e($testimonial->name); ?></h6>
                        <p><?php echo e($testimonial->city); ?></p>
                      </div>
                    </div>
                  </div> 
                      <?php
                    $iot1=$iot1+1;
                    $datadelayt1=$datadelayt1+200;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    
                    
                </div>
                <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a></div>
              </div>            
            </div>
          </div>
        </div>
      </div>   
  
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           <?php if(!empty($pageData->page_description)): ?>
            <?php echo $pageData->page_description; ?>

        
        <?php endif; ?>
          </div>
        </div>
      </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/customer_reviews.blade.php ENDPATH**/ ?>