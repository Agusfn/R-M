@extends('layouts.main')



@if(request()->q)
  @section('title', 'Buscar ".request()->q."')
@elseif(isset($subcategoryFiltered))
  @section('title', $subcategoryFiltered->name)
@elseif(isset($categoryFiltered))
  @section('title', $categoryFiltered->name)
@else
  @section('title', 'Todos los productos')
@endif


@section('content')


  <!-- Linking -->
  <div class="linking">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Inicio</a></li>

        @if(isset($categoryFiltered))

          @if(!isset($subcategoryFiltered))

            @if(!request()->q)
            <li class="active">{{ $categoryFiltered->name }}</li>
            @else
            <li><a href="{{ route('category', $categoryFiltered->name_slug) }}">{{ $categoryFiltered->name }}</a></li>
            @endif

          @else

            <li><a href="{{ route('category', $categoryFiltered->name_slug) }}">{{ $categoryFiltered->name }}</a></li>

            @if(!request()->q)
            <li class="active">{{ $subcategoryFiltered->name }}</li>
            @else
            <li><a href="{{ route('category', $subcategoryFiltered->name_slug) }}">{{ $subcategoryFiltered->name }}</a></li>
            @endif

          @endif

        @endif

        @if(request()->q)
        <li class="active">Buscar "{{ request()->q }}"</li>
        @endif
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
                  @if(isset($categoryFiltered))
                  <li>
                    <a href="{{ route('search', request()->except('page')) }}">
                      <input id="cate1" class="styled" type="checkbox" checked="">
                      <label for="cate1">{{ $categoryFiltered->name }}</label>
                    </a>
                  </li>
                  @else

                    @foreach($categories as $category)
                    <li>
                      <a href="{{ route('category', array_merge([$category->name_slug], request()->except('page'))) }}">
                        <input id="cate{{ $loop->index+1 }}" class="styled" type="checkbox">
                        <label for="cate{{ $loop->index+1 }}">{{ $category->name }}</label>
                      </a>
                    </li>
                    @endforeach

                  @endif
                </ul>
              </div>
              

              @if(isset($categoryFiltered) && $categoryFiltered->subcategories->count() > 0)

              <!-- Subcategories -->
              <h6>Subcategorías</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @if(isset($subcategoryFiltered))
                  <li>
                    <a href="{{ route('category', array_merge([$categoryFiltered->name_slug], request()->except('page'))) }}">
                      <input id="subcate1" class="styled" type="checkbox" checked="">
                      <label for="subcate1">{{ $subcategoryFiltered->name }}</label>
                    </a>
                  </li>
                  @else

                    @foreach($categoryFiltered->subcategories as $subcategory)
                    <li>
                      <a href="{{ route('subcategory', array_merge([$categoryFiltered->name_slug, $subcategory->name_slug], request()->except('page'))) }}">
                        <input id="subcate{{ $loop->index+1 }}" class="styled" type="checkbox">
                        <label for="subcate{{ $loop->index+1 }}">{{ $subcategory->name }}</label>
                      </a>
                    </li>
                    @endforeach

                  @endif
                </ul>
              </div>

              @endif
            </div>

          </div>
          
          <!-- Products -->
          <div class="col-md-9"> 
            
            <!-- Short List -->
            <div class="short-lst">

              @if(request()->q)
              <h2>Buscar "{{ request()->q }}"</h2>
              @elseif(isset($subcategoryFiltered))
              <h2>{{ $subcategoryFiltered->name }}</h2>
              @elseif(isset($categoryFiltered))
              <h2>{{ $categoryFiltered->name }}</h2>
              @else
              <h2>Todos los productos</h2>
              @endif


              <ul>
                <!-- Short List -->
                <li>
                  <p>Mostrando {{ $products->firstItem().'-'.($products->firstItem() + $products->count()) }} de {{ $products->total() }} resultados</p>
                </li>
                <!-- Short  -->
                <li >
                  <select class="selectpicker">
                    <option>Show 12 </option>
                    <option>Show 24 </option>
                    <option>Show 32 </option>
                  </select>
                </li>
                <!-- by Default -->
                <li>
                  <select class="selectpicker">
                    <option>Sort by Default </option>
                    <option>Sort by Default </option>
                    <option>Sort by Default</option>
                  </select>
                </li>

                <!-- Grid Layer -->
                <li class="grid-layer"> 
                  <a href="javascript:void(0)" id="display_list" {{ $layout == 'list' ? 'class=active' : '' }}><i class="fa fa-list margin-right-10"></i></a>
                  <a href="javascript:void(0)" id="display_grid" {{ $layout == 'grid' ? 'class=active' : '' }}><i class="fa fa-th"></i></a>
                </li>

              </ul>
            </div>
            
            <!-- Items -->
            @yield('product-catalog-content')

          </div>
        </div>
      </div>
    </section>
    
    <!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Your Recently Viewed Items</h2>
          <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav"> 
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-1.jpg" alt="" > 
              <!-- Content --> 
              <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 </div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-2.jpg" alt="" > <span class="sale-tag">-25%</span> 
              
              <!-- Content --> 
              <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 <span>$200.00</span></div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-3.jpg" alt="" > 
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-4.jpg" alt="" > <span class="new-tag">New</span> 
              
              <!-- Content --> 
              <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-5.jpg" alt="" > 
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-6.jpg" alt="" > <span class="sale-tag">-25%</span> 
              
              <!-- Content --> 
              <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 <span>$200.00</span></div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-7.jpg" alt="" > 
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="images/item-img-1-8.jpg" alt="" > <span class="new-tag">New</span> 
              
              <!-- Content --> 
              <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <!-- End Content --> 

 
@endsection


@section('custom-js')
<script type="text/javascript">
  $(document).ready(function() {
    
    $("#display_list").click(function() {
      window.location.href = updateQueryStringParameter(window.location.href, "layout", "list");
    });

    $("#display_grid").click(function() {
      window.location.href = updateQueryStringParameter(window.location.href, "layout", "grid");
    });


  });


  function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
      return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
      return uri + separator + key + "=" + value;
    }
  }
</script>
@endsection