
<?php $__env->startSection('content'); ?>
<?php
 use App\Models\Handlelock;
?>
        <div class="window-handle-sec">
<style>
    .window-handle-sec .inner-top-nav-tab.active {
     padding-top: 0px;
    }
</style>
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
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:320px)">
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
                <?php $tttt = strtolower($ww->type); $slug = strtolower($ww->slug);  ?>
            <li><a href="javascript:;" <?php if($kk==0 and $uritype==$tttt): ?> class='active' <?php endif; ?>  ><img class="nohover" src="<?php echo e(asset('images/windowdoortype/'.$ww->image)); ?>"><img class="hover" src="<?php echo e(asset('images/windowdoortype/'.$ww->hoverimage)); ?>"><?php echo e($ww->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $tttt = strtolower($dd->type); ?>
            <li><a href="javascript:;" <?php if($ki==0 and $uritype==$tttt ): ?> fvxdgfdf class='active' <?php endif; ?>><img class="nohover" src="<?php echo e(asset('images/windowdoortype/'.$dd->image)); ?>"><img class="hover" src="<?php echo e(asset('images/windowdoortype/'.$dd->hoverimage)); ?>"><?php echo e($dd->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
          </ul>
          <div class="inner-top-nav-tab">
            <h4 class="text-center">Handles And Locks</h4>
              <?php $handlelockscount = 0; ?>
              <?php $__currentLoopData = $windows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $slug = strtolower($ww->slug); ?>
            <div class="inner-top-nav-content <?php echo e($slug); ?>" <?php if($kk==0 and $uritype=='window'): ?>  style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>>
              <div class="handle-list">
                  <?php  
                   $handlelocks = Handlelock::where('is_delete','0')->where('windowdoor',$ww->id)->get();
                   $handlelockscount = count($handlelocks);
                  ?>
                  <?php $__currentLoopData = $handlelocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hlk => $hlv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="images"><img src="<?php echo e(asset('images/handlelock/'.$hlv->image)); ?>"></div>
                  <div class="content">
                    <strong><?php echo $hlv->title; ?></strong>
                    <p><?php echo e($hlv->content); ?></p>
                  </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </div>
                <?php if($handlelockscount>15): ?>
              <div class="load-btn"><a href="javascript:;" class="blue-btn load-more">Load More</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
                <?php endif; ?>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $handlelocks1count = 0; ?>
               <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $slug = strtolower($dd->slug); ?>
            <div class="inner-top-nav-content <?php echo e($slug); ?>"  <?php if($kk==0 and $uritype=='door'): ?>  style="display: block;" <?php else: ?> style="display: none;" <?php endif; ?>>
              <div class="handle-list">
                   <?php
                   $handlelocks1 = Handlelock::where('is_delete','0')->where('windowdoor',$dd->id)->get();
                  $handlelocks1count = count($handlelocks1);
                  ?>
                  <?php $__currentLoopData = $handlelocks1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hlk1 => $hlv1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="images"><img src="<?php echo e(asset('images/handlelock/'.$hlv1->image)); ?>"></div>
                  <div class="content">
                    <strong><?php echo $hlv1->title; ?></strong>
                    <p><?php echo e($hlv1->content); ?></p>
                  </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </div>
                <?php if($handlelocks1count>15): ?>
              <div class="load-btn">
                <a href="javascript:;" class="blue-btn load-more">Load More</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
</div>

<script>  
    
    $('.inner-top-nav ul li a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.inner-top-nav-tab .inner-top-nav-content').hide();
    $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();

   


    handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length;

    if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
       var handleId = $(this).attr('href');
      clienHeight = $('.client-sec').offset().top - clienDistTop ;
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(handleId).offset().top - 240  },1000);
      }  
    }

    $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');

  });
    
    
  // $('.inner-top-nav ul li a').click(function(ev){
  //   ev.preventDefault();
  //   $(this).addClass('active');
  //   $(this).parent().siblings().find('a').removeClass('active');
  //   $('.inner-top-nav-tab .inner-top-nav-content').hide();
  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();


  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).addClass('active');
  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).siblings().removeClass('active');
    
  //   handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length;

  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list').attr('rel', handleSize);
  //   // alert(handleSize);
  //    if($(window).width() > 767){
  //     if(handleSize <= 15){
  //       $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.load-btn').hide();
  //     }
  //   }

  //   if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
  //      var handleId = $(this).attr('href');
  //     clienHeight = $('.client-sec').offset().top - clienDistTop ;
  //     if($(window).width() > 1200){
  //       $('html,body').animate({scrollTop:$(handleId).offset().top - 240  },1000);
  //     }  
  //   }


  //   $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');

  // });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/handles.blade.php ENDPATH**/ ?>