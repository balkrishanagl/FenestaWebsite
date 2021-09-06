
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
          <h1>  Mesh & Gril </h1>
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
      <div class="mesh-grill-sec mt50 tab-sec">
        <div class="container-fluid">
          <div class="get-fix">
            <ul class="mesh-grill-link tab-link">
              <li><a href="#mesh" class="active">Mesh</a></li>
              <li><a href="#gril">Grill</a></li>          
            </ul>
          </div>
        </div>
        <div class="mesh-grill-list tab-list">
          <div class="container-fluid">
            <div class="mesh-grill-box" id="mesh" style="display: block;">
              <div class="mesh-slider">
  

                  <?php $i=0;$k=0; ?>
                  <?php $__currentLoopData = $meshoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="item" data-aos="fade-right" <?php if($i>0): ?>  data-aos-delay="<?php echo e($k=$k+200); ?>" <?php endif; ?>  >
                  <div class="image"><img title="<?php echo e($mo->title); ?>" alt="<?php echo e($mo->title); ?>"  src="<?php echo e(asset("images/meshgrill/$mo->image")); ?>"> </div>
                  <div class="content">
                    <h6><?php echo e($mo->title); ?></h6>
                    <?php echo $mo->description; ?>

                  </div>
                </div>
                   <?php $i=$i+1; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <h4 class="text-center mt50" data-aos="fade-up">Mesh Styles</h4>
              <div class="mesh-style-slider">
                   <?php $i=0;$k=0; ?>
                  <?php $__currentLoopData = $meshstyle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-aos="fade-right" <?php if($i>0): ?>  data-aos-delay="<?php echo e($k=$k+200); ?>" <?php endif; ?>>
                  <div class="image"><img title="<?php echo e($mo->title); ?>" alt="<?php echo e($mo->title); ?>"  src="<?php echo e(asset("images/meshgrill/$mo->image")); ?>"> </div>
                  <div class="content">
                    <h6><?php echo e($mo->title); ?></h6>
                    <?php echo $mo->description; ?>

                  </div>
                </div>
                  <?php $i=$i+1; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <div class="mesh-grill-box" id="gril">
                  <?php $i=0;$k=0; ?>
                <?php $__currentLoopData = $grilloptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="mesh_block">
					<div class="img_row">
                      
                        
                         <?php $__currentLoopData = explode(',',$mo->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mmmg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="img_block" data-aos="fade-right">
							<img title="<?php echo e($mo->title); ?>" alt="<?php echo e($mo->title); ?>"  src="<?php echo e(asset("images/meshgrill/$mmmg")); ?>">
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
					</div>
					<div class="copy_row">
						<h6 data-aos="fade-up"><?php echo e($mo->title); ?></h6>
                    	<?php echo $mo->description; ?>

					</div>
				</div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              <h4 class="text-center mt50">Grill Styles</h4>
                <?php $i=0;$k=0; ?>
                <?php $__currentLoopData = $grillstyle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="mesh_block">
					<div class="img_row">
                        
                        
                         <?php $__currentLoopData = explode(',',$mo->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mmmg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="img_block" data-aos="fade-right">
							<img title="<?php echo e($mo->title); ?>" alt="<?php echo e($mo->title); ?>"  src="<?php echo e(asset("images/meshgrill/$mmmg")); ?>">
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
					</div>
					<div class="copy_row">
						<h6 data-aos="fade-up"><?php echo e($mo->title); ?></h6>
                    	<?php echo $mo->description; ?>

					</div>
				</div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
           
            </div>
          </div>
        </div>
      </div>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/mesh_gril.blade.php ENDPATH**/ ?>