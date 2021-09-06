@extends('adminlte::page')

@section('title', 'Add Door Product')

@section('content_header')
<h1 class="m-0 text-dark">Add Door Product</h1>
@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop


@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>

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

    $("#banner_image").change(function(){
        readURL3(this);
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
				{{ Form::open(array('url' => 'admin/Door/typesave','files' => true)) }}
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group" style="display:none">
					{{ Form::label('Type', 'Type*') }}
					 <select name="type" id="type"  class="form-control select">
                      <option value="">Select</option>
                      <option value="Window">Window</option>
                      <option selected value="Door">Door</option>
                       
                    </select>
				</div>
			
				<div class="form-group">
					{{ Form::label('fullimage', ' Image*') }}
					{{ Form::file('fullimage',array('class'=>'form-control')) }}
                    <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('image', ' Icon*') }}
					{{ Form::file('image',array('class'=>'form-control')) }}<br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('hoverimage', 'Hover Icon*') }}
					{{ Form::file('hoverimage',array('class'=>'form-control')) <br>
                       <img src="#" style="display:none;" id="category-img-tag2" width="200px" />
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
							<label for="meta_title">Meta Title*</label>
							<input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title">
						</div>
						<div class="form-group">
							<label for="meta_keyword">Meta Keyword*</label>
							<input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Meta Keyword">
						</div>
						<div class="form-group">
							<label for="meta_description">Meta Description*</label>
							<textarea name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"></textarea>
						</div>
                
                <div class="form-group">
							<label for="banner_image">Banner Image</label>
							<input type="file" name="banner_image" class="form-control" id="banner_image"><br>
                       <img src="#" style="display:none;" id="category-img-tag3" width="200px" />
						</div>
                
                <div class="form-group">
							<label for="page_description">Short Description</label>

							<textarea id="short_description" name="short_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
                
                             
                <div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
                
                <div class="form-group">
							<label for="feature_benefits">Feature Benefits</label>

							<textarea id="feature_benefits" name="feature_benefits" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
                
                                
				<div class="form-group">
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
    			</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop