
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
?>
        <div class=" internal-door-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   <style>
       
    .seriec-list .inner .img_block .image {
    max-width: 240px;
    };

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
          <h1>  Series </h1>
        <?php endif; ?>
           </div></div> 
      </div>
            
            
            
      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">             
                <?php echo $pageData->page_description; ?>              
            <div class="explore-more"><a href="javascript:;">Explore More <span><img src="<?php echo e(asset('images/about/explore-more.png')); ?>" alt=""></span></a></div>
          </div>
        </div>
      </div>
      
      <div class="series-box-list">
		  <div class="material_tabs" id="navbar_top">
				<div class="container">
					<ul class="tab_list">
              <?php $i=1; ?>
              <?php $__currentLoopData = $seriesdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
						<li><a class="nav-link scrollTo <?php if($i==0): ?> active <?php endif; ?> " href="#premium<?php echo e($sd->id); ?>"><span><?php echo e($sd->title); ?></span></a></li>
                         <?php $i=$i+1; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
				</div>	
			</div>
        <div class="container-fluid">
			 <?php $i=1; ?>
             <?php $__currentLoopData = $seriesdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		       <div class="series-box" id="premium<?php echo e($sd->id); ?>">
            <!--<h4 class="text-center"  data-aos="fade-up">Premium Series</h4>-->
            <div class="box">
              <div class="image-box">
					<div class="copy_block addReadMore showlesscontent" >
						<?php echo $sd->description; ?>

					</div>

					<div class="img_block" data-aos="zoom-in-up">
						<img src="<?php echo e(asset("images/series/$sd->image")); ?>" alt="<?php echo e($sd->title); ?>">
					</div>
					<div class="carousel_block" id="new_sliders" >
                        <h6 class="text-center" >WINDOWS</h6>
                        <div class="owl-carousel series_carousel">
                            <?php foreach(explode(',',$sd->product) as $wd){  
                            
                             $wind = WindowType::where('id',$wd)->first();
                             if($wind->product_type=='Window'){
                            ?>
                            <div class="item" >
                                <img src="<?php echo e(asset("images/windowtype/$wind->image")); ?>" alt="">
                                <span><?php echo e($wind->title); ?></span>
                            </div>
                            <?php } } ?>
                        </div>
						
						            <h6 class="text-center" >Door</h6>
                        <div class="owl-carousel series_carousel">
                            
                             <?php foreach(explode(',',$sd->product) as $wd){  
                            
                             $wind = WindowType::where('id',$wd)->first();
                             if($wind->product_type=='Door'){
                            ?>
                            <div class="item" >
                                <img src="<?php echo e(asset("images/doortype/$wind->image")); ?>" alt="">
                                <span><?php echo e($wind->title); ?></span>
                            </div>
                            <?php } } ?>
                            
                        </div>
					</div>
              </div>
              <div class="feature-box">
                <h4>Features</h4>
                  <?php echo $sd->feature; ?>                
              </div>
            </div>
          </div>
             
            <?php $i=$i+1; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
      </div>
            
               
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/series.blade.php ENDPATH**/ ?>