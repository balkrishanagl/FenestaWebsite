@extends('adminlte::page')

@section('title', 'Edit Clientele')

@section('content_header')
<h1 class="m-0 text-dark">Edit Clientele</h1>
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
				{{ Form::model($gallery, ['url'  => ['admin/updateClientele', $gallery->id], 'role'=> 'form','files'=>'true']) }}
				
				<div class="form-group">
					{{ Form::label('Heading', 'Heading*') }}
					{{ Form::text('heading',null,array('class'=>'form-control','placeholder' => 'Enter Heading')) }}
				</div>
                
                      
                
				<div class="form-group">
					{{ Form::label('segtype', 'Segment Type*') }}
					{{ Form::select('segtype',
						array(
							'' => '--Select Type--',
							'Hotels' => 'Hotels',
							'Hospitals' => 'Hospitals',
							'Education Institution' => 'Education Institution',
							'Office' => 'Office',
							'Housing' => 'Housing',
							'Residential' => 'Residential',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
				</div>
   <div class="form-group">
					{{ Form::label('zonewise', 'ZONE WISE*') }}
					{{ Form::select('zonewise',
						array(
							'' => '--Select Type--',
							'1' => 'South Region',
							'2' => 'North Region',
							'3' => 'West Region',
							'4' => 'East Region',
						),
						null,
						array(
							'class' => 'form-control'
						)
					)}}
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
                          <div class="form-group">
				{{ Form::label('showonhome', 'Show On Home*') }}
					{{ Form::select('showonhome',
					array(
					'Yes' => 'Yes',
					'No' => 'No',
					),
					null,
					array(
					'class' => 'form-control'
					)
					)}}
			</div>
				<div class="form-group">
					<label for="image">Images</label>
                    <label class="note"> ( Size : 250 * 100 ) </label>
					<input type="file" name="images" class="form-control" id="image">
                     <br>
                    @if($gallery->image)
                       <img src="{{asset("images/gallery_images/$gallery->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
                    
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