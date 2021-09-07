@extends('adminlte::page')

@section('title', 'Edit Testimonial')

@section('content_header')
<h1 class="m-0 text-dark">Edit Testimonial</h1>

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

    $("#user_image").change(function(){
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

    $("#reference_image").change(function(){
        readURL1(this);
    });
        
        
     var urla = "{{url('/')}}/admin/editgetstate";//should return json with a list of cities only 
        var id = "{{$testimonial->state}}";
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
                var id = "{{$testimonial->city}}";
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
				{{ Form::model($testimonial, ['url'  => ['admin/updateTestimonial', $testimonial->id], 'role'=> 'form','files'=>'true']) }}
				<div class="form-group">
					{{ Form::label('name', 'Name*') }}
					{{ Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name')) }}
				</div>

				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
			<div class="form-group">
					{{ Form::label('description', 'Description*') }}
					{{ Form::textarea('description',null,array('class'=>'form-control ckeditor','placeholder' => 'Enter Description')) }}
			</div>
			<div class="form-group">
					{{ Form::label('youtube_url', 'YouTube URL*') }}
					{{ Form::text('youtube_url',null,array('class'=>'form-control','placeholder' => 'Enter YouTube URL')) }}
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
				{{ Form::label('category', 'Category*') }}
					{{ Form::select('category',
					array(
					'' => '--Select Type--',
					'1' => 'Home',
					'2' => 'Retail',
					'3' => 'Projects'
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div>
		{{--	<div class="form-group">
				{{ Form::label('type', 'Type*') }}
					{{ Form::select('type',
					array(
					'' => '--Select Type--',
					'1' => 'Press Releases',
					'2' => 'Press Coverage',
					'3' => 'Advertisements',
					'4' => 'Events &amp; Exhibitions'
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div> --}}
			<div class="form-group">
					{{ Form::label('user_image', 'User Image*') }}
                
                 <label class="note"> ( Size : 150 * 150 ) </label>
					{{ Form::file('user_image',array('class'=>'form-control')) }}
                <br>
                    @if($testimonial->user_image)
                       <img src="{{asset("images/testimonials/user/$testimonial->user_image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
				<div class="form-group">
					{{ Form::label('reference_image', 'Reference Image*') }}
                    <label class="note"> ( Size : 400 * 450 ) </label>
					{{ Form::file('reference_image',array('class'=>'form-control')) }}
                    
                    <br>
                    @if($testimonial->reference_image)
                       <img src="{{asset("images/testimonials/reference/$testimonial->reference_image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    @endif
				</div><div class="form-group">
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

