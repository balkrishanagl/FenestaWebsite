@extends('frontend.layouts.template_page')
@section('content')
@php
 use App\Models\Handlelock;
@endphp
        <div class="window-handle-sec">
<style>
    .window-handle-sec .inner-top-nav-tab.active {
     padding-top: 0px;
    }
</style>
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
          <h1>  Handles and Locks </h1>
        @endif
           </div></div> 
      </div>

      <div class="inner-top-nav">
        <div class="container-fluid">
          <ul>
              @foreach($windows as $kk => $ww)
                @php $tttt = strtolower($ww->type); $slug = strtolower($ww->slug);  @endphp
            <li><a href="javascript:;" @if($kk==0 and $uritype==$tttt) class='active' @endif  ><img class="nohover" src="{{ asset('images/windowdoortype/'.$ww->image) }}"><img class="hover" src="{{ asset('images/windowdoortype/'.$ww->hoverimage) }}">{{ $ww->title }}</a></li>
              @endforeach
              @foreach($doors as $ki => $dd)
                @php $tttt = strtolower($dd->type); @endphp
            <li><a href="javascript:;" @if($ki==0 and $uritype==$tttt ) fvxdgfdf class='active' @endif><img class="nohover" src="{{ asset('images/windowdoortype/'.$dd->image) }}"><img class="hover" src="{{ asset('images/windowdoortype/'.$dd->hoverimage) }}">{{ $dd->title }}</a></li>
              @endforeach
                     
          </ul>
          <div class="inner-top-nav-tab">
            <h4 class="text-center">Handles And Locks</h4>
              @php $handlelockscount = 0; @endphp
              @foreach($windows as $kk => $ww)
              @php $slug = strtolower($ww->slug); @endphp
            <div class="inner-top-nav-content {{$slug}}" @if($kk==0 and $uritype=='window')  style="display: block;" @else style="display: none;" @endif>
              <div class="handle-list">
                  @php  
                   $handlelocks = Handlelock::where('is_delete','0')->where('windowdoor',$ww->id)->get();
                   $handlelockscount = count($handlelocks);
                  @endphp
                  @foreach($handlelocks as $hlk => $hlv)
                <div class="item">
                  <div class="images"><img src="{{ asset('images/handlelock/'.$hlv->image) }}"></div>
                  <div class="content">
                    <strong>{!! $hlv->title !!}</strong>
                    <p>{{ $hlv->content }}</p>
                  </div>
                </div>
                 @endforeach 
              </div>
                @if($handlelockscount>15)
              <div class="load-btn"><a href="javascript:;" class="blue-btn load-more">Load More</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
                @endif
            </div>
              @endforeach
              @php $handlelocks1count = 0; @endphp
               @foreach($doors as $kk => $dd)
               @php $slug = strtolower($dd->slug); @endphp
            <div class="inner-top-nav-content {{$slug}}"  @if($kk==0 and $uritype=='door')  style="display: block;" @else style="display: none;" @endif>
              <div class="handle-list">
                   @php
                   $handlelocks1 = Handlelock::where('is_delete','0')->where('windowdoor',$dd->id)->get();
                  $handlelocks1count = count($handlelocks1);
                  @endphp
                  @foreach($handlelocks1 as $hlk1 => $hlv1)
                <div class="item">
                  <div class="images"><img src="{{ asset('images/handlelock/'.$hlv1->image) }}"></div>
                  <div class="content">
                    <strong>{!! $hlv1->title !!}</strong>
                    <p>{{ $hlv1->content }}</p>
                  </div>
                </div>
                 @endforeach 
              </div>
                @if($handlelocks1count>15)
              <div class="load-btn">
                <a href="javascript:;" class="blue-btn load-more">Load More</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
                @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>

    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')


    {{--  <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta {{ $pageData->page_title }}</h4>
          <div class="content">
           @if(!empty($pageData->about))
            {!! $pageData->about !!}
        
        @endif
          </div>
        </div>
      </div> --}}
</div>

<script>  
    
    $('.inner-top-nav ul li a').click(function(ev){
    ev.preventDefault();
    $(this).addClass('active');
    $(this).parent().siblings().find('a').removeClass('active');
    $('.inner-top-nav-tab .inner-top-nav-content').hide();
    $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();

   


    handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length;

    if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
       var handleId = $(this).attr('href');
      clienHeight = $('.client-sec').offset().top - clienDistTop ;
      if($(window).width() > 1200){
        $('html,body').animate({scrollTop:$(handleId).offset().top - 240  },1000);
      }  
    }

    $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');

  });
    
    
  // $('.inner-top-nav ul li a').click(function(ev){
  //   ev.preventDefault();
  //   $(this).addClass('active');
  //   $(this).parent().siblings().find('a').removeClass('active');
  //   $('.inner-top-nav-tab .inner-top-nav-content').hide();
  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).fadeIn();


  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).addClass('active');
  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).siblings().removeClass('active');
    
  //   handleSize = $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list .item').length;

  //   $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.handle-list').attr('rel', handleSize);
  //   // alert(handleSize);
  //    if($(window).width() > 767){
  //     if(handleSize <= 15){
  //       $('.inner-top-nav-tab .inner-top-nav-content').eq($(this).parent().index()).find('.load-btn').hide();
  //     }
  //   }

  //   if($('.window-handle-sec .inner-top-nav .window-handle-fix').hasClass('fixed')){
  //      var handleId = $(this).attr('href');
  //     clienHeight = $('.client-sec').offset().top - clienDistTop ;
  //     if($(window).width() > 1200){
  //       $('html,body').animate({scrollTop:$(handleId).offset().top - 240  },1000);
  //     }  
  //   }


  //   $(".slick-option-gallery-thumb, .slick-option-gallery").slick('setPosition');

  // });
</script>
@endsection

