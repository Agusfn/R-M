@extends('admin.layouts.main')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">


<style type="text/css">
.handle {
	cursor: grab;
}
#subcategories_table .handle {
	display: none;
}
</style>

@endsection



@section('content')
					
					
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('admin.categories.list') }}">Categorías</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
								Detalles de categoría
								<div class="btn-group" style="float:right">
									<form action="{{ url('admin/categorias/'.$category->id.'/eliminar') }}" method="POST">
										@csrf
										<button type="button" class="btn btn-danger" onclick="if(confirm('¿Eliminar?')) $(this).parent().submit();">Eliminar categoría</button>
									</form>
								</div>
							</h3>
						</div>
						<div class="panel-body">
							
							<form action="{{ url('admin/categorias/'.$category->id.'/modificar') }}" method="POST">
								@csrf
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group @if($errors->update_category->has('name')) has-error @endif">
											<label>Nombre categoría:</label>
											<input type="text" class="form-control" name="name" value="{{ old('name') ?: $category->name }}">
											@if($errors->update_category->has('name'))
			                                    <span class="help-block">{{ $errors->update_category->first('name') }}</span>
			                                @endif
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group @if($errors->update_category->has('name_slug')) has-error @endif">
											<label>Nombre en url categoría:</label>
											<input type="text" class="form-control" name="name_slug" value="{{ old('name_slug') ?: $category->name_slug }}">
											@if($errors->update_category->has('name_slug'))
			                                    <span class="help-block">{{ $errors->update_category->first('name_slug') }}</span>
			                                @endif
										</div>
									</div>
								</div>

								<button class="btn btn-primary">Guardar</button>
							</form>

						</div>
					</div>

					<div class="panel">
						<div class="panel-heading" style="padding-bottom: 10px">
							<h3 class="panel-title">Subcategorías</h3>
						</div>
						<div class="panel-body">

							<div style="margin-bottom: 20px">
								<div class="btn-group">
									<button class="btn btn-success" data-toggle="modal" data-target="#add_subcategory_modal">Agregar subcategoría</button>
								</div>
								<div class="btn-group">
									<button id="reorder_btn" class="btn btn-info">Reordenar</button>
									<button id="save_order_btn" class="btn btn-primary" style="display: none">Guardar orden</button>
								</div>
							</div>

							<table class="table" id="subcategories_table">
								<thead>
									<tr>
										<th></th>
										<th>Nombre</th>
										<th>Nombre en url</th>
										<th>Productos</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@if($subcategories->count() == 0)
										<tr colspan="4">No hay subcategorías.</tr>
									@else
										@foreach($subcategories as $subcategory)
										<tr data-subcategory-id="{{ $subcategory->id }}">
											<td><i class="fa fa-bars handle" aria-hidden="true"></i></td>
											<td>{{ $subcategory->name }}</td>
											<td>{{ $subcategory->name_slug }}</td>
											<td></td>
											<td><a href="{{ route('admin.subcategories.details', $subcategory->id) }}" class="btn btn-primary">Editar</a></td>
										</tr>
										@endforeach
									@endif

								</tbody>
							</table>

						</div>
					</div>

					<form action="{{ url('admin/subcategorias/reordenar') }}" method="POST" id="reorder_subcategories_form">
						@csrf
						<input type="hidden" name="ordered_subcategories_json">
					</form>

@endsection



@section('body-end')
		<div class="modal fade" id="add_subcategory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Agregar nueva subcategoría</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{ url('admin/subcategorias/crear') }}" method="POST" style="max-width: 300px;margin: 0 auto;">
							@csrf
							<input type="hidden" name="category_id" value="{{ $category->id }}">
							<div class="form-group @if($errors->create_subcategory->has('subcategory_name')) has-error @endif">
								<label>Nombre subcategoría:</label>
								<input type="text" class="form-control" name="subcategory_name" value="{{ old('subcategory_name') }}">
                                @if($errors->create_subcategory->has('subcategory_name'))
                                    <span class="help-block">{{ $errors->create_subcategory->first('subcategory_name') }}</span>
                                @endif
							</div>
							<div class="form-group @if($errors->create_subcategory->has('subcategory_name_slug')) has-error @endif">
								<label>Nombre en url subcategoría:</label>
								<input type="text" class="form-control" name="subcategory_name_slug" value="{{ old('subcategory_name_slug') }}">
                                @if($errors->create_subcategory->has('subcategory_name_slug'))
                                    <span class="help-block">{{ $errors->create_subcategory->first('subcategory_name_slug') }}</span>
                                @endif
							</div>
						</form>					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" onclick="$('#add_subcategory_modal form').submit();">Agregar subcategoría</button>
					</div>
				</div>
			</div>
		</div>
@endsection


@section('custom-js')
<script type="text/javascript" src="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>

<script type="text/javascript">
	
$(document).ready(function() {


	@if(!$errors->create_subcategory->isEmpty())
	$("#add_subcategory_modal").modal("show");
	@endif


	$("#reorder_btn").click(function() {
		
		$("#subcategories_table .handle").show();

		$("#subcategories_table tbody").sortable({
			containment: "parent",
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
		var orderedIds = JSON.stringify($("#subcategories_table tbody").sortable("toArray", {attribute: "data-subcategory-id"}));
		$("input[name=ordered_subcategories_json]").val(orderedIds);
		$("#reorder_subcategories_form").submit();
	});

});


</script>



@endsection