
<?php $__env->startSection('content'); ?>
<style>
    .mt_block .img_block {
    height: auto;
}
</style>
        <div class="material-sec">
            
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
          <h1> Material </h1>
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

		<div class="material_tabs" id="navbar_top">
			<div class="container">
				<ul class="tab_list" data-aos="fade-up">
					<li class="active">
						<a class="nav-link scrollTo active" href="#upvc"><span>uPvc</span></a>
					</li>
					<li>
						<a class="nav-link scrollTo" href="#aluminium"><span>Aluminium</span></a>
					</li>
					<li>
						<a class="nav-link scrollTo" href="#internal-door"><span>Internal Door</span></a>
					</li>
				</ul>
			</div>	
		</div>
		<div class="upvc_block mt_block" id="upvc">
			<div class="container">
				<div class="inner">
					<div class="row">
                        
                        <?php $__currentLoopData = $upvcdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $updt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($updt->type==1){ $pty ='window'; }else{ $pty ='door'; }
                        $wtyp = strtolower($updt->slug);
                        ?>
                        <div class="col-md-6">
                            <div class="img_block" data-aos="zoom-in">
                                <img src="<?php echo e(asset("images/windowdoortype/$updt->fullimage")); ?>"" alt="<?php echo e($updt->title); ?>">
                                <div class="overlay">
                                    <h3><?php echo e($updt->title); ?></h3>
                                    <div class="copy">
                                        <?php echo \Illuminate\Support\Str::limit($updt->short_description,250); ?>

                                        <a href="<?php echo e(url("/$pty/$wtyp")); ?>" class="btn">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="copy_block" data-aos="fade-up">
                                 <?php if($content!=''): ?>
              <?php echo $content; ?>

            <?php endif; ?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="aluminium_block mt_block" id="aluminium">
			<div class="container">
				<div class="inner">
					<div class="row">
                         <?php $__currentLoopData = $almdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $updt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($updt->type==1){ $pty ='window'; }else{ $pty ='door'; } 
                         $wtyp = strtolower($updt->slug);

                        ?>
                        <div class="col-md-6">
                            <div class="img_block" data-aos="zoom-in">
                                <img src="<?php echo e(asset("images/windowdoortype/$updt->fullimage")); ?>" alt="<?php echo e($updt->title); ?>">
                                <div class="overlay">
                                    <h3><?php echo e($updt->title); ?></h3>
                                    <div class="copy">
                                       <?php echo \Illuminate\Support\Str::limit($updt->short_description,250); ?>

                                        <a href="<?php echo e(url("/$pty/$wtyp")); ?>" class="btn">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="copy_block" data-aos="fade-up">
                                 <?php if($content2!=''): ?>
              <?php echo $content2; ?>

            <?php endif; ?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="id_block mt_block" id="internal-door">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-md-6">
							<div class="copy_block" data-aos="fade-right">
								<?php if($content3!=''): ?>
              <?php echo $content3; ?>

            <?php endif; ?>
							</div>
						</div>
						 <div class="col-md-6">
                            
							<div class="img_block" data-aos="fade-left">
								<img src="<?php echo e(asset("images/windowdoortype/$internaldata->fullimage")); ?>" alt="<?php echo e($internaldata->title); ?>">
								<div class="overlay">
									<h3><?php echo e($internaldata->title); ?></h3>
									<div class="copy">
										 <?php $indg = strtolower($internaldata->slug) ?> <?php echo \Illuminate\Support\Str::limit($internaldata->short_description,250); ?>

										<a href="<?php echo e(url("/door/$indg")); ?>" class="btn">Explore</a>
									</div>
								</div>
							</div>
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


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/material.blade.php ENDPATH**/ ?>