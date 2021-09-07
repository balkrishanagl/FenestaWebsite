<?php $__env->startSection('title', 'Add Clientele'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Add Clientele</h1>
<?php $__env->stopSection(); ?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">

<!-- <style>
       .thumb{
           margin: 10px 5px 0 0;
           width: 300px;
       }
</style> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- <script src="<?php echo e(asset('js/jquery/1.9.1/jquery.js')); ?>" defer></script> -->

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
		 		<?php echo e(Form::open(array('url' => 'admin/saveClientele','files' => true))); ?>

			 		<div class="add_more_div">
			 			<div class="form-group">
							<?php echo e(Form::label('Heading', 'Heading*')); ?>

							<input type="text" class="form-control" name="heading">
						</div>
						<div class="form-group">
								<label for="image">Image</label>
								<input type="file" name="images" class="form-control" id="image">
                            <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
						</div>
                      
                        <div class="form-group">
					<?php echo e(Form::label('segtype', 'Segment Type*')); ?>

					<?php echo e(Form::select('segtype',
						array(
							'' => '--Select Type--',
							'Hotels' => 'Hotels',
							'Hospitals' => 'Hospitals',
							'Education Institution' => 'Education Institution',
							'Office' => 'Office',
							'Housing' => 'Housing',
							'Residential' => 'Residential',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

				</div>
                        <div class="form-group">
					<?php echo e(Form::label('zonewise', 'ZONE WISE*')); ?>

					<?php echo e(Form::select('zonewise',
						array(
							'' => '--Select Type--',
							'1' => 'South Region',
							'2' => 'North Region',
							'3' => 'West Region',
							'4' => 'East Region',
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
				<?php echo e(Form::label('showon', 'Show On Home*')); ?>

					<?php echo e(Form::select('showon',
					array(
					'Yes' => 'Yes',
					'No' => 'No',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)); ?>

			</div>
						<!-- <div>
							<button type="button" class="add">Add</button>
						</div> -->
						<div class="form-group">
							<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

    					</div>
					</div>
					
		 		<?php echo e(Form::close()); ?>

				
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
   /*function loadPreview(input){
       var data = $(input)[0].files; //this file data
       $.each(data, function(index, file){
           if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
               var fRead = new FileReader();
               fRead.onload = (function(file){
                   return function(e) {
                       var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                       $('#thumb-output').append(img);
                   };
               })(file);
               fRead.readAsDataURL(file);
           }
       });
   }*/

   /*$(document).ready(function () {
    $('.add').click(function (e) {
    	var i;
    	for(i = 1;i<=5;i++){
        	$('.add_more_div').append("<div class='form-group'><lable>Heading</label><input type='text' class='form-control' name='heading[]'></div><div class='form-group'><lable for='image'>Image</label><input type='file' class='form-control'></div>");
    	}
    });
});*/
</script>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Clientele/Clientele.blade.php ENDPATH**/ ?>