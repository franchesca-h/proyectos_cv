@extends('layouts.app_welcome')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">
    <style>
        .popup-example-section {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .popup-example-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #666;
        }
        .example-code {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
        }
        .example-button {
            margin: 0.5rem;
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
                                <a href="#" aria-current="page" class="navigation-item w-nav-link w--current" style="max-width: 1280px; color: #333;">Ejemplos de Popups</a>
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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            
                            <!-- Ejemplo 1: Modal de Reunión Gratuita -->
                            <div class="popup-example-section">
                                <h3 class="popup-example-title">1. Modal de Reunión Gratuita</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    Este modal se muestra automáticamente después de 20 segundos en la página. 
                                    Incluye un botón para agendar una reunión gratuita.
                                </p>

                                <button type="button" 
                                        class="btn btn-primary example-button" 
                                        onclick="$('#freeSessionModal').modal('show');">
                                    <i class="fas fa-calendar"></i> Mostrar Modal de Reunión Gratuita
                                </button>

                                <div class="example-code">
                                    <strong>Uso:</strong><br>
                                    @include('layouts.modals.session_free')<br><br>
                                    <strong>Nota:</strong> El modal se abre automáticamente después de 20 segundos. 
                                    Cambia la URL en la función goToFreeMeeting() por la de tu calendario.
                                </div>
                            </div>

                            <!-- Ejemplo 2: Popup de Login -->
                            <div class="popup-example-section">
                                <h3 class="popup-example-title">2. Popup de Login/Prompt</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    Modal genérico para mostrar mensajes que requieren login. 
                                    Útil para proteger contenido o funcionalidades.
                                </p>

                                <button type="button" 
                                        class="btn btn-primary example-button" 
                                        onclick="showLoginPrompt('Acceso Requerido', 'Para acceder a esta funcionalidad, necesitas crear una cuenta o iniciar sesión.');">
                                    <i class="fas fa-lock"></i> Mostrar Popup de Login
                                </button>

                                <button type="button" 
                                        class="btn btn-info example-button" 
                                        onclick="showLoginPrompt('¡Bienvenido!', 'Únete a nuestra plataforma para acceder a contenido exclusivo y beneficios especiales.');">
                                    <i class="fas fa-user-plus"></i> Popup de Bienvenida
                                </button>

                                <div class="example-code">
                                    <strong>Uso:</strong><br>
                                    @include('components.popup')<br><br>
                                    showLoginPrompt('Título', 'Mensaje');<br><br>
                                    <strong>Ejemplo:</strong><br>
                                    showLoginPrompt('Acceso Requerido', 'Necesitas iniciar sesión para continuar.');
                                </div>
                            </div>

                            <!-- Ejemplo 3: Botón Flotante de Consulta -->
                            <div class="popup-example-section">
                                <h3 class="popup-example-title">3. Botón Flotante de Consulta</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    Botón flotante fijo en la esquina inferior derecha con mensaje emergente. 
                                    El mensaje aparece después de 20 segundos.
                                </p>

                                <div class="example-code">
                                    <strong>Uso:</strong><br>
                                    @include('layouts.free_consultation_button')<br><br>
                                    <strong>Características:</strong><br>
                                    • Botón flotante fijo<br>
                                    • Mensaje aparece después de 20 segundos<br>
                                    • Responsive (se adapta a móviles)<br>
                                    • Personalizable (colores, texto, URL)
                                </div>

                                <div class="alert alert-info mt-3" style="background: #e7f3ff; border: 1px solid #b3d9ff; padding: 1rem; border-radius: 5px;">
                                    <strong>Nota:</strong> El botón flotante se muestra automáticamente cuando incluyes el componente. 
                                    Cambia la URL del enlace y el texto del mensaje según tus necesidades.
                                </div>
                            </div>

                            <!-- Ejemplo 4: Implementación Completa -->
                            <div class="popup-example-section">
                                <h3 class="popup-example-title">4. Código de Implementación</h3>
                                
                                <div class="example-code">
                                    <strong>En tu vista Blade:</strong><br><br>
                                    @extends('layouts.app_welcome')<br><br>
                                    @section('content')<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ '{{-- Tu contenido aquí --}}' }}<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ '@include' }}('layouts.modals.session_free')<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ '@include' }}('components.popup')<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ '@include' }}('layouts.free_consultation_button')<br>
                                    @endsection<br><br>
                                    <strong>El modal de reunión gratuita se abrirá automáticamente después de 20 segundos.</strong>
                                </div>
                            </div>

                            <!-- Nota informativa -->
                            <div class="alert alert-warning mt-4" style="background: #fff3cd; border: 1px solid #ffc107; padding: 1rem; border-radius: 5px;">
                                <strong>Importante:</strong> Recuerda personalizar las URLs y textos según tu empresa. 
                                Los componentes están listos para usar pero requieren ajustes según tus necesidades específicas.
                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir los modales para que funcionen los ejemplos -->
    @include('layouts.modals.session_free')
    @include('components.popup')
@endsection

