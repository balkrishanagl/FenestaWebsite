@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
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
          <h1>  News & Media </h1>
        @endif
           </div></div> 
      </div>
            --}}

      <div class="pdt50 latest-event-sec mt50">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading text-center">
              <h4 class="text-center">Latest Events</h4>
              {!! $content !!}
            </div>
            <div class="wrap-box">
             {{-- <div class="left">
                <ul>
                    @foreach($latestevent as $kk => $ll)
                  <li @if($kk==0) class="active" @endif data-aos="fade-up"><a href="javascript:;">{{ $ll->title }}</a></li>
                    @endforeach
                </ul>
                <a href="{{url('/news-media/latest-events')}}" class="blue-btn white">Read All</a>
              </div>
              <div class="right">
                 
                <div class="image" data-aos="zoom-in"><img src="images/news/{{ $latestevent[0]->image }}"></div>
              </div>
                --}}
                
                
                <div class="tl_outer">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                     @foreach($latestevent as $kk => $ll)
                      <li class="nav-item" data-aos="fade-up">
                        <a class="nav-link @if($kk==0) active @endif" id="tab-tab{{$ll->id}}" data-toggle="tab" href="#tab{{$ll->id}}" role="tab" aria-controls="tab-{{$ll->id}}" @if($kk==0) aria-selected="true" @endif>{{ $ll->title }}</a>
                      </li>
                     @endforeach
                    </ul>
                    <a href="{{url('/news-media/latest-events')}}" class="blue-btn white">Read All</a>
                </div>	
                <div class="tab-content" id="myTabContent">
                    @foreach($latestevent as $kk => $ll)
                    <div class="tab-pane fade @if($kk==0) show active @endif " id="tab{{$ll->id}}" role="tabpanel" aria-labelledby="tab-tab{{$ll->id}}">
                        <div class="img_block" data-aos="zoom-in">
                          <img src="images/news/{{ $ll->image }}" alt="{{ $ll->title }}">
                        </div>
                    </div>
                    @endforeach
                </div>
				
                
            </div>
          </div>
        </div>
      </div>
      <div class="press-advt-sec mt50">
        <div class="container-fluid">
          <div class="inner-box">            
            <div class="left" data-aos="fade-up">
              <div class="heading text-center">
                <h4 class="text-center">Press Coverage</h4>
                <p>{{ $sub_text }} </p>
              </div>
              <div class="press-list">
                   @foreach($pressevent as $kk => $ll)
                <div class="item" data-aos="zoom-in">
                  <a href="javascript:;">
                    <div class="image"><img src="{{asset("images/news/$ll->image")}}"></div>
                    <h6>{{$ll->title}}</h6>
                  </a>
                </div>
                   @endforeach
              </div> 
              <a href="{{url('/news-media/press-coverage')}}" class="blue-btn white">Read All</a>            
            </div>
            <div class="right" data-aos="fade-up">
              <div class="heading text-center">
                <h4 class="text-center">Advertisement Centre</h4>
                <p>{{ $content2 }}</p>
              </div>
              <div class="advt-list">
                  @foreach($addevent as $kk => $ll)
                <div class="item" data-aos="zoom-in">
                  <a href="javascript:;">
                    <div class="image"><img src="{{asset("images/news/$ll->image")}}"></div>
                    <h6>{{$ll->title}}</h6>
                  </a>
                </div>
                   @endforeach
              </div> 
              <a href="{{url('/news-media/advertisement-centre')}}" class="blue-btn white">Read All</a>  
            </div>
          </div>
        </div>
      </div>

    {{--  <div class="about-finesta">
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

