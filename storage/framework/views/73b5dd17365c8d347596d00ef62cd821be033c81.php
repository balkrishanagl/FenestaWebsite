
<?php if(!$relatedblog->isEmpty()): ?>
      <div class="recent-blog-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Related Blog</h4>
            <div class="blog-list">
                <?php $__currentLoopData = $relatedblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rk => $rb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item" <?php if($rk>0): ?>  data-aos-delay=<?php echo e($rk
                   +200); ?> <?php endif; ?> data-aos="fade-right">
                <div class="image"><img src="<?php echo e(asset('images/'. $rb->image )); ?>"></div>
                  <p><?php echo $rb->name; ?></p>
                <a href="<?php echo e(App\Models\BlogPageModel::getPostUrl($rb->slug)); ?>" class="blue-btn">Read More</a>
              </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
                
            </div>
          </div>
        </div>
      </div>
   <?php endif; ?>  <?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/relatedblog.blade.php ENDPATH**/ ?>