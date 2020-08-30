@extends('admin.layouts.main')


@if($featuredType == 'navbar')
	@php($title = 'Modificar producto destacado en barra de navegación')
@elseif($featuredType == 'slider1')
	@php($title = 'Modificar producto destacado arriba a la derecha del slider')
@elseif($featuredType == 'slider2')
	@php($title = 'Modificar producto destacado abajo a la derecha del slider')
@endif	


@section('title', $title)


@section('custom-css')
<style type="text/css">

</style>
@endsection





@section('content')

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.covers.overview') }}">Portadas y productos destacados</a></li>
		<li class="breadcrumb-item">{{ $title }}</li>
	</ol>
</nav>



<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title" style="float: left;">{{ $title }}</h3>
	</div>
	<div class="panel-body">
	
		@if(session()->has('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Cambios aplicados correctamente!
		</div>
	    @endif

		<button class="btn btn-default" id="btn_load_product_data" style="margin-bottom: 20px">Cargar desde producto</button>


		@if($featuredType == 'navbar')
			@php($action = route('admin.covers.navbarfeatured')) 
		@elseif($featuredType == 'slider1')
			@php($action = route('admin.covers.slider1featured')) 
		@elseif($featuredType == 'slider2')
			@php($action = route('admin.covers.slider2featured')) 
		@endif

		<form id="featured_item_form" action="{{ $action }}" method="POST" enctype="multipart/form-data">

			@csrf

			<label class="fancy-radio">
				<input name="mostrar_item" value="no" type="radio" @if(!$featuredItem) checked @endif autocomplete="off">
				<span><i></i>No mostrar nada</span>
			</label>

			<hr>

			<label class="fancy-radio" style="margin-top: 15px">
				<input name="mostrar_item" value="si" type="radio" @if($featuredItem || old('mostrar_item') == 'si') checked @endif autocomplete="off">
				<span><i></i>Mostrar ítem destacado</span>
			</label>

			<div class="form-group @if($errors->has('title')) has-error @endif">
				<label>Título</label>
				<input type="text" class="form-control" name="title" value="{{ old('title') ?: ($featuredItem->title ?? '') }}">
                @if($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
			</div>


			{{-- Si se rechazó el envío de un formulario que tenía una imágen adjunta --}}
			@php($uploadFailed = old('image_type') ? true : false)


			@if($featuredItem)
			<div @if($uploadFailed) style="display: none" @endif>
				<img src="{{ $featuredItem->imgUrl() }}" style="display: block; max-width: 500px">
				<button type="button" class="btn btn-primary btn-sm" id="change_image_btn" style="margin-top: 10px">Cambiar imágen</a>
			</div>
			@endif

			<div id="img_area" @if($featuredItem && !$uploadFailed) style="display: none" @endif>
				<label>Imágen</label>

				<label class="fancy-radio">
					<input type="radio" name="image_type" value="upload" autocomplete="off" 
					@if(old('image_type') != 'url') checked="" @endif
					@if($featuredItem && !$uploadFailed) disabled="" @endif >
					<span><i></i>Subir de computadora</span>
				</label>

				<div class="form-group @if($errors->has('image_file')) has-error @endif">
					<input type="file" name="image_file" @if($featuredItem) disabled="" @endif>
                    @if($errors->has('image_file'))
                        <span class="help-block">{{ $errors->first('image_file') }}</span>
                    @endif
				</div>

				<label class="fancy-radio" style="margin-top: 15px">
					<input type="radio" name="image_type" value="url" autocomplete="off" 
					@if(old('image_type') == 'url') checked="" @endif
					@if($featuredItem && !$uploadFailed) disabled="" @endif >
					<span><i></i>Cargar por URL</span>
				</label>

				<div class="form-group @if($errors->has('image_url')) has-error @endif">
					<input type="text" class="form-control" name="image_url" value="{{ old('image_url') }}" @if($featuredItem) disabled="" @endif>
                    @if($errors->has('image_url'))
                        <span class="help-block">{{ $errors->first('image_url') }}</span>
                    @endif
				</div>

			</div>

			@php($actionBtnChecked = (old('show_action_btn') || ($featuredItem && $featuredItem->showActionBtn)))

			<label class="fancy-checkbox" style="margin-top: 40px">
				<input type="checkbox" name="show_action_btn" @if($actionBtnChecked) checked="" @endif>
				<span>Mostar botón de llamada a la acción</span>
			</label>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group @if($errors->has('action_btn_text')) has-error @endif">
						<label>Texto del botón</label>
						<input type="text" class="form-control" name="action_btn_text"  value="{{ old('action_btn_text') ?: ($featuredItem->buttonText ?? '') }}" disabled="">
                        @if($errors->has('action_btn_text'))
                            <span class="help-block">{{ $errors->first('action_btn_text') }}</span>
                        @endif
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group @if($errors->has('action_btn_url')) has-error @endif">
						<label>URL al clickear botón</label>
						<input type="text" class="form-control" name="action_btn_url" value="{{ old('action_btn_url') ?: ($featuredItem->buttonUrl ?? '') }}" disabled="">
                        @if($errors->has('action_btn_url'))
                            <span class="help-block">{{ $errors->first('action_btn_url') }}</span>
                        @endif
					</div>
				</div>
			</div>

			<div style="text-align: right;">
				<button class="btn btn-primary" id="submit_navbar_featured">Guardar</button>
			</div>
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


	// Sólo featuredItems que puedan ser ocultables
	$("input[name=mostrar_item]").change(function() {
		if($(this).val() == "no") {
			$("input[name=title], #change_image_btn, input[name=image_file], input[name=image_url], input[name=show_action_btn], input[name=action_btn_text], input[name=action_btn_url]").prop("disabled", true);
		}
		else {
			$("input[name=title], #change_image_btn, input[name=show_action_btn]").prop("disabled", false);
			if($("#img_area").is(":visible")) {
				$("input[name=image_type]:checked").trigger("change");
			}
			$("input[name=show_action_btn]").trigger("change");
		}
	});


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

	$("#change_image_btn").click(function() {
		$(this).parent().hide();
		$('#img_area').show();
		$("input[name=image_type]").prop("disabled", false);
		$("input[name=image_type]:checked").trigger("change");
	});


	$("#btn_load_product_data").click(function() {
		askForProductSelection(function(product) {

			if($("#change_image_btn").length && $("#change_image_btn").is(":visible")) {
				$("#change_image_btn").trigger("click");
			}

			if($("input[name=mostrar_item]").length) {
				$("input[name=mostrar_item][value=si]").prop("checked", true).trigger("change");
			}

			$("input[name=title]").val(product.name);
			$("input[name=image_type][value=url]").prop("checked", true).trigger("change");
			$("input[name=image_url]").val(storageUrl + product.main_img_path);
			$("input[name=show_action_btn]").prop("checked", true).trigger("change");
			$("input[name=action_btn_text]").val("Ver producto");
			$("input[name=action_btn_url]").val(product.url);
		});
	});


	$("input[name=mostrar_item]:checked").trigger("change");
	$("input[name=image_type]:checked").trigger("change");


	@if($actionBtnChecked)
		$("input[name=show_action_btn]").trigger("change");
	@endif


});


</script>
@endsection