@extends('adminlte::page')

@section('title', 'Edit Banner')

@section('content_header')
<h1 class="m-0 text-dark">Edit Banner</h1>
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
				{{ Form::model($banner, ['url'  => ['admin/updateBanner', $banner->id], 'role'=> 'form','files'=>'true']) }}
				
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
                    <input type="hidden" name="exist_home_banner_small" value="{{ $banner->home_banner_small }}">
					{{ Form::label('home_banner_small', 'Home Banner Small') }}
                    <label class="note"> ( Image Size : 700 * 500 ) </label>
					{{ Form::file('home_banner_small',array('class'=>'form-control','id'=>'home_banner_small')) }}
                    <br>
                    @if($banner->home_banner_small)
                       <img src="{{asset("images/home_banner/small/$banner->home_banner_small")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
				
				<div class="form-group">
                    <input type="hidden" name="exist_home_banner_image" value="{{ $banner->home_banner_image }}">
					<label for="home_banner_image">Home Banner Image</label>
                    <label class="note"> ( Image Size : 700 * 500 ) </label>
					<input type="file" name="home_banner_image" class="form-control" id="home_banner_image">
                    <br>
                    @if($banner->home_banner_image)
                       <img src="{{asset("images/home_banner/big/$banner->home_banner_image")}}" id="category-img-tag1" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    @endif
				</div>
                
                <div class="form-group">
                   
					{{ Form::label('regions', 'Regions*') }}
					{{ Form::select('regions',$regions,null,array('class'=>'form-control')) }}
				</div>     <div class="form-group">
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
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
@stop