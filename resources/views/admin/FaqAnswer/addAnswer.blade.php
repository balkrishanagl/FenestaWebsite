@extends('adminlte::page')

@section('title', 'Add Testimonial')

@section('content_header')
<h1 class="m-0 text-dark">Add Testimonial</h1>

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
				{{ Form::open(array('url' => 'admin/saveFaqAnswer','files' => true)) }}
				<div class="form-group">
					{{ Form::label('Faq', 'Faq*') }}
					{!! Form::select('faq_id', $select, null, ['class'=>'form-control']) !!}
					
				</div>
				<div class="form-group">
					{{ Form::label('answer', 'Answer*') }}
					{{ Form::text('answer',null,array('class'=>'form-control','placeholder' => 'Enter Answer')) }}
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

