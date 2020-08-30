@extends('admin.layouts.main')

@section('title', 'Imágenes de portada y destacados')


@section('custom-css')
<style type="text/css">

</style>
@endsection


@section('content')


<div class="row">

	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<div class="clearfix">
					<h3 class="panel-title" style="float: left;">Slider de imágenes principal</h3>
					<a class="btn btn-success" style="float: right;" href="{{ route('admin.covers.carouselitem.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Agregar elemento</a>
				</div>
			</div>
			<div class="panel-body">
			
				<table class="table ">
					<thead>
						<tr>
							<th></th>
							<th>Imágen</th>
							<th>Título</th>
							<th>Descripción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($carouselItems as $carouselItem)
						<tr>
							<td style="vertical-align: middle;"><a class="btn btn-primary btn-sm" href="{{ route('admin.covers.carouselitem.edit', $carouselItem->id) }}">Ver</a></td>
							<td><img src="{{ $carouselItem->imgUrl() }}" width="150"></td>
							<td style="vertical-align: middle;">{{ $carouselItem->title }}</td>
							<td style="vertical-align: middle;">{{ $carouselItem->description }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Bloques laterales (productos destacados/imgs promocionales)</h3>
			</div>
			<div class="panel-body">
                <table class="table">
                	<thead>
                		<tr>
                			<th>Ubicación</th>
                			<th>Imágen</th>
                			<th></th>
                		</tr>
                	</thead>
                	<tbody>
                		<tr>
                			<td>Bloque en menu desplegable "Productos" en<br/> barra de navegación</td>
                			<td>
                				@if($featuredItems->navbarFeatured)
                				<img src="{{ $featuredItems->navbarFeatured->imgUrl() }}" width="150">
                				@else
                				No mostrar nada
                				@endif
                			</td>
                			<td><a class="btn btn-primary" href="{{ route('admin.covers.navbarfeatured') }}">Cambiar</a></td>
                		</tr>
                		<tr>
                			<td>Producto destacado arriba a la derecha del slider</td>
                			<td>
                				@if($featuredItems->sliderFirstFeatured)
                				<img src="{{ $featuredItems->sliderFirstFeatured->imgUrl() }}" width="150">
                				@else
                				No mostrar nada
                				@endif
                			</td>
                			<td><a class="btn btn-primary" href="{{ route('admin.covers.slider1featured') }}">Cambiar</a></td>
                		</tr>
                		<tr>
                			<td>Producto destacado abajo a la derecha del slider</td>
                			<td>
                				@if($featuredItems->sliderSecondFeatured)
                				<img src="{{ $featuredItems->sliderSecondFeatured->imgUrl() }}" width="150">
                				@else
                				No mostrar nada
                				@endif
                			</td>
                			<td><a class="btn btn-primary" href="{{ route('admin.covers.slider2featured') }}">Cambiar</a></td>
                		</tr>
                	</tbody>
                </table>
			</div>
		</div>
	</div>
</div>

@endsection


@section('body-end')

@endsection



@section('custom-js')

@endsection