<?php $__env->startSection('title', 'Add Banner'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Banner</h1>
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

    $("#home_banner_small").change(function(){
        readURL(this);
    });
         


        function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag1').show();
            $('#category-img-tag1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#home_banner_image").change(function(){
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
				<?php echo e(Form::open(array('url' => 'admin/saveBanner','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('Heading', 'Heading*')); ?>

					<?php echo e(Form::text('heading',null,array('class'=>'form-control','placeholder' => 'Enter Heading'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Sub-Heading', 'Sub Heading*')); ?>

					<?php echo e(Form::text('sub_heading',null,array('class'=>'form-control','placeholder' => 'Enter Sub Heading'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Hover-Heading', 'Hover Heading*')); ?>

					<?php echo e(Form::text('hover_heading',null,array('class'=>'form-control','placeholder' => 'Enter Hover Heading'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Hover-sub-heading', 'Hover SubHeading*')); ?>

					<?php echo e(Form::text('hover_sub_heading',null,array('class'=>'form-control','placeholder' => 'Enter SubHeading'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Home Banner Small', 'Home Banner Small*')); ?>

					<?php echo e(Form::file('home_banner_small',array('class'=>'form-control'))); ?>

                     <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					<?php echo e(Form::label('Home Banner', 'Home Banner*')); ?>

					<?php echo e(Form::file('home_banner_image',array('class'=>'form-control'))); ?>

                     <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
				</div>
				<div class="form-group">
                   
					<?php echo e(Form::label('regions', 'Regions*')); ?>

					<?php echo e(Form::select('regions',$regions,null,array('class'=>'form-control'))); ?>

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
					<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

    			</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Banner/addBanner.blade.php ENDPATH**/ ?>