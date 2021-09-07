
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
use App\Models\WindowdoorType;
?>
<style>
    .mt_block .img_block {
    height: auto;
}
</style>
    <div class="window-handle-sec">
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
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?> 
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?></h1>
        <?php else: ?>
          <h1> Design  </h1>
        <?php endif; ?>
           </div></div> 
    
    
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
             <?php if($sub_text!=''): ?>
              <?php echo $sub_text; ?>

            <?php endif; ?>
              
            <div class="explore-more"><a href="javascript:;">Explore More <span><img src="<?php echo e(asset('images/site_images/images/about/explore-more.png')); ?>" alt=""></span></a></div>
          </div>
        </div>
      </div>

		<div class="design_tabs">
			<div class="material_tabs" id="navbar_top">
				<div class="container">
					<ul class="tab_list" data-aos="fade-up">
						<li class="active">
							<a class="nav-link scrollTo active" href="#window"><span>Window</span></a>
						</li>
						<li>
							<a class="nav-link scrollTo" href="#door"><span>Door</span></a>
						</li>
					</ul>
				</div>	
			</div>
			<div class="container">
				<div class="window_block" id="window">
					<div class="inner_block">
						<?php if($content!=''): ?>
                          <?php echo $content; ?>

                        <?php endif; ?>

						<div class="owl-carousel design_carousel">
                            <?php  $ik=100; ?>
                            <?php $__currentLoopData = $windowsdata->unique('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php
                           $wtype =  WindowType::where('title',$ww->title)->where('product_type','Window')->get();
                            ?>
							<div class="item" data-aos="fade-right" data-aos-delay="<?php echo e($ik=$ik+100); ?>">
								<div class="inner">
									<h3><?php echo e(\Illuminate\Support\Str::limit($ww->title." Windows",20)); ?></h3>
									<div class="img_block">
										<img src="<?php echo e(asset("images/windowtype/$ww->thumb_image")); ?>" alt=" <?php echo e($ww->title); ?> Windows ">
									</div>
                                    <?php echo \Illuminate\Support\Str::limit($ww->short_description,85); ?>

									<ul>
                                        <?php $__currentLoopData = $wtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ttww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $wtypename =  WindowdoorType::where('id',$ttww->product)->first();
                                        $lop = strtolower($wtypename->slug);
                                        ?>
										<li><a href="<?php echo e(url("/window/$lop/$ttww->slug")); ?>">  <?php echo e($wtypename->title); ?> </a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
						</div>
					</div>
				</div>
				<div class="door_block" id="door">
					<div class="inner_block">
						 <?php if($content2!=''): ?>
                          <?php echo $content2; ?>

                        <?php endif; ?>

						<div class="owl-carousel design_carousel">
                             <?php  $ik=100; ?>
                            <?php $__currentLoopData = $doorsdata->unique('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php
                           $wtype =  WindowType::where('title',$ww->title)->where('product_type','Door')->get();
                            ?>
							<div class="item" data-aos="fade-right" data-aos-delay="<?php echo e($ik=$ik+100); ?>">
								<div class="inner">
									<h3><?php echo e(\Illuminate\Support\Str::limit($ww->title." Doors",20)); ?></h3>
									<div class="img_block">
										<img src="<?php echo e(asset("images/doortype/$ww->thumb_image")); ?>" alt=" <?php echo e($ww->title); ?> Windows ">
									</div>
								    <?php echo \Illuminate\Support\Str::limit($ww->short_description,85); ?>

									<ul>
										 <?php $__currentLoopData = $wtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ttww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $wtypename =  WindowdoorType::where('id',$ttww->product)->first();
                                        $rty = strtolower($wtypename->slug);
                                        ?>
										<li><a href="<?php echo e(url("/door/$rty/$ttww->slug")); ?>"> <?php echo e($wtypename->title); ?> </a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
						</div>
					</div>
				</div>
			</div>	
		</div>
    
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
      

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/design.blade.php ENDPATH**/ ?>