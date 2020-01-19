@extends('catalog.product-catalog-layout')


@section('product-catalog-content')
            
            <div class="item-col-3"> 
              <div class="clearfix">
                @foreach($products as $product)

                @include("layouts.product")

                @endforeach
              </div>

              <div style="text-align: center;">
	              {{ $products->appends(request()->all())->links() }}
	          </div>
            </div>

@endsection