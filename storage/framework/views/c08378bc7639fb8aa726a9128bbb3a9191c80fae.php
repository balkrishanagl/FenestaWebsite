<?php $__env->startSection('title', 'Add Trim Option'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Trim Option</h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>
	<script>
      $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="100px" style="margin:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('.image').on('change', function() {
        $('.preview').show();
        imagesPreview(this, 'div.preview');
    });
});  
    
</script>
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
				<?php echo e(Form::open(array('url' => 'admin/saveTrim','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('type', ' Type*')); ?>

					<?php echo e(Form::select('type',
						array(
							'' => '--Select Type--',
							'Single' => 'Single Image',
							'Multi' => 'Multi Image',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

				</div>

				<div class="form-group">
					<?php echo e(Form::label('title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
			
			<div class="form-group">
					<?php echo e(Form::label('image', 'Image*')); ?>

				<input required type="file" class="form-control image" name="image[]"  multiple>
                <br>
                <div class="preview" style="display:none;"></div>
                       
				</div>
			<div class="form-group">
				<?php echo e(Form::label('description', 'Content*')); ?>

				<?php echo e(Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content'))); ?>

			</div><div class="form-group">
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
				<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

			</div>
			<?php echo e(Form::close()); ?>

		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Trim/addTrim.blade.php ENDPATH**/ ?>