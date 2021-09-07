@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
<h1 class="m-0 text-dark">Edit @if($banner->type==2) Durable safe @else End to End @endif  Service</h1>
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

    $("#onhoverimage").change(function(){
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

    $("#mainimage").change(function(){
        readURL2(this);
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
				{{ Form::model($banner, ['url'  => ['admin/endtoend/update', $banner->id], 'role'=> 'form','files'=>'true']) }}
				<input type="hidden" name="type" value="{{$banner->type}}">
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('heading',$banner->title,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('image', ' Icon*') }}
                     <label class="note"> ( Size : 50 * 50 ) </label>
					{{ Form::file('image',array('class'=>'form-control')) }}
                     <br>
                    @if($banner->image)
                       <img src="{{asset("images/services/$banner->image")}}" id="category-img-tag" width="50px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="50px" />
                    @endif
				</div>
				
				@if($banner->type==2)
                  <div class="form-group">
					{{ Form::label('onhoverimage', ' On Hover Icon*') }}
                       <label class="note"> ( Size : 50 * 50 ) </label>
					{{ Form::file('onhoverimage',array('class'=>'form-control')) }}
                       <br>
                    @if($banner->onhoverimage)
                       <img src="{{asset("images/services/onhover/$banner->onhoverimage")}}" id="category-img-tag1" width="50px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag1" width="50px" />
                    @endif
				</div>
                  <div class="form-group">
					{{ Form::label('mainimage', 'Image*') }}
                       <label class="note"> ( Size : 350 * 450 ) </label>
					{{ Form::file('mainimage',array('class'=>'form-control')) }}
                       <br>
                    @if($banner->mainimage)
                       <img src="{{asset("images/services/rightimage/$banner->mainimage")}}" id="category-img-tag2" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag2" width="150px" />
                    @endif
				</div>
                
                <div class="form-group">
					{{ Form::label('contentheading', 'Heading*') }}
					{{ Form::text('contentheading',null,array('class'=>'form-control','placeholder' => 'Enter Heading','required'=>'required')) }}
				</div>
                <div class="form-group">
					{{ Form::label('content', 'Content*') }}
					{{ Form::textarea('content',null,array('class'=>'form-control','placeholder' => 'Enter Content','required'=>'required')) }}
				</div>
                @endif 
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
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
@stop