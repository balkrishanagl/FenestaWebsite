@extends('adminlte::page')

@section('title', 'Add page')

@section('content_header')
<div class="row">
<div class="col-md-8 text-left">
    <h1 class="m-0 text-dark">Add New Page</h1></div>
<div class="col-md-4 text-right">
    <a class="btn btn-primary" href="{{ URL::to('/') }}/admin/listPage"><i class="fa fa-arrow-left"></i> Back</a>
                 
  </div>
  </div>

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

    $("#banner_image").change(function(){
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
				<form role="form" id="add_page" enctype="multipart/form-data" action="savePage" method="post" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="card-body">
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
						{{-- <div class="form-group">
							<label for="banner_show">Banner Show</label>
							<div class="icheck-primary d-inline">
								<input type="radio" name="banner_show" checked value="Y">
								<label for="banner_show">Yes
								</label>
							</div>
							<div class="icheck-primary d-inline">
								<input type="radio"name="banner_show" value="N">
								<label for="banner_show">No
								</label>
							</div>
						</div> --}}
						<div class="form-group">
							<label for="banner_image">Banner Image</label>
                            <label class="note"> ( Image Size : 1600 * 400 ) </label>
							<input type="file" name="banner_image" class="form-control" id="banner_image"><br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
						</div>
						<div class="form-group">
							<label for="page_title">Page Title</label>
							<input type="text" name="page_title" class="form-control" id="page_title" placeholder="Page Title">
						</div>
						<div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
						</div>
						<div class="form-group">
							<label for="about">About Fenesta Description</label>

							<textarea id="about" name="about" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
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
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-default" href="{{ URL::to('/') }}/admin/listPage"> Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop