@extends('admin.layouts.main')


@section('content')

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Productos</h3>
						</div>
						<div class="panel-body">
							
							<div class="row">
								<div class="col-md-6">

									<div class="form-group">
										<label>Nombre del producto</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>Categoría</label>
										<select class="form-control" name="category_id">
											@foreach($categories as $category)
												<option value="{{ $category->id }}" style="font-weight: bold">{{ $category->name }}</option>
												@foreach($category->subcategories as $subcategory)
												<option value="{{ $category->id }}" data-subcategory-id="{{ $subcategory->id }}">&nbsp;&nbsp;&nbsp;{{ $subcategory->name }}</option>
												@endforeach
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label>Descripción</label>
										<textarea class="form-control"></textarea>
									</div>

								</div>
							</div>




						</div>
					</div>

@endsection


@section('custom-js')

@endsection