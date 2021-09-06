@extends('frontend.layouts.template_page')
@section('content')

<div class="window-handle-sec">

@include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   
    
       @if(empty($pageData->banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/internal-door/internal-door-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/internal-door/internal-door-mobile-banner1.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/internal-door/internal-door-banner.jpg') }}">
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
          <h1>  About DCM Shriram </h1>
        @endif
           </div></div> 
      </div>

      <div class="inner-page-content" data-aos="fade-up">
        <div class="container-fluid">
        @if($content)
              {!! $content !!}
            @endif
        </div>
      </div>
      <div class="buiseness-portfolio-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Business Portfolio</h4>
          <div class="portfolio-list">
                @php $ik=0; $it=0; @endphp
                @foreach($business as $abv)
                 <div class="item" data-aos="fade-right" @if($ik<4) data-aos-delay="{{$it=$it+200}}" @endif>
              <div class="image"><img src="{!!asset("images/about/$abv->image")!!}"></div>
              <h6>{{$abv->title}}</h6>
              <ul>
                {!!$abv->description!!}
              </ul>
            </div>
              @php  $ik= $ik+1; @endphp
              @endforeach
          </div>
        </div>
      </div>
    
      <div class="infrastructure-sec" id="infrastructure-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Our Infrastructure</h4>
          <div class="infra-slider owl-carousel">
              @php $ik=0; $it=0; @endphp
              @foreach($about_value as $abv)
               <div class="item" data-aos="fade-right" @if($ik<4) data-aos-delay="{{$it=$it+200}}" @endif>
              <div class="image"><img src="{{asset("images/about/$abv->image")}}"></div>
              <div class="content">
                <h6>{{$abv->title}}</h6>
               {!!$abv->description!!}
              </div>
            </div>
              @php  $ik= $ik+1; @endphp
              @endforeach
          </div>
        </div>
      </div>

      <div class="value-sec" id="ourvalue">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading">
              <h4 class="text-center" data-aos="fade-up">Our Values</h4>
              <p class="text-center" data-aos="fade-up">
                  @if($about)
                  {{strip_tags($about) }}
                  @endif</p>
            </div>
            <div class="value-list">
                @php $ik=0; $it=0; @endphp
              @foreach($about_infa as $abv)
              <div class="item" data-aos="fade-right" data-aos-delay="{{$it=$it+200}}">
                <div class="value-name"><span>{{substr($abv->title,0,1)}}</span></div>
                <div class="image"><img src="{{asset("images/about/$abv->image")}}"></div>
                <div class="content">
                  <h6>{{$abv->title}}</h6>
                  {!!$abv->description!!}
                </div>
              </div>
               
             
              @php  $ik= $ik+1; @endphp
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="leadership-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Our Leadership</h4>
          <div class="leadership-list">
                @php $i=0; $ad=0; @endphp
                @foreach($leadership as $aval)
                  <div class="item" data-aos="fade-right" @if($i>4) data-aos-delay="{{$ad=$ad+200}}" @endif>
              <div class="image"><img src="{!!asset("images/about/$aval->image")!!}"></div>
              <div class="content">
                <h6>{{$aval->title}}</h6>
               {!!$aval->description!!}            
              </div>
            </div> 
               
                @php $i=$i+1; @endphp
                @endforeach
          </div>
          <div class="bottom-strip">
             @if($about)
              {!! $about !!}
            @endif
          </div>
        </div>
      </div>
     

   {{-- @include('frontend._partials.imagegallery') --}}
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')

    @include('frontend._partials.relatedblog')

</div>
@endsection

