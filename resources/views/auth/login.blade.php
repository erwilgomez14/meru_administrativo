<!doctype html>
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

</html>
