@extends('layouts.app_welcome')

@php
    $footerClass = 'at-emergency-footer';
@endphp

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">
    <style>
        .at-emergency-title {
            color: #333;
            margin-bottom: 1rem;
        }
        .at-emergency-description {
            color: #666;
            margin-bottom: 1rem;
        }
        .at-emergency-section-title {
            color: #333;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }
        .at-emergency-line-item {
            display: flex;
            margin-bottom: 2rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .at-emergency-line-number {
            margin-right: 1.5rem;
        }
        .at-emergency-line-content {
            flex: 1;
        }
        .at-emergency-line-title {
            color: #333;
            margin-bottom: 0.5rem;
        }
        .at-emergency-line-details {
            color: #666;
        }
        .at-emergency-link {
            color: #007bff;
            text-decoration: none;
        }
        .at-emergency-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
      <div data-collapse="medium" data-animation="default" data-duration="400" id="navigation-section" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav at-light-background">
         <div class="container-main menu w-container at-light-background">
            <div class="navigation-items">
               <a href="/">
                  <!-- Reemplaza esto con tu logo: <img src="{{ asset('argon') }}/img/logo.svg" width="150" alt="Tu Nombre de Empresa" style="display: unset !important;"> -->
                  <span style="font-size: 1.5rem; font-weight: bold; color: #333;">Tu Logo</span>
               </a>
               <div class="navigation-wrap">
                  <nav role="navigation" class="navigation-items w-nav-menu">
                     <div class="div-block-15">
                        <div class="div-block-14">
                           <a href="#" aria-current="page" class="navigation-item w-nav-link w--current" style="max-width: 1280px; color: #333;">Líneas de Emergencia</a>
                        </div>
                     </div>
                     <a href="/" data-cta="questionario" class="btn btn-primary">Volver al inicio</a>
                  </nav>
               </div>
            </div>
         </div>
         <div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div>
      </div>
      <div class="hero-section wf-section at-light-background" style="margin-top: -3rem;">
         <div class="container-main no-bottom-margin w-container">
            <div class="columns-10 w-row">
               <div class="column-7 w-col w-col-12 w-col-stack">
                  <div class="row">
                     <div class="col-md-2 text-left web-desktop at-emergency-decorative-left">
                        <!-- Reemplaza estas imágenes con tus elementos decorativos -->
                        <!-- <img src="{{ asset('argon') }}/img/assets/png/flor4.png" alt="Decoración" style="margin-bottom: 1rem;"> -->
                     </div>
                     <div class="col-md-7">
                        <h1 class="at-font-weight-600 at-font-size-2 at-emergency-title">Líneas de ayuda en casos de crisis</h1>
                        <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-description">
                           Si estás atravesando una crisis emocional, pensamientos de desesperanza o de hacerte daño, no estás sola. Hay personas preparadas para escucharte y ayudarte en este momento.
                        </p>
                        <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-description" style="margin-bottom: 1.5rem;">
                           Ingresa a <a href="https://findahelpline.com/es-ES" target="_blank" class="at-emergency-link">https://findahelpline.com/es-ES</a> y encuentra recursos en tu país.
                        </p>
                        
                        <br>
                        <h2 class="at-font-weight-600 at-font-size-1-5 at-emergency-section-title">Líneas de emergencia</h2>
                        
                        <div class="at-emergency-line-item">
                           <div class="at-emergency-line-number">
                              <span style="font-size: 2rem; font-weight: bold; color: #333;">1</span>
                           </div>
                           <div class="at-emergency-line-content">
                              <h5 class="at-font-weight-600 at-font-size-1-2 at-emergency-line-title">Línea de Emergencia Nacional</h5>
                              <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-line-details">
                                 🕐 24/7<br>
                                 👤 Consejeros profesionales<br>
                                 ☎️ <a href="tel:911" class="at-emergency-link">911</a> o <a href="tel:112" class="at-emergency-link">112</a><br>
                                 🌐 <a href="#" target="_blank" class="at-emergency-link">www.ejemplo-emergencias.com</a>
                              </p>
                           </div>
                        </div>
                        
                        <div class="at-emergency-line-item">
                           <div class="at-emergency-line-number">
                              <span style="font-size: 2rem; font-weight: bold; color: #333;">2</span>
                           </div>
                           <div class="at-emergency-line-content">
                              <h5 class="at-font-weight-600 at-font-size-1-2 at-emergency-line-title">Línea de Apoyo Psicológico</h5>
                              <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-line-details">
                                 🕐 24/7<br>
                                 👤 Psicólogos y consejeros<br>
                                 ☎️ <a href="tel:0800123456" class="at-emergency-link">0800 123 456</a><br>
                                 🌐 <a href="#" target="_blank" class="at-emergency-link">www.ejemplo-apoyo-psicologico.com</a>
                              </p>
                           </div>
                        </div>
                        
                        <div class="at-emergency-line-item">
                           <div class="at-emergency-line-number">
                              <span style="font-size: 2rem; font-weight: bold; color: #333;">3</span>
                           </div>
                           <div class="at-emergency-line-content">
                              <h5 class="at-font-weight-600 at-font-size-1-2 at-emergency-line-title">Línea de Prevención del Suicidio</h5>
                              <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-line-details">
                                 🕐 24/7<br>
                                 👤 Especialistas en crisis<br>
                                 ☎️ <a href="tel:0800987654" class="at-emergency-link">0800 987 654</a><br>
                                 🌐 <a href="#" target="_blank" class="at-emergency-link">www.ejemplo-prevencion-suicidio.com</a>
                              </p>
                           </div>
                        </div>
                        
                        <div class="at-emergency-line-item">
                           <div class="at-emergency-line-number">
                              <span style="font-size: 2rem; font-weight: bold; color: #333;">4</span>
                           </div>
                           <div class="at-emergency-line-content">
                              <h5 class="at-font-weight-600 at-font-size-1-2 at-emergency-line-title">Chat de Apoyo</h5>
                              <p class="at-font-size-1 at-font-weight-400 at-line-height-12 at-emergency-line-details">
                                 🕐 Lunes a viernes 19:00 - 3:00<br>
                                 👤 Voluntarios capacitados<br>
                                 💬 Chat disponible en línea<br>
                                 🌐 <a href="#" target="_blank" class="at-emergency-link">www.ejemplo-chat-apoyo.com</a>
                              </p>
                           </div>
                        </div>
                        
                        <div class="alert alert-info mt-4" style="background: #e7f3ff; border: 1px solid #b3d9ff; padding: 1rem; border-radius: 5px;">
                           <strong>Nota importante:</strong> Los números y enlaces mostrados son ejemplos. Por favor, actualiza esta información con las líneas de emergencia reales de tu país o región.
                        </div>
                        
                     </div>
                     <div class="col-md-3 text-right web-desktop at-emergency-decorative-right">
                        <!-- Reemplaza esta imagen con tu elemento decorativo -->
                        <!-- <img src="{{ asset('argon') }}/img/assets/png/grupo_52.png" alt="Decoración" class="at-emergency-arcoiris-right"> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection

