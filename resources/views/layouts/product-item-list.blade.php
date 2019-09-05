              <div class="product">
                <article>                   
                  <!-- Product img -->
                  <div class="media-left">
                    <div class="item-img"> <img class="img-responsive" src="{{ $product->thumbnailUrl() }}" alt="{{ $product->name }}" >  </div>
                  </div>                  
                  <!-- Content -->
                  <div class="media-body">
                    <div class="row">                       
                      <!-- Content Left -->
                      <div class="col-sm-7"> <span class="tag">{{ $product->category->name }}</span> <a href="{{ $product->url() }}" class="tittle">{{ $product->name }}</a> 
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <!--ul class="bullet-round-list">
                          <li>Screen: 1920 x 1080 pixels</li>
                          <li>Processor: 2.5 GHz None</li>
                          <li>RAM: 8 GB</li>
                          <li>Hard Drive: Flash memory solid state</li>
                          <li>Graphics : Intel HD Graphics 520 Integrated</li>
                        </ul-->
                        <p style="max-height: 100px;">
                          {!! nl2br($product->description) !!}
                        </p>
                      </div>                      
                      <!-- Content Right -->
                      <div class="col-sm-5 text-center"> <a href="#." class="heart"><i class="fa fa-heart"></i></a> <a href="#." class="heart navi"><i class="fa fa-navicon"></i></a>
                        <div class="position-center-center">
                          <div class="price">$350.00</div>
                          <p>Availability: <span class="in-stock">In stock</span></p>
                          <a href="{{ $product->url() }}" class="btn-round">Ver producto</a> </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>