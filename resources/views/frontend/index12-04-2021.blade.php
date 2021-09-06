@extends('frontend.layouts.app')
@section('content')
  <div id="fullpage" class="main-sec">
    @if($banners != '')
    <div class="banner section bg1" id="section0">
      <div class="banner-slider owl-carousel">
      @foreach($banners as $banner)
        <div class="item">
          <div class="content">
            <div class="">
              <div class="heading heading1">
                <h1><span>{{$banner->heading}}</span></h1>
                <!--- Text change on hover ------->
                <h4><span>{{$banner->hover_sub_heading}}</span></h4>
                <!-- -->
              </div>
              <div class="heading2 heading">
                <h4><span>{{$banner->sub_heading}}</span></h4>
                <!--- Text change on hover ------->
                <h1><span>{{$banner->hover_heading}}</span></h1>
                <!-- -->
              </div>
            </div>
            <div class="btn-grp for-desk">
              <a href="{{ url('/windows') }}"><img src="{{ asset('images/site_images/window-icon.png') }}"><span>Windows</span></a>
              <a href="{{ url('/doors') }}"><img src="{{ asset('images/site_images/door-icon.png') }}"><span>Doors</span></a>
            </div>
          </div>
          <div class="left">
            <div class="image">
              <span class="big"><img src="{!!asset("images/home_banner/big/$banner->home_banner_image")!!}"></span>
              <span class="small"><img src="{!!asset("images/home_banner/small/$banner->home_banner_small")!!}"></span>
            </div>            
          </div>
        </div>
      @endforeach
      @foreach($secondndbanners as $sbanner)
        <div class="item">
          <div class="content">
            <div class="">
              <div class="heading heading1">
                <h1><span>{{$sbanner->heading}}</span></h1>
                <!--- Text change on hover ------->
                <h4><span>{{$sbanner->hover_sub_heading}}</span></h4>
                <!-- -->
              </div>
              <div class="heading2 heading">
                <h4><span>{{$sbanner->sub_heading}}</span></h4>
                <!--- Text change on hover ------->
                <h1><span>{{$sbanner->hover_heading}}</span></h1>
                <!-- -->
              </div>
            </div>
            <div class="btn-grp for-desk">
              <a href="javascript:;"><img src="{{ asset('images/site_images/window-icon.png') }}"><span>Windows</span></a>
              <a href="javascript:;"><img src="{{ asset('images/site_images/door-icon.png') }}"><span>Doors</span></a>
            </div>
          </div>
          <div class="left">
            <div class="image">
              <span class="big"><img src="{!!asset("images/home_banner/big/$sbanner->home_banner_image")!!}"></span>
              <span class="small"><img src="{!!asset("images/home_banner/small/$sbanner->home_banner_small")!!}"></span>
            </div>            
          </div>
        </div>
      @endforeach
      </div>
      <div class="btn-grp for-mob">
        <a href="javascript:;"><img src="{{ asset('images/site_images/window-icon.png') }}"><span>Windows</span></a>
        <a href="javascript:;"><img src="{{ asset('images/site_images/door-icon.png') }}"><span>Doors</span></a>
      </div>
      <div class="count-box">
        <div class="image"><img src="{{ asset('images/site_images/win-count-icon.png') }}"></div>
        <div class="count-desc active">
          {!! $page_description !!}
          <span class="shut"><img class="nohover" src="{{ asset('images/site_images/left-arrow.png') }}"><img class="hover" src="{{ asset('images/site_images/left-arrow-blue.png') }}"></span>
        </div>
      </div>
      <div class="view-360-link">
        <div class="">
          <a href="https://www.fenesta.com/vrtour/index.htm" class="view-360"><img src="{{ asset('images/site_images/view-360.png') }}"></a>
        </div>
      </div>
      <div class="chat-link">
        <div class="">
          <a href="javascript:;" class="chat"><img class="for-desk" src="{{ asset('images/site_images/chat-icon.png') }}"><img class="for-mob" src="{{ asset('images/site_images/chat-icon1.png') }}"></a>
        </div>
      </div>
      <div class="down-link">
        <a href="#wide-range" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
    @if($windowdoors != '')
    <div class="wide-range section bg2" id="section1">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="for-mob right">
            <h4>{{ $wi_subtitle }} </h4>
            <h1><span>{{ $wi_title }}</span> <a href="javascript:;"><img class="nohover" src="{{ asset('images/site_images/next.png') }}"><img class="hover" src="{{ asset('images/site_images/next-blue.png') }}"></a></h1>
            <p>{!! $wi_subcontent !!}</p>
          </div>
          <div class="left">
            @foreach($windowdoors as $wk => $windowdoor)
            <div class="wide-range-list" id="{{ str_replace(' ','-',strtolower($windowdoor->heading)) }}" @if($wk==0) style="display: block;" @endif >
              <div class="image-box">
                <div class="image" id="window{{$wk}}"><img src={!!asset("images/windowdoor/$windowdoor->window_image")!!}></div>
                <div class="image" id="door{{$wk}}" style="display: block;"><img src={!!asset("images/windowdoor/$windowdoor->door_image")!!}></div>
              </div>
              <div class="image-tab">
                <a href="#window{{$wk}}"><img src="{{ asset('images/site_images/small-door.png') }}"><span> windows</span></a>
                <a href="#door{{$wk}}" class="active"><img src="{{ asset('images/site_images/small-door.png') }}"><span> doors</span></a>
              </div>
            </div>
            @endforeach
          </div>
          <div class="right">
            <div class="for-desk">
              <h4>{{ $wi_subtitle }}</h4>
              <h1><span>{{ $wi_title }}</span> <a href="javascript:;"><img class="nohover" src="{{ asset('images/site_images/next.png') }}"><img class="hover" src="{{ asset('images/site_images/next-blue.png') }}"></a></h1>
              <p>{!! $wi_subcontent !!}</p>
            </div>
            <div class="line-slider">
              <span class="blu-line-auto"></span>
              <span class="blu-line"></span>
              <ul>
                <li class="" ><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
              </ul>
            </div>
            <div class="tab-list">
                @foreach($windowdoors as $windowdoor)
                  <a href="javascript:;" class="">{{ $windowdoor->heading }}</a>
                @endforeach
              
            </div>
            <h5>{!! $wi_content !!}</h5>
            <a href="javascript:;" class="blue-btn">Explore</a>
          </div>
        </div>      
      </div>
     <div class="wide-range-bottom">
        <div class="container-fluid">
          <div class="bottom">
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon1.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon1-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon1-white.png') }}">
              <span>Insulation against <br>Pollution</span>
            </div>
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon2.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon2-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon2-white.png') }}">              
              <span>Dust & Noise <br>Insulation</span>
            </div>
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon3.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon3-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon3-white.png') }}">
              <span>Weather <br>Resistant</span>
            </div>
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon4.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon4-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon4-white.png') }}">
              <span>Energy <br>Saving</span>
            </div>
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon5.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon5-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon5-white.png') }}">
              <span>Elegant <br>Looks</span>
            </div>
            <div class="item">
              <img class="nohover" src="{{ asset('images/site_images/range-icon6.png') }}">
              <img class="hover" src="{{ asset('images/site_images/range-icon6-blue.png') }}">
              <img class="mob-image" src="{{ asset('images/site_images/range-icon6-white.png') }}">
              <span>10 years <br>warranty</span>
            </div>
          </div>
        </div>
      </div> 
      <div class="down-link">
        <a href="#location" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
      @if($partnerShowroom != '')
    <div class="locate-sec section bg3" id="section2">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><span class="for-desk">{{ $locateus_heading }}</span><span class="for-mob">Find Us Nearby You</span></h2>
            <div class="slelect-box">
              <div class="form-group">
                <label>Select Type</label>
                <select class="select">
                    @foreach($partnerShowroom as $ps)
                     <option value="{{ $ps->id }}">{{ $ps->city }}-{{ $ps->dealer_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Country</label>
                <select class="select">
                  @foreach($partnerShowroom as $ps)
                     <option value="{{ $ps->id }}">{{ $ps->locality }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>State</label>
                <select class="select">
                  @foreach($partnerShowroom as $ps)
                     <option value="{{ $ps->id }}">{{ $ps->state }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>City</label>
                <select class="select">
                   @foreach($partnerShowroom as $ps)
                     <option value="{{ $ps->id }}">{{ $ps->city }}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="map">
              <img src="{{ asset('images/site_images/map.jpg') }}">
            </div>
          <div class="address-slider owl-carousel">
              @foreach($partnerShowroom as $ps)
            <div class="item">
              <div class="address">
                <div class="image"><img src="{{ asset('images/site_images/loc-icon.png') }}"></div>
                <div class="right">
                  <h6>{{ $ps->city }}</h6>
                  <p>{!! $ps->address !!}</p>
                </div>
              </div>
              <div class="email">
                <div class="image"><img src="{{ asset('images/site_images/email.png') }}"></div>
                <div class="right">
                  <a href="mailto:response@fenesta.com">{{ $ps->email }}</a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="{{ asset('images/site_images/call-icon.png') }}"></div>
                <div class="right">
                  <a href="tel:18001029880">{{ $ps->phone }}</a>
                </div>
              </div>
            </div>
              @endforeach
          </div>
          <div class="view-showroom"><a href="javascript:;" class="blue-btn" id="view-more">View More Showrooms</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#client-say" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
      @endif
    @if($testimonials != '')
    <div class="client-sec section bg4" id="section3">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading text-center">
            <h2>{{ $cltsat_heading }} <a href="javascript:;" class="blue-btn"> view All</a></h2>
            <h5>{{ $cltsat_subheading }} </h5>
          </div>
          <div class="client-slider owl-carousel">
          @foreach($testimonials as $testimonial)
            <div class="item">
              <div class="image">
                <img src="{!!asset("images/testimonials/reference/$testimonial->reference_image")!!}">
                <span class="play" data-video-id="{{ $testimonial->youtube_url }}"><img src="{{ asset('images/site_images/play.png') }}"></span>
              </div>
              <div class="desc">
                <div class="pic"><img src="{!!asset("images/testimonials/user/$testimonial->user_image")!!}"></div>
                <div class="right">
                  <h6>{{$testimonial->name}}</h6>
                  <p>{{$testimonial->city}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="view-all for-mob"><a href="javascript:;" class="blue-btn"> view All</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#solution" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
    <div class="solution-sec section bg5" id="section4">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="left">
            <h2>{{ $solu_heading }}</h2>
           {!! $solu_content !!}
            <div class="slick-slider slider-for-heading">
                @foreach($Solutions as $solution)
                  <div class="slick-slide"><h1>{{ $solution->title }}</h1> {!! $solution->description !!} </div>
                @endforeach
            </div>  
            <div class="for-mob solution-list">
              <ul>
                   @foreach($Solutions as $solution)
                <li>
                  <a href="javascript:;">
                    <img src='{{ asset("images/solutions/$solution->image") }}'>
                    <div class="title">
                      {{ $solution->title }}
                      <span><img src="{{ asset('images/site_images/arrow.png') }}"></span>
                    </div>
                  </a>
                </li>
                   @endforeach
              </ul>
            </div>
            <a href="javascript:;" class="blue-btn">Explore More</a>       
          </div>
          <div class="right">
            <div class="slick-slider slider-nav-gallery">
                @foreach($Solutions as $solution)
              <div class="slick-slide"><span><img src='{{ asset("images/solutions/$solution->image") }}'></span></div>
                 @endforeach
            </div>          
          </div>
        </div>
      </div>
      <div class="down-link">
        <a href="#visual-design" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    <div class="visual-sec section bg6" id="section5">
      <div class="inner-box">        
        <div class="content">
          <div class="container-fluid">
             <div class="haeding"><h3>{!! $visdsg_heading !!}</h3></div>
              <h4>{!! $visdsg_content !!}</h4> 
             <a href="javascript:;" class="blue-btn">Visualize Now</a>
          </div>
        </div>
         
        <div class="slider-for-visual slick-slider">
            @if($exist_banner_images)
            @foreach($exist_banner_images as $bi)
          <div class="image">
            <picture>
              <source src="{{ asset('images/page/').'/'.$bi }}" media="(min-width:768px)">
              <source src="{{ asset('images/page/').'/'.$bi }}" media="(min-width:320px)">
              <img src="{{ asset('images/page/').'/'.$bi }}">
            </picture>            
          </div>
            @endforeach          
            @endif          
        </div>
      </div>
      <div class="visual-now for-mob"><a href="javascript:;" class="blue-btn">Visualize Now</a></div>
      <div class="down-link">
         <a href="#image-gallery" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
     {{--
    <div class="visual-sec section bg6" id="section5">
      <div class="inner-box">        
        <div class="content">
          <div class="container-fluid">
             <div class="haeding"><h3>{!! $visdsg_heading !!}</h3></div>
              <h4>{!! $visdsg_content !!}</h4> 
             <a href="javascript:;" class="blue-btn">Visualize Now</a>
          </div>
        </div>
        <div class="slider-for-visual slick-slider">
          @if($exist_banner_images)
            @foreach($exist_banner_images as $bi)
          <div class="image">
            <picture>
              <source src="{{ asset('images/page/').'/'.$bi }}" media="(min-width:768px)">
              <source src="{{ asset('images/page/').'/'.$bi }}" media="(min-width:320px)">
              <img src="{{ asset('images/page/').'/'.$bi }}">
            </picture>            
          </div>
            @endforeach          
            @endif             
        </div>
      </div>
      <div class="bottom-strip">
        <div class="container-fluid">
          <div class="box">
            <h6>Download The App Now</h6>
            <a href="javascript:;"><img src="images/g-play-store.png"></a>
            <a href="javascript:;"><img src="images/app-store.png"></a>
          </div>
        </div>
      </div>
      <div class="visual-now for-mob"><a href="javascript:;" class="blue-btn">Visualize Now</a></div>

      <div class="down-link">
        <a href="#image-gallery" data-id="wide-range">
          <img src="images/drop-down.png">
          <img src="images/drop-down.png">
        </a>
      </div>

    </div>
--}}
    @if($gallerys != '')
    <div class="image-gallery section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2>{{ $imgglry_heading }}</h2>
            <a href="javascript:;" class="blue-btn">View More</a>
          </div>
          <div class="image-gallery-slider owl-carousel">
            @foreach($gallerys as $gallery)
         
            <div class="item">
              <div class="image"><img src={!!asset("images/gallery_images/$gallery->image")!!}></div>
              <div class="title">{!! $gallery->heading !!}</div>
            </div>
            @endforeach  
          </div>
          <div class=" for-mob">
            <div class="slick-image-gallery slick-slider">
                 @foreach($gallerys as $gallery)
         
              <div class="slick-slide">
                <img src={!!asset("images/gallery_images/$gallery->image")!!}>
                <div class="title">{!! $gallery->heading !!}</div>
              </div>
                @endforeach  
            </div> 
            <div class="slick-image-gallery-thumb slick-slider">
                  @foreach($gallerys as $gallery)
         
              <div class="slick-slide"><img src={!!asset("images/gallery_images/$gallery->image")!!} ></div>
                  @endforeach  
             {{-- <div class="slick-slide"><img src="{{ asset('images/site_images/gallery-thumb.jpg') }}"></div> --}}
                
            </div> 
          </div>
          <div class="experinece-ar for-mob"><a href="javascript:;" class="blue-btn">View More</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#latest-updates" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
    <div class="latest-sec section bg8" id="section7">
      <div class="container-fluid">
        <div class="inner-box">
            
          @if($fenestaworlds != '')

          <div class="heading">
            <h2>{{ $fw_heading }}</h2>
            <a href="javascript:;" class="blue-btn">Read All</a>
          </div>
          <div class="latest-update">
              
            @foreach($fenestaworlds as $fenestaworld)

            <div class="item">
              <div class="image"><img src="{!!asset("images/fenesta_world/$fenestaworld->image")!!}"></div>
              <div class="content">
                <h6>{{ $fenestaworld->title }} </h6>
                <p>{!! $fenestaworld->description !!} </p>
                <a href="javascript:;" class="read">Read More</a>
              </div>
            </div>
              @endforeach  
          </div>
             
          @endif
          <div class="read-all for-mob"><a href="javascript:;" class="blue-btn">View All</a></div>
          <div class="bottom">
            <div class="clientele-sec">
              <h4>{{ $cli_heading }}</h4>
              <div class="for-desk">
                  @if($exist_slider_images)
                <div class="clientele-slider owl-carousel">
                    @foreach($exist_slider_images as $exim)
                    
                  <div class="item"><img src="{{  asset('images/page/').'/'.$exim }}"></div>
                    @endforeach
                </div>
                  @endif
              </div>
              <div class=" for-mob">
                  @if($exist_slider_images)
                <div class="clientele-slider-mob owl-carousel">
                    @foreach($exist_slider_images as $exim)
                  <div class="item">
                    <ul>
                      <li><img src="{{  asset('images/page/').'/'.$exim }}"></li>
                      
                    </ul>                  
                  </div>   
                     @endforeach

                </div>
                  @endif
              </div>
            </div>
            <div class="dcm-sec">
              <h4>{{ $dcm_heading }}</h4>
              <div class="dcm-box">
                <div class="left"><img src="{{  asset('images/page/').'/'.$exist_dcm_leftimage }}"></div>
                <div class="right">
                  <div class="dcm-logo"><img src="{{  asset('images/page/').'/'.$exist_dcm_logo }}" ></div>
                  {!! $dcm_content !!}
                  <a href="javascript:;" class="blue-btn">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="down-link">
        <a href="#social-feed" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
{{--
    <div class="social-sec section bg9" id="section8">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="left">
            <h4>Fenesta - India's No 1. <br> Windows and Doors Brand</h4>
            <p>We are India's largest windows and doors brand, and a part of Rs 7771 crore, 1889 Est. DCM Shriram Group acknowledged for its transparent work culture and diversity. Fenesta today boasts of sales and service presence in more than 327 cities through twenty sales offices, four factories, nine Signature Studios, 178 Channel Partner showrooms and a strong direct sales force of more than 500 executives.</p>
            <p>Empowered with knowledge of India's extreme conditions, Fenesta has designed UPVC and System Aluminium Windows and Doors that are able to withstand India's extreme climate. Our high performance products add an architectural dimension to the home and keep out street noise, dust and pollution, rain and wind. Our solutions outlast buildings.</p>
            <a href="javascript:;" class="blue-btn">Know More</a>
          </div>
          <div class="right">
            <div class="heading">
              <h4>Social Post</h4>
              <ul>
                <li><a href="#facebook" class="active"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#linked-in"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
            <div class="social-feed">
              <div class="social-box" id="facebook" style="display: block;">
                <div class="social-feed-slider owl-carousel">
                  <div class="item"><img src="{{ asset('images/site_images/facebook.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/facebook.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/facebook.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/facebook.jpg') }}"></div>
                </div>
              </div>
              <div class="social-box" id="twitter">
                <div class="social-feed-slider owl-carousel">
                  <div class="item"><img src="{{ asset('images/site_images/twitter.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/twitter.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/twitter.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/twitter.jpg') }}"></div>
                </div>
              </div>
              <div class="social-box" id="linked-in">
                <div class="social-feed-slider owl-carousel">
                  <div class="item"><img src="{{ asset('images/site_images/linkedin.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/linkedin.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/linkedin.jpg') }}"></div>
                  <div class="item"><img src="{{ asset('images/site_images/linkedin.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="down-link">
        <a href="#customer-appreciation" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
--}}
    <div class="customer-appreciation-sec section bg10" id="section9">
      <div class="container-fluid">
        <div class="inner-box">
          @if($appreciations != '')
          <div class="slider-box">
            <div class="heading"><h4 class="text-center">{{ $cusapp_heading }}</h4></div>
            <div class="customer-apprec-slider owl-carousel">
            @foreach($appreciations as $appreciation)
              <div class="item">
                <div class="heading">
                  <div class="image"><img src="{!!asset("images/appreciation/$appreciation->image")!!}"><span></span></div>
                  <div class="right">
                    <div class="name">{{ $appreciation->name }}</div>
                    <div class="date">{{ date('j F Y', strtotime($appreciation->created_at)) }} <img src="{{ asset('images/site_images/globe.png') }}"></div>
                  </div>
                </div>
                {!! $appreciation->description !!}
              </div>
            @endforeach           
            </div> 
            <div class="cutomer-view-all for-mob"><a href="javascript:;" class="blue-btn">View All</a></div>
          </div>
          @endif
          @if($about_heading != '' || $about_content != '')
          <div class="content">
            <h4 class="text-center">{{ $about_heading }} </h4>
          {!! $about_content !!}
          </div>
          @endif
        </div>
      </div>
      <div class="down-link">
        <a href="#footer" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
@endsection
     