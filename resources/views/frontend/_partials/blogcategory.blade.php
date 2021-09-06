@if(!empty($blog_categorys))
      <div class="pdt50 blog-top-nav">
        <div class="container-fluid">
          <ul>
              @foreach($blog_categorys as $bk => $bv)
              
            <li><a href="{{App\Models\BlogPostModel::getCatPostUrl($bv->slug)}}">
                <img class="nohover" src="{{ asset('images/blogcategory/'.$bv->image) }}">
                <img class="hover" src="{{ asset('images/blogcategory/'.$bv->hoverimage) }}">
                {{ $bv->name }} </a></li>
              @endforeach
            
          </ul>
        </div>
      </div>
@endif