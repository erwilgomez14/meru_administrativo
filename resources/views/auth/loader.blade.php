@extends('layouts.aplicacion')

@section('content')
<div id="video-loader">
    <video id="loader-video" autoplay muted onended="endVideo()">
        <source src="ruta_del_video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
@endsection

@section('scripts')
<script>
    function endVideo() {
        window.location.href = "{{ route('home') }}";
    }
</script>
@endsection

