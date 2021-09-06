

<?php $__env->startSection('title', 'Project Settings'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Project Settings</h1>
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
					<?php echo e(Form::model('',['url'  => ['admin/projectsettingsave'], 'role'=> 'form','files'=>'true'])); ?>

					<div class="card-body">
					
						
						<div class="form-group">
                            <input type="hidden" name="exist_logo" value="<?php echo e($logo); ?>">
                            
							<label for="logo">Logo</label>
                            <br>
                            <img src=<?php echo asset("images/logo/$logo"); ?> alt="no">
							<input type="file" name="logo" class="form-control" id="logo">
						</div>
					
                        <div class="form-group">
							<?php echo e(Form::label('facebook', 'Facebook Link')); ?>

							<?php echo e(Form::text('facebook', (isset($facebook)) ? $facebook : null, array('class'=>'form-control','placeholder' => 'Facebook Link'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('twitter', 'Twitter Link')); ?>

							<?php echo e(Form::text('twitter', (isset($twitter)) ? $twitter : null, array('class'=>'form-control','placeholder' => ' Twitter Link'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('insta', 'Instagram link')); ?>

							<?php echo e(Form::text('insta', (isset($insta)) ? $insta : null, array('class'=>'form-control','placeholder' => ' Instagram link'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('youtube', 'Youtube')); ?>

							<?php echo e(Form::text('youtube', (isset($youtube)) ? $youtube : null, array('class'=>'form-control','placeholder' => ' Youtube Link'))); ?>

						</div>

                        <div class="form-group">
							<?php echo e(Form::label('linkedin', 'Linkedin Link')); ?>

							<?php echo e(Form::text('linkedin', (isset($linkedin)) ? $linkedin : null, array('class'=>'form-control','placeholder' => ' Linkedin Link'))); ?>

						</div>

                        <div class="form-group">
							<?php echo e(Form::label('copyright', 'Copyright')); ?>

							<?php echo e(Form::text('copyright', (isset($copyright)) ? $copyright : null, array('class'=>'form-control','placeholder' => ' Copyright'))); ?>

						</div>

                        <div class="form-group">
							<?php echo e(Form::label('playstore', 'Playstore link')); ?>

							<?php echo e(Form::text('playstore', (isset($playstore)) ? $playstore : null, array('class'=>'form-control','placeholder' => ' Playstore link'))); ?>

						</div>

                        <div class="form-group">
							<?php echo e(Form::label('appstore', 'Appstore link')); ?>

							<?php echo e(Form::text('appstore', (isset($appstore)) ? $appstore : null, array('class'=>'form-control','placeholder' => ' Appstore link'))); ?>

						</div>

                        <div class="form-group">
							<?php echo e(Form::label('subscribetitle', 'Subscribe Title')); ?>

							<?php echo e(Form::text('subscribetitle', (isset($subscribetitle)) ? $subscribetitle : null, array('class'=>'form-control','placeholder' => ' Subscribe Title'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('headerphoneno', ' Header Phone No')); ?>

							<?php echo e(Form::text('headerphoneno', (isset($headerphoneno)) ? $headerphoneno : null, array('class'=>'form-control','placeholder' => ' Header Phone No'))); ?>

						</div>

					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/projectsetting/edit.blade.php ENDPATH**/ ?>