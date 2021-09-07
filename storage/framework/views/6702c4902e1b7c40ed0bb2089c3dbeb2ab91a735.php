

<?php $__env->startSection('title', 'Edit page'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Page</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	 <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>" defer></script>
  <script>
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

    $("#banner_image").change(function(){
        readURL(this);
    });
      function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag1').show();
            $('#category-img-tag1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#og_image").change(function(){
        readURL1(this);
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
					<?php echo e(Form::model($page, ['url'  => ['admin/updatePage', $page->id], 'role'=> 'form','files'=>'true'])); ?>

					<div class="card-body">
                        
                        
						<div class="form-group">
							<?php echo e(Form::label('page_title', 'Page Title*')); ?>

							<?php echo e(Form::text('page_title', null, array('class'=>'form-control','placeholder' => 'Page Title'))); ?>

						</div>
						<div class="form-group">
							<?php echo e(Form::label('page_description', 'Page Description*')); ?>

							<?php echo e(Form::textarea('page_description', null, array('class'=>'form-control ckeditor','placeholder' => 'Page Description'))); ?>



						</div>
                        <?php if($page->id==24 || $page->id==43 || $page->id==44): ?>
                        
                         <div class="form-group">

							<?php echo e(Form::label('sub_text', 'Below Banner Content*')); ?>

							<?php echo e(Form::textarea('sub_text', null, array('class'=>'form-control ckeditor','placeholder' => 'Below Banner Content'))); ?>

						</div>
                        
                         <div class="form-group">

							<?php echo e(Form::label('content2', 'Other Content')); ?>

							<?php echo e(Form::textarea('content2', null, array('class'=>'form-control ckeditor','placeholder' => 'Other Content'))); ?>

						</div>
                        <?php endif; ?>
                        <?php if($page->id==44): ?>
                        
                        <div class="form-group">

							<?php echo e(Form::label('content3', 'Internal door Content')); ?>

							<?php echo e(Form::textarea('content3', null, array('class'=>'form-control ckeditor','placeholder' => 'Internal door Content'))); ?>

						</div>
                        
                         <?php endif; ?>
                        <?php if($page->id==25): ?>
                        <div class="form-group">

							<?php echo e(Form::label('sub_text', 'Press Coverage*')); ?>

							<?php echo e(Form::text('sub_text', null, array('class'=>'form-control','placeholder' => 'Press Coverage'))); ?>

						</div>
                        <div class="form-group">

							<?php echo e(Form::label('content2', 'Advertisement Centre*')); ?>

							<?php echo e(Form::text('content2', null, array('class'=>'form-control','placeholder' => 'Advertisement Centre'))); ?>

						</div>
                        <?php endif; ?>
                        <div class="form-group">
							<?php echo e(Form::label('about', 'About Fenesta Description')); ?>

							<?php echo e(Form::textarea('about', null, array('class'=>'form-control ckeditor','placeholder' => 'About Fenesta Description'))); ?>

						</div>
                        
                        <hr>
                        <h3>SEO Details</h3>  <hr>
						<div class="form-group">
							<?php echo e(Form::label('meta_title', 'Meta Title*')); ?>

							<?php echo e(Form::text('meta_title', null, array('class'=>'form-control','placeholder' => 'Meta Title'))); ?>	
						</div>

						<div class="form-group">
							<?php echo e(Form::label('meta_keyword', 'Meta Keyword*')); ?>

							<?php echo e(Form::text('meta_keyword', null, array('class'=>'form-control','placeholder' => 'Meta Keyword'))); ?>	
						</div>
						<div class="form-group">

							<?php echo e(Form::label('meta_description', 'Meta Description*')); ?>

							<?php echo e(Form::text('meta_description', null, array('class'=>'form-control','placeholder' => 'Meta Description'))); ?>

						</div>
                        
                        <div class="form-group">
							<?php echo e(Form::label('og_title', 'OG Title')); ?>

							<?php echo e(Form::text('og_title', (isset($og_title)) ? $og_title : null, array('class'=>'form-control','placeholder' => 'OG Title'))); ?>	
						</div>
                        <div class="form-group">

							<?php echo e(Form::label('og_description', 'OG Description')); ?>

							<?php echo e(Form::text('og_description', (isset($og_desc)) ? $og_desc : null, array('class'=>'form-control','placeholder' => 'OG Description'))); ?>

						</div>
                        <div class="form-group">
                            
                            <input type="hidden" name="exist_og_image" <?php if(!empty($og_img)): ?> value="<?php echo e($og_img); ?>" <?php endif; ?> >
                            
							<label for="og_image">OG Image</label>
							<input type="file" name="og_image" class="form-control" id="og_image">
                            
                              <?php if($page->og_image): ?>
                                   <img src="<?php echo e(asset("images/$page->og_image")); ?>" id="category-img-tag1" width="150px" />
                                <?php else: ?>
                                    <img src="" style="display:none" id="category-img-tag1" width="150px" />
                                <?php endif; ?>

						</div>
                        
						<div class="form-group">
							<label for="banner_image">Banner Image</label>
                             <label class="note"> ( Image Size : 1600 * 400 ) </label>
							<input type="file" name="banner_image" class="form-control" id="banner_image">
                            <br>
                    <?php if($page->banner_image): ?>
                       <img src="<?php echo e(asset("images/$page->banner_image")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
						</div>
                        <?php if($page->id==1): ?>

                      <hr>
                        <h3>Windows & Doors Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('wi_subtitle', 'Sub Title')); ?>

							<?php echo e(Form::text('wi_subtitle', (isset($wi_subtitle)) ? $wi_subtitle : null, array('class'=>'form-control','placeholder' => 'Sub Title'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('wi_title', 'Title')); ?>

							<?php echo e(Form::text('wi_title', (isset($wi_title)) ? $wi_title : null, array('class'=>'form-control','placeholder' => ' Title'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('wi_subcontent', 'Sub Content')); ?>

							<?php echo e(Form::text('wi_subcontent', (isset($wi_subcontent)) ? $wi_subcontent : null, array('class'=>'form-control','placeholder' => ' Sub Content'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('wi_content', 'Content')); ?>

							<?php echo e(Form::text('wi_content', (isset($wi_content)) ? $wi_content : null, array('class'=>'form-control','placeholder' => ' Content'))); ?>

						</div>
 <div class="form-group">
                            <input type="hidden" name="exist_bthum_images" <?php if(!empty($exist_bthum_images)): ?>  value="<?php echo e($exist_bthum_images); ?>" <?php endif; ?> >
							<label for="bthum_images">Right Image</label>
							<input type="file" name="bthum_images" class="form-control" id="bthum_images">
						</div>
                      <hr>
                        <h3>About Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('about_heading', ' Heading')); ?>

							<?php echo e(Form::text('about_heading', (isset($about_heading)) ? $about_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('about_content', ' Content')); ?>

                            <?php echo e(Form::textarea('about_content', (isset($about_content)) ? $about_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content'))); ?>


						</div>
                        
                        
                      <hr>
                        <h3>Quality & Innovations Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('solu_heading', ' Heading')); ?>

							<?php echo e(Form::text('solu_heading', (isset($solu_heading)) ? $solu_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                        <hr>
                      
                         <hr>
                        <h3>Durable and Safe Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('durable_heading', ' Heading')); ?>

							<?php echo e(Form::text('durable_heading', (isset($durable_heading)) ? $durable_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('durable_subcontent', ' Sub Content')); ?>

                            <?php echo e(Form::text('durable_subcontent', (isset($durable_subcontent)) ? $durable_subcontent : null, array('class'=>'form-control ckeditor','placeholder' => 'Content'))); ?>


						</div>
                        <div class="form-group">
							<?php echo e(Form::label('durable_content', ' Content')); ?>

                            <?php echo e(Form::text('durable_content', (isset($durable_content)) ? $durable_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content'))); ?>


						</div>
                        <div class="form-group">
                            <input type="hidden" name="exist_durable_image" <?php if(!empty($durable_image)): ?>  value="<?php echo e($durable_image); ?>" <?php endif; ?> >
							<label for="durable_image"> Image</label>
							<input type="file" name="durable_image" class="form-control" id="durable_image">
						</div>
                        
                      <hr>
                        <h3>Visualize and Design Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('visdsg_heading', ' Heading')); ?>

							<?php echo e(Form::text('visdsg_heading', (isset($visdsg_heading)) ? $visdsg_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                     
                        <div class="form-group">
                            <input type="hidden" name="exist_banner_images" <?php if(!empty($exist_banner_images)): ?>  value="<?php echo e($exist_banner_images); ?>" <?php endif; ?> >
							<label for="banner_images">Banner Images</label>
							<input type="file" multiple name="banner_images[]" class="form-control" id="banner_images">
						</div>
                       
                         <hr>
                        <h3>Clientele Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('cli_heading', ' Heading')); ?>

							<?php echo e(Form::text('cli_heading', (isset($cli_heading)) ? $cli_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                      
                         <hr>
                       
                        <h3>Unmatched Service Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('dcm_heading', ' Heading')); ?>

							<?php echo e(Form::text('dcm_heading', (isset($dcm_heading)) ? $dcm_heading : null, array('class'=>'form-control','placeholder' => ' Heading'))); ?>

						</div>
                        <div class="form-group">
							<?php echo e(Form::label('dcm_content', ' Content')); ?>

                            <?php echo e(Form::textarea('dcm_content', (isset($dcm_content)) ? $dcm_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content'))); ?>


						</div>
                          <div class="form-group">
                               <input type="hidden" name="exist_dcm_leftimage" <?php if(!empty($exist_dcm_leftimage)): ?>  value="<?php echo e($exist_dcm_leftimage); ?>" <?php endif; ?> >
							<label for="left_image">Right Image</label>
							<input type="file"  name="left_image" class="form-control" id="left_image">
						</div>
                         
                        <hr>
                       
                        <h3>Other Section </h3>
                         <hr>
                        <div class="form-group">
							<?php echo e(Form::label('locateus_heading', 'Locatus Us Heading')); ?>

							<?php echo e(Form::text('locateus_heading', (isset($locateus_heading)) ? $locateus_heading : null, array('class'=>'form-control','placeholder' => 'Locatus Us Heading'))); ?>

						</div>
                      <div class="form-group">
							<?php echo e(Form::label('cltsat_heading', 'Client Satisfaction Heading')); ?>

							<?php echo e(Form::text('cltsat_heading', (isset($cltsat_heading)) ? $cltsat_heading : null, array('class'=>'form-control','placeholder' => 'Client Satisfaction Heading'))); ?>

						</div>
                     
                      <div class="form-group">
							<?php echo e(Form::label('cltsat_subheading', 'Client Satisfaction Sub Heading')); ?>

							<?php echo e(Form::text('cltsat_subheading', (isset($cltsat_subheading)) ? $cltsat_subheading : null, array('class'=>'form-control','placeholder' => 'Client Satisfaction Sub Heading'))); ?>

						</div>
                     
                      <div class="form-group">
							<?php echo e(Form::label('imgglry_heading', 'Image Gallery Heading')); ?>

							<?php echo e(Form::text('imgglry_heading', (isset($imgglry_heading)) ? $imgglry_heading : null, array('class'=>'form-control','placeholder' => 'Image Gallery Heading'))); ?>

						</div>
                     
                      <div class="form-group">
							<?php echo e(Form::label('fw_heading', 'Fenesta World Heading')); ?>

							<?php echo e(Form::text('fw_heading', (isset($fw_heading)) ? $fw_heading : null, array('class'=>'form-control','placeholder' => 'Fenesta World Heading'))); ?>

						</div>
                     
                        
                      <div class="form-group">
							<?php echo e(Form::label('cusapp_heading', 'Customer Appreciations Heading')); ?>

							<?php echo e(Form::text('cusapp_heading', (isset($cusapp_heading)) ? $cusapp_heading : null, array('class'=>'form-control','placeholder' => 'Customer Appreciations Heading'))); ?>

						</div>
                     
                      <div class="form-group">
							<?php echo e(Form::label('blog_heading', 'Blog Heading')); ?>

							<?php echo e(Form::text('blog_heading', (isset($blog_heading)) ? $blog_heading : null, array('class'=>'form-control','placeholder' => 'Blog Heading'))); ?>

						</div>
                     
                        
						<?php endif; ?>
                        
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
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/editPage.blade.php ENDPATH**/ ?>