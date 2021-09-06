@extends('adminlte::page')

@section('title', 'Add Brochure')

@section('content_header')
<h1 class="m-0 text-dark">Add Brochure</h1>
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
            $('.pdfview').show();
            $($.parseHTML('<a target="_blank"><i style="font-size:30px" class="fa fa-file "></i></a>')).attr('href', e.target.result).appendTo('div.pdfview');
              
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pdf").change(function(){
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
				{{ Form::open(array('url' => 'admin/Brochuresave','files' => true)) }}
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				
			
				<div class="form-group">
					{{ Form::label('image', ' Image*') }}
                     <label class="note"> ( Size : 300 * 350 ) </label>
					{{ Form::file('image',array('class'=>'form-control')) }} <br>
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('pdf', 'PDF*') }}
					{{ Form::file('pdf',array('class'=>'form-control')) }}
                    <br>
                    <div class="pdfview" style="display:none"></div>
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