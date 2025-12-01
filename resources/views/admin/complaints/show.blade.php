@extends('layouts.app')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
@endpush

@section('nav-complaints')
active
@endsection

@section('content')

@include('users.partials.header', [
    'title' => __('Libro de Reclamaciones'),
    'description' => __('Detalle de la reclamación'),
    'class' => 'col-lg-12'
])   

<div class="container-fluid mt--7 at-red-background">
    <div class="row">
        <div class="col-xl-12">
            <div class="card at-light-background shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Reclamación # {{ str_pad($complaint->id, 6, "0", STR_PAD_LEFT) }}</h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.complaints.index') }}" class="btn btn-warning">
                                <i class="fas fa-arrow-left"></i> Volver a la lista
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            
                            <!-- 1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE -->
                            <div class="mb-4">
                                <h4 class="mb-3" style="color: #333; border-bottom: 2px solid #666; padding-bottom: 10px;">
                                    1. IDENTIFICACIÓN DEL CONSUMIDOR RECLAMANTE
                                </h4>
                                <div class="pl-lg-4">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Fecha del Reclamo:</strong></label>
                                            <p>{{ $complaint->claim_date->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-control-label"><strong>Nombres y Apellidos:</strong></label>
                                            <p>{{ $complaint->consumer_name }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-control-label"><strong>Domicilio:</strong></label>
                                            <p>{{ $complaint->consumer_address }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Tipo de Documento:</strong></label>
                                            <p>{{ $complaint->document_type }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>N° de Documento:</strong></label>
                                            <p>{{ $complaint->document_number }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Teléfono:</strong></label>
                                            <p>{{ $complaint->phone }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Correo Electrónico:</strong></label>
                                            <p>{{ $complaint->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. IDENTIFICACIÓN DEL BIEN CONTRATADO -->
                            <div class="mb-4">
                                <h4 class="mb-3" style="color: #333; border-bottom: 2px solid #666; padding-bottom: 10px;">
                                    2. IDENTIFICACIÓN DEL BIEN CONTRATADO
                                </h4>
                                <div class="pl-lg-4">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Tipo de Bien contratado:</strong></label>
                                            <p>{{ $complaint->product_type }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Monto reclamado:</strong></label>
                                            <p>$ {{ number_format($complaint->claimed_amount, 2, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-control-label"><strong>Descripción (Nombre del producto):</strong></label>
                                            <p>{{ $complaint->product_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. DETALLE DE LA RECLAMACIÓN -->
                            <div class="mb-4">
                                <h4 class="mb-3" style="color: #333; border-bottom: 2px solid #666; padding-bottom: 10px;">
                                    3. DETALLE DE LA RECLAMACIÓN
                                </h4>
                                <div class="pl-lg-4">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-control-label"><strong>Detalle del reclamo:</strong></label>
                                            <div style="background: #f5f5f5; padding: 15px; border-radius: 5px; white-space: pre-wrap;">
                                                {{ $complaint->claim_detail }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-control-label"><strong>Conformidad:</strong></label>
                                            <p>
                                                @if($complaint->conformity)
                                                    <span class="badge badge-success">Aceptado</span>
                                                @else
                                                    <span class="badge badge-danger">No aceptado</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gestión del Estado y Comentarios Internos -->
                            <div class="mb-4">
                                <h4 class="mb-3" style="color: #333; border-bottom: 2px solid #666; padding-bottom: 10px;">
                                    Gestión del Reclamo
                                </h4>
                                <div class="pl-lg-4">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('admin.complaints.update', $complaint->id) }}" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-control-label" for="status"><strong>Estado:</strong></label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="No leído" {{ $complaint->status == 'No leído' ? 'selected' : '' }}>No leído</option>
                                                    <option value="En proceso" {{ $complaint->status == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                                    <option value="Cerrado" {{ $complaint->status == 'Cerrado' ? 'selected' : '' }}>Cerrado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-control-label" for="internal_comments"><strong>Comentarios Internos:</strong></label>
                                                <textarea name="internal_comments" id="internal_comments" class="form-control" rows="5" placeholder="Ingrese comentarios internos sobre este reclamo...">{{ old('internal_comments', $complaint->internal_comments) }}</textarea>
                                                <small class="form-text text-muted">Estos comentarios son solo visibles para administradores.</small>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Guardar Cambios
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Información adicional -->
                            <div class="mb-4">
                                <h4 class="mb-3" style="color: #333; border-bottom: 2px solid #666; padding-bottom: 10px;">
                                    Información Adicional
                                </h4>
                                <div class="pl-lg-4">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Fecha de Registro:</strong></label>
                                            <p>{{ $complaint->created_at->format('d/m/Y H:i:s') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label"><strong>Última Actualización:</strong></label>
                                            <p>{{ $complaint->updated_at->format('d/m/Y H:i:s') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('admin.complaints.index') }}" class="btn btn-warning">
                                    <i class="fas fa-arrow-left"></i> Volver a la lista
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

