@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
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
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif
        
          <div class="heading"><div class="container-fluid">        @if(!empty($pageData->page_title))
          <h1>   {!! $pageData->page_title !!}</h1>
        @else
          <h1>  Mesh & Gril </h1>
        @endif
           </div></div> 
      </div>

      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
             @if(!empty($content))
            {!! $content !!}
        
        @endif
          </div>
          <div class="explore-more"><a href="javascript:;">Explore More <span><img src="{{ asset("images/site_images/images/about/explore-more.png") }}"></span></a></div>
        </div>
      </div>
      <div class="mesh-grill-sec mt50 tab-sec">
        <div class="container-fluid">
          <div class="get-fix">
            <ul class="mesh-grill-link tab-link">
              <li><a href="#mesh" class="active">Mesh</a></li>
              <li><a href="#gril">Grill</a></li>          
            </ul>
          </div>
        </div>
        <div class="mesh-grill-list tab-list">
          <div class="container-fluid">
            <div class="mesh-grill-box" id="mesh" style="display: block;">
              <div class="mesh-slider">
  

                  @php $i=0;$k=0; @endphp
                  @foreach($meshoptions as $mo)
                   <div class="item" data-aos="fade-right" @if($i>0)  data-aos-delay="{{$k=$k+200}}" @endif  >
                  <div class="image"><img title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mo->image") }}"> </div>
                  <div class="content">
                    <h6>{{$mo->title}}</h6>
                    {!!$mo->description!!}
                  </div>
                </div>
                   @php $i=$i+1; @endphp
                  @endforeach
              </div>
              <h4 class="text-center mt50" data-aos="fade-up">Mesh Styles</h4>
              <div class="mesh-style-slider">
                   @php $i=0;$k=0; @endphp
                  @foreach($meshstyle as $mo)
                <div class="item" data-aos="fade-right" @if($i>0)  data-aos-delay="{{$k=$k+200}}" @endif>
                  <div class="image"><img title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mo->image") }}"> </div>
                  <div class="content">
                    <h6>{{$mo->title}}</h6>
                    {!!$mo->description!!}
                  </div>
                </div>
                  @php $i=$i+1; @endphp
                  @endforeach
              </div>
            </div>
            <div class="mesh-grill-box" id="gril">
                  @php $i=0;$k=0; @endphp
                @foreach($grilloptions as $mo)
              <div class="mesh_block">
					<div class="img_row">
                      
                        
                         @foreach(explode(',',$mo->image) as $mmmg)
						<div class="img_block" data-aos="fade-right">
							<img title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mmmg") }}">
						</div>
                        @endforeach
                        
					</div>
					<div class="copy_row">
						<h6 data-aos="fade-up">{{$mo->title}}</h6>
                    	{!!$mo->description!!}
					</div>
				</div>
                 @endforeach
             {{-- <div class="mesh-slider">  
                  @php $i=0;$k=0; @endphp
                  @foreach($grilloptions as $mo)
                   <div class="item" >
                       @foreach(explode(',',$mo->image) as $mmmg)
                  <div class="image"><img  title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mmmg") }}"> </div>
                       @endforeach
                  <div class="content">
                    <h6></h6>
                    {!!$mo->description!!}
                  </div>
                </div>
                   @php $i=$i+1; @endphp
                  @endforeach
              </div> --}}
              <h4 class="text-center mt50">Grill Styles</h4>
                @php $i=0;$k=0; @endphp
                @foreach($grillstyle as $mo)
                 <div class="mesh_block">
					<div class="img_row">
                        
                        
                         @foreach(explode(',',$mo->image) as $mmmg)
						<div class="img_block" data-aos="fade-right">
							<img title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mmmg") }}">
						</div>
                        @endforeach
                        
					</div>
					<div class="copy_row">
						<h6 data-aos="fade-up">{{$mo->title}}</h6>
                    	{!!$mo->description!!}
					</div>
				</div>
                 @endforeach
                
           {{--   <div class="mesh-style-slider">
                   @php $i=0;$k=0; @endphp
                  @foreach($grillstyle as $mo)
                   <div class="item" >
                       @foreach(explode(',',$mo->image) as $mmmg)
                  <div class="image"><img  title="{{$mo->title}}" alt="{{$mo->title}}"  src="{{ asset("images/meshgrill/$mmmg") }}"> </div>
                       @endforeach
                       
                  <div class="content">
                    <h6>{{$mo->title}}</h6>
                    {!!$mo->description!!}
                  </div>
                </div>
                   @php $i=$i+1; @endphp
                  @endforeach
              </div>  --}}
            </div>
          </div>
        </div>
      </div>
    @include('frontend._partials.customerapp')
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

@endsection

