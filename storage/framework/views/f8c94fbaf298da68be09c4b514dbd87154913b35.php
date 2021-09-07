<?php $__env->startSection('title', 'Add Blog'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Blog</h1>

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
				<?php echo e(Form::open(array('url' => 'admin/saveBlog','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('meta_title', 'Blog Meta Title*')); ?>

					<?php echo e(Form::text('meta_title', null, array('class'=>'form-control','placeholder' => 'Enter Meta Title'))); ?>

				</div>

				<div class="form-group">
					<?php echo e(Form::label('meta_description', 'Blog Meta Description*')); ?>

					<?php echo e(Form::text('meta_description',null,array('class'=>'form-control','placeholder' => 'Enter Meta Description'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('meta_keyword', 'Blog Meta Keyword*')); ?>

					<?php echo e(Form::text('meta_keyword',null,array('class'=>'form-control','placeholder' => 'Enter Meta Keyword'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('blog_title', 'Blog Title*')); ?>

					<?php echo e(Form::text('blog_title',null,array('class'=>'form-control','placeholder' => 'Enter Blog Title'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('blog_url', 'Blog URL*')); ?>

					<?php echo e(Form::text('blog_url',null,array('class'=>'form-control','placeholder' => 'Enter Blog URL'))); ?>

				</div>
                <div class="form-group">
                    <?php echo e(Form::label('blog_content', 'Blog Content*')); ?>

                    <?php echo e(Form::textarea('blog_content',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Blog Content'))); ?>

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


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Blog/addBlog.blade.php ENDPATH**/ ?>