@extends('adminlte::page')

@section('title', 'Add Testimonial')

@section('content_header')
<h1 class="m-0 text-dark">Add Testimonial</h1>

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
				{{ Form::open(array('url' => 'admin/saveTestimonial','files' => true)) }}
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
					'' => '--Select category--',
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
            {{--    <div class="form-group">
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
                       <img src="#" style="display:none;" id="category-img-tag" width="200px" />
				</div>
				<div class="form-group">
					{{ Form::label('reference_image', 'Reference Image*') }}
                    <label class="note"> ( Size : 400 * 450 ) </label>
					{{ Form::file('reference_image',array('class'=>'form-control')) }}
                    <br>
                       <img src="#" style="display:none;" id="category-img-tag1" width="200px" />
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

				<!-- <div class="custom-file mb-3">
			      <input type="file" class="custom-file-input" id="customFile" name="filename">
			      <label class="custom-file-label" for="customFile">Choose file</label>
			    </div> -->
 <div class="form-group">
   {{-- <input type="file" name="img[]" class="file">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-paperclip"></i></span>
      </div>
      <input type="text" class="form-control" disabled placeholder="Upload File" aria-label="Upload File" aria-describedby="basic-addon1">
      <div class="input-group-append">
        <button type="button" class="browse input-group-text btn btn-success" id="basic-addon2"> 
        	<i class="fas fa-search"></i>  Browse 
        </button>
      </div>
    </div>

			    <style>

			    	.file { visibility: hidden;position: absolute; }


			    </style>
			   
			   <script>
			   	$(document).on("click", ".browse", function() {
				  var file = $(this)
				    .parent()
				    .parent()
				    .parent()
				    .find(".file");
				  file.trigger("click");
				});
				$(document).on("change", ".file", function() {
				  $(this)
				    .parent()
				    .find(".form-control")
				    .val(
				      $(this)
				        .val()
				        .replace(/C:\\fakepath\\/i, "")
				    );
				});

			   </script>
--}}
				<div class="form-group">
					{{Form::submit('submit',array('class' => 'btn btn-primary'))}}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>