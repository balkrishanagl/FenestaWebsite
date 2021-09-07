@extends('adminlte::page')

@section('title', 'Edit Testimonial')

@section('content_header')
<h1 class="m-0 text-dark">Edit Testimonial</h1>

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
				{{ Form::model($faqAnswer, ['url'  => ['admin/updateFaqAnswer', $faqAnswer->id], 'role'=> 'form','files'=>'true']) }}
				<div class="form-group">
						  {!! Form::select('faq_id', $faq, $selectedId, ['class' => 'form-control']) !!}
				</div>
			<div class="form-group">
					{{ Form::label('Answer', 'Answer*') }}
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

