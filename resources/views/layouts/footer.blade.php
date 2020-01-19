  <!-- Footer -->
  <footer>
    <div class="container"> 
        
      <hr/>

      <div class="row"> 
        
        <div class="col-md-5">
          <h4>Contactános!</h4>
          <p>Dirección: Francisco de Uzal 3850, Olivos, Buenos Aires. Argentina</p>
          <p>Whatsapp: +54 11 65841728</p>
          <p>Email: <a href="mailto:ventas@rympapelera.com.ar">ventas@rympapelera.com.ar</a></p>
          <div class="social-links"> 
            <a href="https://www.facebook.com/RM-Papelera-742145552601137/" target="_blank"><i class="fa fa-facebook"></i></a> 
            <a href="https://www.instagram.com/rym_papelera/" target="_blank"><i class="fa fa-instagram"></i></a> 
          </div>
        </div>

        <div class="col-md-3">
          <h4>Categorías</h4>
          <ul class="links-footer">
            @foreach($categories as $category)
            <li><a href="{{ route('category', $category->name_slug) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>

        <!-- Categories -->
        <div class="col-md-3">
          <h4>Páginas</h4>
          <ul class="links-footer">
            <li><a href="{{ route('contact') }}">Contacto</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  