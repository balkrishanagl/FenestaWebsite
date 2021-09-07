
@if(!$relatedblog->isEmpty())
      <div class="recent-blog-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" data-aos="fade-up">Related Blog</h4>
            <div class="blog-list">
                @foreach($relatedblog as $rk => $rb)
              <div class="item" @if($rk>0)  data-aos-delay={{ $rk
                   +200 }} @endif data-aos="fade-right">
                <div class="image"><img src="{{asset('images/'. $rb->image )}}"></div>
                  <p>{!! $rb->name !!}</p>
                <a href="{{App\Models\BlogPageModel::getPostUrl($rb->slug)}}" class="blue-btn">Read More</a>
              </div>
                @endforeach
             
                
            </div>
          </div>
        </div>
      </div>
   @endif  