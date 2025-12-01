@extends('layouts.app_welcome')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
@endpush

@section('content')

   <header class="at-header-new">
      <div class="container">
         <nav class="navbar navbar-expand-lg at-navbar-new p-0">
            <a class="navbar-brand at-logo-new" href="/">
               <!-- Reemplaza esto con tu logo: <img src="{{ asset('argon') }}/img/logo.svg" alt="Tu Nombre de Empresa" class="at-logo-image"> -->
               <span style="font-size: 1.5rem; font-weight: bold; color: #333;">Tu Logo</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav at-nav-links">
                  <li class="nav-item"><a class="nav-link" href="/#quienes-somos">Quiénes somos</a></li>
                  <li class="nav-item"><a class="nav-link" href="/#temas">Cómo podemos ayudarte</a></li>
                  <li class="nav-item"><a class="nav-link" href="/#servicios">Servicios</a></li>
                  <li class="nav-item"><a class="nav-link" href="/#profesionales">Profesionales</a></li>
               </ul>
               <a href="/login" class="btn btn-primary">Ingresar</a>
            </div>
         </nav>
      </div>
   </header>

   <section class="py-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-10">
               <h1 class="at-quienes-title mb-3 text-center">Espacios grupales</h1>
               <div class="text-center mb-4">
                  <p class="lead">
                     <strong>Precio:</strong> desde $ 5.00
                  </p>
               </div>
               <article class="at-tema-description">
                  <p>Comparte con tu comunidad en diversos formatos. Los espacios grupales son una oportunidad única para conectarte con otras personas que están pasando por situaciones similares.</p>
                  <p>En estos espacios encontrarás apoyo mutuo, comprensión y herramientas compartidas. Trabajamos temas como autoestima, relaciones, desarrollo personal y mucho más.</p>
                  <p>Los grupos están diseñados para crear un ambiente seguro donde puedas compartir tus experiencias, aprender de otras personas y sentirte parte de una comunidad que te entiende y te apoya.</p>
               </article>
            </div>
         </div>
      </div>
   </section>

   <section class="py-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-8 text-center">
               <h2 class="mb-4">¿Listo para dar el siguiente paso?</h2>
               <p>Cuéntanos cómo te sientes y te acompañamos a encontrar el espacio ideal para ti.</p>
               <div class="d-flex flex-column flex-md-row justify-content-center mt-4">
                  <a href="/register-form" class="btn btn-primary mb-3 mb-md-0 mr-md-3" data-cta="servicio-espacios-grupales">¡Lo quiero!</a>
                  <a href="/#servicios" class="btn btn-primary">Ver más servicios</a>
               </div>
            </div>
         </div>
      </div>
   </section>

   @include('layouts.whatsapp_button')
   @include('layouts.facebook_pixel')
@endsection


