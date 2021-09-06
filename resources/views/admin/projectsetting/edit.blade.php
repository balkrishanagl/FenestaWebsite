@extends('adminlte::page')

@section('title', 'Project Settings')

@section('content_header')
<h1 class="m-0 text-dark">Project Settings</h1>
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
					{{ Form::model('',['url'  => ['admin/projectsettingsave'], 'role'=> 'form','files'=>'true']) }}
					<div class="card-body">
					
						
						<div class="form-group">
                            <input type="hidden" name="exist_logo" value="{{$logo}}">
                            
							<label for="logo">Logo</label>
                            <br>
                            <img src={!!asset("images/logo/$logo")!!} alt="no">
							<input type="file" name="logo" class="form-control" id="logo">
						</div>
					
                        <div class="form-group">
							{{ Form::label('facebook', 'Facebook Link') }}
							{{ Form::text('facebook', (isset($facebook)) ? $facebook : null, array('class'=>'form-control','placeholder' => 'Facebook Link')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('twitter', 'Twitter Link') }}
							{{ Form::text('twitter', (isset($twitter)) ? $twitter : null, array('class'=>'form-control','placeholder' => ' Twitter Link')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('insta', 'Instagram link') }}
							{{ Form::text('insta', (isset($insta)) ? $insta : null, array('class'=>'form-control','placeholder' => ' Instagram link')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('youtube', 'Youtube') }}
							{{ Form::text('youtube', (isset($youtube)) ? $youtube : null, array('class'=>'form-control','placeholder' => ' Youtube Link')) }}
						</div>

                        <div class="form-group">
							{{ Form::label('linkedin', 'Linkedin Link') }}
							{{ Form::text('linkedin', (isset($linkedin)) ? $linkedin : null, array('class'=>'form-control','placeholder' => ' Linkedin Link')) }}
						</div>

                        <div class="form-group">
							{{ Form::label('copyright', 'Copyright') }}
							{{ Form::text('copyright', (isset($copyright)) ? $copyright : null, array('class'=>'form-control','placeholder' => ' Copyright')) }}
						</div>

                        <div class="form-group">
							{{ Form::label('playstore', 'Playstore link') }}
							{{ Form::text('playstore', (isset($playstore)) ? $playstore : null, array('class'=>'form-control','placeholder' => ' Playstore link')) }}
						</div>

                        <div class="form-group">
							{{ Form::label('appstore', 'Appstore link') }}
							{{ Form::text('appstore', (isset($appstore)) ? $appstore : null, array('class'=>'form-control','placeholder' => ' Appstore link')) }}
						</div>

                        <div class="form-group">
							{{ Form::label('subscribetitle', 'Subscribe Title') }}
							{{ Form::text('subscribetitle', (isset($subscribetitle)) ? $subscribetitle : null, array('class'=>'form-control','placeholder' => ' Subscribe Title')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('headerphoneno', ' Header Phone No') }}
							{{ Form::text('headerphoneno', (isset($headerphoneno)) ? $headerphoneno : null, array('class'=>'form-control','placeholder' => ' Header Phone No')) }}
						</div>

					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop