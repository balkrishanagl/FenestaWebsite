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
          <h1>  About Fenesta </h1>
        @endif
           </div></div> 
        
      </div>


      <div class="about-portfolio pdt45">
        <div class="container-fluid">
            
          <div class="about-portfolio-list">
           
              @foreach($about_fenestas as $ab)
                <div class="item" data-aos="fade-right">
				<div class="inner">
					<div class="image"><img src="{{asset("images/about/$ab->image")}}" alt="{{$ab->title}}"></div>
					<div class="content">
						<h5>{{$ab->title}}</h5>
					</div>
				</div>	
            </div>
              @endforeach
          </div>
          <div class="bottom-content">
            @if($content)
              {!! $content !!}
            @endif
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

      <div class="value-sec mt60" id="ourvalue">
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
      

      <div class="award-accred-sec" id="awards">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Awards & Accreditations</h4>
          <div class="award-accred-slider owl-carousel">
                @php $i=0; $ad=0; @endphp
                @foreach($awards as $aval)
                  <div class="item" data-aos="fade-right" @if($i>4) data-aos-delay="{{$ad=$ad+200}}" @endif>
              <div class="image"><img src={!!asset("images/awards/$aval->image")!!}></div>
              <div class="content">
                {!!$aval->description!!}
              </div>
            </div>
                @php $i=$i+1; @endphp
                @endforeach
          </div>
        </div>
      </div>

      <div class="life-sec mt50">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Life @ Fenesta</h4>
          <div class="life-slider owl-carousel">
                @php $ik=0; $it=0; @endphp
              @foreach($about_life as $abv)

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
   
{{--   @include('frontend._partials.imagegallery') --}}
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')

  {{--  @include('frontend._partials.relatedblog') --}}

</div>
@endsection

