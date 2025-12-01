@extends('layouts.app')

@push('css')
    <link type="text/css" href="{{ asset('argon') }}/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/select.bootstrap4.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/myCss.css" rel="stylesheet">
@endpush

@section('nav-complaints')
active
@endsection

@section('content')

@include('users.partials.header', [
    'title' => __('Libro de Reclamaciones'),
    'description' => __('Gestiona todas las reclamaciones registradas por los usuarios.'),
    'class' => 'col-lg-12'
])   

<div class="container-fluid mt--7 at-red-background">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0 at-light-background">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-0">Lista de Reclamaciones</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body at-light-background">
                    <div class="table-responsive-sm">
                        <table class="myTable align-items-center table-bordered table-sm" id="complaintsDataTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="thTaxationLeft">ID</th>
                                    <th scope="col" class="thTaxationMiddle">Fecha del Reclamo</th>
                                    <th scope="col" class="thTaxationMiddle">Nombres y Apellidos</th>
                                    <th scope="col" class="thTaxationMiddle">Documento</th>
                                    <th scope="col" class="thTaxationMiddle">Email</th>
                                    <th scope="col" class="thTaxationMiddle">Teléfono</th>
                                    <th scope="col" class="thTaxationMiddle">Tipo de Bien</th>
                                    <th scope="col" class="thTaxationMiddle">Monto Reclamado</th>
                                    <th scope="col" class="thTaxationMiddle">Estado</th>
                                    <th scope="col" class="thTaxationMiddle">Fecha de Registro</th>
                                    <th scope="col" class="thTaxationRight">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $complaint)
                                <tr>
                                    <td>{{ str_pad($complaint->id, 6, "0", STR_PAD_LEFT) }}</td>
                                    <td>{{ $complaint->claim_date->format('d/m/Y') }}</td>
                                    <td>{{ $complaint->consumer_name }}</td>
                                    <td>{{ $complaint->document_type }}: {{ $complaint->document_number }}</td>
                                    <td>{{ $complaint->email }}</td>
                                    <td>{{ $complaint->phone }}</td>
                                    <td>{{ $complaint->product_type }}</td>
                                    <td>$ {{ number_format($complaint->claimed_amount, 2, '.', ',') }}</td>
                                    <td>
                                        @if($complaint->status == 'No leído')
                                            <span class="badge badge-warning">{{ $complaint->status }}</span>
                                        @elseif($complaint->status == 'En proceso')
                                            <span class="badge badge-info">{{ $complaint->status }}</span>
                                        @else
                                            <span class="badge badge-success">{{ $complaint->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $complaint->created_at->format("d/m/Y H:i:s") }}</td>
                                    <td>
                                        <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="btn btn-primary btn-sm">
                                            Ver Detalle
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4 at-light-background">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('argon') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/js/dataTables.bootstrap4.min.js"></script>
<script>
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "extract-date-pre": function(value) {
            if (value != "") {
                date = value.split('/');
                return Date.parse(date[1] + '/' + date[0] + '/' + date[2]);
            } else {
                return "";
            }
        },
        "extract-date-asc": function(a, b) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "extract-date-desc": function(a, b) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    });
    $('#complaintsDataTable').DataTable({
        "lengthChange": false,
        "language": {
            "url": "{{ asset('argon') }}/js/datatables.ES.json"
        },
        "columnDefs": [
            {
                "type": 'extract-date',
                "targets": [1, 8]
            },
        ],
        'order': [[ 8, "desc" ]],
    });
</script>
@endpush

