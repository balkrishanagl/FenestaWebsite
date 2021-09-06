@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   <style> 
      .switch a{
          bottom:150px;
      }
      .section .owl-nav button, .section .blue-btn {
    opacity: 1;
}
  </style> 
    
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
          <h1>  Color & Finish </h1>
        @endif
           </div></div> 
    @if($ptype=='Window')
        <div class="switch"><a href="{{ url('/door') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Doors</a></div>
    
    @else
    
        <div class="switch"><a href="{{ url('/window') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Windows</a></div>
    
    @endif
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
               @if(!empty($content))
                    {!! $content !!}
                @endif
            
          </div>
          <div class="explore-more"><a href="javascript:;">Explore More <span><img src="{{ asset("images/site_images/images/about/explore-more.png") }}"></span></a></div>
        </div>
      </div>
      <div class="color-finish-sec mt50 tab-sec">
        <div class="container-fluid">
          <h4 class="text-center get-anim" data-aos="fade-up">{!! $pageData->page_title !!}</h4>
          <div class="get-fix">
            <ul class="clolor-finish-link tab-link">
              <li><a href="#aluminium" class="active">Aluminium</a></li>
              <li><a href="#upvc">UPVC</a></li>          
            </ul>
          </div>
        </div>
     {{--   <div class="color-finish-list tab-list">
          <div class="container-fluid">
            <h4 class="text-center">Colors & Finish</h4>
            <div class="color-finish-box" id="aluminium" style="display: block;">
              <div class="aluminium-box">
                <div class="left">
                  <div class="color-list">
                      
                      @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($coloroptionsalm as $kkey => $ccoo)
                      @php  if($kkey%4==0){ $kk = 0;  $i_k=0; } @endphp
                    <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif >
                      <div class="image"><span><img src="{{ asset("images/coloroption/$ccoo->image") }}"></span></div>
                      <h6>{{ $ccoo->title }}</h6>
                    </div>
                      @php $kk=$kk+1;  @endphp
                      @endforeach
                   
                  </div>
                </div>
                <div class="right">
                    @php $kk = 0;  @endphp
                      @foreach($coloroptionsalm as $ccoo)
                      
                  <div class="slider-box" @if($kk==0) style="display: block;" @else  style="display: none;" @endif >
                    <div class="right-slider owl-carousel">
                        @php $simg = explode(',',$ccoo->slider_images); @endphp
                        @foreach($simg as $sv)
                      <div class="item" data-aos="zoom-in">
                        <img src="{{ asset("images/coloroption/$sv") }}">
                      </div>
                       @endforeach
                    </div>
                  </div>
                    @php $kk=$kk+1;  @endphp
                     
                      @endforeach
                </div>              
              </div>     
            </div>
            <div class="color-finish-box" id="upvc">
               <div class="aluminium-box">
                <div class="left">
                  <div class="color-list"> @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($coloroptionsupvc as $kkey => $ccoo)
                      @php  if($kkey%4==0){ $kk = 0;  $i_k=0; } @endphp
                    <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif >
                      <div class="image"><span><img src="{{ asset("images/coloroption/$ccoo->image") }}"></span></div>
                      <h6>{{ $ccoo->title }}</h6>
                    </div>
                      @php $kk=$kk+1;  @endphp
                      @endforeach
                  </div>
                </div>
                    <div class="right">
                    @php $kk = 0;  @endphp
                      @foreach($coloroptionsupvc as $ccoo)
                      
                  <div class="slider-box" @if($kk==0) style="display: block;" @else  style="display: none;" @endif >
                    <div class="right-slider owl-carousel">
                        @php $simg = explode(',',$ccoo->slider_images); @endphp
                        @foreach($simg as $sv)
                      <div class="item" data-aos="zoom-in">
                        <img src="{{ asset("images/coloroption/$sv") }}">
                      </div>
                       @endforeach
                    </div>
                  </div>
                    @php $kk=$kk+1;  @endphp
                     
                      @endforeach
                </div>
              </div>    
            </div>            
          </div>
        </div> --}}
          
          
        <div class="color-finish-list tab-list">
          <div class="container-fluid">
            <h4 class="text-center">Colors & Finish</h4>
            <div class="color-finish-box" id="aluminium" style="display: block;">
              <div class="aluminium-box">
                <div class="left">
                  <div class="color-list">
                    @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($coloroptionsalm as $kkey => $ccoo)
                      @php  if($kkey%4==0){ $kk = 0;  $i_k=0; } @endphp
                    <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif >
                      <div class="image"><span><img src="{{ asset("images/coloroption/$ccoo->image") }}"></span></div>
                      <h6>{{ $ccoo->title }}</h6>
                    </div>
                      @php $kk=$kk+1;  @endphp
                      @endforeach
                    </div>
                </div>
                <div class="right">
                  <div class="right-slider owl-carousel">
                       @php $simg = explode(',',$ccoo->slider_images); @endphp
                        @foreach($simg as $sv)
                    <div class="item" data-aos="zoom-in">
                      <img src="{{ asset("images/coloroption/$sv") }}">
                    </div>
                    @endforeach
                  </div>
                </div>              
              </div>     
            </div>
            <div class="color-finish-box" id="upvc">
               <div class="aluminium-box">
                <div class="left">
                  <div class="color-list">
                      
                      @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($coloroptionsupvc as $kkey => $ccoo)
                      @php  if($kkey%4==0){ $kk = 0;  $i_k=0; } @endphp
                    <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif >
                      <div class="image"><span><img src="{{ asset("images/coloroption/$ccoo->image") }}"></span></div>
                      <h6>{{ $ccoo->title }}</h6>
                    </div>
                      @php $kk=$kk+1;  @endphp
                      @endforeach
                      
                  </div>
                </div>
                <div class="right">
                  <div class="right-slider owl-carousel">
                     @php $simg = explode(',',$ccoo->slider_images); @endphp
                        @foreach($simg as $sv)
                    <div class="item" data-aos="zoom-in">
                      <img src="{{ asset("images/coloroption/$sv") }}">
                    </div>
                    @endforeach
                  </div>
                </div>              
              </div>    
            </div>
            
          </div>
        </div>
          
          
      </div> 
  
    @include('frontend._partials.customerapp')
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

