

<?php $__env->startSection('title', 'Edit News'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit News</h1>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>
<script>
        
             function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag').show();
            $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
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
				<?php echo e(Form::model($news, ['url'  => ['admin/updateNews', $news->id], 'role'=> 'form','files'=>'true'])); ?>

				<div class="form-group">
					<?php echo e(Form::label('meta_title', 'Upload Type*')); ?>

					<?php echo e(Form::select('upload_type',
						array(
							'' => '--Select Type--',
							'1' => 'Press Releases',
							'2' => 'Press Coverage',
							'3' => 'Advertisements',
							'4' => 'Events & Exhibitions'
                
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
				<?php echo e(Form::label('detail', 'Detail*')); ?>

				<?php echo e(Form::text('detail',null,array('class'=>'form-control','placeholder' => 'Enter Detail'))); ?>

			</div>
			<div class="form-group">
					<?php echo e(Form::label('image', 'Image*')); ?>

                
                 <label class="note"> ( Size : 300 * 150 ) </label>
					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?>

                 <br>
                    <?php if($news->image): ?>
                       <img src="<?php echo e(asset("images/news/$news->image")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
				</div>
			<div class="form-group">
				<?php echo e(Form::label('content', 'Content*')); ?>

				<?php echo e(Form::textarea('content',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content'))); ?>

			</div> <div class="form-group">
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


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/News/editNews.blade.php ENDPATH**/ ?>