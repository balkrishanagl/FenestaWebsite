

<?php $__env->startSection('title', 'Window & Door Product'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">List Window & Door Product</h1></div>
<div class="col-md-4 text-right">
              <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/Windowdoor/typeadd">Add New</a>
                 
  </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php $__env->startSection('plugins.Datatables', true); ?>


<?php $__env->startSection('content'); ?>
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


<div class="card-body table-responsive p-0">
    
    
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Type</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php $__currentLoopData = $wdtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($i); ?></td>
				<td><?php echo e($banner->title); ?></td>
				<td><?php echo e($banner->type); ?></td>
				<td><img height="50px" width="50px" src=<?php echo asset("images/windowdoortype/$banner->image"); ?>></td>
				
				<td><a href="<?php echo e(URL('admin/typeedit',['id' => $banner->id])); ?>"><i class="fas fa-edit"></i></a> <a href="#" data-id = "<?php echo e($banner->id); ?>" class="delete"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>

	</table>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display:initial;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
	$(document).ready(function () {
		$('.data-table').dataTable();

		$(document).on('click', '.delete', function(){
  			banner_id = $(this).attr('data-id');
  			token: 
 		 	$('#confirmModal').modal('show');
 		});

		$('#ok_button').click(function(){
  			$.ajax({
   				url:"typedelete/"+banner_id,
   				beforeSend:function(){
    				$('#ok_button').text('Deleting...');
   				},
   				success:function(data)
   				{
   					
   					var output = JSON.parse(data);
   					if(output.key == '1'){
   						
		    			setTimeout(function(){
		     				$('#confirmModal').modal('hide');
		     				location.reload();
		     				alert(output.msg);
	    				}, 2000);
	    			}else{
	    				alert(output.msg);
	    			}
   				}
  			})
 		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Windowdoor/typelist.blade.php ENDPATH**/ ?>