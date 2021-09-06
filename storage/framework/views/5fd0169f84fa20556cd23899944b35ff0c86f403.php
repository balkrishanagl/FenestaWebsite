<?php $__env->startSection('title', 'Add page'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Add New Page</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/listPage"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>

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

    $("#banner_image").change(function(){
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
				<form role="form" id="add_page" enctype="multipart/form-data" action="savePage" method="post" >
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="card-body">
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
                            <label class="note"> ( Image Size : 1600 * 400 ) </label>
							<input type="file" name="banner_image" class="form-control" id="banner_image"><br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
						</div>
						<div class="form-group">
							<label for="page_title">Page Title</label>
							<input type="text" name="page_title" class="form-control" id="page_title" placeholder="Page Title">
						</div>
						<div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
						<div class="form-group">
							<label for="about">About Fenesta Description</label>

							<textarea id="about" name="about" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
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
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-default" href="<?php echo e(URL::to('/')); ?>/admin/listPage"> Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/addPage.blade.php ENDPATH**/ ?>