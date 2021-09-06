
<?php $__env->startSection('content'); ?>

        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
    
      <picture>
          <source srcset="<?php echo e(asset('images/site_images/images/quality-innovation-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/images/quality-innovation-banner-mobile.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/images/quality-innovation-banner.jpg')); ?>" alt="">
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
          <h1> Quality Innovation </h1>
        <?php endif; ?>
           </div></div> 
      </div>
          
		<div class="qa_section">
			<div class="container-fluid">
				<ul class="qa_list">
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $resultdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<div class="inner">
							<div class="img_block" <?php if($i%2==0): ?> data-aos="fade-right" <?php else: ?> data-aos="fade-left"  <?php endif; ?> >
								<img src="<?php echo e(asset("images/solutions/$sd->mainimage")); ?>" alt="<?php echo e(strip_tags($sd->title)); ?>">
							</div>
							<div class="copy"  <?php if($i%2==0): ?> data-aos="fade-left" <?php else: ?> data-aos="fade-right" <?php endif; ?> >
								<h3><?php echo e(strip_tags($sd->title)); ?></h3>
								<?php echo $sd->description; ?>

                                <?php if($sd->id==2 || $sd->id==26): ?>
                                <a href="<?php echo e(url('/awards-accreditations')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==7): ?>
                                <a href="<?php echo e(url('/features-benefits')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==9): ?>
                                <a href="<?php echo e(url('/features-benefits/block-rainwater-seepage')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==10): ?>
                                <a href="<?php echo e(url('/features-benefits/protection-from-storm')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==11): ?>
                                <a href="<?php echo e(url('/window/upvc-windows/villa')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==20): ?>
                                <a href="<?php echo e(url('/locate-us')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==23): ?>
                                <a href="<?php echo e(url('/about-dcm')); ?>" class="btn">Read More</a>
                                <?php elseif($sd->id==24): ?>
                                <a href="https://www.fenestaopentennis.com/" class="btn">Read More</a>
                                <?php elseif($sd->id==33): ?>
                                <a href="<?php echo e(url('/showcase/clientele')); ?>" class="btn">Read More</a>
                                <?php endif; ?>
							</div>
						</div>	
					</li>
                    <?php $i=$i+1; ?>
                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
				</ul>
			</div>
		</div>    
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/why_services.blade.php ENDPATH**/ ?>