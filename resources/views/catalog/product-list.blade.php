@extends('catalog.product-catalog-layout')


@section('product-catalog-content')
            
            <div class="col-list">

              @foreach($products as $product)

              @include("layouts.product-item-list")

              @endforeach
              
            </div>
            
            {{ $products->appends(request()->all())->links() }}

            
@endsection
