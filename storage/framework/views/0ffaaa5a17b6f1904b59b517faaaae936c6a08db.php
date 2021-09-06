


<?php $__env->startSection('title', 'Add Blog Category'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"><?php echo e($title); ?></h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/blog-category"><i class="fa fa-arrow-left"></i> Back</a>
                 
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

             <input type="hidden" required="" name="id" value="<?php echo e((isset($data_row->id))?$data_row->id:''); ?>">

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control get_url_name" id="name" name="name" value="<?php echo e((isset($data_row->name))?$data_row->name:old('name')); ?>">
                  </div>
                </div>
                  

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control put_url_key" id="slug" name="slug" value="<?php echo e((isset($data_row->slug))?$data_row->slug:old('slug')); ?>">
                  </div>
                </div>



                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['image']) && $data_row['image']!=''){?>
                    <img src="<?php echo e(URL::asset('/images/blogcategory')); ?>/<?php echo $data_row['image'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete" value="1">
          <?php } ?>
           <input type="file" name="image" id="image" accept="image/jpeg,image/gif,image/x-png">
        
                  </div>
                </div>
                  
               
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hover Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['hoverimage']) && $data_row['hoverimage']!=''){?>
                    <img src="<?php echo e(URL::asset('/images/blogcategory')); ?>/<?php echo $data_row['hoverimage'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete1" value="1">
          <?php } ?>
           <input type="file" name="hoverimage" id="hoverimage" accept="image/jpeg,image/gif,image/x-png">
        
                  </div>
                </div>
                
             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>        
                  <div class="col-sm-10">                       
                  <select name="status" class="form-control select" required  >          
                        <?php $__currentLoopData = Config::get('constants.CONS_STATUS_ARRAY'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Sorting</label>

                  <div class="col-sm-10">
                    <input type="number" required="" class="form-control" id="sorting" name="sorting"  value="<?php echo e((isset($data_row->sorting))?$data_row->sorting:'1'); ?>">
                  </div>
                </div>


               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="page_title" name="page_title"  value="<?php echo e((isset($data_row->page_title))?$data_row->page_title:old('page_title')); ?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"  value="<?php echo e((isset($data_row->meta_keywords))?$data_row->meta_keywords:old('meta_keywords')); ?>">
                  </div>
                </div>
                

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="meta_description" name="meta_description"  value="<?php echo e((isset($data_row->meta_description))?$data_row->meta_description:old('meta_description')); ?>">
                  </div>
                </div>


                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary" >submit</button>
               

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/blog-category/view.blade.php ENDPATH**/ ?>