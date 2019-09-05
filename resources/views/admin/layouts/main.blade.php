<!doctype html>
<html lang="en">

<head>
	<title>@yield('title') - Panel Admin R&M</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('resources/admin/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/css/custom.css') }}">

	@yield('custom-css')

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.ico') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('admin.layouts.navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('admin.layouts.sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

	</div>

	@yield('body-end')
	

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('resources/admin/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('resources/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('resources/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('resources/admin/scripts/klorofil-common.js') }}"></script>
	<script src="{{ asset('resources/admin/scripts/custom.js') }}"></script>

	@yield('custom-js')

</body>

</html>
