@extends('adminlte::page')

@section('title', 'Edit Window & Door Type')

@section('content_header')
<h1 class="m-0 text-dark">Edit Home Window & Door Section</h1>
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

    $("#image").change(function(){
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

    $("#thumb_image").change(function(){
        readURL1(this);
    });
        function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag2').show();
            $('#category-img-tag2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#featured_image").change(function(){
        readURL2(this);
    });
        function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag3').show();
            $('#category-img-tag3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#og_image").change(function(){
        readURL3(this);
    });
        function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag4').show();
            $('#category-img-tag4').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#banner_image").change(function(){
        readURL4(this);
    });
        
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="100px" style="margin:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('.multi_image').on('change', function() {
        $('.preview').show();
        imagesPreview(this, 'div.preview');
    });
});  
</script>
<script>
    jQuery(document).ready(function($)
    {
        $('[data-toggle="tooltip"]').tooltip();
        $(".add-new-bg").click(function()
        {

            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="file" name="recom[][recom_images]" multiple class="gallery-photo-add"></td><td><input type="text"  name="recom[][recom_title]"  class="form-control"></td><' +
                '<td  style="cursor:pointer"  class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>' +
                '</tr>';
            $("#tablemuli-bg").append(row);    
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".delete_bg", function()
        {
            $(this).parents("tr").remove();
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
				{{ Form::model($banner, ['url'  => ['admin/Door/update', $banner->id], 'role'=> 'form','files'=>'true']) }}
				
				<div class="form-group">
					{{ Form::label('Title', 'Title*') }}
					{{ Form::text('title',null,array('class'=>'form-control','placeholder' => 'Enter Title')) }}
				</div>
				<div class="form-group">
					{{ Form::label('Windowproduct', 'Door Product*') }}
                    <select class="form-control" id="Windowproduct" name="product" >
                        @foreach($windowproduct as $wd)
                        <option @if($banner->product==$wd->id) selected @endif value="{{ $wd->id }}">{{ $wd->title }}</option>
                        @endforeach
                    </select>
				</div>
			<input type="hidden" name="exist_image" value="{{ $banner->image }}">
				<div class="form-group">
					{{ Form::label('image', ' Icon*') }}
					{{ Form::file('image',array('class'=>'form-control')) }}
                    
    <br>
                    @if($banner->image)
                       <img src="{{asset("images/doortype/$banner->image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
				</div>
				
				<div class="form-group">
					{{ Form::label('thumb_image', ' Thumbnail Image*') }}
					{{ Form::file('thumb_image',array('class'=>'form-control')) }}
    <br>
                    @if($banner->thumb_image)
                       <img src="{{asset("images/doortype/$banner->thumb_image")}}" id="category-img-tag1" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag1" width="150px" />
                    @endif
				</div>
                
                	<div class="form-group">
					{{ Form::label('featured_image', 'Featured Image') }}
					{{ Form::file('featured_image',array('class'=>'form-control')) }}
    <br>
                    @if($banner->featured_image)
                       <img src="{{asset("images/doortype/$banner->featured_image")}}" id="category-img-tag2" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag2" width="150px" />
                    @endif
				</div>
               <div class="form-group">
					{{ Form::label('video_url', 'Video Url') }}
					{{ Form::text('video_url',null,array('class'=>'form-control','placeholder' => 'Enter Video Url')) }}
				</div>
                <div class="form-group">
					{{ Form::label('multi_image', 'Avilable Design') }}
					<input type="file" class="form-control multi_image" name="multi_image[]"  multiple><br>
                      @if($banner->multi_image)
                <div class="preview" >
                    @foreach(explode(',',$banner->multi_image) as $img)
                      <img src="{{asset("images/doortype/$img")}}" width="100px">
                    @endforeach
                </div>
                @else
                <div class="preview" style="display:none;"></div>
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
                
                 <hr>
                        <h3>SEO Details</h3>  <hr>
						<div class="form-group">
							{{ Form::label('meta_title', 'Meta Title*') }}
							{{ Form::text('meta_title',  (isset($banner->meta_title)) ? $banner->meta_title : null, array('class'=>'form-control','placeholder' => 'Meta Title')) }}	
						</div>

						<div class="form-group">
							{{ Form::label('meta_keyword', 'Meta Keyword*') }}
							{{ Form::text('meta_keyword',  (isset($banner->meta_keyword)) ? $banner->meta_keyword : null, array('class'=>'form-control','placeholder' => 'Meta Keyword')) }}	
						</div>
						<div class="form-group">

							{{ Form::label('meta_description', 'Meta Description*') }}
							{{ Form::text('meta_description',  (isset($banner->meta_description)) ? $banner->meta_description : null, array('class'=>'form-control','placeholder' => 'Meta Description')) }}
						</div>
                        
                        <div class="form-group">
							{{ Form::label('og_title', 'OG Title') }}
							{{ Form::text('og_title', (isset($banner->og_title)) ? $banner->og_title : null, array('class'=>'form-control','placeholder' => 'OG Title')) }}	
						</div>
                        <div class="form-group">

							{{ Form::label('og_description', 'OG Description') }}
							{{ Form::text('og_description', (isset($banner->og_desc)) ? $banner->og_desc : null, array('class'=>'form-control','placeholder' => 'OG Description')) }}
						</div>
                
                <div class="form-group">
                            
                            <input type="hidden" name="exist_og_image" @if(!empty($og_img)) value="{{ $og_img }}" @endif >
                            
							<label for="og_image">OG Image</label>
							<input type="file" name="og_image" class="form-control" id="og_image"> <br>
                    @if($banner->og_image)
                       <img src="{{asset("images/$banner->og_image")}}" id="category-img-tag3" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag3" width="150px" />
                    @endif
						</div>
                
                
<div class="form-group">
							<label for="banner_image">Banner Image</label>
							<input type="file" name="banner_image" class="form-control" id="banner_image">
<br>
                    @if($banner->banner_image)
                       <img src="{{asset("images/doortype/$banner->banner_image")}}" id="category-img-tag4" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag4" width="150px" />
                    @endif
						</div>
                
                  <div class="form-group">
							<label for="page_description">Short Description</label>

							<textarea id="short_description" name="short_description" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $banner->short_description }}</textarea>
						</div>
                
                             
                <div class="form-group">
							<label for="page_description">Page Description</label>

							<textarea id="page_description" name="page_description" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $banner->page_description }}</textarea>
						</div>
                 <div class="form-group">
							<label for="about">Did You Know?</label>

							<textarea id="other2" name="other2" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $banner->other2 }}</textarea>
						</div>
                <div class="form-group">
							<label for="about">About Fenesta</label>

							<textarea id="about" name="about" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $banner->about }}</textarea>
						</div>
                <div class="form-group">
							<label for="feature_benefits">Feature Benefits</label>

							<textarea id="feature_benefits" name="feature_benefits" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $banner->feature_benefits }}</textarea>
						</div>
                
                
                <hr>
                
             <h3>Recomended For</h3>  <hr>
                <button type="button" class="btn btn-primary add-new-bg gradientbg pull-right"><i class="fa fa-plus"></i> Add New </button>

                <table class="table" id="tablemuli-bg">
                  <thead>
                    <tr>
                        <td> Image </td>
                        <td> Title </td>
                        <td>  </td>
                    </tr>
                  </thead>
                  <tbody>
                       @if(!empty($banner->recom_for))
                      @foreach(json_decode($banner->recom_for) as $jk => $jj)
                       <tr>
                            <td>
                                <input type="hidden" name="recom[exist{{$jk}}][eimages]" value="{{$jj->image}}">
                                <input type="file" name="recom[exist{{$jk}}][recom_images]" value="{{$jj->image}}" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="{{$jj->title}}"  name="recom[exist{{$jk}}][recom_title]" class="form-control"></td>
                           <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                       </tr>
                      @endforeach
                      @endif
                    <tr>
                         <td><input type="file" name="recom[][recom_images]" multiple class="gallery-photo-add"></td>
                         <td><input type="text"  name="recom[][recom_title]"  class="form-control"></td>
                        
                         <td style="cursor:pointer" class="text-center valignmid"><a class="delete_bg" title="Delete" data-toggle="tooltip">Delete</a></td>
                      </tr>
                  </tbody>
                </table>
                
                
                
                
             <h3>Options About</h3>  <hr>
              
                <table class="table" id="tablemuli-bgoption">
                  <thead>
                    <tr>
                        <td> About </td>
                        <td> Image </td>
                        <td> Title </td>
                    </tr>
                  </thead>
                  <tbody>
                       @if(!empty($banner->options))
                      @foreach(json_decode($banner->options) as $jk => $jj)
                       <tr>
                           <td> {{$jk}} </td>
                            <td>
                                  <input type="hidden" name="options[{{$jk}}][eimages]" value="{{$jj->image}}">
                                <input type="file" name="options[{{$jk}}][images]" value="{{$jj->image}}" multiple class="gallery-photo-add"></td>
                         <td><input type="text" value="{{$jj->title}}"  name='options[{{$jk}}][title]' class="form-control"></td>
                         
                       </tr>
                      @endforeach
                      @else
                    <tr>
                        <td> Color </td>
                         <td><input type="file" name="options[color][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[color][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Glass </td>
                         <td><input type="file" name="options[glass][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[glass][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Handle </td>
                         <td><input type="file" name="options[handle][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[handle][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Meshgrill </td>
                         <td><input type="file" name="options[meshgrill][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[meshgrill][title]"  class="form-control"></td>
                        
                      </tr>
                    <tr>
                        <td> Trim </td>
                         <td><input type="file" name="options[trim][images]" multiple class="opgallery-photo-add"></td>
                         <td><input type="text"  name="options[trim][title]"  class="form-control"></td>
                        
                      </tr>
                      @endif
                  </tbody>
                </table>
                
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