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
                      <div class="col-sm-7">
                        <span class="tag">{{ $product->category->name }} {{ $product->subcategory ? '> '.$product->subcategory->name : '' }}</span>
                        <a href="{{ $product->url() }}" class="tittle">{{ $product->name }}</a> 

                        <p style="max-height: 100px;">
                          {!! nl2br($product->description) !!}
                        </p>
                      </div>                      
                      <!-- Content Right -->
                      <div class="col-sm-5 text-center">
                        <div class="position-center-center">
                          <a href="{{ $product->url() }}" class="btn-round">Ver producto</a> </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>