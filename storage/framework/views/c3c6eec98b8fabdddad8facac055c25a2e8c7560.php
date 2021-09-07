
<?php $__env->startSection('content'); ?>

        <div class="blog-sec blog-detail-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
      <?php echo $__env->make('frontend._partials.blogcategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      <div class=" blog-info-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="left-col">              
              <h4>Latest Blogs</h4>
              <div class="latest-blog" data-aos="fade-up">
                    <?php
                        foreach($result as $key => $row){
                        if($key==0){
                    ?>
                <div class="latest-blog-left" >
                    
                  <div class="image"><img src="<?php echo e(asset('images/'.'/'.$row->image)); ?>"></div>
                  <div class="date"><img src="<?php echo e(asset('images/site_images/calender.png')); ?>"><?php echo e(date('M d, Y',strtotime($row->posted_date))); ?></div>
                  <h4><?php echo e($row->name); ?></h4>
                  <p><?php echo e($row->short_description); ?></p>
                  <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($row->slug)); ?>" class="blue-btn">Read More</a>
                </div>
                      <?php }else{ 
                      if($key==1){
                      ?> 
                <div class="latest-blog-right" >
                  <div class="latest-blog-list">
                    <?php } ?>
                    <div class="item">
                      <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($row->slug)); ?>">
                        <div class="image"><img src="<?php echo e(asset('images/'.$row->image)); ?>"></div>
                        <div class="content">
                          <h4><?php echo e(substr(strip_tags($row->name), 0, 28)); ?>...</h4>
                          <div class="date"><img src="<?php echo e(asset('images/site_images/calender.png')); ?>"><?php echo e(date('M d, Y',strtotime($row->posted_date))); ?> </div>
                           
                        </div>
                            <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($row->slug)); ?>" class="blue-btn" id="blog_btn">Read More</a>
                      </a>
                    </div>
                    <?php 
                  if($key==4){
                  ?>   
                  </div>
                </div>
                      <?php }  } }
                      ?> 
              </div>
              <h4>Recommended</h4>
              <div class="recommend-slider owl-carousel" data-aos="fade-up">
                    <div class="item">
                <?php $__currentLoopData = $recomresult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="box">
                    <div class="image"><img src="<?php echo e(asset('images/'.'/'.$row->image)); ?>"></div>
                    <div class="content">
                      <div class="date"><img src="<?php echo e(asset('images/site_images/calender.png')); ?>"><?php echo e(date('M d, Y',strtotime($row->posted_date))); ?></div>
                      <h4><?php echo e(substr(strip_tags($row->name), 0, 28)); ?>...</h4>
                      <p><?php echo e($row->short_description); ?></p>
                      <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($row->slug)); ?>" class="blue-btn">Read More</a>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <div class="recommend-slider-mob owl-carousel">
                   <?php $__currentLoopData = $recomresult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                  <div class="image"><img src="<?php echo e(asset('images/'.'/'.$row->image)); ?>"></div>
                  <div class="content">
                      <div class="date"><img src="<?php echo e(asset('images/site_images/calender.png')); ?>"><?php echo e(date('M d, Y',strtotime($row->posted_date))); ?></div>
                      <h4><?php echo e($row->name); ?></h4>
                      <p><?php echo e($row->short_description); ?></p>
                      <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($row->slug)); ?>" class="blue-btn">Read More</a>
                    </div>
                </div>   
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
     
           <?php echo $__env->make('frontend._partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  
              
          </div>
        </div>
      </div>
    
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/blog/blog_list.blade.php ENDPATH**/ ?>