@extends('frontend.layouts.template_page')
@section('content')
@php $type_officce = array(1=>'Head Office',2=>'Sales Office and Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories'); 
$mapdata=array();
$map_c=0; 

@endphp
<style>
    #map_wrapper {
    height: 400px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>
        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
            {{--
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
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
        
          <div class="heading"><div class="container-fluid">        @if(!empty($pageData->page_title))
          <h1>   {!! $pageData->page_title !!}</h1>
        @else
          <h1>Locate Us</h1>
        @endif
           </div></div> 
      </div> --}}
     {{--  <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
            @if($content)
              {!! $content !!}
            @endif
          </div>
          <div class="explore-more">
            <a href="javascript:;">Explore More <span><img src="{{ asset('images/site_images/images/about/explore-more.png')}}"></span></a>
          </div>
        </div>
      </div>
            --}}
      <div class="our-office-sec pdt45">
        <div class="container-fluid">
          <h4 class="text-center">Our Presence</h4>
          <div class="map-box mt40">
            <div id="map_wrapper">
            <div id="map_canvas"></div></div>
          </div>
          <div class="tooltip-list">
            <div class="item">
              <img src="{{ asset('images/site_images/images/locate/tooltip-blue.png')}}">
              <p>Signature Studios</p>
            </div>
            <div class="item">
              <img src="{{ asset('images/site_images/images/locate/tooltip.png')}}">
              <p>Partner Showroom</p>
            </div>
            <div class="item">
              <img src="{{ asset('images/site_images/images/locate/tooltip-purple.png')}}">
              <p>Fenesta Offices</p>
            </div>
            <div class="item">
              <img src="{{ asset('images/site_images/images/locate/tooltip.png')}}">
              <p>International Market</p>
            </div>
          </div>
        </div>
      </div>
            
      <div class="locate-tab-sec">
        <div class="container-fluid">
          <ul class="locate-link">
            <li><a href="{{url('/locate-us/signature-studio')}}" @if(empty($child_slug) || $child_slug=='signature-studio') class="active" @endif >Signature Studio</a></li>
            <li><a @if($child_slug=='partner-showroom') class="active" @endif href="{{url('/locate-us/partner-showroom')}}" >Partner Showroom</a></li>            
            <li><a @if($child_slug=='fenesta-offices') class="active" @endif href="{{url('/locate-us/fenesta-offices')}}">Fenesta Offices</a></li>          
            <li><a @if($child_slug=='international-market') class="active" @endif href="{{url('/locate-us/international-market')}}">International Market</a></li>          
          </ul>
        </div>
        <div class="locate-tab-list">
          <div class="container-fluid">
              @if(empty($child_slug) || $child_slug=='signature-studio')
            <div class="locate-tab-box" id="signature-studio" @if(empty($child_slug) || $child_slug=='signature-studio') style="display: block;" @endif >
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select">
<!--                    <option>Select Country</option>-->
                    <option>India</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" name="fstate" id="fstate">
                    <option value="">Select State</option>
        
                      @foreach($stateshowrooms as $sts)
                       <option @if(!empty($child_slug1)) @if($child_slug1==$sts->state) selected  @endif @endif value="{{$sts->state}}">{{$sts->state}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <select class="select"  name="fcity" id="fcity">
                    <option value="">Select City</option>
                      @if(!empty($cityshowrooms))
                      @foreach($cityshowrooms as $sts)
                       <option @if(!empty($child_slug2)) @if($child_slug2==$sts->city) selected  @endif @endif value="{{$sts->city}}">{{$sts->city}}</option>
                      @endforeach 
                      @endif
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="fblock">
                    <option value="">Select Block</option>
                       @if(!empty($blockshowrooms))
                       @foreach($blockshowrooms as $sts)
                       <option @if(!empty($child_slug3)) @if($child_slug3==strtolower($sts->locality)) selected  @endif @endif value="{{$sts->locality}}">{{$sts->locality}}</option>
                      @endforeach 
                      @endif
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
					
					<div class="address-list-slider owl-carousel">
                        
                        @foreach($showrooms as $sroom)
                        
                        @php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Signature Studio");
                        
                        @endphp
						<div class="lu_item">
							<div class="head">
								<h4><img src="{{ asset('images/site_images/images/right-arrow.png')}}" alt="">{{$sroom->city}}</h4>
								<h3>{{$sroom->dealer_name}}</h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/user.png')}}" alt="">
									</div>
									<strong>Contact Person: </strong>
									{{$sroom->contact_person}}
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/gps.png')}}" alt="">
									</div>
									<strong>{{$sroom->locality}}</strong>
									<p>{!!$sroom->address!!} , {{$sroom->state}}</p>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/email.png')}}" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:{{$sroom->email}}">{{$sroom->email}}</a>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/phone.png')}}" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:{{$sroom->phone}}">{{$sroom->phone}}</a>
								</li>
							</ul>
						</div>
                        @endforeach
					</div>
                </div>
                <div class="right video-sliderss">
                  <div class=" video-slider owl-carousel">
                        @foreach($testlocateus as $ps)  
                      @if($ps->youtube_url)
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
              @endif
              @if($child_slug=='partner-showroom') 
            <div class="locate-tab-box" id="partner-showroom" @if($child_slug=='partner-showroom') style="display: block;" @endif  >
                
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select">
<!--                    <option>Select Country</option>-->
                    <option>India</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="psstate">
                    <option value="">Select State</option>
        
                      @foreach($statepshowrooms as $sts)
                       <option @if(!empty($child_slug1)) @if($child_slug1==$sts->state) selected  @endif @endif  value="{{$sts->state}}">{{$sts->state}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <select class="select"  id="pscity">
                    <option value="">Select City</option>
                      @if(!empty($citypshowrooms))
                      @foreach($citypshowrooms as $sts)
                       <option @if(!empty($child_slug2)) @if($child_slug2==$sts->city) selected  @endif @endif  value="{{$sts->city}}">{{$sts->city}}</option>
                      @endforeach 
                      @endif
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="psblock">
                    <option value="">Select Block</option>
                      @if(!empty($blockpshowrooms))
                      @foreach($blockpshowrooms as $sts)
                       <option @if(!empty($child_slug3)) @if($child_slug3==strtolower($sts->locality)) selected  @endif @endif value="{{$sts->locality}}">{{$sts->locality}}</option>
                      @endforeach 
                      @endif
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        @foreach($partner_showrooms as $sroom)
                      
                      
                       @php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Partner Showroom");
                        @endphp
						<div class="lu_item">
							<div class="head">
								<h4><img src="{{ asset('images/site_images/images/right-arrow.png')}}" alt="">{{$sroom->city}}</h4>
								<h3>{{$sroom->dealer_name}}</h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/user.png')}}" alt="">
									</div>
									<strong>Contact Person: </strong>
									{{$sroom->contact_person}}
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/gps.png')}}" alt="">
									</div>
									<strong>{{$sroom->locality}}</strong>
									<p>{!!$sroom->address!!},{{$sroom->state}}</p>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/email.png')}}" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:{{$sroom->email}}">{{$sroom->email}}</a>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/phone.png')}}" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:{{$sroom->phone}}">{{$sroom->phone}}</a>
								</li>
							</ul>
						</div>
                        @endforeach
					</div>
                </div>
                <div class="right video-sliderpp ">
                  <div class="video-slider owl-carousel">
                        @foreach($testlocateus as $ps)  
                      @if($ps->youtube_url)
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if($child_slug=='fenesta-offices')  
              <div class="locate-tab-box" id="fenesta-offices" @if($child_slug=='fenesta-offices') style="display: block;" @endif>
                
              <div class="slelect-box">                 
             {{--   <div class="form-group">
                  <select class="select">
<!--                    <option>Select Country</option>-->
                    <option>India</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="oostate">
                    <option value="">Select State</option>
        
                      @foreach($stateoshowrooms as $sts)
                       <option @if(!empty($child_slug1)) @if($child_slug1==$sts->state) selected  @endif @endif   value="{{$sts->state}}">{{$sts->state}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <select class="select"  id="oocity">
                    <option value="">Select City</option>
                       @if(!empty($cityoshowrooms))
                    @foreach($cityoshowrooms as $sts)
                       <option @if(!empty($child_slug2)) @if($child_slug2==$sts->city) selected  @endif @endif  value="{{$sts->city}}">{{$sts->city}}</option>
                      @endforeach 
                       @endif 
                  </select>
                </div> --}}
                <div class="form-group">
                  <select class="select" id="ooblock">
                    <option value="">Select Office </option>
                      @if(!empty($blockoshowrooms))
                     @foreach($blockoshowrooms as $sts)
                       <option @if(!empty($child_slug1)) @if($child_slug1==$sts->type) selected  @endif @endif  data-name="{{$type_officce[$sts->type]}}" value="{{$sts->type}}">{{$type_officce[$sts->type]}}</option>
                      @endforeach 
                      @endif 
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        
                        @foreach($offices as $sroom)
                      
                      @php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Fenesta Offices");
                        @endphp
						<div class="lu_item">
							<div class="head">
								<h4><img src="{{ asset('images/site_images/images/right-arrow.png')}}" alt="">{{$sroom->city}}</h4>
								<h3>{{$type_officce[$sroom->type]}}</h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/user.png')}}" alt="">
									</div>
									<strong>Contact Person: </strong>
									{{$sroom->contact_person}}
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/gps.png')}}" alt="">
									</div>
									<strong>{{$sroom->locality}}</strong>
									<p>{!!$sroom->address!!} , {{$sroom->state}}</p>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/email.png')}}" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:{{$sroom->email}}">{{$sroom->email}}</a>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/phone.png')}}" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:{{$sroom->phone}}">{{$sroom->phone}}</a>
								</li>
							</ul>
						</div>
                        @endforeach
					</div>
                </div>
                <div class="right video-slideroo">
                  <div class=" video-slider owl-carousel">
                     @foreach($testlocateus as $ps) 
                      @if($ps->youtube_url)
                      <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @endif
              
              
              @if($child_slug=='international-market') 
            <div class="locate-tab-box" id="international-market" @if($child_slug=='international-market') style="display: block;" @endif  >
                
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select country">
                    <option value="">Select Country</option>
                    <option value="Bhutan" @if(!empty($child_slug1)) @if($child_slug1=='Bhutan') selected  @endif @endif >Bhutan</option>
                    <option value="Nepal" @if(!empty($child_slug1)) @if($child_slug1=='Nepal') selected  @endif @endif  >Nepal</option>
                  </select>
                </div>
               
                <div class="form-group">
                  <select class="select"  id="incity">
                    <option value="">Select City</option>
                      @if(!empty($citypshowrooms))
                      @foreach($citypshowrooms as $sts)
                       <option @if(!empty($child_slug2)) @if($child_slug2==$sts->city) selected  @endif @endif  value="{{$sts->city}}">{{$sts->city}}</option>
                      @endforeach 
                      @endif
                  </select>
                </div> 
                          
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        @foreach($partner_showrooms as $sroom)
                      
                      
                       @php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Partner Showroom");
                        @endphp
						<div class="lu_item">
							<div class="head">
								<h4><img src="{{ asset('images/site_images/images/right-arrow.png')}}" alt="">{{$sroom->city}}</h4>
								<h3>{{$sroom->dealer_name}}</h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/user.png')}}" alt="">
									</div>
									<strong>Contact Person: </strong>
									{{$sroom->contact_person}}
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/gps.png')}}" alt="">
									</div>
									<strong>{{$sroom->locality}}</strong>
									<p>{!!$sroom->address!!},{{$sroom->state}}</p>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/email.png')}}" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:{{$sroom->email}}">{{$sroom->email}}</a>
								</li>
								<li>
									<div class="icon">
										<img src="{{ asset('images/site_images/images/locate/phone.png')}}" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:{{$sroom->phone}}">{{$sroom->phone}}</a>
								</li>
							</ul>
						</div>
                        @endforeach
					</div>
                </div>
                <div class="right video-sliderpp ">
                  <div class="video-slider owl-carousel">
                        @foreach($testlocateus as $ps)  
                      @if($ps->youtube_url)
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @endif
              
              
            </div>
        </div>
      </div>   
            
    @include('frontend._partials.faq')
   {{--   <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div> --}}
