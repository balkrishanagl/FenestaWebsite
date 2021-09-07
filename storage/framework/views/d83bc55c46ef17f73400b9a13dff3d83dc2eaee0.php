<?php if(!empty($blog_categorys)): ?>
      <div class="pdt50 blog-top-nav">
        <div class="container-fluid">
          <ul>
              <?php $__currentLoopData = $blog_categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk => $bv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
            <li><a href="<?php echo e(App\Models\BlogPostModel::getCatPostUrl($bv->slug)); ?>">
                <img class="nohover" src="<?php echo e(asset('images/blogcategory/'.$bv->image)); ?>">
                <img class="hover" src="<?php echo e(asset('images/blogcategory/'.$bv->hoverimage)); ?>">
                <?php echo e($bv->name); ?> </a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </ul>
        </div>
      </div>
<?php endif; ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/_partials/blogcategory.blade.php ENDPATH**/ ?>