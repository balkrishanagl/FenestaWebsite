@extends('frontend.layouts.template_page')
@section('content')

        <div class="blog-sec blog-detail-sec">
    @include('frontend.layouts.breadcrumb')

   {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}} 
{{--
  <div class="inner-banner">        
         <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/blog-banner.jpg') }}">
        </picture> 
        <div class="heading">
          <div class="container-fluid">
            <h4>{{ $post_data->name }}</h4>
            <div class="date"><img src="{{ asset('images/site_images/calender-white.png') }}">{{ date('M d, Y',strtotime($post_data->posted_date)) }}</div>
          </div>
        </div> 
      </div>
--}}
      @include('frontend._partials.blogcategory') 
  <div class=" blog-info-sec blog-detail-info-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="left-col">              
              <h4>{{ $post_data->name }}</h4>
              <div class="image"><img src="{{ asset('images/'.$post_data->image) }}" alt="{{ $post_data->name }}"></div>
              {!! $post_data->description !!}
              <div class="pagination">
                <div class="btn-grp">
                <?php if(App\Models\BlogPostModel::getPostPrv($post_data->id)!=''){?>
                
                    <a href="{{App\Models\BlogPostModel::getPostUrl(App\Models\BlogPostModel::getPostPrv($post_data->id)->slug)}}" class="white-btn prev"> Prev
                    </a>
                
                <?php } ?>
                 
                <?php if(App\Models\BlogPostModel::getPostNaxt($post_data->id)!=''){?>
                    <a href="{{App\Models\BlogPostModel::getPostUrl(App\Models\BlogPostModel::getPostNaxt($post_data->id)->slug)}}" class="white-btn next">Next
                    </a>
                  <?php } ?>

                </div>
                <div class="social-link">
                  
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{App\Models\BlogPostModel::getPostUrl($post_data->slug)}}"><img src="{{ asset('images/site_images/fb.png') }}"></a>
                  <a target="_blank" href="https://twitter.com/intent/tweet?text={{ $post_data->page_title }}&amp;url={{App\Models\BlogPostModel::getPostUrl($post_data->slug)}}"><img src="{{ asset('images/site_images/tweet.png') }}"></a>
                  <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{App\Models\BlogPostModel::getPostUrl($post_data->slug)}}&amp;title={{ $post_data->page_title }}"><img src="{{ asset('images/site_images/linked.png') }}" ></a>
                 {{--  <a href="javascript:;"><img src="{{ asset('images/site_images/yt.png') }}"></a> --}}
                  <a href="https://www.instagram.com/?url={{App\Models\BlogPostModel::getPostUrl($post_data->slug)}}" target="_blank"><img src="{{ asset('images/site_images/insta-icon.png') }}"></a>
                </div>
              </div>
              <div class="comment-box">
                <h5>Comments</h5>
            <form name="frmBlog"  id="frmBlog" method="post" action="{{ url('blog/commentPost') }}">        
                    {{ csrf_field() }}
                        <input type="hidden" name="blog_name" value="{{$name}}">
                        <input type="hidden" name="blog_id" value="{{$post_data->id}}">
                <div class="form">
                  <div class="form-group">
                    <input class="form-control" placeholder="Your Name"  maxlength="100" name="name" id="name" onKeyUp="Remove('frmBlog','name')">
                      <div class="error" id="error_name" ></div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email"  maxlength="100"  name="email" id="email" onKeyUp="Remove('frmBlog','email')">
                      <div class="error" id="error_email" ></div>
                  </div>
                  <div class="form-group width-100">
                    <textarea class="form-control" placeholder="Comment"  maxlength="1000" name="message" id="message" onKeyUp="Remove('frmBlog','message')"></textarea>
                  </div>
                </div>
                 <span id="load-img-frmBlog" style="display:none;">
                      <img src="{{ asset('images/site_images/ajax-loader.gif') }}"></span>
                <button id="submit-btn-frmBlog" class="blue-btn prev submitBtn">Submit</button>
                
                 <div class="message-box message-box-frmBlog" style="display:none;">
                  <span class="message-text"></span>
                  </div>
                  </form>
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

