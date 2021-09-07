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
          <h1>  Customer Reviews </h1>
        @endif
           </div></div> 
      </div>

      <div class="customer-rev-tab-sec tab-sec">
        <div class="container-fluid">
          <div class="get-fix">
            <ul class="customer-rev-link tab-link">
              <li><a href="#retail" class="active">Retail</a></li>
              <li><a href="#projects">Projects</a></li>          
            </ul>
          </div>
        </div>
        <div class="customer-rev-tab-list tab-list">
          <div class="container-fluid">
            <div class="customer-rev-tab-box" id="retail" style="display: block;">
              <div class="retail inner-div">
                <h4>Customer Appreciation on Retail</h4>
                <div class="customer-rev-list retail-slider">
                    


                    @php $io=0; $datadelay=200; @endphp
                    @foreach($retailcus as $rcus)
                       <div class="item" data-aos="fade-right" @if($io>1) data-aos-delay={{$datadelay}} @endif >
                    <div class="heading">
                      <div class="image"><img src="{!!asset("images/appreciation/$rcus->image")!!}"><span></span></div>
                      <div class="right">
                        <div class="name">{{$rcus->name}}</div>
                          
                        <div class="date"> @if($rcus->city!='') {{$rcus->city}} @else {{date("d M Y",strtotime($rcus->created_at))}} @endif  <img src="{{ asset('images/site_images/images/globe.png')}}"></div> 
                          
                          
                      </div>
                    </div>
                     <p class="addReadMore showlesscontent">{{ strip_tags($rcus->description) }} </p>
                  </div>
                    @php
                    $io=$io+1;
                    $datadelay=$datadelay+200;
                    @endphp
                    @endforeach             
                </div>
                <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">View More</a>
                  <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
              </div>
              <div class="testimonial inner-div">
                <h4>Testimonials on Retail</h4>
                <div class="customer-rev-list testimonials-slider">
                     @php $iot=0; $datadelayt=200; @endphp
                    @foreach($reatiltestimonials as $testimonial)
                  <div class="item" data-aos="fade-right"  @if($iot>1) data-aos-delay={{$datadelayt}} @endif  >
                    <div class="image">
                      <img src="{!!asset("images/testimonials/reference/$testimonial->reference_image")!!}">
                         @if(!empty($testimonial->youtube_url))
                      <span class="play" data-video-id="{{ $testimonial->youtube_url }}"><img src="{{ asset('images/site_images/play.png') }}"></span>
                         @endif
                    </div>
                    <div class="desc">
                      <div class="pic"><img src="{!!asset("images/testimonials/user/$testimonial->user_image")!!}"></div>
                      <div class="right">
                        <h6>{{$testimonial->name}}</h6>
                        <p>{{$testimonial->city}}</p>
                      </div>
                    </div>
                  </div> 
                      @php
                    $iot=$iot+1;
                    $datadelayt=$datadelayt+200;
                    @endphp
                    @endforeach                 
                </div>
                <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">View More</a>
                  <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
              </div>
            </div>
            <div class="customer-rev-tab-box" id="projects">
              <div class="project inner-div">
                <h4>Customer Appreciation on Projects</h4>
                <div class="customer-rev-list retail-slider">
                     @php $io1=0; $datadelay1=200; @endphp
                    @foreach($projectcus as $rcus)
                       <div class="item" data-aos="fade-right" @if($io1>1) data-aos-delay={{$datadelay1}} @endif >
                    <div class="heading">
                      <div class="image"><img src="{!!asset("images/appreciation/$rcus->image")!!}"><span></span></div>
                      <div class="right">
                        <div class="name">{{$rcus->name}}</div>
                        <div class="date">@if($rcus->city!='') {{$rcus->city}} @else {{date("d M Y",strtotime($rcus->created_at))}} @endif
                             <img src="{{ asset('images/site_images/images/globe.png')}}"> 
                          </div>                      
                      </div>
                    </div>
                    <p class="addReadMore showlesscontent">{{ strip_tags($rcus->description) }} </p>
                  </div>
                    @php
                    $io1=$io1+1;
                    $datadelay1=$datadelay1+200;
                    @endphp
                    @endforeach             
                    
                </div>
                <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">View More</a>
                  <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
              </div>  
              <div class="testimonial inner-div">
                <h4>Testimonials on Projects</h4>
                <div class="customer-rev-list testimonials-slider">
                    
                    @php $iot1=0; $datadelayt1=200; @endphp
                    @foreach($projecttestimonials as $testimonial)
                  <div class="item" data-aos="fade-right"  @if($iot1>1) data-aos-delay={{$datadelayt1}} @endif  >
                    <div class="image">
                      <img src="{!!asset("images/testimonials/reference/$testimonial->reference_image")!!}">
                         @if(!empty($testimonial->youtube_url))
                      <span class="play" data-video-id="{{ $testimonial->youtube_url }}"><img src="{{ asset('images/site_images/play.png') }}"></span> @endif
                    </div>
                    <div class="desc">
                      <div class="pic"><img src="{!!asset("images/testimonials/user/$testimonial->user_image")!!}"></div>
                      <div class="right">
                        <h6>{{$testimonial->name}}</h6>
                        <p>{{$testimonial->city}}</p>
                      </div>
                    </div>
                  </div> 
                      @php
                    $iot1=$iot1+1;
                    $datadelayt1=$datadelayt1+200;
                    @endphp
                    @endforeach  
                    
                    
                </div>
                <div class="load-btn">
                  <a href="javascript:;" class="blue-btn white load-more">View More</a>
                  <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
                </div>
              </div>            
            </div>
          </div>
        </div>
      </div>   
  
    @include('frontend._partials.faq')


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

