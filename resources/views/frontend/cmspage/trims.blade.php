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
          <h1> Trims </h1>
        @endif
           </div></div> 
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
      <div class="trim-option-sec mt50">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">{!! $pageData->page_title !!}</h4>
          <div class="trim-option-slider">
               @php  $kk = 0;  $i_k=0; @endphp
                      @foreach($trims as $kkey => $ccoo)

            <div class="item" data-aos="fade-right" @if($kk>0) data-aos-delay="{{ $i_k=$i_k+200 }}" @endif>
              <div class="image"><img src="{{ asset("images/trim/$ccoo->image") }}"></div>
              <div class="content">
                <div class="title">{{ $ccoo->title }}</div>
               {!! $ccoo->description !!}
              </div>
            </div>
                @php $kk=$kk+1;  @endphp
                @endforeach
          </div>
        </div>
      </div>
      <div class="trim-pencil-sec mt60">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">{{ $Multitrims[0]->title }}</h4>
          <div class="trim-pencil-box">
                @php  $kk1 = 0;  $i_k1=0; @endphp
                      @foreach(explode(',',$Multitrims[0]->image) as $kkey1 => $ccoo1)
            <div class="item" data-aos="fade-right"  @if($kk1>0) data-aos-delay="{{ $i_k1=$i_k1+200 }}" @endif>
              <img src="{{ asset("images/trim/$ccoo1") }}">
            </div>
               @php $kk1=$kk1+1;  @endphp
                @endforeach
              
          </div>
          <div class="pencil-info" data-aos="fade-up">
            {!! $Multitrims[0]->description !!}
          </div>
        </div>
      </div>
  
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')

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
</div>

@endsection

