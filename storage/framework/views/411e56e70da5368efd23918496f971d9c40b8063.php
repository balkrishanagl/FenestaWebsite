
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
          <h1>Style Benefits</h1>
        <?php endif; ?>
           </div></div> 
      </div>

        <div class="accreditation-sec pdt45 aos-init aos-animate" data-aos="fade-up">
        <div class="container-fluid">
           <?php if($sub_text!=''): ?>
                       <?php echo $sub_text; ?>

                    <?php endif; ?>
                </div>
        </div>
<div class="wide-design-palette">
          
             
          <div class="inner-box">  
            <div class="left aos-init aos-animate" data-aos="zoom-in"><img src="<?php echo e(asset('images/site_images/images/why-fenesta/design-pallete.jpg')); ?>"></div>          
            <div class="right">              
              <div class="top">
                <div class="inner-wrap">
                    <?php if($content!=''): ?>
                       <?php echo $content; ?>

                    <?php endif; ?>
                  <div class="pallete-list">
                    <div class="item aos-init aos-animate" data-aos="fade-right">
                      <span class="image"><img src="<?php echo e(asset('images/site_images/images/why-fenesta/palette1.png')); ?>"></span>
                      <h6>More than <br> <strong>700 window</strong> styles</h6>
                    </div>
                    <div class="item aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                      <span class="image"><img src="<?php echo e(asset('images/site_images/images/why-fenesta/palette2.png')); ?>"></span>
                      <h6>International <br> Designs</h6>
                    </div>
                    <div class="item aos-init" data-aos="fade-right">
                      <span class="image"><img src="<?php echo e(asset('images/site_images/images/why-fenesta/palette3.png')); ?>"></span>
                      <h6>A window <br> for every room</h6>
                    </div>
                    <div class="item aos-init" data-aos="fade-right" data-aos-delay="200">
                      <span class="image"><img src="<?php echo e(asset('images/site_images/images/why-fenesta/palette2.png')); ?>"></span>
                      <h6>Available in <br> variety of colors</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bottom">
                <div class="inner-wrap">
                  <h4>Choose Your Product Type</h4>
                  <div class="btn-grp">
                    <a href="<?php echo e(url('/window')); ?>">
                      <span><img src="<?php echo e(asset('images/site_images/images/why-fenesta/style-win-icon.png')); ?>"></span> Windows
                    </a>
                    <a href="<?php echo e(url('/door')); ?>">
                      <span><img src="<?php echo e(asset('images/site_images/images/why-fenesta/style-door-icon.png')); ?>"></span> Doors
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><div class="science-work-sec">
        <div class="container-fluid">
          <div class="inner-box text-center">
              <?php if($content2!=''): ?>
              <?php echo $content2; ?>

              <?php endif; ?>
           
            <div class="science-work-wrap">
              <div class="science-work-list left">
                  
                  <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ki<=4): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                  <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"><h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6> </a>
                  </div>
                <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $turt = $featurebenefit[0]->image; ?>
                </div>
              <div class="middle aos-init" data-aos="zoom-in">
                <div class="center-image"><img class="<?php echo e($turt); ?>" src="<?php echo e(asset("images/featurebenefit/image/$turt")); ?>"></div>
                
              </div>
              <div class="science-work-list right">
          
               
                  <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ki>=5 and $ki<10): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                 <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"> <h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6></a>
                  </div>
                <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>

              <div class="science-work-list science-work-list-mob">
                   <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($ki<10): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>">  <h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6></a>
                  </div>
               
            <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                  
              </div>
            </div>
          </div>
        </div>
      </div>
   
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
     
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/style_benefits.blade.php ENDPATH**/ ?>