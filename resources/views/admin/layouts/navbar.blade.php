		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="{{ route('admin.home') }}"><img src="{{ asset('resources/admin/img/logo.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="{{ route('home') }}" data-toggle="tooltip" data-placement="bottom" title="Ir al sitio web" target="_blank"><span class="glyphicon glyphicon-link"></span></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('admin.account') }}"><i class="lnr lnr-user"></i> <span>Mi cuenta</span></a></li>
								<li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();$('#logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Cerrar sesión</span></a></li>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>