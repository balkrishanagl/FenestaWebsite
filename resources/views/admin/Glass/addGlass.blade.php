@extends('adminlte::page')

@section('title', 'Add Glass Option')

@section('content_header')
<h1 class="m-0 text-dark">Add Glass Option</h1>

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
				{{ Form::open(array('url' => 'admin/saveGlass','files' => true)) }}
				  <div class="form-group">
					{{ Form::label('upload_type', 'Upload Type*') }}
					{{ Form::select('upload_type',
						array(
							'' => '--Select Type--',
							'Glass Option' => 'Glass Option',
							'Glazing Types' => 'Glazing Types',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
				</div>
				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
			
			<div class="form-group">
					{{ Form::label('image', 'Image*') }}
				<input required type="file" class="form-control" name="image" id="image" ><br><img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
			<div class="form-group">
				{{ Form::label('description', 'Content*') }}
				{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content')) }}
			</div> <div class="form-group">
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
				{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
</div>
@stop

