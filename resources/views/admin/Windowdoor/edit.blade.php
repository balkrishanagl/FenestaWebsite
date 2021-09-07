@extends('adminlte::page')

@section('title', 'Edit Window & Door Type')

@section('content_header')
<h1 class="m-0 text-dark">Edit Home Window & Door Section</h1>
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

    $("#window_image").change(function(){
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

    $("#door_image").change(function(){
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
				{{ Form::model($banner, ['url'  => ['admin/update', $banner->id], 'role'=> 'form','files'=>'true']) }}
				
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('heading',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
                    
				</div>
				
				<div class="form-group">
					{{ Form::label('window_image', 'Window Image*') }}
					{{ Form::file('window_image',array('class'=>'form-control','id'=>'window_image')) }}
                    
                    <br>
                    @if($banner->window_image)
                       <img src="{{asset("images/windowdoor/$banner->window_image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
				
				<div class="form-group">
					<label for="door_image">Door Image</label>
					<input type="file" name="door_image" class="form-control" id="door_image">
                    <br>
                    @if($banner->door_image)
                       <img src="{{asset("images/windowdoor/$banner->door_image")}}" id="category-img-tag1" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    @endif
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