@extends('adminlte::page')

@section('title', 'Add Quality & Innovations')

@section('content_header')
<h1 class="m-0 text-dark">Add 
@if($id==1)
   Quality & Innovations
@elseif($id==2)
   Services & Infrastructure
@elseif($id==3)
    Brand & Heritage
@else
    Green & Sustainability
@endif
</h1>
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

    $("#mainimage").change(function(){
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
				{{ Form::open(array('url' => 'admin/saveSolutions','files' => true)) }}
                <input type="hidden" name="type" value="{{$id}}">
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Description', 'Description*') }}
					{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('image', 'Home Image*') }}
                    <label class="note"> ( Size : 350 * 250 ) </label>
					{{ Form::file('image',array('class'=>'form-control')) }}
                    <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="150px" />
				</div>
				<div class="form-group">
					{{ Form::label('mainimage', 'Image*') }}
                     <label class="note"> ( Size : 450 * 250 ) </label>
					{{ Form::file('mainimage',array('class'=>'form-control')) }}<br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="150px" />
				</div>
                <div class="form-group">
					{{ Form::label('status', ' Status*') }}
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
					{{ Form::label('show_on', ' Show On Home*') }}
					{{ Form::select('show_on',
						array(
							'No' => 'No',
							'Yes' => 'Yes',
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