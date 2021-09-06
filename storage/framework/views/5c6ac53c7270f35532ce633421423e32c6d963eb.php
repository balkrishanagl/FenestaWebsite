<?php $__env->startSection('title', 'Add Gallery Images'); ?>
<?php
use App\Models\WindowdoorType;
?>
<?php $__env->startSection('content_header'); ?>
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Add Gallery Images</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/listGalleryImages"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>

<?php $__env->stopSection(); ?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- <style>
       .thumb{
           margin: 10px 5px 0 0;
           width: 300px;
       }
</style> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="<?php echo e(asset('js/jquery/1.9.1/jquery.js')); ?>" defer></script> -->
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    
     function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag').show();
            $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
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
		 		<?php echo e(Form::open(array('url' => 'admin/saveGallery','files' => true))); ?>

			 		<div class="add_more_div">
			 			<div class="form-group">
							<?php echo e(Form::label('Heading', 'Heading*')); ?>

							<input type="text" class="form-control" name="heading">
						</div>
						<div class="form-group">
								<label for="image">Image</label>
                                <label class="note"> ( Size : 300 * 200 ) </label>
								<input type="file" name="images" class="form-control" id="image">
                            <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
						</div>
                        
                        <div class="form-group">
					<?php echo e(Form::label('showon', 'Show On*')); ?>

					       <select name="showon[]" id="showon" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            <optgroup label="Page">
                                <?php foreach ($pages as $page) { ?>
                             <option value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                             <option value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option value="producttype-<?php echo $ppo->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$ppo->id)?'selected':'';?>>  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                              
                            <?php } ?>
                            </optgroup>
                           
                    </select>
				</div>
                        <div class="form-group">
					<?php echo e(Form::label('segtype', 'Segment Type*')); ?>

					<?php echo e(Form::select('segtype',
						array(
							'' => '--Select Type--',
							'Hotels' => 'Hotels',
							'Hospitals' => 'Hospitals',
							'Education Institution' => 'Education Institution',
							'Office' => 'Office',
							'Housing' => 'Housing',
							'Residential' => 'Residential',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

				</div>
                        <div class="form-group">
					<?php echo e(Form::label('zonewise', 'ZONE WISE*')); ?>

					<?php echo e(Form::select('zonewise',
						array(
							'' => '--Select Type--',
							'1' => 'South Region',
							'2' => 'North Region',
							'3' => 'West Region',
							'4' => 'East Region',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)); ?>

				</div>
     <div class="form-group">
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
                        
						<!-- <div>
							<button type="button" class="add">Add</button>
						</div> -->
						<div class="form-group">
							<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

    					</div>
					</div>
					
		 		<?php echo e(Form::close()); ?>

				
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
   /*function loadPreview(input){
       var data = $(input)[0].files; //this file data
       $.each(data, function(index, file){
           if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
               var fRead = new FileReader();
               fRead.onload = (function(file){
                   return function(e) {
                       var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                       $('#thumb-output').append(img);
                   };
               })(file);
               fRead.readAsDataURL(file);
           }
       });
   }*/

   /*$(document).ready(function () {
    $('.add').click(function (e) {
    	var i;
    	for(i = 1;i<=5;i++){
        	$('.add_more_div').append("<div class='form-group'><lable>Heading</label><input type='text' class='form-control' name='heading[]'></div><div class='form-group'><lable for='image'>Image</label><input type='file' class='form-control'></div>");
    	}
    });
});*/
</script>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Banner/galleryImages.blade.php ENDPATH**/ ?>