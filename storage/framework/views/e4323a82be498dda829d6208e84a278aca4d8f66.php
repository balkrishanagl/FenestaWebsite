
    <?php if(!$testimonials->isEmpty()): ?>
    <div class="client-sec">
       <div class="container-fluid">
			<div class="inner-box">
			  <div class="heading text-center">
            <h2>What Our Clients Say<a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn"> view All</a></h2>
            
          </div>
          <div class="client-slider owl-carousel">
               <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
              <div class="image">
                <img src="<?php echo asset("images/testimonials/reference/$testimonial->reference_image"); ?>">
                  <?php if(!empty($testimonial->youtube_url)): ?>
                <span class="play" data-video-id="<?php echo e($testimonial->youtube_url); ?>"><img src="<?php echo e(asset('images/site_images/play.png')); ?>"></span>
                  <?php endif; ?>
              </div>
              <div class="desc">
                <div class="pic"><img src="<?php echo asset("images/testimonials/user/$testimonial->user_image"); ?>"></div>
                <div class="right">
                  <h6><?php echo e($testimonial->name); ?></h6>
                  <p><?php echo e($testimonial->city); ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="view-all for-mob"><a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn"> view All</a></div>
        </div>
      </div>
    </div>
    <?php endif; ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/testimonials.blade.php ENDPATH**/ ?>