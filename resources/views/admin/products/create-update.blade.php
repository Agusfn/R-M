@extends('admin.layouts.main')


@if(!isset($product))
	@section('title', 'Agregar producto')
@else
	@section('title', $product->name)
@endif


@section('custom-css')
	<link href="{{ asset('resources/admin/vendor/dropzone/min/dropzone.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">

	<style type="text/css">
	.dz-image img {
		width: 100%;
		height: 100%
	}
	.dropzone .dz-preview:hover .dz-image img {
	  -webkit-filter: blur(0px);
	  filter: blur(0px); 
	}
	.dz-details {
		display: none;
	}
	</style>
@endsection

@section('content')

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('admin.products.list') }}">Productos</a></li>
							@if(isset($product))
							<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
							@else
							<li class="breadcrumb-item active" aria-current="page">Agregar producto</li>
							@endif
						</ol>
					</nav>

					<div class="panel panel-headline">
						<div class="panel-heading">
							@if(isset($product))
							<h3 class="panel-title">
								Modificar producto
								<div class="btn-group" style="float:right">
									<a class="btn btn-info" href="{{ $product->url() }}" target="_blank">Ver en sitio web <span class="glyphicon glyphicon-globe"></span></a>&nbsp;
									<form action="{{ url('admin/productos/'.$product->id.'/eliminar') }}" method="POST" style="display: inline-block;">
										@csrf
										<button type="button" class="btn btn-danger" onclick="if(confirm('¿Eliminar producto?')) $(this).parent().submit();">Eliminar producto</button>
									</form>
								</div>
							</h3>
							@else
							<h3 class="panel-title">Agregar nuevo producto</h3>
							@endif
						</div>
						<div class="panel-body">
							
							<div class="row">
								<div class="col-md-6">

									@if(isset($product))
									<form action="{{ url('admin/productos/'.$product->id.'/modificar') }}" method="POST" id="product_form">
									@else
									<form action="{{ route('admin.products.create') }}" method="POST" id="product_form">
									@endif
									
										@csrf
										<input type="hidden" name="ordered_img_ids">

										<div class="form-group @error('name') has-error @enderror">
											<label>Nombre del producto</label>
											<input type="text" class="form-control" name="name" value="{{ old('name') ?: ($product->name ?? '') }}">
			                                @error('name')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

										<div class="form-group @error('code') has-error @enderror">
											<label>Código de producto (opcional) <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Código interno para identificar el producto"></span></label>
											<input type="text" class="form-control" name="code" value="{{ old('code') ?: ($product->code ?? '') }}">
			                                @error('code')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

										<div class="form-group @error('category_id') has-error @enderror">

											<label>Categoría</label>
											<select class="form-control" name="category_id" autocomplete="off">
												<option value="-1" selected>Seleccionar</option>

												@foreach($categories as $category)
													<option value="{{ $category->id }}" style="font-weight: bold" 
														@if(old('category_id') == $category->id && !old('subcategory_id')) 
														selected
														@elseif(isset($product) && $product->category_id == $category->id && !$product->subcategory_id)
														selected
														@endif
														>
														{{ $category->name }}
													</option>

													@foreach($category->subcategories as $subcategory)
														<option value="{{ $category->id }}" data-subcategory-id="{{ $subcategory->id }}" 
															@if(old('subcategory_id') == $subcategory->id) 
															selected
															@elseif(isset($product) && $product->subcategory_id == $subcategory->id)
															selected
															@endif
															>
															&nbsp;&nbsp;&nbsp;{{ $subcategory->name }}
														</option>
													@endforeach

												@endforeach

											</select>

			                                @error('category_id')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror

											<input type="hidden" name="subcategory_id" value="{{ old('subcategory_id') ?: (isset($product) ? $product->subcategory_id : '') }}">
										</div>

										<div class="form-group @error('description') has-error @enderror">
											<label>Descripción</label>
											<textarea class="form-control" name="description">{{ old('description') ?: ($product->description ?? '') }}</textarea>
			                                @error('description')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

									</form>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<label>Imágenes del producto</label>
										
										<form action="{{ url('admin/productos/subir-imagen') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="img_dropzone">
											@csrf
										</form>

									</div>


								</div>

							</div>

							<div style="text-align: right; margin-top: 30px">
								<button class="btn btn-primary" id="submit_btn">@if(isset($product)) Modificar producto @else Agregar producto @endif</button>
							</div>


						</div>
					</div>
