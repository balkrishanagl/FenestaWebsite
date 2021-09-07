

<?php $__env->startSection('title', 'Add Door Product'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Door Product</h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>

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
				<?php echo e(Form::open(array('url' => 'admin/Door/typesave','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('Title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				<div class="form-group" style="display:none">
					<?php echo e(Form::label('Type', 'Type*')); ?>

					 <select name="type" id="type"  class="form-control select">
                      <option value="">Select</option>
                      <option value="Window">Window</option>
                      <option selected value="Door">Door</option>
                       
                    </select>
				</div>
			
				<div class="form-group">
					<?php echo e(Form::label(' Image', ' Image*')); ?>

					<?php echo e(Form::file('fullimage',array('class'=>'form-control'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label(' Image', ' Icon*')); ?>

					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Hover Image', 'Hover Icon*')); ?>

					<?php echo e(Form::file('hoverimage',array('class'=>'form-control'))); ?>

				</div>
                 <div class="form-group">
				<?php echo e(Form::label('status', 'Status*')); ?>

					<?php echo e(Form::select('status',
					array(
					'Active' => 'Active',
					'Inactive' => 'Inactive',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)); ?>

			</div>
                
                <div class="form-group">
							<label for="meta_title">Meta Title*</label>
							<input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title">
						</div>
						<div class="form-group">
							<label for="meta_keyword">Meta Keyword*</label>
							<input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Meta Keyword">
						</div>
						<div class="form-group">
							<label for="meta_description">Meta Description*</label>
							<textarea name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"></textarea>
						</div>
                
                <div class="form-group">
							<label for="banner_image">Banner Image</label>
							<input type="file" name="banner_image" class="form-control" id="banner_image">
						</div>
                
                <div class="form-group">
							<label for="page_description">Short Description</label>

							<textarea id="short_description" name="short_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
                
                             
                <div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
                
                <div class="form-group">
							<label for="feature_benefits">Feature Benefits</label>

							<textarea id="feature_benefits" name="feature_benefits" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Door/typeadd.blade.php ENDPATH**/ ?>