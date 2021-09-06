
<?php $__env->startSection('content'); ?>
<style>
    .galley-image-listing{
        
        width:100%;
        padding-left: 0px;
    }
</style>
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
      <div class="scroll-gallery"></div>
      <div class="galley-box pdt45">
        <div class="container-fluid">
          <div class="top-heading">
            <h4 data-aos="fade-up"><?php echo $pageData->page_title; ?></h4>
             <?php if(!empty($pageData->page_description)): ?>
                <?php echo $pageData->page_description; ?>


            <?php endif; ?>
          </div>
          <div class="bottom-box">
           <div class="galley-image-listing">
              <ul>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <div class="image"><img src="<?php echo e(asset("images/news/$gg->image")); ?>"></div>
                  <h6><?php echo e($gg->title); ?></h6>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </ul>
              <div class="load-more-btn text-center">
                <a href="javascript:;" class="blue-btn load-more">Load more</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
            </div>
          </div>  
        </div>      
      </div>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/news_pages.blade.php ENDPATH**/ ?>