
<?php $__env->startSection('content'); ?>

        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   <style> 
      .switch a{
          bottom:150px;
      }
      .section .owl-nav button, .section .blue-btn {
    opacity: 1;
}
  </style> 
    
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
          <h1>  Color & Finish </h1>
        <?php endif; ?>
           </div></div> 
    <?php if($ptype=='Window'): ?>
        <div class="switch"><a href="<?php echo e(url('/door')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    <?php else: ?>
    
        <div class="switch"><a href="<?php echo e(url('/window')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Windows</a></div>
    
    <?php endif; ?>
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
      <div class="color-finish-sec mt50 tab-sec">
        <div class="container-fluid">
          <h4 class="text-center get-anim" data-aos="fade-up"><?php echo $pageData->page_title; ?></h4>
          <div class="get-fix">
            <ul class="clolor-finish-link tab-link">
              <li><a href="#aluminium" class="active">Aluminium</a></li>
              <li><a href="#upvc">UPVC</a></li>          
            </ul>
          </div>
        </div>
     
          
          
        <div class="color-finish-list tab-list">
          <div class="container-fluid">
            <h4 class="text-center">Colors & Finish</h4>
            <div class="color-finish-box" id="aluminium" style="display: block;">
              <div class="aluminium-box">
                <div class="left">
                  <div class="color-list">
                    <?php  $kk = 0;  $i_k=0; ?>
                      <?php $__currentLoopData = $coloroptionsalm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkey => $ccoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php  if($kkey%4==0){ $kk = 0;  $i_k=0; } ?>
                    <div class="item" data-aos="fade-right" <?php if($kk>0): ?> data-aos-delay="<?php echo e($i_k=$i_k+200); ?>" <?php endif; ?> >
                      <div class="image"><span><img src="<?php echo e(asset("images/coloroption/$ccoo->image")); ?>"></span></div>
                      <h6><?php echo e($ccoo->title); ?></h6>
                    </div>
                      <?php $kk=$kk+1;  ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="right">
                  <div class="right-slider owl-carousel">
                       <?php $simg = explode(',',$ccoo->slider_images); ?>
                        <?php $__currentLoopData = $simg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-aos="zoom-in">
                      <img src="<?php echo e(asset("images/coloroption/$sv")); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>              
              </div>     
            </div>
            <div class="color-finish-box" id="upvc">
               <div class="aluminium-box">
                <div class="left">
                  <div class="color-list">
                      
                      <?php  $kk = 0;  $i_k=0; ?>
                      <?php $__currentLoopData = $coloroptionsupvc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kkey => $ccoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php  if($kkey%4==0){ $kk = 0;  $i_k=0; } ?>
                    <div class="item" data-aos="fade-right" <?php if($kk>0): ?> data-aos-delay="<?php echo e($i_k=$i_k+200); ?>" <?php endif; ?> >
                      <div class="image"><span><img src="<?php echo e(asset("images/coloroption/$ccoo->image")); ?>"></span></div>
                      <h6><?php echo e($ccoo->title); ?></h6>
                    </div>
                      <?php $kk=$kk+1;  ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                  </div>
                </div>
                <div class="right">
                  <div class="right-slider owl-carousel">
                     <?php $simg = explode(',',$ccoo->slider_images); ?>
                        <?php $__currentLoopData = $simg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-aos="zoom-in">
                      <img src="<?php echo e(asset("images/coloroption/$sv")); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>              
              </div>    
            </div>
            
          </div>
        </div>
          
          
      </div> 
  
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/color_finish.blade.php ENDPATH**/ ?>