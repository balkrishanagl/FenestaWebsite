@extends('frontend.layouts.template_page')
@section('content')

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
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
        
          <div class="heading"><div class="container-fluid">        @if(!empty($pageData->page_title))
          <h1>   {!! $pageData->page_title !!}</h1>
        @else
          <h1> Awards & Accreditations</h1>
        @endif
           </div></div> 
      </div>
--}}
      <div class="accreditation-sec pdt45" data-aos="fade-up">
        <div class="container-fluid">
          <h4 class="text-center">{!! $pageData->page_title !!}</h4>
          @if(!empty($pageData->page_description))
                {!! $pageData->page_description !!}

            @endif
          <ul class="accreditation-link">
            <li><a href="#award" class="active">Awards</a></li>
            <li><a href="#accreditation">Accreditations</a></li>
          </ul>
          <div class="award-accreditation-tab">
            <div class="award-accreditation-tab-box" id="award" style="display: block;">
              <div class="award-accreditation-list">
                  @foreach($awards as $aval)
                <div class="item">
                  <div class="image"><img src={!!asset("images/awards/$aval->image")!!}><span></span></div>
                  <p>{{strip_tags($aval->description)}}</p>
                </div>   
                  @endforeach
              </div>
              <div class="load-btn"><a href="javascript:;" class="blue-btn white load-more">Load More</a> <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a></div>
            </div>
            <div class="award-accreditation-tab-box" id="accreditation">
              <div class="award-accreditation-list">
                  @foreach($app as $aval)
                <div class="item">
                  <div class="image"><img src={!!asset("images/awards/$aval->image")!!}><span></span></div>
                 <p>{{strip_tags($aval->description)}}</p>
                </div>
                  @endforeach
              </div>
              <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">Load More</a>
                 <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
            </div>
          </div>
        </div>        
      </div>   

     {{-- <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div>--}}

@endsection
