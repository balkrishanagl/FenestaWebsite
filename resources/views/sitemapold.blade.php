@extends('frontend.layouts.template_page')
@section('content')
@php
use App\Models\WindowType;
@endphp
<style> 
    .sitemap-box .col-box3 .adjacent-child li a {
    text-transform: capitalize;
}
</style>


    <div class="sitemap-sec">
        @include('frontend.layouts.breadcrumb')
      <div class="sitemap-box mt60">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="parent">
              <a href="{{url('/')}}"><span class="image"><img src="{{ asset('images/sitemap/home-icon.png') }}"></span> Home</a>
            </div>
            <div class="parent product-list">
              <a href="javascript:;"><span class="image"><img src="{{ asset('images/sitemap/product-icon.png') }}"></span> Products</a>
              <div class="child">
                <div class="colm-1 colm">
                    <a href="{{url('/window')}}"> <h6 class="bord-btm">Windows</h6> </a>
                  <div class="sub-child">
                   <a href="{{url('/window/upvc-windows')}}"> <h6>uPVC Windows</h6></a>
                    <ul>
                        
                        @php
                          $windowtypes = WindowType::where('is_delete',0)->where('product',1)->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'upvc-windows';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">{{ $wtt->title }}</a></li> 
                   @php
                       $wkki = $wkki+200;
                       @endphp
                   @endforeach
                     
                    </ul>
                  </div>
                  <div class="sub-child">
                   <a href="{{url('/window/alumininum-windows')}}">  <h6>Aluminium Windows</h6></a>
                    <ul>
                       
                        @php
                          $windowtypes = WindowType::where('is_delete',0)->where('product',2)->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'alumininum-windows';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">{{ $wtt->title }}</a></li> 
                   @php
                       $wkki = $wkki+200;
                       @endphp
                   @endforeach
                    </ul>
                  </div>
                </div>
                <div class="colm-2 colm">
                  <a href="{{url('/door')}}">  <h6 class="bord-btm">Doors</h6></a>
                  <div class="sub-child">
                  <a href="{{url('/door/upvc-doors')}}">   <h6>uPVC Doors</h6></a>
                    <ul>
                     
                        @php
                          $windowtypes = WindowType::where('is_delete',0)->where('product',3)->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'upvc-doors';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">{{ $wtt->title }}</a></li> 
                   @php
                       $wkki = $wkki+200;
                       @endphp
                   @endforeach
                    </ul>
                  </div>
                  <div class="sub-child">
                  <a href="{{url('/door/alumininum-doors')}}">   <h6>Aluminium Doors</h6></a>
                    <ul>
                      
                        @php
                          $windowtypes = WindowType::where('is_delete',0)->where('product',4)->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'alumininum-doors';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">{{ $wtt->title }}</a></li> 
                   @php
                       $wkki = $wkki+200;
                       @endphp
                   @endforeach
                    </ul>
                  </div>
                    
                     <div class="sub-child">
                  <a href="{{url('/door/internal-doors')}}">   <h6>Internal Doors</h6></a>
                         
                    </div>
                </div>
              </div>
            </div>
            <div class="parent locate-list">
                
              <a href="{{url('/locate-us')}}"><span class="image"><img src="{{ asset('images/sitemap/locate-icon.png') }}"></span> Locate Us</a>
              <div class="child">
                <div class="colm-1 colm">
                  <a href="{{url('/locate-us/international-market')}}"> <h6 class="bord-btm">International Market</h6></a>
                  <div class="sub-child">
                    <h6>Bhutan</h6>
                    <ul>
                      <li><a href="javascript:;">Thimpu</a></li>
                    </ul>
                  </div>
                  <div class="sub-child">
                    <h6>Nepal</h6>
                    <ul>
                      <li><a href="javascript:;">Kathmandu</a></li>
                    </ul>
                  </div>
                  <div class="colm-2 colm">
                   <a href="{{url('/locate-us/fenesta-offices')}}"> <h6 class="bord-btm">Fenesta Offices</h6></a>
                    <div class="sub-child">
                      <ul>
                        <li><a href="javascript:;">Head Office</a></li>
                        <li><a href="javascript:;">Sales Office & Installation Service</a></li>               
                        <li><a href="javascript:;">Extrusion Factory</a></li>
                        <li><a href="javascript:;">Fabrication Factory</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="colm-3 colm">
                 <a href="{{url('/locate-us/signature-studio')}}"> <h6 class="bord-btm">Signature Studios</h6></a>
                  <div class="sub-child">
                    <h6>Tamil Nadu</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Chennai</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Khader Nawaz Khan Road</a></li>
                        </ul>
                      </li> 
                    </ul>                 
                  </div>
                  <div class="sub-child">
                    <h6>Uttar Pradesh</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Noida</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">GIP Noida</a></li>
                        </ul>
                      </li>  
                    </ul>               
                  </div>
                  <div class="sub-child">
                    <h6>Karnataka</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Bengaluru</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Indira Nagar</a></li>
                        </ul>
                      </li>  
                    </ul>               
                  </div>
                  <div class="sub-child">
                    <h6>Haryana</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Gurgaon</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Sector - 32</a></li>
                        </ul>
                      </li> 
                    </ul>                
                  </div>
                  <div class="sub-child">
                    <h6>Gujarat</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Ahemdabad</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">S.G. Road</a></li>
                        </ul>
                      </li>    
                    </ul>             
                  </div>
                  <div class="sub-child">
                    <h6>Telangana</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Hyderabad</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Kavuri Hills</a></li>
                        </ul>
                      </li>     
                    </ul>            
                  </div>
                  <div class="sub-child">
                    <h6>Maharashtra</h6>
                    <ul>
                      <li>
                        <a href="javascript:;">Pune</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Senapati Bapat road</a></li>
                        </ul>
                      </li> 
                      <li>
                        <a href="javascript:;">Mumbai</a>
                        <ul class="sub-sub-child">
                          <li><a href="javascript:;">Lower Parel</a></li>
                        </ul>
                      </li>
                    </ul>                 
                  </div>
                </div>
                <div class="colm-4 colm">
                  <a href="{{url('/locate-us/partner-showroom')}}"> <h6 class="bord-btm">Partner Showrooms</h6></a>
                  <div class="sub-child">
                    <h6>Andhra Pradesh</h6>
                    <ul>
                      <li><a href="javascript:;">Bhimavaram</a></li>               
                      <li><a href="javascript:;">Guntur</a></li>
                      <li><a href="javascript:;">Kakinada</a></li> 
                      <li><a href="javascript:;">Kurnool</a></li>
                      <li><a href="javascript:;">Tirupati</a></li>
                      <li><a href="javascript:;">Vijaywada</a></li>
                      <li><a href="javascript:;">Visakhapatnam</a></li> 
                      <li><a href="javascript:;">Anantpur</a></li>   
                    </ul>
                    
                    <div class="sub-child-adjacent">
                      <h6>Maharashtra</h6>
                      <ul>
                        <li><a href="javascript:;">Aurangabad</a></li>               
                        <li><a href="javascript:;">Nanded</a></li>
                        <li><a href="javascript:;">Mumbai</a></li> 
                        <li><a href="javascript:;">Nagpur</a></li>
                        <li><a href="javascript:;">Nashik</a></li>
                        <li><a href="javascript:;">Pune</a></li>
                        <li><a href="javascript:;">Navi Mumbai</a></li> 
                        <li><a href="javascript:;">Vasai</a></li>
                        <li><a href="javascript:;">Ahmed Nagar</a></li>
                        <li><a href="javascript:;">Solapur</a></li>
                        <li><a href="javascript:;">Latur</a></li>
                        <li><a href="javascript:;">Kolhapur</a></li>   
                      </ul>
                    </div>              
                  </div>
                  <div class="sub-child">
                    <h6>Arunachal Pradesh</h6>
                    <ul>
                      <li><a href="javascript:;">Papum</a></li>   
                    </ul>
                    <div class="sub-child-adjacent">
                      <h6>Chhattisgarh</h6>
                      <ul>
                        <li><a href="javascript:;">Bilaspur</a></li>
                        <li><a href="javascript:;">Raipur</a></li>
                        <li><a href="javascript:;">Raigarh</a></li>   
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Uttar Pradesh</h6>
                      <ul>
                        <li><a href="javascript:;">Agra</a></li>
                        <li><a href="javascript:;">Allahabad</a></li>
                        <li><a href="javascript:;">Bareilly</a></li>
                        <li><a href="javascript:;">Ghaziabad</a></li>
                        <li><a href="javascript:;">Gorakhpur</a></li>
                        <li><a href="javascript:;">Saharanpur</a></li>
                        <li><a href="javascript:;">Lucknow</a></li>
                        <li><a href="javascript:;">Moradabad</a></li>
                        <li><a href="javascript:;">Noida</a></li>
                        <li><a href="javascript:;">Varanasi</a></li>   
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Telangana</h6>
                      <ul>
                        <li><a href="javascript:;">Hyderabad</a></li>
                        <li><a href="javascript:;">Secunderabad</a></li>
                        <li><a href="javascript:;">Warangal</a></li> 
                        <li><a href="javascript:;">Nizamabad</a></li>   
                      </ul>  
                    </div>            
                  </div>  
                  <div class="sub-child">
                    <h6>Gujarat</h6>
                    <ul>
                      <li><a href="javascript:;">Ahmedabad</a></li>               
                      <li><a href="javascript:;">Anand</a></li>
                      <li><a href="javascript:;">Bhavnagar</a></li> 
                      <li><a href="javascript:;">Chikhli</a></li>
                      <li><a href="javascript:;">Jamnagar</a></li>
                      <li><a href="javascript:;">Palanpur</a></li>
                      <li><a href="javascript:;">Rajkot</a></li> 
                      <li><a href="javascript:;">Surat</a></li> 
                      <li><a href="javascript:;">Vadodara</a></li> 
                      <li><a href="javascript:;">Gandhidham</a></li>
                    </ul>  

                    <div class="sub-child-adjacent">
                      <h6>Bihar</h6>
                      <ul>
                        <li><a href="javascript:;">Mujjaffarpur</a></li>
                        <li><a href="javascript:;">Patna</a></li>   
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Goa</h6>
                      <ul>
                        <li><a href="javascript:;">Panaji</a></li>   
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Assam</h6>
                      <ul>
                        <li><a href="javascript:;">Guwahati</a></li>
                        <li><a href="javascript:;">Dibrugarh</a></li>   
                      </ul>  
                    </div>  
                    <div class="sub-child-adjacent">
                      <h6>Delhi</h6>
                      <ul>
                        <li><a href="javascript:;">New Delhi</a></li>   
                      </ul>  
                    </div>         
                  </div> 
                  <div class="sub-child">
                    <h6>Karnataka</h6>
                    <ul>
                      <li><a href="javascript:;">Vijayapura</a></li>               
                      <li><a href="javascript:;">Belgaum</a></li>
                      <li><a href="javascript:;">Bengaluru</a></li> 
                      <li><a href="javascript:;">Davangere</a></li>
                      <li><a href="javascript:;">Hassan</a></li>
                      <li><a href="javascript:;">Hospet</a></li>
                      <li><a href="javascript:;">Hubli</a></li> 
                      <li><a href="javascript:;">Kalaburagi</a></li> 
                      <li><a href="javascript:;">Mangalore</a></li> 
                      <li><a href="javascript:;">Mysuru</a></li>
                      <li><a href="javascript:;">Shimoga</a></li>
                      <li><a href="javascript:;">Tumkur</a></li>
                      <li><a href="javascript:;">Udupi</a></li>
                    </ul> 

                    <div class="sub-child-adjacent">
                      <h6>Punjab </h6>
                      <ul>
                        <li><a href="javascript:;">Amritsar</a></li>               
                        <li><a href="javascript:;">Bhatinda</a></li>
                        <li><a href="javascript:;">Chandigarh</a></li> 
                        <li><a href="javascript:;">Pathankot</a></li>
                        <li><a href="javascript:;">Mohali</a></li>
                        <li><a href="javascript:;">Patiala</a></li>
                        <li><a href="javascript:;">Jalandhar</a></li>    
                      </ul>  
                    </div>              
                  </div> 
                  <div class="sub-child">
                    <h6>Jammu And Kashmir</h6>
                    <ul>
                      <li><a href="javascript:;">Jammu</a></li> 
                      <li><a href="javascript:;">Srinagar</a></li>   
                    </ul> 

                    <div class="sub-child-adjacent">
                      <h6>Kerala </h6>
                      <ul>
                        <li><a href="javascript:;">Calicut</a></li>               
                        <li><a href="javascript:;">Cochin</a></li>
                        <li><a href="javascript:;">Chakkanthara</a></li> 
                        <li><a href="javascript:;">Kollam</a></li>
                        <li><a href="javascript:;">Trivandrum</a></li>                         
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Manipur </h6>
                      <ul>
                        <li><a href="javascript:;">Imphal</a></li>
                      </ul>  
                    </div>
                    <div class="sub-child-adjacent">
                      <h6>Nagaland </h6>
                      <ul>
                        <li><a href="javascript:;">Dimapur</a></li>
                      </ul>  
                    </div>
                    <div class="sub-child-adjacent">
                      <h6>Pondicherry </h6>
                      <ul>
                        <li><a href="javascript:;">Pondicherry City</a></li>
                      </ul>  
                    </div> 
                    <div class="sub-child-adjacent">
                      <h6>Haryana </h6>
                      <ul>
                        <li><a href="javascript:;">Gurgaon</a></li>
                        <li><a href="javascript:;">Faridabad</a></li>
                      </ul>  
                    </div>            
                  </div>
                  <div class="sub-child">
                    <h6>Jharkhand</h6>
                    <ul>
                      <li><a href="javascript:;">Dhanbad</a></li>   
                    </ul> 

                    <div class="sub-child-adjacent">
                      <h6>Madhya Pradesh </h6>
                      <ul>
                        <li><a href="javascript:;">Bhopal</a></li>
                        <li><a href="javascript:;">Gwalior</a></li>
                        <li><a href="javascript:;">Indore</a></li>
                        <li><a href="javascript:;">Jabalpur</a></li>
                      </ul>  
                    </div>  
                    <div class="sub-child-adjacent">
                      <h6>Mizoram </h6>
                      <ul>
                        <li><a href="javascript:;">Aizawal</a></li>
                      </ul>  
                    </div>
                    <div class="sub-child-adjacent">
                      <h6>Odisha</h6>
                      <ul>
                        <li><a href="javascript:;">Rourkela</a></li>
                        <li><a href="javascript:;">Balasore</a></li>
                        <li><a href="javascript:;">Bhubaneswar</a></li>
                      </ul>  
                    </div>           
                  </div>
                  <div class="sub-child">
                    <h6>Sikkim</h6>
                    <ul>
                      <li><a href="javascript:;">Gangtok</a></li>   
                    </ul> 
 
                    <div class="sub-child-adjacent">
                      <h6>Tamil Nadu</h6>
                      <ul>
                        <li><a href="javascript:;">Chennai</a></li>
                        <li><a href="javascript:;">Coimbatore</a></li>
                        <li><a href="javascript:;">Tirunelveli</a></li>
                        <li><a href="javascript:;">Salem</a></li>
                        <li><a href="javascript:;">Trichy</a></li>
                        <li><a href="javascript:;">Vellorev</a></li>
                      </ul>  
                    </div> 

                    <div class="sub-child-adjacent">
                      <h6>West Bengal</h6>
                      <ul>
                        <li><a href="javascript:;">Durgapur</a></li>
                        <li><a href="javascript:;">Kolkata</a></li>
                        <li><a href="javascript:;">Siliguri</a></li>
                      </ul>  
                    </div>              
                  </div>
                  <div class="sub-child">
                    <h6>Rajasthan</h6>
                    <ul>
                      <li><a href="javascript:;">Ajmer</a></li>  
                      <li><a href="javascript:;">Alwar</a></li>  
                      <li><a href="javascript:;">Jaipur</a></li>  
                      <li><a href="javascript:;">Jodhpur</a></li>  
                      <li><a href="javascript:;">Kota</a></li>  
                      <li><a href="javascript:;">Udaipur</a></li>  
                      <li><a href="javascript:;">Ganganagar</a></li> 
                    </ul> 

                    <div class="sub-child-adjacent">
                      <h6>Uttarakhand</h6>
                      <ul>
                        <li><a href="javascript:;">Dehradun</a></li>
                        <li><a href="javascript:;">Haldwani</a></li>
                        <li><a href="javascript:;">Haridwar</a></li>
                        <li><a href="javascript:;">Rishikesh</a></li>
                      </ul>  
                    </div>              
                  </div>
                </div>
              </div>
            </div>
            <div class="parent about-fenesta">
              <h6  class="bord-btm"><a href="{{url('/about-us')}}"><span class="image"><img src="{{ asset('images/sitemap/about-icon.png') }}"></span> About Fenesta</a></h6>
              <ul class="adjacent-child">
                <li><a href="{{url('/about-us#ourvalue')}}">Our Values</a></li>
                <li><a href="{{url('/about-us#infrastructure-sec')}}">Our Infrastructure</a></li>
                <li><a href="{{url('/about-us#awards')}}">Awards & Recognitions</a></li>
              </ul> 
            </div>
       
            <div class="parent news-media">
              <h6  class="bord-btm"><a href="{{url('/news-media')}}"><span class="image"><img src="{{ asset('images/sitemap/news-icon.png') }}"></span> News & Media</a></h6>
              <ul class="adjacent-child">
                <li><a href="{{url('/news-media/latest-events')}}">Latest Events</a></li>
                <li><a href="{{url('/news-media/advertisement-centre')}}">Advertisements</a></li>
                <li><a href="{{url('/news-media/press-coverage')}}">Press Coverage</a></li>
                {{-- <li><a href="{{url('/news-media/')}}">Electronic Media Coverage</a></li>--}}
              </ul> 
            </div>
            <div class="col-box1 col-box">
              <div class="parent why-fenesta">
                <h6  class="bord-btm"><a href="{{url('/style-benefits')}}"><span class="image"><img src="{{ asset('images/sitemap/convers-icon.png') }}"></span> Why Fenesta</a></h6>
                <ul class="adjacent-child">
                  <li><a href="{{url('/style-benefits')}}">Style & Benefits</a></li>
                  <li><a href="{{url('/quality-innovation')}}">Quality & Innovation</a></li>
                  <li><a href="{{url('/awards-accreditations')}}">Awards & Accreditations</a></li>
                  <li><a href="{{url('/services-infrastructure')}}">Services & Infrastructure</a></li>
                  <li><a href="{{url('/brand-heritage')}}">Our Brand & Heritage</a></li>
                  <li><a href="{{url('/green-sustainability')}}">Green & Sustainability</a></li>
                </ul> 
              </div>
              <div class="parent option">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="{{ asset('images/sitemap/option-icon.png') }}"></span> Options</a></h6>
                <ul class="adjacent-child">
                  <li><a href="{{url('/window/colors-finish')}}">Color Options</a></li>
                  <li><a href="{{url('/window/glass')}}">Glass Options</a></li>
                  <li><a href="{{url('/window/handles')}}">Handles & Locks</a></li>
                  <li><a href="{{url('/window/mesh-grill')}}">Mesh & Grill Options</a></li>
                  <li><a href="{{url('/trims')}}">Trim Options</a></li>
                </ul> 
              </div>
              <div class="parent showcase">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="{{ asset('images/sitemap/showcase-icon.png') }}"></span> Showcase</a></h6>
                <ul class="adjacent-child">
                  <li><a href="{{url('/showcase/clientele')}}">Clientele</a></li>
                  <li><a href="{{url('/showcase/gallery')}}">Gallery</a></li>
                  <li><a href="{{url('/customer-reviews')}}">Testimonials</a></li>
                </ul> 
              </div>
              <div class="parent other">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="{{ asset('images/sitemap/other-icon.png') }}"></span> Others</a></h6>
                <ul class="adjacent-child">
                  <li><a href="{{url('/privacy-policy')}}">Privacy Policies</a></li>
                  <li><a href="{{url('/disclaimer')}}">Disclaimer</a></li>
                </ul> 
              </div>
            </div>   
            <div class="col-box2 col-box">
              <div class="parent facade">
                <h6  class=""><a href="{{url('/great-facade')}}"><span class="image"><img src="{{ asset('images/sitemap/facade-icon.png') }}"></span> Great Facades</a></h6>               
              </div>
              <div class="parent blog">
                <h6  class=""><a href="{{url('/blog')}}"><span class="image"><img src="{{ asset('images/sitemap/blog-icon.png') }}"></span> Blog</a></h6>               
              </div>
              <div class="parent brochures">
                <h6  class=""><a href="{{url('/brochure')}}"><span class="image"><img src="{{ asset('images/sitemap/broucher-icon.png') }}"></span> Fenesta Brochures</a></h6>               
              </div>
              <div class="parent dcm">
                <h6  class=""><a href="{{url('/about-dcm')}}"><span class="image"><img src="{{ asset('images/sitemap/dcm-icon.png') }}"></span> DCM Shriram</a></h6>               
              </div>              
            </div>
            <div class="col-box3 col-box">
              <div class="parent feature">
                <h6  class="bord-btm"><a href="{{url('/features-benefits')}}"><span class="image"><img src="{{ asset('images/sitemap/feature-icon.png') }}"></span> Features & Benefits</a></h6>
                <ul class="adjacent-child">
                    @foreach($featurebenefit as  $ki => $ffbb)
                  <li><a href="{{url("/features-benefits/$ffbb->slug")}}">{{$ffbb->name}}</a></li>
                  @endforeach
                </ul> 
              </div>       
            </div>  
          </div>
        </div>
      </div>
    </div>
@endsection