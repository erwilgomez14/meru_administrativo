@extends('layouts.aplicacion2')

@section('title')
    <li class="breadcrumb-item text-bold"><a href="{{ route('configuracion.configuracion.usuario.index') }}">Usuario</a></li>
    <li class="breadcrumb-item active text-bold">Registrar Usuario</li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="row">
                    <div class="col-12">
                        <x-form method="POST" action="{{ route('configuracion.configuracion.usuario.store') }}">
                            @include('administrativo/meru_administrativo/configuracion/configuracion/usuarios/partials/_form')
                        </x-form>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        window.livewire.on('alert', param => {
            toastr[param['type']](param['message']);
        });

        
    </script>
@endsection
