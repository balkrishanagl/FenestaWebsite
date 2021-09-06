
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
?>
        <div class="window-handle-sec">
            
     <style> 
      .switch a{
          bottom:150px;
      }
   
  </style> 
                 
    <?php if($ptype=='Window'): ?>
        <div class="switch"><a href="<?php echo e(url('/door')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    <?php else: ?>
    
        <div class="switch"><a href="<?php echo e(url('/window')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Windows</a></div>
    
    <?php endif; ?>
        <div class=" upvc-window-sec">
            
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
  
  
       <?php if(empty($banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/site_images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/windowdoortype/'.$banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/windowdoortype/'.$banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/windowdoortype/'.$banner_image)); ?>">
        </picture> 
        <?php endif; ?> 
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?></h1>
        <?php else: ?>
          <h1> <?php echo e($ptype); ?>   </h1>
        <?php endif; ?>
           </div></div> 
    
    
      </div>

      <div class="inner-page-content pdt45"><?php if($short_description): ?>
        <div class="container-fluid">
        <div class="textreadmore">
            <?php echo $short_description; ?>

        </div>
           <p class="buttonreadmore">Read More</p>
          <?php endif; ?> 
      </div>
      </div>
      <div class="product-style-sec pdt35">
        <div class="container-fluid">          
          <div class="product-style-item">
            <h4 class="text-center" data-aos="fade-up">Product Styles</h4>
            <div class="product-style-slider owl-carousel">
                <?php $lowerp_type = strtolower($ptype); $t_i=0; $dt_i=0; ?>
                <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tk => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                 <div class="item" data-aos="fade-right" <?php if($t_i>0): ?> data-aos-delay="<?php echo e($dt_i = $dt_i+200); ?>"  <?php endif; ?> >
                <div class="image">
                    <?php if($ptype=='Window'): ?>
                         <img alt="<?php echo e($type->title); ?>" src="<?php echo e(asset("images/windowtype/$type->thumb_image")); ?>">
                    <?php else: ?>
                        <img alt="<?php echo e($type->title); ?>" src="<?php echo e(asset("images/doortype/$type->thumb_image")); ?>">
                    <?php endif; ?>
                   
                     
                </div>
                <div class="desc">                  
                  <div class="name"><span class="icon">
                      <?php if($ptype=='Window'): ?>
                         <img alt="<?php echo e($type->title); ?>" src="<?php echo e(asset("images/windowtype/$type->image")); ?>">
                    <?php else: ?>
                        <img alt="<?php echo e($type->title); ?>" src="<?php echo e(asset("images/doortype/$type->image")); ?>">
                    <?php endif; ?>
                    
                      </span><?php echo e($type->title); ?></div>
                  <a href="<?php echo e(url("/$lowerp_type/$slug/$type->slug")); ?>" class="blue-btn">Explore</a>
                </div>
              </div>
                <?php 
                 $t_i=$t_i+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-sec pdt45">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Features & Benefits</h4>
            <div class="content text-center" data-aos="fade-up" >
             <?php echo $feature_benefits; ?>

            </div>
            <div class="feature-slider owl-carousel">
                <?php $f_t=0; ?>
               <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $fb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <div class="item" data-aos="fade-right" <?php if($kk>0 || $kk<4): ?> data-aos-delay="<?php echo e($f_t = $f_t+200); ?>" <?php endif; ?>>
                <img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$fb->icon")); ?>">
                <span><?php echo e($fb->name); ?> </span>
              </div> 
              
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="btn-grp text-center"><a href="<?php echo e(url('/features-benefits')); ?>" class="blue-btn">Explore More</a></div>
          </div>
        </div>
      </div>
      <div class="series-option-sec mt60">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="series" data-aos="zoom-in">
              <div class="series-accord">
                <h3 class="active">Series</h3>
                <div class="content" style="display: block;">
                  <div class="inner-wrap">
                    <div class="desc">
                     <?php echo $series_content; ?>

                     <a href="<?php echo e(url('/series')); ?>" class="blue-btn">Explore</a>
                    </div>
                      <div class="image"> <a href="<?php echo e(url('/series')); ?>">
                          
                          <?php if($id==1): ?>
                          <img src="<?php echo e(asset('images/site_images/images/series/1.png')); ?>">
                            <?php elseif($id==4): ?>
                          <img src="<?php echo e(asset('images/site_images/images/series/2.png')); ?>">
                          <?php elseif($id==3): ?>
                          <img src="<?php echo e(asset('images/site_images/images/series/3.png')); ?>">
                          <?php else: ?>
                          <img src="<?php echo e(asset('images/site_images/images/series/4.png')); ?>">
                          <?php endif; ?>
                          </a>
                      
                      </div>
                  </div>
                </div>
              </div>
                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($ss->id!=4): ?>
              <div class="series-accord">
                <h3><?php echo e($ss->title); ?></h3>
                <div class="content">
                  <div class="inner-wrap">
                    <div class="desc">
                      
                        <p> <?php echo e(substr(strip_tags($ss->description), 0, 200)); ?>... </p>
                      <a href="<?php echo e(url('/series')); ?>" class="blue-btn">Explore</a>
                    </div>
                    <div class="image"><img src="<?php echo e(asset("images/series/$ss->image")); ?>"></div>
                  </div>
                </div>
              </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
              
              
            <div class="option" data-aos="zoom-in">
              <h4>Options</h4>
              <div class="option-slider-box">
                <div class="slick-option-gallery slick-slider">
                 
                  <?php $__currentLoopData = json_decode($fffoptions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $oo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                  <div class="slick-slide">
                    <img src="<?php echo e(asset("images/options/$oo->image")); ?>">
                    <div class="overlay">
                    <div class="inner">
                    <p><?php echo e($oo->title); ?></p>
                     
                        <?php if($kk=='color'): ?>
                    <a href="<?php echo e(url("/$lowerp_type/colors-finish")); ?>" class="btn" tabindex="0">Explore More</a>
                         <?php elseif($kk=='glass'): ?>
                    <a href="<?php echo e(url("/$lowerp_type/glass")); ?>" class="btn" tabindex="0">Explore More</a>
                          <?php elseif($kk=='handle'): ?>
                    <a href="<?php echo e(url("/$lowerp_type/handles")); ?>" class="btn" tabindex="0">Explore More</a>
                          <?php elseif($kk=='meshgrill'): ?>
                    <a href="<?php echo e(url("/$lowerp_type/mesh-grill")); ?>" class="btn" tabindex="0">Explore More</a>
                          <?php elseif($kk=='trim'): ?>
                    <a href="<?php echo e(url('/trims')); ?>" class="btn" tabindex="0">Explore More</a>
                        <?php endif; ?>
                        
                    </div>	
                    </div>
                  </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div> 
                <div class="slick-option-gallery-thumb slick-slider">
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('images/site_images/images/upvc-window/option1.png')); ?>"></a></span><span>Color</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('images/site_images/images/upvc-window/option2.png')); ?>"></a></span><span>Glass</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('images/site_images/images/upvc-window/option3.png')); ?>"></a></span><span>Handle</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="<?php echo e(asset('images/site_images/images/upvc-window/option4.png')); ?>"></a></span><span>Mesh & Grill</span></div>
                    <div class="slick-slide"><span class="image"><img src="<?php echo e(asset('images/site_images/images/upvc-window/option5.png')); ?>"></span><span>Trims</span></div>                  
                </div>
              </div> 
            </div> 
          </div>
        </div>
      </div>
    
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
      <div class="about-finesta mt60">
        <div class="container-fluid">
          <h4>About Fenesta <?php echo $title; ?></h4>
          <div class="content">
            
            <?php if($content): ?>
            <?php echo $content; ?>

            <?php endif; ?>
          </div>
        </div>
      </div>

</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/windowdoors/product.blade.php ENDPATH**/ ?>