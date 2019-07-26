@extends('admin.layouts.main')


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
							<table class="table product-table">
								<thead>
									<tr>
										<th><!-- Ver mas --></th>
										<th><!--Foto--></th>
										<th>Id</th>
										<th>Nombre</th>
										<th>Categoria</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td><a class="btn btn-primary" href="{{ route('admin.products.details', $product->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
										<td><img class="product-img" src="{{ $product->thumbnailUrl() }}"></td>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->category->name }} @if($product->subcategory) {{ ' > '.$product->subcategory->name }} @endif</td>
										<td></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

@endsection


@section('custom-js')

@endsection