</div>

<script>
    
//fcity
//floca
 
 $('.country').change(function(){
      var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/international-market/"+str;
 });
    
    
 $('#incity').change(function(){
        var str1 = $('.country').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/international-market/"+str1+"/"+str;
 });
    
    
    
 $('#fstate').change(function(){
    var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/signature-studio/"+str;
     

//    var url = "{{url('/')}}/getlocateusstudio";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderss').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlcity = "{{url('/')}}/getcitybystate";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#fcity').html(items);
//        }
//    });
//     
//     
     
});

 $('#fcity').change(function(){
     
        var str1 = $('#fstate').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/signature-studio/"+str1+"/"+str;
     
//    var url = "{{url('/')}}/getlocateuscitystudio";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $("#fstate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderss').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "{{url('/')}}/getblockbycity";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#fblock').html(items);
//        }
//    });
//     
});
    
 $('#fblock').change(function(){
     
     
        var str1 = $('#fstate').val();
        var str2 = $('#fcity').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/signature-studio/"+str1+"/"+str2+"/"+str;
     
//    var url = "{{url('/')}}/getlocateusblockstudio";//should return json with a list of cities only
//    var std = $("#fstate").find(':selected').val();
//    var city = $("#fcity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
//     
});
    
 $('#psstate').change(function(){
     
     var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/partner-showroom/"+str;
   
     
     
//    var url = "{{url('/')}}/getlocateuspartner";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderpp').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlcity = "{{url('/')}}/getcitybystatepartnerlll";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#pscity').html(items);
//        }
//    });
});
  
 $('#pscity').change(function(){
      var str = $('#psstate').val();
      var str1 = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/partner-showroom/"+str+"/"+str1;
   
     
//    var url = "{{url('/')}}/getlocateuscitypartner";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $("#psstate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderpp').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "{{url('/')}}/getblockbycitypartner";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#psblock').html(items);
//        }
//    });
//     
});
    
 $('#psblock').change(function(){
     
     var str = $('#psstate').val();
     var str1 = $('#pscity').val();
      var str2 = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/partner-showroom/"+str+"/"+str1+"/"+str2;
   
     
     
//    var url = "{{url('/')}}/getlocateusblockpartner";//should return json with a list of cities only
//    var std = $("#psstate").find(':selected').val();
//    var city = $("#pscity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
     
});
    
    /*
 $('#oostate').change(function(){
     
      var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/fenesta-offices/"+str;
     
     
     
//    var url = "{{url('/')}}/getlocateusoffice";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-slideroo').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     var urlcity = "{{url('/')}}/getcitybystateoffice";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#oocity').html(items);
//        }
//    });
});
 $('#oocity').change(function(){
     var str = $(this).val();
     var str1 = $('#oostate').val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/fenesta-offices/"+str1+"/"+str;
//    var url = "{{url('/')}}/getlocateuscityoffice";//should return json with a list of cities only
//    var url1 = "{{url('/')}}/getvideo";//should return json with a list of cities only
//    var std = $("#oostate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-slideroo').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "{{url('/')}}/getblockbycityoffice";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#ooblock').html(items);
//        }
//    });
//     
}); */
    
 $('#ooblock').change(function(){
       var str = $(this).val();
     if(!str){
        window.location = "{{url('/')}}/locate-us/fenesta-offices/";  
     }
       var strn = $(this).find(':selected').attr('data-name');
//     var str1 = $('#oostate').val();
//     var str2 = $('#oocity').val();
      strn = strn.replace(/\s+/g, '-').toLowerCase();
//      str1 = str1.replace(/\s+/g, '-').toLowerCase();
//      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "{{url('/')}}/locate-us/fenesta-offices/"+strn;
     
//    var url = "{{url('/')}}/getlocateusblockoffice";//should return json with a list of cities only
//    var std = $("#oostate").find(':selected').val();
//    var city = $("#oocity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
     
});
</script>


  <script>

jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDtHKuJRxHlOpQlfS_OUWs09CeY8lnVmU4&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

      
//if (navigator.geolocation) { 
//
//         navigator.geolocation.getCurrentPosition(initialize);
//
// } 
//      
      
function initialize() {

    var map;
    var bounds = new google.maps.LatLngBounds();
    
//    var clat =  position.coords.latitude;                                       
//    var clong =  position.coords.longitude;   
//    alert(clat);
//    alert(clong);
    
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
    
//    navigator.geolocation.getCurrentPosition(function (p) {
//        var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
//        var mapOptions = {
//            center: LatLng,
//            zoom: 13,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//        };
        
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
     // Multiple Markers
	var markers = {!!json_encode($mapdata)!!};
		
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i <= markers.length; i++ ) {
        console.log(markers[i][1]);
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);



        // Info Window Content
        var address = markers[i][3];
        var heading = markers[i][4];
//alert(heading);
        if(heading == 'Signature Studios')
        {
          var iconimg = "{{asset('images/site_images/images/locate/tooltip-blue.png')}}";
        }else if(heading == 'Partner Showroom')
        {
          var iconimg = "{{asset('images/site_images/images/locate/tooltip.png')}}";
        }else if(heading == 'Fenesta Offices')
        {
          var iconimg = "{{asset('images/site_images/images/locate/tooltip-purple.png')}}";
        }
        else if(heading == 'Signature Studios')
        {
          var iconimg = "{{asset('images/site_images/images/locate/tooltip-purple.png')}}";
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
        this.setZoom(10);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script> 
@endsection