@extends('layouts.app_welcome')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">
    <style>
        .google-meet-section {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .google-meet-title {
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
        .meet-button {
            background: #007bff;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
            transition: background 0.3s;
        }
        .meet-button:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
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
                                <a href="#" aria-current="page" class="navigation-item w-nav-link w--current" style="max-width: 1280px; color: #333;">Integración Google Meet</a>
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
                            
                            <!-- Ejemplo 1: Uso Básico -->
                            <div class="google-meet-section">
                                <h3 class="google-meet-title">1. Uso Básico del Controlador</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    El método estático <code>createMeetLinkStatic()</code> crea una reunión de Google Meet
                                    y devuelve la URL. Requiere información del profesional, cliente y hora de inicio.
                                </p>

                                <div class="example-code">
                                    <strong>Ejemplo de uso:</strong><br><br>
                                    use App\Http\Controllers\GoogleMeetController;<br><br>
                                    $meetUrl = GoogleMeetController::createMeetLinkStatic(<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'Nombre Profesional',<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'profesional@ejemplo.com',<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'Nombre Cliente',<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'cliente@ejemplo.com',<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'2025-12-15 10:00:00'<br>
                                    );<br><br>
                                    if ($meetUrl) {<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;// Guardar $meetUrl en tu base de datos<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;$appointment->google_meet_url = $meetUrl;<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;$appointment->save();<br>
                                    }
                                </div>
                            </div>

                            <!-- Ejemplo 2: Vista de Inicio de Sesión -->
                            <div class="google-meet-section">
                                <h3 class="google-meet-title">2. Vista de Inicio de Sesión</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    Ejemplo de cómo mostrar el botón para iniciar la sesión de Google Meet.
                                </p>

                                <div class="text-center" style="padding: 2rem; background: #f8f9fa; border-radius: 5px;">
                                    <h4 style="color: #333;">¡Hola! Cliente Ejemplo</h4>
                                    <p style="color: #666;">
                                        Ya puedes iniciar tu sesión de consultoría con el profesional <strong>Profesional Ejemplo</strong>.
                                    </p>
                                    <p style="color: #666;">
                                        Dale clic al botón de abajo para ingresar a la videollamada de Google Meet.
                                    </p>
                                    <br>
                                    <a href="https://meet.google.com/ejemplo-reunion" 
                                       target="_blank" 
                                       class="meet-button">
                                        <i class="fas fa-video"></i> Iniciar mi sesión
                                    </a>
                                    <br><br>
                                    <button class="btn btn-secondary">Finalizar sesión</button>
                                </div>

                                <div class="example-code mt-3">
                                    <strong>Código Blade:</strong><br><br>
                                    @if (!is_null($appointment->google_meet_url))<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&lt;a target="_blank" href="{{ '{{' }} $appointment->google_meet_url }}" class="btn btn-primary"&gt;<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;i class="fas fa-video"&gt;&lt;/i&gt; Iniciar mi sesión<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&lt;/a&gt;<br>
                                    @else<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&lt;p class="text-danger"&gt;Error: No se pudo crear el enlace de Google Meet&lt;/p&gt;<br>
                                    @endif
                                </div>
                            </div>

                            <!-- Ejemplo 3: Configuración -->
                            <div class="google-meet-section">
                                <h3 class="google-meet-title">3. Configuración Requerida</h3>
                                
                                <div class="example-code">
                                    <strong>Variables de entorno (.env):</strong><br><br>
                                    # Google Meet/Calendar (Service Account)<br>
                                    GOOGLE_SERVICE_ACCOUNT_SECRET_PATH=app/google/google-meet-credentials.json<br>
                                    GOOGLE_MAIN_ACCOUNT=tu-email@ejemplo.com<br>
                                    GOOGLE_REDIRECT_URI={{ '{{' }} env('APP_URL') }}/auth/google/callback<br><br>
                                    <strong>Archivo de configuración (config/services.php):</strong><br><br>
                                    'google_meet' => [<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'calendar_id' => env('GOOGLE_MEET_CLIENT_ID', 'primary'),<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;'service_account_json_location' => env('GOOGLE_SERVICE_ACCOUNT_SECRET_PATH'),<br>
                                    ],
                                </div>

                                <div class="alert alert-info mt-3" style="background: #e7f3ff; border: 1px solid #b3d9ff; padding: 1rem; border-radius: 5px;">
                                    <strong>Nota importante:</strong> Necesitas configurar una Service Account en Google Cloud Console
                                    y descargar el archivo JSON de credenciales. Coloca el archivo en <code>storage/app/google/</code>
                                    y actualiza la ruta en tu archivo .env.
                                </div>
                            </div>

                            <!-- Ejemplo 4: Estructura de Base de Datos -->
                            <div class="google-meet-section">
                                <h3 class="google-meet-title">4. Estructura de Base de Datos</h3>
                                
                                <p style="color: #666; margin-bottom: 1rem;">
                                    Campos agregados a la tabla <code>appointments</code>:
                                </p>

                                <div class="example-code">
                                    <strong>Campos en la tabla appointments:</strong><br><br>
                                    • google_meet_url (string/text) - URL de la reunión<br>
                                    • google_event_id (string) - ID del evento en Google Calendar<br>
                                    • google_hangout_link (text) - Link alternativo de Hangouts<br>
                                    • google_event_created_at (timestamp) - Fecha de creación del evento
                                </div>
                            </div>

                            <!-- Ejemplo 5: Manejo de Errores -->
                            <div class="google-meet-section">
                                <h3 class="google-meet-title">5. Manejo de Errores</h3>
                                
                                <div class="example-code">
                                    <strong>Ejemplo con manejo de errores:</strong><br><br>
                                    try {<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;$meetUrl = GoogleMeetController::createMeetLinkStatic(<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$professionalName,<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$professionalEmail,<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$clientName,<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$clientEmail,<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$startTime<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;);<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;if ($meetUrl) {<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Éxito: guardar URL<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$appointment->google_meet_url = $meetUrl;<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$appointment->save();<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Error: loguear y notificar<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\Log::error('No se pudo crear Google Meet');<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return back()->with('error', 'Error al crear la reunión');<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                                    } catch (\Exception $e) {<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;\Log::error('Excepción al crear Meet: ' . $e->getMessage());<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;return back()->with('error', 'Error inesperado');<br>
                                    }
                                </div>
                            </div>

                            <!-- Nota informativa -->
                            <div class="alert alert-warning mt-4" style="background: #fff3cd; border: 1px solid #ffc107; padding: 1rem; border-radius: 5px;">
                                <strong>Importante:</strong> Esta implementación requiere:
                                <ul style="margin-top: 0.5rem; margin-bottom: 0;">
                                    <li>Cuenta de Google Cloud Platform</li>
                                    <li>Service Account configurada</li>
                                    <li>API de Google Calendar habilitada</li>
                                    <li>Archivo JSON de credenciales descargado</li>
                                    <li>Paquete <code>google/apiclient</code> instalado via Composer</li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

