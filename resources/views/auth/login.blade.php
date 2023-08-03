@extends('auth.login.page')
@section('content')
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-wrapper">
        <a href="{{ route('home') }}" class="p-0">
            <img class="d-inline" src="{{ asset('assetsLogin/img/favicon.ico') }}" alt="logo"
                class="logo" style="filter: grayscale(100%) brightness(800%); width: 25px;">
            <img class="d-inline" src="{{ asset('assetsLogin/img/logo.png') }}" alt=""
                class="img-fluid"
                style="max-width: 100px;margin-top: 0.5rem;filter: grayscale(50%) brightness(200%);">
        </a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-size: cover; background-position: top center;">
      <video id="videoPlayer" src="{{ asset('assetsLogin/video/video.mp4')}}"
      style="position: absolute;display:flex; width: 100%; height: auto;" autoplay loop muted></video>
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
            <form  class="form" method="POST" action="{{ route('loginpost') }}">
              @csrf
              <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center" 
                style="background: linear-gradient(180deg, rgb(0, 97, 155) 12%, rgb(27, 123, 172) 47%, rgb(74, 162, 204) 84%);">
                  <h4 class="card-title">Merú Administrativo</h4>
                </div>
                <div class="card-body ">
                  <p class="card-description text-center">Iniciar Sesion</p>
                  @if (session('alert'))
                  <div class="alert alert-danger d-flex justify-content-center align-items-center">
                      {{ session('alert') }}
                  </div>
              @endif
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>
                        </span>
                      </div>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Usuario....">
                      @error('username')
                      <span class="invalid-feedback" style="margin-left: 3rem;"  role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                          </svg>
                        </span>
                      </div>
                      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Contraseña....">
                      @error('password')
                      <span class="invalid-feedback"  style="margin-left: 3rem;" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-rose btn-link btn-lg">
                    {{ __('Acceder') }}
                </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @include('auth.login.footer')
    </div>
  </div>

  <script>
    $(document).ready(function() {
    $('.form').on('submit', function(e) {
        // Prevenir la acción por defecto del formulario (la redirección)
        e.preventDefault();

        // Mostrar el loader y el video
        $('#video-loader').show();
        $('#loader-video')[0].play();

        // Hacer la petición al servidor
        // Aquí necesitas adaptarlo para tu situación específica
        $.post({
            url: '{{ route('loginpost') }}',
            data: $(this).serialize(),
            success: function() {
                // Si la petición fue exitosa, el video se está reproduciendo
                // Cuando el video termine, se disparará el evento 'ended'
            },
            error: function() {
                // Si hubo un error, puedes ocultar el loader y mostrar un mensaje
                $('#video-loader').hide();
                // Mostrar el mensaje de error
            }
        });
    });
});
  </script>
  @endsection
{{-- <!doctype html>
<html lang="{{ config('app.locale', 'es') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icono app -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Title app -->
    <title>{{ config('app.name', 'MERÚ Administrativo') }}</title>

    <!-- AdminLTE v3.2.0 --- Bootstrap v4.6.1 -->
    <link href="{{ asset('template/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <section class="login-block h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">MERÚ Administrativo</h2>
                    <form method="POST" action="{{ route('loginpost') }}">
                        @csrf
                        @if (session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="username">{{ __('E-Mail Address') }}</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check text-center">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </label>

                            <button type="submit" class="btn btn-login float-right">
                                {{ __('Login') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="form-check float-right" style="margin-top:20px;">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <div class="col-md-8 banner-sec">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselIndicators" data-slide-to="1"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset('img/login_carousel_2.jpg') }}"
                                    alt="Imagen Sistema" style="">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Hidrobolivar</h2>
                                        <p>Trabajamos en proveer el servicio de agua potable en Bolívar</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('img/login_carousel_3.jpg') }}"
                                    alt="Imagen Sistema">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Visión</h2>
                                        <p>¡Ser la hidrológica de referencia nacional!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html> --}}
