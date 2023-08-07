
@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['url_destino']) }}" class="dropdown-item">
            <i class="nav-icon fas {{ $item['icono'] }}"></i>
            {{ $item['nombre'] }}
        </a>
    </li>
@else
    <li class="menu">
        <a href="{{ Route::has($item['url_destino']) ? route($item['url_destino']) : '#' . $item['modulo'] }}"
            data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                @if ($item['icono'] != null)
                    <i class="nav-icon fas {{ $item['icono'] }}"></i>
                @endif

                <span>
                    {{ $item['nombre'] }}
                </span>
            </div>
            <div>
                <i class="right fas fa-angle-down float-right"></i>
            </div>

        </a>
        <ul class="collapse submenu list-unstyled" id="{{ $item['modulo'] }}" data-parent={{ '#' . $item['modulo'] }}>
            @foreach ($item['submenu'] as $submenu)
                @if ($submenu['submenu'] == [])
                    <li>
                        @if ($submenu['emergente'])
                            <form id="form-menu-{{ $submenu['id'] }}"
                                action="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}"
                                method="GET" target="_blank">
                                @csrf
                                <a href="#" onclick="$('#form-menu-{{ $submenu['id'] }}').submit();"
                                    class="dropdown-item">
                                    {{ $submenu['nombre'] }}
                                </a>
                            </form>
                        @else
                            <a href="{{ Route::has($submenu['url_destino']) ? route($submenu['url_destino']) : '#' }}"
                                class="dropdown-item">
                                {{ $submenu['nombre'] }}
                            </a>
                        @endif
                    </li>
                @else
                    @include('layouts.menu-item', ['item' => $submenu])
                @endif
            @endforeach
        </ul>
    </li>
@endif



{{--

                    <li class="menu">
                        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span> Menu 3</span>
                            </div>
                            <div>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Submenu 1 </a>
                            </li>
                            <li>
                                <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2"> 
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

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
