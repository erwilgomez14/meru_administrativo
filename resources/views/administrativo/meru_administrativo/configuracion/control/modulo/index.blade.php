@extends('layouts.aplicacion2')

@section('styles')
@endsection

@section('title')
    <li class="breadcrumb-item text-bold"><a href="{{ route('home') }}">Página principal</a></li>
    <li class="breadcrumb-item active text-bold">Listar Modulo</li>

    {{-- <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Usuarios</span></li> --}}
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="row">


                    <div
                        class="col-xl-8 col-lg-7 col-md-7 col-sm-7 text-sm-left text-center layout-spacing align-self-center">
                        <div class="d-flex justify-content-sm-start justify-content-center">
                            <x-button class="btn-success" href="{{ route('configuracion.control.modulo.create') }}"
                                title="Nuevo"><i class="fas fa-plus-circle"></i> Nuevo</x-button>
                            <x-button href="{{ route('configuracion.control.modulo.print_modulo') }}" target="_blank"
                                class="btn-primary" title="Generar PDF"><i class="fas fa-download"> Generar
                                    PDF</i></i></x-button>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ session('status') }}</strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif
                </div>

                <livewire:administrativo.meru-administrativo.configuracion.control.modulo-index-component />

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const dataTable = $('#zero-config').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Buscar...",
                    "sLengthMenu": "Resultado :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });

            
        });
    </script>
@endsection
