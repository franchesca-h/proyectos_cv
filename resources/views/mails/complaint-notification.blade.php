@extends('layouts.app_mail')

@section('content')
<div class="container-fluid mt--7 at-red-background">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <br>
            <div class="card shadow mt-6">
                <div class="card-body at-light-background" style="width: 100%;">
                    <div class="row at-no-sides-margin">
                        <div class="col-md-12 text-center mt-5">
                            <!-- Reemplaza esto con tu logo: <img src="{{ asset('argon') }}/img/assets/png/grupo_5.png" alt="Tu Nombre de Empresa" style="height:3rem; display: unset !important;"> -->
                            <div style="font-size: 1.5rem; font-weight: bold; color: #333; margin-bottom: 1rem;">Tu Logo</div>
                            <h1 class="at-font-weight-600 at-font-size-2">Nuevo Reclamo Registrado</h1>
                            <p>Se ha registrado un nuevo reclamo en el Libro de Reclamaciones.</p>
                            <br>
                            
                            <div style="text-align: left; max-width: 600px; margin: 0 auto; padding: 20px;">
                                <h3 style="color: #333; margin-bottom: 15px;">Datos del Usuario:</h3>
                                <p><strong>Fecha del Reclamo:</strong> {{ $complaint->claim_date->format('d/m/Y') }}</p>
                                <p><strong>Nombres y Apellidos:</strong> {{ $complaint->consumer_name }}</p>
                                <p><strong>Tipo de Documento:</strong> {{ $complaint->document_type }}</p>
                                <p><strong>N° de Documento:</strong> {{ $complaint->document_number }}</p>
                                <p><strong>Teléfono:</strong> {{ $complaint->phone }}</p>
                                <p><strong>Correo Electrónico:</strong> {{ $complaint->email }}</p>
                                
                                <h3 style="color: #333; margin-top: 30px; margin-bottom: 15px;">Detalle del Reclamo:</h3>
                                <p style="background: #f5f5f5; padding: 15px; border-radius: 5px; white-space: pre-wrap;">{{ $complaint->claim_detail }}</p>
                            </div>
                            
                            <br>
                            <p>Para ver más detalles, ingresa al módulo de administración.</p>
                            <br>
                            <p>Saludos,</p>
                            <p>Tu Nombre de Empresa</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection

