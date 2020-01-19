@extends('catalog.product-catalog-layout')


@section('product-catalog-content')
            
            <div class="col-list">

              @foreach($products as $product)

              @include("layouts.product-item-list")

              @endforeach
              
            </div>
            
            <div style="text-align: center;">
	            {{ $products->appends(request()->all())->links() }}
	        </div>
            
@endsection
