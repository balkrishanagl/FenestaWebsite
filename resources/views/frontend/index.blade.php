@extends('frontend.layouts.app')
@section('content')

<style>
    #map_wrapper {
    height: 400px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>
@php
$mapdata=array();
@endphp
  <div id="fullpage" class="main-sec">
     
    @if(!$banners->isEmpty())
    <div class="banner section bg1" id="section0">
      <div class="banner-slider owl-carousel">
        @foreach($banners as $ki => $banner)
        <div class="item">
          <div class="content">
            <div class="heading heading1">
              <h1><span>{{$banner->heading}}</span>{!! $banner->sub_heading !!}</h1>
            </div> 
              @if($ki==0)
            <div class="btn-grp">
              <a href="{{ url('/window') }}" class="window">
                <img class="nohover" src="{{ asset('images/site_images/images/window-icon.png') }}">
                <img class="hover" src="{{ asset('images/site_images/images/home/window-icon-red.png') }}">
                <span>Windows</span>
              </a>
              <a href="{{ url('/door') }}" class="door">
                <img class="nohover" src="{{ asset('images/site_images/images/home/door-icon-red.png') }}">
                <img class="hover" src="{{ asset('images/site_images/images/home/door-icon-white.png') }}">
                <span>Doors</span>
              </a>
            </div>
              @endif
          </div>
          <div class="left">
            <div class="image">
              <img src="{!!asset("images/home_banner/big/$banner->home_banner_image")!!}">
            </div>            
          </div>
        </div>
        @endforeach
        {{--
        @foreach($secondndbanners as $sbanner)
        <div class="item">
          <div class="content">
            <div class="heading heading1">
              <h1><span>{{$banner->heading}}</span>{!! $banner->sub_heading !!}</h1>
            </div> 
            <div class="btn-grp">
              <a href="javascript:;" class="window">               
                <span>Explore More</span>
              </a>             
            </div>
          </div>
          <div class="left">
            <div class="image">
              <picture>
                <source srcset="{!!asset("images/home_banner/big/$banner->home_banner_image")!!}" media="(min-width:992px)">
                <source srcset="{!!asset("images/home_banner/small/$banner->home_banner_small")!!}" media="(min-width:320px)">
                <img src="{!!asset("images/home_banner/big/$banner->home_banner_image")!!}">
              </picture> 
              
            </div>            
          </div>
        </div>
        @endforeach
          --}}
        
      </div>     
      <div class="count-box">
        <div class="image"><img src="{{ asset('images/site_images/images/win-count-icon.png') }}"></div>
        <div class="count-desc active">
            <span class="count">2500666</span>
            {!! $page_description !!}
          <span class="shut"><img class="nohover" src="{{ asset('images/site_images/images/left-arrow.png') }}"><img class="hover" src="{{ asset('images/site_images/images/left-arrow-blue.png') }}"></span>
        </div>
      </div>
      <div class="feneta-logo">
        <img src="{{ asset('images/site_images/images/fenesta-logo.png') }}">
      </div>
     {{-- <div class="view-360-link">
        <div class="">
          <a href="https://www.fenesta.com/vrtour/index.htm" class="view-360"><img src="{{ asset('images/site_images/images/view-360.png') }}"></a>
        </div>
      </div>
      <div class="chat-link">
        <div class="">
          <a href="javascript:;" class="chat"><img class="for-desk" src="{{ asset('images/site_images/images/chat-icon.png') }}"><img class="for-mob" src="{{ asset('images/site_images/images/chat-icon1.png') }}"></a>
        </div>
      </div> --}}
      <div class="down-link">
        <a href="#durable-safe" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
   
    <div class="durable-safe section bg2" id="section1">
      <div class="container-fluid">        
        <div class="inner-box">
          <div class="excellance">
            <div class="wrap-box">
              <picture>
                <source srcset="{{ asset('images/site_images/images/home/polygon.png') }}" media="(min-width:768px)">
                <source srcset="{{ asset('images/site_images/images/home/polygon-mob.png') }}" media="(min-width:320px)">
                <img class="" src="{{ asset('images/site_images/images/home/polygon.png') }}">
              </picture> 
              
              <div class="slick-slider slider-for-heading">
                <div class="slick-slide"><h4>  18 Years of Excellence</h4></div>
                <div class="slick-slide"><h4>2.5+ Million Installations</h4></div>
                <div class="slick-slide"><h4>All India Presence</h4></div>
                <div class="slick-slide"><h4>Customized Solutions</h4></div>
                <div class="slick-slide"><h4>Hassle Free End to End Service</h4></div>
                <div class="slick-slide"><h4>10 Year Warranty</h4></div>
                <div class="slick-slide"><h4>365 Days Customer Support</h4></div>
              </div> 
            </div>
          </div>

          <div class="left">
            <h2>{!! $durable_heading !!}</h2>
            @if($durableend != '')
            <ul class="tabList">
                @php
                 $di=1;
                @endphp
             @foreach($durableend as $dd)
              <li>
                <div class="tabs"  data-image="{{ asset("images/services/rightimage/$dd->mainimage") }}"" id="tab{{$di}}"
                     @if($dd->id==8)
                       data-url="{{url("/features-benefits/negligible-maintenance")}}"
                     @elseif($dd->id==9)
                       data-url="{{url("/features-benefits/prevent-dust-buildup")}}"
                     @elseif($dd->id==10)
                       data-url="{{url("/features-benefits/large-views-ample-sunlight")}}"
                     @elseif($dd->id==11)
                       data-url="{{url("/features-benefits/")}}"
                     @elseif($dd->id==12)
                       data-url="{{url("/features-benefits/protection-from-storm")}}"
                    @else
                       data-url="{{url("/features-benefits/")}}"
                    @endif
                     >
                  <div class="image"><img class="nohover" alt="{!! $dd->title !!}" src="{{ asset("images/services/$dd->image") }}"><img alt="{!! $dd->title !!}" class="hover" src="{{ asset("images/services/onhover/$dd->onhoverimage") }}"></div>
                  <div class="title">{!! $dd->title !!}</div>
                </div>
              </li>
                @php
                 $di=$di+1;
                @endphp
                 @endforeach
                
              <li><a href="{{url('/features-benefits')}}" class="blue-btn white featurebene">Explore More</a></li>
            </ul> 
              
          @endif
          </div>

          <div class="right durablerignt" style="{{ asset("images/services/rightimage/$dd->mainimage") }}" >
               @php
                 $di=1;
                @endphp
             @foreach($durableend as $dd)
            <div id="tabContent{{$di}}" class="tabContent">
              <div class="content" >
                <h4>{!! $dd->contentheading !!}</h4>
                   <p>{!! $dd->content !!}</p>
                  <a href="{{url('/features-benefits')}}" class="for-mob blue-btn white">  <span>Explore More</span></a> 
              </div>
            {{--  <div class="image">              
                  <img class="" alt="{!! $dd->title !!}" src="{{ asset("images/services/rightimage/$dd->mainimage") }}">              
              </div> --}}  
            </div>
                @php
                 $di=$di+1;
                @endphp
                 @endforeach
          </div>



        </div>
      </div>
      <div class="down-link">
        <a href="#wide-range" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
      
    <div class="wide-range section bg3" id="section2">
      <div class="container-fluid">
        <div class="inner-box" style="background: #f0f6f6 url({{ asset("images/page/$exist_bthum_images") }}) no-repeat;">          
          <div class="right">
            <div class="">
              <h4>{{ $wi_subtitle }}</h4>
              <h1><span>{{ $wi_title }}</span> </h1>
                <p>{!! $wi_subcontent !!}</p>
            </div>  
              
              <div class="tab-list">
                                  <a href="{{url('/design')}}">By Design</a>
                                 <a href="{{url('/series')}}">By Series</a>
                                 <a href="{{url('/material')}}">By Material</a>
                           </div>
              
              {{--
            <div class="tab-list">
                @foreach($windowdoors as $wwk => $windowdoor)
                  <a href="javascript:;" >{{ $windowdoor->heading }}</a>
               @endforeach
            </div>    --}}       
          </div>
          <div class="left" style="display: none;">
            <div class="wide-range-list" id="by-design" >
              <div class="image-box">
                  <a href="{{url('/design')}}">   <div class="image"><img src="{{ asset('images/site_images/images/home/wide-range1.jpg') }}"></div></a>
              </div>             
            </div>
            <div class="wide-range-list" id="by-series">
              <div class="image-box">
                  <a href="{{url('/series')}}"><div class="image"><img src="{{ asset('images/site_images/images/home/wide-range1.jpg') }}"></div></a>
              </div> 
            </div>
            <div class="wide-range-list" id="by-material">
              <div class="image-box">
                  <a href="{{url('/material')}}"><div class="image"><img src="{{ asset('images/site_images/images/home/wide-range1.jpg') }}"></div></a>
              </div> 
            </div>
          </div>          
        </div>      
      </div>    
      <div class="down-link">
        <a href="#quality-innovate" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>

    <div class="quality-innovate section bg4" id="section3">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2>{{$solu_heading}}</h2>
            <a href="{{url('/quality-innovation')}}" class="blue-btn">Explore More</a>
          </div>
          <div class="before-mob">
            <div class="quality-innovate-slider owl-carousel">
                @foreach($Solutions as $sk => $solution)

                @if($sk==0 || $sk==4 || $sk==8)
                    <div class="item">
                @endif
                <div class="box">
                  <div class="left"><h6>{!! $solution->title !!}</h6></div>
                  <div class="right"><img class="" src="{{ asset("images/solutions/$solution->mainimage") }}"></div>
                </div>
              @if($sk==3 || $sk==7 || $sk==11)
              </div> 
              @endif
            @endforeach
              
            </div>
          </div>
          <div class="after-mob text-center">
            <div class="quality-innovate-slider owl-carousel">
                 @foreach($Solutions as $sk => $solution)
              
              <div class="item">
                <div class="box">
                  <div class="left">
                    <h6>{!! $solution->title !!}</h6>
                    <div class="content">
                      <a href="{{url('/quality-innovation')}}">Read More</a>
                    </div>
                  </div>
                  <div class="right"><img class="" src="{{ asset("images/solutions/$solution->mainimage") }}"></div>
                </div>  
              </div>
             
                @endforeach
            </div>
               <div class="view-all for-mob"><a href="{{url('/quality-innovation')}}" class="blue-btn"> view All</a></div>
          </div>

        </div>
      </div>
      <div class="down-link">
        <a href="#location" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>

     @if(!$partnerShowroom->isEmpty())
    <div class="locate-sec section bg3" id="section2">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><span class="for-desk">{{ $locateus_heading }}</span><span class="for-mob">Find Us Nearby You</span></h2>


            <div class="slelect-box">
           
              <div class="form-group">
                <label>Country</label>
                <div class="styled_select">
                  <select class="form-control">
                     <option value="">India</option>
                  </select>
                </div>                
              </div>

              <div class="form-group">
                <label>State</label>

                <div class="styled_select">
                  <select class=" form-control" id="oostate">
                   <option value="">Select State</option>
                    @foreach($stateoshowrooms as $sts)
                       <option @if($c_state==$sts->state) selected @endif value="{{$sts->state}}">{{$sts->state}}</option>
                      @endforeach
                  </select>
                </div> 
              </div>


              <div class="form-group">
                <label>City</label>
                <div class="styled_select">
                  <select class="form-control" id="oocity">
                      <option value="">Select City</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Block</label>
                <div class="styled_select">
                  <select class="form-control" id="ooblock">
                      <option value="">Select Block</option>
                  </select>
                </div>
              </div> 
            </div>
          </div>
          <div class="map">
                <div id="map_wrapper">
                   <div id="map_canvas"></div>
                </div>
            </div>
          <div class="ajax-data">
          <div class="address-slider owl-carousel">
              @foreach($partnerShowroom as $ps)
              
              @php  $mapdata[]=array(0=>$ps->city,$ps->lat,$ps->long,"$ps->address,$ps->city,$ps->state","Partner Showroom");
              @endphp
              
              
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
                  <a href="mailto:{{ $ps->email }}">{{ $ps->email }}</a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="{{ asset('images/site_images/call-icon.png') }}"></div>
                <div class="right">
                  <a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a>
                </div>
              </div>
            </div>
              @endforeach
          </div>
          </div>
          <div class="view-showroom"><a href="javascript:;" class="blue-btn" id="view-more">View More Showrooms</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#unmatch-service" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
      @endif
      
      
    <div class="unmatch-service section bg6" id="section5">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="left">
            <div class="heading">
              <h2>{{$dcm_heading}}</h2>
                <h4>  {{ strip_tags(htmlspecialchars_decode($dcm_content)) }} </h4>
            </div>
             
             @if(!$servicesend->isEmpty())
            <ul class="image-box">
                @foreach($servicesend as $sk => $servicee)
              <li class="">
                <div class="image"><img src="{{ asset("images/services/$servicee->image") }}"></div>
                <div class="title">{!! $servicee->title !!}</div>
              </li>
                @endforeach
             
            </ul>
              @endif
          {{--  <a href="javascript:;" class="blue-btn white">Explore More</a> --}}
          </div>
        {{--  <div class="right">
            <img src="{{ asset("images/page/$exist_dcm_leftimage") }}">
          </div> --}}
        </div>
      </div>
      <div class="down-link">
        <a href="#client-say" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
      
    @if(!$testimonials->isEmpty())
    <div class="client-sec section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading text-center">
            <h2>{{ $cltsat_heading }} <a href="{{ url('/customer-reviews') }}" class="blue-btn"> view All</a></h2>
            <!-- <h5>{{ $cltsat_subheading }}</h5> -->
          </div>
          <div class="client-slider owl-carousel">
               @foreach($testimonials as $testimonial)
            <div class="item">
              <div class="image">
                <img src="{!!asset("images/testimonials/reference/$testimonial->reference_image")!!}">
                  @if(!empty($testimonial->youtube_url))
                <span class="play" data-video-id="{{ $testimonial->youtube_url }}"><img src="{{ asset('images/site_images/play.png') }}"></span>
                  @endif
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
          <div class="view-all for-mob"><a href="{{ url('/customer-reviews') }}" class="blue-btn"> view All</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#visual-design" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif
    <div class="visual-sec section bg8" id="section7">
      <div class="inner-box"> 
        <div class="container-fluid">
          <div class="slider-for-visual slick-slider">
            <div class="image">
                @if($exist_banner_images)
                  @foreach($exist_banner_images as $bi)
 
              <picture>
                <source srcset="{{ asset('images/page/').'/'.$bi }}" media="(min-width:768px)">
                <source srcset="{{ asset('images/page/').'/'.$bi }}" media="(min-width:320px)">
                <img src="{{ asset('images/page/').'/'.$bi }}">
              </picture> 
                 @endforeach          
               @endif   
                
            </div> 
            <div class="content">
              <div class="heading"><h3>{!! $visdsg_heading !!}</h3></div>
              <a href="https://www.fenesta.com/VisualizeDesign/index.html" class="blue-btn">Visualize Now</a>
                <ul class="dwnlist">
					<li><a href="{{ $datasettings['playstore'] }}"><img src="{{ asset('images/site_images/images/g-play-store.png')}}"></a></li>
					<li><a href="{{ $datasettings['appstore'] }}"><img src="{{ asset('images/site_images/images/app-store.png')}}"></a></li>
				</ul>
            </div>         
          </div>
        </div>
      </div>
      <div class="bottom-strip" style="display: none;">
        <div class="container-fluid">
          <div class="box">
            <h6>Download The App Now</h6>
            <a href="javascript:;"><img src="{{ asset('images/site_images/images/g-play-store.png') }}"></a>
            <a href="javascript:;"><img src="{{ asset('images/site_images/images/app-store.png') }}"></a>
          </div>
        </div>
      </div>

      <div class="down-link">
        <a href="#image-gallery" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>

    </div>
      
    @if(!$gallerys->isEmpty())
    
    <div class="image-gallery section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2>{{ $imgglry_heading }}</h2>
            <a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a>
          </div>
          <div class="image-gallery-slider owl-carousel">
            @foreach($gallerys as $gallery)
         
            <div class="item">
              <div class="image"><img src={!!asset("images/gallery_images/$gallery->image")!!}></div>
              <div class="title">{!! $gallery->heading !!}</div>
            </div>
            @endforeach  
          </div>
         {{-- <div class="for-mob">
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
              <div class="slick-slide"><img src="{{ asset('images/site_images/gallery-thumb.jpg') }}"></div>
                
            </div> 
          </div> --}}
          <div class="experinece-ar for-mob"><a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#awards" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div>
    </div>
    @endif

    <div class="latest-sec section bg10" id="section9">
      <div class="container-fluid">
        <div class="inner-box">
            
       @if(!$fenestaworlds->isEmpty())
          <div class="heading">
            <h2>{{ $fw_heading }}</h2>
            <a href="{{url('/awards-accreditations')}}" class="blue-btn">Read All</a>
          </div>
          <div class="latest-update">
              
            @foreach($fenestaworlds as $fenestaworld)
            <div class="item">
             <div class="image"><img src="{!!asset("images/awards/$fenestaworld->image")!!}"></div>
              <div class="content">
               {{-- <h6>{{ $fenestaworld->title }}</h6> --}}
                <h6>{{ strip_tags($fenestaworld->description) }} </h6>
                {{-- <a href="javascript:;" class="read">Read More</a> --}}
              </div>
            </div>
            @endforeach 
          </div>
            
          <div class="read-all for-mob"><a href="{{url('/awards-accreditations')}}" class="blue-btn">View All</a></div>
        @endif
            
            
            @if(!$clicndaar->isEmpty())
          <div class="bottom">
            <div class="clientele-sec">              
              <div class="heading">
                 
                <h2> {{ $cli_heading }}</h2>
                <a href="{{url('/showcase/clientele')}}" class="blue-btn">View All</a>
              </div>
              <div class="for-desk">
                <div class="clientele-slider owl-carousel">
                     @if($clicndaar)
                       @foreach($clicndaar as $exim)
                  <div class="item"><img src="{{  asset('images/gallery_images/').'/'.$exim->image }}"></div>
                       @endforeach
                     @endif
                    
                </div>
              </div>
              <div class=" for-mob">
                  @if($clicndaar)
                <div class="clientele-slider-mob owl-carousel">
                    
                       @foreach($clicndaar as $exim)
                        <div class="item">
                    <ul>
                      <li><img src="{{  asset('images/gallery_images/').'/'.$exim->image }}"></li>
                    </ul>                  
                  </div>
                     @endforeach
                  
                </div>
                    @endif
              </div>
            </div>            
          </div>
            @endif
        </div>
      </div>
      <div class="down-link">
        <a href="#latest-blog" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
     
      @if(!$blogs->isEmpty())
    <div class="home-latest-blog-sec section bg11" id="section10">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2>{{ $blog_heading }}</h2>
            <a href="{{ url('/blog') }}" class="blue-btn">Read All</a>
          </div> 
          <div class="home-latest-blog-list">
              @foreach($blogs as $bk => $blog)
               @if($bk==0)
            <div class="left">
              <div class="item">
                <div class="image"><img src="{{ asset("images/$blog->image") }}"></div>
                <div class="content">
                  <div class="date"><img src="{{ asset('images/site_images/images/blog/calender.png') }}">{{date("d-m-
                      Y",strtotime($blog->posted_date))}}</div>
                  <h4>{{-- substr(strip_tags($blog->name), 0, 20) --}} {{$blog->name}}</h4>
                  <p>{{$blog->short_description}}</p>
                  <a href="{{App\Models\BlogPostModel::getPostUrl($blog->slug)}}" class="blue-btn">Read More</a>
                </div>
              </div>
            </div>
              @endif
              @if($bk>0)
               @if($bk==1)
            <div class="right">
               @endif
              <div class="item @if($bk==1) blog_first_box_img @endif ">
                <a href="{{App\Models\BlogPostModel::getPostUrl($blog->slug)}}">
                  <div class="image"><img src="{{ asset("images/$blog->image") }}"></div>
                  <div class="content">                  
                      <h4>{{ $blog->name }}</h4>
                    <div class="date"><img src="{{ asset('images/site_images/images/calender1.png') }}">{{date("d-m-
                      Y",strtotime($blog->posted_date))}}</div>
                      
                    <a href="{{App\Models\BlogPostModel::getPostUrl($blog->slug)}}" class="blue-btn">Read More</a>
                  </div>
                </a>
              </div>
                @if($bk==4)
            </div>
                @endif
                @endif
              @endforeach
            <div class="home-latest-blog-view-all for-mob"><a href="{{ url('/blog') }}" class="blue-btn">Read All</a></div>
          </div>
        </div>         
      </div>
      <div class="down-link">
        <a href="#customer-appreciation" data-id="wide-range">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/images/drop-down.png') }}">
        </a>
      </div>
    </div>
     @endif
   
    
  
    <div class="customer-appreciation-sec section bg10" id="section9">
      <div class="container-fluid">
        <div class="inner-box">
            {{--
           @if(!$appreciations->isEmpty())
          <div class="slider-box">
            <div class="heading"><h4 class="text-center">{{ $cusapp_heading }}
              <a href="{{url('/customer-reviews')}}" class="blue-btn">View All</a></h4>
              </div>
            <div class="customer-apprec-slider owl-carousel">
            @foreach($appreciations as $appreciation)
              <div class="item">
                <div class="heading">
                  <div class="image"><img src="{!!asset("images/appreciation/$appreciation->image")!!}"><span></span></div>
                  <div class="right">
                    <div class="name">{{ $appreciation->name }}</div>
                    <div class="date">
                        @if($appreciation->city!='') {{$appreciation->city}} @else {{date("d M Y",strtotime($appreciation->created_at))}} @endif
                       
                       <img src="{{ asset('images/site_images/globe.png') }}"> 
                      </div>
                  </div>
                </div>
                  <p class="addReadMore showlesscontent">{{ strip_tags($appreciation->description) }} </p>
              </div>
            @endforeach           
            </div> 
            <div class="cutomer-view-all for-mob"><a href="{{url('/customer-reviews')}}" class="blue-btn">View All</a></div>
          </div>
          @endif
            --}}
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
<script>
          
 $('#oostate').change(function(){
//     alert("ghjgh");
    var url = "{{url('/')}}/getlocateusofficehome";//should return json with a list of cities only
    var std = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
     
     var urlcity = "{{url('/')}}/getcitybystatepartner";
  
    $.ajax({
        url:urlcity,
        data:data,
        dataType:'html',
        success: function(items){
            $('#oocity').html(items);
            $('#oocity').change();
        }
    });
}).change();
 $('#oocity').change(function(){
//     alert("ghjgh");
    var url = "{{url('/')}}/getlocateuscityofficehome";//should return json with a list of cities only
    var std = $("#oostate").find(':selected').val();
    var city = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std , city:city};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
     
     var urlblock = "{{url('/')}}/getblockbycitypartner";
  
    $.ajax({
        url:urlblock,
        data:data,
        dataType:'html',
        success: function(items){
            $('#ooblock').html(items);
        }
    });
     
}).change();
    
 $('#ooblock').change(function(){
//     alert("ghjgh");
    var url = "{{url('/')}}/getlocateusblockofficehome";//should return json with a list of cities only
    var std = $("#oostate").find(':selected').val();
    var city = $("#oocity").find(':selected').val();
    var block = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std , city:city, block:block};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
   
     
});
</script>

<script>
$(document).ready(function() {
  $('.tabContent').css("display", "none");
  $('#tabContent1').css("display", "block");
  $('.tabs').on('click', function() {
    var tabId = $(this).attr('id');
    var matches = tabId.match(/(\d+)/);
    if (matches) {
//        alert(matches);
        var url = $(this).attr('data-url');
        var imageUrl = $(this).attr('data-image');
//         alert(url);
      $('.featurebene').attr('href',url)
      $('.durablerignt').css('background-image', 'url(' + imageUrl + ')');
      $('.tabContent').css("display", "none");
      $('#tabContent' + matches[0]).css("display", "block");
    } else {
      $('.tabContent').css("display", "none");
    }
  })
});
    
    
    
    
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDtHKuJRxHlOpQlfS_OUWs09CeY8lnVmU4&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {

    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        Zoom: 7,
        center: new google.maps.LatLng(23.1633477,79.9589574),
    };
    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
     // Multiple Markers
	var markers = {!!json_encode($mapdata)!!};
//	var markers =	jQuery.parseJSON(markersj);
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i <= markers.length; i++ ) {
//        console.log(markers[i][1]);
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);



        // Info Window Content
        var address = markers[i][3];
        var heading = markers[i][4];

        if(heading == 'Signature Studios')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-blue.png';
        }else if(heading == 'Partner Showroom')
        {
          var iconimg = 'images/site_images/images/locate/tooltip.png';
        }else if(heading == 'Fenesta Offices')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-purple.png';
        }
        else if(heading == 'Signature Studios')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-purple.png';
        }
		
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            icon: iconimg
        });


		var infoWindowContent =  '<div class="info_content"><b><p>'+heading+'</p></b><p>'+address+'</p></div>';
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () { 
               infoWindow.setContent('<b>'+markers[i][4]+'</b><br />'+markers[i][3]);
               //infoWindow.setContent(infoWindowContent);
               infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script>
@endsection
     