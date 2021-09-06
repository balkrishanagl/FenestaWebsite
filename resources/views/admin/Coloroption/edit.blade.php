@extends('adminlte::page')

@section('title', 'Edit Color Option')

@section('content_header')
<h1 class="m-0 text-dark">Edit Color Option</h1>
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
        
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="100px" style="margin:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('.slider_images').on('change', function() {
        $('.preview').show();
        imagesPreview(this, 'div.preview');
    });
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
				{{ Form::model($banner, ['url'  => ['admin/Coloroption/update', $banner->id], 'role'=> 'form','files'=>'true']) }}
				
					<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Type', 'Type*') }}
					{{ Form::select('type',array('Window'=>'Window','Door'=>'Door'),null,array('class'=>'form-control','placeholder' => 'Enter Type')) }}
				</div>
				<div class="form-group">
					{{ Form::label('windowdoor', 'Window Door*') }}
					{{ Form::select('windowdoor',$windowdoor,null,array('class'=>'form-control','placeholder' => 'Enter Window Door')) }}
				</div>
				<div class="form-group">
					{{ Form::label(' Image', 'Slider Images*') }}
					<input type="file" class="form-control slider_images" name="slider_images[]"  multiple><br>
                @if($banner->slider_images)
                <div class="preview" >
                    @foreach(explode(',',$banner->slider_images) as $img)
                      <img src="{{asset("images/coloroption/$img")}}" width="100px">
                    @endforeach
                </div>
                @else
                <div class="preview" style="display:none;"></div>
                @endif 
				</div>
			
				<div class="form-group">
					{{ Form::label('image', ' Image*') }}
					{{ Form::file('image',array('class'=>'form-control')) }}<br>
                    @if($banner->image)
                       <img src="{{asset("images/coloroption/$banner->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
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
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
@stop