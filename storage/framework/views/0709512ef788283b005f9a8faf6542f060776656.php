<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Dashboard</h1>
<?php $__env->stopSection(); ?>
<?php
use Illuminate\Support\Facades\DB;
$user_journey = DB::table('site_visits')->count();
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>

   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<a href="<?php echo e(url('/admin/site-visiter')); ?>">
							<div style="    padding: 20px;
    background-color: #0b85bb;
    color: #fff;" class="widget-bg-color-icon card">
								<div class="bg-icon bg-icon-info pull-left">
									<h5><i class="fa fa-road fa-3x"></i></h5>
								</div>
								<div class="text-right m-t-10">
									<h1 class=" m-t-10"><b class="counter">
										 <?php if(isset($user_journey)){echo $user_journey;}else{echo 0;}; ?>
										</b></h1>
									<h3 class="mb-0 c-i"> User Journey</h3>
								</div>
								<div class="clearfix"></div>
							</div>
							</a>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\fenestalive\FenestaWebsite\resources\views/home.blade.php ENDPATH**/ ?>