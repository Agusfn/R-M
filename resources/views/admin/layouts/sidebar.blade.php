		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ route('admin.covers.overview') }}" {{ request()->is('*/portadas*') ? "class=active" : "" }}><i class="lnr lnr-store"></i> <span>Portadas y destacados</span></a></li>
						<li><a href="{{ route('admin.products.list') }}" {{ request()->is('*/productos*') ? "class=active" : "" }}><i class="lnr lnr-tag"></i> <span>Productos</span></a></li>
						<li><a href="{{ route('admin.categories.list') }}" {{ request()->is('*/categorias*') ? "class=active" : "" }}><i class="lnr lnr-text-align-justify"></i> <span>Categorias</span></a></li>
					</ul>
				</nav>
			</div>
		</div>