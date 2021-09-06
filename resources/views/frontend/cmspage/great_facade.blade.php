@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
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
          <h1>  Great Facade </h1>
        @endif
           </div></div> 
      </div>

      <div class="facade-client-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
             @if(!empty($pageData->page_description))
                {!! $pageData->page_description !!}

            @endif
            <div class="facade-client-slider owl-carousel">
                  @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($testimonials as $kkey => $ccoo)
              <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif>
                <div class="image">
                  <img src="{!!asset("images/greatfacade/$ccoo->reference_image")!!}">
                  <span class="play" data-video-id="{{ $ccoo->youtube_url }}"><img src="{!!asset("images/site_images/images/play.png")!!}"></span>
                </div>
                <div class="desc">
                  <h6>{{ $ccoo->title }}</h6>
                    <p class="addReadMore showlesscontent"> {{strip_tags($ccoo->description)}} </p>
                </div>
              </div>
                @php
                if($kkey>3){ $kk=0; }
                @endphp
              @endforeach
                
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
      </div>--}}
</div>
@endsection
