  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Welcome to SmartTech center!</p>
      <div class="right-sec">
        <ul>
          <li><a href="#.">Login/Register </a></li>
          <li><a href="#.">Store Location </a></li>
          <li><a href="#.">FAQ </a></li>
          <li><a href="#.">Newsletter </a></li>
          <li>
            <select class="selectpicker">
              <option>French</option>
              <option>German</option>
              <option>Italian</option>
              <option>Japanese</option>
            </select>
          </li>
          <li>
            <select class="selectpicker">
              <option>(USD)Dollar</option>
              <option>GBP</option>
              <option>Euro</option>
              <option>JPY</option>
            </select>
          </li>
        </ul>
        <div class="social-top"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-dribbble"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> </div>
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('resources/images/logo.png') }}" alt="" ></a> </div>
      <div class="search-cate">
        <select class="selectpicker">
          <option> All Categories</option>
          <option> Home Audio & Theater</option>
          <option> TV & Video</option>
          <option> Camera, Photo & Video</option>
          <option> Cell Phones & Accessories</option>
          <option> Headphones</option>
          <option> Video Games</option>
          <option> Bluetooth & Wireless </option>
          <option> Gaming Console</option>
          <option> Computers & Tablets</option>
          <option> Monitors </option>
        </select>
        <input type="search" placeholder="Search entire store here...">
        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
      </div>
      
      <!-- Cart Part -->
      <ul class="nav navbar-right cart-pop">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
          <span>3 item(s) - $500.00</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('resources/images/item-img-1-1.jpg') }}" class="img-responsive" alt="" > </a> </div>
              <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x 1</span> </div>
            </li>
            <li>
              <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('resources/images/item-img-1-2.jpg') }}" class="img-responsive" alt="" > </a> </div>
              <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x 1</span> </div>
            </li>
            <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                  <li><a href="#."> Home Audio & Theater</a></li>
                  <li><a href="#."> TV & Video</a></li>
                  <li><a href="#."> Camera, Photo & Video</a></li>
                  <li class="sub-menu"><a href="#."> Cell Phones & Accessories</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li><a href="#."> Headphones</a></li>
                  <li><a href="#."> Video Games</a></li>
                  <li class="sub-menu"><a href="#."> Bluetooth & Wireless Speakers</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li class="sub-menu"><a href="#."> Gaming Console</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li><a href="#."> Computers & Tablets</a></li>
                  <li><a href="#."> Monitors</a></li>
                  <li><a href="#."> Home Appliances</a></li>
                  <li><a href="#."> Office Supplies</a></li>
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
            <li class="dropdown megamenu active"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Home </a>
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
            </li>
            <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
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
            </li>
            <!-- Mega Menu Nav -->
            <li class="dropdown megamenu"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Mega menu </a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside">
                  <div class="top-lins">
                    <ul>
                      <li><a href="#."> Cell Phones & Accessories </a></li>
                      <li><a href="#."> Carrier Phones </a></li>
                      <li><a href="#."> Unlocked Phones </a></li>
                      <li><a href="#."> Prime Exclusive Phones </a></li>
                      <li><a href="#."> Accessories </a></li>
                      <li><a href="#."> Cases </a></li>
                      <li><a href="#."> Best Sellers </a></li>
                      <li><a href="#."> Deals </a></li>
                      <li><a href="#."> All Electronics </a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6>Electronics</h6>
                      <ul>
                        <li><a href="#."> Cell Phones & Accessories </a></li>
                        <li><a href="#."> Carrier Phones </a></li>
                        <li><a href="#."> Unlocked Phones </a></li>
                        <li><a href="#."> Prime Exclusive Phones </a></li>
                        <li><a href="#."> Accessories </a></li>
                        <li><a href="#."> Cases </a></li>
                        <li><a href="#."> Best Sellers </a></li>
                        <li><a href="#."> Deals </a></li>
                        <li><a href="#."> All Electronics </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6>Computers</h6>
                      <ul>
                        <li><a href="#."> Computers & Tablets</a></li>
                        <li><a href="#."> Monitors</a></li>
                        <li><a href="#."> Laptops & tablets</a></li>
                        <li><a href="#."> Networking</a></li>
                        <li><a href="#."> Drives & Storage</a></li>
                        <li><a href="#."> Computer Parts & Components</a></li>
                        <li><a href="#."> Printers & Ink</a></li>
                        <li><a href="#."> Office & School Supplies </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-2">
                      <h6>Home Appliances</h6>
                      <ul>
                        <li><a href="#."> Refrigerators</a></li>
                        <li><a href="#."> Wall Ovens</a></li>
                        <li><a href="#."> Cooktops & Hoods</a></li>
                        <li><a href="#."> Microwaves</a></li>
                        <li><a href="#."> Dishwashers</a></li>
                        <li><a href="#."> Washers</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-4"> <img class=" nav-img" src="{{ asset('resources/images/navi-img.png') }}" alt="" > </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown"> <a href="blog.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="Blog.html">Blog </a></li>
                <li><a href="Blog_details.html">Blog Single </a></li>
              </ul>
            </li>
            <li> <a href="shop.html">Buy theme! </a></li>
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> (+100) 123 456 7890</span> </div>
      </div>
    </nav>
  </header>