
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

@section('sidebar')
	@include('layouts.sidebar')
@endsection