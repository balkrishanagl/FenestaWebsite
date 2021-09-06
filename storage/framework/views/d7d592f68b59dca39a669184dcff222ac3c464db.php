
<?php $__env->startSection('content'); ?>

        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>') }}" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>') }}" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>') }}">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>') }}" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
          <div class="heading"><div class="container-fluid">        <?php if(!empty($pageData->page_title)): ?>
          <h1>   <?php echo $pageData->page_title; ?></h1>
        <?php else: ?>
          <h1>Features Benefits</h1>
        <?php endif; ?>
           </div></div> 
      </div>
            
            
      <div class="energy-efficient-tab">
        <div class="container-fluid">
          <div class="inner-wrap">
            <div class="efficient-tablist">
              <ul>
                  <?php $ik=0; ?>
                <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <li><a href="javascript:;" <?php if($ik==0): ?> class="active" <?php endif; ?>><?php echo e($ff->name); ?></a></li>
                   <?php $ik=$ik+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
         
              </ul>
            </div>
            <div class="efficient-tab-box"> 
                <?php $ik=0; ?>
                <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

              <div class="efficient-tab-content" <?php if($ik==0): ?>  style="display: block;"  <?php endif; ?>>
                <h3 class="for-mob"><?php echo e($ff->name); ?></h3>
                <div class="content">
					<div class="cont_block">
						<h4><?php echo e($ff->title); ?></h4>
                        <?php echo $ff->description; ?>

                  <div class="image"><img src="<?php echo e(asset("images/featurebenefit/image/$ff->image")); ?>"></div>                  
                  <div class="efficient-content-item">
                    <div class="item">
                      <div class="image-item"><img src="<?php echo e(asset("images/site_images/images/energy-efficient/tab-item1.png")); ?>"></div>
                      <h6>THE MATERIAL OF CONSTRUCTION</h6>
                      <p>UPVC - A poor conductor of heat, UPVC neither retains nor transfers heat indoors. Aluminium does both. The U-Value (the calculation of conducting properties) of UPVC is comparable to wood and far less than Aluminium.</p>
                    </div>
                    <div class="item">
                      <div class="image-item"><img src="<?php echo e(asset("images/site_images/images/energy-efficient/tab-item2.png")); ?>"></div>
                      <h6>AIR TIGHT SEALING</h6>
                      <p>Use of fusion welded joints, multi-chambered profiles, multiple point locks and silicone sealant for airtight sealing that prevents the conditioned cold air from escaping out and hot air from flowing in.</p>
                    </div>
                    <div class="item">
                      <div class="image-item"><img src="<?php echo e(asset("images/site_images/images/energy-efficient/tab-item3.png")); ?>"></div>
                      <h6>DOUBLE INSULATION</h6>
                      <p>All Fenesta windows and doors can be fitted with double or triple insulated glass, which is often used in modern buildings with high green rating - as the means to save power.</p>
                    </div>
                  </div>
                  <div class="result"><strong>RESULT:</strong> <?php echo e($ff->result); ?></div>
					</div>	
                </div>
              </div>
                <?php $ik=$ik+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
           
            </div>
          </div>
        </div>
      </div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           <?php if(!empty($pageData->about)): ?>
                <?php echo $pageData->about; ?>


            <?php endif; ?>
          </div>
        </div>
      </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/knowledge_center.blade.php ENDPATH**/ ?>