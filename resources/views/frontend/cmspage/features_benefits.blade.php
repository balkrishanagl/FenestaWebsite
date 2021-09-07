@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
use App\Models\WindowdoorType;
@endphp
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
          <source srcset="{{ asset('images/'.$pageData->banner_image)}}') }}" media="(min-width:320px)">
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
                <li><a href="javascript:;" @if($ff->slug==$child_slug) class="active" @elseif($ik==0 and empty($child_slug))  class="active"  @endif>{{$ff->name}}</a></li>
                   @php $ik=$ik+1; @endphp
                @endforeach  
         
              </ul>
            </div>
            <div class="efficient-tab-box"> 
                @php $ik=0; @endphp
                @foreach($featurebenefit as $ff)  

              <div class="efficient-tab-content" @if($ff->slug==$child_slug)  style="display: block;" @elseif($ik==0 and empty($child_slug))  style="display: block;"  @endif>
                <h3 class="for-mob">{{$ff->name}}</h3>
                <div class="content">
					<div class="cont_block">
						<h4>{{$ff->title}}</h4>
                        {!!$ff->description!!}
                        <div class="image"><img src="{{asset("images/featurebenefit/image/$ff->image")}}"></div> 
                        @if($ff->belowimage!='')
                        <p>{{$ff->belowimage}}</p>
                        @endif
                        
                        
                        @if(!empty(json_decode($ff->optiondata)))
                  <div class="efficient-content-item">
                      
                      @foreach(json_decode($ff->optiondata) as $ffdf)
                      @if(!empty($ffdf->title) or !empty($ffdf->content))
                    <div class="item">
                     {{-- <div class="image-item"><img src="{{asset("images/site_images/images/energy-efficient/tab-item1.png")}}"></div> --}}
                      <h6>{{$ffdf->title}}</h6>
                      <p>{{$ffdf->content}}</p>
                    </div>
                      @endif
                      @endforeach
                      
                  </div> 
                        @endif
                  <div class="result"><strong>RESULT:</strong> {{$ff->result}}</div>
					</div>	
                  	<div class="energy-efficient-table">
        <div class="container-fluid">
          <div class="inner-wrap">
               @if(json_decode($ff->windowtype)!='')
            <div class="left">
              <div class="table-wrap">
                <ul>
                  <li class="head">
                    <div><h4>Windows Types</h4></div>
                    <div>PREMIUM <br> SERIES</div>
                    <div>LUXURY <br> SERIES</div>
                    <div>SUPER LUXURY <br>SERIES</div>
                    <div></div> 
                  </li>
                  @foreach(json_decode($ff->windowtype) as $wwkk => $wwtt)
                     @php
                 $p_sluga = App\Http\Controllers\FrontendControllers\WindowdoorController::createUrlSlug($wwkk); 
                  $witypedata =   WindowType::where('slug',$p_sluga)->first();
                  $witypedataslug =   WindowdoorType::find($witypedata->product)->slug;
                 @endphp
                  <li>
                    <div>
                      {{--  <span class="image"><img src="{{asset("images/site_images/images/upvc-window/slide-icon.png")}}"></span> --}}
                        <h4>{{$wwkk}}</h4></div>
                    
                    @php $yui=0; @endphp
                    @foreach($wwtt as $hj => $gghv)
                      @if($yui<3)
                       <div><span>{{$gghv[0]}}</span></div>
                     @endif
                     @php $yui=$yui+1; @endphp 
                    @endforeach
                    
                    <div><span><a href="{{url("/window/$witypedataslug/$p_sluga")}}" class="blue-btn white">Explore</a></span></div>
                  </li>
                  
                  @endforeach
                </ul>
              </div>
            </div>
                        @endif
                        @if(json_decode($ff->doortype)!='')
            <div class="right">
              <div class="table-wrap">
                <ul>
                  <li class="head">
                    <div><h4>Door Types</h4></div>
                    <div>PREMIUM <br> SERIES</div>
                    <div>LUXURY <br> SERIES</div>
                    <div>SUPER LUXURY <br>SERIES</div>
                    <div></div> 
                  </li>
                   @php $p_slugad='';   @endphp
                @foreach(json_decode($ff->doortype) as $wwkks => $wwtt)
                    
                 @php
                 $p_slugad = App\Http\Controllers\FrontendControllers\WindowdoorController::createUrlSlug($wwkks);  
                 /*
                  $witypedatad =   WindowType::where('slug',$p_slugad)->first();
                    $dgh = $witypedatad->product;
                    
                  $witypedataslugsd =   WindowdoorType::find($dgh)->slug;
                  */
                 @endphp
                  <li>
                    <div>
                      {{--  <span class="image"><img src="{{asset("images/site_images/images/upvc-window/slide-icon.png")}}"></span> --}}
                        <h4>{{$wwkks}}</h4></div>
                    @php $yui=0; @endphp
                    @foreach($wwtt as $hj => $gghv)
                      @if($yui<3)
                       <div><span>{{$gghv[0]}}</span></div>
                      @endif
                     @php $yui=$yui+1; @endphp 
                    @endforeach
                    
                 
                    <div><span><a href="{{url("/door/alumininum-doors/$p_slugad")}}" class="blue-btn white">Explore</a></span></div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
                  @endif
          </div>
        </div>
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
