@extends('layouts.aplicacion')

@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<x-button class="btn-success" href="{{ route('modificaciones.movimientos.solicitud_traspaso.create') }}" title="Nuevo"><i class="fas fa-plus-circle"></i> Nuevo</x-button>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item text-bold"><a href="{{ route('home') }}">P&aacute;gina principal</a></li>
					<li class="breadcrumb-item active text-bold">Listar Solicitudes de Traspasos</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<livewire:administrativo.meru-administrativo.modificaciones.movimientos.solicitud-traspaso-index />
			</div>
		</div>
	</div>
</section>

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('js')
    <script type="text/javascript">
		$(document).on('click', '.print-sol', function (e) {
			e.preventDefault();
			$('#print-form-' + this.id).submit();
		});
    </script>
@endsection