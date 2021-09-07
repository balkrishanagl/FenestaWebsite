@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   
    
       @if(empty($pageData->banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg')}}') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg')}}') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg')}}') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg')}}') }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
        
          <div class="heading"><div class="container-fluid">        @if(!empty($pageData->page_title))
          <h1>   {!! $pageData->page_title !!}</h1>
        @else
          <h1>Features Benefits</h1>
        @endif
           </div></div> 
      </div>
            
            
      <div class="energy-efficient-tab">
        <div class="container-fluid">
          <div class="inner-wrap">
            <div class="efficient-tablist">
              <ul>
                  @php $ik=0; @endphp
                @foreach($featurebenefit as $ff)  
                <li><a href="javascript:;" @if($ik==0) class="active" @endif>{{$ff->name}}</a></li>
                   @php $ik=$ik+1; @endphp
                @endforeach  
         
              </ul>
            </div>
            <div class="efficient-tab-box"> 
                @php $ik=0; @endphp
                @foreach($featurebenefit as $ff)  

              <div class="efficient-tab-content" @if($ik==0)  style="display: block;"  @endif>
                <h3 class="for-mob">{{$ff->name}}</h3>
                <div class="content">
					<div class="cont_block">
						<h4>{{$ff->title}}</h4>
                        {!!$ff->description!!}
                  <div class="image"><img src="{{asset("images/featurebenefit/image/$ff->image")}}"></div>                  
                  <div class="efficient-content-item">
                    <div class="item">
                      <div class="image-item"><img src="{{asset("images/site_images/images/energy-efficient/tab-item1.png")}}"></div>
                      <h6>THE MATERIAL OF CONSTRUCTION</h6>
                      <p>UPVC - A poor conductor of heat, UPVC neither retains nor transfers heat indoors. Aluminium does both. The U-Value (the calculation of conducting properties) of UPVC is comparable to wood and far less than Aluminium.</p>
                    </div>
                    <div class="item">
                      <div class="image-item"><img src="{{asset("images/site_images/images/energy-efficient/tab-item2.png")}}"></div>
                      <h6>AIR TIGHT SEALING</h6>
                      <p>Use of fusion welded joints, multi-chambered profiles, multiple point locks and silicone sealant for airtight sealing that prevents the conditioned cold air from escaping out and hot air from flowing in.</p>
                    </div>
                    <div class="item">
                      <div class="image-item"><img src="{{asset("images/site_images/images/energy-efficient/tab-item3.png")}}"></div>
                      <h6>DOUBLE INSULATION</h6>
                      <p>All Fenesta windows and doors can be fitted with double or triple insulated glass, which is often used in modern buildings with high green rating - as the means to save power.</p>
                    </div>
                  </div>
                  <div class="result"><strong>RESULT:</strong> {{$ff->result}}</div>
					</div>	
                </div>
              </div>
                @php $ik=$ik+1; @endphp
                @endforeach  
           
            </div>
          </div>
        </div>
      </div>

    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
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
