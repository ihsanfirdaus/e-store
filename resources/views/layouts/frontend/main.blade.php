<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-STORE - @stack('title')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/style.css')}}" />

	<link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">

</head>

<body>
	<!-- HEADER -->
	@include('layouts.frontend.header')
	<!-- /HEADER -->

	<!-- CONTENT -->
	@yield('content')
	<!-- /CONTENT -->
	
	<!-- FOOTER -->
	@include('layouts.frontend.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
