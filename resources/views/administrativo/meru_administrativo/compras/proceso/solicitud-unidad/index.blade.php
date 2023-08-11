@extends('layouts.aplicacion2')

@section('title')
<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Solicitudes Unidad</span></li>
@endsection

@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <livewire:administrativo.meru-administrativo.compras.proceso.solicitud-unidad-index />
                </div>
            </div>
        </div>
    </section>

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
