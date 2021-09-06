


<?php $__env->startSection('title', 'Comment'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Comment Details</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/blog-comment"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

      <div class="row">
     

        <div class="col-md-12">
            
		<div class="card">

          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
               
              <div class="card-body">
        <form class="form-horizontal" method="POST" action="<?php echo url(ADMIN_FOLDER);?>/<?php echo $page_name;?>/save" enctype="multipart/form-data">
             <?php echo e(csrf_field()); ?>

             <input type="hidden" required="" name="id" value="<?php echo isset($data_row['id'])?$data_row['id']:'';?>">

              <div class="box-body">


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Blog</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" readonly="" id="blog_name1" name="blog_name1" value="<?php echo isset($data_row['blog_name'])?$data_row['blog_name']:'';?>">
                  </div>
                </div>

			          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control" id="name" name="name" value="<?php echo isset($data_row['name'])?$data_row['name']:'';?>">
                  </div>
                </div>				
				
			         	<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="email" name="email" value="<?php echo isset($data_row['email'])?$data_row['email']:'';?>">
                  </div>
                </div>
  				
  					

				 
				  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Message</label>

                  <div class="col-sm-10">
						<textarea class="form-control" id="message" name="message" ><?php echo isset($data_row['message'])?$data_row['message']:'';?></textarea> 
            


                  </div>
                </div>
				  
           <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>        
                  <div class="col-sm-10">                       
                  <select name="status" class="form-control select" required  >          
                        <?php $__currentLoopData = Config::get('constants.CONS_CONTACT_STATUS_ARRAY'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                              $selected='';
                              if(isset($data_row['status']) && $data_row['status']==$key){
                                $selected='selected';
                              }elseif(old('status')==$key){
                                 $selected='selected';
                              } 
                            ?>
                <option value="<?php echo e($key); ?>"   <?php echo e($selected); ?>  >
                 <?php echo e($val); ?>

                </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                   </select>
                  </div>
            </div>
           


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Form Filled IP</label>
                  <div class="col-sm-10">
                    <input type="text" readonly=""  class="form-control" id="ip" name="ip" value="<?php echo isset($data_row['ip'])?$data_row['ip']:'';?>">
                  </div>
          </div>

          
              

                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary">submit</button>
               

              </div>



              </div>
              <!-- /.box-body -->
                  </form>
              </div>
            </div>

      </div>
      </div>
      <!-- /.row (main row) -->
</div>







    <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/blog-comment/view.blade.php ENDPATH**/ ?>