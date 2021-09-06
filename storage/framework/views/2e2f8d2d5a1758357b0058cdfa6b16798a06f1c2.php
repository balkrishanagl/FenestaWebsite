<?php if(!$appreciations->isEmpty()): ?>
      <div class="customer-appreciation-sec">
        <div class="container-fluid">
          <div class="slider-box">
              <div class="heading">
            <h4 class="text-center">Customer Appreciations
            <a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn">View All</a></h4>
              </div>
            <div class="customer-apprec-slider owl-carousel">
                <?php $daod = 200; ?>
                 <?php $__currentLoopData = $appreciations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ak => $appreciation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item"  <?php if($ak>0): ?> data-aos-delay="<?php echo e($daod); ?>" <?php endif; ?> >
                   <?php $daod = $daod+200; ?> 
                <div class="heading">
                  <div class="image"><img src="<?php echo asset("images/appreciation/$appreciation->image"); ?>"><span></span></div>
                  <div class="right">
                    <div class="name"><?php echo e($appreciation->name); ?></div>
                    <div class="date"> <?php if($appreciation->city!=''): ?> <?php echo e($appreciation->city); ?> <?php else: ?> <?php echo e(date("d M Y",strtotime($appreciation->created_at))); ?> <?php endif; ?>   <img src="<?php echo e(asset('images/site_images/globe.png')); ?>"> 
                      </div>
                  </div>
                </div>
                  <p class="addReadMore showlesscontent"> <?php echo e(strip_tags($appreciation->description)); ?> </p>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
            </div>
            <div class="cutomer-view-all for-mob"><a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn">View All</a></div>
          </div> 
        </div>
      </div>  
<?php endif; ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/customerapp.blade.php ENDPATH**/ ?>