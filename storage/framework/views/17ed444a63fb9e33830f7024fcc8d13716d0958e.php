

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
 <div class="row">
              <div class="col-md-12">
                <div class="card">
            <div class="card-header">
                   <div class="row ">
                        <div class="col-md-8 "> <h3>Site Visiter List : <?php echo e($visters_total); ?> </h3></div>
                <div class="col-md-4 text-right">
            
                    <a href="<?php echo Request::url();?>/export" class="btn btn-default">Export</a> 
              
            </div>
            </div>
            </div>
                  </div>
     </div>
     </div>



            <!-- /.box-header -->
            
       <div class="card-body table-responsive p-0">
	<table class="data-table table table-head-fixed text-nowrap table-bordered" id="user_table">
		<thead>
			<tr>
              <th>IP</th>
              <th>Cookie</th>
              <th>OS - Browser</th>
            
              <th>State - City</th>
              <th>Last Visited Url</th>
              <th>First - Last Visit On</th>
              <th>Action</th>
                  
                </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $visters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $informationData = json_decode($journey->json_data, true); 
                    ?>
                                  <tr id="row_<?php echo $journey->id; ?>">
                                      <td><?php echo $journey->ip; ?></td>
                                      <td><?php echo $journey->cookie_name; ?></td>
                                    
                                      <td><?php echo $journey->os; ?> - <?php echo $journey->browser; ?></td>
                                   
                                      
                                   
                                      <td><?php if(isset($informationData['user_information']['state'])){ echo $informationData['user_information']['state']; }?> - <?php if(isset($informationData['user_information']['city'])){ echo $informationData['user_information']['city']; }?></td>
                                         <td><?php if(isset($informationData['last_page_info']['url'])){ echo $informationData['last_page_info']['url']; }?></td>
								                      <td><?php echo date("d F, Y,  h:i A",strtotime($journey->created_on)); ?> - <?php if($journey->updated_on !=""){ echo date("d F, Y,  h:i A",strtotime($journey->updated_on)); } ?></td>
                                      <td >
                                       <a href="<?php echo Request::url();?>/detail/<?php echo $journey->id;?> " title="View Details"><i class="fa fa-eye"></i></a> &emsp;
                                                                                
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
		$('.data-table').DataTable({ 'order':[],
            'columnDefs': [{
                "targets": 0,
                "orderable": false
            }],
        columnDefs: [ { goals: [12]  }]  });  
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Sitevisiter/index.blade.php ENDPATH**/ ?>