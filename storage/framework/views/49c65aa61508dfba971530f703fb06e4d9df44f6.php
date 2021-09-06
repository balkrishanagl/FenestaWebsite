

<?php $__env->startSection('title', 'Edit Door Product'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Door Product</h1>
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

    $("#fullimage").change(function(){
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

    $("#image").change(function(){
        readURL1(this);
    });
        function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag2').show();
            $('#category-img-tag2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#hoverimage").change(function(){
        readURL2(this);
    });
        function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag3').show();
            $('#category-img-tag3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#og_image").change(function(){
        readURL3(this);
    });
        function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag4').show();
            $('#category-img-tag4').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#banner_image").change(function(){
        readURL4(this);
    });
        function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag5').show();
            $('#category-img-tag5').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#woodenimage").change(function(){
        readURL5(this);
    });
        function readURL6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag6').show();
            $('#category-img-tag6').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fenestaimage").change(function(){
        readURL6(this);
    });
</script>
<script>
    jQuery(document).ready(function($)
    {
        $('[data-toggle="tooltip"]').tooltip();
        $(".add-new-bg").click(function()
        {

            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="file" name="arange[][images]" multiple class="gallery-photo-add"></td><td><input type="text"  name="arange[][title]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bg").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".delete_bg", function()
        {
            $(this).parents("tr").remove();
        })
        
        $('[data-toggle="tooltip"]').tooltip();
        
        $(".add-new-bg1").click(function()
        {

            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="file" name="features[][images]" multiple class="gallery-photo-add"></td><td><input type="text"  name="features[][title]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bg1" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bg1").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".delete_bg1", function()
        {
            $(this).parents("tr").remove();
        });
        
        $(".add-new-bgww").click(function()
        {

            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="file" name="woodenoptions[][images]" multiple class="gallery-photo-add"></td><td><input type="text"  name="woodenoptions[][title]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bgww" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bgww").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".delete_bgww", function()
        {
            $(this).parents("tr").remove();
        });
        $(".add-new-bgff").click(function()
        {

            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="file" name="fenestaoptions[][images]" multiple class="gallery-photo-add"></td><td><input type="text"  name="fenestaoptions[][title]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bgff" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bgff").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".delete_bgff", function()
        {
            $(this).parents("tr").remove();
        });
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
				<?php echo e(Form::model($type, ['url'  => ['admin/Door/typeupdate', $type->id], 'role'=> 'form','files'=>'true'])); ?>

				
				<div class="form-group">
					<?php echo e(Form::label('Title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
				<div class="form-group" style="display:none">
					<?php echo e(Form::label('Type', 'Type*')); ?>

					<?php echo e(Form::select('type',array('Window'=>'Window','Door'=>'Door'),null,array('class'=>'form-control','placeholder' => 'Select'))); ?>

				</div>
                
				
				<div class="form-group">
                    <input type="hidden" name="exist_fullimage" value="<?php echo e($type->fullimage); ?>">
					<?php echo e(Form::label('fullimage', ' Image*')); ?>

					<?php echo e(Form::file('fullimage',array('class'=>'form-control'))); ?><br>
                    <?php if($type->fullimage): ?>
                       <img src="<?php echo e(asset("images/windowdoortype/$type->fullimage")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
				</div>
				<div class="form-group">
                    <input type="hidden" name="exist_image" value="<?php echo e($type->image); ?>">
					<?php echo e(Form::label('image', ' Icon*')); ?>

					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?>

 <br>
                    <?php if($type->image): ?>
                       <img src="<?php echo e(asset("images/windowdoortype/$type->image")); ?>" id="category-img-tag1" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    <?php endif; ?>
				</div>
				
				<div class="form-group">
                     <input type="hidden" name="exist_hoverimage" value="<?php echo e($type->hoverimage); ?>">
					<label for="hoverimage">Hover Icon</label>
					<input type="file" name="hoverimage" class="form-control" id="hoverimage">
    <br>
                    <?php if($type->hoverimage): ?>
                       <img src="<?php echo e(asset("images/windowdoortype/$type->hoverimage")); ?>" id="category-img-tag2" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag2" width="150px" />
                    <?php endif; ?>
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
                 <?php if($type->id==5): ?>
                <div class="form-group">
                    <input type="hidden" name="exist_woodenimage" value="<?php echo e($type->woodenimage); ?>">
					<?php echo e(Form::label('woodenimage', 'Wooden Image*')); ?>

					<?php echo e(Form::file('woodenimage',array('class'=>'form-control'))); ?>

    <br>
                    <?php if($type->woodenimage): ?>
                       <img src="<?php echo e(asset("images/options/$type->woodenimage")); ?>" id="category-img-tag5" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag5" width="150px" />
                    <?php endif; ?>
				</div>
                <div class="form-group">
                    <input type="hidden" name="exist_fenestaimage" value="<?php echo e($type->fenestaimage); ?>">
					<?php echo e(Form::label('fenestaimage', 'Fenesta Image*')); ?>

					<?php echo e(Form::file('fenestaimage',array('class'=>'form-control'))); ?>

    <br>
                    <?php if($type->fenestaimage): ?>
                       <img src="<?php echo e(asset("images/options/$type->fenestaimage")); ?>" id="category-img-tag6" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag6" width="150px" />
                    <?php endif; ?>
				</div>
                <?php endif; ?>
                 <hr>
                        <h3>SEO Details</h3>  <hr>
						<div class="form-group">
							<?php echo e(Form::label('meta_title', 'Meta Title*')); ?>

							<?php echo e(Form::text('meta_title',  (isset($type->meta_title)) ? $type->meta_title : null, array('class'=>'form-control','placeholder' => 'Meta Title'))); ?>	
						</div>

						<div class="form-group">
							<?php echo e(Form::label('meta_keyword', 'Meta Keyword*')); ?>

							<?php echo e(Form::text('meta_keyword',  (isset($type->meta_keyword)) ? $type->meta_keyword : null, array('class'=>'form-control','placeholder' => 'Meta Keyword'))); ?>	
						</div>
						<div class="form-group">

							<?php echo e(Form::label('meta_description', 'Meta Description*')); ?>

							<?php echo e(Form::text('meta_description',  (isset($type->meta_description)) ? $type->meta_description : null, array('class'=>'form-control','placeholder' => 'Meta Description'))); ?>

						</div>
                        
                        <div class="form-group">
							<?php echo e(Form::label('og_title', 'OG Title')); ?>

							<?php echo e(Form::text('og_title', (isset($type->og_title)) ? $type->og_title : null, array('class'=>'form-control','placeholder' => 'OG Title'))); ?>	
						</div>
                        <div class="form-group">

							<?php echo e(Form::label('og_description', 'OG Description')); ?>

							<?php echo e(Form::text('og_description', (isset($type->og_desc)) ? $type->og_desc : null, array('class'=>'form-control','placeholder' => 'OG Description'))); ?>

						</div>
                
                <div class="form-group">
                            
                            <input type="hidden" name="exist_og_image" <?php if(!empty($og_img)): ?> value="<?php echo e($og_img); ?>" <?php endif; ?> >
                            
							<label for="og_image">OG Image</label>
							<input type="file" name="og_image" class="form-control" id="og_image"> <br>
                    <?php if($type->og_image): ?>
                       <img src="<?php echo e(asset("images/$type->og_image")); ?>" id="category-img-tag3" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag3" width="150px" />
                    <?php endif; ?>
						</div>
                
                
<div class="form-group">
							<label for="banner_image">Banner Image</label>
							<input type="file" name="banner_image" class="form-control" id="banner_image">
<br>
                    <?php if($type->banner_image): ?>
                       <img src="<?php echo e(asset("images/windowdoortype/$type->banner_image")); ?>" id="category-img-tag4" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag4" width="150px" />
                    <?php endif; ?>
						</div>
                
                  <div class="form-group">
							<label for="page_description">Short Description</label>

							<textarea id="short_description" name="short_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."><?php echo e($type->short_description); ?></textarea>
						</div>
                
                             
                <div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."><?php echo e($type->page_description); ?></textarea>
						</div>
                <div class="form-group">
							<label for="feature_benefits">Feature Benefits</label>

							<textarea id="feature_benefits" name="feature_benefits" rows="7" class="form-control ckeditor" placeholder="Write your message.."><?php echo e($type->feature_benefits); ?></textarea>
						</div>
                <div class="form-group">
							<label for="series">Series Content</label>

							<textarea id="series" name="series" rows="7" class="form-control ckeditor" placeholder="Write your message.."><?php echo e($type->series); ?></textarea>
						</div>
                
               <?php if($type->id==5): ?>
                <h3>Available arange</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bg gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bg">
                  <thead>
                    <tr>
                        <td> Image </td>
                        <td> Title </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($type->arange)): ?>
                      <?php $__currentLoopData = json_decode($type->arange); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                            <td>
                                <input type="hidden" name='arange[exist."<?php echo e($jk); ?>"][eimages]' value="<?php echo e($jj->image); ?>">
                                <input type="file" name='arange[exist."$jk"][images]' value="<?php echo e($jj->image); ?>" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="<?php echo e($jj->title); ?>"  name='arange[exist."$jk"][title]' class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    <tr>
                         <td><input type="file" name="arange[][images]" multiple class="gallery-photo-add"></td>
                         <td><input type="text"  name="arange[][title]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
                
                <h3>Features & Benefits</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bg1 gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bg1">
                  <thead>
                    <tr>
                        <td> Image </td>
                        <td> Title </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($type->features)): ?>
                      <?php $__currentLoopData = json_decode($type->features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>  
                            <td>
                                <input type="hidden" name='features[exist"<?php echo e($jk); ?>"][eimages]' value="<?php echo e($jj->image); ?>">
                                <input type="file" name='features[exist"$jk"][images]' value="<?php echo e($jj->image); ?>" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="<?php echo e($jj->title); ?>"  name='features[exist"$jk"][title]' class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg1" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?> 
                    <tr>
                         <td><input type="file" name="features[][images]" multiple class="gallery-photo-add"></td>
                         <td><input type="text"  name="features[][title]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg1" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
                <h3>Wooden Options</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bgww gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bgww">
                  <thead>
                    <tr>
                        <td> Image </td>
                        <td> Title </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($type->woodenoptions)): ?>
                      <?php $__currentLoopData = json_decode($type->woodenoptions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>  
                            <td>
                                <input type="hidden" name='woodenoptions[exist"<?php echo e($jk); ?>"][eimages]' value="<?php echo e($jj->image); ?>">
                                <input type="file" name='woodenoptions[exist"$jk"][images]' value="<?php echo e($jj->image); ?>" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="<?php echo e($jj->title); ?>"  name='woodenoptions[exist"$jk"][title]' class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bgww" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?> 
                    <tr>
                         <td><input type="file" name="woodenoptions[][images]" multiple class="gallery-photo-add"></td>
                         <td><input type="text"  name="woodenoptions[][title]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bgww" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
                <h3>fenesta Options</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bgff gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bgff">
                  <thead>
                    <tr>
                        <td> Image </td>
                        <td> Title </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($type->fenestaoptions)): ?>
                      <?php $__currentLoopData = json_decode($type->fenestaoptions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>  
                            <td>
                                <input type="hidden" name='fenestaoptions[exist"<?php echo e($jk); ?>"][eimages]' value="<?php echo e($jj->image); ?>">
                                <input type="file" name='fenestaoptions[exist"$jk"][images]' value="<?php echo e($jj->image); ?>" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="<?php echo e($jj->title); ?>"  name='fenestaoptions[exist"$jk"][title]' class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bgff" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?> 
                    <tr>
                         <td><input type="file" name="fenestaoptions[][images]" multiple class="gallery-photo-add"></td>
                         <td><input type="text"  name="fenestaoptions[][title]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bgff" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
               <?php endif; ?>
                 
             <h3>Options About</h3>  <hr>
              
                <table class="table" id="tablemuli-bgoption">
                  <thead>
                    <tr>
                        <td> About </td>
                        <td> Image </td>
                        <td> Title </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($type->options)): ?>
                      <?php $__currentLoopData = json_decode($type->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                           <td> <?php echo e($jk); ?> </td>
                            <td>
                                  <input type="hidden" name="options[<?php echo e($jk); ?>][eimages]" value="<?php echo e($jj->image); ?>">
                                <input type="file" name="options[<?php echo e($jk); ?>][images]" value="<?php echo e($jj->image); ?>" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="<?php echo e($jj->title); ?>"  name='options[<?php echo e($jk); ?>][title]' class="form-control"></td>
                         
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                    <tr>
                        <td> Color </td>
                         <td><input type="file" name="options[color][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[color][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Glass </td>
                         <td><input type="file" name="options[glass][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[glass][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Handle </td>
                         <td><input type="file" name="options[handle][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[handle][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Meshgrill </td>
                         <td><input type="file" name="options[meshgrill][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[meshgrill][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Trim </td>
                         <td><input type="file" name="options[trim][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[trim][title]"  class="form-control"></td>
                        
                      </tr>
                      <?php endif; ?>
                  </tbody>
                </table>
                
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Door/typeedit.blade.php ENDPATH**/ ?>