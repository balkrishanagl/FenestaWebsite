@if(!$appreciations->isEmpty())
      <div class="customer-appreciation-sec">
        <div class="container-fluid">
          <div class="slider-box">
              <div class="heading">
            <h4 class="text-center">Customer Appreciations
            <a href="{{url('/customer-reviews')}}" class="blue-btn">View All</a></h4>
              </div>
            <div class="customer-apprec-slider owl-carousel">
                @php $daod = 200; @endphp
                 @foreach($appreciations as $ak => $appreciation)
              <div class="item"  @if($ak>0) data-aos-delay="{{ $daod }}" @endif >
                   @php $daod = $daod+200; @endphp 
                <div class="heading">
                  <div class="image"><img src="{!!asset("images/appreciation/$appreciation->image")!!}"><span></span></div>
                  <div class="right">
                    <div class="name">{{ $appreciation->name }}</div>
                    <div class="date"> @if($appreciation->city!='') {{$appreciation->city}} @else {{date("d M Y",strtotime($appreciation->created_at))}} @endif   <img src="{{ asset('images/site_images/globe.png') }}"> 
                      </div>
                  </div>
                </div>
                  <p class="addReadMore showlesscontent"> {{ strip_tags($appreciation->description) }} </p>
              </div>
            @endforeach             
            </div>
            <div class="cutomer-view-all for-mob"><a href="{{url('/customer-reviews')}}" class="blue-btn">View All</a></div>
          </div> 
        </div>
      </div>  
@endif