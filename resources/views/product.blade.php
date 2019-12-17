@extends('layouts.main')

@section('title', $product->name)

@section('content')
<!-- Linking -->
  <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('category', $product->category->name_slug) }}">{{ $product->category->name }}</a></li>
        @if($product->subcategory)
        <li><a href="{{ route('subcategory', [$product->category->name_slug, $product->subcategory->name_slug]) }}">{{ $product->subcategory->name }}</a></li>
        @endif
        <li class="active">{{ $product->name }}</li>
      </ol>
    </div>
  </div>

  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
      <div class="container">
        <div class="row"> 
          
          <!-- Shop Side Bar -->
          <div class="col-md-3">
            <div class="shop-side-bar"> 
              
              <!-- Categories -->
              <h6>Categorías</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <a href="{{ route('search') }}">
                      <input id="cate1" class="styled" type="checkbox" checked="">
                      <label for="cate1">{{ $product->category->name }}</label>
                    </a>
                  </li>
                </ul>
              </div>
              

              @if($product->subcategory)

              <!-- Subcategories -->
              <h6>Subcategorías</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <a href="{{ route('category', $product->category->name_slug) }}">
                      <input id="subcate1" class="styled" type="checkbox" checked="">
                      <label for="subcate1">{{ $product->subcategory->name }}</label>
                    </a>
                  </li>
                </ul>
              </div>

              @endif
              


            </div>
          </div>
          
          <!-- Products -->
          <div class="col-md-9">
            <div class="product-detail">
              <div class="product">
                <div class="row"> 
                  <!-- Slider Thumb -->
                  <div class="col-xs-5">
                    <article class="slider-item on-nav">
                      <div class="thumb-slider">
                        <ul class="slides">
                          @foreach($product->images as $image)
                          <li data-thumb="{{ $image->thumbnailUrl() }}"> <img src="{{ $image->url() }}" alt="" > </li>
                          @endforeach
                          <!--li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg" alt="" > </li>
                          <li data-thumb="images/item-img-1-2.jpg"> <img src="images/item-img-1-2.jpg" alt="" > </li>
                          <li data-thumb="images/item-img-1-3.jpg"> <img src="images/item-img-1-3.jpg" alt="" > </li-->
                        </ul>
                      </div>
                    </article>
                  </div>
                  <!-- Item Content -->
                  <div class="col-xs-7"> <span class="tags">{{ $product->category->name }} {{ $product->subcategory ? '> '.$product->subcategory->name : '' }}</span>
                    <h5>{{ $product->name }}</h5>

                  
                    <div style="margin-top: 35px">
                      <div style="margin-bottom: 10px; ">Compartir</div>
                      <!-- AddToAny BEGIN -->
                      <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_email"></a>
                        <a class="a2a_button_whatsapp"></a>
                      </div>
                      <script async src="https://static.addtoany.com/menu/page.js"></script>
                      <!-- AddToAny END -->
                    </div>

                </div>
              </div>
              
              <!-- Details Tab Section-->
              <div class="item-tabs-sec"> 
                
                <!-- Nav tabs -->
                <ul class="nav" role="tablist">
                  <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">Detalles del producto</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="pro-detil"> 
                    {!! nl2br(e($product->description)) !!}
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Related Products -->
            <section class="padding-top-30 padding-bottom-0"> 
              <!-- heading -->
              <div class="heading">
                <h2>Productos relacionados</h2>
                <hr>
              </div>
              <!-- Items Slider -->
              <div class="item-slide-4 with-nav"> 
                @foreach($product->getSimilarProducts() as $product)

                  @include('layouts.product')

                @endforeach

              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Productos visitados recientemente</h2>
          <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav"> 
          
          @foreach($recentlyViewed as $product)

            @include('layouts.product')

          @endforeach

        </div>
      </div>
    </section>


  </div>
  <!-- End Content --> 
  @endsection