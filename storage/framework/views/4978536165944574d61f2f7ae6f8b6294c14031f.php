
<?php $__env->startSection('content'); ?>
<style>
    .otpMsgSuccs{
        color:green;
    }
</style>
<div class=" upvc-window-sec">

      	<div class="thanku_wrapper">
			<div class="container">
				<?php if($content): ?>
                <?php echo $content; ?>

                <?php endif; ?>
				<div class="text-center">
					<ul class="thanku_list">
						<li><a href="<?php echo e(URL('/')); ?>">Home</a></li>
						<li><a href="<?php echo e(URL('/about-us')); ?>">About Us</a></li>
						<li><a href="<?php echo e(URL('/window')); ?>">Products</a></li>
						<li><a href="<?php echo e(URL('/style-benefits')); ?>">Why Fenesta</a></li>
						<li><a href="<?php echo e(URL('/showcase/clientele')); ?>">Solutions</a></li>
						<li><a href="https://www.fenesta.com/VisualizeDesign/index.html">Customize</a></li>
						<li><a href="<?php echo e(URL('/locate-us')); ?>">Contact Us</a></li>
					</ul>                                                 
				</div>	
				<?php if($about): ?>
                <?php echo $about; ?>

                <?php endif; ?>
				
				<div class="science_block">
					<h3>Science @ Work</h3>
					<div class="owl-carousel science_carousel">
                         <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                              <?php  $tit = explode(' ',$ffbb->othername) ?>
                  
						<div class="item">
							<div class="icon">
								<a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"><img src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>" alt="<?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?>"></a>
							</div>
							<p><span><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?></span> <?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></p>
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('frontend._partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/thankyou.blade.php ENDPATH**/ ?>