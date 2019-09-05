@extends('admin.layouts.main')

@section('title', $subcategory->category->name.' > '.$subcategory->name)

@section('content')
					
					
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('admin.categories.list') }}">Categorías</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.categories.details', $subcategory->category->id) }}">{{ $subcategory->category->name }}</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{ $subcategory->name }}</li>
						</ol>
					</nav>

	                @if($errors->delete->any())
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						{{ $errors->delete->first() }}
					</div>
	                @endif

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">
								Detalles de subcategoría
								<div class="btn-group" style="float:right">
									<form action="{{ url('admin/subcategorias/'.$subcategory->id.'/eliminar') }}" method="POST">
										@csrf
										<button type="button" class="btn btn-danger" onclick="if(confirm('¿Eliminar?')) $(this).parent().submit();">Eliminar subcategoría</button>
									</form>								
								</div>
							</h3>
						</div>
						<div class="panel-body">
							
							<form action="{{ url('admin/subcategorias/'.$subcategory->id.'/modificar') }}" method="POST">
								@csrf
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group @error('name') has-error @enderror">
											<label>Nombre subcategoría:</label>
											<input type="text" class="form-control" name="name" value="{{ old('name') ?: $subcategory->name }}">
			                                @error('name')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group @error('name_slug') has-error @enderror">
											<label>Nombre en url categoría:</label>
											<input type="text" class="form-control @error('name_slug') is-invalid @enderror" name="name_slug" value="{{ old('name_slug') ?: $subcategory->name_slug }}">
			                                @error('name_slug')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>
									</div>
								</div>

								<button class="btn btn-primary">Guardar</button>
							</form>

						</div>
					</div>

@endsection


@section('custom-js')
@endsection