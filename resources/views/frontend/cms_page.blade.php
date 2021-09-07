@extends('frontend.layouts.template_page')
@section('content')
{{-- window-handle-sec --}}
        <div class="privacy-sec">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$banner_image) }}">
        </picture> 
        @endif
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1>  Page </h1>
        @endif
           </div></div> 
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
             <div class="bg-grey">
                @if(!empty($content))
                    {!! $content !!}
                @endif
          </div>
        </div>
      </div>

   {{-- @include('frontend._partials.customerapp') --}}
     {{-- @include('frontend._partials.faq') --}}


</div>
@endsection


