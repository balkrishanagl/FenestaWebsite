
<?php $__env->startSection('content'); ?>
<?php
 use App\Models\Handlelock;
?>
        <div class="window-handle-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
        
        <div class="heading"><div class="container-fluid">        <?php if(!empty($pageData->page_title)): ?>
          <h1>   <?php echo $pageData->page_title; ?></h1>
        <?php else: ?>
          <h1>  Handles and Locks </h1>
        <?php endif; ?>
           </div></div> 
      </div>

      <div class="inner-top-nav">
        <div class="container-fluid">
          <ul>
              <?php $__currentLoopData = $windows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li><a href="javascript:;" <?php if($kk==0): ?> class="active" <?php endif; ?> ><img class="nohover" src="<?php echo e(asset('images/windowdoortype/'.$ww->image)); ?>"><img class="hover" src="<?php echo e(asset('images/windowdoortype/'.$ww->hoverimage)); ?>"><?php echo e($ww->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="javascript:;"><img class="nohover" src="<?php echo e(asset('images/windowdoortype/'.$dd->image)); ?>"><img class="hover" src="<?php echo e(asset('images/windowdoortype/'.$dd->hoverimage)); ?>"><?php echo e($dd->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
          </ul>
          <div class="inner-top-nav-tab">
            <h4 class="text-center">Handles And Locks</h4>
              <?php $__currentLoopData = $windows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="inner-top-nav-content" <?php if($kk==0): ?>  style="display: block;" <?php endif; ?> >
              <div class="handle-list">
                  <?php  
                   $handlelocks = Handlelock::where('is_delete',0)->where('windowdoor',$ww->id)->get();
                  ?>
                  <?php $__currentLoopData = $handlelocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hlk => $hlv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="images"><img src="<?php echo e(asset('images/handlelock/'.$hlv->image)); ?>"></div>
                  <div class="content">
                    <strong><?php echo e($hlv->title); ?></strong>
                    <p><?php echo e($hlv->content); ?></p>
                  </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </div>
              <div class="load-btn"><a href="javascript:;" class="blue-btn load-more">Load More</a></div>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="inner-top-nav-content">
              <div class="handle-list">
                   <?php
                   $handlelocks1 = Handlelock::where('is_delete',0)->where('windowdoor',$dd->id)->get();
                  ?>
                  <?php $__currentLoopData = $handlelocks1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hlk1 => $hlv1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="images"><img src="<?php echo e(asset('images/handlelock/'.$hlv1->image)); ?>"></div>
                  <div class="content">
                    <strong><?php echo e($hlv1->title); ?></strong>
                    <p><?php echo e($hlv1->content); ?></p>
                  </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </div>
              <div class="load-btn"><a href="javascript:;" class="blue-btn load-more">Load More</a></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta <?php echo e($pageData->page_title); ?></h4>
          <div class="content">
           <?php if(!empty($pageData->page_description)): ?>
            <?php echo $pageData->page_description; ?>

        
        <?php endif; ?>
          </div>
        </div>
      </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/handles.blade.php ENDPATH**/ ?>