          <!-- Product -->
          <div class="product">
            <article> 
            	<a href="{{ $product->url() }}"><img class="img-responsive" src="{{ $product->thumbnailUrl() }}" alt="" ></a> <!--span class="sale-tag">-25%</span--> 
              
              <!-- Content --> 
              <span class="tag">{{ $product->category->name }}</span> <a href="{{ $product->url() }}" class="tittle">{{ $product->name }}</a> 
              <!-- Reviews -->
              {{--<p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 <span>$200.00</span></div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> --}}
            </article>
          </div>