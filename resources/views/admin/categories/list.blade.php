@extends('admin.layouts.main')

@section('title', 'Categorías')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">

<style type="text/css">
.handle {
	cursor: grab;
}

#categories_table .handle {
	display: none;
}
</style>

@endsection


@section('content')


					<div class="panel panel-headline">
						<div class="panel-heading" style="padding-bottom: 10px">
							<h3 class="panel-title">
								Categorías de productos
								<div style="float: right">
									<div class="btn-group">
										<button class="btn btn-success" data-toggle="modal" data-target="#add_category_modal"><i class="fa fa-plus" aria-hidden="true"></i> Agregar categoría</button>
									</div>
									<div class="btn-group">
										<button id="reorder_btn" class="btn btn-info">Reordenar</button>
										<button id="save_order_btn" class="btn btn-primary" style="display: none">Guardar orden</button>
									</div>
								</div>
							</h3>
						</div>
						<div class="panel-body">


							<table class="table" id="categories_table">
								<thead>
									<tr>
										<th></th>
										<th>Nombre</th>
										<th>Nombre en url</th>
										<th>Productos</th>
										<th>Subcategorías</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr data-category-id="{{ $category->id }}">
										<td><i class="fa fa-bars handle" aria-hidden="true"></i></td>
										<td>{{ $category->name }}</td>
										<td>{{ $category->name_slug }}</td>
										<td>{{ $category->products()->count() }}</td>
										<td>{{ $category->subcategories->count() }}</td>
										<td><a href="{{ route('admin.categories.details', $category->id) }}" class="btn btn-primary">Ver </a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>

					<form action="{{ url('admin/categorias/reordenar') }}" method="POST" id="reorder_categories_form">
						@csrf
						<input type="hidden" name="ordered_categories_json">
					</form>

@endsection


@section('body-end')
		<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Agregar nueva categoría</h4>
					</div>
					<div class="modal-body">
						<form action="{{ url('admin/categorias/crear') }}" method="POST" style="max-width: 300px;margin: 0 auto;">
							@csrf
							<div class="form-group @if($errors->create_category->has('name')) has-error @endif">
								<label>Nombre categoría:</label>
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if($errors->create_category->has('name'))
                                    <span class="help-block">{{ $errors->create_category->first('name') }}</span>
                                @endif
							</div>
							<div class="form-group @if($errors->create_category->has('name_slug')) has-error @endif">
								<label>Nombre en url categoría:</label>
								<input type="text" class="form-control" name="name_slug" value="{{ old('name_slug') }}">
                                @if($errors->create_category->has('name_slug'))
                                    <span class="help-block">{{ $errors->create_category->first('name_slug') }}</span>
                                @endif
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" onclick="$('#add_category_modal form').submit();">Agregar categoría</button>
					</div>
				</div>
			</div>
		</div>
@endsection





@section('custom-js')
<script type="text/javascript" src="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>

<script type="text/javascript">
	
$(document).ready(function() {

	@if(!$errors->create_category->isEmpty())
	$("#add_category_modal").modal("show");
	@endif

	$("#reorder_btn").click(function() {
		
		$("#categories_table .handle").show();

		$("#categories_table tbody").sortable({
			containment: ".panel-body",
			handle: ".handle"
		});

		$(this).hide();
		$("#save_order_btn").show();

		window.onbeforeunload = function() {
			return "¿Guardaste el orden?"
      	}

	});


	$("#save_order_btn").click(function() {
		window.onbeforeunload = null;
		var orderedIds = JSON.stringify($("#categories_table tbody").sortable("toArray", {attribute: "data-category-id"}));
		$("input[name=ordered_categories_json]").val(orderedIds);
		$("#reorder_categories_form").submit();
	});


	$("input[name=name]").keyup(function() {
		$("input[name=name_slug]").val(slugify($(this).val()));
	});

});


</script>



@endsection