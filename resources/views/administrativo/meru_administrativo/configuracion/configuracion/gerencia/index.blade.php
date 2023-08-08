@extends('layouts.aplicacion2')

@section('title')
<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Gerencias</span></li>
@endsection

@section('content')


<div class="layout-px-spacing">         
	<div class="row layout-top-spacing">
		<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
			
			<div class="row">
				<div class="col-xl-8 col-lg-7 col-md-7 col-sm-7 text-sm-left text-center layout-spacing align-self-center">
					<div class="d-flex justify-content-sm-start justify-content-center">
						<x-button class="btn-success" href="{{ route('configuracion.configuracion.gerencia.create') }}" title="Nuevo"><i class="fas fa-plus-circle"></i> Nuevo</x-button>
					</div>
				</div>
			</div>
			

			<livewire:administrativo.meru-administrativo.configuracion.configuracion.gerencia-index />
	
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
