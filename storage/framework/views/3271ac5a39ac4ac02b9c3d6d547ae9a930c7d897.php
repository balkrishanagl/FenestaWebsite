
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
use App\Models\WindowdoorType;
?>
        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
   
    
       <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>') }}" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>') }}" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>') }}">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>') }}" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
        
          <div class="heading"><div class="container-fluid">        <?php if(!empty($pageData->page_title)): ?>
          <h1>   <?php echo $pageData->page_title; ?></h1>
        <?php else: ?>
          <h1>Features Benefits</h1>
        <?php endif; ?>
           </div></div> 
      </div>
            
            
      <div class="energy-efficient-tab">
        <div class="container-fluid">
          <div class="inner-wrap">
            <div class="efficient-tablist">
              <ul>
                  <?php $ik=0; ?>
                <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <li><a href="javascript:;" <?php if($ff->slug==$child_slug): ?> class="active" <?php elseif($ik==0 and empty($child_slug)): ?>  class="active"  <?php endif; ?>><?php echo e($ff->name); ?></a></li>
                   <?php $ik=$ik+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
         
              </ul>
            </div>
            <div class="efficient-tab-box"> 
                <?php $ik=0; ?>
                <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

              <div class="efficient-tab-content" <?php if($ff->slug==$child_slug): ?>  style="display: block;" <?php elseif($ik==0 and empty($child_slug)): ?>  style="display: block;"  <?php endif; ?>>
                <h3 class="for-mob"><?php echo e($ff->name); ?></h3>
                <div class="content">
					<div class="cont_block">
						<h4><?php echo e($ff->title); ?></h4>
                        <?php echo $ff->description; ?>

                        <div class="image"><img src="<?php echo e(asset("images/featurebenefit/image/$ff->image")); ?>"></div> 
                        <?php if($ff->belowimage!=''): ?>
                        <p><?php echo e($ff->belowimage); ?></p>
                        <?php endif; ?>
                        
                        
                        <?php if(!empty(json_decode($ff->optiondata))): ?>
                  <div class="efficient-content-item">
                      
                      <?php $__currentLoopData = json_decode($ff->optiondata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ffdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(!empty($ffdf->title) or !empty($ffdf->content)): ?>
                    <div class="item">
                     
                      <h6><?php echo e($ffdf->title); ?></h6>
                      <p><?php echo e($ffdf->content); ?></p>
                    </div>
                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                  </div> 
                        <?php endif; ?>
                  <div class="result"><strong>RESULT:</strong> <?php echo e($ff->result); ?></div>
					</div>	
                  	<div class="energy-efficient-table">
        <div class="container-fluid">
          <div class="inner-wrap">
               <?php if(json_decode($ff->windowtype)!=''): ?>
            <div class="left">
              <div class="table-wrap">
                <ul>
                  <li class="head">
                    <div><h4>Windows Types</h4></div>
                    <div>PREMIUM <br> SERIES</div>
                    <div>LUXURY <br> SERIES</div>
                    <div>SUPER LUXURY <br>SERIES</div>
                    <div></div> 
                  </li>
                  <?php $__currentLoopData = json_decode($ff->windowtype); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wwkk => $wwtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                 $p_sluga = App\Http\Controllers\FrontendControllers\WindowdoorController::createUrlSlug($wwkk); 
                  $witypedata =   WindowType::where('slug',$p_sluga)->first();
                  $witypedataslug =   WindowdoorType::find($witypedata->product)->slug;
                 ?>
                  <li>
                    <div>
                      
                        <h4><?php echo e($wwkk); ?></h4></div>
                    
                    <?php $yui=0; ?>
                    <?php $__currentLoopData = $wwtt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hj => $gghv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($yui<3): ?>
                       <div><span><?php echo e($gghv[0]); ?></span></div>
                     <?php endif; ?>
                     <?php $yui=$yui+1; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <div><span><a href="<?php echo e(url("/window/$witypedataslug/$p_sluga")); ?>" class="blue-btn white">Explore</a></span></div>
                  </li>
                  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
                        <?php endif; ?>
                        <?php if(json_decode($ff->doortype)!=''): ?>
            <div class="right">
              <div class="table-wrap">
                <ul>
                  <li class="head">
                    <div><h4>Door Types</h4></div>
                    <div>PREMIUM <br> SERIES</div>
                    <div>LUXURY <br> SERIES</div>
                    <div>SUPER LUXURY <br>SERIES</div>
                    <div></div> 
                  </li>
                   <?php $p_slugad='';   ?>
                <?php $__currentLoopData = json_decode($ff->doortype); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wwkks => $wwtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                 <?php
                 $p_slugad = App\Http\Controllers\FrontendControllers\WindowdoorController::createUrlSlug($wwkks);  
                 /*
                  $witypedatad =   WindowType::where('slug',$p_slugad)->first();
                    $dgh = $witypedatad->product;
                    
                  $witypedataslugsd =   WindowdoorType::find($dgh)->slug;
                  */
                 ?>
                  <li>
                    <div>
                      
                        <h4><?php echo e($wwkks); ?></h4></div>
                    <?php $yui=0; ?>
                    <?php $__currentLoopData = $wwtt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hj => $gghv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($yui<3): ?>
                       <div><span><?php echo e($gghv[0]); ?></span></div>
                      <?php endif; ?>
                     <?php $yui=$yui+1; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                 
                    <div><span><a href="<?php echo e(url("/door/alumininum-doors/$p_slugad")); ?>" class="blue-btn white">Explore</a></span></div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
                  <?php endif; ?>
          </div>
        </div>
      </div>
                </div>
              </div>
                <?php $ik=$ik+1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
           
            </div>
          </div>
        </div>
      </div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/features_benefits.blade.php ENDPATH**/ ?>