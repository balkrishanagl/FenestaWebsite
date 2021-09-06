@extends('adminlte::page')

@section('title', 'Add Awards & Accreditations')

@section('content_header')
<h1 class="m-0 text-dark">Add Awards & Accreditations</h1>

@stop

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop


@section('js')
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
				{{ Form::open(array('url' => 'admin/saveAward','files' => true)) }}
				<div class="form-group">
					{{ Form::label('type', ' Type*') }}
					{{ Form::select('type',
						array(
							'' => '--Select Type--',
							'Awards' => 'Awards',
							'Accreditations' => 'Accreditations',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
				</div>

			<div class="form-group">
					{{ Form::label('image', 'Image*') }}
                
                 <label class="note"> ( Size : 250 * 250 ) </label>
					{{ Form::file('image',array('class'=>'form-control')) }}<br>
                       <img src="#" style="display:none;" id="category-img-tag" width="150px" />
				</div>
			<div class="form-group">
				{{ Form::label('description', 'Content*') }}
				{{ Form::textarea('description',null,array('class'=>'form-control','placeholder' => 'Enter Content')) }}
			</div>  <div class="form-group">
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

