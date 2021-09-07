@extends('adminlte::page')

@section('title', 'Add Window Type')

@section('content_header')
<h1 class="m-0 text-dark">Add  Window Type</h1>
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

    $("#thumb_image").change(function(){
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
				{{ Form::open(array('url' => 'admin/Window/save','files' => true)) }}
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Windowproduct', 'Window Product*') }}
                    <select class="form-control" id="Windowproduct" name="product" >
                        @foreach($windowproduct as $wd)
                        <option @if($wd->id==$product_id) selected @endif value="{{ $wd->id }}">{{ $wd->title }}</option>
                        @endforeach
                    </select>
				</div>
			
				<div class="form-group">
					{{ Form::label('image', ' Icon*') }}
					{{ Form::file('image',array('class'=>'form-control')) }}  <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
			
				<div class="form-group">
					{{ Form::label('thumb_image', ' Thumbnail Image*') }}
					{{ Form::file('thumb_image',array('class'=>'form-control')) }}  <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
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