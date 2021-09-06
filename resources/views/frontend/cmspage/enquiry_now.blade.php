@extends('frontend.layouts.enqurytemplate_page')
@section('content')
<style>
    .otpMsgSuccs{
        color:green;
    }
    p#crctOtpTxt {
    padding-top: 10px;
    color: red;
}
</style>
<div class="style-benefit-sec">

<div class="inner-banner">  
     
      @if(empty($pageData->banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/enq-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/enq-banner-mobile.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/enq-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
     
        <div class="banner_caption">
			<div class="container">
				<div class="inner">
					 @if($content!='')
                      {!! $content !!}
                      @endif
				</div>	
			</div>	
        </div>
		<div class="enq_form">
            <div id="home">
			<h3>Please Enter Your Details</h3>            
            <form class="enquiry-form" id="enquiry-form" action="{{url('/submit-enquiry-now')}}" method="post" novalidate>
                 @csrf
                
                 <input type="hidden" value="/wEPDwUKLTI3ODMxMTEzM2Rkvv2CvUen/ICZGext10oWUDzPtK4=" id="__VIEWSTATE" name="__VIEWSTATE">
                 <input type="hidden" value="321C15CF" id="__VIEWSTATEGENERATOR" name="__VIEWSTATEGENERATOR">
                 <input type="hidden" value="/wEWHgKy6JfLCgKbzqrYDQKevKvSBQLgl/mlAQKIhKmtDALaqK+XCALBhvmJAQLPgP2MDwLr5uACAtv7z+MLAuzqmtMHAv/s8ucEAvy/uXECoae2/wMC04/EpQwCwaSviwECnd+uJQKaxJThBAL1jp6aCQLVg6bzBALT4JOnCALNpe/zCwLv4sr+AQKTyLeUBwL6/e+hDgLmjbHlDgKd6ZC0DgKfgIzDCALWz+21CwLHst2qAospIQTG1Mg6Nt46T2bHn7xloX0v" id="__EVENTVALIDATION" name="__EVENTVALIDATION">
                
                
              <div class="form-group">
                <input type="text" id="username" class="form-control" name="name" placeholder="Name*">
                  <div class="error" id="error_username" ></div>
              </div>
              <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email ID*">
                  <div class="error" id="error_email" ></div>
              </div>
              <div class="form-group">
                <input type="text" id="userphone" class="form-control" name="mobile" placeholder="Phone No*"> 
                  <div class="error" id="error_userphone" ></div>
              </div>
              <div class="form-group">
                <select class="form-control select userstate" id="userstate" name="state">
                  <option value="">State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
                  <div class="error" id="error_userstate" ></div>
              </div>
              <div class="form-group">
                <select class="form-control  select usercity" id="usercity" name="city">
                  <option value="">City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
                  <div class="error" id="error_usercity" ></div>
              </div>
              <div class="form-group">
                   <input type="hidden" value="" name="hdnLid" id="hdnLid">
                <button id="submit-btn-enquiry-form" type="submit" name="" class="blue-btn enquirysubmit"> Submit </button>
                  
                <input type="hidden" id="lp_url" value="<?php if(!empty($_SERVER['REQUEST_URI'])){ echo $_SERVER['REQUEST_URI']; } ?>" name="lp_url"> 
                <input type="hidden" id="utm_source" value="<?php if(!empty($_REQUEST['utm_source'])){ echo $_REQUEST['utm_source']; } ?>" name="utm_source">
                <input type="hidden" id="utm_medium" value="<?php if(!empty($_REQUEST['utm_medium'])){ echo $_REQUEST['utm_medium']; } ?>" name="utm_medium">
                <input type="hidden" id="utm_campaignname" value="<?php if(!empty($_REQUEST['utm_campaign'])){ echo $_REQUEST['utm_campaign']; } ?>" name="utm_campaignname">
                <input type="hidden" id="utm_campaignid" value="<?php if(!empty($_REQUEST['utm_campaignid'])){ echo $_REQUEST['utm_campaignid']; } ?>" name="utm_campaignid">
                <input type="hidden" id="utm_adgroupname" value="<?php if(!empty($_REQUEST['utm_adset_name'])){ echo $_REQUEST['utm_adset_name']; } ?>" name="utm_adgroupname">
                <input type="hidden" id="utm_adgroupid" value="<?php if(!empty($_REQUEST['utm_ad_id'])){ echo $_REQUEST['utm_ad_id']; } ?>" name="utm_adgroupid">
                <input type="hidden" id="utm_keyword" value="<?php if(!empty($_REQUEST['utm_keyword'])){ echo $_REQUEST['utm_keyword']; } ?>" name="utm_keyword">
                <input type="hidden" id="utm_website" value="<?php if(!empty($_REQUEST['utm_website'])){ echo $_REQUEST['utm_website']; } ?>" name="utm_website">
                <input type="hidden" id="utm_geo" value="<?php if(!empty($_REQUEST['utm_geo'])){ echo $_REQUEST['utm_geo']; } ?>" name="utm_geo">
                <input type="hidden" id="utm_type" value="<?php if(!empty($_REQUEST['utm_type'])){ echo $_REQUEST['utm_type']; } ?>" name="utm_type">
                <input type="hidden" id="utmpublisher_id" value="<?php if(!empty($_REQUEST['utm_publisherid'])){ echo $_REQUEST['utm_publisherid']; } ?>" name="publisher_id">
                <input type="hidden" id="publisher_id" value="<?php if(!empty($_REQUEST['utm_publisher_id'])){ echo $_REQUEST['utm_publisher_id']; } ?>" name="publisher_id">
                <input type="hidden" id="utm_adgroup" value="<?php if(!empty($_REQUEST['utm_adgroup'])){ echo $_REQUEST['utm_adgroup']; } ?>" name="utm_adgroup">
                <input type="hidden" id="utm_creativeid" value="<?php if(!empty($_REQUEST['utm_creative'])){ echo $_REQUEST['utm_creative']; } ?>" name="utm_creativeid">
                <input type="hidden" id="utm_ad_name" value="<?php if(!empty($_REQUEST['utm_ad_name'])){ echo $_REQUEST['utm_ad_name']; } ?>" name="utm_ad_name">

              </div>   
              <div class="message-box message-box-enquiry-form" style="display:none;"> <span class="message-text"></span> </div>           
              <div class="form-group">
                <p>*By clicking Submit button I agree that I have read the  <a href="{{url('/privacy-policy')}}">Privacy Policy</a></p>
              </div>
            </form>
            </div>
            <h3 id="otpMsgSuccs"></h3>
             <div class="otp_verification form_section OtpFormSection" id="otp" style="display:none;">
            <p>Please verify your number through One-Time Verification Pin (OTP) sent on your WhatsApp number</p>
        <form name="sendOtp" id="sendOtp" method="post" action="">
             @csrf
            <div class="form-group block">
				<input type="text"  class="optInp form-control" required placeholder="OTP *" id="txt_OTP" name="txt_OTP">	
			</div>
			<div class="custom_checkbox">
                <input type="checkbox" checked required name="whatsapp" id="whatsapp" value="true">
                <label for="whatsapp"><span>Receive your inquiry confirmation on WhatsApp</span></label>
            </div>
            <br>
		<div class="submitclass form-group">
				<input type="button" class="btn sumbit" id="cmdOtp" value="Verify" name="cmdOtp">
			</div>
           <div class="resendOtplink">
                <a class="link" href="javascript:void(0)" id="cmdOtpResend" name="cmdOtpResend">Resend OTP</a>
            </div>
        </form>
        <p class="alert_err" id="crctOtpTxt" style="display: none;"></p>
        <p class="alert_success" id="crctOtpTxtsent" style="display: none;"></p>
    </div>
            
		</div>
      </div>     
      
   <div class="science-work-sec">
        <div class="container-fluid">
          <div class="inner-box text-center">
              @if($about!='')
              {!! $about !!}
              @endif
           
              
              
            <div class="science-work-wrap">
              <div class="science-work-list left">
                  
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki<=4)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6> </a>
                  </div>
                @endif
                 @endforeach
                @php 
                $turt = $featurebenefit[0]->image; @endphp
                </div>
              <div class="middle aos-init" data-aos="zoom-in">
                <div class="center-image"><img class="{{$turt}}" src="{{ asset("images/featurebenefit/image/$turt")}}"></div>
                
              </div>
              <div class="science-work-list right">
          
               
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki>=5 and $ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                 <a href="{{url("/features-benefits/$ffbb->slug")}}"> <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
                @endif
                 @endforeach
              </div>
<!-- 
              <div class="science-work-list science-work-list-ipad">
                   @foreach($featurebenefit as  $ki => $ffbb)
                 @if($ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                <a href="{{url("/features-benefits/$ffbb->slug")}}">  <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
               {{--  <div class="item" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                   @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                </div> --}}
            @endif
                 @endforeach
               
                  
              </div> -->

              <div class="science-work-list science-work-list-mob">
                   @foreach($featurebenefit as  $ki => $ffbb)
                 @if($ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                <a href="{{url("/features-benefits/$ffbb->slug")}}">  <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
               {{--  <div class="item" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                   @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                </div> --}}
            @endif
                 @endforeach
               
                  
              </div>
            </div>
    
    
          {{--  <div class="science-work-wrap">
              <div class="science-work-list left">
                  
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki<=4)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6> </a>
                  </div>
                @endif
                 @endforeach
                @php 
                $turt = $featurebenefit[0]->image; @endphp
                </div>
              <div class="middle aos-init" data-aos="zoom-in">
                <div class="center-image"><img class="{{$turt}}" src="{{ asset("images/featurebenefit/image/$turt")}}"></div>
                
              </div>
              <div class="science-work-list right">
          
               
                  @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki>=5 and $ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                 <a href="{{url("/features-benefits/$ffbb->slug")}}"> <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
                @endif
                 @endforeach
              </div>

              <div class="science-work-list science-work-list-mob">
                   @foreach($featurebenefit as  $ki => $ffbb)
                  @if($ki<10)
                  <div class="item aos-init" data-aos="fade-right" data-image="{{ asset('images/site_images/images/why-fenesta/science-work.jpg')}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                      @php  $tit = explode(' ',$ffbb->othername) @endphp
                <a href="{{url("/features-benefits/$ffbb->slug")}}">  <h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                  </div>
                 <div class="item" data-image="{{ asset("images/featurebenefit/image/$ffbb->image")}}">
                  <span class="image"><img class="nohover" src="{{ asset("images/featurebenefit/icon/$ffbb->icon")}}"><img class="hover" src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}"></span>
                   @php  $tit = explode(' ',$ffbb->othername) @endphp
                  <a href="{{url("/features-benefits/$ffbb->slug")}}"><h6>@if(isset($tit[0])) {{$tit[0]}} @endif <span>@if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</span></h6></a>
                </div>
            @endif
                 @endforeach
               
                  
              </div>
            </div> --}}
          </div>
        </div>
      </div>
   
    @include('frontend._partials.imagegallery') 
    @include('frontend._partials.testimonials')
    @include('frontend._partials.customerapp')

</div>
@endsection

