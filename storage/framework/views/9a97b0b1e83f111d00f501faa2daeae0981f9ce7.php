

<?php $__env->startSection('title', 'Edit Blog'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Blog</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
	<script>
        
             $('.india').hide();
        $('.othercity').hide();
 $('#country').change(function(){
    if($(this).val()=='India'){
        $('.india').show();
        $('.othercity').hide();
    }else{
        $('.india').hide();
        $('.othercity').show();
    }
     
 }).change();
        
        
     var urla = "<?php echo e(url('/')); ?>/admin/editgetstate";//should return json with a list of cities only 
        var id = "<?php echo e($partnerShowroom->state); ?>";
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
                var id = "<?php echo e($partnerShowroom->city); ?>";
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
				<?php echo e(Form::model($partnerShowroom, ['url'  => ['admin/updatePartnerShowroom', $partnerShowroom->id], 'role'=> 'form','files'=>'true'])); ?>

				<div class="form-group">
					<?php echo e(Form::label('dealer_name', 'Dealer Name*')); ?>

					<?php echo e(Form::text('dealer_name', null, array('class'=>'form-control','placeholder' => 'Enter Dealer Name'))); ?>

				</div>

				
                <div class="form-group">
					<?php echo e(Form::label('country', 'Country*')); ?>

				
                    
                    <?php echo e(Form::select('country',
						array(
							'' => '--Select country--',
							'India'=>'India',
                            'Bhutan'=>'Bhutan',
                            'Nepal'=>'Nepal',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

                    
                    
				</div>
                <div class="form-group india">
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
                
				<div class="form-group india">
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
				<div class="form-group othercity">
					<?php echo e(Form::label('city', 'City*')); ?>

				
                    
                    <?php echo e(Form::text('city',null,array('class'=>'form-control','placeholder' => 'Enter City'))); ?>

                    
				</div>
				<div class="form-group">
					<?php echo e(Form::label('locality', 'Locality*')); ?>

					<?php echo e(Form::text('locality',null,array('class'=>'form-control','placeholder' => 'Enter Locality'))); ?>

				</div>
				<div class="form-group">
					<?php echo e(Form::label('address', 'Address*')); ?>

					<?php echo e(Form::text('address',null,array('class'=>'form-control','placeholder' => 'Enter Address'))); ?>

				</div>
                <div class="form-group">
                    <?php echo e(Form::label('contact_person', 'Contact Person*')); ?>

                    <?php echo e(Form::text('contact_person',null,array('class'=>'form-control','placeholder' => 'Enter Contact Person'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('phone', 'Contact No*')); ?>

                    <?php echo e(Form::text('phone',null,array('class'=>'form-control','placeholder' => 'Enter Contact No'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'Contact Email*')); ?>

                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder' => 'Enter Email'))); ?>

                </div>
                 <div class="form-group">
					<?php echo e(Form::label('video_url', 'Video Url*')); ?>

					<?php echo e(Form::text('video_url',null,array('class'=>'form-control','placeholder' => 'Enter Video Url'))); ?>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/LocateUs/editPartnerShowroom.blade.php ENDPATH**/ ?>