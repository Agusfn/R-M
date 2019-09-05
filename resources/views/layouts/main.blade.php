<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<title>@yield('title') - R&M Papelera</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/rs-plugin/css/settings.css') }}" media="screen" />

<!-- StyleSheets -->
<link rel="stylesheet" href="{{ asset('resources/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/custom.css') }}">

@yield('custom-css')

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


<!-- JavaScripts -->
<script src="{{ asset('resources/js/vendors/modernizr.js') }}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-1"> 
  
  @include('layouts.header')
  

  @yield('content')

  
  @include('layouts.footer')
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="{{ asset('resources/js/vendors/jquery/jquery.min.js') }}"></script> 
<script src="{{ asset('resources/js/vendors/wow.min.js') }}"></script> 
<script src="{{ asset('resources/js/vendors/bootstrap.min.js') }}"></script> 
<script src="{{ asset('resources/js/vendors/own-menu.js') }}"></script> 
<script src="{{ asset('resources/js/vendors/jquery.sticky.js') }}"></script> 
<script src="{{ asset('resources/js/vendors/owl.carousel.min.js') }}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('resources/rs-plugin/js/jquery.tp.t.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('resources/rs-plugin/js/jquery.tp.min.js') }}"></script> 
<script src="{{ asset('resources/js/main.js') }}"></script>
<script src="{{ asset('resources/js/custom.js') }}"></script>

@yield('custom-js')

</body>
</html>