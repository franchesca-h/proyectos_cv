{{-- 
    Vista principal para listar todos los servicios
    
    Muestra todos los servicios en una tabla con Bootstrap.
    Incluye botones para crear, editar y eliminar servicios.
    Solo los administradores pueden ver esta página.
--}}
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
                            <h6>Servicios</h6>
                            <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Nuevo Servicio
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @if(session('success'))
                            <div class="alert alert-success mx-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Servicio</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duración</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-secondary opacity-7">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $service->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ Str::limit($service->description, 50) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">${{ number_format($service->price, 2) }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $service->duration }} min</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if($service->is_active)
                                                    <span class="badge badge-sm bg-gradient-success">Activo</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-secondary">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a href="{{ route('services.edit', $service) }}" class="btn btn-link text-dark px-3 mb-0">
                                                        <i class="fas fa-pencil-alt text-dark me-2"></i>Editar
                                                    </a>
                                                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" 
                                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')">
                                                            <i class="far fa-trash-alt me-2"></i>Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <p class="text-sm text-secondary mb-0">No hay servicios registrados.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

