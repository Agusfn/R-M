@extends('layouts.main')


@if(request()->q)

  @section('title', 'Buscar '.request()->q)
  @php($description = 'Buscar "'.request()->q.'" en el sitio.')

@elseif(isset($subcategoryFiltered))

  @section('title', $categoryFiltered->name.' - '.$subcategoryFiltered->name)
  @php($description = $categoryFiltered->name . ' - ' . $subcategoryFiltered->name.'. Catálogo de productos de '.$categoryFiltered->name)

@elseif(isset($categoryFiltered))

  @section('title', $categoryFiltered->name)
  
  @php($description = 'Catálogo de productos de '.$categoryFiltered->name.': ')

  @foreach($categoryFiltered->subcategories as $subcategory)
    @php($description .= $subcategory->name)
    @if(!$loop->last)
      @php($description .= ', ')
    @endif
  @endforeach

@else

  @section('title', 'Todos los productos')
  @php($description = 'Catálogo de todos los productos.')

@endif


@section('meta')
<meta name="description" content="{{ $description }}">
<meta property="og:description" content="{{ $description }}" />

<meta property="og:image" content="{{ asset('resources/images/logo-grande.jpg') }}" />
<meta property="og:type" content="website" /> 
@endsection



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
                    @foreach($categories as $category)

                    <li>
                      @if(isset($categoryFiltered) && $categoryFiltered->id == $category->id)
                      <a href="{{ route('search', request()->except('page')) }}">
                        <input id="cate{{ $loop->index+1 }}" class="styled" type="checkbox" checked="">
                        <label for="cate{{ $loop->index+1 }}">{{ $category->name }}</label>
                      </a>
                      @else
                      <a href="{{ route('category', array_merge([$category->name_slug], request()->except('page'))) }}">
                        <input id="cate{{ $loop->index+1 }}" class="styled" type="checkbox">
                        <label for="cate{{ $loop->index+1 }}">{{ $category->name }}</label>
                      </a>
                      @endif
                    </li>
                    @endforeach
                </ul>

              </div>
              

              @if(isset($categoryFiltered) && $categoryFiltered->subcategories->count() > 0)

              <!-- Subcategories -->
              <h6>Subcategorías</h6>
              <div class="checkbox checkbox-primary">
                <ul>

                  @foreach($categoryFiltered->subcategories as $subcategory)
                  <li>
                    @if(isset($subcategoryFiltered) && $subcategoryFiltered->id == $subcategory->id)
                    <a href="{{ route('category', array_merge([$categoryFiltered->name_slug], request()->except('page'))) }}">
                      <input id="subcate{{ $loop->index+1 }}" class="styled" type="checkbox" checked="">
                      <label for="subcate{{ $loop->index+1 }}">{{ $subcategory->name }}</label>
                    </a>
                    @else
                    <a href="{{ route('subcategory', array_merge([$categoryFiltered->name_slug, $subcategory->name_slug], request()->except('page'))) }}">
                      <input id="subcate{{ $loop->index+1 }}" class="styled" type="checkbox">
                      <label for="subcate{{ $loop->index+1 }}">{{ $subcategory->name }}</label>
                    </a>
                    @endif

                  </li>
                  @endforeach


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
              <h2>{{ $categoryFiltered->name.' - '.$subcategoryFiltered->name }}</h2>
              @elseif(isset($categoryFiltered))
              <h2>{{ $categoryFiltered->name }}</h2>
              @else
              <h2>Todos los productos</h2>
              @endif


              <ul>
                <!-- Short List -->
                <li>
                  @if($products->total() > 0)
                    <p>Mostrando resultados {{ $products->firstItem().'-'.($products->firstItem() + $products->count() - 1) }} de {{ $products->total() }} total</p>
                  @else
                    <p>No se encontraron resultados.</p>
                  @endif
                  
                </li>
                <!-- Short  -->
                {{--<li >
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
                </li>--}}

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
          <h2>Productos visitados recientemente</h2>
          <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav"> 
          
          @foreach($recentlyViewedProducts as $product)

            @include('layouts.product')

          @endforeach

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