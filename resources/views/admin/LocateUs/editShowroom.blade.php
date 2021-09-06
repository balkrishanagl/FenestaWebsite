@extends('adminlte::page')

@section('title', 'Edit Blog')

@section('content_header')
<h1 class="m-0 text-dark">Edit Blog</h1>
@stop


@section('css')
	 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop



@section('js')
	<script>
     var urla = "{{url('/')}}/admin/editgetstate";//should return json with a list of cities only 
        var id = "{{$showroom->state}}";
        var data = {'id':id};
         $.ajax({
        url:urla, 
          data:data,
        dataType:'html',
        success: function(items){
            $('#state').html(items);
                    
             $('#state').change(function(){
                var url = "{{url('/')}}/admin/editgetcity/";//should return json with a list of cities only
                var std = $(this).find(':selected').data('id');
                var id = "{{$showroom->city}}";
            //    alert(std);
                var datas = {'state':std ,'id':id};
                $.ajax({
                    url:url,
                    type: 'GET',
                    data:datas,
                    dataType:'html',
                    success: function(items){
                         $('#city').html(items);
                    }
                })
            }).change();
            
        }
    });
        

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
				{{ Form::model($showroom, ['url'  => ['admin/updateShowroom', $showroom->id], 'role'=> 'form','files'=>'true']) }}
				<div class="form-group">
					{{ Form::label('dealer_name', 'Dealer Name*') }}
					{{ Form::text('dealer_name', null, array('class'=>'form-control','placeholder' => 'Enter Dealer Name')) }}
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
					{{ Form::label('locality', 'Locality*') }}
					{{ Form::text('locality',null,array('class'=>'form-control','placeholder' => 'Enter Locality')) }}
				</div>
				<div class="form-group">
					{{ Form::label('address', 'Address*') }}
					{{ Form::text('address',null,array('class'=>'form-control','placeholder' => 'Enter Address')) }}
				</div>
                <div class="form-group">
                    {{ Form::label('contact_person', 'Contact Person*') }}
                    {{ Form::text('contact_person',null,array('class'=>'form-control','placeholder' => 'Enter Contact Person')) }}
                </div>
                 <div class="form-group">
					{{ Form::label('video_url', 'Video Url*') }}
					{{ Form::text('video_url',null,array('class'=>'form-control','placeholder' => 'Enter Video Url')) }}
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
</div>
@stop