@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
use App\Models\WindowdoorType;
@endphp
<style>
    .mt_block .img_block {
    height: auto;
}
</style>
    <div class="window-handle-sec">
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
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif 
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1> Design  </h1>
        @endif
           </div></div> 
    
    
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
             @if($sub_text!='')
              {!!$sub_text!!}
            @endif
              
            <div class="explore-more"><a href="javascript:;">Explore More <span><img src="{{asset('images/site_images/images/about/explore-more.png')}}" alt=""></span></a></div>
          </div>
        </div>
      </div>

		<div class="design_tabs">
			<div class="material_tabs" id="navbar_top">
				<div class="container">
					<ul class="tab_list" data-aos="fade-up">
						<li class="active">
							<a class="nav-link scrollTo active" href="#window"><span>Window</span></a>
						</li>
						<li>
							<a class="nav-link scrollTo" href="#door"><span>Door</span></a>
						</li>
					</ul>
				</div>	
			</div>
			<div class="container">
				<div class="window_block" id="window">
					<div class="inner_block">
						@if($content!='')
                          {!!$content!!}
                        @endif

						<div class="owl-carousel design_carousel">
                            @php  $ik=100; @endphp
                            @foreach($windowsdata->unique('title') as $ww)
                            
                            @php
                           $wtype =  WindowType::where('title',$ww->title)->where('product_type','Window')->get();
                            @endphp
							<div class="item" data-aos="fade-right" data-aos-delay="{{$ik=$ik+100}}">
								<div class="inner">
									<h3>{{\Illuminate\Support\Str::limit($ww->title." Windows",20)}}</h3>
									<div class="img_block">
										<img src="{{asset("images/windowtype/$ww->thumb_image")}}" alt=" {{$ww->title}} Windows ">
									</div>
                                    {!!\Illuminate\Support\Str::limit($ww->short_description,85)!!}
									<ul>
                                        @foreach($wtype as $ttww)
                                        @php
                                        $wtypename =  WindowdoorType::where('id',$ttww->product)->first();
                                        $lop = strtolower($wtypename->slug);
                                        @endphp
										<li><a href="{{url("/window/$lop/$ttww->slug")}}">  {{ $wtypename->title }} </a></li>
                                        @endforeach
									</ul>
								</div>
							</div>
                            @endforeach
                            
						</div>
					</div>
				</div>
				<div class="door_block" id="door">
					<div class="inner_block">
						 @if($content2!='')
                          {!!$content2!!}
                        @endif

						<div class="owl-carousel design_carousel">
                             @php  $ik=100; @endphp
                            @foreach($doorsdata->unique('title') as $ww)
                             @php
                           $wtype =  WindowType::where('title',$ww->title)->where('product_type','Door')->get();
                            @endphp
							<div class="item" data-aos="fade-right" data-aos-delay="{{$ik=$ik+100}}">
								<div class="inner">
									<h3>{{\Illuminate\Support\Str::limit($ww->title." Doors",20)}}</h3>
									<div class="img_block">
										<img src="{{asset("images/doortype/$ww->thumb_image")}}" alt=" {{$ww->title}} Windows ">
									</div>
								    {!!\Illuminate\Support\Str::limit($ww->short_description,85)!!}
									<ul>
										 @foreach($wtype as $ttww)
                                        @php
                                        $wtypename =  WindowdoorType::where('id',$ttww->product)->first();
                                        $rty = strtolower($wtypename->slug);
                                        @endphp
										<li><a href="{{url("/door/$rty/$ttww->slug")}}"> {{ $wtypename->title }} </a></li>
                                        @endforeach
									</ul>
								</div>
							</div>
                            @endforeach
                            
						</div>
					</div>
				</div>
			</div>	
		</div>
    
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
    
      {{--<div class="about-finesta mt60">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
            
            @if($about)
            {!! $about !!}
            @endif
          </div>
        </div>
      </div>--}}

</div>
@endsection

