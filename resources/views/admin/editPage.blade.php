@extends('adminlte::page')

@section('title', 'Edit page')

@section('content_header')
<h1 class="m-0 text-dark">Edit Page</h1>
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

    $("#banner_image").change(function(){
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

    $("#og_image").change(function(){
        readURL1(this);
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
					{{ Form::model($page, ['url'  => ['admin/updatePage', $page->id], 'role'=> 'form','files'=>'true']) }}
					<div class="card-body">
                        
                        
						<div class="form-group">
							{{ Form::label('page_title', 'Page Title*') }}
							{{ Form::text('page_title', null, array('class'=>'form-control','placeholder' => 'Page Title')) }}
						</div>
						<div class="form-group">
							{{ Form::label('page_description', 'Page Description*') }}
							{{ Form::textarea('page_description', null, array('class'=>'form-control ckeditor','placeholder' => 'Page Description')) }}


						</div>
                        @if($page->id==24 || $page->id==43 || $page->id==44)
                        
                         <div class="form-group">

							{{ Form::label('sub_text', 'Below Banner Content*') }}
							{{ Form::textarea('sub_text', null, array('class'=>'form-control ckeditor','placeholder' => 'Below Banner Content')) }}
						</div>
                        
                         <div class="form-group">

							{{ Form::label('content2', 'Other Content') }}
							{{ Form::textarea('content2', null, array('class'=>'form-control ckeditor','placeholder' => 'Other Content')) }}
						</div>
                        @endif
                        @if($page->id==44)
                        
                        <div class="form-group">

							{{ Form::label('content3', 'Internal door Content') }}
							{{ Form::textarea('content3', null, array('class'=>'form-control ckeditor','placeholder' => 'Internal door Content')) }}
						</div>
                        
                         @endif
                        @if($page->id==25)
                        <div class="form-group">

							{{ Form::label('sub_text', 'Press Coverage*') }}
							{{ Form::text('sub_text', null, array('class'=>'form-control','placeholder' => 'Press Coverage')) }}
						</div>
                        <div class="form-group">

							{{ Form::label('content2', 'Advertisement Centre*') }}
							{{ Form::text('content2', null, array('class'=>'form-control','placeholder' => 'Advertisement Centre')) }}
						</div>
                        @endif
                        <div class="form-group">
							{{ Form::label('about', 'About Fenesta Description') }}
							{{ Form::textarea('about', null, array('class'=>'form-control ckeditor','placeholder' => 'About Fenesta Description')) }}
						</div>
                        
                        <hr>
                        <h3>SEO Details</h3>  <hr>
						<div class="form-group">
							{{ Form::label('meta_title', 'Meta Title*') }}
							{{ Form::text('meta_title', null, array('class'=>'form-control','placeholder' => 'Meta Title')) }}	
						</div>

						<div class="form-group">
							{{ Form::label('meta_keyword', 'Meta Keyword*') }}
							{{ Form::text('meta_keyword', null, array('class'=>'form-control','placeholder' => 'Meta Keyword')) }}	
						</div>
						<div class="form-group">

							{{ Form::label('meta_description', 'Meta Description*') }}
							{{ Form::text('meta_description', null, array('class'=>'form-control','placeholder' => 'Meta Description')) }}
						</div>
                        
                        <div class="form-group">
							{{ Form::label('og_title', 'OG Title') }}
							{{ Form::text('og_title', (isset($og_title)) ? $og_title : null, array('class'=>'form-control','placeholder' => 'OG Title')) }}	
						</div>
                        <div class="form-group">

							{{ Form::label('og_description', 'OG Description') }}
							{{ Form::text('og_description', (isset($og_desc)) ? $og_desc : null, array('class'=>'form-control','placeholder' => 'OG Description')) }}
						</div>
                        <div class="form-group">
                            
                            <input type="hidden" name="exist_og_image" @if(!empty($og_img)) value="{{ $og_img }}" @endif >
                            
							<label for="og_image">OG Image</label>
							<input type="file" name="og_image" class="form-control" id="og_image">
                            
                              @if($page->og_image)
                                   <img src="{{asset("images/$page->og_image")}}" id="category-img-tag1" width="150px" />
                                @else
                                    <img src="" style="display:none" id="category-img-tag1" width="150px" />
                                @endif

						</div>
                        {{--
						<div class="form-group">
							<label for="banner_show">Banner Show</label>
							<div class="icheck-primary d-inline">
								<input type="radio" name="banner_show" value="Y"  {{ $page->banner_show == 'Y' ? 'checked' : '' }} >
								<label for="banner_show">Yes
								</label>
							</div>
							<div class="icheck-primary d-inline">
								<input type="radio"name="banner_show" value="N" {{ $page->banner_show == 'N' ? 'checked' : '' }}>
								<label for="banner_show">No
								</label>
							</div>
						</div> --}}
						<div class="form-group">
							<label for="banner_image">Banner Image</label>
                             <label class="note"> ( Image Size : 1600 * 400 ) </label>
							<input type="file" name="banner_image" class="form-control" id="banner_image">
                            <br>
                    @if($page->banner_image)
                       <img src="{{asset("images/$page->banner_image")}}" id="category-img-tag" width="150px" />
                    @else
                        <img src="" style="display:none" id="category-img-tag" width="150px" />
                    @endif
						</div>
                        @if($page->id==1)

                      <hr>
                        <h3>Windows & Doors Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('wi_subtitle', 'Sub Title') }}
							{{ Form::text('wi_subtitle', (isset($wi_subtitle)) ? $wi_subtitle : null, array('class'=>'form-control','placeholder' => 'Sub Title')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('wi_title', 'Title') }}
							{{ Form::text('wi_title', (isset($wi_title)) ? $wi_title : null, array('class'=>'form-control','placeholder' => ' Title')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('wi_subcontent', 'Sub Content') }}
							{{ Form::text('wi_subcontent', (isset($wi_subcontent)) ? $wi_subcontent : null, array('class'=>'form-control','placeholder' => ' Sub Content')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('wi_content', 'Content') }}
							{{ Form::text('wi_content', (isset($wi_content)) ? $wi_content : null, array('class'=>'form-control','placeholder' => ' Content')) }}
						</div>
 <div class="form-group">
                            <input type="hidden" name="exist_bthum_images" @if(!empty($exist_bthum_images))  value="{{ $exist_bthum_images }}" @endif >
							<label for="bthum_images">Right Image</label>
							<input type="file" name="bthum_images" class="form-control" id="bthum_images">
						</div>
                      <hr>
                        <h3>About Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('about_heading', ' Heading') }}
							{{ Form::text('about_heading', (isset($about_heading)) ? $about_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('about_content', ' Content') }}
                            {{ Form::textarea('about_content', (isset($about_content)) ? $about_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div>
                        
                        
                      <hr>
                        <h3>Quality & Innovations Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('solu_heading', ' Heading') }}
							{{ Form::text('solu_heading', (isset($solu_heading)) ? $solu_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                        <hr>
                      {{--  <div class="form-group">
							{{ Form::label('solu_content', ' Content') }}
                            {{ Form::textarea('solu_content', (isset($solu_content)) ? $solu_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div> --}}
                         <hr>
                        <h3>Durable and Safe Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('durable_heading', ' Heading') }}
							{{ Form::text('durable_heading', (isset($durable_heading)) ? $durable_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('durable_subcontent', ' Sub Content') }}
                            {{ Form::text('durable_subcontent', (isset($durable_subcontent)) ? $durable_subcontent : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div>
                        <div class="form-group">
							{{ Form::label('durable_content', ' Content') }}
                            {{ Form::text('durable_content', (isset($durable_content)) ? $durable_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div>
                        <div class="form-group">
                            <input type="hidden" name="exist_durable_image" @if(!empty($durable_image))  value="{{ $durable_image }}" @endif >
							<label for="durable_image"> Image</label>
							<input type="file" name="durable_image" class="form-control" id="durable_image">
						</div>
                        
                      <hr>
                        <h3>Visualize and Design Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('visdsg_heading', ' Heading') }}
							{{ Form::text('visdsg_heading', (isset($visdsg_heading)) ? $visdsg_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                     {{--   <div class="form-group">
							{{ Form::label('visdsg_content', ' Content') }}
                            {{ Form::text('visdsg_content', (isset($visdsg_content)) ? $visdsg_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div> --}}
                        <div class="form-group">
                            <input type="hidden" name="exist_banner_images" @if(!empty($exist_banner_images))  value="{{ $exist_banner_images }}" @endif >
							<label for="banner_images">Banner Images</label>
							<input type="file" multiple name="banner_images[]" class="form-control" id="banner_images">
						</div>
                       
                         <hr>
                        <h3>Clientele Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('cli_heading', ' Heading') }}
							{{ Form::text('cli_heading', (isset($cli_heading)) ? $cli_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                      {{-- <div class="form-group">
                           
                          
							<label for="slider_images">Slider Images</label>
							<input type="file" multiple name="slider_images[]" class="form-control" id="slider_images">
						</div> --}}
                         <hr>
                       
                        <h3>Unmatched Service Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('dcm_heading', ' Heading') }}
							{{ Form::text('dcm_heading', (isset($dcm_heading)) ? $dcm_heading : null, array('class'=>'form-control','placeholder' => ' Heading')) }}
						</div>
                        <div class="form-group">
							{{ Form::label('dcm_content', ' Content') }}
                            {{ Form::textarea('dcm_content', (isset($dcm_content)) ? $dcm_content : null, array('class'=>'form-control ckeditor','placeholder' => 'Content')) }}

						</div>
                          <div class="form-group">
                               <input type="hidden" name="exist_dcm_leftimage" @if(!empty($exist_dcm_leftimage))  value="{{ $exist_dcm_leftimage }}" @endif >
							<label for="left_image">Right Image</label>
							<input type="file"  name="left_image" class="form-control" id="left_image">
						</div>
                         {{--
                          <div class="form-group">
                               <input type="hidden" name="exist_dcm_logo" @if(!empty($exist_dcm_logo))  value="{{ $exist_dcm_logo }}" @endif >
							<label for="logo_image">Logo Image</label>
							<input type="file"  name="logo_image" class="form-control" id="logo_image">
						</div> --}}
                        <hr>
                       
                        <h3>Other Section </h3>
                         <hr>
                        <div class="form-group">
							{{ Form::label('locateus_heading', 'Locatus Us Heading') }}
							{{ Form::text('locateus_heading', (isset($locateus_heading)) ? $locateus_heading : null, array('class'=>'form-control','placeholder' => 'Locatus Us Heading')) }}
						</div>
                      <div class="form-group">
							{{ Form::label('cltsat_heading', 'Client Satisfaction Heading') }}
							{{ Form::text('cltsat_heading', (isset($cltsat_heading)) ? $cltsat_heading : null, array('class'=>'form-control','placeholder' => 'Client Satisfaction Heading')) }}
						</div>
                     
                      <div class="form-group">
							{{ Form::label('cltsat_subheading', 'Client Satisfaction Sub Heading') }}
							{{ Form::text('cltsat_subheading', (isset($cltsat_subheading)) ? $cltsat_subheading : null, array('class'=>'form-control','placeholder' => 'Client Satisfaction Sub Heading')) }}
						</div>
                     
                      <div class="form-group">
							{{ Form::label('imgglry_heading', 'Image Gallery Heading') }}
							{{ Form::text('imgglry_heading', (isset($imgglry_heading)) ? $imgglry_heading : null, array('class'=>'form-control','placeholder' => 'Image Gallery Heading')) }}
						</div>
                     
                      <div class="form-group">
							{{ Form::label('fw_heading', 'Fenesta World Heading') }}
							{{ Form::text('fw_heading', (isset($fw_heading)) ? $fw_heading : null, array('class'=>'form-control','placeholder' => 'Fenesta World Heading')) }}
						</div>
                     
                        
                      <div class="form-group">
							{{ Form::label('cusapp_heading', 'Customer Appreciations Heading') }}
							{{ Form::text('cusapp_heading', (isset($cusapp_heading)) ? $cusapp_heading : null, array('class'=>'form-control','placeholder' => 'Customer Appreciations Heading')) }}
						</div>
                     
                      <div class="form-group">
							{{ Form::label('blog_heading', 'Blog Heading') }}
							{{ Form::text('blog_heading', (isset($blog_heading)) ? $blog_heading : null, array('class'=>'form-control','placeholder' => 'Blog Heading')) }}
						</div>
                     
                        
						@endif
                        
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