
  <header class="home">
    <div class="container-fluid">
      <div class="inner-header">
        <div class="logo"><a href="{{ url('/') }}">
              <img src="{{ asset('images/logo/'.$datasettings['logo']) }}"></a></div>
        <div class="header-right">
          <div class="top">
            <a href="{{url('/brochure')}}"><img class="hover" src="{{ asset('images/site_images/images/broucher.png') }}"><img class="nohover"src="{{ asset('images/site_images/images/broucher-white.png') }}">Brochure</a>
          {{--  <a href="{{url('/enquire-now')}}" data-toggle="modal" data-target=".enquiry-popup"><img class="hover" src="{{ asset('images/site_images/images/enquire.png') }}"><img class="nohover"src="{{ asset('images/site_images/images/enquire-white.png') }}">Enquire</a> --}}
            <a href="{{url('/enquire-now')}}?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website" ><img class="hover" src="{{ asset('images/site_images/images/enquire.png') }}"><img class="nohover"src="{{ asset('images/site_images/images/enquire-white.png') }}">Enquire</a>
            <a href="tel:18001029880" class="tel_box">  <img class="hover" src="{{ asset('images/site_images/images/phone.png') }}"><img class="nohover"src="{{ asset('images/site_images/images/phone-white.png') }}"> Toll Free : 1800 102 9880</a>
          </div>
          <div class="bottom">
            <ul class="menu-list">
              <li><a href="{{ URL('/') }}">Home</a></li>
              <li class="drop-down"><a href="{{ URL('/about-us') }}">About Us</a><span><i class="fa fa-angle-down"></i></span>
                
                      <div class="submenu">
                      <ul class="">
                        <li><a href="{{ URL('/about-us#ourvalue') }}">Our Value</a>

                          </li>
                        <li ><a href="{{ URL('/about-us#infrastructure-sec') }}">Our Infrastructure</a>   
                        </li>
                        <li ><a href="{{ URL('/about-us#awards') }}">Awards & Accreditations</a>   
                        </li>
                      </ul>
                    </div>  
                  
                </li>


            

              <li  class="drop-down"><a href="javascript:;">Products</a>
                <span><i class="fa fa-angle-down"></i></span>
                <div class="submenu">
                  <ul class="">
                    <li><a href="{{ URL('/window') }}">Windows</a> <span class="fa fa-angle-right"></span>
                          <ul class="sub_dropdown_menu">
                          @php
                          use App\Models\WindowdoorType;
                
                          $wind = WindowdoorType::where('is_delete','0')->get();
                  
                          $windows = $wind->where('type','Window');
                          @endphp
                  @foreach($windows as $ww)
                    @php
                    $ttype = strtolower($ww->type);
                    $pt = strtolower($ww->slug);
                    @endphp
                   <li><a href="{{ url("/$ttype/$pt") }}">{{$ww->title}}</a></li>
                    @endforeach
                      
                              </ul>
                        
                      </li>
                    <li ><a href="{{ URL('/door') }}">Doors</a>  <span class="fa fa-angle-right"></span>
                        
                          <ul class="sub_dropdown_menu">
                         @php
                   $doors = $wind->where('type','Door');
                  @endphp
                  @foreach($doors as $dd)
                    
                    @php
                    $ttype = strtolower($dd->type);
                    $pt = strtolower($dd->slug);
                    @endphp
                    
                <li><a href="{{ url("/$ttype/$pt") }}">{{$dd->title}} </a></li>
                  @endforeach
                      
                              </ul>
                        
                    </li>
                  </ul>
                </div>  
                
                </li>
              <li class="drop-down"><a href="javascript:;">Why Fenesta</a><span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                      <li><a href="{{ URL('/features-benefits') }}">Features & Benefits</a></li>
                     <li><a href="{{ URL('/style-benefits') }}">Style & Benefits</a></li>
                    <li><a href="{{ URL('/quality-innovation') }}">Quality & Innovation</a></li>
                    <li><a href="{{ URL('/awards-accreditations') }}">Awards & Accreditations</a></li>
                    <li><a href="{{ URL('/services-infrastructure') }}">Services & Infrastucture</a></li>
                    <li><a href="{{ URL('/brand-heritage') }}">Brand & Heritage</a></li>
                    <li><a href="{{ URL('/green-sustainability') }}">Green & Sustainability</a></li>
                  </ul>
                </div>  
                </li>
              <li class="drop-down"><a href="javascript:;">Showcase</a><span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="{{ URL('/showcase/clientele') }}">Clientele</a></li>
                    <li><a href="{{ URL('/showcase/gallery') }}">Gallery</a></li>
                    <li><a href="{{ URL('/customer-reviews') }}">Testimonials</a></li>
                  </ul>
                </div>  
                </li>
              <li><a href="https://www.fenesta.com/VisualizeDesign/index.html">Customize</a></li>
              <li class="drop-down"><a href="javascript:;">Contact Us</a>
                  <span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="https://api.whatsapp.com/send?phone=917428691568&text=Hi">Market Outside India Whatsapp</a></li>
                      <li><a href="sms:+56161&body=Hi">SMS <WINDOW> TO 56161</WINDOW></a></li>
                    <li><a href="{{url('/enquire-now')}}?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website" >Submit Enquiry</a></li>
                    <li><a href="mailto:response@fenesta.com" >Email Us</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".complaint-popup">Customer Complaint</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".buiseness-popup"> Reach the Business head </a></li>
                  </ul>
                </div>  
              </li>
            </ul> 

           

            <div class="search-box">
              <span class="search-icon slide-toggle" id="searchIcon1">
                <img class="search-image" src="{{ asset('images/site_images/search.png') }}">
                <img class="mob-search-image" src="{{ asset('images/site_images/search-blue.png') }}">
              </span>
            </div>
            <!-- Search-Box -->
            <div class="mob-locate-icon">
              <img class="" src="{{ asset('images/site_images/images/locate-icon-blue.png') }}"> @if($c_city!='') {{ $c_city }} @else Gurugram  @endif         
            </div>

            <!-- Floating Search bar. Appear on click of search Icon on top menu -->
             <div class="floatingSearch1 searchBox" id="floatingSearch1">
              <div class="search-box-container">
                <form>
                  <input type="text" autocomplete="off" id="search-box" placeholder="Search"/>
                  <input type="button" value="Search" class="blue-btn btnSearch"/> 
                    
                    <div id="suggesstion-box"></div>
                </form>
              </div>
            </div>
            <!-- /floatingSearch --> 


          </div>
          <!-- Bottom -->
        </div>
      </div>
    </div>

  </header>  

