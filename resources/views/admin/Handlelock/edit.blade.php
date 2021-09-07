@extends('adminlte::page')

@section('title', 'Edit Handle and Lock')

@section('content_header')
<h1 class="m-0 text-dark">Edit Handle and Lock</h1>
@stop

@section('css')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop
@section('js')
<script>
    $(function() {
    $('.acessories_type').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'Acessories') {
            $('.acessories_type').show(); 
        } else {
            $('.acessories_type').hide(); 
        } 
    });
});
    
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
				{{ Form::model($banner, ['url'  => ['admin/Handlelock/update', $banner->id], 'role'=> 'form','files'=>'true']) }}
				
					<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Type', 'Type*') }}
					{{ Form::select('type',array('Handle'=>'Handle','Lock'=>'Lock','Acessories'=>'Acessories'),null,array('class'=>'form-control','placeholder' => 'Enter Type','id'=>'type')) }}
				</div>
                <div class="form-group acessories_type">
					{{ Form::label('acessories_type', 'Acessories Type*') }}
					{{ Form::text('acessories_type',null,array('class'=>'form-control','placeholder' => 'Enter Acessories Type')) }}
				</div>
				<div class="form-group">
					{{ Form::label('windowdoor', 'Window Door*') }}
					{{ Form::select('windowdoor',$windowdoor,null,array('class'=>'form-control','placeholder' => 'Enter Window Door')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Content', 'Content') }}
					{{ Form::textarea('content',null,array('class'=>'form-control','placeholder' => 'Enter Content')) }}
				</div>
			
				<div class="form-group">
					{{ Form::label('image', ' Image*') }}
					{{ Form::file('image',array('class'=>'form-control')) }}<br>
                    @if($banner->image)
                       <img src="{{asset("images/handlelock/$banner->image")}}" id="category-img-tag" width="150px" />
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
