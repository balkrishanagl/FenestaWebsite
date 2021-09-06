<?php $__env->startSection('title', 'Add Testimonial'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Testimonial</h1>

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

    $("#user_image").change(function(){
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

    $("#reference_image").change(function(){
        readURL1(this);
    });
             
        
     var urla = "<?php echo e(url('/')); ?>/admin/getstate";//should return json with a list of cities only   
         $.ajax({
        url:urla,
        dataType:'html',
        success: function(items){
            $('#state').html(items);
        }
    })
        
        
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
				<?php echo e(Form::open(array('url' => 'admin/saveTestimonial','files' => true))); ?>

				<div class="form-group">
					<?php echo e(Form::label('name', 'Name*')); ?>

					<?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('description', 'Description*')); ?>

					<?php echo e(Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('youtube_url', 'YouTube URL*')); ?>

					<?php echo e(Form::text('youtube_url',null,array('class'=>'form-control','placeholder' => 'Enter YouTube URL'))); ?>

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
					'' => '--Select category--',
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
					<?php echo e(Form::label('user_image', 'User Image*')); ?>

                    <label class="note"> ( Size : 150 * 150 ) </label>
					<?php echo e(Form::file('user_image',array('class'=>'form-control'))); ?>

                    <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					<?php echo e(Form::label('reference_image', 'Reference Image*')); ?>

                    <label class="note"> ( Size : 400 * 450 ) </label>
					<?php echo e(Form::file('reference_image',array('class'=>'form-control'))); ?>

                    <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
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

				<!-- <div class="custom-file mb-3">
			      <input type="file" class="custom-file-input" id="customFile" name="filename">
			      <label class="custom-file-label" for="customFile">Choose file</label>
			    </div> -->
 <div class="form-group">
   
				<div class="form-group">
					<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

				</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Testimonials/addTestimonial.blade.php ENDPATH**/ ?>