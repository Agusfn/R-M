@extends('admin.layouts.main')


@if(!$carouselItem)
	@section('title', 'Agregar imágen al slider')
@else
	@section('title', 'Modificar imágen del slider')
@endif


@section('custom-css')
<style type="text/css">

</style>
@endsection


@section('content')


	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.covers.overview') }}">Portadas y productos destacados</a></li>
			@if($carouselItem)
			<li class="breadcrumb-item">Modificar elemento de slider</li>
			@else
			<li class="breadcrumb-item">Agregar elemento a slider</li>
			@endif
		</ol>
	</nav>

	<div class="panel panel-headline">
		<div class="panel-heading">
			@if($carouselItem)
			<div class="clearfix">
				<h3 class="panel-title" style="float: left;">Modificar ítem del slider de imágenes</h3>
				<form action="{{ route('admin.covers.carouselitem.delete',$carouselItem->id) }}" method="POST" style="float: right">
					@csrf
					<button type="button" class="btn btn-danger" onclick="if(confirm('¿Eliminar elemento?')) $(this).parent().submit();">Eliminar elemento</button>
				</form>
			</div>
			@else
			<h3 class="panel-title">Agregar nuevo ítem al slider de imágenes</h3>
			@endif


		</div>
		<div class="panel-body">
			
			<button class="btn btn-default" id="btn_load_product_data" style="margin-bottom: 20px">Cargar desde producto</button>

			<form 
			@if($carouselItem)
				action="{{ route('admin.covers.carouselitem.edit', $carouselItem->id) }}" 
			@else
				action="{{ route('admin.covers.carouselitem.create') }}" 
			@endif
			method="POST" enctype="multipart/form-data">

				@csrf
				<div class="form-group @if($errors->has('title')) has-error @endif">
					<label>Título</label>
					<input type="text" class="form-control" name="title" value="{{ old('title') ?: ($carouselItem->title ?? '')  }}" maxlength="45">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
				</div>

				<div class="form-group @if($errors->has('description')) has-error @endif">
					<label>Descripción</label>
					<input type="text" class="form-control" name="description" value="{{ old('description') ?: ($carouselItem->description ?? '') }}" maxlength="95">
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
				</div>

				
				<label>Imágen</label>

				@if($carouselItem)
				<input type="hidden" name="change_image" value="{{ old('change_image') ?: 'false' }}">
				<div @if(old('change_image')) style="display: none" @endif>
					<img src="{{ $carouselItem->imgUrl() }}" style="display: block; max-width: 500px">
					<a href="javascript:void(0);" id="change_image_btn">Modificar</a>
				</div>
				@endif

				<div id="img_area" @if($carouselItem && !old('change_image')) style="display: none" @endif>

					<label class="fancy-radio">
						<input type="radio" name="image_type" value="upload" autocomplete="off" 
						@if(old('image_type') != 'url') checked="" @endif
						@if($carouselItem && !old('change_image')) disabled="" @endif >
						<span><i></i>Subir de computadora</span>
					</label>

					<div class="form-group @if($errors->has('image_file')) has-error @endif">
						<input type="file" name="image_file" @if(old('image_type') == 'url') disabled="" @endif>
	                    @if($errors->has('image_file'))
	                        <span class="help-block">{{ $errors->first('image_file') }}</span>
	                    @endif
					</div>

					<label class="fancy-radio" style="margin-top: 15px">
						<input type="radio" name="image_type" value="url" autocomplete="off" 
						@if(old('image_type') == 'url') checked="" @endif
						@if($carouselItem && !old('change_image')) disabled="" @endif >
						<span><i></i>Cargar por URL</span>
					</label>

					<div class="form-group @if($errors->has('image_url')) has-error @endif">
						<input type="text" class="form-control" name="image_url" value="{{ old('image_url') }}" @if(old('image_type') != 'url') disabled="" @endif>
	                    @if($errors->has('image_url'))
	                        <span class="help-block">{{ $errors->first('image_url') }}</span>
	                    @endif
					</div>

				</div>
				
				@if(($carouselItem && $carouselItem->action_button) || old('show_action_btn'))
					@php($actionBtnChecked = true)
				@else
					@php($actionBtnChecked = false)
				@endif


				<label class="fancy-checkbox" style="margin-top: 40px">
					<input type="checkbox" name="show_action_btn" @if($actionBtnChecked) checked="" @endif>
					<span>Mostar botón de llamada a la acción</span>
				</label>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group @if($errors->has('action_btn_text')) has-error @endif">
							<label>Texto del botón</label>
							<input type="text" class="form-control" name="action_btn_text"  value="{{ old('action_btn_text') ?: ($carouselItem->action_text ?? '') }}" @if(!$actionBtnChecked) disabled="" @endif>
                            @if($errors->has('action_btn_text'))
                                <span class="help-block">{{ $errors->first('action_btn_text') }}</span>
                            @endif
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group @if($errors->has('action_btn_url')) has-error @endif">
							<label>URL al clickear botón</label>
							<input type="text" class="form-control" name="action_btn_url" value="{{ old('action_btn_url') ?: ($carouselItem->action_url ?? '') }}" @if(!$actionBtnChecked) disabled="" @endif>
                            @if($errors->has('action_btn_url'))
                                <span class="help-block">{{ $errors->first('action_btn_url') }}</span>
                            @endif
						</div>
					</div>
				</div>

				<button class="btn btn-primary">@if(!$carouselItem) Crear elemento @else Guardar elemento @endif</button>
				
				
			</form>



		</div>
	</div>


@endsection


@section('body-end')
	@include('admin.partials.product-picker-modal')
@endsection




@section('custom-js')
<script type="text/javascript">
	var productFetchResUrl = "{{ route('admin.covers.fetch-products') }}";
	var storageUrl = "{{ Storage::url('') }}";
</script>
<script type="text/javascript" src="{{ asset('resources/admin/scripts/product_picker.js') }}"></script>


<script type="text/javascript">
$(document).ready(function() {


	$("input[name=show_action_btn]").change(function() {
		if($(this).is(":checked")) {
			$("input[name=action_btn_text], input[name=action_btn_url]").prop("disabled", false);
		} else  {
			$("input[name=action_btn_text], input[name=action_btn_url]").prop("disabled", true);
		}
	});


	$("input[name=image_type]").change(function() {
		var value = $("input[name=image_type]:checked").val();
		if(value == "upload") {
			$("input[name=image_file]").prop("disabled", false);
			$("input[name=image_url]").prop("disabled", true);
		} else if(value == "url")  {
			$("input[name=image_file]").prop("disabled", true);
			$("input[name=image_url]").prop("disabled", false);
		}
	});

	$("#btn_load_product_data").click(function() {
		askForProductSelection(function(product) {

			if($("#change_image_btn").length && $("#change_image_btn").is(":visible")) {
				$("#change_image_btn").trigger("click");
			}

			$("input[name=title]").val(product.name);
			$("input[name=description]").val(product.description);
			$("input[name=image_type][value=url]").prop("checked", true).trigger("change");
			$("input[name=image_url]").val(storageUrl + product.main_img_path);
			$("input[name=show_action_btn]").prop("checked", true).trigger("change");
			$("input[name=action_btn_text]").val("Ver producto");
			$("input[name=action_btn_url]").val(product.url);
		});
	});


	$("#change_image_btn").click(function() {
		$(this).parent().hide();
		$('input[name=change_image]').val(true);
		$('#img_area').show();
		$('input[name=image_type]').prop('disabled', false);
	});


});

</script>
@endsection