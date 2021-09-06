
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
?>
        <div class="main-sec inner-page">
       <style> 
      .switch a{
          bottom:150px;
      }
         .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
            display: block !important;
            }
           
/*
           @media  only screen and (max-width: 1450px){
.upvc-sliding-window-sec .series-option-sec .series-recommended h5 {
    font-size: 22px !important;
}
           }
*/
  </style> 
       
    <?php if($ptype=='Window'): ?>
        <div class="switch"><a href="<?php echo e(url('/door')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    <?php else: ?>
    
        <div class="switch"><a href="<?php echo e(url('/window')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Windows</a></div>
    
    <?php endif; ?>
        <div class="upvc-sliding-window-sec">
            
            
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="inner-banner">  
 
  
       <?php if(empty($banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/product-banner.png')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/product-banner.png')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/product-banner.png')); ?>">
        </picture> 
         <?php else: ?>
            <?php if($ptype=='Window'): ?>
            <picture>
              <source srcset="<?php echo e(asset('images/windowtype/'.$banner_image)); ?>" media="(min-width:768px)">
              <source srcset="<?php echo e(asset('images/windowtype/'.$banner_image)); ?>" media="(min-width:320px)">
              <img src="<?php echo e(asset('images/windowtype/'.$banner_image)); ?>">
            </picture> 
            <?php else: ?>
             <picture>
              <source srcset="<?php echo e(asset('images/doortype/'.$banner_image)); ?>" media="(min-width:768px)">
              <source srcset="<?php echo e(asset('images/doortype/'.$banner_image)); ?>" media="(min-width:320px)">
              <img src="<?php echo e(asset('images/doortype/'.$banner_image)); ?>">
            </picture> 
            <?php endif; ?>
        <?php endif; ?> 
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?> <?php echo e($ptype); ?></h1>
        <?php else: ?>
          <h1> <?php echo e($ptype); ?>   </h1>
        <?php endif; ?>
           </div></div> 
    
      </div>

    
      <div class="inner-top-nav">
        <div class="container-fluid">
          <ul>
              <?php if($product_types!=''): ?>
              <?php  $lowerp_type = strtolower($ptype); ?>
                  <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url("/$lowerp_type/$slug/$pt->slug")); ?>" <?php if($pt->id==$id): ?> class="active" <?php endif; ?>>
                         <?php if($ptype=='Window'): ?>
                            <img class="nohover"  alt="<?php echo e($pt->title); ?>" src="<?php echo e(asset("images/windowtype/$pt->image")); ?>">
                           <img class="hover" src="<?php echo e(asset("images/windowtype/$pt->image")); ?>">
                        <?php else: ?>
                            <img class="nohover"  alt="<?php echo e($pt->title); ?>" src="<?php echo e(asset("images/doortype/$pt->image")); ?>">
                            <img class="hover" src="<?php echo e(asset("images/doortype/$pt->image")); ?>">
                        
                        <?php endif; ?>
                       <?php echo e($pt->title); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
        
          </ul>
          <div class="inner-top-nav-tab">
            
            <div class="inner-top-nav-content" style="display: block;">
              <h4 class="active">
                      <?php if($ptype=='Window'): ?>
                            <img class="nohover" src="<?php echo e(asset("images/windowtype/$image")); ?>"><img class="hover" src="<?php echo e(asset("images/windowtype/$image")); ?>">
                            
                        <?php else: ?>
                             <img class="nohover" src="<?php echo e(asset("images/doortype/$image")); ?>"><img class="hover" src="<?php echo e(asset("images/doortype/$image")); ?>">
                            
                        <?php endif; ?>
                  <span><?php echo e($title); ?></span></h4>
              <div class="content" style="display: block;">
                <?php if($content!=''): ?>
                  <div class="textreadmore">
 
                  <?php echo $content; ?>

                  </div>
                   <p class="buttonreadmore">Read More</p>
                  
                  
                <?php endif; ?>
                  <?php if($video_url!=''): ?>
				<div class="upvc_video">
					<div class="inner">
						<?php if($ptype=='Window'): ?>
                            <img alt="<?php echo e($title); ?>" src="<?php echo e(asset("images/windowtype/$featured_image")); ?>">
                        <?php else: ?>
                            <img  alt="<?php echo e($title); ?>" src="<?php echo e(asset("images/doortype/$featured_image")); ?>">
                        <?php endif; ?>
						<a href="javascript:void(0)" data-video-id="<?php echo e($video_url); ?>" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>
                  <?php endif; ?>
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4> <?php if($id==26): ?> Available Color <?php else: ?> Available Design <?php endif; ?></h4>
                          <div class="series-design-slider owl-carousel">
                              <?php $__currentLoopData = explode(',',$multi_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="item">
                                  <div class="image">
                                        <?php if($ptype=='Window'): ?>
                                            <img src="<?php echo e(asset("images/windowtype/$mi")); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset("images/doortype/$mi")); ?>">
                                        <?php endif; ?>
                                      
                                      
                                       </div>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </div>
                          
                           <?php if($id==26 || $id==30 || $id==7 || $id==8): ?> 
                          <div class="series-recommended">
                              <?php if($id==26): ?> 
                          <h4 data-aos="fade-right">Available Size</h4>
                              <?php else: ?>
                             <h4 data-aos="fade-right">Recommended For</h4>
                              <?php endif; ?>
                          
                              <?php $ri=0; $rt=0; ?>
                              <?php $__currentLoopData = $recom_for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="javascript:;" data-aos="fade-right" <?php if($ri>0): ?> data-aos-delay="<?php echo e($rt=$rt+200); ?>" <?php endif; ?>>
                              <br><h5><?php echo e($rr->title); ?></h5>
                            </a>
                              <?php $ri=$ri+1; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <br>
                        </div>
                          <?php else: ?>
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recommended For</h4>
                          <div class="right">
                              <?php $ri=0; $rt=0; ?>
                              <?php $__currentLoopData = $recom_for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($rr->title): ?>
                            <a href="javascript:;" data-aos="fade-right" <?php if($ri>0): ?> data-aos-delay="<?php echo e($rt=$rt+200); ?>" <?php endif; ?>>
                              <span class="image"><img src="<?php echo e(asset("images/recom/$rr->image")); ?>"></span>
                              <h5><?php echo e($rr->title); ?></h5>
                            </a>
                              <?php endif; ?>
                              <?php $ri=$ri+1; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          </div>
                        </div>  
                          <?php endif; ?>
                      </div>
                        
                      <div class="option" data-aos="zoom-in">
              <h4>Options</h4>
              <div class="option-slider-box">
                <div class="slick-option-gallery slick-slider">
                   <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $oo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
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
              </div>
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
          
          
      <div class="sliding-window-about-sec">
        <div class="container-fluid">
          <h4 data-aos="fade-up">About <?php echo e($title); ?></h4>
             <?php if($short_description!=''): ?>
                <?php echo $short_description; ?>

              <?php endif; ?>
            
        </div>
      </div>
           <?php if($other2!=''): ?>
      <div class="why-sliding-window-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
            <h4>Did You Know?</h4>
            <div class="content">
             
                <?php echo $other2; ?>

             
            </div>
          </div>
        </div>
      </div>
         <?php endif; ?>
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
      

</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/windowdoors/product_details.blade.php ENDPATH**/ ?>