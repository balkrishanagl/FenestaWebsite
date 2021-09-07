@extends('frontend.layouts.template_page')
@section('content')

        <div class="blog-sec blog-detail-sec">
    @include('frontend.layouts.breadcrumb')
            
      @include('frontend._partials.blogcategory')
@php
             $mL = [1=>'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
@endphp

      <div class=" blog-info-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="left-col">              
              <h4>Blog : {{$mL[$month]}} {{$year}}</h4>
              <div class="recommend-slider owl-carousel" data-aos="fade-up">
                    <div class="item">
                @foreach($recomresult as $row)
                  <div class="box">
                    <div class="image"><img src="{{ asset('images/'.'/'.$row->image) }}"></div>
                    <div class="content">
                      <div class="date"><img src="{{ asset('images/site_images/calender.png') }}">{{  date('M d, Y',strtotime($row->posted_date))   }}</div>
                      <h4>{{ substr(strip_tags($row->name), 0, 28) }}...</h4>
                      <p>{{ $row->short_description }}</p>
                      <a href="{{App\Models\BlogPostModel::getPostUrl($row->slug)}}" class="blue-btn">Read More</a>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="recommend-slider-mob owl-carousel">
                   @foreach($recomresult as $row)
                    <div class="item">
                  <div class="image"><img src="{{ asset('images/'.'/'.$row->image) }}"></div>
                  <div class="content">
                      <div class="date"><img src="{{ asset('images/site_images/calender.png') }}">{{  date('M d, Y',strtotime($row->posted_date))  }}</div>
                      <h4>{{ $row->name }}</h4>
                      <p>{{ $row->short_description }}</p>
                      <a href="{{App\Models\BlogPostModel::getPostUrl($row->slug)}}" class="blue-btn">Read More</a>
                    </div>
                </div>   
                   @endforeach
              </div>
            </div>
     
           @include('frontend._partials.sidebar')
                 
          </div>
        </div>
      </div>
    
    @include('frontend._partials.customerapp')

    @include('frontend._partials.faq')
</div>
@endsection

