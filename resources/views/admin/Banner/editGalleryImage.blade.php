@extends('adminlte::page')

@section('title', 'Edit Gallery Images')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Edit Gallery Images</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="{{ URL::to('/') }}/admin/listGalleryImages"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>
@stop

@section('css')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="{{ asset('js/jquery/1.9.1/jquery.js') }}" defer></script> -->
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
@stop

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="card-body">
				{{ Form::model($gallery, ['url'  => ['admin/updateGalleryImage', $gallery->id], 'role'=> 'form','files'=>'true']) }}
				
				<div class="form-group">
					{{ Form::label('Heading', 'Heading*') }}
					{{ Form::text('heading',null,array('class'=>'form-control','placeholder' => 'Enter Heading')) }}
				</div>
                            @php
                            $showarray = explode(',',$gallery->showon);
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
                            @endphp
                        <div class="form-group">
					{{ Form::label('shownon', 'Show On*') }}
                            
					<select name="showon[]" id="showon" multiple  class="form-control js-example-basic-multiple">
                      <option value="">Default</option>
                            <optgroup label="Page">
                                <?php foreach ($pages as $page) { ?>
                             <option <?php echo (in_array($page->id,$page_array))?'selected':'';?> value="page-<?php echo $page->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$page->id)?'selected':'';?>><?php echo $page->page_title;?> 
                              </option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Product"> 
                                
                            <?php foreach ($product as $pp) { 
                              $othertypee = $pp->producttype()->get();
                            
                            ?>
                             <option <?php echo (in_array($pp->id,$product_array))?'selected':'';?> value="product-<?php echo $pp->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$pp->id)?'selected':'';?>><?php echo $pp->title;?> 
                              </option>
                              <?php foreach ($othertypee as $ppo) { ?> 
                              <option <?php echo (in_array($ppo->id,$producttype_array))?'selected':'';?> value="producttype-<?php echo $ppo->id;?>"  <?php echo (isset($_GET['showon']) && $_GET['showon']==$ppo->id)?'selected':'';?>>  <?php echo $pp->title;?>  : <?php echo $ppo->title;?>
                              </option>
                              <?php } ?>
                              
                            <?php } ?>
                            </optgroup>
                           
                    </select>
				</div>
                
				<div class="form-group">
					{{ Form::label('segtype', 'Segment Type*') }}
					{{ Form::select('segtype',
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
					)}}
				</div>
   <div class="form-group">
					{{ Form::label('zonewise', 'ZONE WISE*') }}
					{{ Form::select('zonewise',
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
					)}}
				</div>
     <div class="form-group">
				{{ Form::label('status', 'Status*') }}
					{{ Form::select('status',
					array(
					'Active' => 'Active',
					'Inactive' => 'Inactive',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div>
				<div class="form-group">
					<label for="image">Images</label>
                    <label class="note"> ( Size : 300 * 200 ) </label>
					<input type="file" name="images" class="form-control" id="image">
                    <br>
                    @if($gallery->image)
                       <img src="{{asset("images/gallery_images/$gallery->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
@stop