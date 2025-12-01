{{-- Vista para confirmar eliminación de servicios - Extra seguridad --}}
@extends('layouts.app')

@section('nav-services')
active
@endsection

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Eliminar Servicio</h6>
                            <a href="{{ route('services.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <h5><i class="fas fa-exclamation-triangle"></i> ¿Estás seguro?</h5>
                            <p>Esta acción eliminará permanentemente el servicio. Esta acción no se puede deshacer.</p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-dark">Información del Servicio a Eliminar:</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Nombre:</strong> {{ $service->name }}</p>
                                        <p><strong>Precio:</strong> ${{ number_format($service->price, 2) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Duración:</strong> {{ $service->duration }} minutos</p>
                                        <p><strong>Estado:</strong> 
                                            @if($service->is_active)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-secondary">Inactivo</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <p><strong>Descripción:</strong> {{ $service->description }}</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-2" 
                                            onclick="return confirm('¿Estás completamente seguro de eliminar este servicio?')">
                                        <i class="fas fa-trash"></i> Sí, Eliminar Servicio
                                    </button>
                                </form>
                                <a href="{{ route('services.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection


