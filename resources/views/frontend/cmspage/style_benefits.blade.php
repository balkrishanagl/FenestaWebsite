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
          <h1>Style Benefits</h1>
        @endif
           </div></div> 
      </div>

        <div class="accreditation-sec pdt45 aos-init aos-animate" data-aos="fade-up">
        <div class="container-fluid">
           @if($sub_text!='')
                       {!! $sub_text !!}
                    @endif
                </div>
        </div>
<div class="wide-design-palette">
          
             
          <div class="inner-box">  
            <div class="left aos-init aos-animate" data-aos="zoom-in"><img src="{{ asset('images/site_images/images/why-fenesta/design-pallete.jpg')}}"></div>          
            <div class="right">              
              <div class="top">
                <div class="inner-wrap">
                    @if($content!='')
                       {!! $content !!}
                    @endif
                  <div class="pallete-list">
                    <div class="item aos-init aos-animate" data-aos="fade-right">
                      <span class="image"><img src="{{ asset('images/site_images/images/why-fenesta/palette1.png')}}"></span>
                      <h6>More than <br> <strong>700 window</strong> styles</h6>
                    </div>
                    <div class="item aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                      <span class="image"><img src="{{ asset('images/site_images/images/why-fenesta/palette2.png')}}"></span>
                      <h6>International <br> Designs</h6>
                    </div>
                    <div class="item aos-init" data-aos="fade-right">
                      <span class="image"><img src="{{ asset('images/site_images/images/why-fenesta/palette3.png')}}"></span>
                      <h6>A window <br> for every room</h6>
                    </div>
                    <div class="item aos-init" data-aos="fade-right" data-aos-delay="200">
                      <span class="image"><img src="{{ asset('images/site_images/images/why-fenesta/palette2.png')}}"></span>
                      <h6>Available in <br> variety of colors</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bottom">
                <div class="inner-wrap">
                  <h4>Choose Your Product Type</h4>
                  <div class="btn-grp">
                    <a href="{{url('/window')}}">
                      <span><img src="{{ asset('images/site_images/images/why-fenesta/style-win-icon.png')}}"></span> Windows
                    </a>
                    <a href="{{url('/door')}}">
                      <span><img src="{{ asset('images/site_images/images/why-fenesta/style-door-icon.png')}}"></span> Doors
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><div class="science-work-sec">
        <div class="container-fluid">
          <div class="inner-box text-center">
              @if($content2!='')
              {!! $content2 !!}
              @endif
           
            <div class="science-work-wrap">
              <div class="science-work-list left">
                  
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki<=4)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6> </a>
                  </div>
                @endif
                 @endforeach
                @php 
                $turt = $featurebenefit[0]->image; @endphp
                </div>
              <div class="middle aos-init" data-aos="zoom-in">
                <div class="center-image"><img class="{{$turt}}" src="{{ asset("images/featurebenefit/image/$turt")}}"></div>
                
              </div>
              <div class="science-work-list right">
          
               
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki>=5 and $ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                 <a href="{{url("/features-benefits/$ffbb->slug")}}"> <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
                @endif
                 @endforeach
              </div>

              <div class="science-work-list science-work-list-mob">
                   @foreach($featurebenefit as  $ki => $ffbb)
                 @if($ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                <a href="{{url("/features-benefits/$ffbb->slug")}}">  <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
               {{--  <div class="item" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                   @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                </div> --}}
            @endif
                 @endforeach
               
                  
              </div>
            </div>
          </div>
        </div>
      </div>
   
    @include('frontend._partials.imagegallery')
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
   {{-- @include('frontend._partials.relatedblog') --}}
     {{-- <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div> --}}
</div>
@endsection
