@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
        <div class="window-handle-sec">
            
     <style> 
      .switch a{
          bottom:150px;
      }
   
  </style> 
                 
    @if($ptype=='Window')
        <div class="switch"><a href="{{ url('/door') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Doors</a></div>
    
    @else
    
        <div class="switch"><a href="{{ url('/window') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Windows</a></div>
    
    @endif
        <div class=" upvc-window-sec">
            
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
  
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/site_images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/windowdoortype/'.$banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/windowdoortype/'.$banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/windowdoortype/'.$banner_image) }}">
        </picture> 
        @endif 
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1> {{ $ptype }}   </h1>
        @endif
           </div></div> 
    
    
      </div>

      <div class="inner-page-content pdt45">@if($short_description)
        <div class="container-fluid">
        <div class="textreadmore">
            {!! $short_description !!}
        </div>
           <p class="buttonreadmore">Read More</p>
          @endif 
      </div>
      </div>
      <div class="product-style-sec pdt35">
        <div class="container-fluid">          
          <div class="product-style-item">
            <h4 class="text-center" data-aos="fade-up">Product Styles</h4>
            <div class="product-style-slider owl-carousel">
                @php $lowerp_type = strtolower($ptype); $t_i=0; $dt_i=0; @endphp
                @foreach($product_types as $tk => $type)

                 <div class="item" data-aos="fade-right" @if($t_i>0) data-aos-delay="{{ $dt_i = $dt_i+200 }}"  @endif >
                <div class="image">
                    @if($ptype=='Window')
                         <img alt="{{$type->title}}" src="{{ asset("images/windowtype/$type->thumb_image") }}">
                    @else
                        <img alt="{{$type->title}}" src="{{ asset("images/doortype/$type->thumb_image") }}">
                    @endif
                   
                     
                </div>
                <div class="desc">                  
                  <div class="name"><span class="icon">
                      @if($ptype=='Window')
                         <img alt="{{$type->title}}" src="{{ asset("images/windowtype/$type->image") }}">
                    @else
                        <img alt="{{$type->title}}" src="{{ asset("images/doortype/$type->image") }}">
                    @endif
                    
                      </span>{{$type->title}}</div>
                  <a href="{{url("/$lowerp_type/$slug/$type->slug")}}" class="blue-btn">Explore</a>
                </div>
              </div>
                @php 
                 $t_i=$t_i+1; @endphp
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="feature-sec pdt45">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Features & Benefits</h4>
            <div class="content text-center" data-aos="fade-up" >
             {!! $feature_benefits !!}
            </div>
            <div class="feature-slider owl-carousel">
                @php $f_t=0; @endphp
               @foreach($featurebenefit as $kk => $fb) 
              <div class="item" data-aos="fade-right" @if($kk>0 || $kk<4) data-aos-delay="{{ $f_t = $f_t+200 }}" @endif>
                <img class="nohover" src="{{ asset("images/featurebenefit/icon/$fb->icon") }}">
                <span>{{$fb->name}} </span>
              </div> 
              
               @endforeach
            </div>
            <div class="btn-grp text-center"><a href="{{ url('/features-benefits') }}" class="blue-btn">Explore More</a></div>
          </div>
        </div>
      </div>
      <div class="series-option-sec mt60">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="series" data-aos="zoom-in">
              <div class="series-accord">
                <h3 class="active">Series</h3>
                <div class="content" style="display: block;">
                  <div class="inner-wrap">
                    <div class="desc">
                     {!! $series_content !!}
                     <a href="{{url('/series')}}" class="blue-btn">Explore</a>
                    </div>
                      <div class="image"> <a href="{{url('/series')}}">
                          
                          @if($id==1)
                          <img src="{{ asset('images/site_images/images/series/1.png') }}">
                            @elseif($id==4)
                          <img src="{{ asset('images/site_images/images/series/2.png') }}">
                          @elseif($id==3)
                          <img src="{{ asset('images/site_images/images/series/3.png') }}">
                          @else
                          <img src="{{ asset('images/site_images/images/series/4.png') }}">
                          @endif
                          </a>
                      
                      </div>
                  </div>
                </div>
              </div>
                @foreach($series as $ss)
                @if($ss->id!=4)
              <div class="series-accord">
                <h3>{{$ss->title}}</h3>
                <div class="content">
                  <div class="inner-wrap">
                    <div class="desc">
                      {{-- <h5>{{$ss->title}}</h5> --}}
                        <p> {{ substr(strip_tags($ss->description), 0, 200) }}... </p>
                      <a href="{{url('/series')}}" class="blue-btn">Explore</a>
                    </div>
                    <div class="image"><img src="{{ asset("images/series/$ss->image") }}"></div>
                  </div>
                </div>
              </div>
                @endif
                @endforeach
                
            </div>
              
              
            <div class="option" data-aos="zoom-in">
              <h4>Options</h4>
              <div class="option-slider-box">
                <div class="slick-option-gallery slick-slider">
                 
                  @foreach(json_decode($fffoptions) as $kk => $oo) 
                  <div class="slick-slide">
                    <img src="{{ asset("images/options/$oo->image") }}">
                    <div class="overlay">
                    <div class="inner">
                    <p>{{$oo->title}}</p>
                     
                        @if($kk=='color')
                    <a href="{{url("/$lowerp_type/colors-finish")}}" class="btn" tabindex="0">Explore More</a>
                         @elseif($kk=='glass')
                    <a href="{{url("/$lowerp_type/glass")}}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='handle')
                    <a href="{{ url("/$lowerp_type/handles") }}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='meshgrill')
                    <a href="{{url("/$lowerp_type/mesh-grill")}}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='trim')
                    <a href="{{ url('/trims') }}" class="btn" tabindex="0">Explore More</a>
                        @endif
                        
                    </div>	
                    </div>
                  </div>
                   @endforeach 
                </div> 
                <div class="slick-option-gallery-thumb slick-slider">
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option1.png') }}"></a></span><span>Color</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option2.png') }}"></a></span><span>Glass</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option3.png') }}"></a></span><span>Handle</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option4.png') }}"></a></span><span>Mesh & Grill</span></div>
                    <div class="slick-slide"><span class="image"><img src="{{ asset('images/site_images/images/upvc-window/option5.png') }}"></span><span>Trims</span></div>                  
                </div>
              </div> 
            </div> 
          </div>
        </div>
      </div>
    
    @include('frontend._partials.imagegallery')
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
    
      <div class="about-finesta mt60">
        <div class="container-fluid">
          <h4>About Fenesta {!! $title !!}</h4>
          <div class="content">
            
            @if($content)
            {!! $content !!}
            @endif
          </div>
        </div>
      </div>

</div>
</div>
@endsection

