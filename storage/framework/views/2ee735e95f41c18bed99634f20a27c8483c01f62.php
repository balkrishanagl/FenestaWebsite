

<?php $__env->startSection('title', 'Edit Brochure Product'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Brochure Product</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
        
        function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.pdfview').show();
            $($.parseHTML('<a target="_blank" ><i style="font-size:30px" class="fa fa-file "></i></a>')).attr('href', e.target.result).appendTo('div.pdfview');
              
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pdf").change(function(){
        readURL1(this);
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
				<?php echo e(Form::model($banner, ['url'  => ['admin/Brochureupdate', $banner->id], 'role'=> 'form','files'=>'true'])); ?>

				
				<div class="form-group">
					<?php echo e(Form::label('Title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				
				
				<div class="form-group">
                    <input type="hidden" name="exist_image" value="<?php echo e($banner->image); ?>">
					<?php echo e(Form::label('image', ' Image*')); ?>

					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?><br>
                     <?php if(!empty($banner->image)): ?>
                       <img src="<?php echo e(asset("images/brochure/$banner->image")); ?>" id="category-img-tag" width="200px" />
                    <?php else: ?>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
                    <?php endif; ?>
				</div>
				
				<div class="form-group">
                     <input type="hidden" name="exist_pdf" value="<?php echo e($banner->pdf); ?>">
					<label for="pdf">PDF*</label>
					<input type="file" name="pdf" class="form-control" id="pdf">
                    <?php if(!empty($banner->pdf)): ?>
                    
                    <br>
                    <div class="pdfview">
                    <a target="_blank" href="<?php echo e(asset("images/brochure/$banner->pdf")); ?>"><i style="font-size:30px" class="fa fa-file "></i></a>
                    </div>
                    <?php else: ?>
                    <br>
                    <div class="pdfview" style="display:none"></div>
                    <?php endif; ?>
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
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/brochure/edit.blade.php ENDPATH**/ ?>