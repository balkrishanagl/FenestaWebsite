<header>
    <div class="container-fluid">
      <div class="inner-header">
        <div class="logo">
          <a href="{{ url('/') }}">
              <img src="{{ asset('images/logo/'.$datasettings['logo']) }}"></a></div>
        <div class="header-right">
          <div class="top">
            <a href="javascript:;"><img src="{{ asset('images/site_images/broucher.png') }}">Brochure</a>
            <a href="javascript:;"><img src="{{ asset('images/site_images/enquire.png') }}">Enquire</a>
            <a href="tel:{{ $datasettings['headerphoneno'] }}"><img src="{{ asset('images/site_images/phone.png') }}">{{ $datasettings['headerphoneno'] }}</a>
          </div>
          <div class="bottom">
            <ul class="menu-list">
              <li><a href="{{ URL('/') }}">Home</a></li>
              <li class="drop-down"><a href="javascript:;">About Us</a></li>
              <li><a href="javascript:;">Products</a></li>
              <li><a href="javascript:;">Why Fenesta</a></li>
              <li><a href="javascript:;">Solutions</a></li>
              <li><a href="javascript:;">Customize</a></li>
              <li class="drop-down"><a href="javascript:;">Contact Us</a></li>
            </ul>
            <div class="search-box">
              <span class="search-icon">
                <img class="search-image" src="{{ asset('images/site_images/search.png') }}">
                <img class="mob-search-image" src="{{ asset('images/site_images/search-blue.png') }}">
              </span>
            </div>
            <div class="mob-locate-icon">
              <img class="" src="{{ asset('images/site_images/locate-icon-blue.png') }}"> Gurugram
            </div>
          </div>
        </div>
      </div>
    </div>
  </header> 
 