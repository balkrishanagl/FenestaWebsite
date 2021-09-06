

<?php $__env->startSection('title', 'Edit Banner'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Banner</h1>
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
        
        
        
     var urla = "<?php echo e(url('/')); ?>/admin/editgetstate";//should return json with a list of cities only 
        var id = "<?php echo e($appreciation->state); ?>";
        var data = {'id':id};
         $.ajax({
        url:urla, 
          data:data,
        dataType:'html',
        success: function(items){
            $('#state').html(items);
                    
             $('#state').change(function(){
                var url = "<?php echo e(url('/')); ?>/admin/editgetcity/";//should return json with a list of cities only
                var std = $(this).find(':selected').data('id');
                var id = "<?php echo e($appreciation->city); ?>";
            //    alert(std);
                var datas = {'state':std ,'id':id};
                $.ajax({
                    url:url,
                    type: 'GET',
                    data:datas,
                    dataType:'html',
                    success: function(items){
                         $('#city').html(items);
                    }
                })
            }).change();
            
        }
    });
        

 $('#state').change(function(){
    var url = "<?php echo e(url('/')); ?>/admin/getcity";//should return json with a list of cities only
    var std = $(this).find(':selected').data('id');
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('#city').html(items);
        }
    })
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
				<?php echo e(Form::model($appreciation, ['url'  => ['admin/updateAppreciation', $appreciation->id], 'role'=> 'form','files'=>'true'])); ?>

				<div class="form-group">
					<?php echo e(Form::label('Name', 'Name*')); ?>

					<?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('Description', 'Description*')); ?>

					<?php echo e(Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description'))); ?>

				</div>

				
                <div class="form-group">
					<?php echo e(Form::label('state', 'State*')); ?>

				
                    
                    <?php echo e(Form::select('state',
						array(
							'' => '--Select state--',
							
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

                    
                    
				</div>
                
				<div class="form-group">
					<?php echo e(Form::label('city', 'City*')); ?>

				
                    
                    <?php echo e(Form::select('city',
						array(
							'' => '--Select City--',
							
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

                    
				</div>
				
                <div class="form-group">
				<?php echo e(Form::label('category', 'Category*')); ?>

					<?php echo e(Form::select('category',
					array(
					'' => '--Select Type--',
					'1' => 'Home',
					'2' => 'Retail',
					'3' => 'Projects'
					),
					null,
					array(
					'class' => 'form-control'
					)
					)); ?>

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
					<label for="image">Image</label> 
                    <label class="note"> ( Size : 150 * 150 ) </label>
					<input type="file" name="image" class="form-control" id="image">
                    <br>
                    <?php if($appreciation->image): ?>
                       <img src="<?php echo e(asset("images/appreciation/$appreciation->image")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Appreciation/editAppreciation.blade.php ENDPATH**/ ?>