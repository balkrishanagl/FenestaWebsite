@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
        <div class=" internal-door-sec">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   <style>
       
    .seriec-list .inner .img_block .image {
    max-width: 240px;
    };

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
          <h1>  Series </h1>
        @endif
           </div></div> 
      </div>
            
            
            
      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">             
                {!!$pageData->page_description!!}              
            <div class="explore-more"><a href="javascript:;">Explore More <span><img src="{{asset('images/about/explore-more.png')}}" alt=""></span></a></div>
          </div>
        </div>
      </div>
      
      <div class="series-box-list">
		  <div class="material_tabs" id="navbar_top">
				<div class="container">
					<ul class="tab_list">
              @php $i=1; @endphp
              @foreach($seriesdata as $sd)
                        
						<li><a class="nav-link scrollTo @if($i==0) active @endif " href="#premium{{$sd->id}}"><span>{{$sd->title}}</span></a></li>
                         @php $i=$i+1; @endphp
                        @endforeach
						
					</ul>
				</div>	
			</div>
        <div class="container-fluid">
			 @php $i=1; @endphp
             @foreach($seriesdata as $sd)
		       <div class="series-box" id="premium{{$sd->id}}">
            <!--<h4 class="text-center"  data-aos="fade-up">Premium Series</h4>-->
            <div class="box">
              <div class="image-box">
					<div class="copy_block addReadMore showlesscontent" >
						{!!$sd->description!!}
					</div>

					<div class="img_block" data-aos="zoom-in-up">
						<img src="{{asset("images/series/$sd->image")}}" alt="{{$sd->title}}">
					</div>
					<div class="carousel_block" id="new_sliders" >
                        <h6 class="text-center" >WINDOWS</h6>
                        <div class="owl-carousel series_carousel">
                            @php foreach(explode(',',$sd->product) as $wd){  
                            
                             $wind = WindowType::where('id',$wd)->first();
                             if($wind->product_type=='Window'){
                            @endphp
                            <div class="item" >
                                <img src="{{asset("images/windowtype/$wind->image")}}" alt="">
                                <span>{{$wind->title}}</span>
                            </div>
                            @php } } @endphp
                        </div>
						
						            <h6 class="text-center" >Door</h6>
                        <div class="owl-carousel series_carousel">
                            
                             @php foreach(explode(',',$sd->product) as $wd){  
                            
                             $wind = WindowType::where('id',$wd)->first();
                             if($wind->product_type=='Door'){
                            @endphp
                            <div class="item" >
                                <img src="{{asset("images/doortype/$wind->image")}}" alt="">
                                <span>{{$wind->title}}</span>
                            </div>
                            @php } } @endphp
                            
                        </div>
					</div>
              </div>
              <div class="feature-box">
                <h4>Features</h4>
                  {!!$sd->feature!!}                
              </div>
            </div>
          </div>
             
            @php $i=$i+1; @endphp
            @endforeach
            
        </div>
      </div>
            
            {{--
      
		<div class="qa_section">
			<div class="container-fluid">
				<ul class="qa_list seriec-list">
                    @php $i=1; @endphp
                    @foreach($seriesdata as $sd)
					<li>
						<div class="inner">
							<div class="img_block" @if($i%2==0)  @else data-aos="fade-left"  @endif >
								<img class="image" src="{{asset("images/series/$sd->image")}}" alt="{{$sd->title}}">
							</div>
							<div class="copy"  @if($i%2==0) data-aos="fade-left" @else data-aos="fade-right" @endif >
								<h3>{{$sd->title}}</h3>
								{!!$sd->description!!}
							</div>
						</div>	
					</li>
                    @php $i=$i+1; @endphp
                
                    @endforeach
                    
				</ul>
			</div>
		</div>  --}}   
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

