@extends('adminlte::page')

@section('title', 'Edit News')

@section('content_header')
<h1 class="m-0 text-dark">Edit News</h1>

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
				{{ Form::model($news, ['url'  => ['admin/updateNews', $news->id], 'role'=> 'form','files'=>'true']) }}
				<div class="form-group">
					{{ Form::label('meta_title', 'Upload Type*') }}
					{{ Form::select('upload_type',
						array(
							'' => '--Select Type--',
							'1' => 'Press Releases',
							'2' => 'Press Coverage',
							'3' => 'Advertisements',
							'4' => 'Events & Exhibitions'
                
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
				{{ Form::label('detail', 'Detail*') }}
				{{ Form::text('detail',null,array('class'=>'form-control','placeholder' => 'Enter Detail')) }}
			</div>
			<div class="form-group">
					{{ Form::label('image', 'Image*') }}
                
                 <label class="note"> ( Size : 300 * 150 ) </label>
					{{ Form::file('image',array('class'=>'form-control')) }}
                 <br>
                    @if($news->image)
                       <img src="{{asset("images/news/$news->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
			<div class="form-group">
				{{ Form::label('content', 'Content*') }}
				{{ Form::textarea('content',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Content')) }}
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

