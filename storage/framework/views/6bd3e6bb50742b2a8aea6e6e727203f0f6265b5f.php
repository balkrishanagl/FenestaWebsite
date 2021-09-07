<style>
    .blog-info-sec .right-col ul li a.active {
    color: #0098da;
}
</style>
            <div class="right-col">
              <div class="subscribe" data-aos="fade-up">
                <form name="frmNewsletter"  id="frmNewsletter" method="post" action="<?php echo e(url('newsletter')); ?>">
                        <?php echo e(csrf_field()); ?>

                <h5>Subscribe To Our Blog</h5>
                <input  maxlength="100" placeholder="Enter Email Address"  name="email" id="email" onKeyUp="Remove('frmNewsletter','email')" class="form-control" type="email" name="" placeholder="Email">
                <button type="submit" class="blue-btn white">Subscribe</button>
                <div class="message-box message-box-frmNewsletter" style="display:none;"> <span class="message-text"></span> </div>
                <div class="error" id="error_email" ></div>
                </form>
              </div>
              <div class="popular-blog" data-aos="fade-up">
                <h5>Popular Blogs</h5>
                  
                <ul>
                   <?php $__currentLoopData = $popular_blog_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($popular_blog->slug)); ?>">
                            <?php echo e(substr(strip_tags($popular_blog->name), 0, 28)); ?>...
                        </a> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                
              </div>
              <div class="archive" data-aos="fade-up">
                <h5>Archives</h5>
                  <?php if(!empty($years)): ?>
                <ul>
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $yy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php  
                        $mL = [1=>'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                      $months = App\Models\BlogPostModel::getmonthsofyear($yy->year);
        
                    ?>
                    
                  <li>
                    <a href="javascript:;" <?php if(!empty($year)): ?> <?php if($year==$yy->year): ?>  class="active" <?php endif; ?> <?php else: ?>  <?php if($ki==0): ?> class="active" <?php endif; ?> <?php endif; ?>><?php echo e($yy->year); ?></a>
                    <div class="content"  <?php if(isset($year)): ?> <?php if($year==$yy->year): ?> style="display: block;" <?php endif; ?> <?php else: ?>  <?php if($ki==0): ?> style="display: block;"  <?php endif; ?> <?php endif; ?>>
                      <div class="months">
                          <?php if(!empty($months)): ?>
                          <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <?php $mnum = $mL[$mm->month] ?>
                        <a <?php if(!empty($month)): ?> <?php if($month==$mm->month and $year==$yy->year): ?>  class="active" <?php endif; ?> <?php endif; ?>  href="<?php echo e(url("/blog/$yy->year/$mm->month")); ?>" ><?php echo e($mnum); ?></a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      </div>
                    </div>
                  </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </ul>
                    <?php endif; ?>
              </div>
            </div><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/sidebar.blade.php ENDPATH**/ ?>