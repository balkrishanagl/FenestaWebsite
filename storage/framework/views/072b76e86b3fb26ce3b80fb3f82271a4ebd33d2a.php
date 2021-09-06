

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
 <?php
  $informationData = json_decode($user_journey->json_data, true); 
$array_i = $informationData['pages'];
$keyf = 'count';
$tsum = array_sum(array_column($array_i,$keyf));
 ?>
 <div class="row">
              <div class="col-md-12">
                <div class="card">
            <div class="card-header">
                   <div class="row ">
                        <div class="col-md-8 "> <h3>User Journey Detail </h3>
                            <p><b>Last Visited Url : </b> <?php echo e($informationData['last_page_info']['url']); ?>  , <b>Total Visit </b>: <?php echo e($tsum); ?> </p> 
                            <p><b>State</b>  : <?php echo e($informationData['user_information']['state']); ?>  , <b>City </b>  : <?php echo e($informationData['user_information']['city']); ?>  , <b>County</b>   : <?php echo e($informationData['user_information']['country']); ?>  , <b> Pincode </b>  : <?php echo e($informationData['user_information']['pincode']); ?> </p>   
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
              <th>Page</th>
              <th>URL</th>
              <th>View</th>
              <th>Search Term</th>
              
                  
                </tr>
        </thead>
        <tbody>
                
                      <?php $__currentLoopData = $informationData['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                  <tr id="row_<?php echo $user_journey->id; ?>">
                                      <td><?php echo $user_journey->ip; ?></td>
                                      <td><?php if($value['slug'] !=''){ echo $value['slug']; }else{ echo 'Home Page'; }?></td>
                                      <td><?php echo $value['current_url'];?></td>
                                      <td><?php echo $value['count']; ?></td>
                                    <td><?php echo $value['search_term']; ?></td>
                                  
                                  </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
           </table>
            </div>    
                       
             


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
	jQuery(document).ready(function ($) {
		$('.data-table').DataTable({ columnDefs: [ { goals: [12]  }]  });  
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Sitevisiter/view.blade.php ENDPATH**/ ?>