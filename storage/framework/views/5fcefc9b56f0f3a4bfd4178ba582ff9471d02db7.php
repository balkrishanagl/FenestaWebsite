<?php if(!$faqs->isEmpty()): ?>
      <div class="faq-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" >Frequently Asked Questions</h4>
            <div class="accordion">     
                 
                 <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fk => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="faq-accord" >
                <h5 <?php if($fk==0): ?> class="active" <?php endif; ?> ><?php echo e($faq->title); ?> </h5>
                <div class="content"  <?php if($fk==0): ?> style="display: block;" <?php endif; ?>>
                  <?php echo $faq->answer; ?>

                </div>
              </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
<?php endif; ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/faq.blade.php ENDPATH**/ ?>