@extends('layouts.main')

@section('title', 'Inicio')

@section('content')
<section class="slid-sec">
    <div class="container">
      <div class="container-fluid">
        <div class="row"> 
          
          <!-- Main Slider  -->
          <div class="col-md-9 no-padding"> 
            
            <!-- Main Slider Start -->
            <div class="tp-banner-container">
              <div class="tp-banner">
                <ul>
                  


                  @foreach($carouselItems as $carouselItem)

                  <!-- SLIDE  -->
                  <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
                    <!-- MAIN IMAGE --> 
                    <img class="aligncenter" src="{{ $carouselItem->imgUrl() }}"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    @if($carouselItem->title)
                    <div class="tp-caption sfr tp-resizeme" 
                                     data-x="left" data-hoffset="60" 
                                     data-y="center" data-voffset="-60" 
                                     data-speed="800" 
                                     data-start="1000" 
                                     data-easing="Power3.easeInOut" 
                                     data-splitin="chars" 
                                     data-splitout="none" 
                                     data-elementdelay="0.03" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     style="z-index: 6; font-size:40px; color:#0088cc; font-weight:800; white-space: nowrap;">{{ $carouselItem->title }}</div>
                    @endif

                    @if($carouselItem->title)
                    <div class="tp-caption sfl tp-resizeme" 
                                     data-x="left" data-hoffset="60" 
                                     data-y="center" data-voffset="10" 
                                     data-speed="800" 
                                     data-start="1200" 
                                     data-easing="Power3.easeInOut" 
                                     data-splitin="none" 
                                     data-splitout="none" 
                                     data-elementdelay="0.1" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     style="z-index: 7;  font-size:24px; color:rgb(90, 90, 90); font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;">{{ $carouselItem->description }}</div>
                    @endif

                    @if($carouselItem->action_button)
                    <div class="tp-caption lfb tp-resizeme scroll" 
                                      data-x="left" data-hoffset="60" 
                                     data-y="center" data-voffset="80"
                                     data-speed="800" 
                                     data-start="1300"
                                     data-easing="Power3.easeInOut" 
                                     data-elementdelay="0.1" 
                                     data-endelementdelay="0.1" 
                                     data-endspeed="300" 
                                     data-scrolloffset="0"
                                     style="z-index: 8;"><a href="{{ $carouselItem->action_url }}" class="btn-round big">{{ $carouselItem->action_text }}</a> </div>
                    @endif

                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Main Slider  -->
          <div class="col-md-3 no-padding"> 
            
            @php($firstFeatured = $featuredItems->sliderFirstFeatured)
            @if($firstFeatured)
            <div class="week-sale-bnr" style="background-image: url({{ $firstFeatured->imgUrl() }});background-size: cover;">
              <div class="layer"></div>

              @if($firstFeatured->title)
              <p>{{ $firstFeatured->title }}</p>
              @endif

              @if($firstFeatured->showActionBtn)
              <a href="{{ $firstFeatured->buttonUrl }}" class="btn-round" @if(!$firstFeatured->title) style="margin-top: 130px;" @endif>{{ $firstFeatured->buttonText }}</a>
              @endif 

            </div>
            @endif

            @php($secondFeatured = $featuredItems->sliderSecondFeatured)
            @if($secondFeatured)
            <div class="week-sale-bnr" style="background-image: url({{ $secondFeatured->imgUrl() }});background-size: cover;">

              @if($secondFeatured->title)
              <p>{{ $secondFeatured->title }}</p>
              @endif

              @if($secondFeatured->showActionBtn)
              <a href="{{ $secondFeatured->buttonUrl }}" class="btn-round" @if(!$secondFeatured->title) style="margin-top: 130px;" @endif>{{ $secondFeatured->buttonText }}</a>
              @endif 

            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Shipping Info -->
    <section class="shipping-info">
      <div class="container">
        <ul>
          
          <li>
            <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
            <div class="media-body">
              <h5>Envío sin cargo</h5>
              <span>Para pedidos mayores a $x</span></div>
          </li>
          <li>
            <div class="media-left"> <i class="ion-cash"></i> </div>
            <div class="media-body">
              <h5>Medios de pago</h5>
              <span>Efectivo, débito, y transferencia.</span></div>
          </li>
          <li>
            <div class="media-left"> <i class="ion-social-whatsapp-outline"></i> </div>
            <div class="media-body">
              <h5>Contacto por Whatsapp</h5>
              <span>Tel: 11 65841728</span></div>
          </li>
          
        </ul>
      </div>
    </section>
    

    
    <section class="light-gry-bg padding-top-60 padding-bottom-30">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Productos más populares</h2>
          <hr>
        </div>
        
        <!-- Items -->
        <div class="item-col-5"> 
          
            @foreach($topViewedProducts as $product)

                @if($loop->first)

                  <div class="product col-2x">
                    <div class="like-bnr" style="background-image: url('{{ $product->thumbnailUrl() }}'); background-size: cover;">
                      <div class="position-center-center">
                        <h5>{{ $product->name }}</h5>
                        <a href="{{ $product->url() }}" class="btn-round">Ver detalles</a> </div>
                    </div>
                  </div>
                @else

                    @include('layouts.product')

                @endif
                
            @endforeach


        </div>
      </div>
    </section>
    
    <!-- Main Tabs Sec -->
    <section class="main-tabs-sec padding-top-60 padding-bottom-0">

      <div class="container">

        <div class="heading">
          <h2>Más populares por categoría</h2>
          <hr>
        </div>

        <ul class="nav margin-bottom-40" role="tablist">
          @foreach($topViewedProductsByCategory as $topViewedCategoryProducts)
          <li role="presentation" class="{{ $loop->first ? 'active' : '' }}"><a href="#{{ $topViewedCategoryProducts['category_slug'] }}" aria-controls="{{ $topViewedCategoryProducts['category_slug'] }}" role="tab" data-toggle="tab">{{ $topViewedCategoryProducts["category_name"] }}</a></li>
          @endforeach
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content"> 


          @foreach($topViewedProductsByCategory as $topViewedCategoryProducts)

          <div role="tabpanel" class="tab-pane {{ $loop->first ? 'active' : '' }} fade in" id="{{ $topViewedCategoryProducts['category_slug'] }}"> 
            
            <!-- Items -->
            <div class="item-col-5"> 
              
                @foreach($topViewedCategoryProducts["products"] as $product)

                    @include('layouts.product')

                @endforeach

            </div>
          </div>

          @endforeach

        </div>
      </div>
    </section>
    

    <!-- tab Section -->
    <section class="featur-tabs padding-top-60 padding-bottom-60">
      <div class="container"> 
        <div class="heading">
          <h2>Recientemente actualizados</h2>
          <hr>
        </div>
    
        <div class="item-col-5"> 
            @foreach($mostRecentProducts as $product)
                @include('layouts.product')
            @endforeach
        </div>
        
    </section>


    <!-- Clients img -->
    <section class="light-gry-bg clients-img margin-top-60">
      <div class="container">
        <ul>
          <li><img src="{{ asset('resources/images/partner_logos/rolanplast_bn.png') }}" alt="" ></li>
          <li><img src="{{ asset('resources/images/partner_logos/cotnyl_bn.png') }}" alt="" ></li>
          <li><img src="{{ asset('resources/images/partner_logos/plastivas_bn.png') }}" alt="" ></li>
          <li><img src="{{ asset('resources/images/partner_logos/work_bn.png') }}" alt="" ></li>
          <li><img src="{{ asset('resources/images/partner_logos/rapifix.png') }}" alt="" ></li>
        </ul>
      </div>
    </section>
    
  </div>
  <!-- End Content --> 

  @endsection