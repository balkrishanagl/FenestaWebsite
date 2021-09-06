  <style>
      .image-gallery .heading .blue-btn {
    opacity: 1;
    }
</style>

      <?php if(!$gallerys->isEmpty()): ?>




      <div class="image-gallery">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading" data-aos="fade-up">
              <h4>Image Gallery</h4>
                
                 <a href="<?php echo e(url('/showcase/gallery')); ?>" class="blue-btn">View More</a>
            </div>
            <div class="image-gallery-slider owl-carousel">
                  <?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
            <div class="item">
              <div class="image"><img src=<?php echo asset("images/gallery_images/$gallery->image"); ?>></div>
              <div class="title"><?php echo $gallery->heading; ?></div>
            </div>
               
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
            <div class="experinece-ar for-mob"><a href="<?php echo e(url('/showcase/gallery')); ?>" class="blue-btn">View More</a></div>
          </div>
        </div>
      </div>



    <?php endif; ?> <?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/imagegallery.blade.php ENDPATH**/ ?>