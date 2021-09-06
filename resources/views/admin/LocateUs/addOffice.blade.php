@extends('adminlte::page')

@section('title', 'Add Office')

@section('content_header')

<h1 class="m-0 text-dark">Add office</h1>

@stop

@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop


@section('js')
	<script>
     var urla = "{{url('/')}}/admin/getstate";//should return json with a list of cities only   
         $.ajax({
        url:urla,
        dataType:'html',
        success: function(items){
            $('#state').html(items);
        }
    })
        
        
 $('#state').change(function(){
    var url = "{{url('/')}}/admin/getcity";//should return json with a list of cities only
    var std = $(this).find(':selected').data('id');
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('#city').html(items);
        }
    })
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
				{{ Form::open(array('url' => 'admin/saveOffice','files' => true)) }}
				<div class="form-group">
					{{ Form::label('contact_person', 'Contact Person*') }}
					{{ Form::text('contact_person', null, array('class'=>'form-control','placeholder' => 'Enter Contact Person')) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email*') }}
					{{ Form::email('email', null, array('class'=>'form-control','placeholder' => 'Enter Email')) }}
				</div>

				<div class="form-group">
					{{ Form::label('phone', 'Phone*') }}
					{{ Form::number('phone', null, array('class'=>'form-control','placeholder' => 'Enter Phone')) }}
				</div>

				
                <div class="form-group">
					{{ Form::label('state', 'State*') }}
				
                    
                    {{ Form::select('state',
						array(
							'' => '--Select state--',
							
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
                    
                    
				</div>
                
				<div class="form-group">
					{{ Form::label('city', 'City*') }}
				
                    
                    {{ Form::select('city',
						array(
							'' => '--Select City--',
							
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
                    
				</div>
				
				<div class="form-group">
					{{ Form::label('address', 'Address*') }}
					{{ Form::text('address',null,array('class'=>'form-control','placeholder' => 'Enter Address')) }}
				</div>
                <div class="form-group">
					{{ Form::label('locality', 'Locality*') }}
					{{ Form::text('locality',null,array('class'=>'form-control','placeholder' => 'Enter Locality')) }}
				</div>
                <div class="form-group">
					{{ Form::label('video_url', 'Video Url*') }}
					{{ Form::text('video_url',null,array('class'=>'form-control','placeholder' => 'Enter Video Url')) }}
				</div>
                <div class="form-group">
					{{ Form::label('type', 'Type*') }}
					{{ Form::select('type',
						array(
							'' => '--Select Type--',
							'1' => 'Head Office',
							'2' => 'Sales',
							'3' => 'Extrusion',
							'4' => 'Fabrication'
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
				</div>
                    <div class="form-group">
					{{ Form::label('lat', 'Latitude*') }}
					{{ Form::text('lat',null,array('class'=>'form-control','placeholder' => 'Enter Latitude')) }}
				</div>
                 <div class="form-group">
					{{ Form::label('long', 'Longitude*') }}
					{{ Form::text('long',null,array('class'=>'form-control','placeholder' => 'Enter Longitude')) }}
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

