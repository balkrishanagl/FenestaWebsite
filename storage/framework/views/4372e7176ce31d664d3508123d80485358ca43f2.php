

<?php $__env->startSection('title', 'Edit Blog'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Blog</h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
	<script>
     var urla = "<?php echo e(url('/')); ?>/admin/editgetstate";//should return json with a list of cities only 
        var id = "<?php echo e($office->state); ?>";
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
                var id = "<?php echo e($office->city); ?>";
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
				<?php echo e(Form::model($office, ['url'  => ['admin/updateOffice', $office->id], 'role'=> 'form','files'=>'true'])); ?>

				<div class="form-group">
					<?php echo e(Form::label('contact_person', 'Contact Person*')); ?>

					<?php echo e(Form::text('contact_person', null, array('class'=>'form-control','placeholder' => 'Enter Contact Person'))); ?>

				</div>

				<div class="form-group">
					<?php echo e(Form::label('email', 'Email*')); ?>

					<?php echo e(Form::email('email', null, array('class'=>'form-control','placeholder' => 'Enter Email'))); ?>

				</div>

				<div class="form-group">
					<?php echo e(Form::label('phone', 'Phone*')); ?>

					<?php echo e(Form::number('phone', null, array('class'=>'form-control','placeholder' => 'Enter Phone'))); ?>

				</div>

				
                <div class="form-group">
					<?php echo e(Form::label('state', 'State*')); ?>

				
                    
                    <?php echo e(Form::select('state',
						array(
							'' => '--Select state--',
							
						),
						$office->state,
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
						$office->city,
						array(
							'class' => 'form-control'
						)
					)); ?>

                    
				</div>
				
                <div class="form-group">
					<?php echo e(Form::label('locality', 'Locality*')); ?>

					<?php echo e(Form::text('locality',null,array('class'=>'form-control','placeholder' => 'Enter Locality'))); ?>

				</div>
                <div class="form-group">
					<?php echo e(Form::label('video_url', 'Video Url*')); ?>

					<?php echo e(Form::text('video_url',null,array('class'=>'form-control','placeholder' => 'Enter Video Url'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('address', 'Address*')); ?>

					<?php echo e(Form::text('address',null,array('class'=>'form-control','placeholder' => 'Enter Address'))); ?>

				</div>
                <div class="form-group">
					<?php echo e(Form::label('type', 'Type*')); ?>

					<?php echo e(Form::select('type',
						array(
							'' => '--Select Type--',
							'1' => 'Head Office',
							'2' => 'Sales',
							'3' => 'Extrusion',
							'4' => 'Fabrication'
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

				</div>
                    <div class="form-group">
					<?php echo e(Form::label('lat', 'Latitude*')); ?>

					<?php echo e(Form::text('lat',null,array('class'=>'form-control','placeholder' => 'Enter Latitude'))); ?>

				</div>
                 <div class="form-group">
					<?php echo e(Form::label('long', 'Longitude*')); ?>

					<?php echo e(Form::text('long',null,array('class'=>'form-control','placeholder' => 'Enter Longitude'))); ?>

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
				<div class="form-group">
					<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

    			</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/LocateUs/editOffice.blade.php ENDPATH**/ ?>