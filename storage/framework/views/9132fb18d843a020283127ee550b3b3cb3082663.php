
<?php $__env->startSection('content'); ?>
<style> 
      .switch a{
          bottom:150px;
      }
      .section .owl-nav button, .section .blue-btn {
    opacity: 1;
}
  </style> 
        <div class="main-sec inner-page">
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
          <h1>  Glass Options </h1>
        <?php endif; ?>
           </div></div> 

    <?php if($ptype=='Window'): ?>
        <div class="switch"><a href="<?php echo e(url('/door')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    <?php else: ?>
    
        <div class="switch"><a href="<?php echo e(url('/window')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Windows</a></div>
    
    <?php endif; ?>
      </div>

      <div class="window-glass-option">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Glass Options</h4>
          <div class="glass-option-slider owl-carousel">
            
              <?php $ik=0; $tt=0; ?>
              <?php $__currentLoopData = $glassoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" data-aos="fade-right">
              <div class="image"><img src="<?php echo e(asset("images/glass/$gs->image")); ?>"></div>
              <div class="content">
                <strong><?php echo e($gs->title); ?></strong>
                <?php echo $gs->description; ?>

              </div>
            </div>
               <?php $ik=$ik+1; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
          </div>
        </div>
      </div>
      <div class="window-glazing">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Glazing Types</h4>
          <div class="window-glaze-slider owl-carousel">
              
              <?php $ik=0; $tt=0; ?>
              <?php $__currentLoopData = $glassstyle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="item" data-aos="fade-right" <?php if($ik==0): ?> data-aos-delay="<?php echo e($tt=$tt+200); ?>" <?php endif; ?>>
              <div class="image"><img src="<?php echo e(asset("images/glass/$gs->image")); ?>"></div>
              <div class="content">
                <strong><?php echo e($gs->title); ?></strong>
                <?php echo $gs->description; ?> </div>
            </div>
              <?php $ik=$ik+1; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
      <div class="window-glass-tables">
        <div class="container-fluid">
          <div class="heading text-center" data-aos="fade-up">
            <strong>FENESTA RECOMMENDS USE OF TOUGHENED GLASS FOR OPTIMUM PERFORMANCE OF WINDOWS AND DOORS.</strong>
            <p>Toughened glass is approximately 4 times stronger than annealed/float glass. Toughened glass is impact resistant and when it is broken it shatters into small</p>
          </div>
          <div class="glass-chart table-box" data-aos="fade-up">
            <h4 class="text-center">Glass Selection Chart </h4>
            <div class="inner-table">
              <div class="table-wrap">
                <ul class="chart-table">
                  <li class="head">
                    <div>Glass Type</div>
                    <div>Single Glass(SG)</div>
                    <div>Laminated(LU)</div>
                    <div>Double Glass Unit(DG)</div>
                    <div>Triple Glass(TG)</div>
                  </li>
                  <li>
                    <div>Glass Thickness</div>
                    <div>
                      <span>4</span>
                      <span>5</span>
                      <span>6</span>
                      <span>8</span>
                      <span>10</span>
                      <span>12</span>
                    </div>
                    <div>
                      <span>12.5</span>
                      <span>24.5</span>
                      <span>28.5</span>                  
                    </div>
                    <div>
                      <span>24</span>
                      <span>27</span>
                      <span>40</span>                  
                    </div>
                    <div>
                      <span>39</span>
                      <span>40</span>                  
                    </div>
                  </li>
                  <li>
                    <div>Clear</div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                 
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>              
                    </div>
                  </li>
                  <li>
                    <div>Frosted</div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                 
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>              
                    </div>
                  </li>
                  <li>
                    <div>Tinted</div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                 
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>              
                    </div>
                  </li>
                  <li>
                    <div>Reflective</div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                 
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>                
                    </div>
                    <div>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/not-avail.png")); ?>"></span>
                      <span><img src="<?php echo e(asset("images/site_images/images/window/avail.png")); ?>"></span>              
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="glass-compare-chart table-box" data-aos="fade-up">
            <h4 class="text-center">Glass Performance Comparison </h4>
            <div class="comparison-table">
              <div class="box">
                <div class="left">
                  <img src="<?php echo e(asset("images/site_images/images/window/safety.png")); ?>">
                  <strong>Safety & <br> Security</strong>
                </div>
                <ul>
                  <li class="head">
                    <div></div>
                    <div><strong>Single Glazed</strong></div>
                    <div><strong>Double Glazed</strong></div>
                    <div><strong>Triple Glazed</strong></div>
                  </li>
                  <li>
                    <div>Toughened</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Laminated</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                    <div>
                     NA
                    </div>
                  </li>
                </ul>
              </div>
              <div class="box">
                <div class="left">
                  <img src="<?php echo e(asset("images/site_images/images/window/volume.png")); ?>">
                  <strong>Sound</strong>
                </div>
                <ul>
                  <li class="head">
                    <div></div>
                    <div><strong>Single Glazed</strong></div>
                    <div><strong>Double Glazed</strong></div>
                    <div><strong>Triple Glazed</strong></div>
                  </li>
                  <li>
                    <div>Toughened</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span ></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span ></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span ></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Laminated</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                    <div>
                      NA
                    </div>
                  </li>
                  <li class="text"><p>Sound Insulation is function of surrounding Wall, floor, roof, door etc. Glass, Frame, Sealing between aperture too contribute towards sound insulation</p></li>
                </ul>
              </div>
              <div class="box">
                <div class="left">
                  <img src="<?php echo e(asset("images/site_images/images/window/thunder.png")); ?>">
                  <strong>Energy <br> Insulation</strong>
                </div>
                <ul>
                  <li class="head">
                    <div></div>
                    <div><strong>Single Glazed</strong></div>
                    <div><strong>Double Glazed</strong></div>
                    <div><strong>Triple Glazed</strong></div>
                  </li>
                  <li>
                    <div>Clear</div>
                    <div>
                      <span class="dark"></span>
                      <span class="light"></span>
                      <span class="light"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="light"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Tinted</div>
                    <div>
                      <span class="dark"></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="light"></span>
                      <span class="light"></span>
                      <span class="light"></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Reflected</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class=""></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Low E</div>
                    <div>
                      NA
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                  </li>
                  <li class="text"><p>Lower U value = Better insulating windows</p></li>
                </ul>
              </div>
              <div class="box">
                <div class="left">
                  <img src="<?php echo e(asset("images/site_images/images/window/idea.png")); ?>">
                  <strong>(VLT) VISUAL LIGHT <br> TRANSMISSION</strong>
                </div>
                <ul>
                  <li class="head">
                    <div></div>
                    <div><strong>Single Glazed</strong></div>
                    <div><strong>Double Glazed</strong></div>
                    <div><strong>Triple Glazed</strong></div>
                  </li>
                  <li>
                    <div>Toughened</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                    </div>
                  </li>
                  <li>
                    <div>Laminated</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Toughened</div>
                    <div>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>
                  <li>
                    <div>Laminated</div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                    <div>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span class="dark"></span>
                      <span></span>
                      <span></span>
                    </div>
                  </li>                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/glass.blade.php ENDPATH**/ ?>