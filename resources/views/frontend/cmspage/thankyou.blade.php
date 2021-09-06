@extends('frontend.layouts.template_page')
@section('content')
<style>
    .otpMsgSuccs{
        color:green;
    }
</style>
<div class=" upvc-window-sec">

      	<div class="thanku_wrapper">
			<div class="container">
				@if($content)
                {!!$content!!}
                @endif
				<div class="text-center">
					<ul class="thanku_list">
						<li><a href="{{ URL('/') }}">Home</a></li>
						<li><a href="{{ URL('/about-us') }}">About Us</a></li>
						<li><a href="{{ URL('/window') }}">Products</a></li>
						<li><a href="{{ URL('/style-benefits') }}">Why Fenesta</a></li>
						<li><a href="{{ URL('/showcase/clientele') }}">Solutions</a></li>
						<li><a href="https://www.fenesta.com/VisualizeDesign/index.html">Customize</a></li>
						<li><a href="{{ URL('/locate-us') }}">Contact Us</a></li>
					</ul>                                                 
				</div>	
				@if($about)
                {!!$about!!}
                @endif
				
				<div class="science_block">
					<h3>Science @ Work</h3>
					<div class="owl-carousel science_carousel">
                         @foreach($featurebenefit as  $ki => $ffbb)
                        
                              @php  $tit = explode(' ',$ffbb->othername) @endphp
                  
						<div class="item">
							<div class="icon">
								<a href="{{url("/features-benefits/$ffbb->slug")}}"><img src="{{ asset("images/featurebenefit/icon/$ffbb->onhovericon")}}" alt="@if(isset($tit[0])) {{$tit[0]}} @endif"></a>
							</div>
							<p><span>@if(isset($tit[0])) {{$tit[0]}} @endif</span> @if(isset($tit[1])) {{$tit[1]}} @endif @if(isset($tit[2])) {{$tit[2]}} @endif @if(isset($tit[3])) {{$tit[3]}} @endif</p>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
    @include('frontend._partials.imagegallery') 
    @include('frontend._partials.testimonials')
    @include('frontend._partials.customerapp')

</div>
@endsection

