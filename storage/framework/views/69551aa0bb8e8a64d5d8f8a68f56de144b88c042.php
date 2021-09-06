<?php $__env->startSection('title', 'Add Testimonial'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Testimonial</h1>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<?php if($message = Session::get('success')): ?>
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong><?php echo e($message); ?></strong>
			</div>
			<?php endif; ?>

			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

					
			<div class="card-body">
				<?php echo e(Form::open(array('url' => 'admin/saveFaqAnswer','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('Faq', 'Faq*')); ?>

					<?php echo Form::select('faq_id', $select, null, ['class'=>'form-control']); ?>

					
				</div>
				<div class="form-group">
					<?php echo e(Form::label('answer', 'Answer*')); ?>

					<?php echo e(Form::text('answer',null,array('class'=>'form-control','placeholder' => 'Enter Answer'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

				</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/FaqAnswer/addAnswer.blade.php ENDPATH**/ ?>