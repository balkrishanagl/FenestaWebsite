@extends('frontend.layouts.template_page')
@section('content')

        <div class="mesh-grill">
                <div class="breadcum position-static">
			<div class="container-fluid">
				<div class="breadcum-box">             
					<a href="{{ url('/') }}">Home <span>»</span></a>
					<span>Brochure</span>
				</div>
			</div>
        </div>
           
		<div class="brochure_wrap">
			<div class="container">
				  @if($content)
                      {!! $content !!}
                    @endif
				<form action="{{url('/submit-brochure')}}" id="brochure" method="post" name="brochure">
                   @csrf
				<div class="row">
                    
					<div class="col-md-7">
						<div class="owl-carousel brochure_carousel">
                            @foreach($bro as $kk => $bb)
							<div class="item">
								<div class="inner">
									<div class="img_block">
										<img src="{{asset("images/brochure/$bb->image")}}" alt="{{$bb->title}}">
									</div>
									<div class="copy">
										<div class="form-group">
											<input type="checkbox" class="checkboxcls" name="brochure_id" value="{{$bb->id}}" id="one{{$kk}}">
											<label for="one{{$kk}}">{{$bb->title}}</label>
										</div>
										
									</div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
					<div class="col-md-5">
						<div class="borchure_form">
							<p>Please Enter Your Details</p>
							
								<div class="form-group">
									<input name="username" required type="text" class="form-control" id="username" placeholder="Name*">
									<span><img src="{{asset('images/site_images/broucher-icon1.png')}}" alt=""></span>
								</div>
                                <div class="error" id="error_username" ></div>
								<div class="form-group">
									<input name="userphone" id="userphone" required type="text" class="form-control" placeholder="Phone No*">
									<span><img src="{{asset('images/site_images/broucher-icon2.png')}}" alt=""></span>
								</div>
                                <div class="error" id="error_userphone" ></div>
								<div class="form-group">
									<input name="email" id="email" required type="email" class="form-control" placeholder="Email*">
									<span><img src="{{asset('images/site_images/broucher-icon3.png')}}" alt=""></span>
								</div>
                                <div class="error" id="error_email" ></div>
								<div class="form-group">
									<button  id="submit-btn-brochure" class="btn"><img src="{{asset('images/site_images/broucher-icon4.png')}}" alt="">DOWNLOAD BROCHURE</button>
								</div>
                                <div class="message-box message-box-brochure" style="display:none;"> <span class="message-text"></span> </div>
                                <div class="message-error-box message-error-box-brochure" style="display:none;"> <span class="message-text"></span> </div>
                         
								<small>Mandatory Fields*</small>
							
						</div>
					</div>
                   
				</div> </form>
			</div>
		</div>

    @include('frontend._partials.customerapp')
    @include('frontend._partials.faq')
{{--
      <div class="about-finesta">
        <div class="container-fluid">
          <h4>About Fenesta </h4>
          <div class="content">
           @if(!empty($pageData->about))
                {!! $pageData->about !!}

            @endif
          </div>
        </div>
      </div> --}}
</div>
@endsection
