@extends('frontend.layouts.template_page')
@section('content')

        <div class="blog-sec blog-detail-sec">
    @include('frontend.layouts.breadcrumb')
            {{--
    <div class="inner-banner">        
       @if(empty($pageData[0]->banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
        
        <picture>
          <source srcset="{{ asset('images/'.$pageData[0]->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData[0]->banner_image) }}">
        </picture> 
        @endif
        
        
        <div class="heading"><div class="container-fluid">        @if(!empty($pageData[0]->page_description))
            {!! $pageData[0]->page_description !!}
        @else
          <h1>  Fenesta World </h1>
        @endif
           </div></div> 
      </div>
--}}
      @include('frontend._partials.blogcategory')


      <div class=" blog-info-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="left-col">              
              <h4>Latest Blogs</h4>
              <div class="latest-blog" data-aos="fade-up">
                    @php
                        foreach($result as $key => $row){
                        if($key==0){
                    @endphp
                <div class="latest-blog-left" >
                    
                  <div class="image"><img src="{{ asset('images/'.'/'.$row->image) }}"></div>
                  <div class="date"><img src="{{ asset('images/site_images/calender.png') }}">{{  date('M d, Y',strtotime($row->posted_date))   }}</div>
                  <h4>{{ $row->name }}</h4>
                  <p>{{ $row->short_description }}</p>
                  <a href="{{App\Models\BlogPostModel::getPostUrl($row->slug)}}" class="blue-btn">Read More</a>
                </div>
                      @php }else{ 
                      if($key==1){
                      @endphp 
                <div class="latest-blog-right" >
                  <div class="latest-blog-list">
                    @php } @endphp
                    <div class="item">
                      <a href="{{App\Models\BlogPostModel::getPostUrl($row->slug)}}">
                        <div class="image"><img src="{{ asset('images/'.$row->image) }}"></div>
                        <div class="content">
                          <h4>{{ substr(strip_tags($row->name), 0, 28) }}...</h4>
                          <div class="date"><img src="{{ asset('images/site_images/calender.png') }}">{{ date('M d, Y',strtotime($row->posted_date))   }} </div>
                           
                        </div>
                            <a href="{{App\Models\BlogPostModel::getPostUrl($row->slug)}}" class="blue-btn" id="blog_btn">Read More</a>
                      </a>
                    </div>
                    @php 
                  if($key==4){
                  @endphp   
                  </div>
                </div>
                      @php }  } }
                      @endphp 
              </div>
              <h4>Recommended</h4>
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
                  
              {{--
            <div class="right-col">
              <div class="subscribe" data-aos="fade-up">
                <h5>Subscribe To Our Blog</h5>
                <input class="form-control" type="email" name="" placeholder="Email">
                <a href="javascript:;" class="blue-btn white">Subscribe</a>
              </div>
              <div class="popular-blog" data-aos="fade-up">
                <h5>Popular Blogs</h5>
                <ul>
                     @foreach($popular_blog_list as  $popular_blog)
                        <li> <a href="{{App\Models\BlogPostModel::getPostUrl($popular_blog->slug)}}">
                           {{ $popular_blog->name }}</a> </li>
                        @endforeach
                </ul>
              </div>
              <div class="archive" data-aos="fade-up">
                <h5>Archives</h5>
                <ul>
                  <li>
                    <a href="javascript:;" class="active">2021</a>
                    <div class="content" style="display: block;">
                      <div class="months">
                        <a href="javascript:;">January</a>
                        <a href="javascript:;">February </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
              --}}
          </div>
        </div>
      </div>
    
    @include('frontend._partials.customerapp')

    @include('frontend._partials.faq')
</div>
@endsection

