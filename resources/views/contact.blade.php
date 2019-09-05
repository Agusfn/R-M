@extends('layouts.main')

@section('title', 'Contacto')


@section('custom-css')
<style type="text/css">
  .map-responsive{
    height: 300px;
    position:relative;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
@endsection


@section('content')
  <!-- Content -->
  <div id="content"> 
    
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Contact</li>
        </ol>
      </div>
    </div>
    
    <!-- Contact -->
    <section class="contact-sec padding-top-40 padding-bottom-80">
      <div class="container"> 

        <div class="map-responsive margin-bottom-40">
          <iframe width="100%" height="100%" frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJyTRYET22vJURwis3VkE2-KA&key=AIzaSyAOBFAqEfV4Ah2Mj0_iWM6LeVlRNukxD38" allowfullscreen></iframe> 
        </div>

        <!-- MAP -->
        <!--section class="map-block margin-bottom-40">
          <div class="map-wrapper" id="map-canvas" data-lat="-37.814199" data-lng="144.961560" data-zoom="13" data-style="1"></div>
          <div class="markers-wrapper addresses-block"> <a class="marker" data-rel="map-canvas" data-lat="-37.814199" data-lng="144.961560" data-string="Smart Tech"></a> </div>
        </section-->
        
        <!-- Conatct -->
        <div class="contact">
          <div class="contact-form"> 
            <!-- FORM  -->
            <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
              <div class="row">
                <div class="col-md-8"> 
                  
                  <!-- Payment information -->
                  <div class="heading">
                    <h2>Envianos un mensaje</h2>
                  </div>
                  <ul class="row">
                    <li class="col-sm-6">
                      <label>Nombre o razón social
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                      </label>
                    </li>
                    <li class="col-sm-6">
                      <label>E-mail
                        <input type="text" class="form-control" name="email" id="email" placeholder="">
                      </label>
                    </li>
                    <li class="col-sm-12">
                      <label>Mensaje
                        <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                      </label>
                    </li>
                    <li class="col-sm-12 no-margin">
                      <button type="submit" value="submit" class="btn-round" id="btn_submit" onClick="proceed();">Enviar mensaje</button>
                    </li>
                  </ul>
                </div>
                
                <!-- Conatct Infomation -->
                <div class="col-md-4">
                  <div class="contact-info">
                    <h6><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección:</h6>
                    <p>Francisco de Uzal 3850, Olivos<br/>
                      Buenos Aires, Argentina</p>
                    <h6><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp:</h6>
                    <p>11 65841728</p>
                    <h6><i class="fa fa-phone" aria-hidden="true"></i> Teléfono:</h6>
                    <p>(+100) 123 456 7890</p>
                    <p>(+100) 987 654 3210 </p>
                    <h6><i class="fa fa-envelope-o" aria-hidden="true"></i> Email:</h6>
                    <p><a href="mailto:ventas@rympapelera.com.ar">ventas@rympapelera.com.ar</a></p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
  </div>
  <!-- End Content --> 
@endsection


@section('custom-js')
<!-- Begin Map Script--> 
<!--script src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOBFAqEfV4Ah2Mj0_iWM6LeVlRNukxD38&q=Eiffel+Tower,Paris+France"></script> 
<script src="{{ asset('resources/js/vendors/map.js') }}"></script-->
@endsection