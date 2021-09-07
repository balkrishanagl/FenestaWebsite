

<?php $__env->startSection('title', 'Edit Feature benefits'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Feature benefits</h1>

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

    $("#icon").change(function(){
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

    $("#onhovericon").change(function(){
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

    $("#image").change(function(){
        readURL2(this);
    });
        
        
        
</script>

<script>
    jQuery(document).ready(function($)
    {
        var i=1;
        $('[data-toggle="tooltip"]').tooltip();
        $(".add-new-bg").click(function()
        {
  
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text"  name="optiondata['+i+'][title]"  class="form-control"></td><td><input type="text"  name="optiondata['+i+'][content]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bg").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
            i=i+1;
        });
        $(document).on("click", ".delete_bg", function()
        {
            $(this).parents("tr").remove();
        })
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
				<?php echo e(Form::model($testimonial, ['url'  => ['admin/updateFeaturebenefit', $testimonial->id], 'role'=> 'form','files'=>'true'])); ?>

				<div class="form-group">
					<?php echo e(Form::label('name', 'Name*')); ?>

					<?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name'))); ?>

				</div>
	           <div class="form-group">
					<?php echo e(Form::label('othername', 'Other Name*')); ?>

					<?php echo e(Form::text('othername',null,array('class'=>'form-control','placeholder' => 'Enter Style & benefits Name'))); ?>

				</div>

				<div class="form-group">
					<?php echo e(Form::label('title', 'Title*')); ?>

					<?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title'))); ?>

				</div>
			<div class="form-group">
					<?php echo e(Form::label('description', 'Description*')); ?>

					<?php echo e(Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description'))); ?>

			</div>
			<div class="form-group">
					<?php echo e(Form::label('belowimage', 'Below Image content*')); ?>

					<?php echo e(Form::textarea('belowimage',null,array('class'=>'form-control','placeholder' => 'Enter Below Image content'))); ?>

				</div>
			<div class="form-group">
					<?php echo e(Form::label('result', 'Result*')); ?>

					<?php echo e(Form::text('result',null,array('class'=>'form-control','placeholder' => 'Enter Result'))); ?>

				</div>
			
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
					<?php echo e(Form::label('belowpoints', 'Below Points Content*')); ?>

					<?php echo e(Form::textarea('belowpoints',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Below Points Content'))); ?>

				</div>
                
                <hr>
                
             <h3>Points</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bg gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bg">
                  <thead>
                    <tr>
                        <td> Title </td>
                        <td>  Content </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($testimonial->optiondata)): ?>
                      <?php $__currentLoopData = json_decode($testimonial->optiondata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk => $jj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                            <td><input type="text" value="<?php echo e($jj->title); ?>"  name='optiondata[exist<?php echo e($jk); ?>][title]' class="form-control"></td>
                         <td><input type="text" value="<?php echo e($jj->content); ?>"  name='optiondata[exist<?php echo e($jk); ?>][content]' class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    <tr>
                         <td><input type="text" name="optiondata[0][title]" class="form-control" ></td>
                         <td><input type="text"  name="optiondata[0][content]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
                
                
                
			<div class="form-group">
					<?php echo e(Form::label('icon', 'Icon*')); ?>

					<?php echo e(Form::file('icon',array('class'=>'form-control'))); ?><br>
                    <?php if($testimonial->icon): ?>
                       <img src="<?php echo e(asset("images/featurebenefit/icon/$testimonial->icon")); ?>" id="category-img-tag" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    <?php endif; ?>
				</div>
                <div class="form-group">
					<?php echo e(Form::label('onhovericon', ' On Hover Icon*')); ?>

					<?php echo e(Form::file('onhovericon',array('class'=>'form-control'))); ?><br>
                    <?php if($testimonial->onhovericon): ?>
                       <img src="<?php echo e(asset("images/featurebenefit/icon/$testimonial->onhovericon")); ?>" id="category-img-tag1" width="150px" />
                    <?php else: ?>
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    <?php endif; ?>
				</div>


				<div class="form-group">
					<?php echo e(Form::label('image', ' Image*')); ?>

					<?php echo e(Form::file('image',array('class'=>'form-control'))); ?><br>
                    <?php if($testimonial->image): ?>
                       <img src="<?php echo e(asset("images/featurebenefit/image/$testimonial->image")); ?>" id="category-img-tag2" width="150px" />
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
                
<div class="form-group">
				<?php echo e(Form::label('showon', 'Show on style & benefits*')); ?>

					<?php echo e(Form::select('showon',
					array(
					'Yes' => 'Yes',
					'No' => 'No',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)); ?>

			</div>
                <?php if(json_decode($testimonial->windowtype)): ?>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Window Type</th>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($ss->title); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = json_decode($testimonial->windowtype); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wk => $wdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr> 
                                <td><?php echo e($wk); ?></td>
                                <?php $__currentLoopData = $wdt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk => $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><select class="form-control" name="windowdata[<?php echo e($wk); ?>][<?php echo e($sk); ?>][]">
                                    <option <?php if($ss[0]=='NA'): ?> selected <?php endif; ?> value="NA">NA</option>
                                    <option <?php if($ss[0]=='*'): ?> selected <?php endif; ?>  value="*">*</option>
                                    <option <?php if($ss[0]=='**'): ?> selected <?php endif; ?>  value="**">**</option>
                                    <option <?php if($ss[0]=='***'): ?> selected <?php endif; ?>  value="***">***</option>
                                    <option <?php if($ss[0]=='****'): ?> selected <?php endif; ?>  value="****">****</option>
                                    <option <?php if($ss[0]=='*****'): ?> selected <?php endif; ?>  value="*****">*****</option>
                                    </select></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <?php else: ?>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Window Type</th>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($ss->title); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $__currentLoopData = $windowdoortype->unique('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr> 
                                <td><?php echo e($wdt->title); ?></td>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><select class="form-control" name="windowdata[<?php echo e($wdt->title); ?>][<?php echo e($ss->title); ?>][]">
                                    <option value="NA">NA</option>
                                    <option value="*">*</option>
                                    <option value="**">**</option>
                                    <option value="***">***</option>
                                    <option value="****">****</option>
                                    <option value="*****">*****</option>
                                    </select></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                
                
                 <?php if(json_decode($testimonial->doortype)): ?>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Door Type</th>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($ss->title); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = json_decode($testimonial->doortype); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wk => $wdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr> 
                                <td><?php echo e($wk); ?></td>
                                <?php $__currentLoopData = $wdt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk => $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><select class="form-control" name="doordata[<?php echo e($wk); ?>][<?php echo e($sk); ?>][]">
                                    <option <?php if($ss[0]=='NA'): ?> selected <?php endif; ?> value="NA">NA</option>
                                    <option <?php if($ss[0]=='*'): ?> selected <?php endif; ?>  value="*">*</option>
                                    <option <?php if($ss[0]=='**'): ?> selected <?php endif; ?>  value="**">**</option>
                                    <option <?php if($ss[0]=='***'): ?> selected <?php endif; ?>  value="***">***</option>
                                    <option <?php if($ss[0]=='****'): ?> selected <?php endif; ?>  value="****">****</option>
                                    <option <?php if($ss[0]=='*****'): ?> selected <?php endif; ?>  value="*****">*****</option>
                                    </select></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <?php else: ?>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Door Type</th>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($ss->title); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $__currentLoopData = $doortype->unique('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr> 
                                <td> <?php echo e($wdt->title); ?></td>
                                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><select class="form-control" name="doordata[<?php echo e($wdt->title); ?>][<?php echo e($ss->title); ?>][]">
                                    <option value="NA">NA</option>
                                    <option value="*">*</option>
                                    <option value="**">**</option>
                                    <option value="***">***</option>
                                    <option value="****">****</option>
                                    <option value="*****">*****</option>
                                    </select></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                
			<div class="form-group">
				<?php echo e(Form::submit('submit',array('class' => 'btn btn-primary'))); ?>

			</div>
			<?php echo e(Form::close()); ?>

		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/admin/Featurebenefit/editFeaturebenefit.blade.php ENDPATH**/ ?>