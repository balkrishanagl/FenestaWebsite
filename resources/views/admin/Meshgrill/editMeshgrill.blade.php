@extends('adminlte::page')

@section('title', 'Edit Mesh & Grill  Option')

@section('content_header')
<h1 class="m-0 text-dark">Edit Mesh & Grill  Option</h1>

@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
	<script>
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

    $('.image').on('change', function() {
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
				{{ Form::model($news, ['url'  => ['admin/updateMeshgrill', $news->id], 'role'=> 'form','files'=>'true']) }}
				<div class="form-group">
					{{ Form::label('type', ' Type*') }}
					{{ Form::select('type',
						array(
							'' => '--Select Type--',
							'Mesh' => 'Mesh',
							'Grill' => 'Grill',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
				</div>
<div class="form-group">
					{{ Form::label('upload_type', 'Upload Type*') }}
					{{ Form::select('upload_type',
						array(
							'' => '--Select Type--',
							'Option' => 'Option',
							'Style' => 'Style',
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
					{{ Form::label('image', 'Image* (Leave Blank if not want to edit)') }}
					<input type="file" class="form-control image" name="image[]"  multiple><br>
                @if($news->image)
                <div class="preview" >
                    @foreach(explode(',',$news->image) as $img)
                      <img src="{{asset("images/meshgrill/$img")}}" width="100px">
                    @endforeach
                </div>
                @else
                <div class="preview" style="display:none;"></div>
                @endif      
				</div>
			<div class="form-group">
				{{ Form::label('description', 'Content*') }}
				{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content')) }}
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

