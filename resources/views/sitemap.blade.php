@extends('frontend.layouts.template_page')
@section('content')
@php

use Illuminate\Support\Facades\DB;
use App\Models\WindowType;
@endphp



    <div class="sitemap-sec">
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
                          $windowtypes = WindowType::where('is_delete','0')->where('product','1')->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'upvc-windows';
                        
                       
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">uPVC {{ $wtt->title }} Windows</a></li> 
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
                          $windowtypes = WindowType::where('is_delete','0')->where('product','2')->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'alumininum-windows';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">Aluminium {{ $wtt->title }} Windows</a></li> 
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
                          $windowtypes = WindowType::where('is_delete','0')->where('product','3')->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'upvc-doors';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">uPVC {{ $wtt->title }} Doors</a></li> 
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
                          $windowtypes = WindowType::where('is_delete','0')->where('product','4')->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'alumininum-doors';
                        @endphp
                        
                         @foreach($windowtypes as $wkk => $wtt)


                      <li><a href="{{ url("/$type_w/$slug_w") }}">Aluminium {{ $wtt->title }} Doors</a></li> 
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
                      <a href="{{url('locate-us/international-market/bhutan')}}"><h6>Bhutan</h6> </a>
                    <ul>
                      <li><a href="{{url('locate-us/international-market/bhutan/phuentsholing')}}">Phuentsholing</a></li>
                      <li><a href="{{url('locate-us/international-market/bhutan/thimphu')}}">Thimpu</a></li>
                    </ul>
                  </div>
                  <div class="sub-child">
                  <a href="{{url('locate-us/international-market/nepal')}}">  <h6>Nepal</h6> </a>
                    <ul>
                      <li><a href="{{url('locate-us/international-market/nepal/kathmandu')}}">Kathmandu</a></li>
                    </ul>
                  </div>
                  <div class="colm-2 colm">
                   <a href="{{url('/locate-us/fenesta-offices')}}"> <h6 class="bord-btm">Fenesta Offices</h6></a>
                    <div class="sub-child">
                      <ul>
                        <li><a href="{{url('locate-us/fenesta-offices/head-office')}}">Head Office</a></li>
                        <li><a href="{{url('locate-us/fenesta-offices/sales-office-and-installation-service')}}">Sales Office & Installation Service</a></li>               
                        <li><a href="{{url('locate-us/fenesta-offices/extrusion-factory')}}">Extrusion Factory</a></li>
                        <li><a href="{{url('locate-us/fenesta-offices/fabrication-factories')}}">Fabrication Factory</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="colm-3 colm">
                 <a href="{{url('/locate-us/signature-studio')}}"> <h6 class="bord-btm">Signature Studios</h6></a>
                    
                    @php
                     $stateshowrooms = DB::table('showrooms')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
                    
                    @endphp
                    @foreach($stateshowrooms as $ss)
                    
                    @php 
                    $citypshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->where('state',$ss->state)->get();
                    $scb = strtolower(str_replace(' ', '-', $ss->state));
                    @endphp
                  <div class="sub-child">
                      <a href="{{url("locate-us/signature-studio/$scb")}}"><h6>{{$ss->state}}</h6></a>
                    <ul>
                        @foreach($citypshowrooms as $cc)
                        
                                @php 
                            $blockpshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->where('city',$cc->city)->get();
                                $scbc = strtolower(str_replace(' ', '-', $cc->city));
                            @endphp
                        
                        
                      <li>
                        <a href="{{url("locate-us/signature-studio/$scb/$scbc")}}">{{$cc->city}}</a>
                        <ul class="sub-sub-child">
                            @foreach($blockpshowrooms as $bb)
                             @php 
                                $scbcb = strtolower(str_replace(' ', '-', $bb->locality));
                            @endphp
                          <li><a href="{{url("locate-us/signature-studio/$scb/$scbc/$scbcb")}}">{{$bb->locality}}</a></li>
                              @endforeach
                            
                        </ul>
                      </li> 
                        @endforeach
                    </ul>                 
                  </div>
                    @endforeach
                </div>
                <div class="colm-4 colm">
                  <a href="{{url('/locate-us/partner-showroom')}}"> <h6 class="bord-btm">Partner Showrooms</h6></a>
                    
                     
                    @php
                     $stateshowroomspp = DB::table('partner_showrooms')->select('state')->where('is_delete','0')->where('status','Active')->where('country','India')->groupBy('state')->get();
                    
                    @endphp
                    @foreach($stateshowroomspp as $ss)
                    
                    @php 
                    $citypshowroomspp = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('state',$ss->state)->where('country','India')->groupBy('city')->get();
                    $scb = strtolower(str_replace(' ', '-', $ss->state));
                    @endphp
                  <div class="sub-child">
                      <a href="{{url("locate-us/signature-studio/$scb")}}"><h6>{{$ss->state}}</h6></a>
                    <ul>
                        @foreach($citypshowroomspp as $cc)
                        
                                @php 
                            $blockpshowroomspp = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('country','India')->where('city',$cc->city)->groupBy('locality')->get();
                                $scbc = strtolower(str_replace(' ', '-', $cc->city));
                            @endphp
                        
                        
                      <li>
                        <a href="{{url("locate-us/signature-studio/$scb/$scbc")}}">{{$cc->city}}</a>
                          @if(!empty($blockpshowroomspp[0]->locality))
                        <ul class="sub-sub-child">
                            @foreach($blockpshowroomspp as $bb)
                             @php 
                                $scbcb = strtolower(str_replace(' ', '-', $bb->locality));
                            @endphp
                          <li><a href="{{url("locate-us/signature-studio/$scb/$scbc/$scbcb")}}">{{$bb->locality}}</a></li>
                              @endforeach
                            
                        </ul>
                          @endif
                      </li> 
                        @endforeach
                    </ul>                 
                  </div>
                    @endforeach
                    
                    
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
                  <li>
                    <a href="{{url('/features-benefits')}}">Features & Benefits</a>
                    <ul class="sub-sub-child">
                    @foreach($featurebenefit as  $ki => $ffbb)
                    <li><a href="{{url("/features-benefits/$ffbb->slug")}}">{{$ffbb->name}}</a></li>
                    @endforeach
                    </ul> 
                    </li> 
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
                <div class="parent option">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="{{ asset('images/sitemap/option-icon.png') }}"></span> Options Other</a></h6>
                <ul class="adjacent-child">
                  <li><a href="{{url('/design')}}">By Design</a></li>
                  <li><a href="{{url('/series')}}">By Series</a></li>
                  <li><a href="{{url('/material')}}">By Material</a></li>
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
          </div>
        </div>
      </div>
    </div>
@endsection