@extends('frontend.layouts.template_page')
@section('content')
<style>
    .galley-image-listing ul li .image {
    height: 157px;
}
/*
    .client_list {
    width: calc(100% - 241px);
    padding: 30px;
    background-color: #f3f3f3;
    margin-left: 14px;
    min-height: 500px;
}
    .client_list ul {
    display: flex;
    flex-wrap: wrap;
}
    .client_list ul li {
    width: 20%;
    padding: 0 7px 14px;
}
    .client_list ul li .image > img {
    width: 100%;
}
*/
</style>
        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
     {{--
@if($id!=23)
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
          <h1>Gallery</h1>
        @endif
           </div></div> 
      </div>

@endif
            --}}
      <div class="scroll-gallery"></div>
      <div class="galley-box pdt45">
        <div class="container-fluid">
          <div class="top-heading">
            <h4 data-aos="fade-up">{!! $pageData->page_title !!}</h4>
             @if(!empty($pageData->page_description))
                {!! $pageData->page_description !!}

            @endif
          </div>
          <div class="bottom-box">
            <div class="filter-icon for-mob"><a href="javascript:;"><img src="{{ asset('images/site_images/images/gallery/filter-icon.png') }}">Filter</a></div>
            <div class="galley-filter-box"> 
              <a href="javascript:;" class="filter-close for-mob"><img src="{{ asset('images/site_images/images/gallery/close-blue.png') }}"></a>             
              <div class="galley-filter-list">
                  @if($id==23)
                <h6>Zone Wise</h6>
                <div class="checkbox-list">
                 
                 <label class="checkbox-button">South Region
                    <input type="checkbox" class="region" value="1" >
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">North Region
                    <input type="checkbox" class="region" value="2">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">West Region
                    <input type="checkbox" class="region" value="3">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">East Region
                    <input type="checkbox" class="region" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                </div>
                  @else
                  <h6>Category</h6>
                <div class="checkbox-list">
                 
                  <label class="checkbox-button">Window
                    <input type="checkbox" class="region" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Door
                    <input type="checkbox" class="region" value="5">
                    <span class="checkbox-checkmark"></span>
                  </label>
                </div>
                  @endif
              </div>
                @if($id==23) <input type="hidden" id="pid" value="23"> @else <input type="hidden" id="pid" value="21"> @endif
              <div class="galley-filter-list">
                <h6>Property Type</h6>
                <div class="checkbox-list">
                     
                {{--  <label class="checkbox-button">Residential
                    <input type="checkbox" class="ptype" value="6">
                    <span class="checkbox-checkmark"></span>
                  </label> --}}
                  <label class="checkbox-button">Housing
                    <input type="checkbox" class="ptype" value="5">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Hotels
                    <input type="checkbox" class="ptype" value="1">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Offices
                    <input type="checkbox" class="ptype" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Hospitals
                    <input type="checkbox" class="ptype" value="2">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Education Institutes
                    <input type="checkbox" class="ptype" value="3">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  
                </div>
              </div>
            </div>
            <div @if($id==23) class="client_list text-center" @else class="galley-image-listing text-center" @endif>
                <h6 style="display:none;" class="noresult">No Result Found !!</h6>
              <ul class="ajaxdata">
                @foreach($gallery as $gg)
                <li>
                  
                      @if($id==23)
                      <img src={!!asset("images/gallery_images/$gg->image")!!}>
                      @else
                    <div class="image">
                      <img src={!!asset("images/gallery_images/$gg->image")!!}>
                    </div>
                      @endif
                   
                 @if($id!=23)  <h6>{{$gg->heading}}</h6> @endif
                </li>
                @endforeach  
              </ul>
              <div class="load-more-btn text-center sloadi">
                <a href="javascript:;" class="blue-btn load-more">Load more</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
            </div>
          </div>  
        </div>      
      </div>

    {{--  <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div>--}}
</div>
@endsection
