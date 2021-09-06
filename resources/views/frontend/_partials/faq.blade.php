@if(!$faqs->isEmpty())
      <div class="faq-sec">
        <div class="container-fluid">
          <div class="inner-box">
            <h4 class="text-center" >Frequently Asked Questions</h4>
            <div class="accordion">     
                 
                 @foreach($faqs as $fk => $faq)
              <div class="faq-accord" >
                <h5 @if($fk==0) class="active" @endif >{{ $faq->title }} </h5>
                <div class="content"  @if($fk==0) style="display: block;" @endif>
                  {!! $faq->answer !!}
                </div>
              </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
@endif