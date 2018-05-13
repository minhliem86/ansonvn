<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>An Son Company</title>
	<link rel="shortcut icon" href="{{asset('public')}}/favicon.ico" type="image/x-icon">
	<link rel="icon" href="{{asset('public')}}/favicon.ico" type="image/x-icon">

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- master stylesheet -->
	<link rel="stylesheet" href="{{asset('public/assets/Frontend')}}/css/style.css">
	@yield('css')
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="{{asset('public/assets/Frontend')}}/css/responsive.css">


</head>
<body>
  @include('Frontend::layouts.header')
		@yield('content')
	@include('Frontend::layouts.footer')

	@include('Frontend::layouts.scrollTop')
	<!-- main jQuery -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery-1.11.1.min.js"></script>
	<!-- bootstrap -->
	<script src="{{asset('public/assets/Frontend')}}/js/bootstrap.min.js"></script>
	<!-- bx slider -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.bxslider.min.js"></script>
	<!-- bx flexslider -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.flexslider.js"></script>
	<!-- count to -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.countTo.js"></script>
	<!-- owl carousel -->
	<script src="{{asset('public/assets/Frontend')}}/js/owl.carousel.min.js"></script>
	<!-- validate -->
	<script src="{{asset('public/assets/Frontend')}}/js/validate.js"></script>
	<!-- mixit up -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.mixitup.min.js"></script>
	<!-- easing -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.easing.min.js"></script>
	<!-- gmap helper -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
	<!--gmap script-->
	<script src="{{asset('public/assets/Frontend')}}/js/gmaps.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/js/map-helper.js"></script>
	<!-- video responsive script -->
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.fitvids.js"></script>
	<!-- jQuery ui js -->
	<script src="{{asset('public/assets/Frontend')}}/assets/jquery-ui-1.11.4/jquery-ui.js"></script>
	<!-- fancy box -->
	<script src="{{asset('public/assets/Frontend')}}/assets/fancyapps-fancyBox/source/jquery.fancybox.pack.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/js/jquery.appear.js"></script>

	<!-- revolution slider js -->
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="{{asset('public/assets/Frontend')}}/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>



	<!-- thm custom script -->
	<script src="{{asset('public/assets/Frontend')}}/js/custom.js"></script>

	@yield('script')

</body>
</html>
