@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
        <div class="main-sec inner-page">
       <style> 
      .switch a{
          bottom:150px;
      }
         .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
            display: block !important;
            }
           
/*
           @media only screen and (max-width: 1450px){
.upvc-sliding-window-sec .series-option-sec .series-recommended h5 {
    font-size: 22px !important;
}
           }
*/
  </style> 
       
    @if($ptype=='Window')
        <div class="switch"><a href="{{ url('/door') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Doors</a></div>
    
    @else
    
        <div class="switch"><a href="{{ url('/window') }}"> <img src="{{ asset('images/site_images/door-icon.png') }}"> Switch to <br> Windows</a></div>
    
    @endif
        <div class="upvc-sliding-window-sec">
            
            
    @include('frontend.layouts.breadcrumb')
    <div class="inner-banner">  
 
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/product-banner.png') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/product-banner.png') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/product-banner.png') }}">
        </picture> 
         @else
            @if($ptype=='Window')
            <picture>
              <source srcset="{{ asset('images/windowtype/'.$banner_image) }}" media="(min-width:768px)">
              <source srcset="{{ asset('images/windowtype/'.$banner_image) }}" media="(min-width:320px)">
              <img src="{{ asset('images/windowtype/'.$banner_image) }}">
            </picture> 
            @else
             <picture>
              <source srcset="{{ asset('images/doortype/'.$banner_image) }}" media="(min-width:768px)">
              <source srcset="{{ asset('images/doortype/'.$banner_image) }}" media="(min-width:320px)">
              <img src="{{ asset('images/doortype/'.$banner_image) }}">
            </picture> 
            @endif
        @endif 
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!} {{$ptype}}</h1>
        @else
          <h1> {{ $ptype }}   </h1>
        @endif
           </div></div> 
    
      </div>

    
      <div class="inner-top-nav">
        <div class="container-fluid">
          <ul>
              @if($product_types!='')
              @php  $lowerp_type = strtolower($ptype); @endphp
                  @foreach($product_types as $pt)
                    <li><a href="{{url("/$lowerp_type/$slug/$pt->slug")}}" @if($pt->id==$id) class="active" @endif>
                         @if($ptype=='Window')
                            <img class="nohover"  alt="{{$pt->title}}" src="{{ asset("images/windowtype/$pt->image") }}">
                           <img class="hover" src="{{ asset("images/windowtype/$pt->image") }}">
                        @else
                            <img class="nohover"  alt="{{$pt->title}}" src="{{ asset("images/doortype/$pt->image") }}">
                            <img class="hover" src="{{ asset("images/doortype/$pt->image") }}">
                        
                        @endif
                       {{$pt->title}}</a></li>
                  @endforeach
              @endif
        
          </ul>
          <div class="inner-top-nav-tab">
            
            <div class="inner-top-nav-content" style="display: block;">
              <h4 class="active">
                      @if($ptype=='Window')
                            <img class="nohover" src="{{ asset("images/windowtype/$image") }}"><img class="hover" src="{{ asset("images/windowtype/$image") }}">
                            
                        @else
                             <img class="nohover" src="{{ asset("images/doortype/$image") }}"><img class="hover" src="{{ asset("images/doortype/$image") }}">
                            
                        @endif
                  <span>{{$title}}</span></h4>
              <div class="content" style="display: block;">
                @if($content!='')
                  <div class="textreadmore">
 
                  {!! $content !!}
                  </div>
                   <p class="buttonreadmore">Read More</p>
                  
                  
                @endif
                  @if($video_url!='')
				<div class="upvc_video">
					<div class="inner">
						@if($ptype=='Window')
                            <img alt="{{$title}}" src="{{ asset("images/windowtype/$featured_image") }}">
                        @else
                            <img  alt="{{$title}}" src="{{ asset("images/doortype/$featured_image") }}">
                        @endif
						<a href="javascript:void(0)" data-video-id="{{ $video_url }}" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>
                  @endif
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4> @if($id==26) Available Color @else Available Design @endif</h4>
                          <div class="series-design-slider owl-carousel">
                              @foreach(explode(',',$multi_image) as $mi)
                               <div class="item">
                                  <div class="image">
                                        @if($ptype=='Window')
                                            <img src="{{asset("images/windowtype/$mi")}}">
                                        @else
                                            <img src="{{asset("images/doortype/$mi")}}">
                                        @endif
                                      
                                      
                                       </div>
                                </div>
                              @endforeach
                          </div>
                        </div>
                          
                           @if($id==26 || $id==30 || $id==7 || $id==8) 
                          <div class="series-recommended">
                              @if($id==26) 
                          <h4 data-aos="fade-right">Available Size</h4>
                              @else
                             <h4 data-aos="fade-right">Recommended For</h4>
                              @endif
                          
                              @php $ri=0; $rt=0; @endphp
                              @foreach($recom_for as $rr)
                            <a href="javascript:;" data-aos="fade-right" @if($ri>0) data-aos-delay="{{ $rt=$rt+200 }}" @endif>
                              <br><h5>{{$rr->title}}</h5>
                            </a>
                              @php $ri=$ri+1; @endphp
                              @endforeach
                            <br>
                        </div>
                          @else
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recommended For</h4>
                          <div class="right">
                              @php $ri=0; $rt=0; @endphp
                              @foreach($recom_for as $rr)
                              @if($rr->title)
                            <a href="javascript:;" data-aos="fade-right" @if($ri>0) data-aos-delay="{{ $rt=$rt+200 }}" @endif>
                              <span class="image"><img src="{{ asset("images/recom/$rr->image")}}"></span>
                              <h5>{{$rr->title}}</h5>
                            </a>
                              @endif
                              @php $ri=$ri+1; @endphp
                              @endforeach
                            
                          </div>
                        </div>  
                          @endif
                      </div>
                        
                      <div class="option" data-aos="zoom-in">
              <h4>Options</h4>
              <div class="option-slider-box">
                <div class="slick-option-gallery slick-slider">
                   @foreach($options as $kk => $oo) 
                  <div class="slick-slide">
                    <img src="{{ asset("images/options/$oo->image") }}">
                    <div class="overlay">
                    <div class="inner">
                    <p>{{$oo->title}}</p>
                     
                        @if($kk=='color')
                    <a href="{{url("/$lowerp_type/colors-finish")}}" class="btn" tabindex="0">Explore More</a>
                         @elseif($kk=='glass')
                    <a href="{{url("/$lowerp_type/glass")}}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='handle')
                    <a href="{{ url("/$lowerp_type/handles") }}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='meshgrill')
                    <a href="{{url("/$lowerp_type/mesh-grill")}}" class="btn" tabindex="0">Explore More</a>
                          @elseif($kk=='trim')
                    <a href="{{ url('/trims') }}" class="btn" tabindex="0">Explore More</a>
                        @endif
                        
                    </div>	
                    </div>
                  </div>
                   @endforeach
                </div> 
                <div class="slick-option-gallery-thumb slick-slider">
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option1.png') }}"></a></span><span>Color</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option2.png') }}"></a></span><span>Glass</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option3.png') }}"></a></span><span>Handle</span></div>
                    <div class="slick-slide"><span class="image"><a href="javascript:void(0)"><img src="{{ asset('images/site_images/images/upvc-window/option4.png') }}"></a></span><span>Mesh & Grill</span></div>
                  <div class="slick-slide"><span class="image"><img src="{{ asset('images/site_images/images/upvc-window/option5.png') }}"></span><span>Trims</span></div>                  
                </div>
              </div> 
            </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
             {{--
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/case-icon2.png"><img class="hover" src="images/window/case-icon2-white.png"><span>Casement</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/tilt-icon.png"><img class="hover" src="images/window/tilt-icon-white.png"><span>Tilt And Turn</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/conbine-icon.png"><img class="hover" src="images/window/conbine-icon-white.png"><span>Combination</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/villa-icon.png"><img class="hover" src="images/window/villa-icon-white.png"><span>Villa</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/bay-icon.png"><img class="hover" src="images/window/bay-icon-white.png"><span>Bay</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/case-icon2.png"><img class="hover" src="images/window/case-icon2-white.png"><span>Fixed</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-top-nav-content">
              <h4><img class="nohover" src="images/window/glass-icon.png"><img class="hover" src="images/window/glass-icon-white.png"><span>Glass to Glass</span></h4>
              <div class="content">
                <p>Sliding windows comprises of two or more than two horizontal sashes that are fitted with rollers at the base for smooth sideward track movement. Easy to operate, these windows offer panoramic views and a great amount of ventilation.</p>
                <p>The contemporary sliding window design has always been a popular choice in several households. With its quality to add finesse to any room, these windows can elevate the style quotient of any space without compromising on the fenestration requirements. The price of the sliding window is actually worth it given the swift movement and overall ease of operation it offers.</p>
				<div class="upvc_video">
					<div class="inner">
						<img src="images/window/video-img.jpg" alt="">
						<a href="#" class="play_btn"><i class="fa fa-play"></i></a>
					</div>			  
				</div>  
                <div class="series-option-sec">
                  <div class="">
                    <div class="inner-box">
                      <div class="series" data-aos="zoom-in">
                        <div class="series-design">
                          <h4>Available Design</h4>
                          <div class="series-design-slider owl-carousel">
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                            <div class="item">
                              <div class="image"><img src="images/window/series.jpg"></div>
                            </div>
                          </div>
                        </div> 
                        <div class="series-recommended">
                          <h4 data-aos="fade-right">Recomended For</h4>
                          <div class="right">
                            <a href="javascript:;" data-aos="fade-right">
                              <span class="image"><img src="images/window/recommend1.jpg"></span>
                              <h5>Bedrooms</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="200">
                              <span class="image"><img src="images/window/recommend2.jpg"></span>
                              <h5>Balconies</h5>
                            </a>
                            <a href="javascript:;" data-aos="fade-right" data-aos-delay="400">
                              <span class="image"><img src="images/window/recommend3.jpg"></span>
                              <h5>Large/Tall openings</h5>
                            </a>
                          </div>
                        </div>      
                      </div>
                      <div class="option" data-aos="zoom-in">
                        <h4>Options</h4>
                        <div class="option-slider-box">
                          <div class="slick-option-gallery slick-slider">
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                            <div class="slick-slide">
                              <img src="images/upvc-window/option-big.jpg">
								<div class="overlay">
									<div class="inner">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique facilisis eros,  at dignissim ipsum </p>
										<a href="#" class="btn">Explore More</a>
									</div>	
								</div>
                            </div>
                          </div> 
                          <div class="slick-option-gallery-thumb slick-slider">
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option2.png"></span><span>Glass</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option3.png"></span><span>Handle</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option4.png"></span><span>Mesh & Grill</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option5.png"></span><span>Trims</span></div>
                            <div class="slick-slide"><span class="image"><img src="images/upvc-window/option1.png"></span><span>Color</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              --}}
          </div>
        </div>
      </div>
            
      <div class="feature-sec pdt45">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Features & Benefits</h4>
            <div class="content text-center" data-aos="fade-up" >
             {!! $feature_benefits !!}
            </div>
            <div class="feature-slider owl-carousel">
                @php $f_t=0; @endphp
               @foreach($featurebenefit as $kk => $fb) 
              <div class="item" data-aos="fade-right" @if($kk>0 || $kk<4) data-aos-delay="{{ $f_t = $f_t+200 }}" @endif>
                <img class="nohover" src="{{ asset("images/featurebenefit/icon/$fb->icon") }}">
                <span>{{$fb->name}} </span>
              </div> 
              
               @endforeach
            </div>
            <div class="btn-grp text-center"><a href="{{ url('/features-benefits') }}" class="blue-btn">Explore More</a></div>
          </div>
        </div>
      </div>
          
          
      <div class="sliding-window-about-sec">
        <div class="container-fluid">
          <h4 data-aos="fade-up">About {{$title}}</h4>
             @if($short_description!='')
                {!! $short_description !!}
              @endif
            
        </div>
      </div>
           @if($other2!='')
      <div class="why-sliding-window-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
            <h4>Did You Know?</h4>
            <div class="content">
             
                {!! $other2 !!}
             
            </div>
          </div>
        </div>
      </div>
         @endif
    @include('frontend._partials.imagegallery')
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
</div>
@endsection

