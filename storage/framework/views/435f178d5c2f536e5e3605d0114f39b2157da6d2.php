

<?php $__env->startSection('title', 'Edit Service'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit <?php if($banner->type==2): ?> Durable safe <?php else: ?> End to End <?php endif; ?>  Service</h1>
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
            $('#category-img-tag1').show();
            $('#category-img-tag1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#onhoverimage").change(function(){
        readURL1(this);
    });
        function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag2').show();
            $('#category-img-tag2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#mainimage").change(function(){
        readURL2(this);
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
				<?php echo e(Form::model($banner, ['url'  => ['admin/endtoend/update', $banner->id], 'role'=> 'form','files'=>'true'])); ?>

				<input type="hidden" name="type" value="<?php echo e($banner->type); ?>">
				<div class="form-group">
					<?php echo e(Form::label('Title', 'Title*')); ?>

					<?php echo e(Form::text('heading',$banner->title,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				
				<div class="form-group">
					<?php echo e(Form::label('image', ' Icon*')); ?>

                     <label class="note"> ( Size : 50 * 50 ) </label>
					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?>

                     <br>
                    <?php if($banner->image): ?>
                       <img src="<?php echo e(asset("images/services/$banner->image")); ?>" id="category-img-tag" width="50px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="50px" />
                    <?php endif; ?>
				</div>
				
				<?php if($banner->type==2): ?>
                  <div class="form-group">
					<?php echo e(Form::label('onhoverimage', ' On Hover Icon*')); ?>

                       <label class="note"> ( Size : 50 * 50 ) </label>
					<?php echo e(Form::file('onhoverimage',array('class'=>'form-control'))); ?>

                       <br>
                    <?php if($banner->onhoverimage): ?>
                       <img src="<?php echo e(asset("images/services/onhover/$banner->onhoverimage")); ?>" id="category-img-tag1" width="50px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag1" width="50px" />
                    <?php endif; ?>
				</div>
                  <div class="form-group">
					<?php echo e(Form::label('mainimage', 'Image*')); ?>

                       <label class="note"> ( Size : 350 * 450 ) </label>
					<?php echo e(Form::file('mainimage',array('class'=>'form-control'))); ?>

                       <br>
                    <?php if($banner->mainimage): ?>
                       <img src="<?php echo e(asset("images/services/rightimage/$banner->mainimage")); ?>" id="category-img-tag2" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag2" width="150px" />
                    <?php endif; ?>
				</div>
                
                <div class="form-group">
					<?php echo e(Form::label('contentheading', 'Heading*')); ?>

					<?php echo e(Form::text('contentheading',null,array('class'=>'form-control','placeholder' => 'Enter Heading','required'=>'required'))); ?>

				</div>
                <div class="form-group">
					<?php echo e(Form::label('content', 'Content*')); ?>

					<?php echo e(Form::textarea('content',null,array('class'=>'form-control','placeholder' => 'Enter Content','required'=>'required'))); ?>

				</div>
                <?php endif; ?> 
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
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/endtoend/edit.blade.php ENDPATH**/ ?>