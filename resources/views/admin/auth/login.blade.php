<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/admin/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('resources/admin/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('resources/admin/css/custom.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('resources/admin/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('resources/admin/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="content">
						<div class="header">
							<div class="logo text-center"><img src="{{ asset('resources/admin/img/logo.png') }}" alt="Klorofil Logo"></div>
							<p class="lead">Iniciar sesión en la cuenta</p>
						</div>
						<form class="form-auth-small" method="POST" action="{{ route('admin.login') }}">
							@csrf
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Email</label>
								<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="signin-email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only ">Contraseña</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="signin-password" placeholder="Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group clearfix">
								<label class="fancy-checkbox element-left">
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									<span>Recordarme</span>
								</label>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">INICIAR SESIÓN</button>
							<div class="bottom">
								<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">¿Olvidó la contraseña?</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
