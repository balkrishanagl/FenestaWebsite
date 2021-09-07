

<?php $__env->startSection('title', 'Edit Series'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Series</h1>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>
<script>
      $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});  
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
				<?php echo e(Form::model($news, ['url'  => ['admin/updateSeries', $news->id], 'role'=> 'form','files'=>'true'])); ?>

				

				<div class="form-group">
					<?php echo e(Form::label('title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
			
			<div class="form-group">
					<?php echo e(Form::label('image', 'Image* (Leave Blank if not want to edit)')); ?>

					<input type="file" class="form-control" name="image" id="image" >
                <br>
                    <?php if($news->image): ?>
                       <img src="<?php echo e(asset("images/series/$news->image")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
                
				</div>
			<div class="form-group">
				<?php echo e(Form::label('description', 'Content*')); ?>

				<?php echo e(Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content'))); ?>

			</div>
			<div class="form-group">
				<?php echo e(Form::label('feature', 'Feature*')); ?>

				<?php echo e(Form::textarea('feature',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Feature'))); ?>

			</div>
                
                                            <?php
                            $showarray = explode(',',$news->product);
                           
                            ?>
                
                
                  <div class="form-group">
					<?php echo e(Form::label('product_ids', 'Product*')); ?>

                            
					<select name="product_ids[]" id="product_ids" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                            
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option <?php echo (in_array($ppo->id,$showarray))?'selected':'';?> value="<?php echo $ppo->id;?>" >  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                              
                            <?php } ?>
                            </optgroup>
                           
                    </select>
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


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Series/editSeries.blade.php ENDPATH**/ ?>