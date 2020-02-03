@extends('layouts.main')


@section('meta')
<meta name="description" content="">

<meta property="og:description" content="" />
<meta property="og:image" content="{{ asset('resources/images/logo-grande.jpg') }}" />
<meta property="og:type" content="website" /> 
@endsection


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

        @if(session()->has('success'))
        <div class="alert alert-success">
          El mensaje se envió correctamente, será respondido a la brevedad.
        </div>
        @endif        
        <!-- Conatct -->
        <div class="contact">
          <div class="contact-form"> 
            <!-- FORM  -->
            <form role="form" id="contact_form" class="contact-form" method="POST" action="{{ route('contact') }}">
              @csrf
              <div class="row">
                <div class="col-md-8"> 
                  
                  <!-- Payment information -->
                  <div class="heading">
                    <h2>Envianos un mensaje</h2>
                  </div>
                    <ul class="row">
                      <li class="col-sm-6">

                        <div class="form-group @error('nombre') has-error @enderror">
                          <label>Nombre o razón social</label>
                            <input type="text" class="form-control" name="nombre" id="name" value="{{ old('nombre') ?: '' }}" placeholder="" required="">
                            @error('nombre')
                              <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                      </li>
                      <li class="col-sm-6">

                        <div class="form-group @error('email') has-error @enderror">
                          <label>E-mail
                            <input type="text" class="form-control" name="email" id="email"  value="{{ old('email') ?: '' }}" placeholder="" required="">
                            @error('email')
                              <span class="help-block">{{ $message }}</span>
                            @enderror
                          </label>
                        </div>

                      </li>
                      <li class="col-sm-12">

                        <div class="form-group @error('mensaje') has-error @enderror">
                          <label>Mensaje</label>
                          <textarea class="form-control" name="mensaje" id="message" rows="5" placeholder="" required="">{{ old('mensaje') ?: '' }}</textarea>
                          @error('mensaje')
                            <span class="help-block">{{ $message }}</span>
                          @enderror
                        </div>

                      </li>
                      <li class="col-sm-12 no-margin">
                        <button type="submit" value="submit" class="btn-round" id="btn_submit">Enviar mensaje</button>
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