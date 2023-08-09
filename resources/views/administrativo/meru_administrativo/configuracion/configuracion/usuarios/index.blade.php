@extends('layouts.aplicacion2')

@section('title')
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Usuarios</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="row">

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
                    <div
                        class="col-xl-8 col-lg-7 col-md-7 col-sm-7 text-sm-left text-center layout-spacing align-self-center">
                        <div class="d-flex justify-content-sm-start justify-content-center">
                            <x-button class="btn-success" href="{{ route('configuracion.configuracion.usuario.create') }}"
                                title="Nuevo"><i class="fas fa-plus-circle"></i> Nuevo</x-button>

                        </div>
                    </div>
                </div>


                <livewire:administrativo.meru-administrativo.configuracion.configuracion.usuario-index />


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

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                timer: 3000 // Cambia el tiempo en milisegundos que se mostrará el mensaje
            });
        </script>
    @endif
@endsection


{{-- @extends('layouts.aplicacion')

@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
            <div class="col-sm-6">
				<x-button class="btn-success" href="{{ route('configuracion.configuracion.usuario.create') }}" title="Nuevo"><i class="fas fa-plus-circle"></i> Nuevo</x-button>
             </div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item text-bold"><a href="{{ route('home') }}">P&aacute;gina principal</a></li>
					<li class="breadcrumb-item active text-bold">Listar Usuarios</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<livewire:administrativo.meru-administrativo.configuracion.configuracion.usuario-index />
			</div>
		</div>
	</div>
</section>

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('js')

@endsection --}}
