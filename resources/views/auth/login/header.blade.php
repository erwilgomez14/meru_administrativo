<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('styles/stylesPanel/img/favicon.ico') }}" style="filter: grayscale(100%) brightness(800%);"
                alt="">
            <span class="d-none d-lg-block">HidroBolívar</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @auth
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }} </span>
                    @endauth
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        @auth
                            <h6>{{ Auth::user()->name }}</h6>
                            @if (Auth::user()->roles->count() > 0)
                                <span>{{ Auth::user()->roles->first()->name }}</span>
                            @else
                                <span>Sin rol definido</span>
                            @endif
                        @endauth
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @if (Route::has('login'))
                        <li>
                            @auth

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item d-flex align-items-center"type="submit"><i
                                            class="bi bi-box-arrow-left"></i>Cerrar Sesion</button>
                                </form>
                            @endauth
                        </li>
                    @endif
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
