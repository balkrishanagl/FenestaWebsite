
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              
      <div class="accreditation-sec pdt45" data-aos="fade-up">
        <div class="container-fluid">
          <h4 class="text-center"><?php echo $pageData->page_title; ?></h4>
          <?php if(!empty($pageData->page_description)): ?>
                <?php echo $pageData->page_description; ?>


            <?php endif; ?>
          <ul class="accreditation-link">
            <li><a href="#award" class="active">Awards</a></li>
            <li><a href="#accreditation">Accreditations</a></li>
          </ul>
          <div class="award-accreditation-tab">
            <div class="award-accreditation-tab-box" id="award" style="display: block;">
              <div class="award-accreditation-list">
                  <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="image"><img src=<?php echo asset("images/awards/$aval->image"); ?>><span></span></div>
                  <p><?php echo e(strip_tags($aval->description)); ?></p>
                </div>   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a> <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a></div>
            </div>
            <div class="award-accreditation-tab-box" id="accreditation">
              <div class="award-accreditation-list">
                  <?php $__currentLoopData = $app; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="image"><img src=<?php echo asset("images/awards/$aval->image"); ?>><span></span></div>
                 <p><?php echo e(strip_tags($aval->description)); ?></p>
                </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">Load More</a>
                 <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
            </div>
          </div>
        </div>        
      </div>   

     

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/award_accreditation.blade.php ENDPATH**/ ?>