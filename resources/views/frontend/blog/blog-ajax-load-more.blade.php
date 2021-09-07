@if($result->count()>0)
        @foreach ($result as $key => $row)
         <li class="common-col-loadmore" style="display: block;">
              <div class="col-white grybg">
                <div class="date"><?php echo date('F j, Y', strtotime($row->posted_date));?></div>
                <div class="comt">{{ App\BlogPostModel::getCommentCounts($row->id) }}</div>
                <div class="clr"></div>
               <a class="read-mr" href="{{App\BlogPostModel::getPostUrl($row->slug)}}">
          <h4>{{ $row->name }}</h4>
            </a>
                <div class="blg-img">
                  <a class="read-mr" href="{{App\BlogPostModel::getPostUrl($row->slug)}}">
          <img src="{{ STATIC_PUBLIC_URL }}/{{ $row->image }}" alt="{{ $row->name }}">
        </a>
                </div>
              </div>
            </li>
          @endforeach
  @endif{{-- result->count() --}} 


   