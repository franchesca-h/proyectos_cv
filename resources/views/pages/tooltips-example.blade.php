@extends('layouts.app_welcome')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">
    <style>
        .tooltip-example-section {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .tooltip-example-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #666;
        }
        .info-icon {
            color: #007bff;
            cursor: pointer;
            margin-left: 8px;
            font-size: 1rem;
        }
        .info-icon:hover {
            color: #0056b3;
        }
        .example-item {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .example-label {
            color: #333;
            font-weight: 600;
            margin-bottom: 0.5rem;
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
                                <a href="#" aria-current="page" class="navigation-item w-nav-link w--current" style="max-width: 1280px; color: #333;">Ejemplos de Tooltips</a>
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
                            
                            <!-- Ejemplo 1: Tooltips en Formularios -->
                            <div class="tooltip-example-section">
                                <h3 class="tooltip-example-title">1. Tooltips en Formularios</h3>
                                
                                <div class="example-item">
                                    <label class="example-label">
                                        Nombre del Servicio
                                        <i class="fas fa-info-circle info-icon" 
                                           data-toggle="tooltip" 
                                           data-placement="right" 
                                           title="Ingresa el nombre completo del servicio que deseas ofrecer. Este nombre será visible para todos los usuarios."></i>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Ejemplo: Consultoría Web">
                                </div>

                                <div class="example-item">
                                    <label class="example-label">
                                        Precio
                                        <i class="fas fa-info-circle info-icon" 
                                           data-toggle="tooltip" 
                                           data-placement="right" 
                                           title="Ingresa el precio en tu moneda local. Puedes usar decimales (ejemplo: 99.99)."></i>
                                    </label>
                                    <input type="number" class="form-control" placeholder="0.00" step="0.01">
                                </div>

                                <div class="example-item">
                                    <label class="example-label">
                                        Descripción
                                        <i class="fas fa-info-circle info-icon" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           data-html="true"
                                           title="<strong>Consejo:</strong> Describe detalladamente tu servicio. Incluye beneficios, características principales y cualquier información relevante que ayude a los usuarios a entender qué ofreces."></i>
                                    </label>
                                    <textarea class="form-control" rows="3" placeholder="Describe tu servicio aquí..."></textarea>
                                </div>
                            </div>

                            <!-- Ejemplo 2: Tooltips en Botones -->
                            <div class="tooltip-example-section">
                                <h3 class="tooltip-example-title">2. Tooltips en Botones</h3>
                                
                                <div class="example-item">
                                    <button type="button" 
                                            class="btn btn-primary" 
                                            data-toggle="tooltip" 
                                            data-placement="top" 
                                            title="Guarda los cambios realizados en el formulario">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                    
                                    <button type="button" 
                                            class="btn btn-secondary ml-2" 
                                            data-toggle="tooltip" 
                                            data-placement="top" 
                                            title="Elimina este elemento permanentemente. Esta acción no se puede deshacer.">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                    
                                    <button type="button" 
                                            class="btn btn-info ml-2" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Exporta los datos actuales a un archivo Excel">
                                        <i class="fas fa-file-excel"></i> Exportar
                                    </button>
                                </div>
                            </div>

                            <!-- Ejemplo 3: Tooltips en Tablas -->
                            <div class="tooltip-example-section">
                                <h3 class="tooltip-example-title">3. Tooltips en Tablas</h3>
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>
                                                    Servicio Ejemplo 1
                                                    <i class="fas fa-info-circle info-icon ml-2" 
                                                       data-toggle="tooltip" 
                                                       data-placement="right" 
                                                       title="Este servicio está activo y disponible para todos los usuarios."></i>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Activo</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" 
                                                            data-toggle="tooltip" 
                                                            data-placement="top" 
                                                            title="Ver detalles completos del servicio">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-warning ml-1" 
                                                            data-toggle="tooltip" 
                                                            data-placement="top" 
                                                            title="Editar información del servicio">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>002</td>
                                                <td>
                                                    Servicio Ejemplo 2
                                                    <i class="fas fa-info-circle info-icon ml-2" 
                                                       data-toggle="tooltip" 
                                                       data-placement="right" 
                                                       title="Este servicio está temporalmente desactivado."></i>
                                                </td>
                                                <td>
                                                    <span class="badge badge-secondary">Inactivo</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" 
                                                            data-toggle="tooltip" 
                                                            data-placement="top" 
                                                            title="Ver detalles completos del servicio">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-warning ml-1" 
                                                            data-toggle="tooltip" 
                                                            data-placement="top" 
                                                            title="Editar información del servicio">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Ejemplo 4: Tooltips con HTML -->
                            <div class="tooltip-example-section">
                                <h3 class="tooltip-example-title">4. Tooltips con Contenido HTML</h3>
                                
                                <div class="example-item">
                                    <p>
                                        <strong>Información importante:</strong>
                                        <i class="fas fa-question-circle info-icon" 
                                           data-toggle="tooltip" 
                                           data-placement="right" 
                                           data-html="true"
                                           title="<div style='text-align: left;'><strong>Ayuda:</strong><br>Este campo es obligatorio. Asegúrate de completar toda la información requerida para continuar con el proceso.</div>"></i>
                                    </p>
                                </div>

                                <div class="example-item">
                                    <label class="example-label">
                                        Método de Pago
                                        <i class="fas fa-info-circle info-icon" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           data-html="true"
                                           title="<div style='text-align: left;'><strong>Métodos disponibles:</strong><br>• Tarjeta de crédito<br>• Transferencia bancaria<br>• PayPal<br>• Efectivo (solo en tienda física)</div>"></i>
                                    </label>
                                    <select class="form-control">
                                        <option>Selecciona un método</option>
                                        <option>Tarjeta de crédito</option>
                                        <option>Transferencia bancaria</option>
                                        <option>PayPal</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Ejemplo 5: Diferentes Posiciones -->
                            <div class="tooltip-example-section">
                                <h3 class="tooltip-example-title">5. Diferentes Posiciones de Tooltip</h3>
                                
                                <div class="example-item text-center">
                                    <button type="button" 
                                            class="btn btn-primary m-2" 
                                            data-toggle="tooltip" 
                                            data-placement="top" 
                                            title="Tooltip arriba">
                                        Arriba
                                    </button>
                                    
                                    <button type="button" 
                                            class="btn btn-primary m-2" 
                                            data-toggle="tooltip" 
                                            data-placement="right" 
                                            title="Tooltip a la derecha">
                                        Derecha
                                    </button>
                                    
                                    <button type="button" 
                                            class="btn btn-primary m-2" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Tooltip abajo">
                                        Abajo
                                    </button>
                                    
                                    <button type="button" 
                                            class="btn btn-primary m-2" 
                                            data-toggle="tooltip" 
                                            data-placement="left" 
                                            title="Tooltip a la izquierda">
                                        Izquierda
                                    </button>
                                </div>
                            </div>

                            <!-- Nota informativa -->
                            <div class="alert alert-info mt-4" style="background: #e7f3ff; border: 1px solid #b3d9ff; padding: 1rem; border-radius: 5px;">
                                <strong>Nota:</strong> Estos son ejemplos de implementación de tooltips usando Bootstrap. Los tooltips se activan al pasar el mouse sobre los elementos con el icono de información o los botones.
                            </div>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Inicializar todos los tooltips de Bootstrap
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush

