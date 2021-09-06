@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
        <div class="window-handle-sec">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
  <style> 
      .switch a{
          bottom:150px;
      }
  </style> 
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/site_images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$banner_image) }}">
        </picture> 
        @endif
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1>  Page </h1>
        @endif
           </div></div> 
    
    
        <div class="switch"><a href="{{ url('/windows') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Windows</a></div>
    
    
      </div>

    
      <div class="inner-page-content">
        <div class="container-fluid">
          <p data-aos="fade-up"> @if(!empty($content))
            {!! $content !!}
            @endif</p>
        </div>
      </div>
      <div class="product-by-design-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Products - By Design</h4>
          <div class="product-design-box">
              
            @foreach($windowproduct as $wp)
              
              @php
              $windowtypes = WindowType::where('is_delete',0)->where('product',$wp->id)->where('product_type','Door')->get();
              $wkki=0; 
               $type_w = strtolower($wp->type);
              $slug_w = strtolower($wp->slug);

              @endphp
            <div class="box" data-aos="zoom-in">
               <a href="{{ url("/$type_w/$slug_w") }}"> <h3>{{$wp->title}}</h3></a>
              <div class="image"><a href="{{ url("/$type_w/$slug_w") }}"><img src="{!!asset("images/windowdoortype/$wp->fullimage")!!}"></a></div>
            {{--   <div class="product-design-slider owl-carousel common-design-slider">
                  @foreach($windowtypes as $wkk => $wtt) 
                <div class="item" data-aos="fade-right" @if($wkk>0)  data-aos-delay="{{$wkki+200}}" @endif >                  
                  <span class="icon"><img src="{{ asset('images/doortype/'.$wtt->image) }}"></span>{{ $wtt->title }}
                </div>
                  @php
                  $wkki = $wkki+200;
                  @endphp
                  @endforeach
           
              </div> --}}
            </div>
            @endforeach  
      
          </div>
        </div>
      </div>

      <div class="product-by-appl-sec">
        <h4 class="text-center" data-aos="fade-up">Products - By Application</h4>
        <div class="image-box" data-aos="zoom-in">
          <picture>
            <source srcset="images/site_images/window/product-application-banner.jpg" media="(min-width:768px)">
            <source srcset="images/site_images/window/product-application-banner.jpg" media="(min-width:320px)">
            <img src="images/site_images/window/product-application-banner.jpg">  
          </picture> 
        </div>
        <div class="container-fluid">
          <div class="product-by-appl-tab" data-aos="fade-up">
            <ul class="application-tab-list">
               @foreach($byapplication as $bak => $bav) 
              <li><a href="#{{ trim($bav->title) }}" @if($bak==0) class="active" @endif >{{ $bav->title }}</a></li>
               @endforeach
            </ul>
            <div class="product-by-appl-tab-list">
                @foreach($byapplication as $bak => $bav) 
              <div class="product-by-appl-tab-box" id="{{ trim($bav->title) }}" @if($bak==0)  style="display: block;" @endif  >
                <h3 class="active">{{ $bav->title }}</h3>
                <div class="content" @if($bak==0) style="display: block;" @endif  >
                  {!! $bav->content !!}
                </div>
              </div>
                 @endforeach 
            
            </div>
          </div>
        </div>
      </div>

    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
    <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta {!! $title !!}</h4>
          <div class="content">
            @if(!empty($about))
            {!! $about !!}
            @endif
          </div>
        </div>
      </div>

</div>
@endsection

