@extends('adminlte::page')

@section('title', 'Add Banner')

@section('content_header')
<h1 class="m-0 text-dark">Add Banner</h1>
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

    $("#home_banner_small").change(function(){
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

    $("#home_banner_image").change(function(){
        readURL1(this);
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
				{{ Form::open(array('url' => 'admin/saveBanner','files' => true)) }}
				<div class="form-group">
					{{ Form::label('Heading', 'Heading*') }}
					{{ Form::text('heading',null,array('class'=>'form-control','placeholder' => 'Enter Heading')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Sub-Heading', 'Sub Heading*') }}
					{{ Form::text('sub_heading',null,array('class'=>'form-control','placeholder' => 'Enter Sub Heading')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Hover-Heading', 'Hover Heading*') }}
					{{ Form::text('hover_heading',null,array('class'=>'form-control','placeholder' => 'Enter Hover Heading')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Hover-sub-heading', 'Hover SubHeading*') }}
					{{ Form::text('hover_sub_heading',null,array('class'=>'form-control','placeholder' => 'Enter SubHeading')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Home Banner Small', 'Home Banner Small*') }}
                    <label class="note"> ( Image Size : 700 * 500 ) </label>
					{{ Form::file('home_banner_small',array('class'=>'form-control')) }}
                     <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('Home Banner', 'Home Banner*') }}
                     <label class="note"> ( Image Size : 700 * 500 ) </label>
					{{ Form::file('home_banner_image',array('class'=>'form-control')) }}
                     <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
				</div>
				<div class="form-group">
                   
					{{ Form::label('regions', 'Regions*') }}
					{{ Form::select('regions',$regions,null,array('class'=>'form-control')) }}
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
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
    			</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop