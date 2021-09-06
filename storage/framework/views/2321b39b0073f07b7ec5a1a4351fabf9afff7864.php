

<?php $__env->startSection('title', 'List page'); ?>


<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"> Blog List </h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" title="Add New" href="<?php echo Request::url();?>/new"><i class="fa fa-plus"></i> Add New</a>
     <?php
                  $search_array=array();
                  $search_url='';
                      foreach($_GET as $key => $value){
                       $search_array[$key]=$value;
                       $search_url.=$key.'='.$value.'&';
                         // echo $key . " : " . $value . "<br />\r\n";
                        }                       
                        ?>

                    <a href="<?php echo Request::url();?>/export?<?php echo $search_url;?>" class="btn btn-default">Export</a>              
  </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>

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


            <!-- /.box-header -->
            
       <div class="card-body table-responsive p-0"><input type="hidden" class="tb" value="blog_post">
    <div class="row bulkaction"  style="margin-bottom:10px;display:none;">
    <a type="button" id="delete_records" style="color:#fff" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Bulk Delete</a>&nbsp;&nbsp;
    <a type="button" id="active_records" style="color:#fff" class="btn btn-primary pull-right"><i class="fa fa-file"></i> Bulk Active</a>&nbsp;&nbsp;
    <a type="button" id="inactive_records" style="color:#fff" class="btn btn-warning pull-right"><i class="fa fa-location-arrow"></i> Bulk Inactive</a>
    </div>

	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
<th><input type="checkbox" id="select_all" /></th>
                  <th>ID</th>
                  <th>Blog Title</th>                
                                  
                  <th>Status</th>                  
                  <th>Posted Date</th>
                 
                  <th>Action</th>
                  
                </tr>
        </thead>
        <tbody> <?php $er=1;
            ?>
                <?php $__currentLoopData = $data_rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   <td><input type="checkbox" class="checkbox" data-emp-id="<?php echo e($data_row->id); ?>" value="<?php echo e($data_row->id); ?>"/></td>
                  <td> <?php echo e($er++); ?></td>
                  <td> <?php echo e($data_row->name); ?></td>
                  
                 
            <td><span class="label label-<?php echo ($data_row->status=='1')?'success':'danger';?>">
                   </span><?php echo e($data_row->status); ?></td>
                  <td><?php echo e($data_row->created_at->format('F j, Y')); ?></td>
                 
                    
                  <td>
                  <a title="Edit "  href="<?php echo Request::url();?>/view/<?php echo $data_row->id;?>" ><i class="fas fa-edit"></i></a>
                  <a title="Delete " href="<?php echo Request::url();?>?delete=<?php echo $data_row->id;?>" onclick="return confirm('Are you sure you want to delete <?php echo e($data_row->name); ?>?');" class="delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               

              </tbody>
           </table>
            </div>    
                       
                <?php /*  <div class="container paginate">
                    <?php  if(count($search_array)){                  
                      echo $data_rows->appends($search_array)->links();
                    } else {
                      echo $data_rows->links();
                    }
                    ?>
                    </div>  */ ?>
            <!-- /.box-body -->
       


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
	jQuery(document).ready(function ($) {
		$('.data-table').dataTable();
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/blog-post/index.blade.php ENDPATH**/ ?>