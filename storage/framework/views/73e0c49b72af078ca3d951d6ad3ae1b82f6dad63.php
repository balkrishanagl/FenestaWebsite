

<?php $__env->startSection('title', 'Edit Window & Door Type'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Window & Door Type</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
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
				<?php echo e(Form::model($type, ['url'  => ['admin/typeupdate', $type->id], 'role'=> 'form','files'=>'true'])); ?>

				
				<div class="form-group">
					<?php echo e(Form::label('Title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Type', 'Type*')); ?>

					<?php echo e(Form::select('type',array('Window'=>'Window','Door'=>'Door'),null,array('class'=>'form-control','placeholder' => 'Select'))); ?>

				</div>
				
				<div class="form-group">
                    <input type="hidden" name="exist_image" value="<?php echo e($type->image); ?>">
					<?php echo e(Form::label(' Image', ' Image*')); ?>

					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?>

				</div>
				
				<div class="form-group">
                     <input type="hidden" name="exist_hoverimage" value="<?php echo e($type->hoverimage); ?>">
					<label for="hoverimage">Hover Image</label>
					<input type="file" name="hoverimage" class="form-control" id="hoverimage">
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Windowdoor/typeedit.blade.php ENDPATH**/ ?>