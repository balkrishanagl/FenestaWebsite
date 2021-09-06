@extends('adminlte::page')

@section('title', 'Add Blog')

@section('content_header')
<h1 class="m-0 text-dark">Add Blog</h1>

@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>

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
				{{ Form::open(array('url' => 'admin/saveBlog','files' => true)) }}
				<div class="form-group">
					{{ Form::label('meta_title', 'Blog Meta Title*') }}
					{{ Form::text('meta_title', null, array('class'=>'form-control','placeholder' => 'Enter Meta Title')) }}
				</div>

				<div class="form-group">
					{{ Form::label('meta_description', 'Blog Meta Description*') }}
					{{ Form::text('meta_description',null,array('class'=>'form-control','placeholder' => 'Enter Meta Description')) }}
				</div>
				<div class="form-group">
					{{ Form::label('meta_keyword', 'Blog Meta Keyword*') }}
					{{ Form::text('meta_keyword',null,array('class'=>'form-control','placeholder' => 'Enter Meta Keyword')) }}
				</div>
				<div class="form-group">
					{{ Form::label('blog_title', 'Blog Title*') }}
					{{ Form::text('blog_title',null,array('class'=>'form-control','placeholder' => 'Enter Blog Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('blog_url', 'Blog URL*') }}
					{{ Form::text('blog_url',null,array('class'=>'form-control','placeholder' => 'Enter Blog URL')) }}
				</div>
                <div class="form-group">
                    {{ Form::label('blog_content', 'Blog Content*') }}
                    {{ Form::textarea('blog_content',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Blog Content')) }}
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

