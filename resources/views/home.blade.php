@extends('layouts.aplicacion2')

@section('title')
<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
@endsection

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">Revenue</h5>
                    <ul class="tabs tab-pills">
                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                    </ul>
                </div>

                <div class="widget-content">
                    <div class="tabs tab-content">
                        <div id="content_1" class="tabcontent">
                            <div id="revenueMonthly"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-two">
                <div class="widget-heading">
                    <h5 class="">Sales by Category</h5>
                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection

{{--
@extends('layouts.aplicacion')
@section('content')
<div id="video-loader" style="display:none;">
    <video id="loader-video" autoplay muted>
        <source src="ruta_del_video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
	<div class="container-fluid mt-2">
		<img src="{{ asset('img/home.png') }}" style="height:600px; width:1400px;">
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
    $('#loader-video').on('ended', function() {
        // Ocultar el loader
        $('#video-loader').hide();

        // Mostrar la página de inicio
        // Nota: asumo que 'home' es el id de la sección de inicio.
        $('#home').show();
    });
});




</script>
@endsection

--}}
