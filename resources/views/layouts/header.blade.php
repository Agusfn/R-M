  
  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('resources/images/logo.png') }}" alt="" ></a> </div>
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

                    
                    <div class="col-sm-4"> <img class=" nav-img" src="{{ asset('resources/images/navi-img.png') }}" alt="" > </div>
                  </div>
                </div>
              </div>
            </li>

            <li> <a href="shop.html">Dónde estamos</a></li>

            <li {{ request()->route()->getName() == 'contact' ? 'class=active' : "" }}> <a href="{{ route('contact') }}">Contacto</a></li>

            <li {{ request()->route()->getName() == 'about-us' ? 'class=active' : "" }}> <a href="{{ route('about-us') }}">Nosotros</a></li>


            <!--li class="dropdown megamenu active"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home </a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside scrn">
                  <ul class="home-links">
                    <li><a href="index.html"><img class="img-responsive" src="{{ asset('resources/images/home-1.jpg') }}" alt="" > <span>Home Version 1</span></a></li>
                    <li><a href="index-2.html"><img class="img-responsive" src="{{ asset('resources/images/home-2.jpg') }}" alt="" > <span>Home Version 2</span></a> </li>
                    <li><a href="index-3.html"><img class="img-responsive" src="{{ asset('resources/images/home-3.jpg') }}" alt="" > <span>Home Version 3</span></a></li>
                    <li><a href="index-4.html"><img class="img-responsive" src="{{ asset('resources/images/home-4.jpg') }}" alt="" > <span>Home Version 4</span></a></li>
                    <li><a href="index-5.html"><img class="img-responsive" src="{{ asset('resources/images/home-5.jpg') }}" alt="" > <span>Home Version 5</span></a></li>
                    <li><a href="index-6.html"><img class="img-responsive" src="{{ asset('resources/images/home-6.jpg') }}" alt="" > <span>Home Version 6</span></a></li>
                    <li><a href="index-7.html"><img class="img-responsive" src="{{ asset('resources/images/home-7.jpg') }}" alt="" > <span>Home Version 7</span></a></li>
                    <li><a href="index-8.html"><img class="img-responsive" src="{{ asset('resources/images/home-8.jpg') }}" alt="" > <span>Home Version 8</span></a></li>
                    <li><a href="index-9.html"><img class="img-responsive" src="{{ asset('resources/images/home-9.jpg') }}" alt="" > <span>Home Version 9</span></a></li>
                    <li><a href="index-10.html"><img class="img-responsive" src="{{ asset('resources/images/home-10.jpg') }}" alt="" > <span>Home Version 10</span></a></li>
                    <li><a href="index-11.html"><img class="img-responsive" src="{{ asset('resources/images/home-11.jpg') }}" alt="" > <span>Home Version 11</span></a></li>
                    <li><a href="index-12.html"><img class="img-responsive" src="{{ asset('resources/images/home-12.jpg') }}" alt="" > <span>Home Version 12</span></a></li>
                    <li><a href="index-13.html"><img class="img-responsive" src="{{ asset('resources/images/home-13.jpg') }}" alt="" > <span>Home Version 13</span></a></li>
                    <li><a href="index-14.html"><img class="img-responsive" src="{{ asset('resources/images/home-14.jpg') }}" alt="" > <span>Home Version 14</span></a></li>
                    <li><a href="index-15.html"><img class="img-responsive" src="{{ asset('resources/images/home-15.jpg') }}" alt="" > <span>Home Version 15</span></a></li>
                    <li><a href="index-16.html"><img class="img-responsive" src="{{ asset('resources/images/home-16.jpg') }}" alt="" > <span>Home Version 16</span></a></li>
                    <li><a href="index-17.html"><img class="img-responsive" src="{{ asset('resources/images/home-17.jpg') }}" alt="" > <span>Home Version 17</span></a></li>
                  </ul>
                </div>
              </div>
            </li-->
            <!--li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="About.html"> About </a></li>
                <li><a href="LoginForm.html"> Login Form </a></li>
                <li><a href="GridProducts_3Columns.html"> Products 3 Columns </a></li>
                <li><a href="GridProducts_4Columns.html"> Products 4 Columns </a></li>
                <li><a href="ListProducts.html"> List Products </a></li>
                <li><a href="Product-Details.html"> Product Details </a></li>
                <li><a href="ShoppingCart.html"> Shopping Cart</a></li>
                <li><a href="PaymentMethods.html"> Payment Methods </a></li>
                <li><a href="DeliveryMethods.html"> Delivery Methods</a></li>
                <li><a href="Confirmation.html"> Confirmation </a></li>
                <li><a href="CheckoutSuccessful.html"> Checkout Successful </a></li>
                <li><a href="Error404.html"> Error404 </a></li>
                <li><a href="contact.html"> Contact </a></li>
                <li class="dropdown-submenu"><a href="#."> Dropdown Level </a>
                  <ul class="dropdown-menu animated-2s fadeInRight">
                    <li><a href="#.">Level 1</a></li>
                  </ul>
                </li>
              </ul>
            </li-->
            <!--li class="dropdown"> <a href="blog.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="Blog.html">Blog </a></li>
                <li><a href="Blog_details.html">Blog Single </a></li>
              </ul>
            </li-->

          </ul>
        </div>
        
      </div>
    </nav>
  </header>