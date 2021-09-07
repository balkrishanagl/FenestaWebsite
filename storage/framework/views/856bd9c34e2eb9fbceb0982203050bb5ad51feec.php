

<?php $__env->startSection('title', ' Glass Option List'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"> Glass Option List</h1></div>
<div class="col-md-4 text-right">
              <a class="btn btn-primary" title="Add New" href="<?php echo e(URL::to('/')); ?>/admin/Glass"><i class="fa fa-plus"></i> Add New</a>
                 
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
       <input type="hidden" class="tb" value="glass_options">
    <div class="row bulkaction"  style="margin-bottom:10px;display:none;">
    <a type="button" id="delete_records" style="color:#fff" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Bulk Delete</a>&nbsp;&nbsp;
    <a type="button" id="active_records" style="color:#fff" class="btn btn-primary pull-right"><i class="fa fa-file"></i> Bulk Active</a>&nbsp;&nbsp;
    <a type="button" id="inactive_records" style="color:#fff" class="btn btn-warning pull-right"><i class="fa fa-location-arrow"></i> Bulk Inactive</a>
    </div>
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr><th><input type="checkbox" id="select_all" /></th>
				<th>ID</th>
				<th>Title</th>
				<th>Image</th>
				<th>Upload Type</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr><td><input type="checkbox" class="checkbox" data-emp-id="<?php echo e($newz->id); ?>" value="<?php echo e($newz->id); ?>"/></td>
				<td><?php echo e($i); ?></td>
				<td><?php echo e($newz->title); ?></td>
				<td>
                  
                     <?php $__currentLoopData = explode(',',$newz->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <img height="50px" width="50px" src=<?php echo asset("images/glass/$mm"); ?>>
                      
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td><?php echo e($newz->upload_type); ?> </td>
                <td><?php echo e($newz->status); ?> </td>
				<td><a title="Edit" href="<?php echo e(URL('admin/editGlass',['id' => $newz->id])); ?>"><i class="fas fa-edit"></i></a> <a href="#" data-id = "<?php echo e($newz->id); ?>" title="Delete" class="delete"><i class="fas fa-trash-alt"></i></a></td>
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
  			news_id = $(this).attr('data-id');
  			token: 
 		 	$('#confirmModal').modal('show');
 		});

		$('#ok_button').click(function(){
  			$.ajax({
   				url:"deleteGlass/"+news_id,
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
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
             $('.bulkaction').show(); 
            
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
             $('.bulkaction').hide(); 
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length>0){
            $('.bulkaction').show(); 
        }else{
             $('.bulkaction').hide(); 
        }
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
           
        }else{
            $('#select_all').prop('checked',false);
            
        }
    });
});
    
    // delete selected records
$('#delete_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "<?php echo e(url('/admin/bulk_delete_action')); ?>",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token=<?php echo e(csrf_token()); ?>",
				success: function(response) {	
					// remove deleted employee rows
					alert("Successfully Deleted !!");	
                    location.reload();		
				}   
			});				
		}  
	}  
});
    
    // Active selected records
$('#active_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "<?php echo e(url('/admin/bulk_active_action')); ?>",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token=<?php echo e(csrf_token()); ?>",  
				success: function(response) {	
					alert("Successfully Activated !!");
                    location.reload();		
				}   
			});				
		}  
	}  
});
    
    // delete selected records
$('#inactive_records').on('click', function(e) { 
    var tt = $(".tb").val();
	var employee = [];  
	$(".checkbox:checked").each(function() {  
		employee.push($(this).data('emp-id'));
	});	
	if(employee.length <=0)  {  
		alert("Please select records.");  
	}  
	else { 	
		WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";  
		var checked = confirm(WRN_PROFILE_DELETE);  
		if(checked == true) {			
			var selected_values = employee.join(","); 
			$.ajax({ 
				type: "POST",  
				url: "<?php echo e(url('/admin/bulk_inactive_action')); ?>",  
				cache:false,  
				data: "emp_id="+selected_values+"&t="+tt+"&_token=<?php echo e(csrf_token()); ?>",  
				success: function(response) {	
					// remove deleted employee rows
					alert("Successfully Inactivated !!");							location.reload();			
				}   
			});				
		}  
	}  
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Glass/listGlass.blade.php ENDPATH**/ ?>