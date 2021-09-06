
<?php $__env->startSection('content'); ?>

        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            

      <div class="pdt50 latest-event-sec mt50">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading text-center">
              <h4 class="text-center">Latest Events</h4>
              <?php echo $content; ?>

            </div>
            <div class="wrap-box">
             
                
                
                <div class="tl_outer">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <?php $__currentLoopData = $latestevent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="nav-item" data-aos="fade-up">
                        <a class="nav-link <?php if($kk==0): ?> active <?php endif; ?>" id="tab-tab<?php echo e($ll->id); ?>" data-toggle="tab" href="#tab<?php echo e($ll->id); ?>" role="tab" aria-controls="tab-<?php echo e($ll->id); ?>" <?php if($kk==0): ?> aria-selected="true" <?php endif; ?>><?php echo e($ll->title); ?></a>
                      </li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <a href="<?php echo e(url('/news-media/latest-events')); ?>" class="blue-btn white">Read All</a>
                </div>	
                <div class="tab-content" id="myTabContent">
                    <?php $__currentLoopData = $latestevent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade <?php if($kk==0): ?> show active <?php endif; ?> " id="tab<?php echo e($ll->id); ?>" role="tabpanel" aria-labelledby="tab-tab<?php echo e($ll->id); ?>">
                        <div class="img_block" data-aos="zoom-in">
                          <img src="images/news/<?php echo e($ll->image); ?>" alt="<?php echo e($ll->title); ?>">
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
				
                
            </div>
          </div>
        </div>
      </div>
      <div class="press-advt-sec mt50">
        <div class="container-fluid">
          <div class="inner-box">            
            <div class="left" data-aos="fade-up">
              <div class="heading text-center">
                <h4 class="text-center">Press Coverage</h4>
                <p><?php echo e($sub_text); ?> </p>
              </div>
              <div class="press-list">
                   <?php $__currentLoopData = $pressevent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-aos="zoom-in">
                  <a href="javascript:;">
                    <div class="image"><img src="<?php echo e(asset("images/news/$ll->image")); ?>"></div>
                    <h6><?php echo e($ll->title); ?></h6>
                  </a>
                </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div> 
              <a href="<?php echo e(url('/news-media/press-coverage')); ?>" class="blue-btn white">Read All</a>            
            </div>
            <div class="right" data-aos="fade-up">
              <div class="heading text-center">
                <h4 class="text-center">Advertisement Centre</h4>
                <p><?php echo e($content2); ?></p>
              </div>
              <div class="advt-list">
                  <?php $__currentLoopData = $addevent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-aos="zoom-in">
                  <a href="javascript:;">
                    <div class="image"><img src="<?php echo e(asset("images/news/$ll->image")); ?>"></div>
                    <h6><?php echo e($ll->title); ?></h6>
                  </a>
                </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div> 
              <a href="<?php echo e(url('/news-media/advertisement-centre')); ?>" class="blue-btn white">Read All</a>  
            </div>
          </div>
        </div>
      </div>

    
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/news_media.blade.php ENDPATH**/ ?>