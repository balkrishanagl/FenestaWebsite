


<?php $__env->startSection('title', ' Page Blog'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark"><?php echo e($title); ?></h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/blog-page"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     
        <div class="col-md-12">
		<div class="card">
          <!-- Horizontal Form -->
          <div class="box box-info">
       
            <!-- /.box-header -->
              <div class="card-body">
            <!-- form start -->
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
                  <label for="inputEmailpage" class="col-sm-2 control-label">Page*</label>        
                  <div class="col-sm-10">  
                      <?php if(isset($data_row->page)): ?>
                            <?php 
                            $showarray = explode(',',$data_row->page);
                            $page_array = array();
                            $product_array = array();
                            $producttype_array  = array();
                            foreach($showarray as $ss){
                              if (strpos( $ss , 'page') !== FALSE) {
                                 $page_array[] = explode('-',$ss)[1];
                              }
                              if (strpos( $ss , 'product') !== FALSE) {
                                 $product_array[] = explode('-',$ss)[1];
                              }
                              if (strpos( $ss , 'producttype') !== FALSE) {
                                 $producttype_array[] = explode('-',$ss)[1];
                              }
        
                            }
                            ?>
                            
					<select name="page[]" id="page" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            <optgroup label="Page">
                                <?php foreach ($pages as $page) { ?>
                             <option <?php echo (in_array($page->id,$page_array))?'selected':'';?> value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                             <option <?php echo (in_array($pp->id,$product_array))?'selected':'';?> value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option <?php echo (in_array($ppo->id,$producttype_array))?'selected':'';?> value="producttype-<?php echo $ppo->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$ppo->id)?'selected':'';?>>  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                              
                            <?php } ?>
                            </optgroup>
                           
                    </select>
                      <?php else: ?>
                <select name="page[]" multiple class="form-control js-example-basic-multiple" required>
        
                           <option value="">Default</option>
                            <optgroup label="Page">
                          <?php foreach ($pages as $page) { ?>
                             <option value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                            <?php } ?>
                            </optgroup>
                            <optgroup label="Product">   
                                <?php foreach ($product as $pp) { 
                                $othertypee = $pp->producttype()->get();
                                
                                ?>
                             <option value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['page']) && $_GET['page']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                                

                              <?php foreach ($othertypee as $ppo) { ?> 
                                 <option value="producttype-<?php echo $ppo->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$ppo->id)?'selected':'';?>>  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                        <?php } ?>
                            </optgroup>
                   </select>
                      <?php endif; ?>
                  </div>
            </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category</label>        
                  <div class="col-sm-10">                   
                <select name="category_id" class="form-control select" required>
        
                           <option value=""></option>
                           <?php foreach ($categorys as $key => $category) { ?>
                             <option value="<?php echo $category->id;?>" <?php echo (isset($data_row['category_id']) && $data_row['category_id']==$category->id)?'selected':'';?>><?php echo $category->name;?></option>
                       
                        <?php } ?>
                   </select>
                  </div>
            </div>


            





                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Short Description</label>

                  <div class="col-sm-10">
                  <textarea class="form-control " id="short_description" name="short_description"><?php echo e((isset($data_row->short_description))?$data_row->short_description:old('short_description')); ?></textarea>       


                  </div>
                </div>


                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                  <textarea class="form-control ckeditor" id="description" name="description"><?php echo e((isset($data_row->description))?$data_row->description:old('description')); ?></textarea>       


                  </div>
                </div>




                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
          <?php if(isset($data_row['image']) && $data_row['image']!=''){?>
                    <img src="<?php echo e(URL::asset('/images/')); ?>/<?php echo $data_row['image'];?>" height="100px">
          <br/> Delete <input type="checkbox" name="image_delete" value="1">
          <?php } ?>
           <input type="file" name="image" id="image" accept="image/jpeg,image/gif,image/x-png">
        
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Posted Date</label>
                  <div class="col-sm-10">
                    

                    <?php 
                    $posted_date=date('Y-m-d');
                    if(isset($data_row->posted_date) && $data_row->posted_date){
                        $posted_date=$data_row->posted_date;
                    }                    
                    ?>

                    <input type="date" class="form-control" id="posted_date" name="posted_date" 
                    value="<?php echo e($posted_date); ?>" required="">
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


             <hr>
              <h3 class="box-title">SEO Details</h3>
            <hr>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Title</label>
                  <div class="col-sm-10">
                    <input type="text" required="" class="form-control " id="page_title" name="page_title" value="<?php echo e((isset($data_row->page_title))?$data_row->page_title:old('page_title')); ?>">
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


            
          
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Other</label>

                  <div class="col-sm-10">
                  <textarea class="form-control" id="meta_other" name="meta_other"><?php echo e((isset($data_row->meta_other))?$data_row->meta_other:old('meta_other')); ?></textarea>       


                  </div>
                </div>
            


                <input type="hidden" name="submit_type" id="submit_type" value="1">
                <div class="box-footer pull-right">         
                <button type="submit" class="btn btn-primary" >Submit</button>

              </div>



              </div>
              <!-- /.box-body -->

                  </form>
      </div>
      </div>
      </div>
      <!-- /.row (main row) -->
</div>
</div>
    </section>









    <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/blog-page/view.blade.php ENDPATH**/ ?>