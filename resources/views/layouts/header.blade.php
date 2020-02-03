  
  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('resources/images/logo.png') }}" alt="RM Papelera" ></a> </div>
      <div class="search-cate">
        <form action="{{ route('search') }}" method="GET">
          <select class="selectpicker" id="search-filter-category" {{ isset($categoryFiltered) ? 'name=categoria' : '' }}>
            <option value=""> Todas las categorías</option>
            @foreach($categories as $category)
            <option value="{{ $category->name_slug }}" {{ (isset($categoryFiltered) && $categoryFiltered->id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
            @endforeach
          </select>
          <input type="search" name="q" placeholder="Buscar productos..." value="{{ request()->q ?: '' }}">
          <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
        </form>
      </div>

    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Categorías </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">

              <ul>
                @foreach($categories as $category)
                <li class="sub-menu {{ $category->subcategories->count() == 0 ? 'no-arrow' : '' }}"><a href="{{ route('category', $category->name_slug) }}"> {{ $category->name }}</a>
                  
                  @if($category->subcategories->count() > 0)
                  <ul>
                    @foreach($category->subcategories as $subcategory)
                    <li><a href="{{ route('subcategory', [$category->name_slug, $subcategory->name_slug]) }}"> {{ $subcategory->name }}</a></li>
                    @endforeach
                  </ul>
                  @endif
                </li>
                @endforeach
              </ul>

            </div>
          </div>
        </div>
        
        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">



            <!-- Mega Menu Nav -->
            <li class="dropdown megamenu"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Productos</a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside">
                  <div class="top-lins">
                    <ul>
                      @foreach($categories as $category)
                      <li><a href="{{ route('category', $category->name_slug) }}">{{ $category->name }}</a></li>
                      @endforeach
                      <li><a href="{{ route('search') }}">Todas las categorías</a></li>
                    </ul>
                  </div>
                  <div class="row">

                    @foreach($categories as $category)
                      @if($loop->iteration >= 1 && $loop->iteration <= 2)
                        @if($loop->iteration == 1)
                        <div class="col-sm-3">
                        @endif

                        <a href="{{ route('category', $category->name_slug) }}"><h6>{{ $category->name }}</h6></a>

                        @if($category->subcategories->count() > 0)
                          <ul>
                          @foreach($category->subcategories as $subcategory)
                            <li><a href="{{ route('subcategory', [$category->name_slug, $subcategory->name_slug]) }}"> {{ $subcategory->name }}</a></li>
                          @endforeach
                          </ul>
                        @endif

                        @if($loop->iteration == 2)
                        </div>
                        @endif
                      @endif
                    @endforeach


                    @foreach($categories as $category)
                      @if($loop->iteration >= 3 && $loop->iteration <= 4)
                        @if($loop->iteration == 3)
                        <div class="col-sm-3">
                        @endif

                        <a href="{{ route('category', $category->name_slug) }}"><h6>{{ $category->name }}</h6></a>

                        @if($category->subcategories->count() > 0)
                          <ul>
                          @foreach($category->subcategories as $subcategory)
                            <li><a href="{{ route('subcategory', [$category->name_slug, $subcategory->name_slug]) }}"> {{ $subcategory->name }}</a></li>
                          @endforeach
                          </ul>
                        @endif

                        @if($loop->iteration == 4)
                        </div>
                        @endif
                      @endif
                    @endforeach


                    @foreach($categories as $category)
                      @if($loop->iteration >= 5 && $loop->iteration <= 5)
                        @if($loop->iteration == 5)
                        <div class="col-sm-2">
                        @endif

                        <a href="{{ route('category', $category->name_slug) }}"><h6>{{ $category->name }}</h6></a>

                        @if($category->subcategories->count() > 0)
                          <ul>
                          @foreach($category->subcategories as $subcategory)
                            <li><a href="{{ route('subcategory', [$category->name_slug, $subcategory->name_slug]) }}"> {{ $subcategory->name }}</a></li>
                          @endforeach
                          </ul>
                        @endif

                        @if($loop->iteration == 5)
                        </div>
                        @endif
                      @endif
                    @endforeach

                    @if($featuredItems->navbarFeatured)
                    <div class="col-sm-4 nav-featured-item">
                      <h6>Destacado</h6>

                      @if($featuredItems->navbarFeatured->showActionBtn)
                      <a href="{{ $featuredItems->navbarFeatured->buttonUrl }}">
                      @endif

                        @if($featuredItems->navbarFeatured->title)
                        <div class="nav-featured-item-title">{{ $featuredItems->navbarFeatured->title }}</div>
                        @endif
                        <img class="nav-img" src="{{ $featuredItems->navbarFeatured->imgUrl() }}" alt="{{ $featuredItems->navbarFeatured->title ?? '' }}" >
                      
                      @if($featuredItems->navbarFeatured->showActionBtn)
                      </a>
                      @endif
                    </div>
                    @endif
                    
                  </div>
                </div>
              </div>
            </li>

            <li {{ request()->route()->getName() == 'contact' ? 'class=active' : "" }}> <a href="{{ route('contact') }}">Contacto</a></li>

          </ul>
        </div>
        
        <div class="nav-right"> <span class="call-mun" style="font-size: 16px;"><i class="fa fa-whatsapp" style="font-size: 19px;"></i> <strong>Whatsapp:</strong> 11 65841728</span> </div>

      </div>
    </nav>
  </header>