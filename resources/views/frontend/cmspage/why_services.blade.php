@extends('frontend.layouts.template_page')
@section('content')

        <div class="main-sec inner-page">
    @include('frontend.layouts.breadcrumb')
<div class="inner-banner">  
   
    
       @if(empty($pageData->banner_image))
    
      <picture>
          <source srcset="{{ asset('images/site_images/images/quality-innovation-banner.jpg')}}" media="(min-width:768px)">
          <source srcset="{{ asset('images/site_images/images/quality-innovation-banner-mobile.jpg')}}" media="(min-width:320px)">
          <img src="{{ asset('images/site_images/images/quality-innovation-banner.jpg')}}" alt="">
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
          <h1> Quality Innovation </h1>
        @endif
           </div></div> 
      </div>
          
		<div class="qa_section">
			<div class="container-fluid">
				<ul class="qa_list">
                    @php $i=1; @endphp
                    @foreach($resultdata as $sd)
					<li>
						<div class="inner">
							<div class="img_block" @if($i%2==0) data-aos="fade-right" @else data-aos="fade-left"  @endif >
								<img src="{{asset("images/solutions/$sd->mainimage")}}" alt="{{strip_tags($sd->title)}}">
							</div>
							<div class="copy"  @if($i%2==0) data-aos="fade-left" @else data-aos="fade-right" @endif >
								<h3>{{strip_tags($sd->title)}}</h3>
								{!!$sd->description!!}
                                @if($sd->id==2 || $sd->id==26)
                                <a href="{{url('/awards-accreditations')}}" class="btn">Read More</a>
                                @elseif($sd->id==7)
                                <a href="{{url('/features-benefits')}}" class="btn">Read More</a>
                                @elseif($sd->id==9)
                                <a href="{{url('/features-benefits/block-rainwater-seepage')}}" class="btn">Read More</a>
                                @elseif($sd->id==10)
                                <a href="{{url('/features-benefits/protection-from-storm')}}" class="btn">Read More</a>
                                @elseif($sd->id==11)
                                <a href="{{url('/window/upvc-windows/villa')}}" class="btn">Read More</a>
                                @elseif($sd->id==20)
                                <a href="{{url('/locate-us')}}" class="btn">Read More</a>
                                @elseif($sd->id==23)
                                <a href="{{url('/about-dcm')}}" class="btn">Read More</a>
                                @elseif($sd->id==24)
                                <a href="https://www.fenestaopentennis.com/" class="btn">Read More</a>
                                @elseif($sd->id==33)
                                <a href="{{url('/showcase/clientele')}}" class="btn">Read More</a>
                                @endif
							</div>
						</div>	
					</li>
                    @php $i=$i+1; @endphp
                
                    @endforeach
                    
				</ul>
			</div>
		</div>    
    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
     @include('frontend._partials.relatedblog')

   {{--  <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
            {!! $pageData->about !!}
        
        @endif
          </div>
        </div>
      </div>--}}
</div>

@endsection

