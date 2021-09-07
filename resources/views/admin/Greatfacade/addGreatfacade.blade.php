@extends('adminlte::page')

@section('title', 'Add Great facade')

@section('content_header')
<h1 class="m-0 text-dark">Add Great facade</h1>

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

    $("#reference_image").change(function(){
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
				{{ Form::open(array('url' => 'admin/saveGreatfacade','files' => true)) }}
				
				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Description*') }}
					{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description')) }}
				</div>
				<div class="form-group">
					{{ Form::label('youtube_url', 'YouTube URL*') }}
					{{ Form::text('youtube_url',null,array('class'=>'form-control','placeholder' => 'Enter YouTube URL')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('reference_image', 'Reference Image*') }}
                    <label class="note"> ( Size : 400 * 450 ) </label>
					{{ Form::file('reference_image',array('class'=>'form-control')) }}
                    <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>

				<!-- <div class="custom-file mb-3">
			      <input type="file" class="custom-file-input" id="customFile" name="filename">
			      <label class="custom-file-label" for="customFile">Choose file</label>
			    </div> -->
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

				<div class="form-group">
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>