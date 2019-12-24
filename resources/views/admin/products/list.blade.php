@extends('admin.layouts.main')

@section('title', 'Productos')


@section('custom-css')
	<style type="text/css">
		.product-table > tbody > tr > td {
			vertical-align: middle;
		}
		.product-img {
			width: 65px;
		    padding: 2px;
		    background-color: #BBB;
		}
	</style>
@endsection


@section('content')

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Productos
								<div class="btn-group" style="float:right">
									<a href="{{ route('admin.products.create') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Agregar producto</a>
								</div>
							</h3>
						</div>
						<div class="panel-body">

							<div style="text-align: right; margin-bottom: 20px">
								
								<div class="filter" style="width: 180px; text-align: left; margin-right: 50px">
									Filtrar categoría
									<select name="category" class="form-control" autocomplete="off">
										<option value="all">Todas</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}" {{ request()->category == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="filter" style="width: 180px; text-align: left;">

									Ordenar
									<select name="order" class="form-control" autocomplete="off">
										<option value="recently_created" {{ request()->order == "recently_created" ? "selected" : "" }}>Recientemente creado</option>
										<option value="recently_updated" {{ request()->order == "recently_updated" ? "selected" : "" }}>Recientemente actualizado</option>
										<option value="name_asc" {{ request()->order == "name_asc" ? "selected" : "" }}>Nombre (a-z)</option>
										<option value="name_desc" {{ request()->order == "name_desc" ? "selected" : "" }}>Nombre (z-a)</option>
										<option value="code_asc" {{ request()->order == "code_asc" ? "selected" : "" }}>Código (a-z)</option>
										<option value="category_name" {{ request()->order == "category_name" ? "selected" : "" }}>Nombre de categoría (a-z)</option>
									</select>

								</div>

							</div>





							<table class="table product-table">
								<thead>
									<tr>
										<th><!-- Ver mas --></th>
										<th><!--Foto--></th>
										<th>Código</th>
										<th>Nombre</th>
										<th>Categoria</th>
										<th>Subcategoría</th>
									</tr>
								</thead>
								<tbody>
									@if($products->count() > 0)
										@foreach($products as $product)
										<tr>
											<td><a class="btn btn-primary" href="{{ route('admin.products.details', $product->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
											<td><img class="product-img" src="{{ $product->thumbnailUrl() }}"></td>
											<td>{{ $product->code }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->category->name }}</td>
											<td>@if($product->subcategory) {{ $product->subcategory->name }} @endif</td>
											<td></td>
										</tr>
										@endforeach
									@else
										<tr><td colspan="6" style="text-align: center;">No se encontraron resultados</td></tr>
									@endif
								</tbody>
							</table>

							<div style="text-align: center;">
								{{ $products->appends(request()->input())->links() }}
							</div>
						</div>
					</div>
@endsection


@section('custom-js')

@endsection