@endsection


@section('custom-js')
	<script src="{{ asset('resources/admin/vendor/dropzone/min/dropzone.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>

	<script type="text/javascript">

	var app_url = "{{ config('app.url') }}";

	@if(old('ordered_img_ids'))
	var old_images = {!! App\ProductImage::findByJsonIds(old('ordered_img_ids'))->idsAndThumbnailsJson() !!};
	@elseif(isset($product))
	var old_images = {!! $product->images()->ordered()->idsAndThumbnailsJson() !!};
	@endif


	Dropzone.autoDiscover = false;

	$(document).ready(function() {

		var imgDropzone = new Dropzone("#img_dropzone", {
			paramName: "file",
			maxFilesize: 4,
			maxFiles: 5,
			addRemoveLinks: true,
			parallelUploads: 1,
			acceptedFiles: "image/jpeg,image/png",

		init: function() {
				var imgDropzone = this;
				
				if(typeof old_images !== "undefined") {

					old_images = $.map(old_images, function(el) { return el });

					old_images.forEach(function(img) {
						console.log(img);
						var file = { 
			                status: Dropzone.ADDED,
							imageUrl: img.url,
							accepted: true,
						};
						imgDropzone.emit("addedfile", file);
						imgDropzone.emit("thumbnail", file, file.imageUrl);
						imgDropzone.emit("complete", file);
						imgDropzone.files.push(file);
						
						$(file.previewElement).attr("data-image-id", img.id);
					});
				}

			}
		});

		imgDropzone.on("success", function(file, response) {
	   		console.log(file);
		    console.log(response);
		    $(file.previewElement).attr("data-image-id", response.img_id);
		});

		imgDropzone.on("error", function(file, response) {
	   		console.log(file);
		    console.log(response);
		});

		imgDropzone.on("removedfile", function(file) {
			console.log(file);
			console.log($(file.previewElement).data("image-id"));
			if(file.accepted) {
				
				$.ajax({
					type: "POST",
					url: app_url + "/admin/productos/eliminar-imagen",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },

					data: { img_id: $(file.previewElement).data("image-id") },

					success: function(response) {
						console.log(response); // debug
					},

					error: function (jqXhr, textStatus, errorMessage) {
						console.log(jqXhr, textStatus, errorMessage);
						if(jqXhr.status == 422)
							alert(jqXhr.responseText);
						else
							alert("An error ocurred with the request.");
				    }

				});
			}
			//file.previewElement.remove();
		});


	    $("#img_dropzone").sortable({
	        items:'.dz-preview',
	        cursor: 'move',
	        opacity: 0.5,
	        containment: '#img_dropzone',
	        distance: 20,
	        tolerance: 'pointer'
	    });


	    $("select[name=category_id]").change(function() {
	    	var subcategoryId = $(this).find("option:selected").attr("data-subcategory-id");
	    	if(subcategoryId)
	    		$("input[name=subcategory_id]").val(subcategoryId);
	    	else
	    		$("input[name=subcategory_id]").val("");
	    });


	    $("#submit_btn").click(function() {

	    	var orderedImgIds = $("#img_dropzone").sortable("toArray", {attribute: "data-image-id"});
	    	orderedImgIds = JSON.stringify(orderedImgIds.filter(Boolean));

	    	$("input[name=ordered_img_ids]").val(orderedImgIds);

	    	$("#product_form").submit();
	    });


	});




	</script>

@endsection