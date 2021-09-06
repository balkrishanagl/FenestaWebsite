@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
        <div class=" internal-door-sec">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
  <style> 
      .switch a{
          bottom:150px;
      }
      .section .owl-nav button, .section .blue-btn {
    opacity: 1;
}
  </style> 
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$banner_image) }}">
        </picture> 
        @endif 
        
        <div class="heading"><div class="container-fluid">     
            @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1> {{ $ptype }}   </h1>
        @endif
           </div></div> 
     <div class="certified"><div class="container-fluid"><img src="{{ asset('images/site_images/images/internal-door/certified.png')}}"></div></div>
    @if($ptype=='Window')
        <div class="switch"><a href="{{ url('/door') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Doors</a></div>
    
    @else
    
        <div class="switch"><a href="{{ url('/window') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Windows</a></div>
    
    @endif
      </div>
        <div class="inner-page-content">
                <div class="container-fluid">
                    @if($short_description)
                    {!! $short_description !!}
                    @endif
                   
                </div>
              </div>
      {{--
      <div class="doores-range-sec">
        <div class="container-fluid">
			<div class="text-center">
				{!!$series_content!!}
			</div>
          <div class="inner-box">
            <div class="avail-range" data-aos="zoom-in">
              <h4 class="text-center">Available Range</h4>
              <div class="door-list">
                @foreach($arange as $aaaa) 
                <div class="item">
                  <div class="image"><img src="{{ asset("images/arange/$aaaa->image")}}" alt="{{$aaaa->title}}"></div><h6>{{$aaaa->title}}</h6>
                </div>
                @endforeach 
              </div>
              <p>APPERTURE SIZE – Min 750X2100mm. Max 1000X2400mm</p>
            </div>
            <div class="middle-avail" data-aos="zoom-in">
              <div class="image"><img src="{{ asset("images/windowdoortype/$doorimage")}}" alt=""></div>
              <a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
            </div>
            <div class="avail-color" data-aos="zoom-in">
              <h4 class="text-center">Available Colours</h4>
              <div class="color-list">
                  @foreach($coloroptionssl as $cc)
                    <div class="item">
                      <div class="image"><img src="{{ asset("images/coloroption/$cc->image")}}" alt=""></div><h6>{{$cc->title}}</h6>
                    </div>
                  @endforeach
              </div>
              <p><i>Other Colours and designs available on request* <br>T&C Apply</i></p>
            </div>
          </div>
        </div>
      </div>
            
            --}}
      
		<div class="select_door">
			<div class="container">
				<h2>{!!$series_content!!}</h2>
				<div class="sd_tabs">
					<div class="outer_tabs" data-aos="zoom-in">
						<h4>Available Range</h4>
					
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" id="premium-range-tab" data-toggle="tab" href="#premium-range" aria-controls="premium-range">
									<div class="image">
										<img src="{{asset('images/internal-door/door1.jpg')}}" alt="">
									</div>
									<h6>Premium Range</h6>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="luxury-range-tab" data-toggle="tab" href="#luxury-range" aria-controls="luxury-range">
									<div class="image">
										<img src="{{asset('images/internal-door/door2.jpg')}}" alt="">
									</div>
									<h6>Luxury Range</h6>
								</a>
							</li> 
						</ul>
						<p>APPERTURE SIZE – Min 750X2100mm. Max 1000X2400mm</p>
					</div>	
					<div class="tab-content outer_tc">
						<div class="tab-pane fade show active" id="premium-range" aria-labelledby="premium-range-tab">
							<div class="tab-content" data-aos="zoom-in">
								<div class="tab-pane fade show active" id="white-oak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Premium-White-Oak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>	
								</div>
								<div class="tab-pane fade" id="natura-oak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Premium-Natural-Oak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="teak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Premium-Teak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="walnut">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Premium-Walnut.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
							</div>
							<div class="inner_tabs" data-aos="zoom-in">
								<h4>Available Colours</h4>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id="white-oak-tab" data-toggle="tab" href="#white-oak">
											<div class="image">
												<img src="{{asset('images/internal-door/color1.jpg')}}" alt="">
											</div>
											<h6>White Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="natura-oak-tab" data-toggle="tab" href="#natura-oak">
											<div class="image">
												<img src="{{asset('images/internal-door/color2.jpg')}}" alt="">
											</div>
											<h6>Natura Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="teak-tab" data-toggle="tab" href="#teak">
											<div class="image">
												<img src="{{asset('images/internal-door/color3.jpg')}}" alt="">
											</div>
											<h6>Teak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="walnut-tab" data-toggle="tab" href="#walnut">
											<div class="image">
												<img src="{{asset('images/internal-door/color4.jpg')}}" alt="">
											</div>
											<h6>Walnut</h6>
										</a>
									</li>
								</ul>
								<p>Other Colours and designs available on request* T&C Apply</p>
							</div>	
						</div>
						<div class="tab-pane fade" id="luxury-range" aria-labelledby="luxury-range-tab">
							<div class="tab-content" data-aos="zoom-in">
								<div class="tab-pane fade show active" id="luxury-white-oak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Luxury-White-Oak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-natura-oak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Luxury-Natural-Oak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-teak">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Luxury-Teak.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
								<div class="tab-pane fade" id="luxury-walnut">
									<div class="mid_img">
										<div class="image">
											<img src="{{asset('images/internal-door/Luxury-Walnut.png')}}" alt="">
										</div>
										<a href="javascript:;" data-toggle="modal" data-target=".consult-popup" class="blue-btn white">Enquire now</a>
									</div>
								</div>
							</div>
							<div class="inner_tabs" data-aos="zoom-in">
								<h4>Available Colours</h4>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id="luxury-white-oak-tab" data-toggle="tab" href="#luxury-white-oak">
											<div class="image">
												<img src="{{asset('images/internal-door/color1.jpg')}}" alt="">
											</div>
											<h6>White Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-natura-oak-tab" data-toggle="tab" href="#luxury-natura-oak">
											<div class="image">
												<img src="{{asset('images/internal-door/color2.jpg')}}" alt="">
											</div>
											<h6>Natura Oak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-teak-tab" data-toggle="tab" href="#luxury-teak">
											<div class="image">
												<img src="{{asset('images/internal-door/color3.jpg')}}" alt="">
											</div>
											<h6>Teak</h6>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="luxury-walnut-tab" data-toggle="tab" href="#luxury-walnut">
											<div class="image">
												<img src="{{asset('images/internal-door/color4.jpg')}}" alt="">
											</div>
											<h6>Walnut</h6>
										</a>
									</li>
								</ul>	
								<p>Other Colours and designs available on request* T&C Apply</p>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
            
            
            
      <div class="feature-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Features & Benefits</h4>
            <div class="content text-center" data-aos="fade-up" >
              {!! $feature_benefits !!}

            </div>
            <div class="feature-slider owl-carousel">
                @php $tim=0; @endphp
                @foreach($feature as $key => $ff)
                <div class="item" data-aos="fade-right" @if($key>0 and $key<4) data-aos-delay="{{$tim=$tim+200}}" @endif >
                    
                <img class="nohover" src="{{ asset("images/arange/$ff->image")}}">
                <span>{{$ff->title}} </span>
              </div>       
               @endforeach
              </div>
         {{--   <div class="btn-grp text-center"><a href="{{ url('/features-benefits') }}" class="blue-btn">Explore More</a></div> --}}
          </div>
        </div>
      </div>
		
		<div class="wooden_fenesta">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="wooden_section">
							<div class="img_block" data-aos="fade-right" data-aos-delay="400">
								<div class="image">
									<img src="{{ asset("images/options/$woodenimage")}}" alt="">
								</div>
								<h4>Wooden</h4>
							</div>
							<div class="cont_block" data-aos="fade-left" data-aos-delay="400">
								<ul>
                                    @foreach($woodenoptions as $wwoo)
									<li>
										<div class="icon">
											<img src="{{asset("images/options/$wwoo->image")}}" alt="{{$wwoo->title}}">
										</div>
										{{$wwoo->title}}
									</li>
                                    @endforeach
								</ul>
							</div>
						</div>
					</div>
					<span class="vs" data-aos="zoom-in">
						Vs
					</span>
					<div class="col-md-6">
						<div class="fenesta_section">
							<div class="img_block" data-aos="fade-right" data-aos-delay="800">
								<div class="image">
									<img src="{{ asset("images/options/$fenestaimage")}}" alt="">
								</div>
								<h4>Fenesta</h4>
							</div>
							<div class="cont_block" data-aos="fade-left" data-aos-delay="800">
								<ul>
                                       @foreach($fenestaoptions as $ffoo)
									<li>
										<div class="icon">
											<img src="{{asset("images/options/$ffoo->image")}}" alt="{{$ffoo->title}}">
										</div>
										{{$ffoo->title}}
									</li>
                                    @endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		
      <div class="hardware-access-sec">
        <div class="container-fluid">
          <h4 class="text-center" data-aos="fade-up">Hardware & Accessories</h4>
          <p class="text-center" data-aos="fade-up">Fenesta Internal Doors come with below accessories as a standard offering</p>
			<div class="hardware_wrap">
				<h3 data-aos="fade-up">Handle</h3>
				<div class="owl-carousel hardware-list">
                    @php $i=0; $ik=0; @endphp
                    @foreach($handlelocks as $hhll)
					<div class="item" data-aos="fade-right" @if($i>0) data-aos-delay="{{$ik=$ik+200}}" @endif>
						<div class="inner">
                      <div class="top">
                        <div class="image"><img src="{{ asset('images/handlelock/'.$hhll->image) }}" alt="{{$hhll->title}}"></div>
                        <h6>{{$hhll->title}}</h6>
                      </div>
                      {{-- <div class="bottom">
                        <strong>Door {{$hhll->type}}</strong>
                      <p>{{$hhll->content}}</p>
                      </div> --}}
						</div>	
                    </div>
                    @php $i=$i+1; @endphp
                    @endforeach
					</div>
			</div>
			<div class="hardware_wrap">
				<h3 data-aos="fade-up">Accessories</h3>
				<div class="owl-carousel hardware-list">
                     @php $i=0; $ik=0; @endphp
                    @foreach($acessories as $hhll)
					<div class="item" data-aos="fade-right" @if($i>0) data-aos-delay="{{$ik=$ik+200}}" @endif>
						<div class="inner">
                      <div class="top">
                        <div class="image"><img src="{{ asset('images/handlelock/'.$hhll->image) }}" alt="{!!$hhll->title!!}"></div>
                        <h6>{!!$hhll->title!!}</h6>
                      </div>
                      <div class="bottom">
                        <strong>{{$hhll->acessories_type}}</strong>
                        <p>{{$hhll->content}}</p>
                      </div>
						</div>	
                    </div>
					 @php $i=$i+1; @endphp
                    @endforeach
                </div>
			</div>
         
          <div class="content" data-aos="fade-up">
            @if($content)
                    {!! $content !!}
                    @endif
          </div>
        </div>
      </div>
      
    @include('frontend._partials.imagegallery')
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
    
    {{--  <div class="about-finesta mt60">
        <div class="container-fluid">
          <h4>About Fenesta {!! $title !!}</h4>
          <div class="content">
            
            @if($about)
            {!! $about !!}
            @endif
          </div>
        </div>
      </div>--}}

</div>
@endsection

