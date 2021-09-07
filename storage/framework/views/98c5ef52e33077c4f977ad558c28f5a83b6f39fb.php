
<?php $__env->startSection('content'); ?>

        <div class="mesh-grill">
                <div class="breadcum position-static">
			<div class="container-fluid">
				<div class="breadcum-box">             
					<a href="<?php echo e(url('/')); ?>">Home <span>»</span></a>
					<span>Brochure</span>
				</div>
			</div>
        </div>
           
		<div class="brochure_wrap">
			<div class="container">
				  <?php if($content): ?>
                      <?php echo $content; ?>

                    <?php endif; ?>
				<form action="<?php echo e(url('/submit-brochure')); ?>" id="brochure" method="post" name="brochure">
                   <?php echo csrf_field(); ?>
				<div class="row">
                    
					<div class="col-md-7">
						<div class="owl-carousel brochure_carousel">
                            <?php $__currentLoopData = $bro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $bb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="item">
								<div class="inner">
									<div class="img_block">
										<img src="<?php echo e(asset("images/brochure/$bb->image")); ?>" alt="<?php echo e($bb->title); ?>">
									</div>
									<div class="copy">
										<div class="form-group">
											<input type="checkbox" class="checkboxcls" name="brochure_id" value="<?php echo e($bb->id); ?>" id="one<?php echo e($kk); ?>">
											<label for="one<?php echo e($kk); ?>"><?php echo e($bb->title); ?></label>
										</div>
										
									</div>
								</div>
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="borchure_form">
							<p>Please Enter Your Details</p>
							
								<div class="form-group">
									<input name="username" required type="text" class="form-control" id="username" placeholder="Name*">
									<span><img src="<?php echo e(asset('images/site_images/broucher-icon1.png')); ?>" alt=""></span>
								</div>
                                <div class="error" id="error_username" ></div>
								<div class="form-group">
									<input name="userphone" id="userphone" required type="text" class="form-control" placeholder="Phone No*">
									<span><img src="<?php echo e(asset('images/site_images/broucher-icon2.png')); ?>" alt=""></span>
								</div>
                                <div class="error" id="error_userphone" ></div>
								<div class="form-group">
									<input name="email" id="email" required type="email" class="form-control" placeholder="Email*">
									<span><img src="<?php echo e(asset('images/site_images/broucher-icon3.png')); ?>" alt=""></span>
								</div>
                                <div class="error" id="error_email" ></div>
								<div class="form-group">
									<button  id="submit-btn-brochure" class="btn"><img src="<?php echo e(asset('images/site_images/broucher-icon4.png')); ?>" alt="">DOWNLOAD BROCHURE</button>
								</div>
                                <div class="message-box message-box-brochure" style="display:none;"> <span class="message-text"></span> </div>
                                <div class="message-error-box message-error-box-brochure" style="display:none;"> <span class="message-text"></span> </div>
                         
								<small>Mandatory Fields*</small>
							
						</div>
					</div>
                   
				</div> </form>
			</div>
		</div>

    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/brochure.blade.php ENDPATH**/ ?>