<style>
    .blog-info-sec .right-col ul li a.active {
    color: #0098da;
}
</style>
            <div class="right-col">
              <div class="subscribe" data-aos="fade-up">
                <form name="frmNewsletter"  id="frmNewsletter" method="post" action="{{ url('newsletter') }}">
                        {{ csrf_field() }}
                <h5>Subscribe To Our Blog</h5>
                <input  maxlength="100" placeholder="Enter Email Address"  name="email" id="email" onKeyUp="Remove('frmNewsletter','email')" class="form-control" type="email" name="" placeholder="Email">
                <button type="submit" class="blue-btn white">Subscribe</button>
                <div class="message-box message-box-frmNewsletter" style="display:none;"> <span class="message-text"></span> </div>
                <div class="error" id="error_email" ></div>
                </form>
              </div>
              <div class="popular-blog" data-aos="fade-up">
                <h5>Popular Blogs</h5>
                  
                <ul>
                   @foreach($popular_blog_list as  $popular_blog)
                        <li> <a href="{{App\Models\BlogPostModel::getPostUrl($popular_blog->slug)}}">
                            {{ substr(strip_tags($popular_blog->name), 0, 28) }}...
                        </a> </li>
                    @endforeach
                </ul>
                
              </div>
              <div class="archive" data-aos="fade-up">
                <h5>Archives</h5>
                  @if(!empty($years))
                <ul>
                    @foreach($years as $ki => $yy)
                    
                    @php  
                        $mL = [1=>'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                      $months = App\Models\BlogPostModel::getmonthsofyear($yy->year);
        
                    @endphp
                    
                  <li>
                    <a href="javascript:;" @if(!empty($year)) @if($year==$yy->year)  class="active" @endif @else  @if($ki==0) class="active" @endif @endif>{{ $yy->year }}</a>
                    <div class="content"  @if(isset($year)) @if($year==$yy->year) style="display: block;" @endif @else  @if($ki==0) style="display: block;"  @endif @endif>
                      <div class="months">
                          @if(!empty($months))
                          @foreach($months as $mm) 
                          @php $mnum = $mL[$mm->month] @endphp
                        <a @if(!empty($month)) @if($month==$mm->month and $year==$yy->year)  class="active" @endif @endif  href="{{url("/blog/$yy->year/$mm->month")}}" >{{ $mnum }}</a>
                          @endforeach
                          @endif
                      </div>
                    </div>
                  </li>
                    @endforeach
                    
                </ul>
                    @endif
              </div>
            </div>