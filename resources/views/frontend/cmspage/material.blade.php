@extends('frontend.layouts.template_page')
@section('content')
<style>
    .mt_block .img_block {
    height: auto;
}
</style>
        <div class="material-sec">
            
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
  
       @if(empty($banner_image))
        <picture>
          <source srcset="{{ asset('images/site_images/blog-banner.jpg') }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/blog-mobile-banner.jpg') }}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/site_images/site_images/blog-banner.jpg') }}">
        </picture> 
         @else
         <picture>
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:768px)">
          <source srcset="{{ asset('images/'.$pageData->banner_image) }}" media="(min-width:320px)">
          <img src="{{ asset('images/'.$pageData->banner_image) }}">
        </picture> 
        @endif 
        
        <div class="heading"><div class="container-fluid">        @if(!empty($title))
          <h1>   {!! $title !!}</h1>
        @else
          <h1> Material </h1>
        @endif
           </div></div> 
    
    
      </div>
    
      <div class="inner-page-content">
        <div class="container-fluid">
          <div class="content">
            @if($sub_text!='')
              {!!$sub_text!!}
            @endif
            <div class="explore-more"><a href="javascript:;">Explore More <span><img src="{{asset('images/site_images/images/about/explore-more.png')}}" alt=""></span></a></div>
          </div>
        </div>
      </div>

		<div class="material_tabs" id="navbar_top">
			<div class="container">
				<ul class="tab_list" data-aos="fade-up">
					<li class="active">
						<a class="nav-link scrollTo active" href="#upvc"><span>uPvc</span></a>
					</li>
					<li>
						<a class="nav-link scrollTo" href="#aluminium"><span>Aluminium</span></a>
					</li>
					<li>
						<a class="nav-link scrollTo" href="#internal-door"><span>Internal Door</span></a>
					</li>
				</ul>
			</div>	
		</div>
		<div class="upvc_block mt_block" id="upvc">
			<div class="container">
				<div class="inner">
					<div class="row">
                        
                        @foreach($upvcdata as $updt)
                          @php if($updt->type==1){ $pty ='window'; }else{ $pty ='door'; }
                        $wtyp = strtolower($updt->slug);
                        @endphp
                        <div class="col-md-6">
                            <div class="img_block" data-aos="zoom-in">
                                <img src="{{asset("images/windowdoortype/$updt->fullimage")}}"" alt="{{$updt->title}}">
                                <div class="overlay">
                                    <h3>{{$updt->title}}</h3>
                                    <div class="copy">
                                        {!!\Illuminate\Support\Str::limit($updt->short_description,250)!!}
                                        <a href="{{url("/$pty/$wtyp")}}" class="btn">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="copy_block" data-aos="fade-up">
                                 @if($content!='')
              {!!$content!!}
            @endif
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="aluminium_block mt_block" id="aluminium">
			<div class="container">
				<div class="inner">
					<div class="row">
                         @foreach($almdata as $updt)
                          @php if($updt->type==1){ $pty ='window'; }else{ $pty ='door'; } 
                         $wtyp = strtolower($updt->slug);

                        @endphp
                        <div class="col-md-6">
                            <div class="img_block" data-aos="zoom-in">
                                <img src="{{asset("images/windowdoortype/$updt->fullimage")}}" alt="{{$updt->title}}">
                                <div class="overlay">
                                    <h3>{{$updt->title}}</h3>
                                    <div class="copy">
                                       {!!\Illuminate\Support\Str::limit($updt->short_description,250)!!}
                                        <a href="{{url("/$pty/$wtyp")}}" class="btn">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                        <div class="col-md-12">
                            <div class="copy_block" data-aos="fade-up">
                                 @if($content2!='')
              {!!$content2!!}
            @endif
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="id_block mt_block" id="internal-door">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-md-6">
							<div class="copy_block" data-aos="fade-right">
								@if($content3!='')
              {!!$content3!!}
            @endif
							</div>
						</div>
						 <div class="col-md-6">
                            
							<div class="img_block" data-aos="fade-left">
								<img src="{{asset("images/windowdoortype/$internaldata->fullimage")}}" alt="{{$internaldata->title}}">
								<div class="overlay">
									<h3>{{$internaldata->title}}</h3>
									<div class="copy">
										 @php $indg = strtolower($internaldata->slug) @endphp {!!\Illuminate\Support\Str::limit($internaldata->short_description,250)!!}
										<a href="{{url("/door/$indg")}}" class="btn">Explore</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		
	
      
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
    @include('frontend._partials.relatedblog')
    
    {{--  <div class="about-finesta mt60">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
            
            @if($about)
            {!! $about !!}
            @endif
          </div>
        </div>
      </div> --}}

</div>
@endsection

