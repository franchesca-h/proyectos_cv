@extends('layouts.app_welcome')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/style.css" rel="stylesheet">
    <style>
        .complaint-form {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-section {
            margin-bottom: 2rem;
        }
        .form-section-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #666;
        }
        .form-group label {
            color: #333;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .form-group label.required::after {
            content: " *";
            color: #dc3545;
        }
        .form-control:focus {
            border-color: #666;
            box-shadow: 0 0 0 0.2rem rgba(102, 102, 102, 0.25);
        }
        .alert {
            margin-bottom: 1.5rem;
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
                                <a href="#" aria-current="page" class="navigation-item w-nav-link w--current" style="max-width: 1280px; color: #333;">Libro de Reclamaciones</a>
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
                            <div class="complaint-form">
                                <h3 class="mb-4" style="color: #333;">Libro de Reclamaciones</h3>
                                
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('complaints.store') }}" autocomplete="off">
                                    @csrf
                                    
                                    <!-- Fecha del Reclamo -->
                                    <div class="form-group">
                                        <label for="claim_date" class="required">Fecha del Reclamo o queja</label>
                                        <input type="date" 
                                               class="form-control @error('claim_date') is-invalid @enderror" 
                                               id="claim_date" 
                                               name="claim_date" 
                                               value="{{ old('claim_date', date('Y-m-d')) }}" 
                                               required>
                                        @error('claim_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted">Formato: dd/mm/aaaa</small>
                                    </div>

                                    <!-- 1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE -->
                                    <div class="form-section">
                                        <h5 class="form-section-title">1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE</h5>
                                        
                                        <div class="form-group">
                                            <label for="consumer_name" class="required">Nombres y Apellidos</label>
                                            <input type="text" 
                                                   class="form-control @error('consumer_name') is-invalid @enderror" 
                                                   id="consumer_name" 
                                                   name="consumer_name" 
                                                   value="{{ old('consumer_name') }}" 
                                                   placeholder="Ingresar nombre completo, apellido paterno y apellido materno" 
                                                   required>
                                            @error('consumer_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="consumer_address" class="required">Domicilio</label>
                                            <textarea class="form-control @error('consumer_address') is-invalid @enderror" 
                                                      id="consumer_address" 
                                                      name="consumer_address" 
                                                      rows="3" 
                                                      placeholder="Domicilio completo (aclarar también provincia y distrito)" 
                                                      required>{{ old('consumer_address') }}</textarea>
                                            @error('consumer_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="document_type" class="required">Tipo de Documento de Identidad</label>
                                            <select class="form-control @error('document_type') is-invalid @enderror" 
                                                    id="document_type" 
                                                    name="document_type" 
                                                    required>
                                                <option value="">Seleccione un tipo</option>
                                                <option value="DNI" {{ old('document_type') == 'DNI' ? 'selected' : '' }}>DNI</option>
                                                <option value="Documento de Extranjería" {{ old('document_type') == 'Documento de Extranjería' ? 'selected' : '' }}>Documento de Extranjería</option>
                                            </select>
                                            @error('document_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="document_number" class="required">N° doc. Identidad</label>
                                            <input type="text" 
                                                   class="form-control @error('document_number') is-invalid @enderror" 
                                                   id="document_number" 
                                                   name="document_number" 
                                                   value="{{ old('document_number') }}" 
                                                   placeholder="Ingresar tu documento" 
                                                   required>
                                            @error('document_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" class="required">Teléfono</label>
                                            <input type="text" 
                                                   class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" 
                                                   name="phone" 
                                                   value="{{ old('phone') }}" 
                                                   placeholder="Teléfono" 
                                                   required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="required">Correo Electrónico</label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email') }}" 
                                                   placeholder="Email" 
                                                   required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- 2. IDENTIFICACIÓN DEL BIEN CONTRATADO -->
                                    <div class="form-section">
                                        <h5 class="form-section-title">2. IDENTIFICACIÓN DEL BIEN CONTRATADO</h5>
                                        
                                        <div class="form-group">
                                            <label for="product_type" class="required">Tipo de Bien contratado</label>
                                            <select class="form-control @error('product_type') is-invalid @enderror" 
                                                    id="product_type" 
                                                    name="product_type" 
                                                    required>
                                                <option value="">Seleccione un tipo</option>
                                                <option value="Producto" {{ old('product_type') == 'Producto' ? 'selected' : '' }}>Producto</option>
                                                <option value="Servicio" {{ old('product_type') == 'Servicio' ? 'selected' : '' }}>Servicio</option>
                                            </select>
                                            @error('product_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="claimed_amount" class="required">Monto reclamado</label>
                                            <input type="number" 
                                                   step="0.01" 
                                                   min="0" 
                                                   class="form-control @error('claimed_amount') is-invalid @enderror" 
                                                   id="claimed_amount" 
                                                   name="claimed_amount" 
                                                   value="{{ old('claimed_amount') }}" 
                                                   placeholder="Ingresar monto" 
                                                   required>
                                            @error('claimed_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="product_description" class="required">Descripción (Nombre del producto)</label>
                                            <textarea class="form-control @error('product_description') is-invalid @enderror" 
                                                      id="product_description" 
                                                      name="product_description" 
                                                      rows="3" 
                                                      placeholder="Descripción" 
                                                      required>{{ old('product_description') }}</textarea>
                                            @error('product_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- 3. DETALLE DE LA RECLAMACIÓN -->
                                    <div class="form-section">
                                        <h5 class="form-section-title">3. DETALLE DE LA RECLAMACIÓN</h5>
                                        
                                        <div class="form-group">
                                            <label for="claim_detail" class="required">Detalle del reclamo</label>
                                            <textarea class="form-control @error('claim_detail') is-invalid @enderror" 
                                                      id="claim_detail" 
                                                      name="claim_detail" 
                                                      rows="5" 
                                                      placeholder="Describa detalladamente su reclamo" 
                                                      required>{{ old('claim_detail') }}</textarea>
                                            @error('claim_detail')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" 
                                                       class="form-check-input @error('conformity') is-invalid @enderror" 
                                                       id="conformity" 
                                                       name="conformity" 
                                                       value="1" 
                                                       {{ old('conformity') ? 'checked' : '' }} 
                                                       required>
                                                <label class="form-check-label required" for="conformity">
                                                    Conformidad
                                                </label>
                                                @error('conformity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <small class="form-text text-muted">
                                                Acepto los Términos del artículo 150º de la Ley Nº 29571 del Código de Protección y Defensa del Consumidor y declaro ser titular de los datos personales ingresados en esta reclamación.
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Enviar Reclamo
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de reclamo registrado -->
    <div class="modal fade" id="complaintSuccessModal" tabindex="-1" role="dialog" aria-labelledby="complaintSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content at-light-background">
                <div class="modal-header border-0 text-center" style="display: block;">
                    <h5 class="modal-title at-font-weight-600" id="complaintSuccessModalLabel" style="color: #333;">
                        <i class="fas fa-check-circle" style="font-size: 3rem; color: #28a745; margin-bottom: 1rem;"></i>
                        <br>Reclamo Registrado
                    </h5>
                </div>
                <div class="modal-body text-center">
                    <p class="at-font-size-1 at-line-height-12">
                        Hemos registrado tu reclamo y pronto estaremos en contacto contigo
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Entendido
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        @if(session('success'))
            // Mostrar el modal automáticamente cuando hay un mensaje de éxito
            $('#complaintSuccessModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        @endif
    });
</script>
@endpush

