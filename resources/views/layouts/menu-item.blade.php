{{-- @if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['url_destino']) }}" >
            <! -- /*empty($item['url_destino']) ? '#' : route($item['url_destino'])*/ -->
            <i class="nav-icon fas {{ $item['icono'] }}"></i>
            <p>
                {{ $item['nombre'] }}
            </p>
        </a>
    </li>
@else
    <li class="menu">
        <a href="{{ Route::has($item['url_destino']) ? route($item['url_destino']) : '#' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
            <i class="nav-icon fas {{ $item['icono'] }} {{ $item['padre'] == 0 ? 'text-md': 'text-xs'}}"></i>
            <span>
                {{ $item['nombre'] }}
            </span>
            </div>
            <div>
                <i class="right fas fa-angle-left"></i>
            </div>
        </a>

         <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])

                    <li>
                        @if ($submenu['emergente'])
                            <form id="form-menu-{{ $submenu['id'] }}" action="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}" method="GET" target="_blank">
                                @csrf
                                <a href="#" onclick="$('#form-menu-{{ $submenu['id'] }}').submit();">
                                    <p>
                                        {{ $submenu['nombre'] }}
                                    </p>
                                </a>
                            </form>
                        @else

                            <a href="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}">
                                <p>
                                    {{ $submenu['nombre'] }}
                                </p>
                            </a>

                        @endif
                    </li>
                @else
                    @include('layouts.menu-item', [ 'item' => $submenu ])
                @endif
            @endforeach
        </ul>
    </li>
@endif --}}
@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['url_destino']) }}">
            <i class="nav-icon fas {{ $item['icono'] }}"></i>
            <p>
                {{ $item['nombre'] }}
            </p>
        </a>
    </li>
@else
    <li class="menu">
        <a href="{{ Route::has($item['url_destino']) ? route($item['url_destino']) : '#' }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="nav-icon fas {{ $item['icono'] }} {{ $item['padre'] == 0 ? 'text-md': 'text-xs'}}"></i>
            <span>
                {{ $item['nombre'] }}
            </span>
            <i class="right fas fa-angle-left"></i>
        </a>

        <!-- Agregar un identificador único al atributo "id" del elemento <ul> -->
        <ul class="collapse submenu list-unstyled" id="submenu-{{ $item['id'] }}" data-parent="#accordionExample">
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li>
                        @if ($submenu['emergente'])
                            <form id="form-menu-{{ $submenu['id'] }}" action="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}" method="GET" target="_blank">
                                @csrf
                                <a href="#" onclick="$('#form-menu-{{ $submenu['id'] }}').submit();">
                                    <p>
                                        {{ $submenu['nombre'] }}
                                    </p>
                                </a>
                            </form>
                        @else
                            <a href="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}">
                                <p>
                                    {{ $submenu['nombre'] }}
                                </p>
                            </a>
                        @endif
                    </li>
                @else
                    <!-- Utilizar la plantilla del submenú de forma recursiva -->
                    @include('layouts.menu-item', ['item' => $submenu])
                @endif
            @endforeach
        </ul>
    </li>
@endif



{{--
<li class="menu">
    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
            <span>Pages</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
        <li>
            <a href="pages_helpdesk.html"> Helpdesk </a>
        </li>
        <li>
            <a href="pages_coming_soon.html"> Coming Soon </a>
        </li>
        <li>
            <a href="#pages-error" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Error <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
            <ul class="collapse list-unstyled sub-submenu" id="pages-error" data-parent="#pages">
                <li>
                    <a href="pages_error404.html"> 404 </a>
                </li>
                <li>
                    <a href="pages_error500.html"> 500 </a>
                </li>
                <li>
                    <a href="pages_error503.html"> 503 </a>
                </li>
                <li>
                    <a href="pages_maintenence.html"> Maintanence </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
--}}
