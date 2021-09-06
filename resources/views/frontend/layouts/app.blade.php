<!DOCTYPE html>
<html lang="en">
	@include('frontend._partials.head')
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P83WHJ" height="0" width="0" loading="lazy" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
	@include('frontend._partials.header')
		@yield('content')
	@include('frontend._partials.footer')
</body>
</html>