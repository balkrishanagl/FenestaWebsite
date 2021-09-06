  <style>
      .image-gallery .heading .blue-btn {
    opacity: 1;
    }
</style>

      @if(!$gallerys->isEmpty())




      <div class="image-gallery">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="heading" data-aos="fade-up">
              <h4>Image Gallery</h4>
                
                 <a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a>
            </div>
            <div class="image-gallery-slider owl-carousel">
                  @foreach($gallerys as $gallery)
              
            <div class="item">
              <div class="image"><img src={!!asset("images/gallery_images/$gallery->image")!!}></div>
              <div class="title">{!! $gallery->heading !!}</div>
            </div>
               
                  @endforeach  
            </div>
            <div class="experinece-ar for-mob"><a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a></div>
          </div>
        </div>
      </div>


{{--
    <div class="image-gallery section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
            <div class="heading" data-aos="fade-up">
              <h4>Image Gallery   </h4>
                 <a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a>
          
            </div>
            
          <div class="image-gallery-slider owl-carousel">
            @foreach($gallerys as $gallery)
         
            <div class="item">
              <div class="image"><img src={!!asset("images/gallery_images/$gallery->image")!!}></div>
              <div class="title">{!! $gallery->heading !!}</div>
            </div>
            @endforeach  
          </div>
          <div class=" for-mob">
            <div class="slick-image-gallery slick-slider">
                 @foreach($gallerys as $gallery)
         
              <div class="slick-slide">
                <img src={!!asset("images/gallery_images/$gallery->image")!!}>
                <div class="title">{!! $gallery->heading !!}</div>
              </div>
                @endforeach  
            </div> 
            <div class="slick-image-gallery-thumb slick-slider">
                  @foreach($gallerys as $gallery)
         
              <div class="slick-slide"><img src={!!asset("images/gallery_images/$gallery->image")!!} ></div>
                  @endforeach  
            
            </div> 
          </div>
          <div class="experinece-ar for-mob"><a href="{{ url('/showcase/gallery') }}" class="blue-btn">View More</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#latest-updates" data-id="wide-range">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
          <img src="{{ asset('images/site_images/drop-down.png') }}">
        </a>
      </div> 
    </div>

--}}
    @endif 