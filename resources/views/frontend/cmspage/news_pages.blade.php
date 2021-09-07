@extends('frontend.layouts.template_page')
@section('content')
<style>
    .galley-image-listing{
        
        width:100%;
        padding-left: 0px;
    }
</style>
    @include('frontend.layouts.breadcrumb')
            {{--
<div class="inner-banner">  
   
    
       @if(empty($pageData->banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
        
          <div class="heading"><div class="container-fluid">        @if(!empty($pageData->page_title))
          <h1>   {!! $pageData->page_title !!}</h1>
        @else
          <h1>Gallery</h1>
        @endif
           </div></div> 
      </div> --}}
      <div class="scroll-gallery"></div>
      <div class="galley-box pdt45">
        <div class="container-fluid">
          <div class="top-heading">
            <h4 data-aos="fade-up">{!! $pageData->page_title !!}</h4>
             @if(!empty($pageData->page_description))
                {!! $pageData->page_description !!}

            @endif
          </div>
          <div class="bottom-box">
           <div class="galley-image-listing">
              <ul>
                @foreach($events as $gg)
                <li>
                  <div class="image"><img src="{{asset("images/news/$gg->image")}}"></div>
                  <h6>{{$gg->title}}</h6>
                </li>
                @endforeach  
              </ul>
              <div class="load-more-btn text-center">
                <a href="javascript:;" class="blue-btn load-more">Load more</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
            </div>
          </div>  
        </div>      
      </div>

   {{--   <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div> --}}
@endsection
