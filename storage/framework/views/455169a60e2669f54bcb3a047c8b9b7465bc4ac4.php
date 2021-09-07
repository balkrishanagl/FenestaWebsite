
<?php $__env->startSection('content'); ?>
<?php
use App\Models\WindowType;
?>
        <div class=" internal-door-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="inner-banner">  
  <style> 
      .switch a{
          bottom:150px;
      }
      .section .owl-nav button, .section .blue-btn {
    opacity: 1;
}
  </style> 
  
       <?php if(empty($banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/blog-mobile-banner.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/blog-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$banner_image)); ?>">
        </picture> 
        <?php endif; ?> 
        
        <div class="heading"><div class="container-fluid">     
            <?php if(!empty($title)): ?>
          <h1>   <?php echo $title; ?></h1>
        <?php else: ?>
          <h1> <?php echo e($ptype); ?>   </h1>
        <?php endif; ?>
           </div></div> 
     <div class="certified"><div class="container-fluid"><img src="<?php echo e(asset('images/site_images/images/internal-door/certified.png')); ?>"></div></div>
    <?php if($ptype=='Window'): ?>
        <div class="switch"><a href="<?php echo e(url('/door')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Doors</a></div>
    
    <?php else: ?>
    
        <div class="switch"><a href="<?php echo e(url('/window')); ?>"> <img src="<?php echo e(asset('images/site_images/door-icon.png')); ?>"> Switch to <br> Windows</a></div>
    
    <?php endif; ?>
      </div>
        <div class="inner-page-content">
                <div class="container-fluid">
                    <?php if($short_description): ?>
                    <?php echo $short_description; ?>

                    <?php endif; ?>
                   
                </div>
              </div>
      
      
		<div class="select_door">
			<div class="container">
				<h2><?php echo $series_content; ?></h2>
				<div class="sd_tabs">
					<div class="outer_tabs" data-aos="zoom-in">
						<h4>Available Range</h4>
					
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" id="premium-range-tab" data-toggle="tab" href="#premium-range" aria-controls="premium-range">
									<div class="image">
										<img src="<?php echo e(asset('images/internal-door/door1.jpg')); ?>" alt="">
									</div>
									<h6>Premium Range</h6>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="luxury-range-tab" data-toggle="tab" href="#luxury-range" aria-controls="luxury-range">
									<div class="image">
										<img src="<?php echo e(asset('images/internal-door/door2.jpg')); ?>" alt="">
									</div>
									<h6>Luxury Range</h6>
								</a>
							</li> 
						</ul>
						<p>APPERTURE SIZE – Min 750X2100mm. Max 1000X2400mm</p>
					</div>	
					<div class="tab-content outer_tc">
						<div class="tab-pane fade show active" id="premium-range" aria-labelledby="premium-range-tab">
							<div class="tab-content" data-aos="zoom-in">
								<div class="tab-pane fade show active" id="white-oak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Premium-White-Oak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>	
								</div>
								<div class="tab-pane fade" id="natura-oak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Premium-Natural-Oak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="teak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Premium-Teak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="walnut">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Premium-Walnut.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
							</div>
							<div class="inner_tabs" data-aos="zoom-in">
								<h4>Available Colours</h4>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id="white-oak-tab" data-toggle="tab" href="#white-oak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color1.jpg')); ?>" alt="">
											</div>
											<h6>White Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="natura-oak-tab" data-toggle="tab" href="#natura-oak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color2.jpg')); ?>" alt="">
											</div>
											<h6>Natura Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="teak-tab" data-toggle="tab" href="#teak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color3.jpg')); ?>" alt="">
											</div>
											<h6>Teak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="walnut-tab" data-toggle="tab" href="#walnut">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color4.jpg')); ?>" alt="">
											</div>
											<h6>Walnut</h6>
										</a>
									</li>
								</ul>
								<p>Other Colours and designs available on request* T&C Apply</p>
							</div>	
						</div>
						<div class="tab-pane fade" id="luxury-range" aria-labelledby="luxury-range-tab">
							<div class="tab-content" data-aos="zoom-in">
								<div class="tab-pane fade show active" id="luxury-white-oak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Luxury-White-Oak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-natura-oak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Luxury-Natural-Oak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-teak">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Luxury-Teak.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-walnut">
									<div class="mid_img">
										<div class="image">
											<img src="<?php echo e(asset('images/internal-door/Luxury-Walnut.png')); ?>" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
							</div>
							<div class="inner_tabs" data-aos="zoom-in">
								<h4>Available Colours</h4>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id="luxury-white-oak-tab" data-toggle="tab" href="#luxury-white-oak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color1.jpg')); ?>" alt="">
											</div>
											<h6>White Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-natura-oak-tab" data-toggle="tab" href="#luxury-natura-oak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color2.jpg')); ?>" alt="">
											</div>
											<h6>Natura Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-teak-tab" data-toggle="tab" href="#luxury-teak">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color3.jpg')); ?>" alt="">
											</div>
											<h6>Teak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-walnut-tab" data-toggle="tab" href="#luxury-walnut">
											<div class="image">
												<img src="<?php echo e(asset('images/internal-door/color4.jpg')); ?>" alt="">
											</div>
											<h6>Walnut</h6>
										</a>
									</li>
								</ul>	
								<p>Other Colours and designs available on request* T&C Apply</p>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
            
            
            
      <div class="feature-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Features & Benefits</h4>
            <div class="content text-center" data-aos="fade-up" >
              <?php echo $feature_benefits; ?>


            </div>
            <div class="feature-slider owl-carousel">
                <?php $tim=0; ?>
                <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" data-aos="fade-right" <?php if($key>0 and $key<4): ?> data-aos-delay="<?php echo e($tim=$tim+200); ?>" <?php endif; ?> >
                    
                <img class="nohover" src="<?php echo e(asset("images/arange/$ff->image")); ?>">
                <span><?php echo e($ff->title); ?> </span>
              </div>       
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
         
          </div>
        </div>
      </div>
		
		<div class="wooden_fenesta">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="wooden_section">
							<div class="img_block" data-aos="fade-right" data-aos-delay="400">
								<div class="image">
									<img src="<?php echo e(asset("images/options/$woodenimage")); ?>" alt="">
								</div>
								<h4>Wooden</h4>
							</div>
							<div class="cont_block" data-aos="fade-left" data-aos-delay="400">
								<ul>
                                    <?php $__currentLoopData = $woodenoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wwoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<div class="icon">
											<img src="<?php echo e(asset("images/options/$wwoo->image")); ?>" alt="<?php echo e($wwoo->title); ?>">
										</div>
										<?php echo e($wwoo->title); ?>

									</li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					</div>
					<span class="vs" data-aos="zoom-in">
						Vs
					</span>
					<div class="col-md-6">
						<div class="fenesta_section">
							<div class="img_block" data-aos="fade-right" data-aos-delay="800">
								<div class="image">
									<img src="<?php echo e(asset("images/options/$fenestaimage")); ?>" alt="">
								</div>
								<h4>Fenesta</h4>
							</div>
							<div class="cont_block" data-aos="fade-left" data-aos-delay="800">
								<ul>
                                       <?php $__currentLoopData = $fenestaoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ffoo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<div class="icon">
											<img src="<?php echo e(asset("images/options/$ffoo->image")); ?>" alt="<?php echo e($ffoo->title); ?>">
										</div>
										<?php echo e($ffoo->title); ?>

									</li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		
      <div class="hardware-access-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Hardware & Accessories</h4>
          <p class="text-center" data-aos="fade-up">Fenesta Internal Doors come with below accessories as a standard offering</p>
			<div class="hardware_wrap">
				<h3 data-aos="fade-up">Handle</h3>
				<div class="owl-carousel hardware-list">
                    <?php $i=0; $ik=0; ?>
                    <?php $__currentLoopData = $handlelocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hhll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item" data-aos="fade-right" <?php if($i>0): ?> data-aos-delay="<?php echo e($ik=$ik+200); ?>" <?php endif; ?>>
						<div class="inner">
                      <div class="top">
                        <div class="image"><img src="<?php echo e(asset('images/handlelock/'.$hhll->image)); ?>" alt="<?php echo e($hhll->title); ?>"></div>
                        <h6><?php echo e($hhll->title); ?></h6>
                      </div>
                      
						</div>	
                    </div>
                    <?php $i=$i+1; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
			</div>
			<div class="hardware_wrap">
				<h3 data-aos="fade-up">Accessories</h3>
				<div class="owl-carousel hardware-list">
                     <?php $i=0; $ik=0; ?>
                    <?php $__currentLoopData = $acessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hhll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item" data-aos="fade-right" <?php if($i>0): ?> data-aos-delay="<?php echo e($ik=$ik+200); ?>" <?php endif; ?>>
						<div class="inner">
                      <div class="top">
                        <div class="image"><img src="<?php echo e(asset('images/handlelock/'.$hhll->image)); ?>" alt="<?php echo $hhll->title; ?>"></div>
                        <h6><?php echo $hhll->title; ?></h6>
                      </div>
                      <div class="bottom">
                        <strong><?php echo e($hhll->acessories_type); ?></strong>
                        <p><?php echo e($hhll->content); ?></p>
                      </div>
						</div>	
                    </div>
					 <?php $i=$i+1; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
			</div>
         
          <div class="content" data-aos="fade-up">
            <?php if($content): ?>
                    <?php echo $content; ?>

                    <?php endif; ?>
          </div>
        </div>
      </div>
      
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.relatedblog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/windowdoors/internal_doors.blade.php ENDPATH**/ ?>