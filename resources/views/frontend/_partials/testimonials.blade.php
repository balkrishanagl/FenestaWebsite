
    @if(!$testimonials->isEmpty())
    <div class="client-sec">
       <div class="container-fluid">
			<div class="inner-box">
			  <div class="heading text-center">
            <h2>What Our Clients Say<a href="{{ url('/customer-reviews') }}" class="blue-btn"> view All</a></h2>
            
          </div>
          <div class="client-slider owl-carousel">
               @foreach($testimonials as $testimonial)
            <div class="item">
              <div class="image">
                <img src="{!!asset("images/testimonials/reference/$testimonial->reference_image")!!}">
                  @if(!empty($testimonial->youtube_url))
                <span class="play" data-video-id="{{ $testimonial->youtube_url }}"><img src="{{ asset('images/site_images/play.png') }}"></span>
                  @endif
              </div>
              <div class="desc">
                <div class="pic"><img src="{!!asset("images/testimonials/user/$testimonial->user_image")!!}"></div>
                <div class="right">
                  <h6>{{$testimonial->name}}</h6>
                  <p>{{$testimonial->city}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="view-all for-mob"><a href="{{ url('/customer-reviews') }}" class="blue-btn"> view All</a></div>
        </div>
      </div>
    </div>
    @endif